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
    cursor: pointer;
    border: none;
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
/* Estilos para el formulario emergente */
.fondo-oscuro {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
}
.formulario-emergente {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    z-index: 1000;
    width: 300px;
    border-radius: 8px;
}
</style>';

// Verificamos si el atributo \'cards\' existe y es un array
if (!empty($attributes['cards']) && is_array($attributes['cards'])) {

    // Creamos el contenedor de las tarjetas
    ?>
    <div class="contenedor-tarjeta">
    <?php
    // Iteramos por cada tarjeta (usamos el índice para identificar la tarjeta)
    foreach ($attributes['cards'] as $index => $card) {

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
            <!-- Botón modificado: ahora incluye data-whatsapp y data-tarjeta -->
            <button class="boton-whatsapp" data-whatsapp="<?php echo $urlWhatsApp; ?>" data-tarjeta="<?php echo $index; ?>" onclick="mostrarFormulario(this)">Contactar por WhatsApp</button>
        </div>
        <?php
    }
    ?>
    </div>
    <?php

    // Agregamos el formulario emergente con un campo oculto para la tarjeta
    ?>
    <div class="fondo-oscuro" id="fondo-oscuro" onclick="cerrarFormulario()"></div>
    <div class="formulario-emergente" id="formulario">
        <h3>Completa tus datos</h3>
        <form id="formulario-contacto">
            <input type="hidden" name="tarjeta_id" id="tarjeta-id" value="">
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
            <label>DNI:</label>
            <input type="text" name="dni" required>
            <label>Dirección:</label>
            <input type="text" name="direccion" required>
            <label>Contacto:</label>
            <input type="text" name="contacto" required>
            <button type="submit">Contactar</button>
        </form>
        <button onclick="cerrarFormulario()">Cerrar</button>
    </div>
    <script>
    var whatsappLink = '';

    function mostrarFormulario(element) {
        // Guarda el enlace de WhatsApp y la tarjeta seleccionada
        whatsappLink = element.getAttribute('data-whatsapp');
        var tarjetaId = element.getAttribute('data-tarjeta');
        document.getElementById('tarjeta-id').value = tarjetaId;
        document.getElementById('formulario').style.display = 'block';
        document.getElementById('fondo-oscuro').style.display = 'block';
    }
    function cerrarFormulario() {
        document.getElementById('formulario').style.display = 'none';
        document.getElementById('fondo-oscuro').style.display = 'none';
    }
    document.getElementById('formulario-contacto').addEventListener('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        // Agregamos la acción para que se procese en admin-ajax.php
        formData.append('action', 'guardar_formulario');
        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(response => {
            // Una vez guardados los datos, redirigimos a WhatsApp
            window.open(whatsappLink, '_blank');
            cerrarFormulario();
        })
        .catch(error => console.error('Error:', error));
    });
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
    <?php
} else {
    echo '<p>No hay tarjetas disponibles.</p>';
}

?>
