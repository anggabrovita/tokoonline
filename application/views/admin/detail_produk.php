<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Detail Produk</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4"> 
                <form class="col-lg-12" action="<?php echo base_url('produk/detail_produk/.$produk->id_produk') ?>" method="POST" enctype="multipart/form-data">
                    <?php foreach($produk as $data){ ?>
                    <div class="my-3 mx-2">
                        <div class="row">
                            <div class="col-sm-2">
                                <img src="<?= base_url('assets/admin/foto/').$data->gambar; ?>" width="300">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <table class="table table-bordered">
                            <tr><br>
                                <td width="200px">Nama Produk</td>
                                <td>: <?= $data->nama_produk; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Harga</td>
                                <td>: <?= 'Rp. '.number_format($data->harga); ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Stok</td>
                                <td>: <?= $data->stok; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Ukuran</td>
                                <td>: <?= $data->ukuran; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Berat</td>
                                <td>: <?= ($data->berat); ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Deskripsi</td>
                                <td>: <?= nl2br($data->deskripsi); ?></td>
                            </tr>
                        </table>
                    </div><br>
                        <a href="#" class="btn btn-secondary mb-3 ml-3 btn-icon-split" onclick="window.history.go(-1)">
                            <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                            </span>
                            <span class="text">Kembali</span>
                        </a>
                      <?php } ?>
                </form>               
                        </div>
                    </div>
            </div>
        </div>
    