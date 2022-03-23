<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              ajardiah.dev
 * @since             1.0.0
 * @package           Builders_Hub
 *
 * @wordpress-plugin
 * Plugin Name:       Builders  Hub
 * Plugin URI:        ajardiah.dev
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            AJ Jardiah Jr
 * Author URI:        ajardiah.dev
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       builders-hub
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}


if(file_exists(dirname(__FILE__) . '/vendor/autoload.php')){
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

// Define CONSTANTS
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN', plugin_basename( __FILE__ ) );

use Inc\Base\Activate;
use Inc\Base\Deactivate;

/**
 * The code that runs during plugin activation
 */
function activate_builders_hub_plugin() {
    Activate::activate();
}

/**
 * The code that runs during plugin deactivation
 */
function deactivate_builders_hub_plugin() {
    Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'activate_builders_hub_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_builders_hub_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
    Inc\Init::register_services();
}



/** Start: Detect ACF Pro plugin. Include if not present. */
if ( !class_exists('acf') ) { // if ACF Pro plugin does not currently exist
    /** Start: Customize ACF path */
    add_filter('acf/settings/path', 'cysp_acf_settings_path');
    function cysp_acf_settings_path( $path ) {
        $path = plugin_dir_path( __FILE__ ) . 'assets/extends/acf/';
        return $path;
    }
    /** End: Customize ACF path */
    /** Start: Customize ACF dir */
    add_filter('acf/settings/dir', 'cysp_acf_settings_dir');
    function cysp_acf_settings_dir( $path ) {
        $dir = plugin_dir_url( __FILE__ ) . 'assets/extends/acf/';
        return $dir;
    }
    /** End: Customize ACF path */
    /** Start: Hide ACF field group menu item */
    add_filter('acf/settings/show_admin', '__return_false');
    /** End: Hide ACF field group menu item */
    /** Start: Include ACF */
    include_once( plugin_dir_path( __FILE__ ) . 'assets/extends/acf/acf.php' );
    /** End: Include ACF */
    /** Start: Create JSON save point */
    add_filter('acf/settings/save_json', 'cysp_acf_json_save_point');
    function cysp_acf_json_save_point( $path ) {
        $path = plugin_dir_path( __FILE__ ) . 'acf-json/';
        return $path;
    }
    /** End: Create JSON save point */
    /** Start: Create JSON load point */
    add_filter('acf/settings/load_json', 'cysp_acf_json_load_point');
    /** End: Create JSON load point */
    /** Start: Stop ACF upgrade notifications */
    add_filter( 'site_transient_update_plugins', 'cysp_stop_acf_update_notifications', 11 );
    function cysp_stop_acf_update_notifications( $value ) {
        unset( $value->response[ plugin_dir_path( __FILE__ ) . 'assets/extends/acf/acf.php' ] );
        return $value;
    }
    /** End: Stop ACF upgrade notifications */
} else { // else ACF Pro plugin does exist
    /** Start: Create JSON load point */
    add_filter('acf/settings/load_json', 'cysp_acf_json_load_point');
    /** End: Create JSON load point */
} // end-if ACF Pro plugin does not currently exist
/** End: Detect ACF Pro plugin. Include if not present. */
/** Start: Function to create JSON load point */
function cysp_acf_json_load_point( $paths ) {
    $paths[] = plugin_dir_path( __FILE__ ) . 'acf-extended-json-load';
    return $paths;
}
/** End: Function to create JSON load point */



// Check if ACF Classes exists:
if( class_exists('acf_pro') ){

    // Define path and URL to the ACF plugin.
    define('MY_ACF_PATH', plugin_dir_path( __FILE__ ) . '/assets/extends/acf-extended/');
    define('MY_ACF_URL', plugin_dir_url( __FILE__ ) . '/assets/extends/acf-extended/');

    // Include the ACF plugin.
    include_once(MY_ACF_PATH . 'acf-extended.php');

    // Customize the url setting to fix incorrect asset URLs.
    add_filter('acf/settings/acfe/url', 'my_acfe_settings_url');
    function my_acfe_settings_url($url)
    {
        return MY_ACF_URL;
    }

    // (Optional) Hide the ACF admin menu item.
    add_filter('acf/settings/acfe/show_admin', 'my_acf_settings_show_admin');
    function my_acf_settings_show_admin($show_admin)
    {
        return false;
    }

}