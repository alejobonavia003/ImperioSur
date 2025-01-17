
<div class="circle-container">
  <?php for ($i = 0; $i < count($attributes['images']); $i++) { ?>    
  <div class="circle">
    <a href="#">
      <img src="<?php echo ($attributes['images'][0]['url'] ? $attributes['images'][0]['url'] : null) ?>" alt="<?php ($attributes['images'][0]['alt'] ? $attributes['images'][0]['alt'] : null) ?>">
      <span><?php echo ($attributes['images'][0]['alt'] ? $attributes['images'][0]['alt'] : null) ?></span>
    </a>

</div>
<?php } ?>
</div>


<?php

// Supongamos que $attributes contiene el JSON que mostraste
$images = $attributes['images']; // Accedemos al array de imágenes

// Inicializamos variables para guardar las URLs
$url1 = isset($attributes['images'][0]['url']) ? $attributes['images'][0]['url'] : null;
$alt1 = isset($attributes['images'][0]['alt']) ? $attributes['images'][0]['alt'] : null;
$length = count($images);

echo "<script>console.log('Mensaje: " . ($attributes['images'][0]['url'] ? $attributes['images'][0]['url'] : null) . "');</script>";
echo "<script>console.log('Mensaje: " . ($attributes['images'][0]['alt'] ? $attributes['images'][0]['alt'] : null) . "');</script>";
echo "<script>console.log('Mensaje: " . count($attributes['images']) . "');</script>";
//echo "<script>console.log('Mensaje:', " . json_encode($attributes) . ");</script>";



?>



<style>
/* Contenedor principal */
.circle-container {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 20px;
  flex-wrap: wrap;
  padding: 20px;
}

/* Estilo de cada círculo */
.circle {
  width: 120px;
  height: 120px;
  border-radius: 50%;
  overflow: hidden;
  position: relative;
  text-align: center;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.circle:hover {
  transform: scale(1.1);
}

/* Imagen dentro del círculo */
.circle img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

/* Texto sobre la imagen */
.circle span {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
  background-color: rgba(0, 0, 0, 0.6);
  color: #fff;
  padding: 5px 10px;
  border-radius: 10px;
  font-size: 12px;
  font-weight: bold;
  white-space: nowrap;
}
</style>