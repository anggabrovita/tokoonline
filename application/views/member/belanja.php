<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="col-lg-12 p-b-50 p-l-50">

        <div class="row">
            <div class="m-text15">
                <center><h1 class="p-b-10">Selamat Datang <?= $this->session->userdata('nama'); ?></h1></center>
            
                <?php if($pembelian) { ?> 
                <br><p class="text-danger mb-2">*Pemesanan akan dihapus jika selama 24jam pemesan belum melakukan pembayaran</p>   
                <table class="table table-bordered m-text15" width="100%" cellspacing="0">
                    <thead> 
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Tanggal Belanja</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Kode Transaksi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $nomor=1; foreach ($pembelian as $pembelian) { ?>
                    <tr>
                        <td><?= $nomor ?> </td>
                        <td><?= $pembelian->nama_produk ?> </td>
                        <td><?= date('d-m-Y', strtotime($pembelian->tanggal_transaksi)) ?></td>
                        <td><?= $pembelian->jumlah ?></td>
                        <td><?= number_format($pembelian->total_harga,0,',','.') ?></td>
                        <td><?= $pembelian->id_transaksi ?></td>
                        <td class="text-warning"><?= $pembelian->status ?></td>
                        <td>
                        <a href="<?= base_url('dashboard/konfirmasi/'.$pembelian->id_transaksi); ?>" class="flex-c-m size10 bg1 bo-rad-23 hov1 m-text3 trans-0-4" 
                        class="btn submit_btn">Konfirmasi
                        </a>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                    </tbody>
                </table>
                <?php 
                } else { ?>
                <p class="alert alert-warning">
                <i class="fa fa-warning"></i> Belum ada transaksi, silahkan<a href="<?= base_url('produk') ?>" class="text-info"><u> belanja </u></a>terlebih dahulu.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
