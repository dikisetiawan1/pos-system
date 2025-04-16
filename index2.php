<!DOCTYPE html>
<html>
<head>
    <title>Kasir - Input Kode Produk</title>
    <style>
        body { font-family: Arial; }
        .produk-item { border-bottom: 1px solid #ddd; margin: 10px 0; padding: 5px 0; }
        .produk-list { margin-top: 20px; }
        .produk-header { font-weight: bold; }
    </style>
</head>
<body>

<h3>Transaksi Kasir</h3>

<label>Masukkan Kode Produk:</label><br>
<input type="text" id="inputKode" onkeypress="handleEnter(event)" autocomplete="off">
<div id="statusKode"></div>
<form method="POST" action="proses.php" id="formTransaksi">
    <div class="produk-list" id="produkList">
        <div class="produk-header">Produk Ditambahkan:</div>
    </div>

    <div id="produkHiddenInputs"></div>
    <br>

    <label>Bayar:
        <input type="number" name="bayar" id="bayar" min="0" placeholder="Masukkan jumlah bayar" oninput="hitungKembalian()">
    </label>
    <br>
    <h3>Kembalian: <span id="kembalian">Rp 0</span></h3>
    <div id="bayarAlert" style="color:red;"></div>

    <button type="submit">Proses Transaksi</button>
</form>

<script>
function handleEnter(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        const input = document.getElementById("inputKode");
        const kode = input.value.toUpperCase().trim();
        const status = document.getElementById("statusKode");

        if (!kode) return;

        fetch('produk.php?kode=' + kode)
            .then(res => res.json())
            .then(data => {
                if (data.nama_produk) {
                    tambahProduk(kode, data.nama_produk, data.harga);
                    input.value = '';
                    status.innerHTML = '';
                } else {
                    status.innerHTML = `<span style="color:red;">Kode tidak ditemukan.</span>`;
                }
            });
    }
}

let produkCount = 0;

function tambahProduk(kode, nama, harga) {
    const list = document.getElementById("produkList");
    const hiddenInputs = document.getElementById("produkHiddenInputs");

    const existingCodes = document.querySelectorAll('input[name="produk[kode][]"]');
    for (const el of existingCodes) {
        if (el.value === kode) {
            alert("Kode sudah dimasukkan.");
            return;
        }
    }

    produkCount++; // tambah nomor urut
    const div = document.createElement("div");
    div.className = "produk-item";
    div.setAttribute("data-kode", kode); // untuk referensi saat hapus
    div.innerHTML = `
        <strong>${produkCount}.</strong> 
        <strong>${kode}</strong> - ${nama} (Rp ${Number(harga).toLocaleString()})<br>
        Jumlah: <input type="number" name="produk[jumlah][]" value="1" min="1" oninput="hitungTotal()" >
        <input type="hidden" name="produk[kode][]" value="${kode}">
        <input type="hidden" name="produk[nama][]" value="${nama}">
        <input type="hidden" name="produk[harga][]" value="${harga}">
        <button type="button" onclick="hapusProduk('${kode}')">Hapus</button>
    `;
    list.appendChild(div);

    hitungTotal(); // update total
}

// input total
function hitungTotal() {
    const total = getTotal();
    document.getElementById("totalHarga").innerText = "Rp " + total.toLocaleString();
    hitungKembalian(); // agar kembalian juga update kalau jumlah berubah
}


// helper untuk ambil total
function getTotal() {
    const jumlahList = document.querySelectorAll('input[name="produk[jumlah][]"]');
    const hargaList = document.querySelectorAll('input[name="produk[harga][]"]');
    let total = 0;

    for (let i = 0; i < jumlahList.length; i++) {
        const jumlah = parseInt(jumlahList[i].value) || 0;
        const harga = parseInt(hargaList[i].value) || 0;
        total += jumlah * harga;
    }

    return total;
}


// hitung kembalian
function hitungKembalian() {
    const bayar = parseInt(document.getElementById("bayar").value) || 0;
    const total = getTotal(); // panggil helper untuk ambil total
    const alertDiv = document.getElementById("bayarAlert");

    if (bayar < total) {
        document.getElementById("kembalian").innerText = "Rp 0";
        alertDiv.innerText = "Uang bayar kurang dari total belanja!";
    } else {
        const kembali = bayar - total;
        document.getElementById("kembalian").innerText = "Rp " + kembali.toLocaleString();
        alertDiv.innerText = "";
    }
}

function hapusProduk(kode) {
    const list = document.getElementById("produkList");
    const items = document.querySelectorAll('.produk-item');
    
    items.forEach(item => {
        if (item.getAttribute('data-kode') === kode) {
            list.removeChild(item);
        }
    });

    // reset nomor urut setelah hapus
    resetNomorUrut();
    hitungTotal();
}

function resetNomorUrut() {
    const items = document.querySelectorAll('.produk-item');
    produkCount = 0;
    items.forEach(item => {
        produkCount++;
        const strong = item.querySelector('strong');
        if (strong) strong.innerText = `${produkCount}.`;
    });
}


</script>


</body>
</html>
