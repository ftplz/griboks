
<?php 
    /*
		Template Name: Шаблон "Вопросы"
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


                            <article class="post single">
                                <h1 class="single__title"><?php the_title(); ?></h1>
                                <div class="entry">
                            

                                    <?php $f_items=get_field('f_items'); ?>
                                    <?php foreach($f_items as $f_item) { ?>
                                        <div itemscope itemtype="https://schema.org/FAQPage">
                                            <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                                                <h3 itemprop="name"><?php echo $f_item['title'];?></h3>
                                                <div id="a1" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                                                    <div itemprop="text">
                                                        <?php echo $f_item['body'];?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php the_content(); edit_post_link('Редактировать', '<p>', '</p>'); ?>
                                </div>
                            </article>
                                                




                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>


