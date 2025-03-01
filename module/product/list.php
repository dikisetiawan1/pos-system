  

<?php
$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
if ($notif == 'success') {
    echo "<script>alert('Data berhasil ditambahkan')</script>"; }
    else {
        echo "<script>alert('Data gagal ditambahkan')</script>";
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
              <div class="col-sm-6"><h3 class="mb-0">Product Menu</h3></div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="row mt-5">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fas fa-plus" style="color: #ffffff;"></i> Product
            </button>
            <button href="#" type="button" class="btn btn-danger"><i class="far fa-file-excel" style="color: #ffffff;"></i></i></button>
              <button href="#" type="button" class="btn btn-info"><i class="fas fa-print" style="color: #ffffff;"></i></button>
              </div>
              </div>
              <div class="col">
                <div class="card mt-4 p-4">
                  <!-- start:table -->  
              <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                $query = "SELECT * FROM products";
                $result = mysqli_query($koneksi, $query);
                    
                while ($item = mysqli_fetch_assoc($result)) {
                  echo "
                      <tr>
                        <td>$item[id_produk]</td>
                        <td>$item[nama_produk]</td>
                        <td>$item[id_kategori]</td>
                        <td>$item[stok]</td>
                        <td>$item[satuan]</td>
                        <td> ".rupiah($item['harga'])."</td>
                        <td><a  href='' class='btn btn-warning me-2'><i class='fas fa-edit'></i></a>  
                        <a href='' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td>
                      ";
                   
                    }
                     ?>
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
                      <input type="text" class="form-control" id="id_produk" name="id_produk" aria-describedby="id_produk" placeholder="Contoh: PR001">
                    </div>
                    <div class="mb-3">
                      <label for="nama_produk" class="form-label">Product name <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="nama_produk"  name="nama_produk" aria-describedby="nama_produk" placeholder="Contoh: Indomie">
                    </div>
                    <div class="mb-3">
                      <label for="id_kategori" class="form-label">Category <span style="color: red; font-size:20px">*</span></label>
                     <select name="id_kategori" id="id_kategori" class="form-control">
                      <option value="" selected>--Select option category--</option>
                      <option value="makanan">Makanan</option>
                      <option value="minuman">Minuman</option>  
                      <option value="Alat_tulis">Alat tulis</option>
                      <option value="others">Others</option>
                     </select>
                    </div>
                    <div class="mb-3">
                      <label for="stok" class="form-label">Stock <span style="color: red; font-size:20px">*</span></label>
                      <input type="number" class="form-control" id="stok"  name="stok"  aria-describedby="stok" placeholder="0">
                    </div>
                    <div class="mb-3">
                      <label for="satuan" class="form-label">Satuan <span style="color: red; font-size:20px">*</span></label>
                     <select name="satuan" id="satuan" class="form-control">
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
                      <input type="text" class="form-control" id="harga"  name="harga"  aria-describedby="harga" placeholder="Contoh : 10000">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel </button>
                    <button type="submit" class="btn btn-warning"><i class="fas fa-paper-plane" style="color: #ffffff;"></i></button>
                  </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
                  <!-- end:modal -->