<?php
define("BASE_URL", "http://localhost/pos/");


// fungsi untuk membuat format rupiah
function rupiah($nilai = 0){
    $string = "Rp. " . number_format($nilai);
    return $string;
}


// function log aktivitas users ketika mekases sistem
function logAktivitas($id_user, $aksi, $keterangan = null) {
    global $koneksi;

    $aksi = mysqli_real_escape_string($koneksi, $aksi);
    $keterangan = mysqli_real_escape_string($koneksi, $keterangan);

    $query = "INSERT INTO log_aktivitas (id_user, aksi, keterangan) 
              VALUES ('$id_user', '$aksi', '$keterangan')";
    mysqli_query($koneksi, $query);
}

?>