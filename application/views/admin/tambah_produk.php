<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Tambah Produk</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/produk/tambah_produk'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label>Kode Produk</label>
                        <input type="hidden" name="tanggal_post" value="<?= date('Y-m-d') ?>">
                        <input type="text" class="form-control" name="kode_produk" value="<?= set_value('kode_produk', $kode_produk); ?>" readonly>
                    </div>
                    <div class="form-group my-3">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>">
                        <?php echo form_error('nama', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group my-2">
                        <label>Kategori Produk</label>
                            <select name="id_kategori" class="form-control" required>
                                <option class="form-control" value="">
                                    --Pilih Kategori--
                                    <?php foreach ($kategori as $kategori) { ?>
                                    <option value="<?= $kategori->id_kategori ?>"><?= $kategori->nama_kategori ?></option>
                                    <?php } ?>
                                </option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" class="form-control" name="harga" value="<?php echo set_value('harga'); ?>">
                        <?php echo form_error('harga', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="stok" value="<?php echo set_value('stok'); ?>">
                        <?php echo form_error('stok', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" value="<?php echo set_value('ukuran'); ?>">
                        <?php echo form_error('ukuran', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="text" class="form-control" name="berat" value="<?php echo set_value('berat'); ?>">
                        <?php echo form_error('berat', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="10" name="deskripsi" value=""><?php echo set_value('deskripsi'); ?></textarea>
                        <?php echo form_error('deskripsi', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto" required>
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