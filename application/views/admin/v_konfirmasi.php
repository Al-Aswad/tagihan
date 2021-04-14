<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header">
                    <h3 class="card-title">Cek Bukti setoran admin</h3>
               </div>
               <!-- /.card-header -->
               <div class="card-body pt-0">
                    <table id="table-belum-setor" class="table table-bordered table-hover" style="width: 100%;">
                         <thead>
                              <tr>
                                   <th>No</th>
                                   <th>TH</th>
                                   <th>POD-Time</th>
                                   <th>Tanggal-setor</th>
                                   <th>Jumlah</th>
                                   <th>Bukti Setoran</th>
                                   <th>Ket</th>
                                   <th>Aksi</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php $no = 1;
                              $total = 0;
                              foreach ($setoran_cek as $b) { ?>
                                   <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $b->th; ?></td>
                                        <td><?= $b->pod_time; ?></td>
                                        <td><?= $b->create_at; ?></td>
                                        <td><?= number_format($b->jumlah); ?></td>
                                        <td><?= $b->bukti_setoran; ?></td>
                                        <td><?= $b->keterangan; ?></td>
                                        <td>
                                             <a href="<?= site_url('') . 'konfirmasi' . $b->kode_setor ?>" class="btn btn-sm btn-primary">Konfirmasi</a>
                                        </td>
                                   </tr>
                              <?php
                                   $total += $b->jumlah;
                              }; ?>
                         </tbody>
                         <tfoot>
                              <tr>
                                   <th>No</th>
                                   <th>TH</th>
                                   <th>POD-Time</th>
                                   <th>Tanggal-setor</th>
                                   <th><?= number_format($total); ?></th>
                                   <th>Bukti Setoran</th>
                                   <th>Ket</th>
                                   <th>Aksi</th>
                              </tr>
                         </tfoot>
                    </table>
               </div>
          </div>