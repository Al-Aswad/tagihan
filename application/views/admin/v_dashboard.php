<!-- Info boxes -->
<div class="row">
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box">
			<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">COD</span>
				<span class="info-box-number">
					<?= $awb->cod; ?>
				</span>
			</div>
			<!-- /.info-box-content -->
		</div>
		<!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">PAD</span>
				<span class="info-box-number"><?= $awb->pad; ?></span>
			</div>
		</div>
	</div>
	<div class="clearfix hidden-md-up"></div>
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">CASH</span>
				<span class="info-box-number"><?= $awb->cash; ?></span>
			</div>
		</div>
	</div>
	<div class="col-12 col-sm-6 col-md-3">
		<div class="info-box mb-3">
			<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

			<div class="info-box-content">
				<span class="info-box-text">Total</span>
				<span class="info-box-number"><?= $awb->semua_awb; ?></span>
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
				<table id="d-home" class="table table-bordered table-hover" style="width: 100%;">
					<thead>
						<tr>
							<th>No</th>
							<th>Waybill</th>
							<th>NIK</th>
							<th>Nama</th>
							<th>TH</th>
							<th>Type</th>
							<th>Nominal</th>
							<th>POD_Time</th>
							<th>Lama</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

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
							<th>POD_Time</th>
							<th>Lama</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
					</tfoot>
				</table>
			</div>
		</div>