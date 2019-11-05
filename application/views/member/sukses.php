<section class="bgwhite p-t-70 p-b-100">
    <div class="container">
        <div class="pos-relative">
            <div class="bgwhite">
                
                <h1><?= $title ?></h1><hr>
                <div class="clearfix"></div>
                <br><br>
                
                <?php if($this->session->flashdata('sukses')) {
                    echo '<div class="alert alert-warning">';
                    echo '<div class="alert alert-warning">';
                    echo '<div class="alert alert-warning">';
                    echo '</div>';
                }?>
                
                <p>Segera lakukan konfirmasi pembayaran, agar produk bisa segera kami proses. Silahkan <a class="text-warning" href="<?= base_url('dashboard/belanja')?>"><u>Konfirmasi disini</u></a> , terima kasih.</p>
            </div>
        </div>
    </div>
</section>