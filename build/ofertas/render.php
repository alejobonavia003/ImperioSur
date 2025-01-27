

<?php
$query = new WC_Product_Query(array(
        'limit' => -1, // Sin límite
        'status' => 'publish', // Solo productos publicados
        'meta_query' => array(
            array(
                'key' => '_sale_price', // Solo productos con precio de oferta
                'value' => 0,
                'compare' => '>',
                'type' => 'NUMERIC'
            )
        )
    ));
    $products = $query->get_products();
echo $products;
?>

<p> <?php echo json_encode($products) ?> </p>

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
