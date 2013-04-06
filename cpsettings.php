<?php

add_action('admin_menu', 'add_cp_commerce_settings');

function add_cp_commerce_settings()
{
	add_options_page('CP Commerce Settings', 'CP Commerce', 'manage_options', 'cp_commerce_settings', 'cp_commerce_options_page');
}

function cp_commerce_options_page()
{
	?>
	<div>
	<h2>CP Commerce Plugin Settings</h2>
	These settings will allow the fine grain tuning of the CP Commerce part of this site..
	<form action="options.php" method="post">
	<?php settings_fields('cp_commerce_options');   ?>
	Small Min: <?php cp_get_input('cp_small_min_value', 'text', get_option('cp_small_min_value')); ?><br/>
	Small Max: <?php cp_get_input('cp_small_max_value', 'text', get_option('cp_small_max_value')); ?><br/>
	Medium Min:<?php cp_get_input('cp_medium_min_value', 'text', get_option('cp_medium_min_value')); ?><br/>
	Medium Max:<?php cp_get_input('cp_medium_max_value', 'text', get_option('cp_medium_max_value')); ?><br/>
	Large Min: <?php cp_get_input('cp_large_min_value', 'text', get_option('cp_large_min_value')); ?><br/>
	Large Max: <?php cp_get_input('cp_large_max_value', 'text', get_option('cp_large_max_value')); ?><br/>
	<input class="button-primary" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
	</form>
	</div>
	<?php
}

add_action('admin_init', 'cp_commerce_settings_init');
function cp_commerce_settings_init()
{
	$menu_options = 'cp_commerce_options';
	$size_section = 'cp_size_settings';

	register_setting( $menu_options, 'cp_small_min_value');
	register_setting( $menu_options, 'cp_small_max_value');
	register_setting( $menu_options, 'cp_medium_max_value');
	register_setting( $menu_options, 'cp_medium_max_value');
	register_setting( $menu_options, 'cp_large_max_value');
	register_setting( $menu_options, 'cp_large_max_value');
	// Add Global Section to the page...
	add_settings_section($size_section, 'Sizing Options', 'callback_size_settings_section', 'cp_commerce_size_options');

	// Add settings to Global Section
	add_settings_field('cp_small_min_value', 'Small Min Value', 'callback_small_min_value', $size_section);
	add_settings_field('cp_small_max_value', 'Small Max Value', 'callback_small_max_value', $size_section);
	add_settings_field('cp_medium_min_value', 'Medium Min Value', 'callback_medium_min_value', $size_section);
	add_settings_field('cp_medium_max_value', 'Medium Max Value', 'callback_medium_max_value', $size_section);
	add_settings_field('cp_large_min_value', 'Large Min Value', 'callback_large_min_value', $size_section);
	add_settings_field('cp_large_max_value', 'Large Max Value', 'callback_large_max_value', $size_section);
}

// display HTML settings functions
function callback_size_settings_section()
{
	echo "<p>Sizes can have an effect on the prices, and the pictures. Set them up here...</p>";
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


