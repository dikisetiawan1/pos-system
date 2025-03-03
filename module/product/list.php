<?php
// Path: module/product/list.php
// ambil data dari URL yang dikirim
  $notif = isset($_GET['notif']) ? $_GET['notif'] : false;          
  $notifupdate = isset($_GET['notifupdate']) ? $_GET['notifupdate'] : false;     
  $notifdelete = isset($_GET['notifdelete']) ? $_GET['notifdelete'] : false;     
// ambil data dari URL yang dikirim
  $id_produk = isset($_GET['id_produk']) ? $_GET['id_produk'] : false;
  mysqli_query($koneksi, "DELETE FROM products WHERE id_produk='$id_produk'");
  ?>

   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Product Menu</h3></div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fas fa-plus" style="color: #ffffff;"></i> Product
            </button>
            <button href="#" type="button" class="btn btn-danger"><i class="far fa-file-excel" style="color: #ffffff;"></i></i></button>
              <button href="#" type="button" class="btn btn-info"><i class="fas fa-print" style="color: #ffffff;"></i></button>
              </div>
              </div>
              <div class="col mt-2">
<!-- tampilkan alert notifikasi yg diambil dri url -->
              <?php
              if($notif == 'success'){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Data berhasil disimpan.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'; 
              }elseif($notifupdate == 'success'){
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Data berhasil diubah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
              }elseif($notifdelete == 'success'){
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Data berhasil dihapus.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
              }elseif($notif == 'failed'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Failed!</strong> Data gagal disimpan, ID Produk harus beda.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
              }
              ?>
                <div class="card mt-4 p-4">
                  <!-- start:table -->  
              <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                $query = "SELECT * FROM products";
                $result = mysqli_query($koneksi, $query);
                if($result->num_rows > 0){
                    
                while ($item = mysqli_fetch_assoc($result)) {
                  echo "
                      <tr>
                        <td>$item[id_produk]</td>
                        <td>$item[nama_produk]</td>
                        <td>$item[id_kategori]</td>
                        <td>$item[stok]</td>
                        <td>$item[satuan]</td>
                        <td> ".rupiah($item['harga'])."</td>
                        <td> <a href='" . BASE_URL . "index.php?&module=product&action=form&id_produk=$item[id_produk]' type='button' class='btn btn-warning' ><i class='fas fa-edit'></i></a>  
                        <a href='" . BASE_URL . "index.php?&module=product&action=list&id_produk=$item[id_produk]&notifdelete=success' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td>
                      ";
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
                  <!-- start:pagination -->
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end mt-2 ">
                      <li class="page-item">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
                  <!-- end:pagination -->
                </div>
              </div>
            </div>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

      <!-- modal -->
      <!-- Button trigger modal -->
            <!-- Modal -->
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
                  <form action="<?php echo BASE_URL . "module/product/action.php"; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="id_produk" class="form-label">Product Id <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="id_produk" name="id_produk" aria-describedby="id_produk" placeholder="Contoh: PR001" required>
                    </div>
                    <div class="mb-3">
                      <label for="nama_produk" class="form-label">Product name <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="nama_produk"  name="nama_produk" aria-describedby="nama_produk" placeholder="Contoh: Indomie" required>
                    </div>
                    <div class="mb-3">
                      <label for="id_kategori" class="form-label">Category <span style="color: red; font-size:20px">*</span></label>
                     <select name="id_kategori" id="id_kategori" class="form-control" required>
                      <option value="" selected>--Select option category--</option>
                      <option value="makanan">Makanan</option>
                      <option value="minuman">Minuman</option>  
                      <option value="Alat_tulis">Alat tulis</option>
                      <option value="others">Others</option>
                     </select>
                    </div>
                    <div class="mb-3">
                      <label for="stok" class="form-label">Stock <span style="color: red; font-size:20px">*</span></label>
                      <input type="number" class="form-control" id="stok"  name="stok"  aria-describedby="stok" placeholder="0" required>
                    </div>
                    <div class="mb-3">
                      <label for="satuan" class="form-label">Satuan <span style="color: red; font-size:20px">*</span></label>
                     <select name="satuan" id="satuan" class="form-control" required>
                      <option value="" selected>--Select option satuan--</option>
                      <option value="Pcs">Pcs</option>
                      <option value="Pack">Pack</option>
                      <option value="g">Gram (g)</option>
                      <option value="kg">Kilo gram (kg)</option>
                      <option value="liter">Liter (L)</option>
                      <option value="lusin">Lusin</option>
                      <option value="Box">Box</option>
                      <option value="rim">Rim</option>
                      <option value="carton">carton</option>
                     </select>
                    </div>
                    <div class="mb-3">
                      <label for="harga" class="form-label">Price <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="harga"  name="harga"  aria-describedby="harga" placeholder="Contoh : 10000" required>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="button" value="send" class="btn btn-success"><i class="fas fa-paper-plane" style="color: #ffffff;"></i></button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel </button>
                  </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
                  <!-- end:modal -->

                