

<?php
    $title = isset($attributes['title']) ? esc_html($attributes['title']) : '';
    $shortcode = isset($attributes['shortcode']) ? do_shortcode($attributes['shortcode']) : '';
?>

<div class="product-shortcode-block">
    <h2 class="product-block-title"> <?php echo $title ?> </h2>
    <div class="product-block-content"> <?php echo $shortcode ?> </div>
</div>


<style>
.product-shortcode-block {
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.product-block-title {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #333;
}

.product-block-content {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
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
