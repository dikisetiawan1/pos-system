<?php
include_once 'function/koneksi.php';

// ambil parameter bulan dan tahun dari URL
$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y'); // default tahun sekarang

$query = "SELECT DATE(tgl) as tanggal, COUNT(*) as jumlah 
          FROM transactions 
          WHERE YEAR(tgl) = '$tahun'";

if (!empty($bulan)) {
    $query .= " AND MONTH(tgl) = '$bulan'";
}
$query .= " GROUP BY DATE(tgl) ORDER BY tanggal ASC";
$result = mysqli_query($koneksi, $query);

// tampung data
$tanggal = [];
$jumlah = [];

while ($row = mysqli_fetch_assoc($result)) {
    $tanggal[] = $row['tanggal'];
    $jumlah[] = $row['jumlah'];
}
?>

   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">My Dashboard</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <!--begin::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 1-->
                <div class="small-box text-bg-primary">
                  <div class="inner">
                    <h3><?php  $query = "SELECT * FROM products";
                  $result = mysqli_query($koneksi, $query);
                  if($result->num_rows == null){
                    echo 0;
                  }else{
                    echo $result->num_rows;
                  } ?></h3> 
                    <p>Products</p>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                  >
                    <path
                      d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                    ></path>
                  </svg>
                  <a
                    href="<?php echo BASE_URL . "index.php?&module=product&action=list"; ?>"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    detail <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
                <!--end::Small Box Widget 1-->
              </div>
              <!--end::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 2-->
                <div class="small-box text-bg-success">
                  <div class="inner">
                  <h3><?php  $query = "SELECT * FROM kategori";
                  $result = mysqli_query($koneksi, $query);
                  if($result->num_rows == null){
                    echo 0;
                  }else{
                    echo $result->num_rows;
                  } ?></h3></h3>
                    <p>Product Categories</p>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                  >
                    <path
                      clip-rule="evenodd"
                      fill-rule="evenodd"
                      d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z"
                    ></path>
                    <path
                      clip-rule="evenodd"
                      fill-rule="evenodd"
                      d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z"
                    ></path>
                  </svg>
                  <a
                    href="<?php echo BASE_URL . "index.php?&module=productCategory&action=list"; ?>"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    detail <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
                <!--end::Small Box Widget 2-->
              </div>
              <!--end::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 3-->
                <div class="small-box text-bg-warning">
                  <div class="inner">
                  <h3><?php  $query = "SELECT * FROM transactions";
                  $result = mysqli_query($koneksi, $query);
                  if($result->num_rows == null){
                    echo 0;
                  }else{
                    echo $result->num_rows;
                  } ?></h3>
                    <p>Transactions</p>
                  </div>

                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                  >
                    <path
                      d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                    ></path>
                  </svg>
                  
                 
                  <a
                    href="<?php echo BASE_URL . "index.php?&module=salesRiwayatHistory&action=list"; ?>"
                    class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    detail <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
                <!--end::Small Box Widget 3-->
              </div>
              <!--end::Col-->
              <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 4-->
                <div class="small-box text-bg-danger">
                  <div class="inner">
                  <h3><?php  $query = "SELECT * FROM users";
                  $result = mysqli_query($koneksi, $query);
                  if($result->num_rows == null){
                    echo 0;
                  }else{
                    echo $result->num_rows;
                  } ?></h3>
                    <p>User active</p>
                  </div>
                  <svg
                    class="small-box-icon"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                  >
                    <path
                      d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"
                    ></path>
                  </svg>
                
                  <a
                    href="#"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                  >
                    detail <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
                <!--end::Small Box Widget 4-->
              </div>
              <!--end::Col-->
              <!-- row filter bulan dan tahun -->
              <div class="row">
                <div class="col-4">
                  <!-- form untuk filter bulan -->
                  <form method="GET" class="mb-4"  style="margin-top: 70px;">
                  <h3 class="mb-4">Grafik Transactions</h3>
                <div class="input-group mb-3">
                <label for="bulan" class="form-label"> Filter Bulan & Tahun :   </label> 
                <select name="bulan" class="form-control" id="bulan" onchange="this.form.submit()">
                  <option value="">Semua</option>
                  <?php
                  for ($i = 1; $i <= 12; $i++) {
                    $selected = (isset($_GET['bulan']) && $_GET['bulan'] == $i) ? 'selected' : '';
                    echo "<option value='$i' $selected>" . date('F', mktime(0, 0, 0, $i, 10)) . "</option>";
                  }
                  ?>
                </select>

                <select name="tahun" class="form-control" id="tahun" onchange="this.form.submit()">
                  <option value="">Semua</option>
                <?php
                $startYear = 2020; // tahun awal
                $currentYear = date('Y'); // tahun sekarang

                for ($y = $startYear; $y <= $currentYear; $y++) {
                  $selected = (isset($_GET['tahun']) && $_GET['tahun'] == $y) ? 'selected' : '';
                  echo "<option value='$y' $selected>$y</option>";
                }
                ?>
              </select>
                <!-- end:filter bulan dan tahun -->
                </div>
                </form>
                </div>
              </div>
              
              <!-- chart grafik transaksi -->
              <canvas id="grafikTransaksi" height="250"></canvas>
                <script>
                    const ctx = document.getElementById('grafikTransaksi').getContext('2d');
                    const grafikTransaksi = new Chart(ctx, {
                        type: 'line', // atau 'bar'
                        data: {
                            labels: <?= json_encode($tanggal) ?>,
                            datasets: [{
                                label: 'Jumlah Transaksi per Hari',
                                data: <?= json_encode($jumlah) ?>,
                                borderColor: 'rgba(75, 192, 192, 1)',
                                // backgroundColor: 'rgb(192, 75, 75)',
                                fill: true,
                                tension: 0.3
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Tanggal'
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Jumlah Transaksi'
                                    },
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>

            </div>
            <!-- end:chart grafik transaksi -->
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
    