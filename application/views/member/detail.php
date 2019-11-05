<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-50">
	<div class="flex-w flex-sb">
		<div class="w-size13 p-t-30 respon5">
			<div class="wrap-slick3 flex-sb flex-w">
				<div class="wrap-slick3-dots"></div>
				<div class="slick3">
					<div class="item-slick3" data-thumb="<?= base_url('assets/admin/foto/'.$produk->gambar); ?>">
						<div class="wrap-pic-w">
							<img src="<?= base_url('assets/admin/foto/'.$produk->gambar); ?>" alt="<?= $produk->nama_produk ?>">
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="w-size14 p-t-30 respon5">
			<?php 
			//form proses belanja
			echo form_open(base_url('keranjang/add/'));

			echo form_hidden('id', $produk->id_produk);
			echo form_hidden('qty', 1);
			echo form_hidden('price', $produk->harga);
			echo form_hidden('name', $produk->nama_produk);

			echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
			?>	
			
			<h4 class="product-detail-name m-text16 p-b-13">
				<strong><?= $produk->nama_produk; ?></strong>
			</h4>

			<span class="m-text17">
				<?= 'Rp. '.number_format($produk->harga, 0, ',', '.'); ?>
			</span>

			<p class="s-text8 p-t-20">
                <?= $produk->deskripsi; ?>
            </p>

            <div class="p-b-50 mt-4">
            	<span class="s-text8">Kategori : <?= $produk->url ?></span>
            </div>

			<!--  -->
			<div class="w-size16 flex-m flex-w">
				<div class="flex-w bo5 of-hidden m-r-22 m-l-10 m-t-10 m-b-10">
					<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
						<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
					</button>

					<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="1">

					<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
						<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
					</button>
				</div>

				<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<button type="submit" value="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Add to Cart
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

