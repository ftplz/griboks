
	<?php get_header(); ?>

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
                            <?php 
                                  $imgs=get_field('image_items',get_the_ID());
                                  $img=get_field('image',get_the_ID()); 
                                  $price1=get_field('price1',get_the_ID()); 
                                  $price2=get_field('price1',get_the_ID()); 
                                  $area=get_field('area',get_the_ID()); 
                            ?>

                            <div class="project-slider">
                                   <div class="swiper-container project-slider">
                                   <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <a data-fancybox="g-item_<?php echo $count;?>" class="p-item__img " href="<?php echo $img;?>" 
                                            style="background:url('<?php echo $img;?>') no-repeat  center;">

                                            </a>
                                        </div>

                                        <?php foreach( $imgs as  $img_item) { 
                                            $slide_img=$img_item['image'];
                                        ?>
                                            <div class="swiper-slide">
                                                <a data-fancybox="g-item_<?php echo $count;?>" class="p-item__img " class="p-item__img" href="<?php echo $slide_img;?>" 
                                                style="background:url('<?php echo $slide_img;?>') no-repeat  center;">

                                                </a>
                                            </div>
                                        <?php } ?>

                                   </div>
                                   </div> 
                                   <!-- <div class="swiper-pagination p-pagination"></div> -->
                                   <div class="swiper-button-prev p-prev"></div>
                                   <div class="swiper-button-next p-next"></div>
                            
                            </div>
<!-- 
                                <a data-fancybox="g-item_<?php echo $count;?>" class="p-item__img p-item__img_icon" href="<?php echo $img;?>" style="background:url('<?php echo $img;?>') no-repeat  center;">

                                </a>
                                <?php foreach( $imgs as  $img_item) { 
                                    $slide_img=$img_item['image'];
                                ?>
                                    <a href="<?php echo $slide_img; ?>" data-fancybox="g-item_<?php echo $count;?>" class="d-none;">

                                    </a>
                                <?php } ?> -->




                                <div class="p-item__content">
                                                
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


                            <?php the_content(); ?>
                            
                        </div>

                        <?php echo (do_shortcode('[contact-form-7 id="124" title="Форма Остались вопросы"]'));?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>


