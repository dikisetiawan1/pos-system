<?php
session_start();
include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

// ambil data dari form
$id_produk = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$id_kategori = $_POST['id_kategori'];
$stok = $_POST['stok'];
$satuan = $_POST['satuan'];
$harga_beli = $_POST['harga_beli'];
$harga = $_POST['harga_reguler'] - $_POST['diskon_item'];
$harga_reguler = $_POST['harga_reguler'];
$produk_exp = $_POST['product_exp'];
$diskon_item = $_POST['diskon_item'];
$dis_rak = $_POST['dis_rak'];
$status_harga = $_POST['status_harga'];
$button = $_POST['button'];

// jika id produk belum ada dan button yang di klik adalah send
if ($button == "send") {
    //cek apakah id produk sudah ada atau belum
$cek_id = mysqli_query($koneksi, "SELECT * FROM products WHERE id_produk='$id_produk'");
$cek_produkName = mysqli_query($koneksi, "SELECT * FROM products WHERE nama_produk='$nama_produk' ");
if (mysqli_num_rows($cek_id) || mysqli_num_rows($cek_produkName) > 0 ) {
    // jika id produk sudah ada
    header("location:" . BASE_URL . "index.php?&module=product&action=list&notif=failed");
}else{
    mysqli_query($koneksi, "INSERT INTO products (id_produk, nama_produk, id_kategori, stok, satuan, harga_beli,harga, harga_reguler, product_exp, diskon_item, dis_rak, status_harga) 
       VALUES ('$id_produk','$nama_produk','$id_kategori','$stok','$satuan','$harga_beli','$harga',$harga_reguler,'$produk_exp', '$diskon_item','$dis_rak','$status_harga')");
       logAktivitas($_SESSION['id_user'], 'Add Produk', "Melakukan Penambahan Produk ID: $id_produk");
      header("location:" . BASE_URL . "index.php?&module=product&action=list&notif=success");
  
}}elseif ($button == "update") {
    // jika button yang di klik adalah update
   mysqli_query($koneksi, "UPDATE products SET nama_produk='$nama_produk', id_kategori='$id_kategori', stok='$stok', satuan='$satuan',harga_beli='$harga_beli', harga='$harga',harga_reguler='$harga_reguler', product_exp='$produk_exp', diskon_item='$diskon_item', dis_rak='$dis_rak', status_harga='$status_harga' WHERE id_produk='$id_produk'");
   logAktivitas($_SESSION['id_user'], 'Update Produk', "Melakukan Ubah Produk ID: $id_produk");
   header("location:" . BASE_URL . "index.php?&module=product&action=list&notifupdate=success");
}

