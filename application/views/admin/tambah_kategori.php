<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Tambah Kategori</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/kategori/tambah_kategori'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" value="<?php echo set_value('nama_kategori'); ?>">
                        <?php echo form_error('nama_kategori', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group my-3">
                        <label>Urutan</label>
                        <input type="number" class="form-control" name="urutan" value="<?php echo set_value('urutan'); ?>">
                        <?php echo form_error('urutan', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                        <a href="#" class="btn btn-secondary mb-3 btn-icon-split" onclick="window.history.go(-1)">
                            <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                        <button type="submit" name="submit" value="Submit" class="btn btn-primary mb-3 btn-icon-split">
                            <span class="icon text-white-50">
                            <i class="fas fa-download"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </button>
                </form>               
            </div>
        </div>
    </div>
</div>