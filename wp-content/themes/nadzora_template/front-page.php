
	<?php get_header(); ?>

	<?php // get_template_part('template_parts/block','slider');?>

	<div class="box-content">
		<div class="box-content-wrap">
			<div class="container">
				<div class="box-content__inner">
					<div class="row">            
						<div class="col-md-12 order-1 order-md-2">
							<div class="content border-none">
							<div class="article-wrap" itemscope itemtype="http://schema.org/Article">
                <article> 
									<h1>Сайт про грибковые и дерматологические заболевания</h1>
									<meta itemprop="description"  content="Сайт про грибковые и дерматологические заболевания">
									<div class="" itemprop="articleBody" >
										<?php the_content(); ?>
									</div>
									<!-- <h2>Статьи про грибковые заболевания</h2> -->
									<div class="row mt-5">
										
										<?php 
										
										$arg = array(
											'post_type'      => 'post',
											// 'order'          => 'ASC',
											// 'orderby'        => 'menu_order',
											'posts_per_page' => 15,
											'paged' => get_query_var('paged'),
											// 'post_status' => 'publish',
									
										);
									
										$the_query = new WP_Query( $arg );
										
										if( $the_query->have_posts()): ?>
											<?php while ($the_query->have_posts()) : $the_query->the_post();
											?>						
													<div class="col-lg-12">										  
														<?php echo get_template_part('template_parts/post','item'); ?>                        
													</div>
											<?php endwhile; ?>			
										<?php endif; ?>
									</div>  
								</article>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
		</div>
	
	</div>

	<?php get_footer(); ?>


