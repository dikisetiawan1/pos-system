<?php
// Path: module/product/form.php
    $id_produk =isset($_GET['id_produk']) ? $_GET['id_produk'] : false;

    // inisialisasi variabel
    $nama_produk ="";
    $id_kategori="";
    $stok="";
    $satuan="";
    $harga="";

// jika id yg di kirim melalui url parameter sama yg ada di db, maka tampilkan
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
                  <!-- Star:form edit -->
                <form action="<?php echo BASE_URL . "module/product/action.php"; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="id_produk" class="form-label">Product Id <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="id_produk" name="id_produk" aria-describedby="id_produk" placeholder="Contoh: PR001" value='<?= $id_produk ?>' readonly   >
                    </div>
                    <div class="mb-3">
                      <label for="nama_produk" class="form-label">Product name <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="nama_produk"  name="nama_produk" aria-describedby="nama_produk" placeholder="Contoh: Indomie" value='<?= $nama_produk ?>' oninput="this.value = this.value.toUpperCase()" required autofocus>
                    </div>
                    <div class="mb-3">
                      <label for="id_kategori" class="form-label">Category <span style="color: red; font-size:20px">*</span></label>
                     <select name="id_kategori" id="id_kategori" class="form-control"  required>
                      <option value="">--Select option category--</option>
                      <?php
                          $query = mysqli_query($koneksi, "SELECT * FROM kategori ");
                          while ($item =  mysqli_fetch_assoc($query)) {
                            if ($id_kategori == $item['id_kategori']) {
                              echo "<option value='$item[id_kategori]' selected >$item[name]</option>";
                          } else {
      
                              echo "<option value='$item[id_kategori]'>$item[name]</option>";
                          }
                          } ?>
                     </select>
                    </div>
                    <div class="mb-3">
                      <label for="stok" class="form-label">Stock <span style="color: red; font-size:20px">*</span></label>
                      <input type="number" class="form-control" id="stok"  name="stok"  aria-describedby="stok" placeholder="0" value='<?= $stok ?>'  required>
                    </div>
                    <div class="mb-3">
                      <label for="satuan" class="form-label">Satuan <span style="color: red; font-size:20px">*</span></label>
                     <select name="satuan" id="satuan" class="form-control" required>

                          <option value='<?= $satuan?>' selected><?= $satuan;?></option>
                                  <option value='PCS'>PCS</option>
                                  <option value='PACK'>PACK</option>
                                  <option value='GRAM'>GRAM</option>
                                  <option value='KILO GRAM'>KILO GRAM</option>
                                  <option value='LITER'>LITER</option>
                                  <option value='LUSIN'>LUSIN</option>
                                  <option value='BOX'>BOX</option>
                                  <option value='RIM'>RIM</option>
                                  <option value='CARTON'>CARTON</option>"
                                  
                        
                     </select>
                    </div>
                    <div class="mb-3">
                      <label for="harga" class="form-label">Price <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="harga"  name="harga"  aria-describedby="harga" placeholder="Contoh : 10000" value='<?= $harga ?>' oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div class="modal-footer">
                    <a href="<?= BASE_URL . "index.php?module=product&action=list" ?>" class="btn btn-secondary me-2">Back</a>
                    <button type="submit" name="button" value="update" class="btn btn-success">Update</button>
                  </div>
                  </form>
                  <!-- end:form -->
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


   
      