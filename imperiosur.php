<?php
/**
 * Plugin Name:       Imperiosur
 * Description:       Example block scaffolded with Create Block tool.
 * Version:           6.1.0
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
    register_block_type( __DIR__ . '/build/copyrigth' );
    register_block_type( __DIR__ . '/build/ofertas' );
    register_block_type( __DIR__ . '/build/banner' );
    register_block_type( __DIR__ . '/build/tiendasOficiales' );
    register_block_type( __DIR__ . '/build/servicios' );
    register_block_type( __DIR__ . '/build/veiculos' );
    register_block_type( __DIR__ . '/build/veiculosPromocion' );

	    // Registrar el nuevo bloque
	    $plugin = __DIR__ . '/build/Bloque-nuevo';
	    $data = __DIR__ . '/block.json';

		register_block_type($plugin, (array) json_decode(stripslashes($data)));
        
}
add_action( 'init', 'create_block_imperiosur_block_init' );

/**
 * Enqueue block styles for front-end.
 */
function enqueue_block_styles() {
    wp_enqueue_style(
        'bloque-nuevo-style',
        plugins_url('build/Bloque-nuevo/style-index.css', __FILE__),
        array(),
        filemtime(plugin_dir_path(__FILE__) . 'build/Bloque-nuevo/style-index.css')
    );
}
add_action('wp_enqueue_scripts', 'enqueue_block_styles');


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


function agregar_swiper() {
    // Swiper CSS
    wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');

    // Swiper JS
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'agregar_swiper');


// En mi-plugin.php (o el archivo principal de tu plugin)

// Hook para usuarios autenticados y no autenticados
add_action('wp_ajax_guardar_formulario', 'guardar_formulario');
add_action('wp_ajax_nopriv_guardar_formulario', 'guardar_formulario');

function guardar_formulario() {
    global $wpdb;
    $tabla = $wpdb->prefix . 'contactos_tarjetas';
    $nombre = sanitize_text_field($_POST['nombre']);
    $dni = sanitize_text_field($_POST['dni']);
    $direccion = sanitize_text_field($_POST['direccion']);
    $contacto = sanitize_text_field($_POST['contacto']);
    $tarjeta_id = sanitize_text_field($_POST['tarjeta_id']);
    
    $wpdb->insert($tabla, array(
         'nombre' => $nombre,
         'dni' => $dni,
         'direccion' => $direccion,
         'contacto' => $contacto,
         'tarjeta_id' => $tarjeta_id
    ));
    wp_die();
}




