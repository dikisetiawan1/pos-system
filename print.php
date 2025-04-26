<?php
include_once 'function/helper.php';
include_once 'function/koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM transactions WHERE id = $id");
$transaksi = mysqli_fetch_assoc($query);

$query_detail = mysqli_query($koneksi, "SELECT * FROM transactions_detail WHERE transaksi_id = $id");
$query_toko = mysqli_query($koneksi, "SELECT * FROM toko");
$row_toko = mysqli_fetch_assoc($query_toko);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Struk Transaksi</title>
  <style>
    body {
      font-family:monospace;
      width: 58mm;
      margin: 0 auto;
      padding: 10px;
      font-size: 12px;
    }
    .center { text-align: center; font-weight: bold; }
    hr { border: none; border-top: 1px dashed #000; margin: 5px 0; }
    .item { display: flex; justify-content: space-between; }
    .small { font-size: 11px; }
    @media print {
      @page { size: 58mm auto; margin: 0; }
      body { margin: 0; }
    }
  </style>
</head>
<body onload="window.print()">

  <div class="center"><?= $row_toko['nama_toko'] ?></div>
  <div class="center"><?= $row_toko['alamat'] ?></div>
  <div class="center">Telp: <?= $row_toko['tlp'] ?></div>
  <hr>
  <div>Tanggal: <?= $transaksi['tgl'] ?></div>
  <hr>

  <?php while ($row = mysqli_fetch_assoc($query_detail)) : ?>
    <div class="item">
      <span><?= $row['nama_produk'] ?></span>
      <span><?= $row['jumlah'] ?> x <?= number_format($row['harga']) ?></span>
    </div>
    <div class="item small">
      <span>Subtotal:</span>
      <span>Rp <?= number_format($row['subtotal']) ?></span>
    </div>
  <?php endwhile; ?>

  <hr>
  <div class="item"><strong>Total</strong> <strong>Rp <?= number_format($transaksi['total']) ?></strong></div>
  <div class="item">Diskon <span>Rp <?= number_format($transaksi['diskon']) ?></span></div>
  <div class="item">Bayar <span>Rp <?= number_format($transaksi['bayar']) ?></span></div>
  <div class="item">Kembali <span>Rp <?= number_format($transaksi['kembalian']) ?></span></div>
  <hr>
  <div class="center"><?= $row_toko['footer'] ?></div>

</body>
<script>
  window.onafterprint = function () {
    window.location.href = "index.php?module=salesCashier&action=list&notiftransaksi=success";
  };
</script>
</html>
