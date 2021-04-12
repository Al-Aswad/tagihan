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