<?php


// Product Type
function cpproduct_init()
{
	$arr_labels = array(
		'name'=>'CP Products',
		'singular_name' => 'CP Product',		
	);
	$arr_supports = array(
		'title',
		'editor',
		'thumbnail',
		'excerpt',
		'revisions',
	);
	// See what effect that this has on the 
	// product page...
	/*$arr_taxonomies = array(
		'cpoption',
	);
	*/
	$args = array(	
		'labels' => $arr_labels,
		'description' => 'A salable item in the CPCommerce Plugin',
		'public' => true,
		'menu_icon' => 'images/product.png',
		'supports' => $arr_supports,
		//'taxonomies' => $arr_taxonomies,			
	);

	register_post_type('cpproduct', $args);
	
}
add_action('init', 'cpproduct_init');

?>