<?php

if (!$_SESSION['role'] !== 'superadmin') {
    header("Location: login.php");
    exit;
}
