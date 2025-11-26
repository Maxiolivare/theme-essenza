<?php

defined( 'ABSPATH' ) || exit;
get_header();?>
<main>
    <?php if ( have_posts() ) : ?>
    <div class="container-luis">
		<div class="productos">
            <h1 class="productos-h1">PRODUCTOS</h1>

            <ul class="menu-principal">
                <li class="categorias">
                    <a href="#" class="categorias-link">Categorías ▼</a>

                    <!-- SUBMENÚ -->
                    <ul class="submenu">
                        <li><a href="#" onclick="mostrarCategoria('todos')">Todos</a></li>
                        <li><a href="#" onclick="mostrarCategoria('florales')">Arreglos florales</a></li>
                        <li><a href="#" onclick="mostrarCategoria('gourmet')">Gourmet</a></li>
                        <li><a href="#" onclick="mostrarCategoria('flores')">Flores</a></li>
                        <li><a href="#" onclick="mostrarCategoria('animales')">Animales</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    <div id="contenedor-categorias" class="contenedor-categorias"></div>
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

