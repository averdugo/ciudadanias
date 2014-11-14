<?php

/* Staff admin section */
add_action('init', 'staff_register');
function staff_register() {
	$labels = array(
		'name' => 'Staff',
		'singular_name' => 'Staff',
		'add_new' => 'Crear nuevo',
		'add_new_item' => 'Agregar nuevo Integrande',
		'edit_item' => 'Editar Integrante',
		'new_item' => 'Nuevo Integrante',
		'view_item' => 'Ver Integrante',
		'search_items' => 'Buscar Integrante',
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
		'supports' => array('title','thumbnail','editor','page-attributes')
	);
	register_post_type( 'staff' , $args );
}
add_action("admin_init", "admin_init_staff");
function admin_init_staff(){
	add_meta_box("staff_meta", "Información adicional", "staff_meta", "staff", "normal", "high");
}
function staff_meta() {
	global $post;
	$custom = get_post_custom($post->ID);
	$cargo = htmlspecialchars($custom["cargo"][0]);
	?>
	<p><label>Cargo que ocupa:</label><input name="cargo" size="40" value="<?php echo $cargo; ?>" /></p>
	<?php
}
add_action('save_post', 'save_staff_details');
function save_staff_details(){
	global $post;
	if ( $post->post_type == "staff" ){
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post->ID;
		} 
	 	update_post_meta($post->ID, "cargo", $_POST["cargo"]);
	}
}
add_action("manage_posts_custom_column",  "staff_custom_columns");
add_filter("manage_edit-staff_columns", "staff_edit_columns");
function staff_edit_columns($columns){
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => "Nombre del Integrante",
		"cargo" => "Cargo",
		"orden" => "Orden",
		"foto" => "Foto"
  	);
 
	return $columns;
}
function staff_custom_columns($column){
	global $post;
	if ( $post->post_type == "staff" ){
		$custom = get_post_custom();
		switch ($column) {
			case "cargo":
				echo $custom["cargo"][0];
				break;
			case "orden":
				echo $post->menu_order;
				break;
			case "foto":
				the_post_thumbnail("photo_player");
				break;
		}
	}
}