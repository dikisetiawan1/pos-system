<?php
session_start();
include 'function/helper.php';
include 'function/koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT users.id_user, users.username, users.password, users.nama, users.role, role.id_role, role.nama_role FROM users INNER JOIN role ON users.role = role.id_role  WHERE username='$username'");

if ($user = mysqli_fetch_assoc($query)) {
    if (password_verify($password, $user['password'])) {
        // Buat session login
        $_SESSION['login'] = true;
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['role'] = $user['nama_role']; // misalnya: admin, kasir
        $_SESSION['last_activity'] = time();
        logAktivitas($user['id_user'], 'Login', 'Login ke sistem');
        header("Location: index.php");
        exit;
    } else {
        echo "Password salah!";
    }
} else {
    echo "User tidak ditemukan!";
}
