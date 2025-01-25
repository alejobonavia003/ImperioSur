<div class="wp-block-stackable-horizontal-scroller stk-block-horizontal-scroller stk-block stk-a46d601 circle-container" data-block-id="a46d601">
    <div class="stk-row stk-inner-blocks stk-block-content stk-content-align stk-a46d601-horizontal-scroller">
        <?php for ($i = 0; $i < count($attributes['images']); $i++) { ?>    
            <div class="circle">
                <a href="<?php echo ($attributes['images'][$i]['link'] ? $attributes['images'][$i]['link'] : '#') ?>">
                    <img src="<?php echo ($attributes['images'][$i]['url'] ? $attributes['images'][$i]['url'] : '') ?>" alt="<?php echo ($attributes['images'][$i]['alt'] ? $attributes['images'][$i]['alt'] : '') ?>">
                    <span><?php echo ($attributes['images'][$i]['alt'] ? $attributes['images'][$i]['alt'] : '') ?></span>
                </a>
            </div>
        <?php } ?>
        <button class="scroll-button" onclick="scrollCircles()">Scroll</button>
    </div>
</div>

<style>
.circle-container {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    position: relative;
}

.scroll-button {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    background-color: #007cba;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 10;
}
</style>

<script>
function scrollCircles() {
    const container = document.querySelector('.circle-container');
    container.scrollBy({ left: 100, behavior: 'smooth' }); // Ajusta el valor de 'left' según sea necesario
}
</script>

<?php
// Supongamos que $attributes contiene el JSON que mostraste
$images = $attributes['images']; // Accedemos al array de imágenes

// Inicializamos variables para guardar las URLs
$url1 = isset($attributes['images'][0]['url']) ? $attributes['images'][0]['url'] : null;
$alt1 = isset($attributes['images'][0]['alt']) ? $attributes['images'][0]['alt'] : null;
$length = count($images);

echo "<script>console.log('Mensaje: " . ($attributes['images'][0]['url'] ? $attributes['images'][0]['url'] : null) . "');</script>";
echo "<script>console.log('Mensaje: " . ($attributes['images'][0]['alt'] ? $attributes['images'][0]['alt'] : null) . "');</script>";
echo "<script>console.log('Mensaje: " . ($attributes['images'][0]['link'] ? $attributes['images'][0]['link'] : null) . "');</script>";
echo "<script>console.log('Mensaje: " . json_encode($attributes['images'][0]['link']) . "');</script>";
echo "<script>console.log('Mensaje: " . count($attributes['images']) . "');</script>";
?>