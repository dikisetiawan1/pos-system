<?php
session_start();
include_once '../../function/helper.php';
include_once '../../function/koneksi.php';


// Fungsi generate kode acak 13 digit// Fungsi generate 13 digit angka acak
function generateCode($length = 13) {
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= mt_rand(0, 9);
    }
    return $code;
}
// Fungsi untuk generate kode unik
function generateUniqueCode($koneksi, $length = 13) {
    do {
        $code = generateCode($length);
        $sql  = "SELECT COUNT(*) as total FROM barcode_product WHERE id_product_barcode  = '$code'";
        $result = mysqli_query($koneksi, $sql);
        $data = mysqli_fetch_assoc($result);
    } while ($data['total'] > 0);
    return $code;
}

//simpan ke database
$label_product = $_POST['label_product'];
$id_product_barcode = generateUniqueCode($koneksi);

// Simpan ke tabel
$sql = "INSERT INTO barcode_product (label_product, id_product_barcode) VALUES ('$label_product', '$id_product_barcode')";
if (mysqli_query($koneksi, $sql)) {
  header("location:" . BASE_URL . "index.php?&module=productBarcode&action=list&notif=success");
} else {
    echo "Gagal menyimpan: " . mysqli_error($koneksi);
}
