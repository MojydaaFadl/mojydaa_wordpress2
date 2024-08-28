<?php
/*
  Plugin Name:       WPElemento Importer
  Plugin URI:
  Description:       Effortlessly set up WordPress themes with WPelemento Importer. One-click demo imports, Elementor compatibility, and support for diverse themes.
  Version:           0.5.4
  Requires at least: 5.2
  Requires PHP:      7.2
  Author:            wpelemento
  Author URI:        https://www.wpelemento.com/
  License:           GPL v2 or later
  License URI:       https://www.gnu.org/licenses/gpl-2.0.html
  Text Domain:       wpelemento-importer
*/

register_activation_hook(__FILE__, 'wpelemento_importer_activate');
add_action('admin_init', 'wpelemento_importer_redirect');
error_reporting(E_ALL);
ini_set('display_errors', '1');

function wpelemento_importer_activate() {
  add_option('wpelemento_importer_do_activation_redirect', true);
}
function wpelemento_importer_redirect() {
  if (get_option('wpelemento_importer_do_activation_redirect', false)) {
    delete_option('wpelemento_importer_do_activation_redirect');
    wp_redirect("admin.php?page=wpelementoimporter-wizard");
    exit;
  }
}

define( 'EDI_FILE', __FILE__ );
define( 'EDI_BASE', plugin_basename( EDI_FILE ) );
define( 'EDI_DIR', plugin_dir_path( EDI_FILE ) );
define( 'EDI_URL', plugins_url( '/', EDI_FILE ) );
define( 'WPELEMENTO_IMPORTER_TEXT_DOMAIN', "wpelemento-importer" );

define( 'WPELEMENTO_MAIN_URL', "https://preview.wpelemento.com/" );
define( 'WPEI_THEME_LICENCE_ENDPOINT', 'https://preview.wpelemento.com/old_website/wp-json/ibtana-licence/v2/' );
define( 'WPEI_SHOPIFY_LICENCE_ENDPOINT', 'https://license.wpelemento.com/api/public/' );

if( ! function_exists('get_plugin_data') ) {
  require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
require EDI_DIR .'theme-wizard/config.php';
require EDI_DIR .'classes/bdi-notice.php';
require EDI_DIR .'classes/upsell-notice.php';
require EDI_DIR .'modal/modal.php';
