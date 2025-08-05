<?php
include_once 'function/helper.php';
include_once 'function/koneksi.php';

// Ambil parameter dari URL
$id = isset($_GET['id']) ? $_GET['id'] : '';

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Cetak Barcode Produk</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>

  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .barcode-item {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
      border-radius: 5px;
      margin-bottom: 15px;
      height: 120px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .barcode-label {
      font-size: 13px;
      margin-bottom: 5px;
      font-weight: bold;
    }

    svg.barcode {
      margin: 0 auto;
      display: block;
        max-width: 100%;
  height: auto;
    }

    @media print {
      .no-print {
        display: none;
      }
      body {
        margin: 0;
        padding: 0;
      }
      .barcode-item {
        page-break-inside: avoid;
      }
    }
  </style>
</head>
<body>

<div class="container mt-4">
  <div class="row g-3">
    <?php
    $query = "SELECT * FROM barcode_product where id='$id'";
    $result = mysqli_query($koneksi, $query);
    foreach ($result as $item):
    ?>
     <?php for ($i = 0; $i < 24; $i++): ?>
      <div class="col-6 col-sm-4 col-md-3 col-lg-2">
        <div class="barcode-item">
          <div class="barcode-label"><?= htmlspecialchars($item['label_product']) ?></div>
          <svg class="barcode"
               jsbarcode-format="CODE128"
               jsbarcode-value="<?= htmlspecialchars($item['id_product_barcode']) ?>"
               jsbarcode-textmargin="0"
               jsbarcode-height="40"
               jsbarcode-fontSize="14"
               jsbarcode-width="1.5">
          </svg>
        </div>
      </div>
       <?php endfor; ?>
    <?php endforeach; ?>
  </div>

  <div class="text-center mt-4 no-print">
    <button onclick="window.print()" class="btn btn-primary">🖨️ Cetak Barcode</button>

  </div>
</div>

<script>
  JsBarcode(".barcode").init();
</script>

</body>
</html>
