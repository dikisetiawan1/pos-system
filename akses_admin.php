<?php

if ($_SESSION['role'] == 'admin') {
    header("Location: login.php");
    exit;
}
