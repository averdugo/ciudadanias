<?php
/**
 * Template Name: Landing Facebook OLD
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
        <script src="http://connect.facebook.net/en_US/all.js"></script>
        <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId   : '121560511257954',
                status  : true, // check login status
                cookie  : true, // enable cookies to allow the server to access the session
                xfbml   : true // parse XFBML
            });     
            //FB.Canvas.setAutoResize();
			FB.Canvas.scrollTo(0,0);
        }
        </script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(getBrowserClass()." landing facebook"); ?> id="fb-root" >
		<div id="main-wraper">
			<div id="header-top">
				<a href="<?php echo site_url(); ?>" target="_blank" ><img id="img-logo" src="<?php bloginfo('template_directory'); ?>/images/logo_landings.png" alt="Ciudadanias Europeas" ></a>
			</div>
		</div>
		<div id="home-header-bot" class="small-header">
			<h1><?php echo the_title('','',false) ?></h1>
		</div>
		<div id="content-wraper">
			<div id="content">
				<h2>Tu pasaporte al mundo!</h2>
				<ul class="starts-list">
					<li>Aceleramos el trámite lo más posible.</li>
					<li>18 años de experiencia.</li>
					<li>¡Más de <b>28.000</b> ciudadanías europeas tramitadas!</li>
					<li>No es necesario que vivas en Capital.</li>
				</ul>
				<p class="button">¡Envianos tu consulta y confirmá<br/>si podés tramitar tu ciudadanía <?php echo $custom_fields["ciudadania"][0] ?>!</p>

				<?php echo do_shortcode( '[contact-form 2 "Formulario de contacto - Landings"]' ) ?>
				
			</div>
		</div>
		<div id="footer">
			<div id="footerWrapper">
				
				<div class="small-box">
					<p id="telephone">
						<span class="first-t">Comunicate con nosotros</span>
						<span class="second-t">(011) <span class="l-blue ">4393-7070</span></span>
						<span class="third-t">Lun. a Vie. de 8 a 18hs - Líneas rotativas</span>
					</p>
					<p class="mail"><a href="mailto:info@ciudadaniaseuropeas.com" target="_blank">info@ciudadaniaseuropeas.com</a></p>
					<p class="skype"><span>Skype:</span> ciudadaniaseuropeas.com</p>
				</div>
				
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
				<div id="copyright">(C) 1997-2011 CiudadaniasEuropeas.com, Todos los derechos resevados.</div>
			</div>
		</div>
		<?php wp_footer(); ?>
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