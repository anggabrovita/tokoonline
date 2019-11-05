<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Update Produk</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <form class="col-lg-12" action="<?php echo base_url('admin/produk/update_produk/'.$produk->id_produk); ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group mt-3">
                        <label>Nama Produk</label>
                        <input type="hidden" class="form-control" name="kode_produk" value="<?php echo $produk->kode_produk ?>">
                        <input type="text" class="form-control" name="nama_produk" value="<?php echo $produk->nama_produk ?>">
                        <?php echo form_error('nama', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group my-2">
                        <label>Kategori Produk</label>
                        <select name="id_kategori" class="form-control">
                            <?php foreach ($kategori as $kategori) { ?>
                            <option value="<?= $kategori->id_kategori ?>" <?php if($produk->id_kategori==$kategori->id_kategori){ echo "selected"; } ?>> <?= $kategori->nama_kategori ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" class="form-control" name="harga" value="<?php echo $produk->harga ?>">
                        <?php echo form_error('harga', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="stok" value="<?php echo $produk->stok ?>">
                        <?php echo form_error('stok', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Ukuran</label>
                        <input type="text" class="form-control" name="ukuran" value="<?php echo $produk->ukuran ?>">
                        <?php echo form_error('ukuran', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Berat</label>
                        <input type="text" class="form-control" name="berat" value="<?php echo $produk->berat ?>">
                        <?php echo form_error('berat', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="form-control" rows="5" name="deskripsi"><?php echo $produk->deskripsi ?></textarea>
                        <?php echo form_error('deskripsi', '<small class="text-danger" pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <div class="my-3 mx-2">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="<?= base_url('assets/admin/foto/').$produk->gambar; ?>" width="250">
                                </div>
                            </div>
                        </div>
                        <input type="file" class="form-control" name="gambar">
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