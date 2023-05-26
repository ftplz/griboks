<?php 

// add_filter('show_admin_bar', '__return_false');

define('DIR_THEME', dirname(__FILE__));

define('DIR_URI', get_stylesheet_directory_uri());


require DIR_THEME . '/inc/scripts.php';
require DIR_THEME . '/inc/post_types.php';
require DIR_THEME . '/inc/shortcodes.php';
require DIR_THEME . '/inc/widgets.php';

// require DIR_THEME . '/inc/ajax_functions.php';


// function disable_wpautop_all( $content ) {
// 	remove_filter( 'the_content', 'wpautop' );
// 	remove_filter( 'the_excerpt', 'wpautop' );
// 	return $content;
// }

// add_filter( 'the_content', 'disable_wpautop_all', 0 );




define( 'WPCF7_AUTOP', false );

if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails'); 
}
  
add_action('after_setup_theme', function(){
	register_nav_menus( array(
		'main_menu_location' => 'Меню в шапке',
		'footer_menu_location' => 'Меню в подвале',
		'footer_menu_location2' => 'Меню в подвале 2',
		'sidebar_menu_location' => 'Меню в сайдбаре'
	) );
});
 


if (function_exists('register_sidebar')){
	register_sidebar( array(
	'name'          => 'Сайбар', //название виджета в админ-панели
	'id'            => 'sidebar-box', //идентификатор виджета
	'description'   => 'виден во всех разделах сайта', //описание виджета в админ-панели
	'before_widget' => '<div id="%1$s" class="sidebar-section %2$s">', //открывающий тег виджета с динамичным идентификатором
	'after_widget'  => '<div class="clear"></div></div>', //закрывающий тег виджета с очищающим блоком
	'before_title'  => '<p class="sidebar-section__title">', //открывающий тег заголовка виджета
	'after_title'   => '</p>',//закрывающий тег заголовка виджета
	));
}


// remove_filter( 'the_content', 'wpautop' );
add_filter('wpcf7_autop_or_not', '__return_false');

// add_filter( 'upload_mimes', 'svg_upload_allow' );

// # Добавляет SVG в список разрешенных для загрузки файлов.
// function svg_upload_allow( $mimes ) {
// 	$mimes['svg']  = 'image/svg+xml';
// 	return $mimes;
// }

add_filter( 'wp_check_filetype_and_ext', 'fix_svg_mime_type', 10, 5 );

# Исправление MIME типа для SVG файлов.
function fix_svg_mime_type( $data, $file, $filename, $mimes, $real_mime = '' ){

	// WP 5.1 +
	if( version_compare( $GLOBALS['wp_version'], '5.1.0', '>=' ) )
		$dosvg = in_array( $real_mime, [ 'image/svg', 'image/svg+xml' ] );
	else
		$dosvg = ( '.svg' === strtolower( substr($filename, -4) ) );

	// mime тип был обнулен, поправим его
	// а также проверим право пользователя 
	if( $dosvg ){

		// разрешим
		if( current_user_can('manage_options') ){

			$data['ext']  = 'svg';
			$data['type'] = 'image/svg+xml';
		}
		// запретим
		else {
			$data['ext'] = $type_and_ext['type'] = false;
		}

	}

	return $data;
}


if(function_exists('acf_add_options_page')){
	acf_add_options_page('Общие настройки');	
}

//add class to CF7
define( 'WPCF7_AUTOP', false );

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
	return $excerpt;
}
function excerpt_by_id($id,$limit) {
	$excerpt = explode(' ', get_the_excerpt($id), $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
	return $excerpt;
}
function remove_image_size_attributes( $html ) {
	return preg_replace( '/(width|height)="\d*"/', '', $html );
	}


function yourthemename_admin_style() {
    wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/css/admin-custom.css');
  }
 
add_action('admin_enqueue_scripts', 'yourthemename_admin_style'); 


add_filter('post_gallery','customFormatGallery',10,2);

function customFormatGallery($string,$attr){

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'full',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

	$columns = intval($columns);
	$bcol=3;
	if($columns==2) $bcol=6;
	if($columns==3) $bcol=4;
	if($columns==4) $bcol=3;
	if($columns==6) $bcol=2;
	if($columns==12) $bcol=1;

    $output = "<div id=\"container\"> <div class=\"row gallery-items\"> ";
    $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));

    foreach($posts as $imagePost){
        $output .= "<div class='col-6 col-lg-".$bcol."'>
			<div class='gallery-item-wrap'>
				<a href='".wp_get_attachment_image_src($imagePost->ID, 'large')[0]."' data-fancybox='gallery' class='doc-item' no-repeat center top;'>
					<img src='".wp_get_attachment_image_src($imagePost->ID, 'small')[0]."' alt=''>
				</a>
			</div>
		</div>";

    }

    $output .= "</div></div>";

    return $output;
}


