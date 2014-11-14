<?php

?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div id="testimonio-head">
		<?php 
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
		  the_post_thumbnail("full", array("class" => "border-img"));
		} 
		?>
		<div id="inline-info">
			<h2><?php echo get_post_meta($post->ID, "nombre",true)?></h2>
			<h3><?php echo get_post_meta($post->ID, "profesion",true)?></h3>
		</div>
		<div class="clear-both"></div>
	</div>
	<div class="hr"></div>
	<div id="testimonios-body" >
		<img src="<?php bloginfo('template_directory'); ?>/images/dummy-sn.jpg" title="temporal" alt="" >
		<?php the_content(); ?>
	</div>	

<?php endwhile; // end of the loop. ?>