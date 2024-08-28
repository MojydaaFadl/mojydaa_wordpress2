<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              flawlessthemes.com
 * @since             1.0.0
 * @package           Flawless_Demo_Importer
 *
 * @wordpress-plugin
 * Plugin Name:       Flawless Themes Demo Importer
 * Plugin URI:        
 * Description:       Import Demo Content for Flawless Themes free version Themes 
 * Version:           1.0.18
 * Author:            Flawless Themes
 * Author URI:        flawlessthemes.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       flawless-demo-importer
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'FLAWLESS_DEMO_IMPORTER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-flawless-demo-importer-activator.php
 */
function activate_flawless_demo_importer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-flawless-demo-importer-activator.php';
	Flawless_Demo_Importer_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-flawless-demo-importer-deactivator.php
 */
function deactivate_flawless_demo_importer() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-flawless-demo-importer-deactivator.php';
	Flawless_Demo_Importer_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_flawless_demo_importer' );
register_deactivation_hook( __FILE__, 'deactivate_flawless_demo_importer' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-flawless-demo-importer.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_flawless_demo_importer() {

	$plugin = new Flawless_Demo_Importer();
	$plugin->run();

}
run_flawless_demo_importer();
