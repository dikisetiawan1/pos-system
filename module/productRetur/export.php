<?php
include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

?>
<html>
<head>
  <title>Export Data Retur Produk</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>
<body>

<div class="container">
			<h2 class="text-center">Data Retur Produk </h2>
				<div class="data-tables datatable-dark">
        <table id="export" class="table table-striped">
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
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Data is empty!</strong> Please input product retur before.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>';
                              } ?>
                                </tbody>
                              </table>
                              <!-- end:table -->
                          <a href="<?php echo BASE_URL . "index.php?&module=productRetur&action=productReturList"; ?>">Kembali</a>
                          </div>
                        </div>
<script>
$(document).ready(function() {
    $('#export').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>

</html>