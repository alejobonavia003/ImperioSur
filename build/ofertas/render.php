<?php
$title = isset($attributes['title']) ? esc_html($attributes['title']) : '';
$shortcode_content = isset($attributes['shortcode']) ? do_shortcode($attributes['shortcode']) : '';
?>


<div class="product-shortcode-block">
    <h4 class="product-block-title" style="text-align: center"> <?php echo $title ?> </h4>
    <div class="product-block-content" style="width: 100%">
        <?php
        // Usar DOMDocument para manipular el contenido del shortcode
        $dom = new DOMDocument();
        // Prevenir errores de HTML mal formado (algunos shortcodes pueden generarlos)
        @$dom->loadHTML('<?xml encoding="utf-8" ?>' . $shortcode_content);

        // Buscar los elementos UL (contenedor de productos)
        $containers = $dom->getElementsByTagName('ul');

        foreach ($containers as $index => $container) {
            // Eliminar el atributo "class" del contenedor principal
            if ($container->hasAttribute('class')) {
                $container->removeAttribute('class');
            }

            // Asignar una nueva clase única al contenedor principal
            $newContainerClass = 'custom-container-' . $index;
            $container->setAttribute('class', $newContainerClass);

            // Obtener todos los elementos LI (productos) dentro de cada UL
            $products = $container->getElementsByTagName('li');

            foreach ($products as $productIndex => $product) {
                // Eliminar el atributo "class" de cada producto
                if ($product->hasAttribute('class')) {
                    $product->removeAttribute('class');
                }

                // Asignar una nueva clase única a cada producto
                $newProductClass = 'custom-product-' . $index . '-' . $productIndex;
                $product->setAttribute('class', $newProductClass);
            }
        }


        echo $dom->saveHTML();

        ?>
    </div>
</div>






<style>

[data-products] {
  display: flex!important;
  overflow: auto!important;
}

custom-container {
  width: 100%;
}

.product-shortcode-block {
     width: 100%; /* Ancho completo del bloque */
    overflow: hidden; /* Evitar el desbordamiento */
    border: 1px solid #ccc;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
}

.woocommerce {
  width: 100%;
}

.woocommerce  ul {
  width: 100%;
  justify-content: center;
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
