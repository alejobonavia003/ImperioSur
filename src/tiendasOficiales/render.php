<?php
$useAutomatic      = $attributes['useAutomatic'] ?? true;
$customTitle       = $attributes['customTitle'] ?? '';
$customDescription = $attributes['customDescription'] ?? '';
$customLogo        = $attributes['customLogo'] ?? '';

if ( $useAutomatic ) {
    $brands = get_terms( array(
        'taxonomy'   => 'product_brand',
        'hide_empty' => false,
    ) );
} else {
    $brands = [
        (object) [
            'name'        => $customTitle,
            'description' => $customDescription,
            'slug'        => sanitize_title( $customTitle ),
            'logo'        => $customLogo
        ]
    ];
}

if ( empty( $brands ) ) {
    echo '<p>No hay tiendas oficiales registradas.</p>';
    return;
}

?>

<div class="tiendas-container" style="display: flex; flex-direction: column; align-items: center; gap: 20px;">
    <?php foreach ( $brands as $brand ) :
$meta_value = get_term_meta( $brand->term_id, 'thumbnail_id', true );
error_log("Term ID: " . $brand->term_id);
error_log("Meta value (thumbnail_id): " . print_r($meta_value, true));

$brand_logo = $useAutomatic ? wp_get_attachment_url( $meta_value ) : $brand->logo;
error_log("Brand logo URL: " . $brand_logo);

echo "<script>console.log(" . json_encode('logo: ' . $brand_logo) . ");</script>";

        
        $brand_url  = home_url( '/marca/' . $brand->slug );
    ?>
        <div class="tienda-oficial" style="width: 80%; max-width: 800px; background: white; padding: 20px; box-shadow: 0px 4px 10px rgba(0,0,0,0.1); border-radius: 10px; transition: transform 0.3s, box-shadow 0.3s; display: flex; flex-direction: column; align-items: center; text-align: center;">
            <div class="tienda-header" style="display: flex; align-items: center; gap: 20px;">
                <?php if ( $brand_logo ) : ?>
                    <img src="<?php echo esc_url( $brand_logo ); ?>" alt="<?php echo esc_attr( $brand->name ); ?>" style="width: 80px; height: auto;">
                <?php endif; ?>
                <h2 style="margin: 0; flex-grow: 1; font-size: 24px;"><?php echo esc_html( $brand->name ); ?></h2>
            </div>
            <p style="margin-top: 10px; color: #666;"><?php echo esc_html( $brand->description ); ?></p>
            <a href="<?php echo esc_url( $brand_url ); ?>" class="tienda-boton" style="display: inline-block; margin-top: 15px; padding: 10px 20px; background: #0073aa; color: white; text-decoration: none; border-radius: 5px; transition: background 0.3s;">Ver Tienda</a>
        </div>
    <?php endforeach; ?>
</div>

<?php // echo phpinfo();
 ?>