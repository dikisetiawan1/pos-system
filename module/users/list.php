<?php

// Path: module/product/list.php
// ambil data dari URL yang dikirim
  $notif = isset($_GET['notif']) ? $_GET['notif'] : false;          
  $notifupdate = isset($_GET['notifupdate']) ? $_GET['notifupdate'] : false;     
  $notifdelete = isset($_GET['notifdelete']) ? $_GET['notifdelete'] : false;
  // ambil id yg dikirim untuk proses hapus item
  $id_user = isset($_GET['id_user']) ? $_GET['id_user'] : false;
  mysqli_query($koneksi, "DELETE FROM users WHERE id_user='$id_user'");
  ?>

   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row--> 
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Users List</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Menu</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Users List</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#users">
            <i class="fas fa-plus" style="color: #ffffff;"></i> Users
            </button>
            
              </div>
              </div>
              <div class="col mt-2">
            <!-- start:notifikasi -->
            <!-- tampilkan alert notifikasi yg diambil dri url parameter -->
              <?php
              if($notif == 'success'){
                echo '<script>Swal.fire({
                    title: "User berhasil ditambahkan!",
                    text: "You clicked the button!",
                    icon: "success"
                  });</script>';  
             
              }elseif($notifupdate == 'success'){
                echo '<script>Swal.fire({
                  title: "User berhasil diubah!",
                  text: "You clicked the button!",
                  icon: "success"
                });</script>'; 
              }elseif($notifdelete == 'success'){
                echo '<script>Swal.fire({
                  title: "User berhasil dihapus!",
                  text: "You clicked the button!",
                  icon: "success"
                });</script>';
                
              }elseif($notif == 'failed'){
                echo '<script>Swal.fire({
                  title: "User tidak boleh duplikat!",
                  text: "You clicked the button!",
                  icon: "error"
                });</script>'; }
              ?>
              <!-- end:notifikasi -->
                <div class="card  mt-3 p-4">
                  <!-- start:table -->  
              <table id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                $query = "SELECT users.id_user, users.username,users.nama, users.password, users.role, role.nama_role FROM users INNER JOIN role ON users.role = role.id_role ORDER BY id_user DESC";
                $result = mysqli_query($koneksi, $query);
                if($result->num_rows > 0){
                    $no=1;
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "
                      <tr>
                        <td>$no</td>
                        <td>$row[username]</td>
                        <td>$row[nama]</td>
                        <td>********</td>
                        <td>$row[nama_role]</td>
                        <td> <a href='" . BASE_URL . "index.php?&module=users&action=form&id_user=$row[id_user]' type='button' class='btn btn-warning' ><i class='fas fa-edit'></i></a>  
                        <a href='" . BASE_URL . "index.php?&module=users&action=list&id_user=$row[id_user]&notifdelete=success' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a></td>
                      </tr>";
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
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>

            <!-- Form Modal input barang -->
            <div class="modal fade" id="users" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content"> 
                  <div class="modal-header">
                    <h5 class="modal-title  fw-bolder" id="staticBackdropLabel">Form Add Users <br>
                    <span style="color: red; font-size:12px">*  <span  class="text-capitalize ">kolom input wajib diisi.</span></span>
                  </h5> <br>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <form action="<?php echo BASE_URL . "module/users/action.php"; ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3" >
                      <label for="username" class="form-label">Username<span style="color: red; font-size:20px" >*</span></label>
                      <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Cth: diki" required >
                    </div>
                    <div class="mb-3" >
                      <label for="nama" class="form-label">Name<span style="color: red; font-size:20px" >*</span></label>
                      <input type="text" class="form-control" id="nama" name="nama" aria-describedby="nama" placeholder="Cth: diki" required >
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label">Password <span style="color: red; font-size:20px">*</span></label>
                      <input type="password" class="form-control" id="password"  name="password" aria-describedby="password" placeholder="Cth : ******"  required>
                    </div>
                    <div class="mb-3">
                      <label for="satuan" class="form-label">Role<span style="color: red; font-size:20px">*</span></label>
                     <select name="role" id="role" class="form-control" required>
                     <?php
                          $query = mysqli_query($koneksi, "SELECT * FROM role ");
                          while ($item =  mysqli_fetch_assoc($query)) {
                            if ($role == $item['role']) {
                              echo "<option value='$item[id_role]' selected >$item[nama_role]</option>";
                          } else {
      
                              echo "<option value='$item[id_role]'>$item[nama_role]</option>";
                          }
                          } ?>
                     </select>
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
                

                