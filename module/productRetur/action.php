<?php
session_start();
include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

// ambil data dari form
$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$stok_retur = $_POST['stok_retur'];
$tgl_transaksi = $_POST['tgl_transaksi'];
$harga = $_POST['harga'];
$reason = $_POST['ket'];
$stok = $_POST['stok'] + $_POST['stok_retur'];      
$button = $_POST['button'];

// jika id produk belum ada dan button yang di klik adalah minupdate
if ($button == "addupdate") {

    // input produk retur ke tabel producs_retur
    mysqli_query($koneksi, "INSERT INTO products_retur (id_produk, nama_produk, stok_retur,tgl_transaksi,harga, ket) 
       VALUES ('$id_produk','$nama_produk','$stok_retur','$tgl_transaksi','$harga','$reason')");
    // jika button yang di klik adalah addupdate
   mysqli_query($koneksi, "UPDATE products SET nama_produk='$nama_produk', stok='$stok'  WHERE id_produk='$id_produk'");
   logAktivitas($_SESSION['id_user'], 'Retur Produk', "Melakukan Pengembalian Produk ID: $id_produk");
   header("location:" . BASE_URL . "index.php?&module=productRetur&action=form&notifretur=success");
}

