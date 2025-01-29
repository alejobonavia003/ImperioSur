


<style>
/* Estilos del carrusel */
.carousel {
  position: relative;
  width: 100%;
  margin: auto;
  overflow: hidden;
}

.carousel-images {
  display: flex;
  transition: transform 0.5s ease-in-out;
  width: 100%;
}

.carousel-images img {
  width: 100%;
  flex-shrink: 0;
}

/* Botones de navegación */
.carousel-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border: none;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 10;
}

.carousel-button.prev {
  left: 10px;
}

.carousel-button.next {
  right: 10px;
}

/* Indicadores */
.carousel-indicators {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
  gap: 5px;
}

.carousel-indicators button {
  width: 10px;
  height: 10px;
  background-color: rgba(255, 255, 255, 0.5);
  border: none;
  border-radius: 50%;
  cursor: pointer;
}

.carousel-indicators button.active {
  background-color: white;
}
</style>




<div class="carousel">
  <!-- Contenedor de imágenes del carrusel -->
  <div class="carousel-images" id="carouselImages">
  <?php for ($i = 0; $i < count($attributes['images']); $i++) { ?>  
    <img src="<?php echo ($attributes['images'][$i]['url'] ? $attributes['images'][$i]['url'] : null) ?>" alt="<?php ($attributes['images'][0]['alt'] ? $attributes['images'][0]['alt'] : null) ?>">
    <?php } ?>
  </div>

  <!-- Botones de navegación -->
  <button class="carousel-button prev" id="prevButton">&#10094;</button>
  <button class="carousel-button next" id="nextButton">&#10095;</button>

  <!-- Indicadores -->
  <div class="carousel-indicators" id="carouselIndicators">
  <?php for ($i = 0; $i < count($attributes['images']); $i++) { ?>  
    <button data-index=" <?php $i ?>" class="active"></button>
    <?php } ?>
  </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
  // Variables principales
  const carouselImages = document.getElementById('carouselImages');
  const prevButton = document.getElementById('prevButton');
  const nextButton = document.getElementById('nextButton');
  const indicators = document.querySelectorAll('.carousel-indicators button');
  const slideCount = indicators.length;
  let currentIndex = 0;

  // Función para actualizar la posición del carrusel
  function updateCarousel(index) {
    carouselImages.style.transform = `translateX(-${index * 100}%)`;
    indicators.forEach((btn, i) => {
      btn.classList.toggle('active', i === index);
    });
  }

  // Función para avanzar al siguiente slide
  function nextSlide() {
    currentIndex = (currentIndex + 1) % slideCount;
    updateCarousel(currentIndex);
  }

  // Función para retroceder al slide anterior
  function prevSlide() {
    currentIndex = (currentIndex - 1 + slideCount) % slideCount;
    updateCarousel(currentIndex);
  }

  // Event Listeners para los botones
  nextButton.addEventListener('click', nextSlide);
  prevButton.addEventListener('click', prevSlide);

  // Event Listeners para los indicadores
  indicators.forEach((btn, index) => {
    btn.addEventListener('click', () => {
      currentIndex = index;
      updateCarousel(currentIndex);
    });
  });

  // Autoplay (cada 4 segundos)
  setInterval(nextSlide, 4000);
});
</script>