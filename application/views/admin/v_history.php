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

<h5 class="mt-4 mb-2">Jumlah Berdasarkan Awb <code></code></h5>
<div class="row">
     <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-info">
               <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

               <div class="info-box-content">
                    <span class="info-box-text">PAD</span>
                    <span class="info-box-number"><?= $historyawb->pad; ?></span>
                    <div class="progress">
                         <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                         Belum di Setor <?= $historyawb->b_pad; ?>
                    </span>
               </div>
               <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
     </div>
     <!-- /.col -->
     <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-success">
               <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

               <div class="info-box-content">
                    <span class="info-box-text">Cash</span>
                    <span class="info-box-number"><?= $historyawb->cash; ?></span>

                    <div class="progress">
                         <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                         Belum di Setor <?= $historyawb->b_cash; ?>
                    </span>
               </div>
          </div>
     </div>
     <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-warning">
               <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
               <div class="info-box-content">
                    <span class="info-box-text">COD</span>
                    <span class="info-box-number"><?= $historyawb->cod; ?></span>
                    <div class="progress">
                         <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                         Belum di Setor <?= $historyawb->b_cod; ?>
                    </span>
               </div>
          </div>
     </div>
     <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-gradient-danger">
               <span class="info-box-icon"><i class="fas fa-comments"></i></span>
               <div class="info-box-content">
                    <span class="info-box-text">Total</span>
                    <span class="info-box-number"><?= $historyawb->semua; ?></span>
                    <div class="progress">
                         <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                         Belum di Setor <?= $historyawb->b_semua; ?>
                    </span>
               </div>
          </div>
     </div>
</div>


<div class="card">
     <div class="card-header">
          <h3 class="card-title">Histori Tagihan berdasarkan Tanggal POD-Time</h3>
     </div>
     <!-- /.card-header -->
     <div class="card-body pt-0">
          <table id="example1" class="table table-bordered table-striped" style="width: 100%;">
               <thead>
                    <tr>
                         <th>NO</th>
                         <th>POD-Time</th>
                         <th>PAD</th>
                         <th>Cash</th>
                         <th>COD</th>
                         <th class="bg-warning text-white">Total</th>
                         <th class="bg-success">Sudah-Setor</th>
                         <th class="bg-primary">Sisa-Tagihan</th>
                         <th>Aksi</th>
                    </tr>
               </thead>
               <tbody>
                    <?php $no = 1;
                    $total = 0;
                    $total_sudah_setor = 0;
                    $total_belum_setor = 0;
                    foreach ($historynominal as $h) { ?>
                         <tr>
                              <td><?= $no++; ?></td>
                              <td><?= $h->pod_time; ?></td>
                              <td><?= number_format($h->pad); ?></td>
                              <td><?= number_format($h->cash); ?></td>
                              <td><?= number_format($h->cod); ?></td>
                              <td><?= number_format($h->semua); ?></td>
                              <td><?= number_format($h->sudah_setor); ?></td>
                              <td><?= number_format($h->belum_setor); ?></td>
                              <td>
                                   <a href="http://" class="btn btn-sm btn-primary">Cek</a>
                              </td>
                         </tr>
                    <?php
                         $total += $h->semua;
                         $total_belum_setor += $h->belum_setor;
                         $total_sudah_setor += $h->sudah_setor;
                    }
                    ?>
               </tbody>
               <tfoot>
                    <tr>
                         <th>NO</th>
                         <th>POD-Time</th>
                         <th>PAD</th>
                         <th>Cash</th>
                         <th>COD</th>
                         <th class="bg-warning text-white"><?= number_format($total); ?></th>
                         <th class="bg-primary"><?= number_format($total_sudah_setor); ?></th>
                         <th class="bg-success"><?= number_format($total_belum_setor); ?></th>
                         <th>Aksi</th>
                    </tr>
               </tfoot>
          </table>
     </div>
     <!-- /.card-body -->
</div>