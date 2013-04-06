<?php

function cpcategories_init()
{
	$arr_labels = array
	(
		'name' => 'CP Categories',
		'singular_name' => 'CP Categories',		
	);
	$arr_capabilities = array
	(
		'manage_terms',
		'edit_terms',
		'delete_terms',
		'assign_terms'
	);
	
	$args = array
	(
		'labels' => $arr_labels,	
		'capabilities' => $arr_capabilities,
	);
	register_taxonomy('cpcategory', 'cpproduct', $args);
	
}
add_action('init', 'cpcategories_init');
?>