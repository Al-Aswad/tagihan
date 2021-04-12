<h5 class="mt-4 mb-2">Jumlah Berdasarkan Awb <code></code></h5>
<div class="row">
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box bg-gradient-info">
			<span class="info-box-icon"><i class="far fa-bookmark"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">PAD</span>
				<span class="info-box-number"><?= $jumlahawb->pad; ?></span>
				<div class="progress">
					<div class="progress-bar" style="width: 70%"></div>
				</div>
				<span class="progress-description">
					Sudah di Setor <?= $jumlahawb->s_pad; ?>
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
				<span class="info-box-number"><?= $jumlahawb->cash; ?></span>

				<div class="progress">
					<div class="progress-bar" style="width: 70%"></div>
				</div>
				<span class="progress-description">
					Sudah di Setor <?= $jumlahawb->s_cash; ?>
				</span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box bg-gradient-warning">
			<span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">COD</span>
				<span class="info-box-number"><?= $jumlahawb->cod; ?></span>
				<div class="progress">
					<div class="progress-bar" style="width: 70%"></div>
				</div>
				<span class="progress-description">
					Sudah di Setor <?= $jumlahawb->s_cod; ?>
				</span>
			</div>
		</div>
	</div>
	<div class="col-md-3 col-sm-6 col-12">
		<div class="info-box bg-gradient-danger">
			<span class="info-box-icon"><i class="fas fa-comments"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Total</span>
				<span class="info-box-number"><?= $jumlahawb->semua; ?></span>
				<div class="progress">
					<div class="progress-bar" style="width: 70%"></div>
				</div>
				<span class="progress-description">
					Sudah di Setor <?= $jumlahawb->s_semua; ?>
				</span>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Data Tagihan yang belum di setor ke ADMIN</h3>
			</div>
			<!-- /.card-header -->
			<div class="card-body pt-0">
				<table id="example1" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Waybill</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>TH</th>
							<th>Type</th>
							<th>Nominal</th>
							<th>POD-Time</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Trident</td>
							<td>Internet
								Explorer 4.0
							</td>
							<td>Win 95+</td>
							<td> 4</td>
							<td>X</td>
							<td>X</td>
							<td>X</td>
							<td>X</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Waybill</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>TH</th>
							<th>Type</th>
							<th>Nominal</th>
							<th>POD-Time</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>