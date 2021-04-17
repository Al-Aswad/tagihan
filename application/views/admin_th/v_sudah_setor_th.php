<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header">
                    <h3 class="card-title">Data Tagihan yang sudah di setor kurir ke admin</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body pt-0">
                    <table id="example1" class="table table-bordered table-hover" style="width: 100%;">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>Waybill</th>
                                   <th>TH</th>
                                   <th>POD-Time</th>
                                   <th>Kurir</th>
                                   <th>Type</th>
                                   <th>Nominal</th>
                                   <th>Aksi</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $no = 1;
                              $total = 0;
                              foreach ($sudah_setor as $b) { ?>
                                   <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $b->waybill; ?></td>
                                        <td><?= $b->th; ?></td>
                                        <td><?= $b->pod_time; ?></td>
                                        <td><?= $b->kurir; ?></td>
                                        <td><?= $b->type; ?></td>
                                        <td><?= number_format($b->fee); ?></td>
                                        <td>
                                             <a href="<?= site_url('') . 'batal-setor/' . $b->id ?>" class="btn btn-sm btn-primary">Batalkan</a>
                                        </td>
                                   </tr>
                              <?php
                                   $total += $b->fee;
                              } ?>
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
                                   <th>Aksi</th>
                              </tr>
                         </tfoot>
                    </table>
               </div>
          </div>