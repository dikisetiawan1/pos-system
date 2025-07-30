<?php
// Koneksi database
include_once '../../function/koneksi.php';

$kode = strtoupper(trim($_GET['kode'] ?? ''));

$stmt = $koneksi->prepare("SELECT nama_produk, harga_beli, harga FROM products WHERE id_produk = ?");
$stmt->bind_param("s", $kode);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo json_encode($row);
} else {
    echo json_encode(['nama_produk' => '','harga_beli' =>0, 'harga' => 0]);
}

$stmt->close();
$koneksi->close();
