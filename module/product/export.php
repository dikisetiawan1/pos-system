<?php
include_once '../../function/helper.php';
include_once '../../function/koneksi.php';

?>
<html>
<head>
  <title>Export Data Produk</title>
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
			<h2 class="text-center">Data Produk</h2>
			
				<div class="data-tables datatable-dark">
                <table id="export" >
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Product</th>
                        <th scope="col">Category</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Price</th>
                        <th scope="col">Prod Exp</th>
                
                      </tr>
                    </thead>
                    <tbody>
                <?php

              $query = "SELECT products.id_produk, products.nama_produk, products.stok, products.satuan, products.harga, products.product_exp, kategori.flag as flag_kategori FROM products INNER JOIN kategori ON products.id_kategori = kategori.id_kategori";
              $result = mysqli_query($koneksi, $query);
                    
                while ($item = mysqli_fetch_assoc($result)) {
                  echo "
                      <tr>
                        <td>$item[id_produk]</td>
                        <td>$item[nama_produk]</td>
                        <td>$item[flag_kategori]</td>
                        <td>$item[stok]</td>
                        <td>$item[satuan]</td>
                        <td> ".rupiah($item['harga'])."</td>
                        <td>$item[product_exp]</td>";
                    };
                    ?>
                    </tbody>
                  </table>
                  <a href="<?php echo BASE_URL . "index.php?&module=product&action=list"; ?>">Kembali</a>
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