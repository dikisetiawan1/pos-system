<?php


// Query dasar
$query = "SELECT tgl, id, total, bayar, kembalian FROM transactions WHERE 1=1";

// Urutkan hasil
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
                  <li class="breadcrumb-item"><a href="#">Sales</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Report Transactions</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
              <div class="col mt-5">
            <!-- start:notifikasi -->

              <!-- filter form rentang tanggal--> 
                        <!-- row -->
            <div class="row">
              <div class="col-4">
              <form action="<?php echo BASE_URL."module/salesReport/cetak_laporan_pdf.php"?>" method="get">
              <label for="tgl_m ulai" class="form-label">From</label>
            <input type="date" name="tgl_mulai" class="form-control" required>
            <label for="tgl_mulai" class="form-label">To</label>
            <input type="date" name="tgl_sampai" class="form-control"  required>
            <button type="submit" class="btn btn-primary mt-2 mb-4">Download PDF</button>
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
                        <th>Tanggal</th>
                        <th>Kode Transaksi</th>
                        <th>Total</th>
                        <th>Bayar</th>
                        <th>Kembalian</th>
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
                          </tr>
                        <?php endwhile; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="5" class="text-center">Tidak ada transaksi ditemukan.</td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                <div class="card  mt-3 p-4">
                  <!-- start:table -->  
                </div>
              </div>
            </div>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

    
       

                