<?php
/**
 * Sets the Layout for the Sensei CPT posts and adds Genesis Layout options to the Sensei CPTs and Taxonomy.
 *
 * @package     GenesisConnectforWoothemesSensei
 * @since       1.2.0
 * @author      Christoph Herr
 * @link        https://www.christophherr.com
 * @license     GNU General Public License 2.0+
 */

add_action( 'genesis_meta', 'gcfws_force_content_sidebar_layout_on_cpt_posts' );
/**
 * Force content-sidebar layout on Sensei Course, Lesson and Question posts.
 *
 * @since 1.2.0
 *
 * @return void
 */
function gcfws_force_content_sidebar_layout_on_cpt_posts() {

	if ( ! is_singular( array( 'course', 'lesson', 'question' ) ) ) {
		return;
	}
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_content_sidebar' );
}


add_action( 'genesis_setup', 'gcfws_add_genesis_layout_to_sensei_cpts' );
/**
 * Add the Genesis Layout options to single CPT posts and Genesis CPT archive Settings to the CPT archives.
 *
 * @since 1.2.0
 *
 * @return void
 */
function gcfws_add_genesis_layout_to_sensei_cpts() {
	add_post_type_support( 'course', array( 'genesis-layouts', 'genesis-cpt-archives-settings' ) );
	add_post_type_support( 'lesson', array( 'genesis-layouts', 'genesis-cpt-archives-settings' ) );
	add_post_type_support( 'question', array( 'genesis-layouts', 'genesis-cpt-archives-settings' ) );
}
