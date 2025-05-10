<?php
echo '<style>
/* Estilos simplificados */
.contenedor-unificado {
    max-width: 1200px;
    margin: 30px auto;
    padding: 30px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.seccion-ver-mas {
    text-align: center;
    margin-bottom: 40px;
}

.titulo-ver-mas {
    color: #2c3e50;
    font-size: 1.8em;
    margin-bottom: 25px;
    font-weight: 600;
}

.boton-ver-mas {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 14px 35px;
    background: #007BFF;
    color: white !important;
    border-radius: 30px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    box-shadow: 0 4px 15px rgba(0,123,255,0.25);
}

.boton-ver-mas:hover {
    background: #0056b3;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,123,255,0.35);
}

.promocion-autos-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    padding-bottom: 20px;
}

.tarjeta-simple {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
}

.tarjeta-simple:hover {
    transform: translateY(-5px);
}

.imagen-vehiculo {
    height: 200px;
    background: #f8f9fa;
}

.imagen-vehiculo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.contenido-tarjeta {
    padding: 20px;
    position: relative;
}

.precio-promo {
    color: #007BFF;
    font-size: 1.4em;
    font-weight: 700;
    margin: 10px 0;
}

.detalles-vehiculo p {
    color: #6c757d;
    margin: 8px 0;
}

.boton-whatsapp {
    display: block;
    padding: 12px;
    background: rgb(65, 211, 101);
    color: white !important;
    text-align: center;
    text-decoration: none;
    border-radius: 8px;
    margin: 15px;
    font-weight: 600;
    transition: background 0.3s ease;
}

.boton-whatsapp:hover {
    background: #3aa76d;
}

@media (max-width: 768px) {
    .contenedor-unificado {
        padding: 20px;
        margin: 15px;
    }
    
    .imagen-vehiculo {
        height: 180px;
    }
    
    .promocion-autos-container {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        gap: 15px;
    }
    
    .tarjeta-simple {
        /* min-width: 85vw; */
        scroll-snap-align: start;
        flex-shrink: 0;
        max-width: 250px;
    }
    
    /* Ocultar scrollbar */
    .promocion-autos-container::-webkit-scrollbar {
        display: none;
    }
    
    .promocion-autos-container {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
}

@supports (scroll-behavior: smooth) {
    .promocion-autos-container {
        scroll-behavior: smooth;
    }
}
</style>';

echo '<div class="contenedor-unificado">';

// Sección "Ver más"
echo '<div class="seccion-ver-mas">';
echo '<h2 class="titulo-ver-mas">Conoce nuestra sección de vehículos</h2>';
echo '<a href="https://imperiosur.com/tienda/?categoria=vehiculos" class="boton-ver-mas">';
echo '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0l-1.41 1.41L16.17 7H4v2h12.17l-5.58 5.59L12 15l8-8-8-8z"/></svg>';
echo 'Ver Todos los Vehículos';
echo '</a>';
echo '</div>';

if (!empty($attributes['cards']) && is_array($attributes['cards'])) {
    echo '<div class="promocion-autos-container">';

    foreach ($attributes['cards'] as $card) {
        $marca = esc_html($card['marca'] ?? '');
        $modelo = esc_html($card['modelo'] ?? '');
        $año = esc_html($card['año'] ?? '');
        $precio = esc_html($card['precio'] ?? '');
        $descripcion = esc_html($card['descripcion'] ?? '');
        $whatsapp =  esc_html($card['whatsapp'] ?? '');
        $imagenes = $card['imagenes'] ?? [];
        
        $mensaje = !empty($card['mensajePersonalizado']) ? 
            rawurlencode($card['mensajePersonalizado']) : 
            rawurlencode("¡Hola! Estoy interesado en el $marca $modelo");

        echo '<div class="tarjeta-simple">';
        
        // Imagen principal
        if (!empty($imagenes)) {
            echo '<div class="imagen-vehiculo">';
            echo '<img src="' . esc_url($imagenes[0]) . '" alt="' . $marca . ' ' . $modelo . '">';
            echo '</div>';
        }
        
        // Contenido
        echo '<div class="contenido-tarjeta">';
        echo '<div class="precio-promo">' . $precio . '</div>';
        echo '<div class="detalles-vehiculo">';
        echo '<p><strong>' . $marca . ' ' . $modelo . '</strong></p>';
        echo '<p>Año: ' . $año . '</p>';
        
        if (!empty($descripcion)) {
            echo '<p>' . $descripcion . '</p>';
        }
    

        
        echo '</div></div>';

        if (!empty($whatsapp)) {
            echo '<a href="' . $whatsapp . '" 
                     class="boton-whatsapp" 
                     target="_blank" 
                     rel="noopener noreferrer">';
            echo 'Contactar por WhatsApp';
            echo '</a>';
        }
        echo '</div>';
    }
    
    echo '</div>'; // Cierra promocion-autos-container
} else {
    echo '<p class="sin-promociones">No hay vehículos en promoción actualmente</p>';
}

echo '</div>'; // Cierra contenedor-unificado
?>