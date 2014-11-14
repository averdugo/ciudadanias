<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<div id="content-wraper">
	<div id="large-box-left">

	<?php
	/* Run the loop for the tag archive to output the posts
	 * If you want to overload this in a child theme then include a file
	 * called loop-tag.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'tag' );
	?>
	</div>
	<div id="small-box-right">
		<?php get_template_part( 'sidebar' ); ?>
	</div>
	<div class="clear-both"></div>
</div>	
<?php get_footer(); ?>
