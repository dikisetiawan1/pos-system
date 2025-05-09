<?php
include_once 'function/koneksi.php';

// ambil parameter bulan dan tahun dari URL
$bulan = isset($_GET['bulan']) ? $_GET['bulan'] : '';
$tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y'); // default tahun sekarang
$notifupdate = isset($_GET['notifupdate']) ? $_GET['notifupdate'] : false;  
$notifbackup = isset($_GET['notifbackup']) ? $_GET['notifbackup'] : false;  

// untuk menampilkan data transaksi berdasarkan bulan dan tahun yang dipilih
// chart line data transaksi per hari
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

// chart pie 5 data produk terlaris
$query = "SELECT transactions_detail.nama_produk, SUM(transactions_detail.jumlah) as total_terjual
          FROM transactions_detail
          JOIN products ON products.id_produk = transactions_detail.kode_produk
          GROUP BY products.id_produk
          ORDER BY total_terjual DESC
          LIMIT 10";
$result = mysqli_query($koneksi, $query);

// siapkan data
$labels = [];
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['nama_produk'];
    $data[] = $row['total_terjual'];
}

// encode ke JSON untuk Chart.js
$labels_json = json_encode($labels);
$data_json = json_encode($data); 
// end:chart pie 5 data produk terlaris

// notif success update password users
if($notifupdate == 'success'){
  echo '<script>Swal.fire({
      title: "Data updated successfully!",
      text: "You clicked the button!",
      icon: "success"
    });</script>';  
}
// notif success backup database
if($notifbackup == 'success'){
  echo '<script>Swal.fire({
      title: "Database backup successfully!",
      text: "You clicked the button!",
      icon: "success"
    });</script>';  
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
                  <?php
                         if($_SESSION['role'] == 'cashier' ){
                          echo"
                          <a href='#'
                          class='small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover'> detail <i class='bi bi-link-45deg'></i></a>";
                           }else{
                             echo"
                              <a href='".BASE_URL . "index.php?&module=product&action=list'
                              class='small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover'> detail <i class='bi bi-link-45deg'></i></a>";}       
                         ?>     
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
                  <?php
                         if($_SESSION['role'] == 'cashier' ){
                          echo"
                          <a href='#'
                          class='small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover'> detail <i class='bi bi-link-45deg'></i></a>";
                           }else{
                             echo"
                              <a href='".BASE_URL . "index.php?&module=productCategory&action=list'
                              class='small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover'> detail <i class='bi bi-link-45deg'></i></a>";}     
                         ?>   
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

                  <?php
                         
                         if($_SESSION['role'] == 'cashier' ){
                          echo"
                          <a href='#'
                          class='small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover'> detail <i class='bi bi-link-45deg'></i></a>";
                           }else{
                             echo"
                              <a href='".BASE_URL . "index.php?&module=salesRiwayatHistory&action=list'
                              class='small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover'> detail <i class='bi bi-link-45deg'></i></a>";}       
                         ?>   
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
                  <?php 
                         if($_SESSION['role'] == 'cashier' ){
                          echo"
                          <a href='#'
                          class='small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover'> detail <i class='bi bi-link-45deg'></i></a>";
                           }else{
                             echo"
                              <a href='".BASE_URL . "index.php?&module=users&action=list'
                              class='small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover'> detail <i class='bi bi-link-45deg'></i></a>";}       
                         ?>   
                </div>
                <!--end::Small Box Widget 4-->
              </div>
              <!--end::Col-->
              <!-- row filter bulan dan tahun -->
              <div class="row mt-5">
                <div class="col-8 card">
                  <!-- form untuk filter bulan -->
                  <form method="GET" class="mb-4 mt-4">
                  <h3 class="mb-4">Transactions Per Day (Line Chart)</h3>
                <div class="input-group mb-3">  
                <label for="bulan" class="form-label"> Filter Months & Years :     </label> 
                <select name="bulan" class="form-control" id="bulan" onchange="this.form.submit()">
                  <option value="">All Months</option>
                  <?php
                  for ($i = 1; $i <= 12; $i++) {
                    $selected = (isset($_GET['bulan']) && $_GET['bulan'] == $i) ? 'selected' : '';
                    echo "<option value='$i' $selected>" . date('F', mktime(0, 0, 0, $i, 10)) . "</option>";
                  }
                  ?>
                </select>
                <select name="tahun" class="form-control" id="tahun" onchange="this.form.submit()">
                  <option value="">All Years</option>
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
               
              <!-- chart grafik transaksi -->
              <canvas id="grafikTransaksi" height="350" ></canvas>
                <script>
                    const cty = document.getElementById('grafikTransaksi').getContext('2d');
                    const grafikTransaksi = new Chart(cty, {
                        type: 'line', // atau 'bar'
                        data: {
                            labels: <?= json_encode($tanggal) ?>,
                            datasets: [{
                                label: 'Total Transactions per day',
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
                                        text: 'Date'
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Total Transactions per day'
                                    },
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
                </div>
            <!-- end col chart -->
            <!-- produk terlaris pie chart -->
              <div class="col-4 card">
                <h3 class="mb-3 mt-4 "> 10 Best Selling Product (Pie Chart)</h3>
                <canvas id="produkTerlarisChart" width="50" height="50"></canvas>
                <script>
                  const ctx = document.getElementById('produkTerlarisChart').getContext('2d');

                  const data = {
                    labels: <?= $labels_json ?>,
                    datasets: [{
                      label: 'Produk Terlaris',
                      data: <?= $data_json ?>,
                      backgroundColor: [
                        '#4e73df',
                        '#1cc88a',
                        '#36b9cc',
                        '#f6c23e',
                        '#e74a3b',
                        '#FF0B55',
                        '#4E1F00',
                        '#006A71',
                        '#4F1C51',
                        '#F38C79'
                      ],
                      borderColor: '#fff',
                      borderWidth: 1
                    }]
                  };

                  const config = {
                    type: 'pie',
                    data: data,
                    options: {
                      responsive: true,
                      plugins: {
                        legend: {
                          position: 'bottom'
                        }
                      }
                    }
                  };

                  new Chart(ctx, config);
                </script>
                </div>
                </div>
                <!-- end:row -->

            </div>
            <!-- end:chart grafik transaksi -->
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
    