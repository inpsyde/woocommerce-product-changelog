<?php
/**
 * Feature Name: Helper
 * Descriptions: Here are some functions we need for the product changelog
 * Version:      1.0
 * Author:       MarketPress.com
 * Author URI:   http://marketpress.com
 * Licence:      GPLv3
 */

/**
 * Loads the product changelog
 * 
 * @param	int $product_id
 * @return	string
 */
function wcpvd_get_product_changelog( $product_id ) {

	return get_post_meta( $product_id, 'product_changelog', TRUE );
}
