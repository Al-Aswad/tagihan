<div class="card">
     <div class="card-header">
          <h3 class="card-title">Nominal tagihan yang <span class="text-lg text-warning">Sudah</span> di setor ke Admin Berdasarkan TH dan tanggal POD</h3>
     </div>
     <!-- /.card-header -->
     <div class="card-body pt-0">
          <table id="table-belum-setor-th" class="table table-bordered table-striped">
               <thead>
                    <tr>
                         <th>NO</th>
                         <th>TH</th>
                         <th>POD-Time</th>
                         <th>PAD</th>
                         <th>Cash</th>
                         <th>COD</th>
                         <th>TOtal</th>
                         <th>Aksi</th>
                    </tr>
               </thead>
               <tbody>
                    <?php $no = 1;
                    $total = 0;
                    foreach ($sudah_setor as $s) { ?>
                         <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $s->th; ?></td>
                              <td><?= $s->pod_time; ?></td>
                              <td><?= number_format($s->pad); ?></td>
                              <td><?= number_format($s->cash); ?></td>
                              <td><?= number_format($s->cod); ?></td>
                              <td><?= number_format($s->total); ?></td>
                              <td>
                                   <a href="<?= base_url('') . 'home/sudah-setor-th/' . md5($s->id) ?>" class="btn btn-sm btn-primary">Cek</a>
                              </td>
                         </tr>
                    <?php
                         $total += $s->total;
                    } ?>
               </tbody>
               <tfoot>
                    <tr>
                         <th>NO</th>
                         <th>TH</th>
                         <th>POD-Time</th>
                         <th>PAD</th>
                         <th>Cash</th>
                         <th>COD</th>
                         <th><?= number_format($total); ?></th>
                         <th>Aksi</th>
                    </tr>
               </tfoot>
          </table>
     </div>
     <!-- /.card-body -->
</div>