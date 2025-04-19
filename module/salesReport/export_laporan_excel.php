<?php
include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

$tgl_mulai = $_GET['tgl_mulai'];
$tgl_sampai = $_GET['tgl_sampai'];

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_transaksi_$tgl_mulai-$tgl_sampai.xls");

$query = "SELECT tgl, id, total, bayar, kembalian
          FROM transactions 
          WHERE DATE(tgl) BETWEEN '$tgl_mulai' AND '$tgl_sampai'
          ORDER BY tgl ASC";
$result = mysqli_query($koneksi, $query);
?>

<h3>Report Transaction</h3>
<p>Periode: <?= date('d-m-Y', strtotime($tgl_mulai)) ?> s/d <?= date('d-m-Y', strtotime($tgl_sampai)) ?></p>

<table border="1" cellpadding="5" cellspacing="0">
  <thead>
    <tr>
      <th>Date</th>
      <th>Transaction Code</th>
      <th>Total</th>
      <th>Payment</th>
      <th>Change</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
      <td><?= date('d-m-Y', strtotime($row['tgl'])) ?></td>
      <td><?= $row['id'] ?></td>
      <td><?= $row['total'] ?></td>
      <td><?= $row['bayar'] ?></td>
      <td><?= $row['kembalian'] ?></td>

    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
