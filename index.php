<!doctype html>
<html lang="en">
 <?php  

include 'cek_login.php';
 include 'function/koneksi.php';
 include 'function/helper.php';
 include 'layout/header.php';


//  $page = isset($_GET['page']) ? $_GET['page'] : false;
 $module = isset($_GET['module']) ? $_GET['module'] : false;
 $action = isset($_GET['action']) ? $_GET['action'] : false;

 ?> 
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
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
          // echo "The file $filename does not exist";
            include_once("module/dashboard/index.php");
        }
      ?>

     <!--end::App Main-->
      <?php
      include 'layout/footer.php';
      ?>
  </body>

</html>