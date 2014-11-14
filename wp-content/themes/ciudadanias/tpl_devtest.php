<?php
/**
 * Template Name: Dev Test
 */

get_header();

?>

<div id="content-wraper">
	<div id="small-box-right">
		<div class="small-box box-border add-margin-bottom">
			<p id="telephone">
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
	</div>
	<div class="clear-both"></div>
</div>

<?php get_footer(); ?>