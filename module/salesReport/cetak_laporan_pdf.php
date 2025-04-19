<?php
require 'vendor/autoload.php';
include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Ambil rentang tanggal
$tgl_mulai = $_GET['tgl_mulai'];
$tgl_sampai = $_GET['tgl_sampai'];

// Query data
$query = "SELECT tgl, kode_transaksi, total, bayar, kembalian 
          FROM transactions 
          WHERE DATE(tgl) BETWEEN '$tgl_mulai' AND '$tgl_sampai'
          ORDER BY tgl ASC";

$result = mysqli_query($koneksi, $query);

// Buat HTML laporan
$html = "<h3>Laporan Transaksi</h3>";
$html .= "<p>Periode: " . date('d-m-Y', strtotime($tgl_mulai)) . " s/d " . date('d-m-Y', strtotime($tgl_sampai)) . "</p>";
$html .= "<table border='1' cellpadding='5' cellspacing='0' width='100%'>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kode Transaksi</th>
                    <th>Total</th>
                    <th>Bayar</th>
                    <th>Kembalian</th>
                </tr>
            </thead>
            <tbody>";

while ($row = mysqli_fetch_assoc($result)) {
    $html .= "<tr>
                <td>" . date('d-m-Y', strtotime($row['tgl'])) . "</td>
                <td>{$row['kode_transaksi']}</td>
                <td>Rp" . number_format($row['total'], 0, ',', '.') . "</td>
                <td>Rp" . number_format($row['bayar'], 0, ',', '.') . "</td>
                <td>Rp" . number_format($row['kembalian'], 0, ',', '.') . "</td>
              </tr>";
}

$html .= "</tbody></table>";

// Generate PDF
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Output PDF ke browser (langsung download)
$dompdf->stream("laporan_transaksi_$tgl_mulai-$tgl_sampai.pdf", ["Attachment" => 1]);
exit;
