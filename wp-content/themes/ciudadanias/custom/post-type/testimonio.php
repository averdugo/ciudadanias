<?php

/* Testimonios admin section */
add_action('init', 'testimonio_register');
function testimonio_register() {
	$labels = array(
		'name' => 'Testimonios',
		'singular_name' => 'Testimonio',
		'add_new' => 'Crear nuevo',
		'add_new_item' => 'Agregar nuevo Testimonio',
		'edit_item' => 'Editar Testimonio',
		'new_item' => 'Nuevo Testimonio',
		'view_item' => 'Ver Testimonio',
		'search_items' => 'Buscar Testimonio',
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
		'menu_icon' => get_stylesheet_directory_uri() . '/images/staff_16x16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','thumbnail','editor','excerpt')
	);
	register_post_type( 'testimonio' , $args );
}
add_action("admin_init", "admin_init_testimonio");
function admin_init_testimonio(){
	add_meta_box("testimonio_meta", "Información adicional", "testimonio_meta", "testimonio", "normal", "high");
}
function testimonio_meta() {
	global $post;
	$custom = get_post_custom($post->ID);
	$profesion = htmlspecialchars($custom["profesion"][0]);
	?>
	<p><label>Profesión:</label><input name="profesion" size="40" value="<?php echo $profesion ?>" /></p>
	<?php
}
add_action('save_post', 'save_testimonio_details');
function save_testimonio_details(){
	global $post;
	if ( $post->post_type == "testimonio" ){
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post->ID;
		} 
	 	update_post_meta($post->ID, "profesion", $_POST["profesion"]);
	}
}
add_action("manage_posts_custom_column",  "testimonio_custom_columns");
add_filter("manage_edit-testimonio_columns", "testimonio_edit_columns");
function testimonio_edit_columns($columns){
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Nombre del Integrante",
		"profesion" => "Profesión",
		"foto" => "Foto"
  	);
 
	return $columns;
}
function testimonio_custom_columns($column){
	global $post;
	if ( $post->post_type == "testimonio" ){
		$custom = get_post_custom();	
		switch ($column) {
			case "profesion":
				echo $custom["profesion"][0];
				break;
			case "foto":
				the_post_thumbnail("photo_player");
				break;
		}
	}
}