class Main_Menu extends Walker_Nav_Menu {
	/*
	 * Позволяет перезаписать <ul class="sub-menu">
	 */
	function start_lvl(&$output, $depth=1,$args = NULL) {
		$output .= '<ul class="main-menu__sub js-main-menu-sub">';
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output
	 * @param object $item Объект элемента меню, подробнее ниже.
	 * @param int $depth Уровень вложенности элемента меню.
	 * @param object $args Параметры функции wp_nav_menu
	 */
	function start_el( &$output, $item, $depth=0, $args= NULL, $id = 0 ) {
	// для WordPress 5.3+
	// function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0 ) {
		global $wp_query;           
		/*
		 * Некоторые из параметров объекта $item
		 * ID - ID самого элемента меню, а не объекта на который он ссылается
		 * menu_item_parent - ID родительского элемента меню
		 * classes - массив классов элемента меню
		 * post_date - дата добавления
		 * post_modified - дата последнего изменения
		 * post_author - ID пользователя, добавившего этот элемент меню
		 * title - заголовок элемента меню
		 * url - ссылка
		 * attr_title - HTML-атрибут title ссылки
		 * xfn - атрибут rel
		 * target - атрибут target
		 * current - равен 1, если является текущим элементом
		 * current_item_ancestor - равен 1, если текущим (открытым на сайте) является вложенный элемент данного
		 * current_item_parent - равен 1, если текущим (открытым на сайте) является родительский элемент данного
		 * menu_order - порядок в меню
		 * object_id - ID объекта меню
		 * type - тип объекта меню (таксономия, пост, произвольно)
		 * object - какая это таксономия / какой тип поста (page /category / post_tag и т д)
		 * type_label - название данного типа с локализацией (Рубрика, Страница)
		 * post_parent - ID родительского поста / категории
		 * post_title - заголовок, который был у поста, когда он был добавлен в меню
		 * post_name - ярлык, который был у поста при его добавлении в меню
		 */
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		/*
		 * Генерируем строку с CSS-классами элемента меню
		 */
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = ' menu-item-' . $item->ID;

		$li_class='main-menu__item';

	
		// функция join превращает массив в строку
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class=" '.$li_class.' ' . esc_attr( $class_names ) . '"';
 
		/*
		 * Генерируем ID элемента
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 
		/*
		 * Генерируем элемент меню
		 */
		$output .= $indent . '<li' . $id . $value . $class_names .'>';
 
		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


		/*if the current menu item has children and it's the parent, set the dropdown attributes*/
		if ( $args->has_children && $depth === 0 ) {
			$atts['href']   		= '#';
			$atts['data-toggle']	= 'dropdown';
			$atts['class']			= 'dropdown-toggle';
		} else {
			$atts['href'] = ! empty( $item->url ) ? $item->url : '';
		}

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
 
		// ссылка и околоссылочный текст
		$item_output = $args->before;
		$item_output .= '<a class="menu__link" '. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;


		/*	if the current menu item has children and it's the parent item, append the fa-angle-down icon*/
		$item_output .= ( $args->has_children && $depth === 0 ) ? '</a>' : '</a>';
		$item_output .= $args->after;
 
 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element )
			return;

		$id_field = $this->db_fields['id'];

		if ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}

class Sidebar_Menu extends Walker_Nav_Menu {
	/*
	 * Позволяет перезаписать <ul class="sub-menu">
	 */
	function start_lvl(&$output, $depth=1,$args = NULL) {
		$output .= '<ul class="sub-menu">';
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output
	 * @param object $item Объект элемента меню, подробнее ниже.
	 * @param int $depth Уровень вложенности элемента меню.
	 * @param object $args Параметры функции wp_nav_menu
	 */
	function start_el( &$output, $item, $depth=0, $args= NULL, $id = 0 ) {
	// для WordPress 5.3+
	// function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0 ) {
		global $wp_query;           

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		/*
		 * Генерируем строку с CSS-классами элемента меню
		 */
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = ' menu-item-' . $item->ID;

		// $li_class='footer-menu__item';

		if ($args->has_children && $depth === 0  ) {			
			$li_class = 'footer-menu__item';
		} else {
			$li_class = "footer-menu__sub-item";
		}

	
		// функция join превращает массив в строку
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class=" '.$li_class.' ' . esc_attr( $class_names ) . '"';
 
		/*
		 * Генерируем ID элемента
		 */
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
 
		/*
		 * Генерируем элемент меню
		 */
		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		if ( $args->has_children  ) {
			$output .= '<span class="open-sub"></span>';
		}
 
		// атрибуты элемента, title="", rel="", target="" и href=""
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


		/*if the current menu item has children and it's the parent, set the dropdown attributes*/
		if ( $args->has_children && $depth === 0 ) {
			$atts['href']   		= ! empty( $item->url ) ? $item->url : '';
			$atts['data-toggle']	= 'dropdown';
			$atts['class']			= 'dropdown-toggle';
		} else {
			$atts['href'] = ! empty( $item->url ) ? $item->url : '';
		}

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
 
		// ссылка и околоссылочный текст
		$item_output = $args->before;
		if ($args->has_children && $depth === 0  ) { 
			
			$item_output .= '<a class="footer-menu__link" '. $attributes .'>';

		} else {
			$item_output .= '<a class="footer-menu__sub-link" '. $attributes .'> ';
		}

		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';

	



		$item_output .= $args->after;


		/*	if the current menu item has children and it's the parent item, append the fa-angle-down icon*/
		$item_output .= ( $args->has_children && $depth === 0 ) ? '</a>' : '</a>';
		$item_output .= $args->after;
 
 		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element )
			return;

		$id_field = $this->db_fields['id'];

		if ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
}


function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->parent > 0){
        return true;
    }
    return false;
}
function getCategoryLvlById($category, $level = 0) {
    if ($category->parent == 0) {
        return $level;
    } else {
        $level++;
        $category = get_term_by( 'id', $category->parent, 'services_tax');      
        return getCategoryLvlById($category, $level);
    }

}


