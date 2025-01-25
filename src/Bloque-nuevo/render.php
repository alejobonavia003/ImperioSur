<div class="circle-container" id="circle-container">
  <?php for ($i = 0; $i < count($attributes['images']); $i++) { ?>    
  <div class="circle">
    <a href="<?php echo ($attributes['images'][$i]['link'] ? $attributes['images'][$i]['link'] : null) ?>">
      <img src="<?php echo ($attributes['images'][$i]['url'] ? $attributes['images'][$i]['url'] : null) ?>" alt="<?php echo ($attributes['images'][$i]['alt'] ? $attributes['images'][$i]['alt'] : null) ?>">
      <span><?php echo ($attributes['images'][$i]['alt'] ? $attributes['images'][$i]['alt'] : null) ?></span>
    </a>
  </div>
  <?php } ?>
  <button class="carousel-button prev" id="botonIzquierda"><</button>
  <button class="carousel-button next" id="botonDerecha">></button>
</div>

<style>
.circle-container {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    position: relative;
}

.carousel-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #007cba;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 10;
}

#botonIzquierda {
    left: 10px;
}

#botonDerecha {
    right: 10px;
}

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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
});
</script>