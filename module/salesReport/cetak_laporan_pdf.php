<?php
require '../../vendor/autoload.php';
include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$tgl_mulai = $_GET['tgl_mulai'];
$tgl_sampai = $_GET['tgl_sampai'];

$query = "SELECT tgl, id, total, bayar, kembalian
          FROM transactions 
          WHERE DATE(tgl) BETWEEN '$tgl_mulai' AND '$tgl_sampai'
          ORDER BY tgl ASC";

$result = mysqli_query($koneksi, $query);

// Inisialisasi subtotal
$total_all = 0;
$bayar_all = 0;
$kembalian_all = 0;

$html = "<h3>Report Transaction</h3>";
$html .= "<p>Periode: " . date('d-m-Y', strtotime($tgl_mulai)) . " s/d " . date('d-m-Y', strtotime($tgl_sampai)) . "</p>";
$html .= "<table border='1' cellpadding='5' cellspacing='0' width='100%'>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Transaction Code</th>
                    <th>Total</th>
                    <th>Payment</th>
                    <th>Change</th>
                </tr>
            </thead>
            <tbody>";

while ($row = mysqli_fetch_assoc($result)) {
    $html .= "<tr>
                <td>" . date('d-m-Y', strtotime($row['tgl'])) . "</td>
                <td>{$row['id']}</td>
                <td>Rp" . number_format($row['total'], 0, ',', '.') . "</td>
                <td>Rp" . number_format($row['bayar'], 0, ',', '.') . "</td>
                <td>Rp" . number_format($row['kembalian'], 0, ',', '.') . "</td>
              </tr>";

    // Tambah ke subtotal
    $total_all += $row['total'];
    
}

// Tambah baris subtotal
$html .= "<tr style='font-weight: bold; background-color: #eee;'>
            <td colspan='2' align='center'>Subtotal</td>
            <td>Rp" . number_format($total_all, 0, ',', '.') . "</td>
          </tr>";

$html .= "</tbody></table>";

// Generate PDF
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream("laporan_transaksi_$tgl_mulai-$tgl_sampai.pdf", ["Attachment" => 1]);
exit;
