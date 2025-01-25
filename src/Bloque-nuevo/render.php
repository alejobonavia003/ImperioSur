
<div class="circle-container" data-block-id="a46d601">
    <div class="stk-row stk-inner-blocks stk-block-content stk-content-align stk-a46d601-horizontal-scroller">
        <?php for ($i = 0; $i < count($attributes['images']); $i++) { ?>    
            <div class="circle">
                <a href="<?php echo ($attributes['images'][$i]['link'] ? $attributes['images'][$i]['link'] : null) ?>">
                    <img src="<?php echo ($attributes['images'][$i]['url'] ? $attributes['images'][$i]['url'] : null) ?>" alt="<?php echo ($attributes['images'][$i]['alt'] ? $attributes['images'][$i]['alt'] : null) ?>">
                    <span><?php echo ($attributes['images'][$i]['alt'] ? $attributes['images'][$i]['alt'] : null) ?></span>
                </a>
            </div>
        <?php } ?>
        <button class="carousel-button next" onclick="scrollCircles()">></button>
    </div>
</div>


<script>
let scrollAmount = 0;

function scrollCircles() {
    const container = document.querySelector('.stk-row');
    const scrollStep = 120; // Ajusta este valor según el tamaño de tus círculos
    scrollAmount += scrollStep;
    container.style.transform = `translateX(-${scrollAmount}px)`;
}

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
    position: relative;
    overflow: hidden; /* Oculta el desbordamiento */
    width: 100%; /* Ancho completo */
}

.stk-row {
    display: flex; /* Usar flexbox para alinear en fila */
    transition: transform 0.3s ease; /* Transición suave para el desplazamiento */
}

.circle {
    flex: 0 0 auto; /* No permitir que los círculos se encogen */
    margin: 0 10px; /* Espaciado entre círculos */
    border-radius: 50%; /* Hacer círculos */
    overflow: hidden; /* Asegurarse de que la imagen no sobresalga */
    width: 100px; /* Ancho del círculo */
    height: 100px; /* Alto del círculo */
    display: flex;
    align-items: center;
    justify-content: center;
}

.circle img {
    width: 100%; /* Ajustar imagen al círculo */
    height: auto; /* Mantener la proporción */
    border-radius: 50%; /* Hacer la imagen circular */
}

.carousel-button {
    position: absolute;
    top: 50%;
    right: 10px; /* Posición del botón */
    transform: translateY(-50%); /* Centrar verticalmente */
    background-color: #007bff; /* Color de fondo */
    color: white; /* Color del texto */
    border: none; /* Sin borde */
    padding: 10px; /* Espaciado interno */
    cursor: pointer; /* Cambiar cursor */
    border-radius: 5px; /* Bordes redondeados */
    z-index: 10; /* Asegurarse de que el botón esté encima */
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

