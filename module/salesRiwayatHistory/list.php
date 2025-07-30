

   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Detail Transactions History</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Menu</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Transactions History</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?php echo BASE_URL . "module/salesRiwayatHistory/export.php"; ?>" class="btn btn-primary">Export</a>
              </div>
              </div>
              <div class="col mt-2">
            <!-- start:notifikasi -->
            

                <div class="card  mt-3 p-4">
                  <!-- start:table -->  
              <table id="example" class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Code</th>
                        <th scope="col">Transactions id</th>
                        <th scope="col">Product</th>
                        <th scope="col">Date</th>
                        <th scope="col">Purchase Price</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                $query = "SELECT transactions_detail.kode_produk,transactions_detail.transaksi_id,transactions_detail.nama_produk,transactions_detail.harga_beli,transactions_detail.harga,transactions_detail.jumlah,transactions_detail.subtotal,transactions.tgl as tgl_transaksi  FROM transactions_detail INNER JOIN transactions ON transactions_detail.transaksi_id = transactions.id";
                $result = mysqli_query($koneksi, $query);
                if($result->num_rows > 0){
                    $no=1;
                while ($item = mysqli_fetch_assoc($result)) {
                  echo "
                      <tr>
                        <td>$no</td>
                        <td>$item[kode_produk]</td>
                        <td>$item[transaksi_id]</td>
                        <td>$item[nama_produk]</td>
                        <td>$item[tgl_transaksi]</td>
                        <td> ".rupiah($item['harga_beli'])."</td>
                        <td> ".rupiah($item['harga'])."</td>
                        <td>$item[jumlah]</td>
                        <td>$item[subtotal]</td>
                        ";
                      $no++;
                    };
                   }else{
                    echo '<script>Swal.fire({
                    title: "Transactions history is empty!",
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

    
       

                