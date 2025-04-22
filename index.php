<!doctype html>
<html lang="en">
 <?php  

include 'function/koneksi.php';
include 'function/helper.php';
include 'layout/header.php';
include 'cek_login.php';


//  $page = isset($_GET['page']) ? $_GET['page'] : false;
 $module = isset($_GET['module']) ? $_GET['module'] : 'dashboard';
 $action = isset($_GET['action']) ? $_GET['action'] : 'index';

 ?> 
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper ">
      <!--begin::Navbar-->
      <?php
      include 'components/navbar.php';
      ?>
      <!--end::Navbar-->
      <!--begin::Sidebar-->
      
      <?php
     include 'layout/sidebar.php';
     ?>
      <!--end::Sidebar-->
      
      <!--begin::Main-->
      <?php 
        $filename = "module/$module/$action.php";
          
        if (file_exists($filename)) {
            include_once($filename);
        } else {
                echo '<script>Swal.fire({
              title: "Error 404!",
              text: "Page Not Found!",
              icon: "error"
            });</script>';
            // include_once("module/dashboard/index.php");
            // include_once("404.php");
        }
      ?>

     <!--end::App Main-->
      <?php
      include 'layout/footer.php';
      ?>
  </body>

</html>