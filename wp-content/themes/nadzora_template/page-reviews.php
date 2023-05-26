
<?php 
    /*
		Template Name: Шаблон "Отзывы"
		Template Post Type: page
	*/

    get_header(); ?>

<?php  get_template_part('template_parts/block','slider');?>


<div class="box-content">
    <div class="box-content-wrap">
        <div class="container">
            <div class="box-content__inner">
                <div class="row">
                    <div class="col-md-4 order-2 order-md-1">
                        <?php get_sidebar(); ?>
                    </div>

                    <div class="col-md-8 order-1 order-md-2">
                        <div class="content">

                            <div class="breadcrumbs-box">                                                            
                                <?php
                                    if ( function_exists('yoast_breadcrumb')  ) {
                                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                                    }
                                ?>
                            </div>

                            <h1 class="page-title mt-0"><?php the_title(); ?></h1>

                            <div class="row p-items ">
                                <?php  $postloop = new WP_Query( 
                                    array(									
                                        'post_type' => 'reviews',                                    
                                    )                            
                                ); ?>
                                <?php while ( $postloop->have_posts() ) : $postloop->the_post();
                                    $img=get_field('image',get_the_ID());
                                ?>
                                <div class="col-md-6">
                                    <div class="rev-item">
                                        <div class="rev-item__img">
                                            <img src="<?php echo  $img; ?>" alt="">
                                        </div>
                                        <div class="rev-item__content">
                                            <p class="rev-item__name">
                                                <?php the_title(); ?>
                                            </p>
                                            <span class="date"><?php echo get_the_date(); ?></span>
                                            <?php the_content(); ?>
                                        </div>
                                    </div>                              
                                </div>
                                <?php  endwhile; wp_reset_postdata();?>
                            </div>

                           
                            
                        </div>
                        <?php echo do_shortcode('[contact-form-7 id="584" title="Форма Остались вопросы_copy"]');?>
                    </div>

                </div>
               
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>


