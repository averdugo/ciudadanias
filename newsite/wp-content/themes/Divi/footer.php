<?php if ( 'on' == et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

	<span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>

			<footer id="main-footer">
				<?php get_sidebar( 'footer' ); ?>


		<?php
			if ( has_nav_menu( 'footer-menu' ) ) : ?>

					<div id="et-footer-nav">
					<div class="container">

						<div id="logo-footer">
							<img src="http://clients.gleepa.com/ciudadanias/wp-content/uploads/2016/04/logo-ciudadanias-footer.png"/>
						</div>

						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
								'depth'          => '1',
								'menu_class'     => 'bottom-nav',
								'container'      => '',
								'fallback_cb'    => '',
							) );
						?>
					</div>
				</div> <!-- #et-footer-nav -->

			<?php endif; ?>

				<div id="footer-bottom" style="clear:both">
					<div class="container clearfix">
				<?php
					if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
						get_template_part( 'includes/social_icons', 'footer' );
					}
				?>

						<p id="footer-info" style="display:none;"><?php printf( et_get_safe_localization( __( 'Designed by %1$s | Powered by %2$s', 'Divi' ) ), '<a href="http://www.elegantthemes.com" title="Premium WordPress Themes">Elegant Themes</a>', '<a href="http://www.wordpress.org">WordPress</a>' ); ?></p>

<p id="footer-info">&copy; 1997 - 2016 ciudadaniaseuropeas.com<br>All rights reserved.<br><br><a href="http://www.gleepa.com" target="blank"><img src="http://clients.gleepa.com/ciudadanias/wp-content/uploads/2016/04/gleepa-logo.png" border="0"></a></p>


<p class="footer-ico"><a href="#"><img src="http://clients.gleepa.com/ciudadanias/wp-content/uploads/2016/04/footer-ico-1.png"/></a>&nbsp;
<a href="#"><img src="http://clients.gleepa.com/ciudadanias/wp-content/uploads/2016/04/footer-ico-2.png"/></a></p>
					</div>	<!-- .container -->
				</div>
			</footer> <!-- #main-footer -->
		</div> <!-- #et-main-area -->

<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

	</div> <!-- #page-container -->

	<?php wp_footer(); ?>
</body>
</html>
