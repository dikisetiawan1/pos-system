
   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Products List Expired</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Menu</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Product List Expired</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            
              </div>
              </div>
              <div class="col mt-2">
    
                <div class="card  mt-3 p-4">
                  <!-- start:table -->  
              <table id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Product</th>
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Prod exp</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                <?php
                $query = "SELECT products.id_produk, products.nama_produk, products.stok, products.satuan, products.harga,products.product_exp, kategori.flag as flag_kategori FROM products INNER JOIN kategori ON products.id_kategori = kategori.id_kategori WHERE product_exp = DATE_ADD(CURDATE(), INTERVAL 1 DAY) AND product_exp > CURDATE()";
                $result = mysqli_query($koneksi, $query);
                if($result->num_rows > 0){
                    $no=1;
                while ($item = mysqli_fetch_assoc($result)) {
                  echo "
                      <tr>
                        <td>$no</td>
                        <td>$item[id_produk]</td>
                        <td>$item[nama_produk]</td>
                        <td>$item[flag_kategori]</td>
                        <td> $item[product_exp]</td>
                        
                      </tr>";
                      $no++;
                    };
                   }else{
                    echo '<script>Swal.fire({
                    title: "Product List Expired empty!",
                    text: "You clicked the button!",
                    icon: "warning"
                  });</script>';
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
                    <div class="mb-3" >
                      <label for="id_produk" class="form-label">Product Id <span style="color: red; font-size:20px" >*</span></label>
                      <input type="text" class="form-control" id="id_produk" name="id_produk" aria-describedby="id_produk" placeholder="Cth: PR001" oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div class="mb-3">
                      <label for="nama_produk" class="form-label">Product name <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="nama_produk"  name="nama_produk" aria-describedby="nama_produk" placeholder="Contoh: Indomie" oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div class="mb-3">
                      <label for="id_kategori" class="form-label">Category <span style="color: red; font-size:20px">*</span></label>
                     <select name="id_kategori" id="id_kategori" class="form-control" oninput="this.value = this.value.toUpperCase()" required>
                      <option value="" selected>--Select option category--</option>
                      <?php
                          $query = mysqli_query($koneksi, "SELECT * FROM kategori ");
                          while ($item =  mysqli_fetch_assoc($query)) {
                                  echo "<option value='$item[id_kategori]' selected='true'>$item[name]</option>";
                          } ?>
                     </select>
                    </div>
                    <div class="mb-3">
                      <label for="stok" class="form-label">Stock <span style="color: red; font-size:20px">*</span></label>
                      <input type="number" class="form-control" id="stok"  name="stok"  aria-describedby="stok" placeholder="0"  required>
                    </div>
                    <div class="mb-3">
                      <label for="satuan" class="form-label">Satuan <span style="color: red; font-size:20px">*</span></label>
                     <select name="satuan" id="satuan" class="form-control" required>
                      <option value="" selected>--Select option satuan--</option>
                      <option value="PCS">PCS</option>
                      <option value="PACK">PACK</option>
                      <option value="GRAM">GRAM</option>
                      <option value="KILO GRAM">KILO GRAM</option>
                      <option value="LITER">LITER</option>
                      <option value="LUSIN">LUSIN</option>
                      <option value="BOX">BOX</option>
                      <option value="RIM">RIM</option>
                      <option value="CARTON">CARTON</option>
                     </select>
                    </div>
                    <div class="mb-3">
                      <label for="harga" class="form-label">Price <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="harga"  name="harga"  aria-describedby="harga" placeholder="Cth : 10000" oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div class="mb-3">
                      <label for="harga" class="form-label">Tgl Exp <span style="color: red; font-size:20px">*</span></label>
                      <input type="date" class="form-control" id="product_exp"  name="product_exp"  aria-describedby="product_exp" required>
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
                

                