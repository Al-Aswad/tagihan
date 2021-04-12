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
          <h3 class="card-title">Tagihan berdasarkan TH dan Tanggan POD-Time (Bulan Berjalan)</h3>
     </div>
     <!-- /.card-header -->
     <div class="card-body pt-0">
          <table id="example1" class="table table-bordered table-striped">
               <thead>
                    <tr>
                         <th>NO</th>
                         <th>TH</th>
                         <th>POD-Time</th>
                         <th class="bg-warning text-white">Total</th>
                         <th class="bg-success">Sudah-Setor</th>
                         <th class="bg-primary">Sisa-Tagihan</th>
                         <th>Aksi</th>
                    </tr>
               </thead>
               <tbody>
                    <?php $no = 1;
                    $total_sisa = 0;
                    foreach ($tagihan as $t) { ?>
                         <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $t->th; ?></td>
                              <td><?= $t->pod_time; ?></td>
                              <td class="bg-warning"><?= number_format($t->total); ?></td>
                              <td class="bg-success"><?= number_format($t->terkonfirmasi); ?></td>
                              <td class="bg-primary"><?= number_format($t->total - $t->terkonfirmasi); ?></td>
                              <td>
                                   <a href="http://" class="btn btn-sm btn-primary">Cek</a>
                              </td>
                         </tr>
                    <?php
                         $total_sisa += $t->total - $t->terkonfirmasi;
                    }
                    ?>
               </tbody>
               <tfoot>
                    <tr>
                         <th>NO</th>
                         <th>TH</th>
                         <th>POD-Time</th>
                         <th>Total</th>
                         <th>Sudah-Setor</th>
                         <th><?= number_format($total_sisa); ?></th>
                         <th>Aksi</th>
                    </tr>
               </tfoot>
          </table>
     </div>
     <!-- /.card-body -->
</div>