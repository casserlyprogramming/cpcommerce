<?php
/*
	Plugin Name: CP Commerce
	Plugin URI: http://www.casserlyprogramming.com
	Description: Our in house e-Commerce plugin for Wordpress
	Version: 0.1
	Author: Daniel Casserly
	Author URI: http://dandalfprogramming.blogspot.co.uk/
*/
// Dependencies...


require plugin_dir_path( __FILE__ ) . '/cpcustomtypes.php' ;
require plugin_dir_path( __FILE__ ) . '/cptaxonomies.php' ;
require plugin_dir_path( __FILE__ ) . '/cpsettings.php' ;



/*
So what does this document need?

We need to have products, which is fairly obvious.

We also need a GOOD attributes system. One that allows some really AWESOME 
attributes that effect the price of the product.

We need images that reflect the attributes

We need orders of the products

We need to accept payments in different gateways. SagePay first

*/

?>
