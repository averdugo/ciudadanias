<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo $prefix ?>favicon.ico" type="image/x-icon" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" ></link>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.1.min.js"></script>
</head>

<body <?php body_class(); ?>>
<?php /*
<div id="wrapper" class="hfeed">
	<div id="header">
		<div id="masthead">
			<div id="branding" role="banner">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
					<span>
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					</span>
				</<?php echo $heading_tag; ?>>
				<div id="site-description"><?php bloginfo( 'description' ); ?></div>

				<?php
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					// $src, $width, $height 
					if ( is_singular() && current_theme_supports( 'post-thumbnails' ) &&
							has_post_thumbnail( $post->ID ) &&
							(  $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID );
					elseif ( get_header_image() ) : ?>
						<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
					<?php endif; ?>
			</div><!-- #branding -->

			<div id="access" role="navigation">
			  <?php //  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff  ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentyten' ); ?>"><?php _e( 'Skip to content', 'twentyten' ); ?></a></div>
				<?php // Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.   ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</div><!-- #access -->
		</div><!-- #masthead -->
	</div><!-- #header -->

	<div id="main">
*/ ?>
<div id="main-wraper">
	<div id="header-top">
		<a href="<?php echo site_url(); ?>"><img id="img-logo" src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="Ciudadanias Europeas" ></a>
		<?php 
		if ( is_single() || is_tag()) {
			$selected = "blog";
		}else{
			$selected = "none";
		}
		wp_nav_menu( array( 'container' => '',  'menu_id' => 'menu-top', 'theme_location' => 'primary', 'echo' => true, 'depth' => 1, "link_after" => "") ); 
		?>
		<?php /*
		<ul id="menu-top">
			<li class="act" ><a href="<?php echo home_url( '/' ); ?>"><?php echo _("Home") ?></a></li>
			<li><a href="staff.php"><?php echo _("Empresa") ?></a></li>
			<li><a href="ahorratiempo.php"><?php echo _("Servicio") ?></a></li>
			<li><a href=""><?php echo _("Ventajas") ?></a></li>
			<li><a href=""><?php echo _("Leyes") ?></a></li>
			<li><a href="blog.php"><?php echo _("Blog") ?></a></li>
			<li><a href=""><?php echo _("Contactos") ?></a></li>
		</ul> */ ?>
	</div>
	<?php
	 if( is_home() || is_front_page() ) {
	?>
	<div id="home-header-bot">
		<p class="home-header-h1"><!--más de 28.000 personas<br>ya tienen su ciudadanía<br>...gracias a nosotros--></p>
		<a id="start-now" href="como-empiezo"></a>
	</div>
	<?php	
	 } else {
	?>
	<div id="home-header-bot" class="small-header">
		<?php
			$title = the_title('','',false);
			if( preg_match("/^Blog$/", $title) ){
			?>
				<h1><?php echo  _($title)?><img src="<?php bloginfo('template_directory'); ?>/images/rss-icon.png" style="margin-left: 15px;"></h1>
			<?php
			} elseif ( is_single() || is_tag()) {
			?>
				<h2><?php echo  _("Blog")?><?php (is_tag()) ? wp_title(): ""?><img src="<?php bloginfo('template_directory'); ?>/images/rss-icon.png" style="margin-left: 15px;"></h2>
			<?php
			} elseif ( preg_match("/^Testimonio/", $title) ) {
			?>
				<h1><?php echo _("Testimonios") ?></h1>
			<?php	
			} else {
			?>
				<h1><?php echo $title ?></h1>
			<?php
			}
		?>
		
	</div>
	<?php 
	} 
	?>
