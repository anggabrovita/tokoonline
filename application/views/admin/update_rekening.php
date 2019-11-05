<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Update Rekening</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/rekening/update_rekening/') ?><?= $rekening->id_rekening ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Nama Bank</label>
                        <input type="text" class="form-control" name="nama_bank" value="<?php echo $rekening->nama_bank ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Nomor Rekening</label>
                        <input type="number" class="form-control" name="nomor_rekening" value="<?php echo $rekening->nomor_rekening ?>" required>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Pemilik (atas nama)</label>
                        <input type="text" class="form-control" name="nama_pemilik" value="<?php echo $rekening->nama_pemilik ?>" required>
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