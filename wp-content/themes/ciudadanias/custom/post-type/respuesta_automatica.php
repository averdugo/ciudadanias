<?php

/* Respuestas automaticas admin section */
add_action('init', 'respuesta_automatica_register');
function respuesta_automatica_register() {
	$labels = array(
		'name' => 'Respuestas automáticas',
		'singular_name' => 'Respuesta automática',
		'add_new' => '',
		'add_new_item' => 'Agregar Respuesta automática',
		'edit_item' => 'Editar Respuesta automática',
		'new_item' => 'Nueva Respuesta automática',
		'view_item' => 'Ver Respuesta automática',
		'search_items' => 'Buscar Respuesta automática',
		'not_found' =>  'Nada encontrado',
		'not_found_in_trash' => 'Nada encontrado en el trash',
		'parent_item_colon' => ''
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'exclude_from_search'=>true,
		'show_ui' => true,
		'query_var' => true,
		'menu_position'=>10,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor')
	);
	register_post_type( 'respuesta_automatica' , $args );
}

add_action('save_post', 'save_respuesta_automatica_details');
function save_respuesta_automatica_details(){
	global $post;
	if ( $post->post_type == "testimonio" ){
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post->ID;
		}
	}
}

add_filter("manage_edit-testimonio_columns", "respuesta_automatica_edit_columns");
add_action("manage_posts_custom_column",  "respuesta_automatica_custom_columns");
function respuesta_automatica_edit_columns($columns){
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Titulo"
  	);
	return $columns;
}
function respuesta_automatica_custom_columns($column){
	global $post;
	if ( $post->post_type == "respuesta_automatica" ){
		$custom = get_post_custom();	
	}
}