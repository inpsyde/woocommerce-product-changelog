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
 * @wp-hook	woocommerce_product_write_panel_tabs
 * @return	void
 */
function wcpcl_add_tab() {

	?>
	<li class="advanced_tab advanced_options"><a href="#changelog_data"><?php _e( 'Changelog', 'wcpcl' ); ?></a></li>
	<?php
}


/**
 * Shows the product changelog tab
 * 
 * @wp-hook	woocommerce_product_write_panels
 * @return	void
 */
function wcpcl_show_tab_content() {
	global $post;
	
	// get the changelog
	$changelog = get_post_meta( $post->ID, 'product_changelog', TRUE );
	?>
	<div id="changelog_data" class="panel woocommerce_options_panel">
		<div class="options_group custom_tab_options" style="padding: 25px;">
			<?php wp_editor( $changelog, 'product-changelog', array(
				'editor_height' => 350,
				'media_buttons' => FALSE
			) ); ?>
        </div>	
	</div>
	<?php
}