function opg_html($output){
	return $output .' prefix="og: http://ogp.me/ns#"';
	}
	add_filter('language_attributes', 'opg_html');


function facebook_open_graph(){
	global $post;
	global $wp;
	//ДЛЯ ССЫЛОК
	$current_url = home_url($wp->request);
	 
	//ДЛЯ DESCRIPTION
	if($excerpt = $post->post_excerpt){
	$trim_words  = strip_tags($post->post_excerpt);
	} elseif($wptw = wp_trim_words(get_the_content(), 25)){
	$trim_words = preg_replace('/[""]/', '', $wptw);
	}else{ 
	$trim_words = get_bloginfo('description');
	}
	//ДЛЯ ИЗОБРАЖЕНИЙ
	$first_img = '';
	$otimg = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	$first_img = $matches [1][0];
	if(empty($first_img)){
	$first_img = get_bloginfo('template_directory'). '/img/logo.png';
	}
	//ОБЩИЕ META-ТЕГИ
	echo '<meta property="og:type" content="article"/>';
	echo '<meta property="og:site_name" content="';
	echo bloginfo('name');
	echo '"/>';
	if(has_post_thumbnail( $post->ID )){
	$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
	echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}else{
	echo '<meta property="og:image" content="' . $first_img . '"/>';
	}
	echo '<meta property="og:description" content="' . $trim_words. '"/>';
	//META-ТЕГИ ДЛЯ СТАТЕЙ, СТРАНИЦ
	if ( is_singular()){
	echo '<meta property="og:title" content="' . get_the_title() . '"/>';
	echo '<meta property="og:url" content="' . get_permalink() . '"/>';
	}
	else{ 
	//META-ТЕГИ ДЛЯ ГЛАВНОЙ, РУБРИКИ И ОСТАЛЬНЫХ
	echo '<meta property="og:title" content="';
	echo bloginfo('name');
	echo '"/>';
	echo '<meta property="og:url" content="'.$current_url.'"/>';
	}
	}
	add_action( 'wp_head', 'facebook_open_graph' );

