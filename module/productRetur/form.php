<?php
// Path: module/product/form.php
    $id_produk =isset($_GET['id_produk']) ? $_GET['id_produk'] : false;
    $notifretur =isset($_GET['notifretur']) ? $_GET['notifretur'] : false;


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
        $stok = $item['stok'];
        
    }

?>
  
    <!-- start:notifikasi -->
            <!-- tampilkan alert notifikasi yg diambil dri url parameter -->
            <?php
             if($notifretur == 'success'){
                echo '<script>Swal.fire({
                  title: "Produk berhasil di retur!",
                  text: "You clicked the button!",
                  icon: "success"
                });</script>'; 
              }elseif($notifretur == 'failed'){
                echo '<script>Swal.fire({
                  title: "Produk tidak berhasil di retur!",
                  text: "You clicked the button!",
                  icon: "error"
                });</script>'; }
              ?>
              <!-- end:notifikasi -->
   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">  
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0"> Form Product Retur </h3></div>
              <!--end::Col--> 
            </div>
            <!--end::Row-->
          <div class="row mt-4 ">
            <div class="row justify-content-center">
              <div class="col-4">  
                <div class="card p-4 align-item-center">
                  <!-- Star:form edit -->
                <form action="<?php echo BASE_URL . "module/productRetur/action.php"; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="id_produk" class="form-label">Product Id <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="id_produk" name="id_produk" aria-describedby="id_produk" placeholder="Contoh: PR001" value='<?= $id_produk ?>' readonly   >
                    </div>
                    <div class="mb-3">
                      <label for="nama_produk" class="form-label">Product name <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="nama_produk"  name="nama_produk" aria-describedby="nama_produk" placeholder="Contoh: Indomie" value='<?= $nama_produk ?>' oninput="this.value = this.value.toUpperCase()" required readonly>
                    </div>
                   
                   
                    <div class="mb-3">
                      <label for="stok" class="form-label">Stock Tersisa <span style="color: red; font-size:20px">*</span></label>
                      <input type="number" class="form-control" id="stok"  name="stok"  aria-describedby="stok" placeholder="0" value='<?= $stok ?>'  readonly>
                    </div>
                    <div class="mb-3">
                      <label for="stok_retur" class="form-label">Stock Retur <span style="color: red; font-size:20px">*</span></label>
                      <input type="number" class="form-control" id="stok_retur"  name="stok_retur"  aria-describedby="stok_retur" placeholder="0" required autofocus>
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlTextarea1"  class="form-label"> Reason <span style="color: red; font-size:20px">*</span></label>
                      <textarea class="form-control" name="ket" id="exampleFormControlTextarea1" rows="3" placeholder="Input reason here!" required></textarea>
                     
                    </div>
                   
                   
                    <div class="modal-footer">
                    <a href="<?= BASE_URL . "index.php?module=productRetur&action=list" ?>" class="btn btn-secondary me-2">Back</a>
                    <button type="submit" name="button" value="addupdate" class="btn btn-success">Retur</button>
                  </div>
                  </form>
                  <!-- end:form -->
                  </div>
                </div>
                <div class="col-8">
                <!-- start:table -->  
                <table id="example" class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Code</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Stock Retur</th>
                                    <th scope="col">Reason</th>

                                  </tr>
                                </thead>
                                <tbody>
                            <?php
                            $query = "SELECT * FROM products_retur ";
                            $query .= "ORDER BY id DESC";
                            $result = mysqli_query($koneksi, $query);
                            if($result->num_rows > 0){
                                $no=1;
                            while ($row = mysqli_fetch_assoc($result)) {
                              echo "
                                  <tr>
                                    <td>$no</td>
                                    <td>$row[id_produk]</td>
                                    <td>$row[nama_produk]</td>
                                    <td>$row[stok_retur]</td>
                                    <td>$row[ket]</td>

                                   ";
                                  $no++;
                                };
                              }else{
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Data is empty!</strong> Please input product retur before.
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
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>


   
      