   <!--begin::App Main-->
   <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Product Menu</h3></div>
              <!--end::Col-->
            </div>
            <!--end::Row-->
            <div class="row mt-5">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Add Product
            </button>
            <button href="#" type="button" class="btn btn-danger"><i class="far fa-file-excel" style="color: #ffffff;"></i></i></button>
              <button href="#" type="button" class="btn btn-info"><i class="fas fa-print" style="color: #ffffff;"></i></button>
              </div>
              </div>
              <div class="col">
                <div class="card mt-4 p-4">
                  <!-- start:table -->  
              <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td >Larry the Bird</td>
                        <td>@twitter</td>
                        <td>@facebok</td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- end:table -->
                  <!-- start:pagination -->
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end mt-2 ">
                      <li class="page-item">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
                  <!-- end:pagination -->
                </div>
              </div>
            </div>
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>


      <!-- modal -->
      <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content"> 
                  <div class="modal-header">
                    <h5 class="modal-title  fw-bolder" id="staticBackdropLabel">Form Product <br>
                    <span style="color: red; font-size:12px">*  <span  class="text-capitalize ">kolom input wajib diisi.</span></span>
                  </h5> <br>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="nama_produk" class="form-label">Product name <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="nama_produk" aria-describedby="nama_produk" placeholder="Contoh: Indomie">
                    </div>
                    <div class="mb-3">
                      <label for="id_category" class="form-label">Category <span style="color: red; font-size:20px">*</span></label>
                     <select name="id_category" id="id_category" class="form-control">
                      <option value="" selected>--Select option category--</option>
                      <option value="makanan">Makanan</option>
                      <option value="minuman">Minuman</option>  
                      <option value="Alat_tulis">Alat tulis</option>
                     </select>
                    </div>
                    <div class="mb-3">
                      <label for="stok" class="form-label">Stock <span style="color: red; font-size:20px">*</span></label>
                      <input type="number" class="form-control" id="stok" aria-describedby="stok" placeholder="0">
                    </div>
                    <div class="mb-3">
                      <label for="satuan" class="form-label">Satuan <span style="color: red; font-size:20px">*</span></label>
                     <select name="satuan" id="satuan" class="form-control">
                      <option value="" selected>--Select option satuan--</option>
                      <option value="Pcs">Pcs</option>
                      <option value="Pack">Pack</option>
                      <option value="gram">Gram (g)</option>
                      <option value="kilo_gram">Kilo gram (kg)</option>
                      <option value="liter">Liter (L)</option>
                      <option value="lusin">Lusin</option>
                      <option value="Box">Box</option>
                      <option value="rim">Rim</option>
                     </select>
                    </div>
                    <div class="mb-3">
                      <label for="harga" class="form-label">Price <span style="color: red; font-size:20px">*</span></label>
                      <input type="text" class="form-control" id="harga" aria-describedby="harga" placeholder="Contoh : 10000">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="far fa-window-close fa-sm" style="color: #ffffff;"></i></button>
                    <button type="button" class="btn btn-warning"><i class="fas fa-paper-plane" style="color: #ffffff;"></i></button>
                  </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
                  <!-- end:modal -->