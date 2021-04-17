<div class="card col-md-6 p-0 offset-md-3 collapsed-card">
     <div class="card-header bg-primary">
          <h3 class="card-title">Filter Bulan</h3>
          <div class="card-tools">
               <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-plus"></i>
               </button>
          </div>
     </div>
     <div class="card-body pt-2">
          <form action="">
               <div class="bootstrap-timepicker ">
                    <div class="form-group">
                         <label>Pilih Bulan:</label>
                         <input type="text" class="form-control" name="bulan" id="datepicker" placeholder="mm-yyyy" required readonly>
                         <script>
                              var dp = $("#datepicker").datepicker({
                                   format: "yyyymm",
                                   startView: "months",
                                   minViewMode: "months",
                                   autoclose: true
                              });
                         </script>
                    </div>
               </div>
               <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary  px-4">Cari</button>
               </div>
          </form>
     </div>
</div>

<div class="card">
     <div class="card-header">
          <h3 class="card-title">Setoran ADMIN berdasarkan TH dan Tanggan POD-Time (Bulan Berjalan)</h3>
     </div>
     <!-- /.card-header -->
     <div class="card-body pt-0">
          <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
               <thead>
                    <tr>
                         <th>NO</th>
                         <th>TH</th>
                         <th class="nowrap">POD-Time</th>
                         <th>Tanggal-Setor</th>
                         <th>Jumlah-Setoran</th>
                         <th>Periksa</th>
                         <th>Aksi</th>
                    </tr>
               </thead>
               <tbody>
                    <?php $no = 1;
                    $total = 0;
                    foreach ($setoran as $s) { ?>
                         <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $s->th; ?></td>
                              <td class="text-nowrap"><?= $s->pod_time; ?></td>
                              <td class="text-nowrap"><?= $s->create_at; ?></td>
                              <td><?= number_format($s->total); ?></td>
                              <!-- <td><?= $s->jumlah . ' of ' . $s->belum_dikonfirmasi ?></td> -->
                              <td><small class="badge badge-warning"><?= $s->belum_dikonfirmasi ?> <i class="far fa-clock"></i></small>
                                   <small class="badge badge-success"><?= $s->jumlah ?> <i class="fas fa-check"></i></small>
                              </td>
                              <td>
                                   <a href="<?= site_url('setoran-cek/') . $s->kode_setor  ?>" class="btn btn-sm btn-primary">Cek</a>
                              </td>
                         </tr>
                    <?php
                         $total += $s->total;
                    }; ?>
               </tbody>
               <tfoot>
                    <tr>
                         <th>NO</th>
                         <th>TH</th>
                         <th>POD-Time</th>
                         <th>Tanggal-Setor</th>
                         <th><?= number_format($total); ?></th>
                         <th>Periksa</th>
                         <th>Aksi</th>
                    </tr>
               </tfoot>
          </table>
     </div>
     <!-- /.card-body -->
</div>