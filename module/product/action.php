<?php

include_once '../../function/helper.php';
include_once '../../function/koneksi.php';


$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$id_kategori = $_POST['id_kategori'];
$stok = $_POST['stok'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga'];
$button = $_POST['button'];


if ($button == "send") {
    mysqli_query($koneksi, "INSERT INTO products (id_produk, nama_produk, id_kategori, stok, satuan, harga) 
    VALUES ('$id_produk','$nama_produk','$id_kategori','$stok','$satuan','$harga')");
   header("location:" . BASE_URL . "index.php?&module=product&action=list&notif=success");
   
}elseif ($button == "update") {
    mysqli_query($koneksi, "UPDATE products SET nama_produk='$nama_produk', id_kategori='$id_kategori', stok='$stok', satuan='$satuan', harga='$harga' WHERE id_produk='$id_produk'");
    header("location:" . BASE_URL . "index.php?&module=product&action=list&notifupdate=success");
}

