<?php
/**
 * Template Name: Landing Gestion
 */

$custom_fields = get_post_custom();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php
		global $page, $paged;
		wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" ></link>
		<?php wp_head(); ?>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.1.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/global.js"></script>
	</head>
	<body <?php body_class(getBrowserClass()." landing landing-gestion"); ?>>
		<div id="main-wraper">
			<div id="header-top">
				<div class="left">
					<a href="<?php echo site_url(); ?>"><img id="img-logo" src="<?php bloginfo('template_directory'); ?>/images/logo_landings.png" alt="Ciudadanias Europeas" ></a>
				</div>
				<div class="right">
					<div class="small-box">
						<p id="telephone">
							<span class="first-t">Comunicate con nosotros</span>
							<span class="second-t" style="font-size:34px;">(011) <span class="l-blue ">4393-7070</span></span>
							<span class="third-t">Lun. a Vie. de 8 a 18hs - Líneas rotativas</span>
						</p>
						<p class="skype"><span>Skype:</span> <a href="#">ciudadaniaseuropeas.com</a></p>
						<p class="mail"><span>email:</span> <a href="mailto:info@ciudadaniaseuropeas.com" target="_blank">info@ciudadaniaseuropeas.com</a></p>
					</div>
				</div>
				<div class="clear-both"></div>
			</div>
		</div>
		<div id="home-header-bot" class="small-header">
			<h1><?php echo the_title('','',false) ?></h1>
		</div>
		<div id="content-wraper">
			<div id="content">
				<ul class="starts-list">
					<li>Traducciones legales y técnicas a todos<br/>los idiomas</li>
					<li>Tramitación de partidas argentinas y extranjeras</li>
					<li>Servicio de gestoría calificado (judicial o administrativa)</li>
				</ul>
				<p class="button">¡Envianos tu consulta!</p>
				<div class="rightCol">
					<?php echo do_shortcode( '[contact-form 3 "Formulario de contacto - Landings Gestion"]' ) ?>
				</div>
			</div>
		</div>
		<div id="footer">
			<div id="footerWrapper">
				<?php 
				$testimony = get_random_testimony();
				?>
				<div class="wide-box testimonio" >
					<div class="wide-box-img">
						<?php echo $testimony['thumbnail']?>
						<span><?php echo $testimony["post_title"] ?></span>
						<br/><span class="profesion"><?php echo $testimony["profesion"] ?></span>
					</div>
					<div class="wide-box-content">
						<p><?php echo trim($testimony["post_excerpt"])!=''?$testimony["post_excerpt"]:generar_excerpt($testimony["post_content"], 450) ?></p>
						<a class="more read-more" href="<?php echo get_permalink($testimony["ID"])?>"><span class="l-blue">+</span> <?php echo _("LEER MÁS") ?></a>
					</div>
					<div class="clear-both"></div>
					<a class="more view-all" href="/testimonios"><span class="l-blue">+</span> <?php echo _("VER MAS TESTIMONIOS") ?></a>
					<div id="footer-cameras-icons">
						<a href="http://www.ccibaires.com.ar" target="_blank" title="Asociados a la Cámara de Comercio Italiana de la República Argentina"><img src="<?php bloginfo('template_directory'); ?>/images/camara_comercio_italiana.png" alt="Asociados a la Cámara de Comercio Italiana de la República Argentina"></a>
						<a href="http://www.camaraportuguesa.org.ar" target="_blank" title="Socios de la Cámara Argentina Portuguesa de Comercio"><img src="<?php bloginfo('template_directory'); ?>/images/camara_comercio_portuguesa.png" alt="Socios de la Cámara Argentina Portuguesa de Comercio"></a>
					</div>
				</div>
				<div id="menu">
				<?php 
				wp_nav_menu( array( 'container' => '',  'menu_id' => 'menu-footer', 'theme_location' => 'primary', 'echo' => true, 'depth' => 1, "link_after" => "") ); 
				?>
				</div>
				<div id="copyright">(C) 1997-2011 CiudadaniasEuropeas.com, Todos los derechos resevados.</div>
			</div>
		</div>
		<?php wp_footer(); ?>

		<?php get_template_part( 'googlecode', 'remarketing' ); ?>

		<script type="text/javascript">
		  	var _gaq = _gaq || [];
		  	_gaq.push(['_setAccount', 'UA-8922785-1']);
		  	_gaq.push(['_trackPageview']);
		  	(function() {
		    	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  	})();
		</script>
	</body>
</html>