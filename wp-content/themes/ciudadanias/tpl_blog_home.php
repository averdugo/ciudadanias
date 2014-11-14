<?php
/**
 * Template Name: Blog Home
 */
 

get_header(); 

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts('posts_per_page=10&paged='.$paged);
 
?>
<div id="content-wraper">
	<div id="large-box-left">
		<?php
		?>

		<?php get_template_part( 'loop'); ?>
		
	</div>
	<div id="small-box-right">
		<?php get_sidebar(); ?>
	</div>
	<div class="clear-both"></div>
</div>	
<?php get_footer(); ?>