<?php


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <h2>Transaksi Kasir</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="id_produk" class="form-label">Kode Barang</label>
            <input type="text" class="form-control" id="id_produk" name="id_produk" required>
        </div>
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="nama_produk" name="nama_produk" readonly>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="id_kategori" name="id_kategori" readonly>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Stok</label>
            <input type="text" class="form-control" id="stok" name="stok" readonly>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" readonly>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="text" class="form-control" id="harga" name="harga" readonly>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
$(document).ready(function(){
    $("#id_produk").keyup(function(){
        var id = $(this).val();
        if (id.length > 0) {
            $.ajax({
                url: "get_product.php",
                method: "POST",
                data: {id: id},
                dataType: "json",
                success: function(response) {
                    if (response) {
                        $("#nama_produk").val(response.nama_produk);
                        $("#kategori").val(response.kategori);
                        $("#stok").val(response.stok);
                        $("#satuan").val(response.satuan);
                        $("#harga").val(response.harga);
                    } else {
                        $("#nama_produk").val('');
                        $("#kategori").val('');
                        $("#stok").val('');
                        $("#satuan").val('');
                        $("#harga").val('');
                    }
                }
            });
        } else {
                        $("#nama_produk").val('');
                        $("#kategori").val('');
                        $("#stok").val('');
                        $("#satuan").val('');
                        $("#harga").val('');
        }
    });
});
</script>

</body>
</html>
