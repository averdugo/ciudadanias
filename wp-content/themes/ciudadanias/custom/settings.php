<?php

add_action( 'after_setup_theme', 'ciudadanias_setup' );

if ( ! function_exists( 'ciudadanias_setup' ) ){
	
	function ciudadanias_setup() {
		
		add_theme_support( 'post-thumbnails' );
		add_image_size('photo_player', 79, 79, true);
		
		// This theme styles the visual editor with editor-style.css to match the theme style.
		add_editor_style();
		
		register_nav_menus( array(
			'primary' => 'Menu header',
		) );
		
	}
	
}

function change_mce_options( $init ) {
	$init['theme_advanced_text_colors'] = "545454,20b8e3,8e8e8e,a9a9a9,AFAFAF,939393,c3c3c3,a4a4a4,d3d3d3,666666";
	return $init;
}
add_filter('tiny_mce_before_init', 'change_mce_options');