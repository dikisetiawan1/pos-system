<?php


include_once 'function/helper.php';
include_once 'function/koneksi.php';
// Ambil filter dari form
$filter_tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';
$filter_bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';
$filter_tahun = isset($_GET['tahun']) ? $_GET['tahun'] : '';

// Query dasar
$query = "SELECT tgl, id, total, bayar, kembalian FROM transactions WHERE 1=1";

// Filter berdasarkan tanggal
if (!empty($filter_tanggal)) {
    $query .= " AND DATE(tgl) = '$filter_tanggal'";
}

// Filter berdasarkan bulan
if (!empty($filter_bulan)) {
    $query .= " AND MONTH(tgl) = '$filter_bulan'";
}

// Filter berdasarkan tahun
if (!empty($filter_tahun)) {
    $query .= " AND YEAR(tgl) = '$filter_tahun'";
}

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
           <!-- filter form -->
                <form method="GET" class="mb-3">
                  <div class="row g-2">
                    <div class="col">
                      <label for="tanggal">Tanggal:</label>
                      <input type="date" name="tanggal" class="form-control" value="<?= $filter_tanggal ?>">
                    </div>
                    <div class="col">
                      <label for="bulan">Bulan:</label>
                      <select name="bulan" class="form-control">
                        <option value="">Semua</option>
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                          $selected = ($filter_bulan == $i) ? 'selected' : '';
                          echo "<option value='$i' $selected>" . date('F', mktime(0, 0, 0, $i, 10)) . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col">
                      <label for="tahun">Tahun:</label>
                      <select name="tahun" class="form-control">
                        <option value="">Semua</option>
                        <?php
                        $currentYear = date('Y');
                        for ($y = 2020; $y <= $currentYear; $y++) {
                          $selected = ($filter_tahun == $y) ? 'selected' : '';
                          echo "<option value='$y' $selected>$y</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col align-self-end">
                      <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                  </div>
                </form>

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

    
       

                