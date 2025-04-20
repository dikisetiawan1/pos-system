<?php
session_start();
include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

// ambil data dari form
$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga'];
$stok = $_POST['stok'] + $_POST['stok_addupdate'];
$stok_min = $_POST['stok'] - $_POST['stok_minupdate'];
$button = $_POST['button'];

// jika id produk belum ada dan button yang di klik adalah minupdate
if ($button == "minupdate") {
    mysqli_query($koneksi, "UPDATE products SET nama_produk='$nama_produk',  stok='$stok_min'  WHERE id_produk='$id_produk'");
    logAktivitas($_SESSION['id_user'], 'Update Produk', "Melakukan Pengurangan Stok Produk ID: $id_produk");
   header("location:" . BASE_URL . "index.php?&module=productStock&action=list&notifupdate=success");
}elseif ($button == "addupdate") {
    // jika button yang di klik adalah addupdate
   mysqli_query($koneksi, "UPDATE products SET nama_produk='$nama_produk', stok='$stok'  WHERE id_produk='$id_produk'");
   logAktivitas($_SESSION['id_user'], 'Update Produk', "Melakukan Penambahan Stok Produk ID: $id_produk");
   header("location:" . BASE_URL . "index.php?&module=productStock&action=list&notifupdate=success");
}

