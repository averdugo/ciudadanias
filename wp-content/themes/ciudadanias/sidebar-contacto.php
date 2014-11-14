<div class="small-box box-border add-margin-bottom">
	<p id="telephone" >
		<span class="first-t">Comunicate con nosotros</span>
		<span class="second-t">(011) <span class="l-blue ">4393-7070</span></span>
		<span class="third-t">Lun. a Vie. de 8 a 18hs - Líneas rotativas</span>
	</p>
</div>

<div class="small-box box-border add-arg-bg">
	<h2>Consultanos</h2>
	<?php 
		if ( is_active_sidebar( 'contact-form' ) ){
			dynamic_sidebar( 'contact-form' );
		}
	?>
</div>
<?php 
if ( get_post_type() != 'testimonio' ) {
	$testimony = get_random_testimony() ;
	?>
	<div class="wide-box box-border add-margin-top testimonio add-fix-1" >
		<div class="wide-box-img">
			<?php echo $testimony['thumbnail']?>
			<span><?php echo $testimony["post_title"] ?></span>
			<br/><span class="profesion"><?php echo $testimony["profesion"] ?></span>
		</div>
		<div class="wide-box-content">
			<p class="this-italic"><?php echo trim($testimony["post_excerpt"])!=''?$testimony["post_excerpt"]:generar_excerpt($testimony["post_content"]) ?></p>
			<a class="more read-more" href="<?php echo get_permalink($testimony["ID"])?>"><span class="l-blue">+</span> <?php echo _("LEER MÁS") ?></a>
		</div>
		<div class="clear-both"></div>
		<a class="more view-all" href="/testimonios"><span class="l-blue">+</span> <?php echo _("VER MAS TESTIMONIOS") ?></a>
	</div>
<?
}

// Mostrar banner solo en la pagina servicios
if( $post->ID == 95 ){
	echo '<div class="sidebar-banner"><a href="http://www.magicdoorviajes.com" target="_blank"><img src="'. get_bloginfo('template_directory') .'/images/magic-door-viajes.gif" height="144" width="300" border="0"/></div>';
}