<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php while ($wp_query->have_posts()) : $wp_query->the_post();
		//$do_not_duplicate = $post->ID; ?>
		
		<div id="blog-head">
			<small><?php echo the_time('j \d\e\ F \d\e\ Y \|\ g:i a ',$post->post_date);?></small>
			<h1><?php echo $post->post_title?></h1>
		</div>
		<div class="hr"></div>
		<div id="testimonios-body" >
			<div id="note-facebook-twitter">
				<img src="<?php bloginfo('template_directory'); ?>/images/dummy-sn.jpg" title="temporal" alt="" >
			</div>
			<?php 
			if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			  the_post_thumbnail("full", array("class" => "border-img"));
			} 
			?>
			
			<?php the_content("",false,"")?>
			
		</div>
		<div id="comentarios" name="comentarios">
		<?php comments_template( '', true ); ?>
		</div>
<?php endwhile; // end of the loop. ?>
