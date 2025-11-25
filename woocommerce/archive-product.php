<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 10.1.0
 */
defined( 'ABSPATH' ) || exit;
get_header();?>
<main>
    <?php if ( have_posts() ) : ?>
    <div class="container-luis">
		<h1 class="h1-cual text-center">PRODUCTOS</h1>
        <div class="product-grid">
            <?php while ( have_posts() ) : the_post(); global $product; ?>
                <?php
                $imagen_principal = get_the_post_thumbnail_url(get_the_ID(), 'large');
                if (!$imagen_principal) {
                    $imagen_principal = wc_placeholder_img_src();
                }
                $precio = $product->get_price_html();
                ?>
                <article class="product-card">
					<div class="product-card__image-wrapper">						
						<a href="<?php the_permalink(); ?>">
							<div class="product-card__image"
								style="background-image: url('<?php echo esc_url($imagen_principal); ?>');">
							</div>
						</a>
						<a 
							href="<?php echo esc_url( wc_get_cart_url() . '?add-to-cart=' . get_the_ID() ); ?>"
							class="product-card__add-to-cart"
							data-product_id="<?php echo get_the_ID();?>"
						>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-carrito.svg" alt="Agregar al carrito">
						</a>
					</div>
					<h3 class="product-card__title"><?php the_title(); ?></h3>
					<p class="product-card__price"><?php echo $precio; ?></p>
				</article>
            <?php endwhile; ?>
        </div>
    </div>
    <?php else : ?>
        <p>No hay productos disponibles.</p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>

