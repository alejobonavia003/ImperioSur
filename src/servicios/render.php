<?php
/**
 * Renderizado dinámico del bloque "Servicios".
 */

// Agregar estilos en línea para el bloque
echo '<style>
    /* Contenedor principal: usamos grid para repartir las tarjetas en columnas responsivas */
    .servicios-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        margin: 0 auto;
        max-width: 1200px; /* Ajusta según tu preferencia */
        padding: 20px;
        box-sizing: border-box;
    }

    /* Tarjeta individual: se comporta como un contenedor flexible en columna */
    .servicio-card {
        display: flex;
        flex-direction: column;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: center;
        transition: transform 0.2s ease;
    }

    /* Pequeño efecto hover */
    .servicio-card:hover {
        transform: translateY(-2px);
    }

    /* Imagen siempre arriba, ocupando todo el ancho */
    .servicio-imagen {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    /* Contenido textual, que crece para empujar el botón al fondo */
    .servicio-content {
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Deja el botón al final */
        flex: 1;                       /* Ocupará el espacio vertical sobrante */
        padding: 15px;
        box-sizing: border-box;
    }

    .servicio-titulo {
        font-size: 18px;
        font-weight: bold;
        margin: 10px 0;
    }

    .servicio-prestador {
        font-size: 14px;
        color: #777;
        margin: 0;
    }

    .servicio-descripcion {
        font-size: 14px;
        margin: 5px 0;
    }

    /* Botón de WhatsApp */
    .servicio-whatsapp {
        display: inline-block;
        background-color: #25D366;
        color: #fff;
        text-align: center;
        padding: 8px 16px;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }
    .servicio-whatsapp:hover {
        background-color: #20b858;
    }
</style>';

// Obtener atributos del bloque (evita error si no existen atributos)
$servicios = $block->attributes['servicios'] ?? [];
?>

<div <?php echo get_block_wrapper_attributes(); ?>>
    <div class="servicios-container">
        <?php foreach ($servicios as $servicio) : ?>
            <div class="servicio-card">
                <?php if (!empty($servicio['imagen'])) : ?>
                    <img 
                        src="<?php echo esc_url($servicio['imagen']); ?>" 
                        alt="<?php echo esc_attr($servicio['titulo']); ?>" 
                        class="servicio-imagen" 
                    />
                <?php endif; ?>

                <div class="servicio-content">
                    <div>
                        <h3 class="servicio-titulo">
                            <?php echo esc_html($servicio['titulo']); ?>
                        </h3>
                        <p class="servicio-prestador">
                            Por: <?php echo esc_html($servicio['prestador']); ?>
                        </p>
                        <p class="servicio-descripcion">
                            <?php echo esc_html($servicio['descripcion']); ?>
                        </p>
                    </div>

                    <?php if (!empty($servicio['whatsapp'])) : ?>
                        <a 
                            href="https://wa.me/<?php echo esc_attr($servicio['whatsapp']); ?>" 
                            class="servicio-whatsapp" 
                            target="_blank" 
                            rel="noopener noreferrer"
                        >
                            Contactar por WhatsApp
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
