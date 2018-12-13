<?php
/**
 * Plugin Name: Genesis Connect for Woothemes Sensei
 * Plugin URI:  https://www.christophherr.com
 * Description: Plugin wrapper to easily integrate the Automattic Sensei plugin with the Genesis Framework. This plugin will only work with the Genesis Framework and its child themes.
 * Author:      Christoph Herr
 * Author URI:  https://www.christophherr.com
 * Version:     1.2.0
 * Text Domain: genesis-connect-for-woothemes-sensei
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package   GenesisConnectforWoothemesSensei
 * @author    Christoph Herr
 * @version   1.2.0
 * @license   GPL-2.0+
 *
 * Genesis Connect for Woothemes Sensei is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Genesis Connect for Woothemes Sensei is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Genesis Connect for Woothemes Sensei. If not, see <http://www.gnu.org/licenses/>.
 */

// Prevent direct access to the plugin.
if ( ! defined( 'ABSPATH' ) ) {
	wp_die( _e( 'Sorry, you are not allowed to access this page directly.', 'gcfws' ) );
}

add_action( 'plugins_loaded', 'gcfws_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.1
 *
 * @return void
 */
function gcfws_load_textdomain() {
	load_plugin_textdomain( 'genesis-connect-for-woothemes-sensei', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

register_activation_hook( __FILE__, 'gcfws_activation' );
/**
 * This function runs on plugin activation. It checks to make sure the
 * Genesis Framework and Woothemes Sensei are active. If not, it deactivates the plugin.
 *
 * @since 1.0.0
 *
 * @return void
 */
function gcfws_activation() {
	if ( ! function_exists( 'genesis' ) ) {
		// Deactivate.
		deactivate_plugins( plugin_basename( __FILE__ ) );
		add_action( 'admin_notices', 'gcfws_admin_notice_message' );
	}
}

add_action( 'admin_init', 'gcfws_plugin_deactivate' );
add_action( 'switch_theme', 'gcfws_plugin_deactivate' );
/**
 * This function is triggered when the WordPress theme is changed.
 * It checks if the Genesis Framework is active. If not, it deactivates the plugin.
 *
 * @since 1.0.0
 *
 * @return void
 */
function gcfws_plugin_deactivate() {
	if ( ! function_exists( 'genesis' ) ) {
		// Deactivate.
		deactivate_plugins( plugin_basename( __FILE__ ) );
		add_action( 'admin_notices', 'gcfws_admin_notice_message' );
	}
}

/**
 * Error message if you're not using the Genesis Framework.
 *
 * @since 1.0.0
 *
 * @return void
 */
function gcfws_admin_notice_message() {
	$error = sprintf(
		// translators: Link to the StudioPress website.
		__( 'Sorry, you can\'t use the Genesis Connect for Woothemes Sensei Plugin unless the <a href="%s">Genesis Framework</a> is active. The plugin has been deactivated.', 'gcfws' ),
		'https://www.studiopress.com'
	);

	printf( '<div class="error"><p>%s</p></div>', $error );

	if ( isset( $_GET['activate'] ) ) {
		unset( $_GET['activate'] );
	}
}

/**
 * Load the plugin files.
 *
 * @since 1.2.0
 *
 * @return void
 */
function gcfws_autoloader() {
	require 'src/sensei-integration/sensei-integration.php';
	require 'src/site-layout/site-layout.php';
}

gcfws_autoloader();
