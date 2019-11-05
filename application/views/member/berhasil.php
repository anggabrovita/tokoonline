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
                
                <p class="alert alert-success">Konfirmasi berhasil. Produk akan segera kami proses.</p>
            </div>
        </div>
    </div>
</section>