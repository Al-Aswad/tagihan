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
          <h3 class="card-title">Setoran ADMIN berdasarkan POD-Time (Tagihan akan tetap naik sebelum di konfirmasi Finance)</h3>
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
                         <th>Status</th>
                    </tr>
               </thead>
               <tbody>
                    <?php $no = 1;
                    $total = 0;
                    foreach ($setoran as $s) { ?>
                         <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $s->th ?></td>
                              <td><?= $s->pod_time ?></td>
                              <td><?= $s->create_at ?></td>
                              <td><?= number_format($s->jumlah) ?></td>
                              <td><?php if ($s->status == 0) { ?>
                                        <small class="badge badge-warning"><i class="far fa-clock"></i> Pending</small>
                                   <?php
                                   } else { ?>
                                        <small class="badge badge-success"><i class="fas fa-check"></i> Oke</small>
                                   <?php } ?>
                              </td>
                         </tr>
                    <?php
                         $total += $s->jumlah;
                    }; ?>
               </tbody>
               <tfoot>
                    <tr>
                         <th>NO</th>
                         <th>TH</th>
                         <th class="nowrap">POD-Time</th>
                         <th>Tanggal-Setor</th>
                         <th><?= number_format($total); ?></th>
                         <th>Status</th>
                    </tr>
               </tfoot>
          </table>
     </div>
     <!-- /.card-body -->
</div>