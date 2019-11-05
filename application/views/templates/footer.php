<?php 	$nav_produk = $this->produk_model->nav_produk();
		$site = $this->konfigurasi_model->get_all();
 ?>
<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Kontak Kami
				</h4>

				<div>
					<p class="s-text7 w-size27">
	                    <?= $site->alamat ?> 
                    <br><i class="fa fa-envelope"></i> <?= $site->email ?>
                    <br><i class="fa fa-phone"></i> <?= $site->telepon ?> 
					</p>

					<div class="flex-m p-t-30">
						<a href="<?= $site->facebook ?>" target="_blank" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="<?= $site->instagram ?>" target="_blank" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Kategori
				</h4>

				<ul>
                <?php foreach ($nav_produk as $nav_produk) { ?>
					<li class="p-b-9">
						<a href="<?= base_url('produk/kategori/'.$nav_produk->url); ?>" class="s-text7">
                        <?= $nav_produk->nama_kategori ?>
						</a>
					</li>
                <?php } ?>
				</ul>
			</div>



			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>

					<li class="p-b-9">
						<a href="<?= base_url('tentang'); ?>" class="s-text7">
							Tentang
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?= base_url('kontak'); ?>" class="s-text7">
							Kontak
						</a>
					</li>
				</ul>
			</div>

			<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<!-- Button -->
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
	        <div class="t-center s-text8 p-t-20">
	            &copy;<script>document.write(new Date().getFullYear());</script> Toko Online with <i class="fa fa-heart" aria-hidden="true"></i> by 
	            <a href="#" target="_blank">RINDU</a>
	        </div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/templates/js/main.js"></script>

</body>
</html>
