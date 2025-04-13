<?php
// Path: module/product/form.php
    $kategori_id =isset($_GET['id_kategori']) ? $_GET['id_kategori'] : false;

    // inisialisasi variabel
    $name ="";
    $kategori="";
   
// jika id yg di kirim melalui url parameter sama yg ada di db, maka tampilkan
    if($kategori_id){
        $sql = "SELECT * FROM kategori WHERE id_kategori='$kategori_id'";
        $query = mysqli_query($koneksi, $sql);
        $item = mysqli_fetch_array($query);

        $name = $item['name'];
        $kategori = $item['id_kategori'];
        $flag = $item['flag'];
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
              <div class="col-sm-6"><h3 class="mb-0">Update Product categories </h3></div>
              <!--end::Col--> 
            </div>
            <!--end::Row-->
          <div class="row ">
            <div class="row justify-content-center">
              <div class="col-4">  
                <div class="card p-4 align-item-center">
                  <!-- Star:form edit -->
                <form action="<?php echo BASE_URL . "module/productCategory/action.php"; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="id_kategori" class="form-label">ID Categories<span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="id_kategori" name="id_kategori" aria-describedby="id_kategori" placeholder="Contoh: PR001" value='<?=  $kategori ?>' readonly   >
                    </div>
                    <div class="mb-3">
                      <label for="flag" class="form-label">Flag<span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="flag" name="flag" aria-describedby="flag" placeholder="Contoh: MKN" value='<?=  $flag ?>' oninput="this.value = this.value.toUpperCase()" required autofocus >
                    </div>
                    <div class="mb-3">
                      <label for="name" class="form-label">Product Categories <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="name"  name="name" aria-describedby="name" placeholder="Contoh: Indomie" value='<?= $name ?>' oninput="this.value = this.value.toUpperCase()" required >
                    </div>  
                   
                    <div class="modal-footer">
                    <a href="<?= BASE_URL . "index.php?module=productCategory&action=list" ?>" class="btn btn-secondary me-2">Back</a>
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


   
      