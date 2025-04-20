<?php
// Path: module/product/form.php
//     $id_toko =isset($_GET['id_toko']) ? $_GET['id_toko'] : false;

//     // inisialisasi variabel
//     $nama_toko ="";
//     $alamat="";
//     $email="";
//     $footer="";
    
// // jika id yg di kirim melalui url parameter sama yg ada di db, maka tampilkan
//     if($id_toko){
//         // $sql = "SELECT * FROM users WHERE id_user='$id_user'";
//         $sql = "SELECT * FROM toko ";
//         $query = mysqli_query($koneksi, $sql);
//         $item = mysqli_fetch_array($query);

//         $nama_toko = $item['nama_toko'];
//         $alamat = $item['alamat'];
//         $email = $item['email'];
//         $footer = $item['footer'];
//     }
$notif = isset($_GET['notif']) ? $_GET['notif'] : false;  
?>
  
   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">  
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Update Shopping Struk </h3></div>
              <!--end::Col--> 
            </div>
            <?php
            
            if($notif == 'success'){
              echo '<script>Swal.fire({
                  title: "Toko berhasil diupdate!",
                  text: "You clicked the button!",
                  icon: "success"
                });</script>';  
           
            }
            ?>
            <!--end::Row-->
          <div class="row ">
            <div class="row justify-content-center">
              <div class="col mt-4">  
                <div class="card p-4 align-item-center">
                <div class="row">
                  <div class="col-4">
                  <form action="<?php echo BASE_URL . "module/cashierManagement/action.php"; ?>" method="POST" enctype="multipart/form-data">
                    <!-- <div class="mb-3" hidden>
                      <label for="id_user" class="form-label">ID Toko<span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="id_user" name="id_user" aria-describedby="id_user" placeholder="Cth: John do"  autofocus>
                    </div> -->
                    <div class="mb-3">
                      <label for="nama_toko" class="form-label">Nama Toko<span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="nama_toko" name="nama_toko" aria-describedby="nama_toko" placeholder="Cth: Tokmart" oninput="this.value = this.value.toUpperCase()" autofocus>
                    </div>
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat<span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="alamat"  name="alamat" aria-describedby="alamat" placeholder="Cth: Jl.segaran"  required >
                    </div>
                    <div class="mb-3">
                      <label for="tlp" class="form-label">Tlp<span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="tlp"  name="tlp" aria-describedby="tlp" placeholder="Cth: 085**"  required >
                    </div>      
                    <div class="mb-3">
                      <label for="email" class="form-label">Email<span style="color: red; font-size:20px">*</span></label>
                      <input type="email" class="form-control" id="email"  name="email" aria-describedby="email" placeholder="Cth: bumdes@gmail.com"  required >
                    </div>      
                    <div class="mb-3">
                      <label for="footer" class="form-label">Footer<span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="footer"  name="footer" aria-describedby="footer" placeholder="Cth: Jangan Lupa kembali"  required >
                    </div>      
                    <div class="modal-footer">
                    <a href="<?= BASE_URL . "index.php?module=dashboard&action=index" ?>" class="btn btn-secondary me-2">Back to dashboard</a>
                    <button type="submit" name="button" value="update" class="btn btn-success">Update</button>
                  </div>
                  </form>
                  <!-- end:form -->
                  </div>
                  <div class="col-8">
                <!-- start:table -->  
                <table id="example" class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Toko</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Tlp</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Footer</th>
                                  </tr>
                                </thead>
                                <tbody>
                            <?php
                            $query = "SELECT * FROM toko";
                            $result = mysqli_query($koneksi, $query);
                            if($result->num_rows > 0){
                                $no=1;
                            while ($row = mysqli_fetch_assoc($result)) {
                              echo "
                                  <tr>
                                    <td>$no</td>
                                    <td>$row[nama_toko]</td>
                                    <td>$row[alamat]</td>
                                    <td>$row[tlp]</td>
                                    <td>$row[email]</td>
                                    <td>$row[footer]</td>
                                   ";
                                  $no++;
                                };
                              }else{
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Data belum ada!</strong> Silahkan inputkan user terlebih dahulu.
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
              </div>
            </div>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>


   
      