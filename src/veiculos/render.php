<?php
echo '<style>
.contenedor-tarjeta {
    display: grid;
    gap: 16px;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    justify-items: center;
    max-width: 100% !important;
}
.tarjeta-auto {
    display: flex;
    flex-direction: column;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    background: #fff;
    width: 100%;
    max-width: 300px;
    position: relative;
}
.swiper-container {
    width: 100%;
    height: 200px;
    position: relative;
}
.swiper-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.tarjeta-auto h3 {
    margin: 16px;
    font-size: 1.5em;
}
.tarjeta-auto p {
    margin: 8px 16px;
    font-size: 1em;
    color: #555;
}
.boton-whatsapp {
    display: block;
    margin: 16px;
    padding: 10px 16px;
    background-color: #25d366;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    font-size: 1em;
    margin-top: auto;
    cursor: pointer;
    border: none;
}
.boton-whatsapp:hover {
    background-color: #128c7e;
}
.swiper-button-next,
.swiper-button-prev {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 30px;
    height: 30px;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 50%;
    color: #000;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
}
.swiper-button-next {
    right: 10px;
}
.swiper-button-prev {
    left: 10px;
}
.swiper-button-next::after,
.swiper-button-prev::after {
    font-size: 16px;
    font-weight: bold;
}

/* Nuevos estilos para el lightbox */
.lightbox-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.9);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    /* Override WordPress layout constraints */
    max-width: none !important;
    margin-left: 0 !important;
    margin-right: 0 !important;
}

.lightbox-swiper-container {
    width: 80%;
    height: 80%;
    position: relative;
}

.lightbox-swiper-container .swiper-slide {
    display: flex;
    align-items: center;
    justify-content: center;
}

.lightbox-swiper-container img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.lightbox-close {
    position: absolute;
    top: 20px;
    right: 20px;
    color: white;
    font-size: 30px;
    cursor: pointer;
    z-index: 1010;
}

.lightbox-swiper-container .swiper-button-next,
.lightbox-swiper-container .swiper-button-prev {
    width: 40px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.8);
}

.lightbox-swiper-container .swiper-button-next::after,
.lightbox-swiper-container .swiper-button-prev::after {
    font-size: 24px;
}
</style>';

if (!empty($attributes['cards']) && is_array($attributes['cards'])) {
    ?>
    <div class="contenedor-tarjeta">
    <?php
    foreach ($attributes['cards'] as $index => $card) {
        $marca       = esc_html($card['marca'] ?? '');
        $modelo      = esc_html($card['modelo'] ?? '');
        $año         = esc_html($card['año'] ?? '');
        $precio      = esc_html($card['precio'] ?? '');
        $descripcion = esc_html($card['descripcion'] ?? '');
        $whatsapp    = isset($card['whatsapp']) ? preg_replace('/\D/', '', $card['whatsapp']) : '';
        $imagenes    = isset($card['imagenes']) ? $card['imagenes'] : array();

        if (!empty($card['mensajePersonalizado'])) {
            $mensajeWhatsApp = rawurlencode($card['mensajePersonalizado']);
        } else {
            $mensajeWhatsApp = rawurlencode("Hola, estoy interesado en el vehículo $marca $modelo.");
        }

        $urlWhatsApp = "https://wa.me/$whatsapp?text=$mensajeWhatsApp";
        ?>
        <div class="tarjeta-auto">
            <?php if (!empty($imagenes)) : ?>
                <div class="swiper-container" data-images="<?php echo htmlspecialchars(json_encode(array_map('esc_url', $imagenes)), ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="swiper-wrapper">
                        <?php foreach ($imagenes as $imagen) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url($imagen); ?>" alt="Auto" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            <?php endif; ?>
            <h3><?php echo "$marca $modelo ($año)"; ?></h3>
            <p><?php echo $descripcion; ?></p>
            <p><strong>Vendedor:</strong> <?php echo $precio; ?></p>
            <a class="boton-whatsapp" href="<?php echo $urlWhatsApp; ?>" target="_blank">Contactar por WhatsApp</a>
        </div>
        <?php
    }
    ?>
    </div>
    
    <!-- Lightbox HTML -->
    <div class="lightbox-overlay">
        <span class="lightbox-close">&times;</span>
        <div class="lightbox-swiper-container">
            <div class="swiper-wrapper"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <?php
} else {
    echo '<p>No hay tarjetas disponibles.</p>';
}
?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const cardSwipers = [];
    document.querySelectorAll('.swiper-container').forEach(function (container) {
        const swiper = new Swiper(container, {
            loop: true,
            pagination: { el: '.swiper-pagination', clickable: true },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' }
        });
        container.swiperInstance = swiper;
    });

    const lightboxOverlay = document.querySelector('.lightbox-overlay');
    const lightboxClose = document.querySelector('.lightbox-close');
    const lightboxSwiperContainer = document.querySelector('.lightbox-swiper-container');
    let lightboxSwiper = null;

    document.querySelectorAll('.swiper-slide img').forEach(img => {
        img.addEventListener('click', function() {
            const container = this.closest('.swiper-container');
            const images = JSON.parse(container.dataset.images);
            const currentIndex = container.swiperInstance.realIndex;
            
            const wrapper = lightboxSwiperContainer.querySelector('.swiper-wrapper');
            wrapper.innerHTML = images.map(url => `
                <div class="swiper-slide">
                    <img src="${url}" alt="Vista completa">
                </div>
            `).join('');
            
            if (lightboxSwiper) lightboxSwiper.destroy();
            lightboxSwiper = new Swiper(lightboxSwiperContainer, {
                initialSlide: currentIndex,
                loop: true,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                }
            });
            
            lightboxOverlay.style.display = 'flex';
        });
    });

    function closeLightbox() {
        lightboxOverlay.style.display = 'none';
        if (lightboxSwiper) {
            lightboxSwiper.destroy();
            lightboxSwiper = null;
        }
    }

    lightboxOverlay.addEventListener('click', e => {
        if (e.target === lightboxOverlay || e.target.classList.contains('lightbox-close')) {
            closeLightbox();
        }
    });

    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeLightbox();
    });
});
</script>
