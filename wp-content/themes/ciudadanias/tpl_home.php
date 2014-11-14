<?php
/**
 * Template Name: Home page
 */

get_header();

?>

	<div id="content-wraper">
		<div id="large-box-left">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; // end of the loop. ?>
			<div class="large-box">
				<a class="h1Link h1-world" href="<?=get_permalink(113);?>">¿Cómo empiezo?</a>
				<div class="mceContentBody home-text">
				<?php
				$temp_query = $wp_query;
				query_posts('p=113&post_type=page');
				while (have_posts()) : the_post();
					global $more;    
					$more = false;
					the_content("", false);
				endwhile;
				$wp_query = $temp_query;
				?>				
				</div>
				<p><a class="more" href="<?=get_permalink(113);?>"><span class="l-blue">+</span> VER MÁS</a></p>
			</div>
			<div class="br"></div>
			<div class="hr"></div>
			<div class="large-box">
				<a class="h1Link h1-note" href="<?=get_permalink(116);?>">¿Qué necesito?</a>
				<div class="mceContentBody home-text">
				<?php
				$temp_query = $wp_query;
				query_posts('p=116&post_type=page');
				while (have_posts()) : the_post();
					global $more;    
					$more = false;
					the_content("", false);
				endwhile;
				$wp_query = $temp_query;
				?>				
				</div>
				<p><a class="more" href="<?=get_permalink(116);?>"><span class="l-blue">+</span> VER MÁS</a></p>
			</div>
			<div class="br"></div>
			<div class="hr"></div>
			<div class="large-box">
				<a class="h1Link h1-inf" href="<?=get_permalink(131);?>">Tengo dudas</a>
				<div class="mceContentBody home-text">
				<?php
				$temp_query = $wp_query;
				query_posts('p=131&post_type=page');
				while (have_posts()) : the_post();
					global $more;    
					$more = false;
					the_content("", false);
				endwhile;
				$wp_query = $temp_query;
				?>
				</div>	
				<p><a class="more" href="<?=get_permalink(131);?>"><span class="l-blue">+</span> VER MÁS</a></p>
			</div>
			<div class="br"></div>
			<div class="hr"></div>
			<?php $test = get_random_testimony(2) ;
			foreach( $test as $key => $testimony ) {
			?>
			<div class="wide-box box-border testimonio <?php echo (($key%2) == 1) ? "box-floated-right" : "box-floated-left" ?>" >
				<div class="wide-box-img">
					<?php echo $testimony['thumbnail']?>
					<span><?php echo $testimony["post_title"] ?></span>
					<br/><span class="profesion"><?php echo $testimony["profesion"] ?></span>
				</div>
				<div class="wide-box-content wide-box-content-height">
					<p class="this-italic"><?php echo trim($testimony["post_excerpt"])!=''?$testimony["post_excerpt"]:generar_excerpt($testimony["post_content"]) ?></p>
					<a class="more read-more" href="<?php echo get_permalink($testimony["ID"])?>"><span class="l-blue">+</span> <?php echo _("LEER MÁS") ?></a>
				</div>
				<div class="clear-both"></div>
				<a class="more view-all" href="/testimonios"><span class="l-blue">+</span> <?php echo _("VER MAS TESTIMONIOS") ?></a>
			</div>
			<?php 
			}
			?>
		</div>
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
			<div class="small-box box-border" id="video-inst" style="margin-top: 26px;" >
				<a href="/videos">MIRÁ NUESTROS<br><span class="l-blue-25">Videos</span></a>
				<img src="<?php bloginfo('template_directory'); ?>/images/video-inst.png" alt="video institucional">
				<div class="clear-both"></div>
			</div>
			<a href="/seguimiento-online/" id="online-btn" ></a>
		</div>
		<div class="clear-both"></div>
	</div>

<?php get_footer(); ?>