<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	</div>

	<!-- Content Row -->
	<div class="row">

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-3 col-md-6 mb-4">
	      <div class="card border-left-primary shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="<?= base_url('admin/kategori') ?>">Kategori Produk</a></div>
	              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $kategori[0]['count(id_kategori)']; ?></div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-tags fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- Pending Requests Card Example -->
	    <div class="col-xl-3 col-md-6 mb-4">
	      <div class="card border-left-warning shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><a href="<?= base_url('admin/rekening') ?>">Rekening</a></div>
	              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rekening[0]['count(id_rekening)']; ?></div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-3 col-md-6 mb-4">
	      <div class="card border-left-success shadow h-100 py-2">
	        <div class="card-body">
	          <div class="row no-gutters align-items-center">
	            <div class="col mr-2">
	              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a href="<?= base_url('admin/produk') ?>">Total Produk</a></div>
	              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $produk[0]['count(id_produk)']; ?></div>
	            </div>
	            <div class="col-auto">
	              <i class="fas fa-table fa-2x text-gray-300"></i>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	    <!-- Earnings (Monthly) Card Example -->
	    <div class="col-xl-3 col-md-6 mb-4">
			<div class="card border-left-info shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
					    <div class="col mr-2">
					      	<div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="<?= base_url('admin/pelanggan') ?>">Pelanggan Terdaftar</a></div>
							<div class="row no-gutters align-items-center">
								<div class="col-auto">
								  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $pelanggan[0]['count(id_user)']; ?></div>
								</div>
							</div>
				        </div>
						<div class="col-auto">
			              <i class="fas fa-users fa-2x text-gray-300"></i>
			            </div>
				    </div>
				</div>
			</div>
	    </div>
	</div>
</div>

<div class="row mt-5">
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header bg-success py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">5 Produk baru terakhir yang ditambahkan</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 text-center table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Tanggal Post</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getproduk as $p) { ?>
                            <tr>
                                <td><strong><?= date('d-m-Y', strtotime($p['tanggal_post'])); ?></strong></td>
                                <td><?= $p['nama_produk']; ?></td>
                                <td><?= $p['stok']; ?></td>
		                        <td><span class="badge badge-success"><?= 'Rp. '.number_format($p['harga'],0,',','.') ?></span></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card shadow mb-4">
            <div class="card-header bg-warning py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">5 Transaksi Terakhir</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-sm table-striped text-center">
                    <thead>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Pemesan</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi as $trs) : ?>
                            <tr>
                                <td><strong><?= date('d-m-Y', strtotime($trs['tanggal_transaksi'])); ?></strong></td>
                                <td><?= $trs['nama']; ?></td>
                                <td><?='Rp. '.number_format($trs['total_harga'],0,',','.'); ?></td>
                                <td><span class="badge badge-warning"><?= $trs['status']; ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>