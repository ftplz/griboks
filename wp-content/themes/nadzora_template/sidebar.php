							<div class="sidebar">

								<div class="sidebar-section">
									<p class="sidebar-section__title">Рубрики</p>
									<nav>
										<?php
											wp_nav_menu( [
												'theme_location'  => 'sidebar_menu_location',
												'menu'            => '', 
												'container'       => 'ul', 
												'container_class' => 'sidebar-menu', 
												'container_id'    => '',
												'menu_class'      => 'sidebar-menu', 
												'menu_id'         => '',
												'echo'            => true,
												'fallback_cb'     => 'wp_page_menu',
												'before'          => '',
												'after'           => '',
												'link_before'     => '',
												'link_after'      => '',
												'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
												'depth'           => 0,
												'walker'          => '',
											] );
										?>
									</nav>
								</div>

								<?php if ( is_active_sidebar( 'sidebar-box' ) ) : ?>
									
										<?php  dynamic_sidebar( 'sidebar-box' ); ?>
									
								<?php endif; ?>

			

								

								<!-- <div class="sidebar-section mt-5">
									<p class="sidebar-section__title">Видео</p>
									<div class="vide-item" style="background: url('http://nadzora.loc/wp-content/themes/nadzora_template/img/vid1.jpg') no-repeat center;">
									<a data-fancybox href="https://www.youtube.com/watch?v=_sI_Ps7JSEk">

									</a>
									</div>
								</div> -->

								<div class="sidebar-section mt-5">
									<p class="sidebar-section__title d-none">Отзывы</p>
									<?php  $postloop = new WP_Query( 
										array(									
											'post_type' => 'reviews',
											'posts_per_page' => 1,                                     
											)                            
										);
									?>

 									<?php while ( $postloop->have_posts() ) : $postloop->the_post();
										$img=get_field('project_img',get_the_ID());
									?>

									<div class="r-item">
										<div class="r-item__img" style="background: url('<?php echo $img; ?>') no-repeat center;">
	
										</div>
										<p class="r-item__name">
											<?php the_title(); ?>
										</p>
										<div class="r-item__desc">
											<?php the_content(); ?>
										</div>
									</div>
									<?php  endwhile; wp_reset_postdata();?>

									<a href="/nadzora/otzyvy/" class="yellow-link mt-5 d-none"> <span>Все отзывы</span> </a>


								</div>


								
							</div>