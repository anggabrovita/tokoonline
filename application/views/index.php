<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
    <div class="container">
        <div class="sec-title p-b-60">
            <h2 class="m-text5 t-center">
                    Produk Terbaru
            </h2>
        </div>
        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
            <?php foreach ($data->result() as $key) : ?>
                <div class="item-slick2 p-l-15 p-r-15">

                    <?php 
                    //form proses belanja
                    echo form_open(base_url('keranjang/add/'));

                    echo form_hidden('id', $key->id_produk);
                    echo form_hidden('qty', 1);
                    echo form_hidden('price', $key->harga);
                    echo form_hidden('name', $key->nama_produk);

                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                    ?>

                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                            <img width="80" src="<?= base_url('assets/admin/foto/').$key->gambar; ?>" alt="IMG-PRODUCT">
                            <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>
                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                    <!-- Button belanja -->
                                    <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="block2-txt p-t-20">
                            <a href="<?= base_url('produk/detail/'.$key->kode_produk) ?>" class="block2-name dis-block s-text3 p-b-5">
                                <?= $key->nama_produk ?>
                            </a>
                            <span class="block2-price m-text6 p-r-5">
                                <?= 'Rp. '.number_format($key->harga, 0, ',', '.'); ?>
                            </span>
                        </div>
                    </div>

                    <?php 
                    //closing form
                    echo form_close();
                    ?>

                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>





