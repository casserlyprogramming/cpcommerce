<?php
/*
	Plugin Name: CP Commerce
	Plugin URI: http://www.casserlyprogramming.com
	Description: Our in house e-Commerce plugin for Wordpress
	Version: 0.1
	Author: Daniel Casserly
	Author URI: http://dandalfprogramming.blogspot.co.uk/
*/
// This section adds in the custom fields to the Product base....
function size_custom_metabox()
{
	global $post;
	$height = get_post_meta( $post->ID, 'cp_product_height', true );
	$width  = get_post_meta( $post->ID, 'cp_product_width', true);
	
}

?>