<?php
defined('ABSPATH') || exit;

global $product;

if (empty($product) || !$product->is_visible()) {
    return;
}

$imagen_principal = get_the_post_thumbnail_url(get_the_ID(), 'large');

$galeria = get_post_meta(get_the_ID(), '_product_image_gallery', true);
$imagenes = explode(',', $galeria);
$segunda_imagen = '';

if (!empty($imagenes[0])) {
    $segunda_imagen = wp_get_attachment_image_src($imagenes[0], 'large')[0];
}
?>

<div class="col-md-4 text-center u-producto">
    <a href="<?php the_permalink(); ?>" class="producto-hover">

        <div class="contenedor-img-producto">
            <img class="imagen-principal" src="<?php echo esc_url($imagen_principal); ?>" alt="<?php the_title(); ?>">
            <?php if ($segunda_imagen): ?>
                <img class="imagen-hover" src="<?php echo esc_url($segunda_imagen); ?>" alt="<?php the_title(); ?>">
            <?php endif; ?>
        </div>

        <h3><?php the_title(); ?></h3>
        <p class="light"><?php echo $product->get_price_html(); ?></p>

    </a>
</div>
