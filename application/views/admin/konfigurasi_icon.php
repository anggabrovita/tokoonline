<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Konfigurasi Icon</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/konfigurasi/simpan_icon') ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Icon</label>
                        <div class="my-3 mx-2">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="<?= base_url('assets/img/').$konfigurasi->icon; ?>" width="100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-3">
                        <input type="file" class="form-control" name="icon" required>
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