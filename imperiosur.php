<?php
/**
 * Plugin Name:       Imperiosur
 * Description:       Example block scaffolded with Create Block tool.
 * Version:           0.1.0
 * Requires at least: 6.7
 * Requires PHP:      7.4
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       imperiosur
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function create_block_imperiosur_block_init() {
	register_block_type( __DIR__ . '/build/imperiosur' );

	    // Registrar el nuevo bloque
	    $plugin = __DIR__ . '/build/Bloque-nuevo';
	    $json_file = __DIR__ . '/build/block.json';
	    $jsonchanel = file_get_contents($json_file);
	    $chanelPHP = json_decode($jsonchanel, true);
		register_block_type($plugin);
}
add_action( 'init', 'create_block_imperiosur_block_init' );

add_action( 'init', function() {
    $block_path = __DIR__ . '/build/Bloque-nuevo/block.json';

    if ( file_exists( $block_path ) ) {
        register_block_type( $block_path, [
            'render_callback' => 'render_bloque_dinamico'
        ]);
    }
});
