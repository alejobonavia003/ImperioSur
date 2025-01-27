

<?php
function get_product_with_highest_offer_title() {
    // Obtén todos los productos en oferta
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
    echo "<script>console.log('products: " . json_encode($query) . "');</script>";
    $products = $query->get_products();
    echo "<script>console.log('products: " . json_encode($products) . "');</script>";

    // Variable para almacenar el producto con la mayor oferta
    $highest_offer_product = null;
    $highest_discount = 0;

    // Itera sobre los productos para encontrar la mayor oferta
    foreach ($products as $product) {
        $regular_price = (float) $product->get_regular_price();
        $sale_price = (float) $product->get_sale_price();
        echo "<script>console.log('regular_price: " . json_encode($regular_price) . "');</script>";
        echo "<script>console.log('sale_price: " . json_encode($sale_price) . "');</script>";

        // Calcula el descuento
        $discount = $regular_price - $sale_price;

        // Actualiza el producto con la mayor oferta
        if ($discount > $highest_discount) {
            $highest_discount = $discount;
            $highest_offer_product = $product;
        }
    }

    // Retorna el título del producto con la mayor oferta
    if ($highest_offer_product) {
        return $highest_offer_product->get_name();
    }

    return 'No hay productos en oferta.';
}

?>


<p> <?php echo json_encode(get_product_with_highest_offer_title()) ?> </p>
<?php
echo "<script>console.log('Mensaje: " . json_encode(get_product_with_highest_offer_title()) . "');</script>";
?>
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
