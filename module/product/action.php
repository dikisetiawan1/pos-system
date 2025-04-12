<?php

include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

// ambil data dari form
$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$id_kategori = $_POST['id_kategori'];
$stok = $_POST['stok'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga'];
$button = $_POST['button'];

// jika id produk belum ada dan button yang di klik adalah send
if ($button == "send") {
    //cek apakah id produk sudah ada atau belum
$cek_id = mysqli_query($koneksi, "SELECT * FROM products WHERE id_produk='$id_produk'");
$cek_produkName = mysqli_query($koneksi, "SELECT * FROM products WHERE nama_produk='$nama_produk' ");
if (mysqli_num_rows($cek_id) || mysqli_num_rows($cek_produkName) > 0 ) {
    // jika id produk sudah ada
    header("location:" . BASE_URL . "index.php?&module=product&action=list&notif=failed");
}else{
    mysqli_query($koneksi, "INSERT INTO products (id_produk, nama_produk, id_kategori, stok, satuan, harga) 
       VALUES ('$id_produk','$nama_produk','$id_kategori','$stok','$satuan','$harga')   ");
      header("location:" . BASE_URL . "index.php?&module=product&action=list&notif=success");
  
}}elseif ($button == "update") {
    // jika button yang di klik adalah update
   mysqli_query($koneksi, "UPDATE products SET nama_produk='$nama_produk', id_kategori='$id_kategori', stok='$stok', satuan='$satuan', harga='$harga' WHERE id_produk='$id_produk'");
   header("location:" . BASE_URL . "index.php?&module=product&action=list&notifupdate=success");
}

