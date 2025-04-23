<?php
/**
 * Renderizado dinámico del bloque "Servicios".
 */

// Agregar estilos en línea para el bloque
echo '<style>
    /* Contenedor principal: grid con 2 columnas fijas */
    .servicios-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);  /* <-- aquí forzamos 2 columnas */
        gap: 20px;
        margin: 0 auto;
        max-width: 1200px;
        padding: 20px;
        box-sizing: border-box;
    }

    /* Opcional: en móviles mostramos solo 1 columna */
    @media (max-width: 600px) {
        .servicios-container {
            grid-template-columns: 1fr;
        }
    }

    /* Tarjeta individual */
    .servicio-card {
        display: flex;
        flex-direction: row;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        text-align: center;
        transition: transform 0.2s ease;
        flex-wrap: wrap;
    }

    .servicio-card:hover {
        transform: translateY(-2px);
    }

    .servicio-imagen {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .servicio-content {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        flex: 1;
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
        <?php foreach ($servicios as $servicio) :
            // Preparar datos de cada servicio
            $titulo      = ! empty($servicio['titulo']) ? esc_html($servicio['titulo']) : '';
            $prestador   = ! empty($servicio['prestador']) ? esc_html($servicio['prestador']) : '';
            $descripcion = ! empty($servicio['descripcion']) ? esc_html($servicio['descripcion']) : '';
            $imagen      = ! empty($servicio['imagen']) ? esc_url($servicio['imagen']) : '';
            $whatsapp    = ! empty($servicio['whatsapp']) ? esc_attr($servicio['whatsapp']) : '';
            $mensaje     = ! empty($servicio['mensaje']) ? urlencode($servicio['mensaje']) : '';
        ?>
            <div class="servicio-card">
                <?php if ($imagen) : ?>
                    <img 
                        src="<?php echo $imagen; ?>" 
                        alt="<?php echo $titulo; ?>" 
                        class="servicio-imagen" 
                    />
                <?php endif; ?>

                <div class="servicio-content">
                    <div>
                        <h3 class="servicio-titulo"><?php echo $titulo; ?></h3>
                        <p class="servicio-prestador">Por: <?php echo $prestador; ?></p>
                        <p class="servicio-descripcion"><?php echo $descripcion; ?></p>
                    </div>

                    <?php if ($whatsapp) : ?>
                        <a 
                            href="https://wa.me/<?php echo $whatsapp; ?><?php echo $mensaje ? '?text=' . $mensaje : ''; ?>"
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
