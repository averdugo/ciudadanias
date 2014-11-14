<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<div id="content-wraper">
	<div id="large-box-left" class="normal-pages">

		<?php get_template_part( 'loop', 'page'); ?>
	</div>
	<div id="small-box-right">
		<?php get_template_part( 'sidebar', 'blog' ); ?>
	</div>
	<div class="clear-both"></div>
</div>	
<?php get_footer(); ?>
