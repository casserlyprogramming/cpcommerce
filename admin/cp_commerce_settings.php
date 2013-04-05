<?php
/*
	Plugin Name: CP Commerce
	Plugin URI: http://www.casserlyprogramming.com
	Description: Our in house e-Commerce plugin for Wordpress
	Version: 0.1
	Author: Daniel Casserly
	Author URI: http://dandalfprogramming.blogspot.co.uk/
*/
$menu_item_name = 'cp_settings_menu';
$menu_size_section = 'cp_size_settings';

function cp_settings_menu_item()
{
	add_options_page('CP Commerce Global Settings', 'CP Commerce Settings', 'manage_options', $menu_item_name, 'cp_global_settings');
}
add_action('admin_menu', 'cp_settings_menu_item');

function cp_global_settings()
{
	// Make sure that the user has the rights to view this page...
	if( !current_user_can( 'manage_options') )
	{
		wp_die( __( 'You do not have sufficient permission to access this page.'));
	}
	
	
	// For the rest of this routine we echo out the HTML of this page...
	echo "<div class='wrap'>";
	echo "<h2>CP Commerce Settings</h2>"
	echo "<form method='post' action='options.php'>"	
	// The end of the page..
	submit_button();
	echo "</form></div>";	
	
}

function cp_commerce_settings_init()
{
	register_setting( $menu_size_section, 'callback_small_min_value');
	register_setting( $menu_size_section, 'callback_small_max_value');
	register_setting( $menu_size_section, 'callback_medium_max_value');
	register_setting( $menu_size_section, 'callback_medium_max_value');
	register_setting( $menu_size_section, 'callback_large_max_value');
	register_setting( $menu_size_section, 'callback_large_max_value');
	
	// Add Global Section to the page...
	add_settings_section($menu_size_section, 'Size Settings', 'callback_global_section', $menu_item_name);
	
	// Add settings to Global Section
	add_settings_field('cp_small_min_value', 'Small Min Value', 'callback_small_min_value', $menu_item_name, $menu_size_section);
	add_settings_field('cp_small_max_value', 'Small Max Value', 'callback_small_max_value', $menu_item_name, $menu_size_section);
	add_settings_field('cp_medium_min_value', 'Medium Min Value', 'callback_medium_min_value', $menu_item_name, $menu_size_section);
	add_settings_field('cp_medium_max_value', 'Medium Max Value', 'callback_medium_max_value', $menu_item_name, $menu_size_section);
	add_settings_field('cp_large_min_value', 'Large Min Value', 'callback_large_min_value', $menu_item_name, $menu_size_section);
	add_settings_field('cp_large_max_value', 'Large Max Value', 'callback_large_max_value', $menu_item_name, $menu_size_section);
}

add_action('admin_init', 'cp_commerce_settings_init');

// The section Callback Routine...
function callback_global_section()
{
	echo '<p>This section deals with the sizes in the Products page. This allows fine grained tuning of products and their related prices based on size</p>';
}

// The callbacks for this sections inputs...
function callback_small_min_value()
{
	cp_get_input('callback_small_min_value', 'number', '0');
}
function callback_small_max_value()
{
	cp_get_input('callback_small_max_value', 'number', '1');
}
function callback_medium_min_value()
{
	cp_get_input('callback_medium_min_value', 'number', '2');
}
function callback_medium_max_value()
{
	cp_get_input('callback_medium_max_value', 'number', '3');
}
function callback_large_min_value()
{
	cp_get_input('callback_large_min_value', 'number', '4');
}
function callback_large_max_value()
{
	cp_get_input('callback_large_max_value', 'number', '5');
}

// Helper functions 
function cp_get_input($setting_name, $setting_type, $default_value = "", $custom_attr = "")
{
	echo '<input name="' . $setting_name . '" id="ed' . $setting_name . '" type="' . $setting_type . '" value="' . $default_value . '" ' . $custom_attr . "/>";
}

// Seperate method as we are adding in quite a few fields to this....
function cp_get_checkbox($setting_name, $default_value="", $custom_attr = "")
{
	if ($default_value == "")
		$default_value = "0";
	$custom_attr = $custom_attr . " checked='" . $default_value . "'";
	cp_get_input($setting_name, "checkbox", $default_value, $custom_attr);
}
?>
