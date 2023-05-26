
<?php 
    /*
		Template Name: Шаблон "Контакты"
		Template Post Type: page
	*/

    get_header(); ?>

<div class="box-slider">
    <div class="swiper-container main-slider">
        <div class="swiper-wrapper">
            <?php $slides=get_field('box1_r','5'); ?>
            <?php foreach($slides as $slide) { 
                    $img=$slide['img'];
                    $name=$slide['name'];
                    $desc=$slide['desc'];
                    $link=$slide['link'];
                ?>
                <div class="swiper-slide">
                    <div class="main-slide" style="background-image: url('<?php echo $img; ?>');">
                        <div class="container">
                            
                            <h1 class="slide-title"><?php echo $name; ?></h1>
                            <p class="slide-desc mt-5 mb-5"><?php echo $desc; ?></p>
                            <div class="slide-btm">
                                <a href="<?php echo $link; ?>" class="btn btn_yellow">Узнать подробнее</a>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } ?>

        </div>
    </div>
    <div class="swiper-pagination m-pagination"></div>
    <!-- <div class="swiper-button-prev m-prev"></div>
    <div class="swiper-button-next m-next"></div> -->
</div>

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

                            <div class="contact-item c-geo">
                                <span>Офис</span>
                                <p>г. Москва, ул. Косинская, 11А <br> 
                                    <span>Работаем по Москве, всей Московской области и ближайшим областям. Готовы выехать в регионы </span>
                                </p>                                
                            </div>

                            <div class="contact-item c-phone">
                                <span>Телефоны</span>
                                <div class="d-flex align-items-center">
                                    <div class="phone-groupe">
                                        <a href="tel:79167275500">+7 (916) 727-55-00</a>
                                        <a href="tel:79167275500">+7 (916) 727-55-00</a>
                                    </div>
                                    <ul class="social ml-4">
                                        <li class="wa"><a href="<?php if(get_field( "c_wa",'option' )) echo get_field( "c_wa",'option' ); ?>"></a></li>
                                        <li class="tg"><a href="<?php if(get_field( "c_tg",'option' )) echo get_field( "c_tg",'option' ); ?>"></a></li>
                                    </ul>
                                </div>
                            
                            </div>
                            
                            <div class="contact-item c-email">
                                <span>E-mail</span>
                                <a href="maito:<?php if(get_field( "c_email",'option' )) echo get_field( "c_email",'option' ); ?>" class="">
						        <?php echo get_field( "c_email",'option' ); ?></a>
                            </div>
                            <div class="contact-item c-wtime">
                                <span>Работаем без выходных</span>
                                <p>С 9:00 до 21:00 </p>
                            </div>    

                            <div class="map mt-5">
                            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A9d4bf5a271f4cc1682c1c1afb6db49fa620a8b0cc75d680014ca7d66c0fc7f17&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
                            </div>
                            
                            
                            <?php echo (do_shortcode('[contact-form-7 id="124" title="Форма Остались вопросы"]'));?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>


