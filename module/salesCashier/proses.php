<?php
// helper untuk ambi base-url
include_once '../../function/helper.php';
// Koneksi database
include_once '../../function/koneksi.php';


// cek apakah ada produk yang dikirim dari form
if (!isset($_POST['produk']) || empty($_POST['produk']['kode'])) {
  echo "Tidak ada produk yang dikirim.";
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


for ($i = 0; $i < count($kode_produk); $i++) {
    $subtotal = $harga_produk[$i] * $jumlah_produk[$i];
    $total += $subtotal;
}

// kalkulasi total setelah diskon dan kembalian 
$diskon_nominal = round($total * ($diskon / 100));
$total_setelah_diskon = $total - $diskon_nominal;
$kembalian = $total_setelah_diskon - $bayar;

// query insert transaksi
mysqli_query($koneksi, "INSERT INTO transactions (total, diskon, bayar, kembalian) VALUES ($total_setelah_diskon, $diskon_nominal, $bayar, $kembalian)");
$transaksi_id = mysqli_insert_id($koneksi);

// Simpan detail transaksi
for ($i = 0; $i < count($kode_produk); $i++) {
    $kode = $kode_produk[$i];
    $nama = $nama_produk[$i];
    $harga = $harga_produk[$i];
    $jumlah = $jumlah_produk[$i];
    $subtotal = $harga * $jumlah;


    // query insert detail transaksi
    mysqli_query($koneksi, "INSERT INTO transactions_detail (transaksi_id, kode_produk, nama_produk, harga, jumlah, subtotal)
        VALUES ($transaksi_id, '$kode', '$nama', $harga, $jumlah, $subtotal)");

    // query update stok produk
    mysqli_query($koneksi, "UPDATE products SET stok = stok - $jumlah WHERE id_produk = '$kode'");
    // Cek apakah ada error saat update stok  
    if (mysqli_affected_rows($koneksi) <= 0) {
        echo "Gagal mengupdate stok produk.";
        exit;
    }
}

// Redirect ke halaman cetak
header("location:" . BASE_URL . "index.php?&module=salesCashier&action=cetak&id=$transaksi_id");
exit;
?>
