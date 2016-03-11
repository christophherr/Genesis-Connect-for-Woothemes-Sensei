<?php
/**
 * Plugin Name: Genesis Connect for Woothemes Sensei
 * Plugin URI: http://www.christophherr.com
 * Description: Plugin wrapper to easily integrate the Woothemes Sensei plugin with the Genesis Framework. This plugin will only work with the Genesis Framework and its child themes.
 * Author:      Christoph Herr
 * Author URI:	http://www.christophherr.com
 * Version:     1.1.0
 * Text Domain: genesis-connect-for-woothemes-sensei
 * Domain Path: /languages
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package   GenesisConnectforWoothemesSensei
 * @author    Christoph Herr
 * @version   1.1.0
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

/**
 * This function runs on plugin activation. It checks to make sure the
 * Genesis Framework and Woothemes Sensei are active. If not, it deactivates the plugin.
 *
 * @since 1.0
 */
function gcfws_activation() {
	if ( ! function_exists( 'genesis' ) ) {
		// Deactivate.
		deactivate_plugins( plugin_basename( __FILE__ ) );
		add_action( 'admin_notices', 'gcfws_admin_notice_message' );
	}
	if ( ! class_exists( ('Sensei_Main' ) || ( 'WooThemes_Sensei' ) ) ) {
		// Deactivate.
		deactivate_plugins( plugin_basename( __FILE__ ) );
		add_action( 'admin_notices', 'gcfws_admin_notice_message_sensei' );
	}
}

register_activation_hook( __FILE__, 'gcfws_activation' );

/**
 * This function is triggered when the WordPress theme is changed.
 * It checks if the Genesis Framework is active. If not, it deactivates the plugin.
 *
 * @since 1.0
 */
function gcfws_plugin_deactivate() {
	if ( ! function_exists( 'genesis' ) ) {
		// Deactivate.
		deactivate_plugins( plugin_basename( __FILE__ ) );
		add_action( 'admin_notices', 'gcfws_admin_notice_message' );
	}
}

add_action( 'admin_init', 'gcfws_plugin_deactivate' );
add_action( 'switch_theme', 'gcfws_plugin_deactivate' );

/**
 * Error message if you're not using the Genesis Framework.
 *
 * @since 1.0
 */
function gcfws_admin_notice_message() {
	$error = sprintf( _e( 'Sorry, you can\'t use the Genesis Connect for Woothemes Sensei Plugin unless the <a href="%s">Geneis Framework</a> is active. The plugin has been deactivated.', 'gcfws' ), 'http://www.studiopress.com' );

	echo '<div class="error"><p>' . $error . '</p></div>';

	if ( isset( $_GET['activate'] ) ) {
		unset( $_GET['activate'] );
	}
}

/**
 * Error message if you're not using Woothemes Sensei.
 *
 * @since 1.1
 */
function gcfws_admin_notice_message_sensei() {
	$error = sprintf( _e( 'Sorry, you can\'t use the Genesis Connect for Woothemes Sensei Plugin unless the <a href="%s">Sensei Plugin</a> is active. The plugin has been deactivated.', 'gcfws' ), 'http://senseilms.com' );

	echo '<div class="error"><p>' . $error . '</p></div>';

	if ( isset( $_GET['activate'] ) ) {
		unset( $_GET['activate'] );
	}
}

/**
 * Load plugin textdomain.
 *
 * @since 1.0.1
 */
function gcfws_load_textdomain() {
	load_plugin_textdomain( 'genesis-connect-for-woothemes-sensei', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );
}

add_action( 'plugins_loaded', 'gcfws_load_textdomain' );

// Sensei Integration.
/**
 * Declare theme support for Sensei
 *
 * @since 1.0
 */
function gcfws_sensei_support() {
		add_theme_support( 'sensei' );
}

add_action( 'after_setup_theme', 'gcfws_sensei_support' );

/**
 * Force content-sidebar layout on Woothemes Sensei Course, Lesson and Question pages.
 * @since 1.1
 */
function gcfws_force_content_sidebar_layout() {
	if ( is_singular( array( 'course', 'lesson', 'question' ) ) ) {
			add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );
	}
}

add_action( 'genesis_meta', 'gcfws_force_content_sidebar_layout' );

/**
 * Remove the default Woothemes Sensei wrappers.
 * Checks which version of Woothemes Sensei is running
 * and removes the wrappers accordingly.
 * @since 1.1
 */
function gcfws_remove_default_sensei_wrappers() {

	if ( Sensei()->version >= '1.9.0' ) {
		remove_action( 'sensei_before_main_content', array( Sensei()->frontend, 'sensei_output_content_wrapper' ), 10 );
		remove_action( 'sensei_after_main_content', array( Sensei()->frontend, 'sensei_output_content_wrapper_end' ), 10 );
		return;
	}
	global $woothemes_sensei;
	remove_action( 'sensei_before_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper' ), 10 );
	remove_action( 'sensei_after_main_content', array( $woothemes_sensei->frontend, 'sensei_output_content_wrapper_end' ), 10 );
}

add_action( 'genesis_meta', 'gcfws_remove_default_sensei_wrappers' );


// Add custom Sensei content wrappers for Genesis.
/**
 * Opening the custom Sensei wrapper
 *
 * @since 1.0
 */
function gcfws_genesis_sensei_wrapper_start() {
		echo '<div class="content-sidebar-wrap"><main class="content" role="main" itemprop="mainContentOfPage">';
}

add_action( 'sensei_before_main_content', 'gcfws_genesis_sensei_wrapper_start', 10 );

/**
 * Closing the custom Sensei wrapper
 *
 * @since 1.0
 */
function gcfws_genesis_sensei_wrapper_end() {
				echo'</main> <!-- end main-->';
				get_sidebar();
				echo'</div> <!-- end .content-sidebar-wrap-->';
}

add_action( 'sensei_after_main_content', 'gcfws_genesis_sensei_wrapper_end', 10 );
