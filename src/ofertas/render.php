<?php
$title = isset($attributes['title']) ? esc_html($attributes['title']) : '';
$shortcode_content = isset($attributes['shortcode']) ? do_shortcode($attributes['shortcode']) : '';
?>



<style>



/* Contenedor principal de los productos */
.product-block-content {
  display: flex;
  overflow-x: auto; /* Permite el scroll horizontal */
  white-space: nowrap; /* Mantiene los productos en una sola fila */
  gap: 16px; /* Espaciado entre los productos */
  padding: 16px; /* Espaciado interno */
  scroll-snap-type: x mandatory; /* Suaviza el scroll al parar en cada producto */
  justify-content: space-evenly; /* Distribuye los productos de manera uniforme */
}

/* Lista de productos */
.woocommerce ul.custom-container-0 {
  display: flex;
  gap: 16px;
  padding: 0;
  margin: 0;
  list-style: none;
}

/* Estilos individuales de cada producto */
.woocommerce ul.custom-container-0 li {
 /* flex: 0 0 auto;  Evita que se redimensionen */
 /* width: 200px;  Ancho fijo para cada producto */
  scroll-snap-align: start; /* Alineación suave al hacer scroll */
  background: #f9f9f9; /* Fondo minimalista */
  border: 1px solid #ddd; /* Borde sutil */
  border-radius: 8px; /* Bordes redondeados */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra ligera */
  padding: 12px;
  text-align: center;
}

/* Imagen del producto */
.product-block-content figure img {
  max-width: 100%;
  height: 300px;
  width: 300px;
}
.product-block-content .woocommerce ul li {
  width: 25%;
}


/* Título del producto */
.woocommerce-loop-product__title {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}


/* Botón de acción */
.ct-woo-card-actions .button {
  background: #007bff; /* Color azul para destacar */
  color: #000000;
  border: none;
  border-radius: 4px;
  padding: 8px 12px;
  font-size: 14px;
  cursor: pointer;
  text-decoration: none;
}

.ct-woo-card-actions .button:hover {
  background: #0056b3; /* Color más oscuro al pasar el mouse */
}

/* Precio */
.price {
  font-size: 14px;
  color: #555;
  margin: 8px 0;
  display: block;
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


echo $shortcode_content;
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
            // Verificar si es el contenedor principal que deseas modificar
            if ($container->parentNode->nodeName === 'div' ) {
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
        }

        echo $dom->saveHTML();
        ?>
    </div>
</div>

