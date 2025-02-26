<?php
echo '<style>
.contenedor-tarjeta {
    display: grid;
    gap: 16px;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    justify-items: center;
    max-width: 100% !important;
}
.tarjeta-auto {
    display: flex;
    flex-direction: column;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    background: #fff;
    width: 100%;
    max-width: 300px;
    position: relative;
}
.swiper-container {
    width: 100%;
    height: 200px;
    position: relative;
}
.swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
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
    margin-top: auto;
}
.boton-whatsapp:hover {
    background-color: #128c7e;
}
.swiper-button-next,
.swiper-button-prev {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 30px;
    height: 30px;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 50%;
    color: #000;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
}
.swiper-button-next {
    right: 10px;
}
.swiper-button-prev {
    left: 10px;
}
.swiper-button-next::after,
.swiper-button-prev::after {
    font-size: 16px;
    font-weight: bold;
}
</style>';

// Verificamos si el atributo 'cards' existe y es un array
if (!empty($attributes['cards']) && is_array($attributes['cards'])) {

    // Creamos el contenedor de las tarjetas
    ?>
    <div class="contenedor-tarjeta">
    <?php
    // Iteramos por cada tarjeta
    foreach ($attributes['cards'] as $card) {

        // Sanitizamos cada valor de la tarjeta
        $marca       = esc_html($card['marca'] ?? '');
        $modelo      = esc_html($card['modelo'] ?? '');
        $año         = esc_html($card['año'] ?? '');
        $precio      = esc_html($card['precio'] ?? '');
        $descripcion = esc_html($card['descripcion'] ?? '');
        $whatsapp    = isset($card['whatsapp']) ? preg_replace('/\D/', '', $card['whatsapp']) : '';
        $imagenes    = isset($card['imagenes']) ? $card['imagenes'] : array();

        // Verificamos si existe un mensaje personalizado, de lo contrario usamos un mensaje predeterminado
        if (!empty($card['mensajePersonalizado'])) {
            $mensajeWhatsApp = rawurlencode($card['mensajePersonalizado']);
        } else {
            $mensajeWhatsApp = rawurlencode("Hola, estoy interesado en el vehículo $marca $modelo.");
        }

        $urlWhatsApp = "https://wa.me/$whatsapp?text=$mensajeWhatsApp";
        ?>
        <div class="tarjeta-auto">
            <?php if (!empty($imagenes)) : ?>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($imagenes as $imagen) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url($imagen); ?>" alt="Auto" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            <?php endif; ?>
            <h3><?php echo "$marca $modelo ($año)"; ?></h3>
            <p><?php echo $descripcion; ?></p>
            <p><strong>Vendedor:</strong> <?php echo $precio; ?></p>
            <a href="<?php echo $urlWhatsApp; ?>" target="_blank" rel="noopener noreferrer" class="boton-whatsapp">
                Contactar por WhatsApp
            </a>
        </div>
        <?php
    }
    ?>
    </div>
    <?php

} else {
    echo '<p>No hay tarjetas disponibles.</p>';
}
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Inicializar Swiper en cada contenedor
    document.querySelectorAll('.swiper-container').forEach(function (container) {
        new Swiper(container, {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
});
</script>
