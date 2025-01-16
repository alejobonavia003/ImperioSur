<?php
/**
 * Renderiza un carrusel de círculos.
 */
function render_circle_carousel_block() {
    // Los títulos de las categorías
    $categories = [
        "ropa informal",
        "ropa formal",
        "calzado dama",
        "calzado caballero",
        "perfumeria",
        "cuidado personal",
        "tecnologia",
        "electrodomesticos",
        "ferreteria"
    ];

    ?>
    <div class="circle-carousel-wrapper">
        <div class="circle-carousel">
            <?php foreach ($categories as $category) : ?>
                <div class="circle-item">
                    <!-- Espacio para las imágenes -->
                    <div class="circle-image"></div>
                    <p class="circle-label"><?php echo ($category); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <style>
        /* Estilos generales del carrusel */
        .circle-carousel-wrapper {
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px;
        }

        .circle-carousel {
            display: flex;
            gap: 10px;
            justify-content: flex-start;
            align-items: center;
        }

        .circle-item {
            display: inline-block;
            text-align: center;
            transition: transform 0.2s ease-in-out;
        }

        .circle-item:hover {
            transform: scale(1.05); /* Animación al pasar el mouse */
        }

        .circle-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #e0e0e0; /* Color gris claro para el fondo */
            display: inline-block;
            margin: 0 auto;
        }

        .circle-label {
            margin-top: 5px;
            font-size: 14px;
            color: #333;
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .circle-image {
                width: 60px;
                height: 60px;
            }

            .circle-label {
                font-size: 12px;
            }
        }
    </style>
    <?php

}
?>

