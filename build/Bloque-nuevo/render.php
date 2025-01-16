<div class="circle-container">
  <div class="circle">
    <a href="#">
      <img src="https://bellarosatta.com/wp-content/uploads/2025/01/D_Q_NP_881108-MLA81635198923_122024-F00.jpg-G.webp" alt="Mujer">
      <span>ejemplo</span>
    </a>
</div>
</div>

<?php
function imperiosur_render_block($attributes) {
    // Obtienes la primera imagen
    $image = isset($attributes['images'][0]) ? $attributes['images'][0] : null;

    // Si hay una imagen, la mostramos
    if ($image) {
        return '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
    }

    return ''; // Si no hay imagen, no mostramos nada
}

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