<?php
include 'function/helper.php';
include 'function/koneksi.php';
session_start();

logAktivitas($_SESSION['id_user'], 'Logout', 'Logout dari sistem');
session_unset();
session_destroy();
header("Location: login.php");
exit;
