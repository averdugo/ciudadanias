<?php
get_header(); 
?>
<div id="content-wraper">
	<div id="large-box-left" class="normal-pages mceContentBody">
		<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
					
		<?php the_content(); ?>
				
		<?php endwhile; // end of the loop. ?>
	</div>
	<div id="small-box-right">
		<?php get_sidebar("contacto"); ?>
	</div>
	<div class="clear-both"></div>
</div>	
<?php get_footer(); ?>