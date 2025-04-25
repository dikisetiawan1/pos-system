<?php
session_start(); // pastikan ada
// helper untuk ambi base-url
include_once '../../function/helper.php';
// Koneksi database
include_once '../../function/koneksi.php';
$id_user = $_SESSION['id_user'];

// cek apakah ada produk yang dikirim dari form
if (!isset($_POST['produk']) || empty($_POST['produk']['kode'])) {
  echo '<script>Swal.fire({
                  title: "Product added failed!",
                  text: "You clicked the button!",
                  icon: "success"
                });</script>';
  exit;
}

// ambil data dari form dengan metode post yang dikirim
$kode_produk = $_POST['produk']['kode'];
$nama_produk = $_POST['produk']['nama'];
$harga_produk = $_POST['produk']['harga'];
$jumlah_produk = $_POST['produk']['jumlah'];

$total = 0;
$diskon = $_POST['diskon'] ?? 0;
$bayar = $_POST['bayar'] ?? 0;

// kalkulasi jml produk dan harga produk
for ($i = 0; $i < count($kode_produk); $i++) {
    $subtotal = $harga_produk[$i] * $jumlah_produk[$i];
    $total += $subtotal;
}

// kalkulasi total setelah diskon dan kembalian 
$diskon_nominal = round($total * ($diskon / 100));
$total_setelah_diskon = $total - $diskon_nominal;
$kembalian = $total_setelah_diskon - $bayar;


// query insert transaksi
mysqli_query($koneksi, "INSERT INTO transactions (total, diskon, bayar, kembalian, id_user) VALUES ($total_setelah_diskon, $diskon_nominal, $bayar, $kembalian, $id_user)");
$transaksi_id = mysqli_insert_id($koneksi);


// Simpan detail transaksi per item ke database
for ($i = 0; $i < count($kode_produk); $i++) {
    $kode = $kode_produk[$i];
    $nama = $nama_produk[$i];
    $harga = $harga_produk[$i];
    $jumlah = $jumlah_produk[$i];
    $subtotal = $harga * $jumlah;


    // query insert detail transaksi
    mysqli_query($koneksi, "INSERT INTO transactions_detail (transaksi_id, kode_produk, nama_produk, harga, jumlah, subtotal)
        VALUES ($transaksi_id, '$kode', '$nama', $harga, $jumlah, $subtotal)");
logAktivitas($_SESSION['id_user'], 'Transaksi Produk', "Melakukan Transaksi Produk ID: $transaksi_id");


// update stok produk setelah transaksi berhasil
    mysqli_query($koneksi, "UPDATE products SET stok = stok - $jumlah WHERE id_produk = '$kode'");
    // Cek apakah ada error saat update stok  
    if (mysqli_affected_rows($koneksi) <= 0) {
        echo "<script>alert('Gagal mengupdate stok produk.');</script>";
        exit;
    }
}

// Redirect ke halaman cetak
header("location:" . BASE_URL . "index.php?&module=salesCashier&action=cetak&id=$transaksi_id");
exit;



?>
