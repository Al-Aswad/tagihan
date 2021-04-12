<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header">
                    <h3 class="card-title">Data Tagihan yang belum di setor ke ADMIN Berdasarkan TH dan tanggal POD</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body pt-0">
                    <table id="example1" class="table table-bordered table-hover">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>TH</th>
                                   <th>POD-Time</th>
                                   <th>PAD</th>
                                   <th>Cash</th>
                                   <th>COD</th>
                                   <th>Total</th>
                                   <th>Aksi</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $no = 1;
                              foreach ($belum_setor as $b) { ?>
                                   <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $b->th; ?></td>
                                        <td><?= $b->pod_time; ?></td>
                                        <td><?= number_format($b->pad) ?></td>
                                        <td><?= number_format($b->cash) ?></td>
                                        <td><?= number_format($b->cod) ?></td>
                                        <td><?= number_format($b->semua) ?></td>
                                        <td>
                                             <a href="<?= site_url('') . 'home/belum-setor-th/' . md5($b->id) ?>" class="btn btn-sm btn-primary">Cek</a>
                                        </td>
                                   </tr>
                              <?php }; ?>
                         </tbody>
                         <tfoot>
                              <tr>
                                   <th>No</th>
                                   <th>TH</th>
                                   <th>POD-Time</th>
                                   <th>PAD</th>
                                   <th>Cash</th>
                                   <th>COD</th>
                                   <th>Total</th>
                                   <th>Aksi</th>
                              </tr>
                         </tfoot>
                    </table>
               </div>
          </div>