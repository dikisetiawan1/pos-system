
   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">  
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Product Retur List </h3></div>
              <!--end::Col--> 
            </div>
            <!--end::Row-->
            <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="<?php echo BASE_URL . "module/productRetur/export.php"; ?>" class="btn btn-primary">Export</a>
            <a href="<?php echo BASE_URL . "index.php?&module=productRetur&action=list"; ?>" class="btn btn-success">Retur Product</a>
          
              </div>
              </div>
          <div class="row mt-4 ">
            <div class="row justify-content-center">
              <div class="col">  
                <div class="card p-4 align-item-center">
                <!-- start:table -->  
                <table id="example" class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Code</th>
                                    <th scope="col">Purchase date</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Stock Retur</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Reason</th>

                                  </tr>
                                </thead>
                                <tbody>
                            <?php
                            $query = "SELECT * FROM products_retur ";
                            $query .= "ORDER BY tgl DESC";
                            $result = mysqli_query($koneksi, $query);
                            if($result->num_rows > 0){
                                $no=1;
                            while ($item = mysqli_fetch_assoc($result)) {
                              echo "
                                  <tr>
                                    <td>$no</td>
                                    <td>$item[id_produk]</td>
                                    <td>$item[tgl_transaksi]</td>
                                    <td>$item[nama_produk]</td>
                                    <td>$item[tgl]</td>
                                    <td>$item[stok_retur]</td>
                                    <td> ".rupiah($item['harga'])."</td>
                                    <td>$item[ket]</td>

                                   ";
                                  $no++;
                                };
                              }else{
                                echo '<script>Swal.fire({
                                title: "Product retur list is empty!",
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


   
      