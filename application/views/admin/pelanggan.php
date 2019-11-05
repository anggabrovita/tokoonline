<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 text-gray-800 mx-1">Data Pelanggan</h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="<?= base_url('admin/laporan/data_pelanggan'); ?>" target="_blank" class='btn btn-success btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-print'></i>
                        </span>
                        <span class='text'>Cetak Data Pelanggan</span>
                    </a>
                    
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $nomor=1;
                    foreach($pelanggan as $data) :
                    ?>
                    <tr>
                        <td><?= $nomor; ?></td>
                        <td><?= $data->nama; ?></td>
                        <td><?= $data->email; ?></td>
                        <td><?= $data->telepon; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/pelanggan/hapus_pelanggan/<?= $data->id_user; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $data->nama ?>?')" class='btn btn-danger btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-trash'></i>
                                </span>
                                <span class='text'>Hapus</span>
                            </a>

                            <a href="<?= base_url(); ?>admin/pelanggan/detail_pelanggan/<?= $data->id_user; ?>" class='btn btn-info btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-eye'></i>
                                </span>
                                <span class='text'>Detail</span>
                            </a>
                            
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>