<?php $uri=get_template_directory_uri(); ?>

	<footer>
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-4">
					<div class="logo d-block">
						<a href="/nadzora/" class="logo__img">
							<img class="light" src="<?php echo $uri;?>/img/logo.png" alt="">
						</a>

					</div>
					<!-- <p class="copyright ">
						<?php if(get_field( "c_copyright",'option' )) echo get_field( "c_copyright",'option' ); ?>
					</p> -->
				</div>
				<div class="col-md-4">
					<nav class="footer-nav">
						<?php
							wp_nav_menu( [
								'theme_location'  => 'footer_menu_location',
								'menu'            => '', 
								'container'       => 'ul', 
								'container_class' => 'footer-menu', 
								'container_id'    => '',
								'menu_class'      => 'footer-menu', 
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
				</div>
				<div class="col-md-4">
					<nav class="footer-nav">
						<?php
							wp_nav_menu( [
								'theme_location'  => 'footer_menu_location2',
								'menu'            => '', 
								'container'       => 'ul', 
								'container_class' => 'footer-menu', 
								'container_id'    => '',
								'menu_class'      => 'footer-menu', 
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
				</div>
			</div>
		</div>
		<div class="copyright">
			© griboks.ru, <?php echo date('Y');?>
		</div>
	</footer>
	<?php wp_footer();?>

	<a href="#home" class="go-home"></a>


	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(91787538, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/91787538" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


	<!--LiveInternet counter--><a href="https://www.liveinternet.ru/click"
		target="_blank"><img id="licntA595" width="88" height="31" style="border:0" 
		title="LiveInternet: показано число просмотров и посетителей за 24 часа"
		src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAEALAAAAAABAAEAAAIBTAA7"
		alt=""/></a><script>(function(d,s){d.getElementById("licntA595").src=
		"https://counter.yadro.ru/hit?t52.6;r"+escape(d.referrer)+
		((typeof(s)=="undefined")?"":";s"+s.width+"*"+s.height+"a*"+
		(s.colorDepth?s.colorDepth:s.pixelDepth))+";u"+escape(d.URL)+
		";h"+escape(d.title.substring(0,150))+";"+Math.random()})
		(document,screen)</script><!--/LiveInternet-->
</body>

</html>