<div class="box-slider">
		<div class="swiper-container main-slider">
			<div class="swiper-wrapper">
				<?php $slides=get_field('box1_r',5); ?>
				<?php foreach($slides as $slide) { 
						$img=$slide['img'];
						$name=$slide['name'];
						$desc=$slide['desc'];
						$link=$slide['link'];
					?>
					<div class="swiper-slide">
						<div class="main-slide" style="background-image: url('<?php echo $img; ?>');">
							<div class="container">
								
								<h2 class="slide-title"><?php echo $name; ?></h2>
								<p class="slide-desc mt-5 mb-5"><?php echo $desc; ?></p>
								<div class="slide-btm">
									<a href="<?php echo $link; ?>" class="btn btn_yellow">Узнать подробнее</a>
									<div class="counts"><span class="current">1</span>/<span class="total">1</span> </div>
								</div>
							</div>
						</div>

					</div>
				<?php } ?>

			</div>
		</div>
		<div class="swiper-pagination m-pagination">  </div>
		<!-- <div class="swiper-button-prev m-prev"></div>
		<div class="swiper-button-next m-next"></div> -->
	</div>