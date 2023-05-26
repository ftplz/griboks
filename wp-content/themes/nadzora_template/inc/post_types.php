<?php

    function post_types() {

// 		$labels = array(
// 			'name'                  => _x( 'Услуги', 'Post Type General Name', 'fixlab' ),
// 			'singular_name'         => _x( 'Услуга', 'Post Type Singular Name', 'fixlab' ),
// 			'menu_name'             => __( 'Услуги', 'fixlab' ),
// 			'name_admin_bar'        => __( 'Услуга', 'fixlab' ),
// 			'archives'              => __( 'Услуга', 'fixlab' ),
// 			'all_items'             => __( 'Услуги', 'fixlab' ),
// 			'add_new_item'          => __( 'Добавить услугу', 'fixlab' ),
// 			'add_new'               => __( 'Добавить услугу', 'fixlab' ),
// 			'new_item'              => __( 'Добавить услугу', 'fixlab' ),
// 			'edit_item'             => __( 'Редактировать услугу', 'fixlab' ),
// 			'update_item'           => __( 'Обновить услугу', 'fixlab' ),
// 			'view_item'             => __( 'Просмотреть', 'fixlab' ),
// 			'view_items'            => __( 'Просмотреть Проект', 'fixlab' ),
// 			'search_items'          => __( 'Найти услугу', 'fixlab' ),
// 			'not_found'             => __( 'Не найдено', 'fixlab' ),
// 			'not_found_in_trash'    => __( 'Не найдено в корзине', 'fixlab' ),
// 			'featured_image'        => __( 'Изображение', 'fixlab' ),
// 			'set_featured_image'    => __( 'Установить изображение', 'fixlab' ),
// 			'remove_featured_image' => __( 'Удалить изображение', 'fixlab' ),
// 			'use_featured_image'    => __( 'Использовать изображение', 'fixlab' ),
// 			'insert_into_item'      => __( 'Вставить в услугу', 'fixlab' ),
// 			'uploaded_to_this_item' => __( 'Загрузить в услугу', 'fixlab' ),
// 			'items_list'            => __( 'Список услуг', 'fixlab' ),
// 			'items_list_navigation' => __( 'Услуги', 'fixlab' ),
// 			'filter_items_list'     => __( 'Фильтровать', 'fixlab' ),
// 		);
		
// 		$args = array(
// 			'label'                 => __( 'c', 'fixlab' ),
// 			'labels'                => $labels,
// 			'supports' => array('title','editor','author','excerpt','comments','revisions','thumbnail'),
// 			'hierarchical'          => false,
// 			'public'                => true,
// 			'show_ui'               => true,
// 			'show_in_menu'          => true,
// 			'menu_position'         => 0,
// 			'show_in_admin_bar'     => true,
// 			'show_in_nav_menus'     => true,
// 			'can_export'            => true,
// 			'has_archive'           => true,
// 			'exclude_from_search'   => false,
// 			'publicly_queryable'    => true,
// 		  'menu_icon'             => 'dashicons-format-video',
// 		);

// 	  register_post_type( 'services', $args );

// 	  $labels = array(
// 		  'name'              => _x('Категория услуги', 'taxonomy general name', 'textdomain' ),
// 		  'singular_name'     => _x('Категория услуги', 'taxonomy singular name', 'textdomain' ),
// 		  'search_items'      => __('Найти категории', 'textdomain' ),
// 		  'all_items'         => __('Все категории', 'textdomain' ),
// 		  'edit_item'         => __('Редактировать', 'textdomain' ),
// 		  'update_item'       => __('Обновить', 'textdomain' ),
// 		  'add_new_item'      => __('Добавить', 'textdomain' ),
// 		  'new_item_name'     => __('Новая категория', 'textdomain' ),
// 		  'menu_name'         => __('Категории', 'textdomain' ),
// 	  );

// 	  $args = array(
// 		  'hierarchical'      => true,
// 		  'labels'            => $labels,
// 		  'show_ui'           => true,
// 		  'show_admin_column' => true,
// 		  'query_var'         => true,
// 		  'publicly_queryable'    => true,
// 		  'rewrite'           => array('slug' => ''),
// 	   );
	   
// 	  register_taxonomy('services_tax', array('services'), $args );


	  

// 	  $labels = array(
// 		'name'                  => _x( 'Проекты', 'Post Type General Name', 'fixlab' ),
// 		'singular_name'         => _x( 'Проект', 'Post Type Singular Name', 'fixlab' ),
// 		'menu_name'             => __( 'Проекты', 'fixlab' ),
// 		'name_admin_bar'        => __( 'Проект', 'fixlab' ),
// 		'archives'              => __( 'Проект', 'fixlab' ),
// 		'all_items'             => __( 'Проекты', 'fixlab' ),
// 		'add_new_item'          => __( 'Добавить проект', 'fixlab' ),
// 		'add_new'               => __( 'Добавить проект', 'fixlab' ),
// 		'new_item'              => __( 'Добавить проект', 'fixlab' ),
// 		'edit_item'             => __( 'Редактировать проект', 'fixlab' ),
// 		'update_item'           => __( 'Обновить проект', 'fixlab' ),
// 		'view_item'             => __( 'Просмотреть', 'fixlab' ),
// 		'view_items'            => __( 'Просмотреть Проект', 'fixlab' ),
// 		'search_items'          => __( 'Найти проект', 'fixlab' ),
// 		'not_found'             => __( 'Не найдено', 'fixlab' ),
// 		'not_found_in_trash'    => __( 'Не найдено в корзине', 'fixlab' ),
// 		'featured_image'        => __( 'Изображение', 'fixlab' ),
// 		'set_featured_image'    => __( 'Установить изображение', 'fixlab' ),
// 		'remove_featured_image' => __( 'Удалить изображение', 'fixlab' ),
// 		'use_featured_image'    => __( 'Использовать изображение', 'fixlab' ),
// 		'insert_into_item'      => __( 'Вставить в проект', 'fixlab' ),
// 		'uploaded_to_this_item' => __( 'Загрузить в проект', 'fixlab' ),
// 		'items_list'            => __( 'Список услуг', 'fixlab' ),
// 		'items_list_navigation' => __( 'Проекты', 'fixlab' ),
// 		'filter_items_list'     => __( 'Фильтровать', 'fixlab' ),
// 	);
	
// 	$args = array(
// 		'label'                 => __( 'c', 'fixlab' ),
// 		'labels'                => $labels,
// 		'supports' => array('title','editor','author','excerpt','comments','revisions','thumbnail'),
// 		'hierarchical'          => false,
// 		'public'                => true,
// 		'show_ui'               => true,
// 		'show_in_menu'          => true,
// 		'menu_position'         => 0,
// 		'show_in_admin_bar'     => true,
// 		'show_in_nav_menus'     => true,
// 		'can_export'            => true,
// 		'has_archive'           => true,
// 		'exclude_from_search'   => false,
// 		'publicly_queryable'    => true,
// 	  'menu_icon'             => 'dashicons-format-video',
// 	);

//   register_post_type( 'projects', $args );

//   $labels = array(
// 	'name'              => _x('Категория проектов', 'taxonomy general name', 'textdomain' ),
// 	'singular_name'     => _x('Категория проектов', 'taxonomy singular name', 'textdomain' ),
// 	'search_items'      => __('Найти категории', 'textdomain' ),
// 	'all_items'         => __('Все категории', 'textdomain' ),
// 	'edit_item'         => __('Редактировать', 'textdomain' ),
// 	'update_item'       => __('Обновить', 'textdomain' ),
// 	'add_new_item'      => __('Добавить', 'textdomain' ),
// 	'new_item_name'     => __('Новая категория проектов', 'textdomain' ),
// 	'menu_name'         => __('Категория проектов', 'textdomain' ),
// );

// $args = array(
// 	'hierarchical'      => true,
// 	'labels'            => $labels,
// 	'show_ui'           => true,
// 	'show_admin_column' => true,
// 	'query_var'         => true,
// 	'publicly_queryable'    => true,
// 	'rewrite'           => array('slug' => ''),
//  );
 
// register_taxonomy('projects_tax', array('projects'), $args );	


// reviews

// $labels = array(
// 	'name'                  => _x( 'Отзывы', 'Post Type General Name', 'fixlab' ),
// 	'singular_name'         => _x( 'Отзыв', 'Post Type Singular Name', 'fixlab' ),
// 	'menu_name'             => __( 'Отзывы', 'fixlab' ),
// 	'name_admin_bar'        => __( 'Отзыв', 'fixlab' ),
// 	'archives'              => __( 'Отзыв', 'fixlab' ),
// 	'all_items'             => __( 'Отзывы', 'fixlab' ),
// 	'add_new_item'          => __( 'Добавить отзыв', 'fixlab' ),
// 	'add_new'               => __( 'Добавить отзыв', 'fixlab' ),
// 	'new_item'              => __( 'Добавить отзыв', 'fixlab' ),
// 	'edit_item'             => __( 'Редактировать отзыв', 'fixlab' ),
// 	'update_item'           => __( 'Обновить отзыв', 'fixlab' ),
// 	'view_item'             => __( 'Просмотреть', 'fixlab' ),
// 	'view_items'            => __( 'Просмотреть Проект', 'fixlab' ),
// 	'search_items'          => __( 'Найти отзыв', 'fixlab' ),
// 	'not_found'             => __( 'Не найдено', 'fixlab' ),
// 	'not_found_in_trash'    => __( 'Не найдено в корзине', 'fixlab' ),
// 	'featured_image'        => __( 'Изображение', 'fixlab' ),
// 	'set_featured_image'    => __( 'Установить изображение', 'fixlab' ),
// 	'remove_featured_image' => __( 'Удалить изображение', 'fixlab' ),
// 	'use_featured_image'    => __( 'Использовать изображение', 'fixlab' ),
// 	'insert_into_item'      => __( 'Вставить в отзыв', 'fixlab' ),
// 	'uploaded_to_this_item' => __( 'Загрузить в отзыв', 'fixlab' ),
// 	'items_list'            => __( 'Список услуг', 'fixlab' ),
// 	'items_list_navigation' => __( 'Проекты', 'fixlab' ),
// 	'filter_items_list'     => __( 'Фильтровать', 'fixlab' ),
// );

// $args = array(
// 	'label'                 => __( 'c', 'fixlab' ),
// 	'labels'                => $labels,
// 	'supports' => array('title','editor','author','excerpt','comments','revisions','thumbnail'),
// 	'hierarchical'          => false,
// 	'public'                => true,
// 	'show_ui'               => true,
// 	'show_in_menu'          => true,
// 	'menu_position'         => 0,
// 	'show_in_admin_bar'     => true,
// 	'show_in_nav_menus'     => true,
// 	'can_export'            => true,
// 	'has_archive'           => true,
// 	'exclude_from_search'   => false,
// 	'publicly_queryable'    => true,
//   'menu_icon'             => 'dashicons-format-video',
// );

// register_post_type( 'reviews', $args );




// // shares

// $labels = array(
// 	'name'                  => _x( 'Акции', 'Post Type General Name', 'fixlab' ),
// 	'singular_name'         => _x( 'Акция', 'Post Type Singular Name', 'fixlab' ),
// 	'menu_name'             => __( 'Акции', 'fixlab' ),
// 	'name_admin_bar'        => __( 'Акция', 'fixlab' ),
// 	'archives'              => __( 'Акция', 'fixlab' ),
// 	'all_items'             => __( 'Акции', 'fixlab' ),
// 	'add_new_item'          => __( 'Добавить акция', 'fixlab' ),
// 	'add_new'               => __( 'Добавить акция', 'fixlab' ),
// 	'new_item'              => __( 'Добавить акция', 'fixlab' ),
// 	'edit_item'             => __( 'Редактировать акция', 'fixlab' ),
// 	'update_item'           => __( 'Обновить акция', 'fixlab' ),
// 	'view_item'             => __( 'Просмотреть', 'fixlab' ),
// 	'view_items'            => __( 'Просмотреть Проект', 'fixlab' ),
// 	'search_items'          => __( 'Найти акция', 'fixlab' ),
// 	'not_found'             => __( 'Не найдено', 'fixlab' ),
// 	'not_found_in_trash'    => __( 'Не найдено в корзине', 'fixlab' ),
// 	'featured_image'        => __( 'Изображение', 'fixlab' ),
// 	'set_featured_image'    => __( 'Установить изображение', 'fixlab' ),
// 	'remove_featured_image' => __( 'Удалить изображение', 'fixlab' ),
// 	'use_featured_image'    => __( 'Использовать изображение', 'fixlab' ),
// 	'insert_into_item'      => __( 'Вставить в акция', 'fixlab' ),
// 	'uploaded_to_this_item' => __( 'Загрузить в акция', 'fixlab' ),
// 	'items_list'            => __( 'Список услуг', 'fixlab' ),
// 	'items_list_navigation' => __( 'Проекты', 'fixlab' ),
// 	'filter_items_list'     => __( 'Фильтровать', 'fixlab' ),
// );

// $args = array(
// 	'label'                 => __( 'c', 'fixlab' ),
// 	'labels'                => $labels,
// 	'supports' => array('title','editor','author','excerpt','comments','revisions','thumbnail'),
// 	'hierarchical'          => false,
// 	'public'                => true,
// 	'show_ui'               => true,
// 	'show_in_menu'          => true,
// 	'menu_position'         => 0,
// 	'show_in_admin_bar'     => true,
// 	'show_in_nav_menus'     => true,
// 	'can_export'            => true,
// 	'has_archive'           => true,
// 	'exclude_from_search'   => false,
// 	'publicly_queryable'    => true,
//   	'menu_icon'             => 'dashicons-format-video',
// );

// register_post_type( 'shares', $args );


// // prices


// $labels = array(
// 	'name'                  => _x( 'Цены', 'Post Type General Name', 'fixlab' ),
// 	'singular_name'         => _x( 'Цены', 'Post Type Singular Name', 'fixlab' ),
// 	'menu_name'             => __( 'Цены', 'fixlab' ),
// 	'name_admin_bar'        => __( 'Цены', 'fixlab' ),
// 	'archives'              => __( 'Цены', 'fixlab' ),
// 	'all_items'             => __( 'Цены', 'fixlab' ),
// 	'add_new_item'          => __( 'Добавить Цены', 'fixlab' ),
// 	'add_new'               => __( 'Добавить Цены', 'fixlab' ),
// 	'new_item'              => __( 'Добавить Цены', 'fixlab' ),
// 	'edit_item'             => __( 'Редактировать Цены', 'fixlab' ),
// 	'update_item'           => __( 'Обновить Цены', 'fixlab' ),
// 	'view_item'             => __( 'Просмотреть', 'fixlab' ),
// 	'view_items'            => __( 'Просмотреть Проект', 'fixlab' ),
// 	'search_items'          => __( 'Найти Цены', 'fixlab' ),
// 	'not_found'             => __( 'Не найдено', 'fixlab' ),
// 	'not_found_in_trash'    => __( 'Не найдено в корзине', 'fixlab' ),
// 	'featured_image'        => __( 'Изображение', 'fixlab' ),
// 	'set_featured_image'    => __( 'Установить изображение', 'fixlab' ),
// 	'remove_featured_image' => __( 'Удалить изображение', 'fixlab' ),
// 	'use_featured_image'    => __( 'Использовать изображение', 'fixlab' ),
// 	'insert_into_item'      => __( 'Вставить в Цены', 'fixlab' ),
// 	'uploaded_to_this_item' => __( 'Загрузить в Цены', 'fixlab' ),
// 	'items_list'            => __( 'Список услуг', 'fixlab' ),
// 	'items_list_navigation' => __( 'Цены', 'fixlab' ),
// 	'filter_items_list'     => __( 'Фильтровать', 'fixlab' ),
// );

// $args = array(
// 	'label'                 => __( 'c', 'fixlab' ),
// 	'labels'                => $labels,
// 	'supports' => array('title','editor','author','excerpt','comments','revisions','thumbnail'),
// 	'hierarchical'          => false,
// 	'public'                => true,
// 	'show_ui'               => true,
// 	'show_in_menu'          => true,
// 	'menu_position'         => 0,
// 	'show_in_admin_bar'     => true,
// 	'show_in_nav_menus'     => true,
// 	'can_export'            => true,
// 	'has_archive'           => true,
// 	'exclude_from_search'   => false,
// 	'publicly_queryable'    => true,
//   'menu_icon'             => 'dashicons-format-video',
// );

// register_post_type( 'prices', $args );






}
    add_action( 'init', 'post_types', 0 );
?>