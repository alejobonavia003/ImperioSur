
<div class="circle-container" >
  <?php for ($i = 0; $i < count($attributes['images']); $i++) { ?>    
  <div class="circle">
    <a href="<?php  echo ($attributes['images'][$i]['link'] ? $attributes['images'][$i]['link'] : null) ?>">
      <img src="<?php echo ($attributes['images'][$i]['url'] ? $attributes['images'][$i]['url'] : null) ?>" alt="<?php ($attributes['images'][0]['alt'] ? $attributes['images'][0]['alt'] : null) ?>">
      <span><?php echo ($attributes['images'][$i]['alt'] ? $attributes['images'][$i]['alt'] : null) ?></span>
    </a>

</div>
<?php } ?>
</div>




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
