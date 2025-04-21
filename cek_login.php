<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Set waktu timeout dalam detik (contoh: 15 menit)
$timeout = 1800; // 1800 detik = 30 menit

// Cek apakah user sudah login
if (!isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

// Cek waktu aktif terakhir
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    // Waktu idle melebihi batas, hapus session
    session_unset();
    session_destroy();
    header("Location: login.php?timeout=true");
    exit;
}

// Update waktu aktif terakhir
$_SESSION['last_activity'] = time();