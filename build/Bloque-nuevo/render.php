


<div class="circle-container">
  <div class="circle">
    <a href="#">
      <img src="https://bellarosatta.com/wp-content/uploads/2025/01/D_Q_NP_881108-MLA81635198923_122024-F00.jpg-G.webp" alt="Mujer">
      <span>ejemplo5</span>
    </a>
</div>
</div>

<?php

// Supongamos que $attributes contiene el JSON que mostraste
$images = $attributes['images']; // Accedemos al array de imágenes

// Inicializamos variables para guardar las URLs
$url1 = isset($images[0]['url']) ? $images[0]['url'] : null;
$alt1 = isset($images[0]['alt']) ? $images[0]['alt'] : null;
$length = count($images);

echo "<script>console.log('Mensaje: " . $url1 . "');</script>";
echo "<script>console.log('Mensaje: " . $alt1 . "');</script>";
echo "<script>console.log('Mensaje: " . $length . "');</script>";
echo "<script>console.log('Mensaje:', " . json_encode($attributes) . ");</script>";



?>

<div class="gallery">
    <img src="https://bellarosatta.com/wp-content/uploads/2025/01/D_Q_NP_827836-MLA81635255805_122024-G.webp" alt="hombre" />
</div>

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