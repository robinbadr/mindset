<?php


/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function mindset_blocks_mindset_blocks_block_init() {
	register_block_type( __DIR__ . '/build/copyright' );
	register_block_type( __DIR__ . '/build/company-address' );
	register_block_type( __DIR__ . '/build/company-email' );
	register_block_type( __DIR__ . '/build/service-posts', array( 'render_callback' => 'fwd_render_service_posts' ) );
	
}
add_action( 'init', 'mindset_blocks_mindset_blocks_block_init' );

function mindset_register_custom_fields() {
	register_post_meta(
		'page',
		'company_email',
		array(
			'type'         => 'string',
			'show_in_rest' => true,
			'single'       => true
		)
	);
	register_post_meta(
		'page',
		'company_address',
		array(
			'type'         => 'string',
			'show_in_rest' => true,
			'single'       => true
		)
	);
}
add_action( 'init', 'mindset_register_custom_fields' );