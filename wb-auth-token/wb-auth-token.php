<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           WB_Auth_Token
 *
 * @wordpress-plugin
 * Plugin Name:       WorldBrain Auth Token
 * Plugin URI:        https://github.com/WorldBrain/WP-Auth-Token-Plugin
 * Description:       Token generation for integrated auth across multiple systems.
 * Version:           1.0.0
 * Author:            WorldBrain
 * Author URI:        https://worldbrain.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wb-auth-token
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
define( 'WB_AUTH_TOKEN_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wb-auth-token-activator.php
 */
function activate_wb_auth_token() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wb-auth-token-activator.php';
	WB_Auth_Token_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wb-auth-token-deactivator.php
 */
function deactivate_wb_auth_token() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wb-auth-token-deactivator.php';
	WB_Auth_Token_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wb_auth_token' );
register_deactivation_hook( __FILE__, 'deactivate_wb_auth_token' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wb-auth-token.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wb_auth_token() {

	$plugin = new WB_Auth_Token();
	$plugin->run();

}
run_wb_auth_token();
