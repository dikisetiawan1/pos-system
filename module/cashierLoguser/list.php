
   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Log Activity Users </h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Menu</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Log Activity Users</li>
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
                        <th scope="col">User</th>
                        <th scope="col">Action</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Datetime</th>
                     
                      </tr>
                    </thead>
                    <tbody>
                <?php
                  $query = "SELECT log_aktivitas.*, users.nama 
                  FROM log_aktivitas 
                  JOIN users ON users.id_user = log_aktivitas.id_user
                  ORDER BY waktu DESC
                  ";
                $result = mysqli_query($koneksi, $query);
                if($result->num_rows > 0){
                    $no=1;
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "
                      <tr>
                        <td>$no</td>
                        <td>$row[nama]</td>
                        <td>$row[aksi]</td>
                        <td>$row[keterangan]</td>
                        <td>".date('d-m-Y H:i:s', strtotime($row['waktu']))."</td>
                        
                      </tr>";
                      $no++;
                    };
                   }else{
                    echo '<script>Swal.fire({
                      title: "Log activity is empty!",
                      text: "You clicked the button!",
                      icon: "error"
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

    