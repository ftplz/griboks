<?php 
 
// add_filter('xmlrpc_enabled', '__return_false'); 
// remove_action ( 'wp_head' , 'wp_shortlink_wp_head' );
// remove_action ( 'wp_head' , 'rsd_link' );
// remove_action ( 'wp_head' , 'wlwmanifest_link' );
// remove_action ( 'wp_head' , 'wp_generator' );
// remove_action ( 'wp_head' , 'feed_links_extra' , 3 );
// remove_action ( 'wp_head' , 'feed_links' , 2 ) ;
// remove_action ( 'wp_head' , 'index_rel_link' ) ;
// remove_action ( 'wp_head' , 'adjacent_posts_rel_link_wp_head' ) ;

 
// // Отключаем сам REST API
// add_filter('rest_enabled', '__return_false'); 
// // Отключаем фильтры REST API
// remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
// remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0 );
// remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
// remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
// remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
// remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 ); 
// // Отключаем события REST API
// remove_action( 'init', 'rest_api_init' );
// remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
// remove_action( 'parse_request', 'rest_api_loaded' );



function load_styles()
{
  wp_register_style('css1', DIR_URI  . '/libs/fancybox/jquery.fancybox.min.css'); 
  wp_enqueue_style('css1');

  wp_register_style('css2', DIR_URI  . '/libs/swiper/css/swiper.css'); 
  wp_enqueue_style('css2');

  wp_register_style('css3', DIR_URI  . '/css/main.css'); 
  wp_enqueue_style('css3');

  wp_register_style('css4', DIR_URI  . '/style.css');  
  wp_enqueue_style('css4');
}



function load_sripts()
{ 
  // wp_deregister_script( 'jquery' );
  // wp_deregister_script( 'jquery-core' ); 
  // wp_deregister_script( 'jquery-migrate' );

  wp_enqueue_script('js1', DIR_URI  . '/libs/jquery/jquery-3.4.1.min.js', array(), null, true);  
  wp_enqueue_script('js2', DIR_URI  . '/libs/fancybox/jquery.fancybox.min.js', array(), null, true);  
  wp_enqueue_script('js3', DIR_URI  . '/libs/swiper/js/swiper.min.js', array(), null, true); 
  wp_enqueue_script('js5', DIR_URI  . '/libs/inputmask/jquery.inputmask.js', array(), null, true);  
 
  wp_enqueue_script('js4', DIR_URI  . '/js/bundle.js', array(), null, true);  

  wp_localize_script('js4', 'filtervar', array( 'ajaxurl' => admin_url('admin-ajax.php')));  

}

add_action('wp_enqueue_scripts', 'load_styles');
add_action('wp_enqueue_scripts', 'load_sripts');