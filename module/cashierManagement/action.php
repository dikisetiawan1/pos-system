<?php

include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

// ambil data dari form
// $id_toko = $_POST['id_toko'];
$nama_toko = $_POST['nama_toko'];
$alamat = $_POST['alamat'];
$tlp = $_POST['tlp'];
$email = $_POST['email'];
$footer = $_POST['footer'];
$button = $_POST['button'];


if ($button == "update") {
    // jika button yang di klik adalah update
   mysqli_query($koneksi, "UPDATE toko SET nama_toko='$nama_toko', alamat='$alamat', tlp='$tlp', email='$email', footer='$footer' WHERE id_toko='1'");
   header("location:" . BASE_URL . "index.php?&module=cashierManagement&action=form&notif=success");
}

