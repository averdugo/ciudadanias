<?php
get_header(); 
?>
<div id="content-wraper">
	<div id="large-box-left" class="normal-pages">
		<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
					
		<div id="blog-head" class="testimonio">
			<div class="left">
				<?php the_post_thumbnail("photo_player", array("class" => "border-img")); ?>
			</div>
			<div class="right">
				<h1><?php echo $post->post_title?></h1>
				<p><?php echo get_post_meta($post->ID, "profesion", true); ?></p>
			</div>
			<div class="clear-both"></div>
		</div>
		<div class="hr"></div>
		
		<div id="testimonios-body" class="mceContentBody">
			<div id="note-facebook-twitter">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style ">
					<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
					<a class="addthis_button_tweet"></a>
					<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
					<a class="addthis_counter addthis_pill_style"></a>
				</div>
				<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e57c4f66bbb80cf"></script>
				<!-- AddThis Button END -->
			</div>
			<?php the_content("",false,"")?>
		</div>
		<?php endwhile; // end of the loop. ?>
					
	</div>
	<div id="small-box-right">
		<?php get_sidebar("contacto"); ?>
	</div>
	<div class="clear-both"></div>
</div>	
<?php get_footer(); ?>