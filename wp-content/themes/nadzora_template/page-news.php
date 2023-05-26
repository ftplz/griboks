
<?php 
    /*
		Template Name: Шаблон "Новости"
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
                                        'post_type' => 'post',                                    
                                    )                            
                                ); ?>
                                <?php while ( $postloop->have_posts() ) : $postloop->the_post();                                   
                                    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                ?>
                                <div class="col-lg-6">
                                    <div class="p-item">
                                        <div class="p-item__img" style="background:url('<?php echo $post_img_url;?>') no-repeat center;">
                                        </div>
                                        <p class="p-item__name">
                                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                        </p>
                                        <div class="p-item__content">
                                            <?php echo excerpt(20); ?>
                                        </div>
                                    </div>                                    
                                </div>
                                <?php  endwhile; wp_reset_postdata();?>
                            </div>                          
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>


