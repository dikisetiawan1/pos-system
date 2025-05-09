<?php
// helper untuk ambi base-url
include_once 'function/helper.php';
// require 'vendor/autoload.php';
include_once 'vendor/autoload.php'; 
// Koneksi database
include_once 'function/koneksi.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM transactions WHERE id = $id");
$transaksi = mysqli_fetch_assoc($query);

$query_detail = mysqli_query($koneksi, "SELECT * FROM transactions_detail WHERE transaksi_id = $id");

// deskripsi nama toko di struk printer pos58
$query_toko= mysqli_query($koneksi, "SELECT * FROM toko");
$row_toko = mysqli_fetch_assoc($query_toko);

$connector = new WindowsPrintConnector("POS58"); // Ganti dengan nama printer kamu
$printer = new Printer($connector);

// Header
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("{$row_toko['nama_toko']}\n");
$printer->text("{$row_toko['alamat']}\n");
$printer->text("Tlp: {$row_toko['tlp']}\n");
// $printer->text("Email: {$row_toko['email']}\n");
$printer->text("Date: {$transaksi['tgl']}\n");
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
$printer->text("{$row_toko['footer']}!\n");
$printer->cut();
$printer->close();

echo "<script>
    setTimeout(function(){
        window.location.href = 'index.php?&module=salesCashier&action=list&notiftransaksi=success';
    }, 2000);
</script>";

?>
