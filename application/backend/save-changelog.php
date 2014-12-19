<?php
/**
 * Feature Name: Save Field
 * Descriptions: These functions are saving the textarea input to the variations
 * Version:      1.0
 * Author:       Inpsyde GmbH for MarketPress
 * Author URI:   http://inpsyde.com
 * Licence:      GPLv3
 */

/**
 * Adds the field to the variations
 * 
 * @param	int $post_id
 * @return	void
 */
function wcpcl_save_changelog( $post_id ) {

	// save data
	if ( isset( $_POST[ 'product-changelog' ] ) )
    	update_post_meta( $post_id, 'product_changelog', $_POST[ 'product-changelog' ] );
    else
    	delete_post_meta( $post_id, 'product_changelog' );
}
