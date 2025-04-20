<?php
if (!$_SESSION['role'] !== 'cashier') {
    header("Location: login.php");
    exit;
}
