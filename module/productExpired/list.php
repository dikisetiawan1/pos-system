<?php
$cetaklevel = $_SESSION['role'];
if($cetaklevel == 'cashier' ){
  echo '<script>window.location.href = "'.BASE_URL.'index.php?page=dashboard";</script>';
  exit;
}?>

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
                    title: "Product list expired is empty!",
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

    