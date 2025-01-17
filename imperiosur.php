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
	    $data = __DIR__ . '/build/block.json';

		register_block_type($plugin, (array) json_decode(stripslashes($data)));
}
add_action( 'init', 'create_block_imperiosur_block_init' );

function registrar_bloque_dinamico() {
    // Ruta al archivo block.json
    $block_path = __DIR__ . '/block.json';

    // Verifica si el archivo block.json existe
    if ( file_exists( $block_path ) ) {
        // Registra el bloque dinámico y asigna la función de renderizado
        register_block_type( $block_path, [
            'render_callback' => 'render_bloque_dinamico', // Aquí se vincula la función
        ]);
    }
}
add_action( 'init', 'registrar_bloque_dinamico' );

