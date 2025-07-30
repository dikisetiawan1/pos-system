<?php
$cetaklevel = $_SESSION['role'];
if($cetaklevel == 'cashier'  ){
  echo '<script>window.location.href = "'.BASE_URL.'index.php?page=dashboard";</script>';
  exit;
}
// Query transactions
$query = "SELECT transactions.tgl, transactions.id, transactions.total, transactions.bayar, transactions.kembalian,transactions.keuntungan, users.nama FROM transactions INNER JOIN users ON users.id_user = transactions.id_user WHERE 1=1";

// Mengurutkan hasil data transaksi terbaru
$query .= " ORDER BY tgl DESC";

$result = mysqli_query($koneksi, $query);
?>

   <!--begin::App Main-->   
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Report Transactions</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Menu</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Report Transactions</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
              <div class="col mt-5 mb-5">
          
              <!-- filter form rentang tanggal--> 
                        <!-- row -->
            <div class="row">
              <div class="col-4">
              <form action="<?php echo BASE_URL."module/salesReport/cetak_laporan_pdf.php"?>" method="get">
              <label for="tgl_m ulai" class="form-label">From</label>
            <input type="date" name="tgl_mulai" class="form-control" required>
            <label for="tgl_mulai" class="form-label">To</label>
            <input type="date" name="tgl_sampai" class="form-control"  required>
            <button type="submit" class="btn btn-primary mt-2 mb-4">Export PDF</button>
          </form>
              </div>

              <div class="col-4">
            <form action="<?php echo BASE_URL."module/salesReport/export_laporan_excel.php"?>" method="get">
              <label for="tgl_mulai" class="form-label">From</label>
              <input type="date" name="tgl_mulai"  class="form-control"required>
              <label for="tgl_mulai" class="form-label">To</label>
              <input type="date" name="tgl_sampai" class="form-control" required>
            <button type="submit" class="btn btn-success mt-2 mb-4">Export Excel</button>
          </form>
              </div>
            </div>
          <!-- end:filter rentang tanggal -->

                  <!-- Tabel Laporan -->
                  <table id="example" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>ID Transaction</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Change</th>
                        <th>Profit</th>
                        <th>User</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                          <tr>
                            <td><?= date('d-m-Y', strtotime($row['tgl'])) ?></td>
                            <td><?= $row['id'] ?></td>
                            <td>Rp<?= number_format($row['total'], 0, ',', '.') ?></td>
                            <td>Rp<?= number_format($row['bayar'], 0, ',', '.') ?></td>
                            <td>Rp<?= number_format($row['kembalian'], 0, ',', '.') ?></td>
                            <td>Rp<?= number_format($row['keuntungan'], 0, ',', '.') ?></td>
                            <td><?= $row['nama'] ?></td>
                          </tr>
                        <?php endwhile; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="5" class="text-center">Transaction Not Found.</td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

    
       

                