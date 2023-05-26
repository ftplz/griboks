
<?php 

    get_header(); 
    $curcat = get_queried_object(); 

    
    ?>

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

                            <h1 class="page-title mt-0"> <?php echo $curcat->name;?> </h1>

                            <div class="category-desc pb-4">
                                <?php echo $curcat->description;?>
                            </div>

                            <div class="row p-items ">
             
                                <?php while ( have_posts() ) :the_post();                                   
                                    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                ?>
                                <div class="col-lg-12">
                                    <?php echo get_template_part('template_parts/post','item'); ?>                                               
                                </div>
                                <?php  endwhile; wp_reset_postdata();?>
                            </div>   

                            <div class="pagination mt-4s">
								<?php if (function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
							</div>                       
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>


