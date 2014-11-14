<?php
/**
 * Template Name: Empresa
 */

get_header(); ?>

<div id="content-wraper" >
	<div class="staff mceContentBody" >
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; // end of the loop. ?>
	</div>
	<h1 style="margin: 20px 0 0 0; font-weight: normal;">Nuestro Staff</h1>
	
	<?php
	$args = array(
		'numberposts'=>-1,
		"post_type"=>'staff',
		'orderby'=>'menu_order',
		"order"=>'ASC'
	);
	$myposts = get_posts( $args );
	foreach( $myposts as $i=>$post ) {
		setup_postdata($post);
		$cargo = get_post_meta($post->ID, 'cargo', true);
		$class = ( $i%2 == 0 )?"box-floated-left":"box-floated-right";
	?>
	<div class="wide-box box-border staff-width <?php echo $class ?>" >
		<div class="wide-box-img">
			<?php the_post_thumbnail('thumbnail') ?> 
		</div>
		<div class="staff-box-content">
			<h3><?php the_title(); ?></h3>
			<?php if ( trim($cargo)!='' ){ ?>
			<span><?php echo $cargo ?></span>
			<?php } ?>
			<?php the_content() ?>
		</div>
		<div class="clear-both"></div>
	</div>
	<?php
	}
	?>
	<div class="clear-both"></div>
</div>

<?php get_footer(); ?>