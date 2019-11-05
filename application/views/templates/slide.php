<?php $site = $this->konfigurasi_model->get_all() ?>
<!-- Slide1 -->
<section class="slide1">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1 item1-slick1" style="background-image: url(<?= base_url('assets/img/'.$site->banner) ?>);">
				<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
					<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
						<!-- Button -->
                            <a href="<?= base_url('produk') ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
							Shop Now
						</a>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>