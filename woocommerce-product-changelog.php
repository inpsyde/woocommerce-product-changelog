<?php
/**
 * Plugin Name: WooCommerce Product Changelog
 * Description: This plugin provides a new product tab called changelog
 * Version:     1.0
 * Author:      Inpsyde GmbH for MarketPress
 * Author URI:  http://inpsyde.com
 * Licence:     GPLv3
 */

// check wp
if ( ! function_exists( 'add_action' ) )
	return;

/**
 * Inits the plugins, loads all the files
 * and registers all actions and filters
 *
 * @wp-hook	plugins_loaded
 * @return	void
 */
function wcpcl_init() {

	// localization
	load_plugin_textdomain( 'wcpcl', FALSE, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	// set the directory
	$application_directory = dirname( __FILE__ );

	// include the helpers
	require_once( $application_directory . '/application/helper.php' );

	// frontend stuff
	if ( ! is_admin() ) {
		// adds the fied to the variations
		require_once( $application_directory . '/application/frontend/add-tab.php' );
		add_action( 'woocommerce_product_tabs', 'wcpcl_frontend_add_tab' );
	}

	// we only need this plugin in the backend
	// the frontend will be displayed by the theme
	// so we return, if we are not in the admin area
	if ( ! is_admin() )
		return;

	// adds the fied to the variations
	require_once( $application_directory . '/application/backend/add-tab.php' );
	add_action( 'woocommerce_product_write_panel_tabs', 'wcpcl_add_tab' );
	add_action( 'woocommerce_product_write_panels', 'wcpcl_show_tab_content' );

	// saves the field inputs
	require_once( $application_directory . '/application/backend/save-changelog.php' );
	add_action( 'woocommerce_process_product_meta', 'wcpcl_save_changelog' );
} add_action( 'plugins_loaded', 'wcpcl_init' );
