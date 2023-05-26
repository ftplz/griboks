
<?php get_header(); ?>

<?php  get_template_part('template_parts/block','slider');?>


<div class="box-content">
    <div class="box-content-wrap">
        <div class="container">
            <main class="box-content__inner">
                <div class="row">
                    <div class="col-md-12 order-1 order-md-2">
                        <div class="content">
                            <div class="breadcrumbs-box">                                                            
                                <?php
                                    if ( function_exists('yoast_breadcrumb')  ) {
                                   		yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                                    }
                                ?>
                            </div>
                            <div class="article-wrap" itemscope itemtype="http://schema.org/Article">
                                <article> 
                                    <time itemprop="datePublished" datetime="<?php the_date('Y-m-d'); ?>"></time>
                                    <?php if ($show_date) { ?>
                                        <time class="post-info__time post-info__time_single" datetime="<?php the_time('Y-m-d') ?>"><?php the_time('d.m.Y') ?></time>
                                    <?php } ?>

                                    <h1 class="page-title mt-0" itemprop="headline"><?php the_title(); ?></h1>
                                    <div itemprop="articleBody">
                                        <span class="date">
                                            <?php echo get_the_date(); ?>
                                        </span>
                                        <?php the_content(); ?>
                                        <div class="tags">
                                            <?php the_tags(); ?>
                                        </div>
                                        <div class="tags category mt-1">
                                            Категория: 
                                            <?php
                                            $post_cats = wp_get_post_categories( get_the_ID(), array('fields' => 'all') ); // предположим, что ID поста = 1
                                            $cats = '';
                                            foreach($post_cats as $post_cat){
                                                $cats .= '<a href="' . get_category_link( $post_cat ) . '">' . $post_cat->name . '</a>, ';
                                            }
                                            echo rtrim($cats, ', '); ?>
                                        </div>
                                    </div>
                                </article>
                                
                                <meta itemprop="author" content="<?php the_author(); ?>">
						        				<meta itemprop="datePublished" content="<?php the_date('Y-m-d'); ?>">
						        				<meta itemprop="dateModified" content="<?php the_modified_date('Y-m-d'); ?>">
                                <meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink() ?>" />
                                <meta itemprop="url" content="<?php the_permalink() ?>">
                                <?php $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
                                <div style="display: none;" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                                    <img itemprop="url" src="<?php echo $post_img_url; ?>" alt="<?php echo get_the_title() ?>">
                                    <meta itemprop="width" content="320">
                                    <meta itemprop="height" content="200">
                                </div>						
                                <div style="display: none;" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                                    <meta itemprop="name" content="<?php bloginfo('name'); ?>">
                                    <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                                        <img itemprop="url" src="<?php echo $uri;?>/img/logo.png" alt="<?php bloginfo('name'); ?>">
                                    </div>
                                </div>

                                <h3>Другие статьи</h3>
                                <div class="post-links">
                                   
                                    <!-- get_previous_post(true,'','products'); -->
                                    <?php $prev_post =get_previous_post(); if( ! empty($prev_post) ){ ?>
                                        <a href="<?php echo get_permalink( $prev_post ); ?>" class="news-open__switch post-link-right">
                                            <i class="icon-left"></i>
                                            <div class="news-open__switch-title">
                                            
                                                <?php echo esc_html($prev_post->post_title); ?>
                                            </div>
                                        </a>
                                    <?php } ?>

                                    <?php $next_post = get_next_post(); if( ! empty($next_post) ){ ?>
                                        <a href="<?php echo get_permalink( $next_post ); ?>" class="news-open__switch post-link-left">
                                            
                                            <div class="news-open__switch-title">
                                            
                                                <?php echo esc_html($next_post->post_title); ?>
                                            </div>
                                            <i class="icon-right"></i>
                                        </a>
                                    <?php } ?>
                                </div>

                                <?php 

                                    global $post;                        
                                    $related_tax = 'category';                        
                                    $cats_tags_or_taxes = wp_get_object_terms( $post->ID, $related_tax, array( 'fields' => 'ids' ) );                        
                                    $args = array(
                                        'posts_per_page' => 6, 
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => $related_tax,
                                                'field' => 'id',
                                                'include_children' => false, 
                                                'terms' => $cats_tags_or_taxes,
                                                'operator' => 'IN' 
                                            )
                                        )
                                    );
                                    $relatedposts = new WP_Query( $args );                   

                                    if( $relatedposts->have_posts() ) :  while( $relatedposts->have_posts() ) : 
                                    $relatedposts->the_post();  
                                    $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                                    if($cur_id==get_the_ID()) continue;
                                ?>  

                                    <div class="col-lg-12">
                                        <?php echo get_template_part('template_parts/post','item'); ?>                                               
                                    </div>
                                <?php endwhile; ?>
                                <?php endif; ?>

                                <div class="comments">
                                    <div class="box-header mt-3">
                                        <h2 class="box-title">Комментарии</h2>    
                                    </div>                                  
                                    <?php comments_template([]); ?>                               
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</div>

<?php get_footer(); ?>


