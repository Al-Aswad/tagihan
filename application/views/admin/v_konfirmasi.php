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
                                   <th>Status</th>
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
                                        <td><?php if ($b->status == 0) { ?>
                                                  <small class="badge badge-warning"><i class="far fa-clock"></i> Pending</small>
                                             <?php
                                             } else { ?>
                                                  <small class="badge badge-success"><i class="fas fa-check"></i> Oke</small>
                                             <?php } ?>
                                        </td>
                                        <td>
                                             <a href="<?php echo base_url() . 'gambar/bukti_transfer/' . $b->bukti_setoran; ?>" target="_blank"><?= $b->bukti_setoran; ?></a>
                                        </td>
                                        <td><?= $b->keterangan; ?></td>
                                        <td>
                                             <?php if ($b->status == 0) { ?>
                                                  <a href="<?= site_url('') . 'konfirmasi/' . $b->kode_setor ?>" class="btn btn-sm btn-primary">Konfirmasi</a>
                                             <?php } else { ?>
                                                  <a href="<?= site_url('') . 'batal-konfirmasi/' . $b->kode_setor ?>" class="btn btn-sm btn-primary">Batal</a>
                                             <?php } ?>
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
                                   <th>Status</th>
                                   <th>Bukti Setoran</th>
                                   <th>Ket</th>
                                   <th>Aksi</th>
                              </tr>
                         </tfoot>
                    </table>
               </div>
          </div>