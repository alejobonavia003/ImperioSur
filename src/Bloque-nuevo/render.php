
<div class="circle-container" >
  <?php for ($i = 0; $i < count($attributes['images']); $i++) { ?>    
  <div class="circle">
    <a href="<?php  echo ($attributes['images'][$i]['link'] ? $attributes['images'][$i]['link'] : null) ?>">
      <img src="<?php echo ($attributes['images'][$i]['url'] ? $attributes['images'][$i]['url'] : null) ?>" alt="<?php ($attributes['images'][0]['alt'] ? $attributes['images'][0]['alt'] : null) ?>">
      <span><?php echo ($attributes['images'][$i]['alt'] ? $attributes['images'][$i]['alt'] : null) ?></span>
    </a>

</div>
<?php } ?>
<button class="carousel-button next" onclick="scrollCircles()">></button>
<button id="botonIzquierda">Scroll a la Izquierda</button>
<button id="botonDerecha">Scroll a la Derecha</button>
</div>

<script>
    document.getElementById('botonDerecha').addEventListener('click', function() {
        const contenedor = document.getElementById('circle-container');
        contenedor.scrollBy({
            top: 0,
            left: 200, // Cambia este valor para ajustar la distancia del scroll a la derecha
            behavior: 'smooth' // Para un scroll suave
        });
    });

    document.getElementById('botonIzquierda').addEventListener('click', function() {
        const contenedor = document.getElementById('circle-container');
        contenedor.scrollBy({
            top: 0,
            left: -200, // Cambia este valor para ajustar la distancia del scroll a la izquierda
            behavior: 'smooth' // Para un scroll suave
        });
    });
</script>


<style>

@media screen and (max-width: 768px) {
  .circle-container {
    place-content: start !important;
    gap: 10px!important;
}
.circle {
    width: 70px!important; /* Cambia este valor según el tamaño deseado */
    height: 70px!important; /* Ajusta la altura al mismo valor */
  }

  .circle span {
    font-size: 10px; /* Ajusta el tamaño del texto si es necesario */
  }
}


.circle-container {
    overflow: auto;
    white-space: nowrap;
    width: 100%;
}


/* Estilo de cada círculo */
.circle {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    overflow: hidden;
    position: relative;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    display: inline-block;

}
::-webkit-scrollbar {
    display: none;
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

