<?php $uri=get_template_directory_uri(); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >


<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=450, initial-scale=1.0,maximum-scale=1.0">
	<title><?php wp_title(); ?></title>    
	<link rel="icon" href="<?php echo $uri; ?>/img/favicon.ico" type="image/x-icon">
	<meta name="yandex-verification" content="a3ce9745d55e861e" />
	<meta name="yandex-verification" content="a3ce9745d55e861e" />

	<?php wp_head(); ?>
</head>

<body id="home">
	<div class="modal" id="modal-order">
		<span class="modal__close"></span>
		<?php echo do_shortcode('[contact-form-7 id="125" title="Форма Модальное окно"]'); ?>
	</div>
	<div class="modal" id="modal-success">
		<span class="modal__close"></span>
		<div class="modal__body">
			<div class="succes-text">
			Спасибо! <br>
			Ваше сообщение отправлено
			</div>	
		</div>		
	</div>

	<header>
		<div class="top-wrap">
			<div class="container">
				<div class="header__top">
				<div class="hcol hcol_logo">
						<div class="logo">
							<a href="/" class="logo__img">
								<img class="light" src="<?php echo $uri;?>/img/logo.png" alt="">
							</a>
							<p class="logo__desc">Грибковые заболевания </p>
						</div>
					</div>
					<p class="adres d-none d-md-block"> <a href="<?php echo home_url(); ?>/kontakty/"><?php if(get_field( "c_adres",'option' )) echo get_field( "c_adres",'option' ); ?></a> </p>

					<p class="w-time d-none d-md-block"> <?php if(get_field( "c_time",'option' )) echo get_field( "c_time",'option' ); ?> </p>

					<a href="maito:<?php if(get_field( "c_email",'option' )) echo get_field( "c_email",'option' ); ?>" class="email"><?php echo get_field( "c_email",'option' ); ?></a>	

					<a href="tel:<?php echo preg_replace('![^0-9]+!', '', get_field( "c_phone",'option' )) ?>" class="phone">
						<?php echo get_field( "c_phone",'option' ); ?></a>

					<a data-fancybox data-src="#modal-order" href="javascript:;" class="yellow-link d-none"><span>Обратный звонок</span></a>
					<nav class="menu-wrap">
						
						<?php
							wp_nav_menu( [
								'theme_location'  => 'main_menu_location',
								'menu'            => '', 
								'container'       => 'ul', 
								'container_class' => 'main-menu', 
								'container_id'    => '',
								'menu_class'      => 'main-menu', 
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'depth'           => 0,
								'walker'          => '',
							] );
						?>
						
					</nav>
					<div class="m-menu-wrap d-block d-md-none d-flex justify-content-end">
						<button class="cmn-toggle-switch cmn-toggle-switch__htx">
							<span>toggle menu</span>
						</button>
					</div> 
				</div>
			</div>
		</div>
	</header>