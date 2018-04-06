<?php
/**
 * @package AlecadPlugin
 */
/*
 * Plugin Name: Alecad Plugin
 * Plugin URI: http://www.devondaviau.com
 * Description: This is my first OOP plugin. Written with the help of the tutorial.
 * Version: 1.0
 * Author: Devon Daviau
 * Author URI: http://www.devondaviau.com
 * License: GPLv2 or later
 * Text Domain: alecad-plugin
 */

// Abort if this file is called directly, outside of WP
defined('ABSPATH') or die('Hey, you can\'t access this file, you silly human!');

// Require Composer autoload
if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// Bring in activation and deactivation classes
use Inc\Base\Activate;
use Inc\Base\Deactivate;

// Calls activate method
function activate_alecad_plugin() {
	Activate::activate();
}
register_activation_hook(__FILE__, 'activate_alecad_plugin');


// Calls deactivate method
function deactivate_alecad_plugin() {
	Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_alecad_plugin');


// Initialize the core classes of the plugin
if (class_exists('Inc\\Init')) {
	Inc\Init::register_alecad_services();
}