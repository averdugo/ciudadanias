<?php

function ciudadanias_widgets_init() {

	/* Widget contacto */
	register_sidebar( array(
		'name' => 'Contacto-form',
		'id' => 'contact-form',
		'description' => 'Contacto-form'
	) );

	/* Widget contacto Landing */
	register_sidebar( array(
		'name' => 'Contacto-landing',
		'id' => 'contact-form-landing',
		'description' => 'Contacto-landing'
	) );

	/* Widget contacto Facebook */
	register_sidebar( array(
		'name' => 'Contacto-facebook',
		'id' => 'contact-form-facebook',
		'description' => 'Contacto-facebook'
	) );

	/* Widget contacto Polaca */
	register_sidebar( array(
		'name' => 'Contacto-polaca',
		'id' => 'contact-form-polaca',
		'description' => 'Contacto-polaca'
	) );

	/* Widget contacto Legales */
	register_sidebar( array(
		'name' => 'Contacto-legales',
		'id' => 'contact-form-legales',
		'description' => 'Contacto-legales'
	) );

/* Widget contacto Main */
	register_sidebar( array(
		'name' => 'Contacto-main',
		'id' => 'contact-form-main',
		'description' => 'Contacto-main'
	) );
}

add_action( 'widgets_init', 'ciudadanias_widgets_init' );