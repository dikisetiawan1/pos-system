<?php
$cetaklevel = $_SESSION['role'];
if($cetaklevel == 'cashier' ){
  echo '<script>window.location.href = "'.BASE_URL.'index.php?page=dashboard";</script>';
  exit;
}
// Path: module/product/list.php
// ambil data dari URL yang dikirim
  $notif = isset($_GET['notif']) ? $_GET['notif'] : false;          
  $notifupdate = isset($_GET['notifupdate']) ? $_GET['notifupdate'] : false;     
  $notifdelete = isset($_GET['notifdelete']) ? $_GET['notifdelete'] : false;
  // ambil id yg dikirim untuk proses hapus item
  $id_produk = isset($_GET['id_produk']) ? $_GET['id_produk'] : false;
  mysqli_query($koneksi, "DELETE FROM products WHERE id_produk='$id_produk'");
  logAktivitas($_SESSION['id_user'], 'Hapus Produk', "Hapus produk ID: $id_produk");
  ?>



   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Products Barcode List</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Menu</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product List</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?php echo BASE_URL . "module/product/export.php"; ?>" class="btn btn-primary">Export</a>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fas fa-plus" style="color: #ffffff;"></i> Product
            </button>
            
              </div>
              </div>
              <div class="col mt-2">
            <!-- start:notifikasi -->
            <!-- tampilkan alert notifikasi yg diambil dri url parameter -->
              <?php
              if($notif == 'success'){
                echo '<script>Swal.fire({
                    title: "Data added successfully!",
                    text: "You clicked the button!",
                    icon: "success"
                  });</script>';  
             
              }elseif($notifupdate == 'success'){
                echo '<script>Swal.fire({
                  title: "Data update successfully!",
                  text: "You clicked the button!",
                  icon: "success"
                });</script>'; 
              }elseif($notifdelete == 'success'){
                echo '<script>Swal.fire({
                  title: "Data deleted successfully!",
                  text: "You clicked the button!",
                  icon: "success"
                });</script>';
                
              }elseif($notif == 'failed'){
                echo '<script>Swal.fire({
                  title: "Data must be unique!",
                  text: "You clicked the button!",
                  icon: "error"
                });</script>'; }
              ?>
              <!-- end:notifikasi -->

                <div class="card  mt-3 p-4">
                  <!-- start:table -->  
              <table id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Barcode</th>
                        <th scope="col">Id Product</th>
                        <th scope="col">Product</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                $query = "SELECT * FROM barcode_product";
                $result = mysqli_query($koneksi, $query); ?>
                <?php foreach ($result as $i => $item): ?>
                      <tr>
                          <td><?= $i+1 ?></td>
                          <td>
                              <svg class="barcode" jsbarcode-format="CODE128"
                                  jsbarcode-value="<?= $item['id_product_barcode'] ?>" 
                                  jsbarcode-textmargin="0" 
                                  jsbarcode-height="40" 
                                  jsbarcode-fontSize="14">
                                </svg>  
                          </td>
                          <td><?= $item['id_product_barcode'] ?></td>
                          <td><?= $item['label_product'] ?></td>
                          <td>
                              <a href="?hapus=<?= $row['id'] ?>" class="btn btn-danger" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                          </td>
                      </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                                  
               
                  <!-- end:table -->
                </div>
              </div>
            </div>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

    
            <!-- Form Modal input barang -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content"> 
                  <div class="modal-header">
                    <h5 class="modal-title  fw-bolder" id="staticBackdropLabel">Form Product <br>
                    <span style="color: red; font-size:12px">*  <span  class="text-capitalize ">kolom input wajib diisi.</span></span>
                  </h5> <br>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <form action="<?php echo BASE_URL . "module/productBarcode/generate.php"; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3" >
                      <label for="label_product" class="form-label">Product Label<span style="color: red; font-size:20px" >*</span></label>
                      <input type="text" class="form-control" id="label_product" name="label_product" aria-describedby="label_product" oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                   
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel </button>
                      <button type="submit" value="send" class="btn btn-success"><i class="fas fa-paper-plane" style="color: #ffffff;"></i></button>
                  </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
                  <!-- end:modal -->

 <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
  <script>
        JsBarcode(".barcode").init();
  </script> 

                