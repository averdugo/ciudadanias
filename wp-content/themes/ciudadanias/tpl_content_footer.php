<?php
/**
 * Template Name: Content footer boxes
 */
get_header(); 
?>
<div id="content-wraper">
	<div id="large-box-left" class="normal-pages">
		<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
		<div class="mceContentBody">
		<?php the_content(); ?>
		</div>
		<?php endwhile; // end of the loop. ?>
		<div class="small-box box-border add-margin-top-25 add-padding">
			<p class="blued-text to-big-text">Todos los servicios ofrecidos por Ciudadaniaseuropeas.com© cuentan con garantía legal escrita.</p>
		</div>
		<?php
		//traigo las 3 paginas que linkean del home para armar las 3 cajitas
		$pageId = $post->ID;
		$temp_query = $wp_query;
		query_posts( array('post__in' => array(116,113,131), "post_type"=>"page") );
		$count = 0;
		while (have_posts()){
			the_post();
			if ( $pageId != $post->ID ){
				$count ++;
				$floatedClass = "box-floated-left";
				if ( $count%2==0 )
					$floatedClass = "box-floated-right";
				?>
			<a href="<? the_permalink(); ?>" class="small-box box-border add-margin-top-25 <?=$floatedClass?> to-width-box add-padding">
				<h3 class="h1-world"><?php echo the_title(); ?></h3>
				<p class="blued-text"><?php echo nl2br(get_post_meta($post->ID, 'contenido_caja', true)); ?></p>
			</a>
				<?php
			}
		}
		$wp_query = $temp_query;
		?>
		<div class="clear-both"></div>
	</div>
	<div id="small-box-right">
		<?php get_sidebar("contacto"); ?>
	</div>
	<div class="clear-both"></div>

</div>	
<?php 
get_footer(); 
?>