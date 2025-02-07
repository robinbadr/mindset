<?php
/**
* Plugin Name:       ACF Blocks
* Plugin URI:        https://wp.bcitwebdeveloper.ca/
* Description:       Adds custom block types using the Advanced Custom Fields Pro plugin.
* Version:           1.0.0
* Requires at least: 6.5
* Requires PHP:      7.0
* Author:            FWD
* Author URI:        https://wp.bcitwebdeveloper.ca/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        false
*
* @package acf-blocks
*/

/**
* Register our ACF custom blocks.
*
* @link https://developer.wordpress.org/reference/functions/register_block_type/
*/
function fwd_register_acf_blocks() {
    // Accordion block
    register_block_type( __DIR__ . '/accordion' );
}
add_action( 'init', 'fwd_register_acf_blocks' );