
<?php
  // cek jika stock kurang dari 5 tampilkan alert stock menipis
  $stokquery = mysqli_query($koneksi, "SELECT nama_produk, stok FROM products WHERE stok < 10 ");
  $notifalert = $stokquery->num_rows;
  ?>
<!-- jam digital -->
  <style>
     .clock {
      color: navy;
      font-size: 24px;
      font-weight: bold ;
      padding: 5px 5px;
      border-radius: 15px;
    
    }
  </style>

<script>
  // jam digital
  function updateClock() {
      const now = new Date();
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');
      const seconds = String(now.getSeconds()).padStart(2, '0');

      document.getElementById('clock').textContent = `${hours}:${minutes}:${seconds}`;
    }
    // Update clock every second
    setInterval(updateClock, 1000);
    updateClock(); // initial call
</script>

<nav class="app-header navbar navbar-expand bg-secondary-subtle sticky-top" data-bs-theme="light">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Start Navbar Links-->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                <i class="bi bi-list"></i>
              </a>
            </li>
          <li class="nav-item">
          <div class="clock" id="clock">00:00:00</div>
          </li>
          </ul>
          <!--end::Start Navbar Links-->
          <!--begin::End Navbar Links-->
          <ul class="navbar-nav ms-auto">

            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-bs-toggle="dropdown" href="#">
                <i class="bi bi-bell-fill"></i>
                <span class="navbar-badge badge text-bg-danger p-2" ><?= $notifalert;?> -  Alert Stok</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <span class="dropdown-item dropdown-header" style="color: red; font-weight:600"><?= $notifalert;?> - Alert Stok Menipis</span>
                <div class="dropdown-divider"></div>
                <?php
                while ($item =  mysqli_fetch_assoc($stokquery)) {
                                  echo "
                                  <a href='#' class='dropdown-item'>
                                    <i class='fas fa-exclamation-circle' style='color: #8a3700;'></i> $item[nama_produk] - $item[stok] Stok Tersisa
                                  </a>
                                  
                                  ";
                          } 
                          ?>
            
              </div>
            </li>
            <!--end::Notifications Dropdown Menu-->
            <!--begin::Fullscreen Toggle-->
            <li class="nav-item">
              <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
              </a>
            </li>
            <!--end::Fullscreen Toggle-->
            <!--begin::User Menu Dropdown-->
            <li class="nav-item dropdown user-menu">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img
                  src="template/dist/assets/img/user2-160x160.jpg"
                  class="user-image rounded-circle shadow"
                  alt="User Image"
                />
                <span class="d-none d-md-inline">Diki Setiawan</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                <!--begin::User Image-->
                <li class="user-header text-bg-primary">
                  <img
                    src="template/dist/assets/img/user2-160x160.jpg"
                    class="rounded-circle shadow"
                    alt="User Image"
                  />
                  <p>
                    Diki setiawan
                    <small>Administrator</small>
                  </p>
                </li>
                <!--end::User Image-->
                <!--begin::Menu Footer-->
                <li class="user-footer">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                  <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>
                <!--end::Menu Footer-->
              </ul>
            </li>
            <!--end::User Menu Dropdown-->
          </ul>
          <!--end::End Navbar Links-->
        </div>
        <!--end::Container-->
      </nav>