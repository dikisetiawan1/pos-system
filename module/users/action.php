<?php
session_start();
include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

// ambil data dari form
$id_user = $_POST['id_user'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);
$role = $_POST['role'];
$button = $_POST['button'];

// jika id user belum ada dan button yang di klik adalah send
if ($button == "send") {
    mysqli_query($koneksi, "INSERT INTO users (username,nama, password , role) 
       VALUES ('$username', '$nama','$password_hash','$role')");
       logAktivitas($_SESSION['id_user'], 'Add User', "Melakukan Tambah User");

      header("location:" . BASE_URL . "index.php?&module=users&action=list&notif=success");
  
}elseif ($button == "update") {
    // jika button yang di klik adalah update
   mysqli_query($koneksi, "UPDATE users SET username='$username', nama='$nama', password='$password_hash', role='$role' WHERE id_user='$id_user'");
   logAktivitas($_SESSION['id_user'], 'Update User oleh superadmin', "Melakukan Update User");
   header("location:" . BASE_URL . "index.php?&module=users&action=list&notifupdate=success");
}elseif ($button == "updatepassword") {
    // jika button yang di klik adalah update password
   mysqli_query($koneksi, "UPDATE users SET id_user='$id_user', username='$username', nama='$nama', password='$password_hash' WHERE id_user='$id_user'");
   logAktivitas($_SESSION['id_user'], 'Update Profile', "User Melakukan Update Profile");
   header("location:" . BASE_URL . "index.php?&module=dashboard&action=index&notifupdate=success");

}
