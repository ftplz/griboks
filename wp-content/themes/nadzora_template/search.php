
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
                            
                            <div class="search-result">



<?php
    global $query_string;
    $query_args = explode("&", $query_string);
    $search_query = array();

    foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
    } 

    $the_query = new WP_Query($search_query);
    if ( $the_query->have_posts() ) : 
?>


<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 


<div class="search-item">
    <div class="search-item__text">
        <a href="<?php the_permalink(); ?>" class="d-block"><?php the_title(); ?></a> 
        <?php the_excerpt(); ?>
    </div>
    <div class="search-item__btm">
        <a href="<?php the_permalink(); ?>" class="arrow-link">Перейти на страницу
            <span class="icon">
                <svg width="61" height="20" viewBox="0 0 61 10" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M58.1651 4.22558L-2.31877e-07 4.22558L-1.6631e-07 5.72558L58.2135 5.72558L55.4696 8.46969L56.5304 9.5303L60.5304 5.52997C60.671 5.38931 60.75 5.19854 60.75 4.99963C60.75 4.80072 60.671 4.60996 60.5303 4.46931L56.5303 0.469642L55.4697 1.53035L58.1651 4.22558Z"
                        fill="#181818" />
                </svg>
            </span>
        </a>
    </div>
</div>

<?php endwhile; wp_reset_postdata();?>         

<?php else : ?>
<div class="not-found">По данному запросу ничего не найдено</div>
<?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php get_footer(); ?>


