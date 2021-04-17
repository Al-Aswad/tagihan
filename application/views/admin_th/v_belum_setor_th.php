<div class="swal" data-swal="<?= $this->session->flashdata('pesan'); ?>"></div>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header d-flex justify-content-between">
                    <div>
                         <h3 class="card-title">Data Tagihan yang belum di setor ke ADMIN tanggal POD</h3>
                    </div>
                    <div class="col d-flex justify-content-end">
                         <h6 class="m-0 font-weight-bold float-right"><button class="btn  btn-primary mr-1 btn btn-hapus" type="button" id="btn-setor">Setor</button>
                    </div>
               </div>
               <div class="card-body pt-0">
                    <form method="post" action="<?php echo base_url('setor-bulk') ?>" id="form-setor">
                         <table id="table-belum-setor-th" class="table table-bordered table-hover">
                              <thead>
                                   <tr>
                                        <th>
                                             <div class="custom-control custom-checkbox">
                                                  <input class="custom-control-input custom-control-input-primary" type="checkbox" id="check-all">
                                                  <label for="check-all" class="custom-control-label"></label></i>
                                             </div>
                                        </th>
                                        <th>No</th>
                                        <th>Waybill</th>
                                        <th>TH</th>
                                        <th>POD-Time</th>
                                        <th>Kurir</th>
                                        <th>Type</th>
                                        <th>Nominal</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php $no = 1;
                                   $total = 0;
                                   foreach ($belum_setor as $b) { ?>
                                        <tr>
                                             <td>
                                                  <div class="custom-control custom-checkbox">
                                                       <input class="check-item custom-control-input custom-control-input-primary" type="checkbox" id="<?= $b->id; ?>" name="id[]" value="<?= ($b->id) ?>">
                                                       <input class="check-item custom-control-input custom-control-input-primary" type="hidden" name="th" value="<?= $b->th ?>">
                                                       <input class="check-item custom-control-input custom-control-input-primary" type="hidden" name="pod_time" value="<?= $b->pod_time ?>">
                                                       <label for="<?= $b->id; ?>" class="custom-control-label"></label>
                                                  </div>
                                             </td>
                                             <td><?= $no++; ?></td>
                                             <td><?= $b->waybill; ?></td>
                                             <td><?= $b->th; ?></td>
                                             <td><?= $b->pod_time; ?></td>
                                             <td><?= $b->kurir; ?></td>
                                             <td><?= $b->type; ?></td>
                                             <td><?= number_format($b->fee); ?></td>
                                        </tr>
                                   <?php
                                        $total += $b->fee;
                                   }
                                   ?>
                                   <input type="hidden" name="th" value="<?= md5($b->th); ?>">
                                   <input type="hidden" name="pod_time" value="<?= md5($b->pod_time); ?>">
                              </tbody>
                              <tfoot>
                                   <tr>
                                        <th><i class=" far fa-check-square"></i></th>
                                        <th>No</th>
                                        <th>Waybill</th>
                                        <th>TH</th>
                                        <th>POD-Time</th>
                                        <th>Kurir</th>
                                        <th>Type</th>
                                        <th class="bg-warning"><?= number_format($total); ?></th>
                              </tfoot>
                         </table>
                    </form>
                    <script>
                         $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
                              $("#check-all").click(function() { // Ketika user men-cek checkbox all
                                   if ($(this).is(":checked")) // Jika checkbox all diceklis
                                        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
                                   else // Jika checkbox all tidak diceklis
                                        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
                              });

                              // $("#btn-setor").click(function() { // Ketika user mengklik tombol delete
                              //      var confirm = window.confirm("Apakah Anda yakin ingin menyetor?"); // Buat sebuah alert konfirmasi
                              //      alert
                              //      if (confirm) // Jika user mengklik tombol "Ok"
                              //           $("#form-setor").submit(); // Submit form
                              // });
                         });
                    </script>
               </div>
          </div>