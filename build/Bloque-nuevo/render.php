<?php
/**
 * Renderiza el contenido del nuevo bloque dinámico.
 *
 * @param array $attributes Atributos del bloque.
 * @return string HTML del bloque.
 */
function render_nuevo_bloque( $attributes ) {
    $content = isset( $attributes['content'] ) ? $attributes['content'] : 'Hola desde el nuevo bloque dinámico.';
    return sprintf(
        '<div class="nuevo-bloque">%s</div>',
        esc_html( $content )
    );
}
