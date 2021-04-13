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
          <h3 class="card-title">Setoran Kurir ke Admin</h3>
     </div>
     <!-- /.card-header -->
     <div class="card-body pt-0">
          <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
               <thead>
                    <tr>
                         <th>NO</th>
                         <th>TH</th>
                         <th class="nowrap">POD-Time</th>
                         <th>Total</th>
                         <th>Belum-Setor</th>
                         <th class="bg-success">Jumlah-Setoran</th>
                         <th>Aksi</th>
                    </tr>
               </thead>
               <tbody>
                    <?php $no = 1;
                    foreach ($setoran as $s) { ?>
                         <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $s->th; ?></td>
                              <td class="text-nowrap"><?= $s->pod_time; ?></td>
                              <td class="text-nowrap"><?= number_format($s->total); ?></td>
                              <td class="text-nowrap"><?= number_format($s->blm_setor); ?></td>
                              <td class="text-nowrap bg-success"><?= number_format($s->sdh_setor); ?></td>
                              <td> <?php if ($s->sdh_setor > 0) { ?>
                                        <a href="<?= site_url('admin-setor/') . $s->pod_time ?>" class="btn btn-sm btn-primary">Setor</a>
                                   <?php }; ?>
                              </td>
                         </tr>
                    <?php }; ?>
               </tbody>
               <tfoot>
                    <tr>
                         <th>NO</th>
                         <th>TH</th>
                         <th class="nowrap">POD-Time</th>
                         <th>Total</th>
                         <th>Belum-Setor</th>
                         <th class="bg-success">Jumlah-Setoran</th>
                         <th>Aksi</th>
                    </tr>
               </tfoot>
          </table>
     </div>
     <!-- /.card-body -->
</div>