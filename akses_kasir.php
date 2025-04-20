<?php

if (!$_SESSION['role'] !== 'kasir') {
    header("Location: login.php");
    exit;
}
