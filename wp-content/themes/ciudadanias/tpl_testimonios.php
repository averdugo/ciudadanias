<?php
/**
 * Template Name: Testimonios
 */

get_header(); ?>
<div id="content-wraper">
	<div id="large-box-left">
		<?php $wp_query = new WP_Query('showposts=10&post_type=testimonio'); ?>

		<?php get_template_part('loop'); ?>
		
	</div>
	<div id="small-box-right">
		<?php get_sidebar(); ?>
	</div>
	<div class="clear-both"></div>
</div>	
<?php get_footer(); ?>