<?php
$title = isset($attributes['title']) ? esc_html($attributes['title']) : '';
$shortcode_content = isset($attributes['shortcode']) ? do_shortcode($attributes['shortcode']) : '';
?>

<div class="product-shortcode-block">
    <h3 class="product-block-title" style="text-align: center"> <?php echo $title ?> </h3>
    <div class="product-block-content">
        <?php
        // Usar DOMDocument para manipular el contenido del shortcode
        $dom = new DOMDocument();
        // Prevenir errores de HTML mal formado (algunos shortcodes pueden generarlos)
        @$dom->loadHTML('<?xml encoding="utf-8" ?>' . $shortcode_content);

        // Buscar los elementos específicos generados por el shortcode
        $cards = $dom->getElementsByTagName('ul'); // Cambiar a la etiqueta que representa las tarjetas
        foreach ($cards as $card) {
            // Filtrar solo las tarjetas si tienen una clase específica
            if ($card->hasAttribute('class') && strpos($card->getAttribute('class'), 'default-card-class') !== false) {
                // Modificar las clases de las tarjetas
                $card->setAttribute('class', $card->getAttribute('class') . ' custom-card-class');
            }
        }

        // Agregar un contenedor personalizado si lo necesitas
        echo '<div class="custom-cards-container">';
        echo $dom->saveHTML();
        echo '</div>';
        ?>
    </div>
</div>



<div class="product-shortcode-block">
    <h3 class="product-block-title" style="text-align: center"> <?php echo $title ?> </h3>
    <div class="product-block-content">
        <?php
        // Usar DOMDocument para manipular el contenido del shortcode
        $dom = new DOMDocument();
        // Prevenir errores de HTML mal formado (algunos shortcodes pueden generarlos)
        @$dom->loadHTML('<?xml encoding="utf-8" ?>' . $shortcode_content);


        // Buscar los elementos específicos generados por el shortcode
        $cards = $dom->getElementsByTagName('ul'); // Cambiar a la etiqueta que representa las tarjetas
        $output = ''; // Variable para almacenar una sola tarjeta

        echo $cards;

        foreach ($cards as $card) {
            // Filtrar solo las tarjetas si tienen una clase específica
            if ($card->hasAttribute('class') && strpos($card->getAttribute('class'), 'default-card-class') !== false) {
                // Modificar las clases de la tarjeta (opcional)
                $card->setAttribute('class', $card->getAttribute('class') . ' custom-card-class');
                
                // Guardar el HTML de esta tarjeta
                $output = $dom->saveHTML($card);
                break; // Salir del bucle después de encontrar la primera tarjeta
            }
        }

        // Imprimir la tarjeta seleccionada

        ?>
    </div>
</div>

<style>

.product-shortcode-block {
        width: 100%; /* Ancho completo del bloque */
    overflow: hidden; /* Evitar el desbordamiento */
    border: 1px solid #ccc;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
}



.product-block-content {
    display: inline-flex; /* Usar flexbox para alinear los productos */
    flex-wrap: nowrap; /* Permitir que los productos se envuelvan */
    justify-content: center; /* Centrar los productos */
}
.products {
  display: flex!important;
    gap: 10px; /* Espaciado entre tarjetas */
    overflow-x: auto!important; /* Permite desplazamiento horizontal */
    padding: 10px;
}

.products li {
    flex: 1 1 200px; /* Permitir que los productos se ajusten y tengan un ancho mínimo */
    margin: 10px; /* Espaciado entre productos */
    box-sizing: border-box; /* Incluir el padding y el borde en el ancho total */
}

.product {
  border: 1px solid #ddd;
  border-radius: 8px;
  overflow: hidden;
  background: #fff;
  transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.product:hover {
  transform: scale(1.03);
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
}

.product figure {
  margin: 0;
  position: relative;
}

.product img {
  width: 100%;
  height: auto;
  display: block;
  object-fit: cover;
}

.onsale {
  position: absolute;
  top: 8px;
  left: 8px;
  background: #ff4d4d;
  color: #fff;
  padding: 4px 8px;
  font-size: 12px;
  border-radius: 4px;
  z-index: 1;
}

.woocommerce-loop-product__title {
  font-size: 16px;
  font-weight: bold;
  text-align: center;
  margin: 12px 0 8px;
  padding: 0 8px;
}

.woocommerce-loop-product__title a {
  color: #333;
  text-decoration: none;
}

.woocommerce-loop-product__title a:hover {
  color: #0073aa;
}

.meta-categories {
  text-align: center;
  font-size: 14px;
  color: #777;
}

.price {
  text-align: center;
  font-size: 16px;
  font-weight: bold;
  color: #444;
  margin: 8px 0;
}

.sale-price del {
  color: #999;
  margin-right: 8px;
}

.ct-woo-card-actions {
  text-align: center;
  margin: 12px 0;
}

.ct-woo-card-actions .button {
  background: #0073aa;
  color: #fff;
  padding: 8px 16px;
  font-size: 14px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  text-decoration: none;
}

.ct-woo-card-actions .button:hover {
  background: #005a87;
}



</style>
<?php
// TESTS -------------------------------------
// Supongamos que $attributes contiene el JSON que mostraste
//$images = $attributes['images']; // Accedemos al array de imágenes

// Inicializamos variables para guardar las URLs
//$url1 = isset($attributes['images'][0]['url']) ? $attributes['images'][0]['url'] : null;
//$alt1 = isset($attributes['images'][0]['alt']) ? $attributes['images'][0]['alt'] : null;
//$length = count($images);

//echo "<script>console.log('Mensaje: " . ($attributes['images'][0]['url'] ? $attributes['images'][0]['url'] : null) . "');</script>";
//echo "<script>console.log('Mensaje: " . ($attributes['images'][0]['alt'] ? $attributes['images'][0]['alt'] : null) . "');</script>";
//echo "<script>console.log('Mensaje: " . ($attributes['images'][0]['link'] ? $attributes['images'][0]['link'] : null) . "');</script>";
//echo "<script>console.log('Mensaje: " . json_encode($attributes['images'][0]['link']) . "');</script>";
//echo "<script>console.log('Mensaje: " . count($attributes['images']) . "');</script>";
//echo "<script>console.log('Mensaje:', " . json_encode($attributes) . ");</script>";



?>
