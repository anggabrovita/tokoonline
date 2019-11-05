<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 mx-1">Data Produk</h1>
              <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="<?= base_url('admin/produk/tambah_produk'); ?>" class='btn btn-primary btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-plus'></i>
                        </span>
                        <span class='text'>Tambah Data</span>
                    </a>

                    <a href="<?= base_url('admin/laporan/data_produk'); ?>" target="_blank" class='btn btn-success btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-print'></i>
                        </span>
                        <span class='text'>Cetak Data Produk</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Produk</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Kode Produk</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $nomor=1;
                    foreach($produk as $produk) {
                    ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $produk->kode_produk ?></td>
                        <td><?= $produk->nama_produk ?></td>
                        <td><?= $produk->nama_kategori ?></td>
                        <td><?= 'Rp. '.number_format($produk->harga,0,',','.') ?></td>
                        <td>
                            <img src="<?= base_url(); ?>assets/admin/foto/<?= $produk->gambar ?>" width="100">
                        </td>
                        <td>
                            <a href="<?= base_url(); ?>admin/produk/hapus_produk/<?= $produk->id_produk; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $produk->nama_produk ?>?')" class='btn btn-danger btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-trash'></i>
                                </span>
                            </a>

                            <a href="<?= base_url(); ?>admin/produk/update_produk/<?= $produk->id_produk; ?>" class='btn btn-warning btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-exclamation-triangle'></i>
                                </span>
                            </a>

                            <a href="<?= base_url(); ?>admin/produk/detail_produk/<?= $produk->id_produk; ?>" class='btn btn-info btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-eye'></i>
                                </span>
                            </a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>