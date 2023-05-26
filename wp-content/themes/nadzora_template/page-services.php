
<?php 
    /*
		Template Name: Шаблон "Цены"
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

                        <?php  $postloop = new WP_Query( 
                            array(									
                                'post_type' => 'prices',								
                                
                            )
                        
                        ); ?>

                        <?php while ( $postloop->have_posts() ) : $postloop->the_post();
                            $img=get_field('simage',get_the_ID());
                        ?>
                            <div class="s-item">
                                <!-- <div class="s-item__img" style="background:url('<?php echo $img;?>') no-repeat center;">

                                </div> -->
                                <div class="s-item__header">
                                    <p class="s-item__name">
                                        <?php the_title();?>
                                        <!-- <a href="<?php the_permalink();?>"></a> -->
                                    </p>
                                </div>
                                <div class="s-item__body">
                                    <div class="s-item__content">
                                        <?php the_content(); ?>
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

<?php get_footer(); ?>


