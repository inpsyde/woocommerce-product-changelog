<?php
/**
 * Feature Name: Add Tab
 * Descriptions: These functions are adding the new tab for the changelog
 * Version:      1.0
 * Author:       Inpsyde GmbH for MarketPress
 * Author URI:   http://inpsyde.com
 * Licence:      GPLv3
 */

/**
 * Adds the tab to the product write panel
 * 
 * @wp-hook	woocommerce_product_tabs
 * @return	void
 */
function wcpcl_frontend_add_tab( $tabs ) {
	global $product;

	// only add changelog if we got one
	$changelog = wcpvd_get_product_changelog( $product->id );
	if ( $changelog == '' )
		return $tabs;

	$tabs[ 'changelog' ] = array(
		'title' 	=> __( 'Changelog', 'wcpcl' ),
		'priority' 	=> 50,
		'callback' 	=> 'wcpcl_frontend_tab_content'
	);
	
	return $tabs;
}

/**
 * Shows the changelog tab content called at
 * wcpcl_frontend_add_tab
 *
 * @return	void
 */
function wcpcl_frontend_tab_content() {
	global $product;

	// get changelog
	$changelog = wcpvd_get_product_changelog( $product->id );

	// do the wordpress stuff with the content
	$changelog = wpautop( $changelog );
	$changelog = apply_filters( 'the_content', $changelog );

	// output
	echo $changelog;
}
