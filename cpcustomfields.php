<?php

// This section adds in the custom fields to the Product base....
function size_custom_metabox()
{
	global $post;
	$height = get_post_meta( $post->ID, 'cp_product_height', true );
	$width  = get_post_meta( $post->ID, 'cp_product_width', true);
	
}

?>