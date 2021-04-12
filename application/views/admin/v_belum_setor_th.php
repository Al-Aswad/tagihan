<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header d-flex justify-content-between">
                    <div>
                         <h3 class="card-title">Data Tagihan yang belum di setor ke ADMIN Berdasarkan TH dan tanggal POD</h3>
                    </div>
                    <div class="col d-flex justify-content-end">
                         <h6 class="m-0 font-weight-bold float-right"><button class="btn  btn-primary mr-1" type="button" id="btn-setor">Setor</button>
                    </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body pt-0">
                    <form method="post" action="<?php echo base_url('setor-bulk') ?>" id="form-setor">
                         <table id="example1" class="table table-bordered table-hover">
                              <thead>
                                   <tr>
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

                              $("#btn-setor").click(function() { // Ketika user mengklik tombol delete
                                   var confirm = window.confirm("Apakah Anda yakin ingin menyetor?"); // Buat sebuah alert konfirmasi
                                   alert
                                   if (confirm) // Jika user mengklik tombol "Ok"
                                        $("#form-setor").submit(); // Submit form
                              });
                         });
                    </script>
               </div>
          </div>