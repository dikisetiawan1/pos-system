<?php
    $id_produk =isset($_GET['id_produk']) ? $_GET['id_produk'] : false;

    $nama_produk ="";
    $id_kategori="";
    $stok="";
    $satuan="";
    $harga="";


    if($id_produk){
        $sql = "SELECT * FROM products WHERE id_produk='$id_produk'";
        $query = mysqli_query($koneksi, $sql);
        $item = mysqli_fetch_array($query);

        $nama_produk = $item['nama_produk'];
        $id_kategori = $item['id_kategori'];
        $stok = $item['stok'];
        $satuan = $item['satuan'];
        $harga = $item['harga'];
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
              <div class="col-sm-6"><h3 class="mb-0">Update Product </h3></div>
              <!--end::Col--> 
            </div>
            <!--end::Row-->
          <div class="row ">
            <div class="row justify-content-center">
              <div class="col-4">  
                <div class="card p-4 align-item-center">
                <form action="<?php echo BASE_URL . "module/product/action.php"; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="id_produk" class="form-label">Product Id <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="id_produk" name="id_produk" aria-describedby="id_produk" placeholder="Contoh: PR001" value='<?= $id_produk ?>' readonly  >
                    </div>
                    <div class="mb-3">
                      <label for="nama_produk" class="form-label">Product name <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="nama_produk"  name="nama_produk" aria-describedby="nama_produk" placeholder="Contoh: Indomie" value='<?= $nama_produk ?>' required>
                    </div>
                    <div class="mb-3">
                      <label for="id_kategori" class="form-label">Category <span style="color: red; font-size:20px">*</span></label>
                     <select name="id_kategori" id="id_kategori" class="form-control"  required>
                      <option value="" selected>--Select option category--</option>
                      <option value="makanan">Makanan</option>
                      <option value="minuman">Minuman</option>  
                      <option value="Alat_tulis">Alat tulis</option>
                      <option value="others">Others</option>
                     </select>
                    </div>
                    <div class="mb-3">
                      <label for="stok" class="form-label">Stock <span style="color: red; font-size:20px">*</span></label>
                      <input type="number" class="form-control" id="stok"  name="stok"  aria-describedby="stok" placeholder="0" value='<?= $stok ?>' required>
                    </div>
                    <div class="mb-3">
                      <label for="satuan" class="form-label">Satuan <span style="color: red; font-size:20px">*</span></label>
                     <select name="satuan" id="satuan" class="form-control"  required>
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
                      <input type="text" class="form-control" id="harga"  name="harga"  aria-describedby="harga" placeholder="Contoh : 10000" value='<?= $harga ?>' required>
                    </div>
                    <div class="modal-footer">
                    <a href="<?= BASE_URL . "index.php?module=product&action=list" ?>" class="btn btn-secondary me-2">Back</a>
                    <button type="submit" name="button" value="update" class="btn btn-success">Update</button>
                
                  </div>
                  </form>
                  </div>
                </div>
                </div>
            
              </div>
            </div>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>


   
      