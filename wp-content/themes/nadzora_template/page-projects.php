
<?php 
    /*
		Template Name: Шаблон "Проекты"
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
                                        'post_type' => 'projects',                                    
                                    )                            
                                ); ?>
                                <?php $count; while ( $postloop->have_posts() ) : $postloop->the_post();
                                    $img=get_field('image',get_the_ID());
                                    $imgs=get_field('image_items',get_the_ID());
                                    $img=get_field('image',get_the_ID()); 
                                    $price1=get_field('price1',get_the_ID()); 
                                    $price2=get_field('price1',get_the_ID()); 
                                    $area=get_field('area',get_the_ID()); 
                                    $count++;
                                ?>
                                <div class="col-lg-6">
                                        <div class="p-item">                                           
                                            <a  class="p-item__img " href="<?php the_permalink(); ?>" style="background:url('<?php echo $img;?>') no-repeat center;">

                                            </a>
                                            <!-- <?php foreach( $imgs as  $img_item) { 
                                                $slide_img=$img_item['image'];
                                            ?>
                                                <a href="<?php echo $slide_img; ?>" data-fancybox="g-item_<?php echo $count;?>" class="d-none;">

                                                </a>
                                            <?php } ?> -->

                                            <p class="p-item__name">
                                                <a href="<?php the_permalink(); ?>"><?php the_title();?></a>                                                
                                            </p>
                                            <div class="p-item__content">
                                                <p> <?php echo excerpt(20);?></p>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <td>Затрачено</td>
                                                            <td>Сэкономлено</td>
                                                            <td>Площадь</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <td> <strong><?php echo $price1; ?></strong> </td>
                                                        <td> <strong><?php echo $price2; ?></strong> </td>
                                                        <td> <strong><?php echo $area; ?></strong> </td>
                                                    </tbody>
                                                </table>
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


