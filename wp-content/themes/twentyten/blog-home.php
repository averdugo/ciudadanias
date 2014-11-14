<?php
/**
 * Template Name: Blog Home
 */

get_header(); ?>
<div id="content-wraper">
	<div id="large-box-left">
		<?php $wp_query = new WP_Query('showposts=10'); ?>

		<?php get_template_part( 'loop'); ?>
	</div>
	<div id="small-box-right">
		<?php get_template_part( 'sidebar', 'blog' ); ?>
	</div>
	<div class="clear-both"></div>
</div>	
<?php get_footer(); ?>