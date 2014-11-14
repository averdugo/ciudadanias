<!DOCTYPE html>
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
		//echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory') ?>/fonts/stylesheet.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory') ?>/jPlayer.Blue.Monday.2.0.0/jplayer.blue.monday.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_bloginfo('template_directory') ?>/editor-style.css" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
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
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jplayer.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/global.js"></script>
</head>

<body <?php body_class(getBrowserClass()); ?>>
<div id="main-wraper">
	<div id="header-top">
		<a href="<?php echo site_url(); ?>"><img id="img-logo" src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="Ciudadanias Europeas" ></a>
		<?php
		wp_nav_menu( array( 'container' => '',  'menu_id' => 'menu-top', 'theme_location' => 'primary', 'echo' => true, 'depth' => 1, "link_after" => "") ); 
		?>
	</div>
	<?php
	 if( is_home() || is_front_page() ) {
	?>
	<div id="home-header-bot">
		<!--
		<a href="<?= get_permalink(113); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/home_header_banner_diciembre.jpg" height="388" width="962" alt="No pierdas tu tiempo, Elegí una Consultora, No una Gestoría" border="0"/></a>
		<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="962" height="388">
			<param name="movie" value="<?php bloginfo('template_directory'); ?>/swf/banner3.swf" />
			<param name="quality" value="high" />
			<embed src="<?php bloginfo('template_directory'); ?>/swf/banner4.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="962" height="388"></embed>
		</object>
		-->
		<p class="home-header-h1">más de 31.000 personas ya tienen su ciudadanía ...gracias a nosotros</p>
		<a id="start-now" href="como-empiezo"></a>
	</div>
	<?php
	 } else {
	?>
	<div id="home-header-bot" class="small-header">
		<div class="wrapper">
			<?php
			$title = the_title('','',false);
			if( preg_match("/^Blog$/", $title) ){
			?>
				<h1><?php echo  _($title)?></h1>
			<?php
			} elseif ( get_post_type() == 'testimonio' ) {
			?>
				<h1><?php echo _("Testimonios") ?></h1>
			<?php	
			} elseif ( is_single() || is_tag()) {
			?>
				<h2><?php echo  _("Blog")?><?php (is_tag()) ? wp_title(): ""?><img src="<?php bloginfo('template_directory'); ?>/images/rss-icon.png" style="margin-left: 15px;"></h2>
			<?php
			} else {
			?>
				<h1><?php echo $title ?></h1>
			<?php
			}
			?>
		</div>
	</div>
	<?php 
	}
	?>