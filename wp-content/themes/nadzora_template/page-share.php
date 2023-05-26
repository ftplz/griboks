
<?php 
    /*
		Template Name: Шаблон "Акции"
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

                            <div class="row share-items ">
                                <?php  $postloop = new WP_Query( 
                                    array(									
                                        'post_type' => 'shares',                                    
                                    )                            
                                ); ?>
                                <?php while ( $postloop->have_posts() ) : $postloop->the_post();
                                    $img=get_field('image',get_the_ID());
                                ?>
                                <div class="col-md-12">
                                    <div class="share-item">
                                        <div class="share-item__img" style="background:url('<?php echo $img; ?>') no-repeat center;">
                                            
                                        </div>
                                        
                                        <p class="share-item__name">
                                            <?php the_title(); ?>
                                        </p>                                
                                       
                                    </div>                              
                                </div>
                                <?php  endwhile; wp_reset_postdata();?>
                            </div>

                            <?php the_content(); ?>

                            <?php echo (do_shortcode('[contact-form-7 id="124" title="Форма Остались вопросы"]'));?>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>


