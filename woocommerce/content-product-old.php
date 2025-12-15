<?php if (woocommerce_product_loop()) : ?>
<div class="container-luis">
    <div class="product-grid">
        <?php while (have_posts()) : the_post(); global $product; ?>
            <?php
            // Imagen principal
            $imagen_principal = get_the_post_thumbnail_url(get_the_ID(), 'large');
            if (!$imagen_principal) {
                $imagen_principal = wc_placeholder_img_src(); 
            }
            // Precio
            $precio = $product->get_price_html();
            ?>
            <article class="product-card">
                <a href="<?php the_permalink(); ?>">
                    <div class="product-card__image"
                        style="background-image: url('<?php echo esc_url($imagen_principal); ?>');">
                    </div>
                    <h3 class="product-card__title"><?php the_title(); ?></h3>
                    <p class="product-card__price"><?php echo $precio; ?></p>
                </a>
            </article>
        <?php endwhile; ?>
    </div>
</div>
<?php endif; ?>

