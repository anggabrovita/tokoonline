<div class="container">
    <h1 class="h3 mb-2 text-gray-800 mx-1">Detail Pelanggan</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4"> 
                <form class="col-lg-12" action="<?php echo base_url('pelanggan/detail_pelanggan/.$data->id_user') ?>" method="POST" enctype="multipart/form-data">
                    <?php foreach($pelanggan as $data){ ?>
                    <div class="col-sm-10">
                        <table class="table table-bordered">
                            <tr><br>
                                <td width="200px">Nama</td>
                                <td>: <?= $data->nama; ?></td>
                            </tr>
                            <tr><br>
                                <td width="200px">Email</td>
                                <td>: <?= $data->email; ?></td>
                            </tr>
                            <tr><br>
                                <td width="200px">Alamat</td>
                                <td>: <?= $data->alamat; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Telepon</td>
                                <td>: <?= $data->telepon; ?></td>
                            </tr>
                            <tr>
                                <td width="200px">Bergabung sejak</td>
                                <td>: <?= date('d M Y', $data->tanggal_daftar); ?></td>
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
    