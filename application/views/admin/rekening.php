<div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800 mx-1">Data Rekening</h1>
                    <?= $this->session->flashdata('message'); ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="<?= base_url('admin/rekening/tambah_rekening'); ?>" class='btn btn-primary btn-icon-split'>
                        <span class='icon text-white-50'>
                          <i class='fas fa-plus'></i>
                        </span>
                        <span class='text'>Tambah Rekening</span>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bank</th>
                        <th>Nomor Pemilik</th>
                        <th>Pemilik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Bank</th>
                        <th>Nomor Pemilik</th>
                        <th>Pemilik</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $nomor=1;
                    foreach($data as $rekening) :
                    ?>
                    <tr>
                        <td><?= $nomor; ?></td>
                        <td><?= $rekening->nama_bank; ?></td>
                        <td><?= $rekening->nomor_rekening; ?></td>
                        <td><?= $rekening->nama_pemilik; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>admin/rekening/hapus_rekening/<?= $rekening->id_rekening; ?>" onclick="return confirm('Apa anda yakin ingin menghapus <?= $rekening->nama_pemilik ?>?')"class='btn btn-danger btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-trash'></i>
                                </span>
                                <span class='text'>Hapus</span>
                            </a>
                            <a href="<?= base_url(); ?>admin/rekening/update_rekening/<?= $rekening->id_rekening; ?>"class='btn btn-warning btn-icon-split'>
                                <span class='icon text-white-50'>
                                  <i class='fas fa-exclamation-triangle'></i>
                                </span>
                                <span class='text'>Ubah</span>
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
</div>