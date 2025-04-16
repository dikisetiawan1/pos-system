<?php
// Koneksi database
include 'function/koneksi.php';

if (!isset($_POST['produk']) || empty($_POST['produk']['kode'])) {
  echo "Tidak ada produk yang dikirim.";
  exit;
}


$kode_produk = $_POST['produk']['kode'];
$nama_produk = $_POST['produk']['nama'];
$harga_produk = $_POST['produk']['harga'];
$jumlah_produk = $_POST['produk']['jumlah'];

$total = 0;
$diskon = $_POST['diskon'] ?? 0;
$bayar = $_POST['bayar'] ?? 0;
$kembalian = $_POST['kembalian'] ?? 0;

for ($i = 0; $i < count($kode_produk); $i++) {
    $subtotal = $harga_produk[$i] * $jumlah_produk[$i];
    $total += $subtotal;
}

// Simpan transaksi
$diskon_nominal = round($total * ($diskon / 100));
$total_setelah_diskon = $total - $diskon_nominal;

mysqli_query($koneksi, "INSERT INTO transactions (total, diskon, bayar, kembalian) VALUES ($total_setelah_diskon, $diskon_nominal, $bayar, $kembalian)");
$transaksi_id = mysqli_insert_id($koneksi);

// Simpan detail transaksi
for ($i = 0; $i < count($kode_produk); $i++) {
    $kode = $kode_produk[$i];
    $nama = $nama_produk[$i];
    $harga = $harga_produk[$i];
    $jumlah = $jumlah_produk[$i];
    $subtotal = $harga * $jumlah;

    mysqli_query($koneksi, "INSERT INTO transactions_detail (transaksi_id, kode_produk, nama_produk, harga, jumlah, subtotal)
        VALUES ($transaksi_id, '$kode', '$nama', $harga, $jumlah, $subtotal)");
}

// Redirect ke halaman cetak
header("Location: cetak.php?id=$transaksi_id");
exit;
?>
