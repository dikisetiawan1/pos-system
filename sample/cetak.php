<?php
require 'vendor/autoload.php';
// Koneksi database
include 'function/koneksi.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM transactions WHERE id = $id");
$transaksi = mysqli_fetch_assoc($query);

$query_detail = mysqli_query($koneksi, "SELECT * FROM transactions_detail WHERE transaksi_id = $id");

$connector = new WindowsPrintConnector("POS58"); // Ganti dengan nama printer kamu
$printer = new Printer($connector);

// Header
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("TOKO CONTOH\n");
$printer->text("Jl. Kasir Online No.1\n");
$printer->text("------------------------------\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);

// Detail barang
while ($row = mysqli_fetch_assoc($query_detail)) {
    $printer->text("{$row['nama_produk']} ({$row['kode_produk']})\n");
    $printer->text(" {$row['jumlah']} x Rp {$row['harga']} = Rp {$row['subtotal']}\n");
}

// Total
$printer->text("------------------------------\n");
$printer->text("Total: Rp " . $transaksi['total'] . "\n");
$printer->text("Diskon: Rp " . $transaksi['diskon'] . "\n");
$printer->text("Bayar: Rp " . $transaksi['bayar'] . "\n");
$printer->text("Kembali: Rp " . $transaksi['kembalian'] . "\n");

// Footer
$printer->text("------------------------------\n");
$printer->text("Terima kasih!\n");
$printer->cut();
$printer->close();
?>
