<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800 mx-1">Data Pembelian</h1>
  <?= $this->session->flashdata('message'); ?>
  <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= base_url('admin/laporan/penjualan'); ?>" target="_blank" class='btn btn-success btn-icon-split'>
                <span class='icon text-white-50'>
                  <i class='fas fa-print'></i>
                </span>
                <span class='text'>Cetak Laporan Penjualan</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Nama</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal Pembelian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Nama</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal Pembelian</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $nomor=1;
            foreach($pembelian as $data) {
            ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $data->id_transaksi; ?></td>
                <td><?= $data->nama; ?></td>
                <td><?= $data->nama_produk; ?></td>
                <td><?= 'Rp. '.number_format($data->harga,0,',','.') ?></td>
                <td><?= $data->jumlah; ?></td>
                <td><?= 'Rp. '.number_format($data->total_harga,0,',','.') ?></td>
                <td><?= date('d-m-Y', strtotime($data->tanggal_transaksi)); ?></td>
                <td class="text-warning"><?= $data->status ?></td>
                <td>
                    <a href="<?= base_url(); ?>admin/pembelian/hapus_pembelian/<?= $data->id_transaksi; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $data->nama ?>?')" class='btn btn-danger btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-trash'></i>
                        </span>
                        <span class='text'>Hapus</span>
                    </a><hr>
                    <a href="<?= base_url(); ?>admin/pembelian/detail_pembelian/<?= $data->id_transaksi; ?>"class='btn btn-primary btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-eye'></i>
                        </span>
                        <span class='text'>Detail</span>
                    </a>
                </td>
            </tr>
            <?php $nomor++; ?>
            <?php } 
            ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>