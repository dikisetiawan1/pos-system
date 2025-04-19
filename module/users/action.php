<?php

include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

// ambil data dari form
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$role = $_POST['role'];
$button = $_POST['button'];

// jika id user belum ada dan button yang di klik adalah send
if ($button == "send") {
    mysqli_query($koneksi, "INSERT INTO users (username, password , role) 
       VALUES ('$username','$password_hash','$role')");
      header("location:" . BASE_URL . "index.php?&module=users&action=list&notif=success");
  
}elseif ($button == "update") {
    // jika button yang di klik adalah update
   mysqli_query($koneksi, "UPDATE users SET username='$username', password='$password_hash', role='$role' WHERE id_user='$id_user'");
   header("location:" . BASE_URL . "index.php?&module=users&action=list&notifupdate=success");
}

