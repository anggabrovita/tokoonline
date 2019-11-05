<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Konfigurasi Website</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/konfigurasi/simpan') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $konfigurasi->email ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="telepon" value="<?php echo $konfigurasi->telepon ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Alamat</label>
                        <textarea cols="5" type="text" class="form-control" name="alamat" required><?php echo $konfigurasi->alamat ?></textarea>
                    </div>
                    <div class="form-group my-3">
                        <label>Alamat Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="<?php echo $konfigurasi->facebook ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Alamat Instagram</label>
                        <input type="text" class="form-control" name="instagram" value="<?php echo $konfigurasi->instagram ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Meta Author</label>
                        <input type="text" class="form-control" name="author" value="<?php echo $konfigurasi->author ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Meta SEO Google (keywords)</label>
                        <input type="text" class="form-control" name="keyword" value="<?php echo $konfigurasi->keyword ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Meta Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" value="<?php echo $konfigurasi->deskripsi ?>" required>
                    </div>
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