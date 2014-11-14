<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
</div>	
<div id="big-footer">
		<div id="big-inside-footer">
			<div class="footer-box blog-footer-box">
				<h3>Blog</h3>
				<?php 
				$last_entry = get_last_entry();
				if(!empty($last_entry) ) { 
				?>
				<div class="blog-entry">
					<small><?php echo date("d.m.Y", strtotime($last_entry['post_date']))?></small>
					<p class="blog-resume">
					<?php echo $last_entry['post_title'] ?> 
					</p>
					<p class="blog-body">
					<?php 
					if(!empty($last_entry['post_excerpt'])){
						echo $last_entry['post_excerpt'];
					} else {
						echo $last_entry['post_content'];
					}
					
					
					?> 
					</p>
					<?php /*
					<p class="blog-body">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce a urna erat. Vestibulum ullamcorper, arcu ac vulputate imperdiet, nibh enim pellentesque leo, eu dictum lectus nulla eget sapien. 
					</p>
					<p class="blog-body">
					Donec consequat metus at <a href="">lectus eleifend</a> eleifend. In vitae odio et nibh imperdiet iaculis quis quis lacus. In ornare rutrum iaculis. Sed sed molestie libero.
					</p>
					*/?>
				</div>
				<?php
				} 
				?>
			</div>
			<div class="footer-box">
				<h3>Institucional</h3>
				<ul id="footer-menu-inst">
					<li><a href="<?php echo site_url()?>/"><?php echo _("Inicio") ?></a></li>
					<li><a href="<?php echo site_url()?>/empresa"><?php echo _("Quienes Somos") ?></a></li>
					<li><a href="<?php echo site_url()?>/servicio"><?php echo _("Nuestros Servicios") ?></a></li>
					<li><a href="<?php echo site_url()?>/argentinos-en-el-mundo"><?php echo _("Argentinos en el Mundo") ?></a></li>
				</ul>
				
				<p class="contact-p">
					<span class="email"><a href="mailto:consultas@ciudadaniaseuropeas.com">consultas@ciudadaniaseuropeas.com</a></span><br>
					Solicitar entrevista previa: <br>
					<span style="color: #ffffff;">Tel (011) 4393-7070</span><br>
					Líneas rotativas de lunes a viernes de 8 a 18 hs.
				</p>
			</div>
			<div class="footer-box">
				<h3>Social media</h3>
				<div id="footer-social-icons">
					<a href="http://www.facebook.com/ciudadanias.europeas" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/facebook-shadow.png" alt="facebook"></a>
					<a href="http://twitter.com/ciudadaniaseuro" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/twitter-shadow.png" alt="twitter"></a>
					<a href="http://www.facebook.com/ciudadanias.europeas" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/blogspot-shadow.png" alt="blogspot"></a>
				</div>
				<a href="" id="logo-footer"><img src="<?php bloginfo('template_directory'); ?>/images/logo-footer.png" alt="Ciudadanias Europeas"> </a>
				<p id="rights">
				© 1997 - <?php echo @date("Y")?> ciudadaniaseuropeas.com <br>
				All rights reserved. <br>
				diseño: <a href="" style="vertical-align: top;" ><img src="<?php bloginfo('template_directory'); ?>/images/bluefever.png" alt="" ></a>
				</p>
			</div>
			<div class="clear-both"></div>
		</div>
	</div>
</div>

<?php /*
	</div><!-- #main -->

	<div id="footer" role="contentinfo">
		<div id="colophon">

<?php

	get_sidebar( 'footer' );
?>

			<div id="site-info">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div><!-- #site-info -->

			<div id="site-generator">
				<?php do_action( 'twentyten_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentyten' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentyten' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s.', 'twentyten' ), 'WordPress' ); ?></a>
			</div><!-- #site-generator -->

		</div><!-- #colophon -->
	</div><!-- #footer -->

</div><!-- #wrapper -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
