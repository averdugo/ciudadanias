<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<div id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span> Entradas anteriores' ); ?></div>
		<div class="nav-next"><?php previous_posts_link( 'Entradas posteriores <span class="meta-nav">&rarr;</span>' ); ?></div>
		<div class="br"></div>
	</div><!-- #nav-above -->
<?php endif; ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post();
$postType = get_post_type();
$isTestimonio = ( $postType == 'testimonio' );
?>
		<div class="blog-list-box">
			<?php if ( !$isTestimonio ){ ?>
			<small class="fecha"><?php echo the_time('j \d\e\ F \d\e\ Y \|\ g:i a ',$post->post_date);?></small>
			<?php } ?>
			<h2><?php echo $post->post_title?></h2>
			<?php the_excerpt(); ?>
			<?
			$posttags = get_the_tags();
			if ( $posttags ){
			?>
			<div class="blog-list-tags">
				<span class="this-bold tags">Tags</span> 
				<?php the_tags(""," | ", ""); ?>
			</div>
			<?php } ?>
			<ul>
				<li class="arrowred"><a href="<?php echo $post->guid?>"><strong>Leer más</strong></a></li>
				<?php if ( !$isTestimonio ){ ?>
				<li > | </li>
				<li><a href="<?php echo $post->guid?>#comentarios"><strong>Comentarios(<?php comments_number( '0', '1', '%' ); ?>)</strong></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php if( $wp_query->current_post < $wp_query->post_count-1 ): ?>
			<div class="hr"></div>
		  <?php endif; ?>
		
<?php endwhile; // end of the loop. ?>


<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span> Entradas anteriores' ); ?></div>
					<div class="nav-next"><?php previous_posts_link( 'Entradas posteriores <span class="meta-nav">&rarr;</span>' ); ?></div>
					<div class="br"></div>
				</div><!-- #nav-below -->
<?php endif; ?>
