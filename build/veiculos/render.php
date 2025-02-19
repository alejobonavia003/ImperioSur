<?php

echo '<style>
.tarjeta-auto {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    background: #fff;
    max-width: 300px;
    margin: 16px;
    display: inline-block;
    vertical-align: top;
}
.tarjeta-auto img {
    width: 100%;
    height: auto;
}
.tarjeta-auto h3 {
    margin: 16px;
    font-size: 1.5em;
}
.tarjeta-auto p {
    margin: 8px 16px;
    font-size: 1em;
    color: #555;
}
.boton-whatsapp {
    display: block;
    margin: 16px;
    padding: 10px 16px;
    background-color: #25d366;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    font-size: 1em;
}
.boton-whatsapp:hover {
    background-color: #128c7e;
}
</style>';

// Verificamos si el atributo 'cards' existe y es un array
if ( ! empty( $attributes['cards'] ) && is_array( $attributes['cards'] ) ) {

    // Iteramos por cada tarjeta
    foreach ( $attributes['cards'] as $card ) {

        // Sanitizamos cada valor de la tarjeta
        $marca       = esc_html( $card['marca'] ?? '' );
        $modelo      = esc_html( $card['modelo'] ?? '' );
        $año         = esc_html( $card['año'] ?? '' );
        $precio      = esc_html( $card['precio'] ?? '' );
        $descripcion = esc_html( $card['descripcion'] ?? '' );
        $whatsapp    = isset( $card['whatsapp'] ) ? preg_replace( '/\D/', '', $card['whatsapp'] ) : '';
        $imagen      = esc_url( $card['imagen'] ?? '' );

        // Creamos el mensaje predefinido para WhatsApp
        $mensajeWhatsApp = rawurlencode( "Hola, estoy interesado en el auto $marca $modelo." );
        $urlWhatsApp     = "https://wa.me/$whatsapp?text=$mensajeWhatsApp";

        // Renderizamos la tarjeta
        ?>
        <div class="tarjeta-auto">
            <?php if ( ! empty( $imagen ) ) : ?>
                <img src="<?php echo $imagen; ?>" alt="Auto" />
            <?php endif; ?>
            <h3><?php echo "$marca $modelo ($año)"; ?></h3>
            <p><?php echo $descripcion; ?></p>
            <p><strong>Precio:</strong> <?php echo $precio; ?></p>
            <a href="<?php echo $urlWhatsApp; ?>" target="_blank" rel="noopener noreferrer" class="boton-whatsapp">
                Contactar por WhatsApp
            </a>
        </div>
        <?php
    }
} else {
    // Opcional: mensaje en caso de que no haya tarjetas configuradas.
    echo '<p>No hay tarjetas disponibles.</p>';
}
