<?php

include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

// ambil data dari form
$id_kategori = $_POST['id_kategori'];
$nama_kategori = $_POST['name'];
$button = $_POST['button'];

// jika id produk belum ada dan button yang di klik adalah send
if ($button == "send") {
    //cek apakah id produk sudah ada atau belum
$cek_kategoriName = mysqli_query($koneksi, "SELECT * FROM kategori WHERE name='$nama_kategori' ");
if ( mysqli_num_rows($cek_kategoriName) > 0 ) {
    // jika id produk sudah ada
    header("location:" . BASE_URL . "index.php?&module=productCategory&action=list&notif=failed");
}else{
    mysqli_query($koneksi, "INSERT INTO kategori (id_kategori, name) 
       VALUES ('$id_kategori','$nama_kategori')   ");
      header("location:" . BASE_URL . "index.php?&module=productCategory&action=list&notif=success");
  
}}elseif ($button == "update") {
    // jika button yang di klik adalah update
   mysqli_query($koneksi, "UPDATE kategori SET name='$nama_kategori' WHERE id_kategori='$id_kategori'");
   header("location:" . BASE_URL . "index.php?&module=productCategory&action=list&notifupdate=success");
}

