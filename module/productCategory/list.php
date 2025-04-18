
<?php
// Path: module/product/list.php
// ambil data dari URL yang dikirim
  $notif = isset($_GET['notif']) ? $_GET['notif'] : false;          
  $notifupdate = isset($_GET['notifupdate']) ? $_GET['notifupdate'] : false;     
  $notifdelete = isset($_GET['notifdelete']) ? $_GET['notifdelete'] : false;
  // ambil id yg dikirim untuk proses hapus item
  $id_kategori = isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;
  mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id_kategori'");


  // Ambil kode terakhir dari tabel produk
$query = $koneksi->query("SELECT MAX(id_kategori) as id_terakhir FROM kategori");
$data = $query->fetch_assoc();
$id_baru = '';

// Jika belum ada data
if ($data['id_terakhir'] == null) {
    $id_baru = 1;
} else {
    $id_baru = $data['id_terakhir'] + 1;
   
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
              <div class="col-sm-6"><h3 class="mb-0">Product Categories</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Product</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product Categories</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?php echo BASE_URL . "module/productCategory/export.php"; ?>" class="btn btn-primary">Export</a>
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalCategoryProduct">
            <i class="fas fa-plus" style="color: #ffffff;"></i> Categories
            </button>
            
              </div>
              </div>
              <div class="col mt-2">
            <!-- start:notifikasi -->
            <!-- tampilkan alert notifikasi yg diambil dri url parameter -->
              <?php
              if($notif == 'success'){
                echo '<script>Swal.fire({
                    title: "Data berhasil ditambahkan!",
                    text: "You clicked the button!",
                    icon: "success"
                  });</script>';  
             
              }elseif($notifupdate == 'success'){
                echo '<script>Swal.fire({
                  title: "Data berhasil diubah!",
                  text: "You clicked the button!",
                  icon: "success"
                });</script>'; 
              }elseif($notifdelete == 'success'){
                echo '<script>Swal.fire({
                  title: "Data berhasil dihapus!",
                  text: "You clicked the button!",
                  icon: "success"
                });</script>';
                
              }elseif($notif == 'failed'){
                echo '<script>Swal.fire({
                  title: "Data tidak boleh duplikat!",
                  text: "You clicked the button!",
                  icon: "error"
                });</script>'; }
              ?>
              <!-- end:notifikasi -->

                <div class="card mt-3 p-4">
                  <!-- start:table -->  
              <table id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID Category</th>
                        <th scope="col">Flag</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                $query = "SELECT * FROM kategori";
                $result = mysqli_query($koneksi, $query);
                if($result->num_rows > 0){
               
                while ($item = mysqli_fetch_assoc($result)) {
                  echo "
                      <tr>
                       
                        <td>$item[id_kategori]</td>
                        <td>$item[flag]</td>
                        <td>$item[name]</td>
                        <td> <a href='" . BASE_URL . "index.php?&module=productCategory&action=form&id_kategori=$item[id_kategori]' type='button' class='btn btn-warning' ><i class='fas fa-edit'></i></a>  
                        <a href='" . BASE_URL . "index.php?&module=productCategory&action=list&id_kategori=$item[id_kategori]&notifdelete=success' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td>
                      </tr>";
                     
                    };
                   }else{
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Data belum ada!</strong> Silahkan inputkan data terlebih dahulu.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                   } ?>
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
            <div class="modal fade" id="modalCategoryProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content"> 
                  <div class="modal-header">
                    <h5 class="modal-title  fw-bolder" id="staticBackdropLabel">Form Product Categories <br>
                    <span style="color: red; font-size:12px">*  <span  class="text-capitalize ">kolom input wajib diisi.</span></span>
                  </h5> <br>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <form action="<?php echo BASE_URL . "module/productCategory/action.php"; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3" >
                      <label for="id_kategori" class="form-label">ID Categories <span style="color: red; font-size:20px" >*</span></label>
                      <input type="text" class="form-control" id="id_kategori" name="id_kategori" aria-describedby="id_kategori" placeholder="Contoh: PR001" required value="<?=  $id_baru ?>" readonly>
                    </div>
                    <div class="mb-3" >
                      <label for="flag" class="form-label">Flag <span style="color: red; font-size:20px" >*</span></label>
                      <input type="text" class="form-control" id="flag" name="flag" aria-describedby="flag" placeholder="Contoh: MKN" required oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Product Categories <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="name"  name="name" aria-describedby="name" placeholder="Contoh: Makanan" required oninput="this.value = this.value.toUpperCase()">
                    </div>
                   
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel </button>
                      <button type="submit" name="button" value="send" class="btn btn-success"><i class="fas fa-paper-plane" style="color: #ffffff;"></i></button>
                  </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
                  <!-- end:modal -->
                

                

