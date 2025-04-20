<?php
// Path: module/product/form.php
    $id_user =isset($_GET['id_user']) ? $_GET['id_user'] : false;

   

    // inisialisasi variabel
    $id="";
    $username ="";
    $nama ="";


    
// jika id yg di kirim melalui url parameter sama yg ada di db, maka tampilkan
    if($id_user){
        // $sql = "SELECT * FROM users WHERE id_user='$id_user'";
        $sql = "SELECT id_user, username, nama FROM users WHERE id_user='$id_user'";
        $query = mysqli_query($koneksi, $sql);
        $item = mysqli_fetch_array($query);

        $id = $item['id_user'];
        $username = $item['username'];
        $nama = $item['nama'];

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
              <div class="col-sm-6"><h3 class="mb-0">My Profile </h3></div>
              <!--end::Col--> 
            </div>
            <!--end::Row-->
          <div class="row ">
            <div class="row justify-content-center">
              <div class="col-4">  
                <div class="card p-4 align-item-center">
                  <!-- Star:form edit -->
                <form action="<?php echo BASE_URL . "module/users/action.php"; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3" >
                      <label for="id_user" class="form-label">ID User<span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="id_user" name="id_user" aria-describedby="id_user" placeholder="Cth: John do" value='<?= $id ?>' readonly autofocus>
                    </div>
                    <div class="mb-3">
                      <label for="username" class="form-label">Username<span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Cth: John do" value='<?= $username ?>'>
                    </div>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Name<span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" placeholder="Cth: John do" value='<?= $nama ?>' autofocus>
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Update Password<span style="color: red; font-size:20px">*</span></label>
                      <input type="password" class="form-control" id="password"  name="password" aria-describedby="password" placeholder="Cth: ******"  required >
                    </div>
                   
                    <div class="modal-footer">
                    <a href="<?= BASE_URL . "index.php?module=dashboard&action=index" ?>" class="btn btn-secondary me-2">Back</a>
                    <button type="submit" name="button" value="updatepassword" class="btn btn-success">Update</button>
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


   
      