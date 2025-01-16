<div class="circle-container">
  <div class="circle">
    <a href="#">
      <img src="https://bellarosatta.com/wp-content/uploads/2025/01/D_Q_NP_881108-MLA81635198923_122024-F00.jpg-G.webp" alt="Mujer">
      <span>ejemplo</span>
    </a>

</div>

<?php
function render_circle_carousel_block( $attributes ) {
    $images = $attributes['images'] ?? [];

    ob_start(); ?>

    <div class="circle-container">
        <?php foreach ( $images as $image ) : ?>
            <div class="circle">
                <a href="#">
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <?php
    return ob_get_clean();
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