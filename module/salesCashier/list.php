<?php

// Path: module/product/list.php
// ambil data dari URL yang dikirim
  $notiftransaksi = isset($_GET['notiftransaksi']) ? $_GET['notiftransaksi'] : false;          
  // ambil id yg dikirim untuk proses hapus item
  $id_produk = isset($_GET['id_produk']) ? $_GET['id_produk'] : false;
  mysqli_query($koneksi, "DELETE FROM products WHERE id_produk='$id_produk'");


  if($notiftransaksi == 'success'){
    echo '<script>Swal.fire({
        title: "Transaksi berhasil tersimpan!",
        text: "Struk selesai di cetak!",
        icon: "success"
      });</script>';  
 
  }elseif($notiftransaksi == 'failed'){
    echo '<script>Swal.fire({
        title: "Transaksi gagal, stok tidak cukup!",
        text: "Silahkan Cek Alert Stok!",
        icon: "error"
      });</script>';}
  ?>


   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid card p-4">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6 " ><h3 class="mb-0">Cashier Transaction</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Menu</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Cashier transaction</li>
                </ol>
              </div>
              <!--end::Col-->
            </div>
            <div class="row mt-5">
          <div class="col-8 ">
                         
            <!-- modal body transaksi -->
          <div class="modal-body ">
                  <div class="row">
                    <div class="col-8">
                    <div class="mb-3" >
                      <label for="inputKode" class="form-label">Input Code Product<span style="color: red; font-size:20px" >*</span></label>
                      <input type="text" class="form-control" id="inputKode" name="inputKode" aria-describedby="id_produk" placeholder="Ex: 89958********"onkeypress="handleEnter(event)" autocomplete="off" required autofocus >
                      <div id="statusKode"></div>
                      <!-- form transaksi -->
                      <form method="POST" action="<?php echo BASE_URL . "module/salesCashier/proses.php"; ?>" id="formTransaksi">
                      <div class="produk-list" id="produkList">
                        <div class="form-label fw-bold pb-4 pt-4">My Product Cart :</div>
                         </div>
                         <div id="produkHiddenInputs"></div>
                        <br>
                        </div>
                    </div>

                        <div class="col-4" style="margin-top: 100px;">
                        <h3 class="pb-2">Total: <span id="totalHarga" style="color:red">Rp 0</span></h3>

                        <div class="row mt-2 pb-2">
                        <div class="col-6">
                        <label class="fw-bold">Shopping Disc % </label> <br>
                        <input type="number" id="diskon" name="diskon"  class="form-control"  min="0" max="100" value="0" oninput="hitungTotal()">
                        </div>
                    </div>
                        <!-- form input bayar dan kembalian -->
                        <div class="input-group ">
                        <span class="input-group-text" >Pay</span>
                            <input type="number" class="form-control" id="bayar" name="bayar" min="0" placeholder="Input payment" oninput="hitungKembalian()">
                        </div>
                        <br>
                        <h3 class="pt-2">Change: <span id="kembalian" name="kembalian" style="color: green;">Rp 0 </span></h3>

                        <div id="bayarAlert" style="color:red;"></div>

                        <button type="submit" class="btn btn-primary">Transaction Process</button>
                        </form>
                    </div>
                  </div>

          </div>  


            <script>
            function handleEnter(event) {
                if (event.key === "Enter") {
                    event.preventDefault();
                    const input = document.getElementById("inputKode");
                    const kode = input.value.toUpperCase().trim();
                    const status = document.getElementById("statusKode");

                    if (!kode) return;

                    fetch('<?php echo BASE_URL."module/salesCashier/produk.php?kode=" ?>' + kode)
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

            let produkCount = 0; // untuk menghitung nomor urut produk
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
                <div class="row">
                    <div class="col-6">
                     <strong>${produkCount}.</strong> 
                    <strong >${kode}</strong> - ${nama} ( Rp ${Number(harga).toLocaleString()} ) 
                    </div> Qty:
                    <div class="col-2 p-2"> <input type="number" class="form-control" name="produk[jumlah][]" value="1" min="1" oninput="hitungTotal()" ></div>
                    <div class="col-2 p-2"><a type="button" class="btn btn-warning" onclick="hapusProduk('${kode}')"><i class='fas fa-trash-alt'></i></a></div>
                    <input type="hidden" class="form-control" name="produk[kode][]" value="${kode}">
                    <input type="hidden" class="form-control" name="produk[nama][]" value="${nama}">
                    <input type="hidden" class="form-control" name="produk[harga][]" value="${harga}">
                </div>
                `;
                list.appendChild(div); // tambahkan ke list

                hitungTotal(); // langsung hitung ulang total
            }

            // input total setelah diskon
              function hitungTotal() {
              const total = getTotal();
              // const diskonitem = getDiskonItem(harga, diskonitem);
              const diskon = getDiskon(total);
              const totalSetelahDiskon = total - diskon;
              // const totalSetelahDiskon = total - totaldiskon;

              document.getElementById("totalHarga").innerText = "Rp " + totalSetelahDiskon.toLocaleString() ;
              hitungKembalian();
          }

          // get diskon
          // ambil diskon dari input dan hitung diskon
          function getDiskon(total) {
              const persen = parseInt(document.getElementById("diskon").value) || 0;
              return Math.round(total * (persen / 100));
          }
    // get diskon item
          // function getDiskonItem(harga, diskonitem){
          //   return Math.round(harga * (diskonitem / 100));
          // }

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

                return total ;
            }


            // hitung kembalian
            function hitungKembalian() {
              const bayar = parseInt(document.getElementById("bayar").value) || 0;
              const total = getTotal();
              const diskon = getDiskon(total);
              const totalSetelahDiskon = total - diskon;

              const alertDiv = document.getElementById("bayarAlert");

              if (bayar < totalSetelahDiskon) {
                  document.getElementById("kembalian").innerText = "Rp 0";
                  alertDiv.innerText = "Uang bayar kurang dari total belanja!";
              } else {
                  const kembali = bayar - totalSetelahDiskon;
                  document.getElementById("kembalian").innerText = "Rp " + kembali.toLocaleString();
                  alertDiv.innerText = "";
              }
          }

              // hapus produk dari list cart
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
             </div>
                      </div>
                      </div>
                      <!--end::Container-->
                    </div>
                    <!--end::App Content-->
                  </main>
                  <!--end::App Main-->  
  

   

