<?php
defined( 'ABSPATH' ) || exit;
get_header();

/* =========================
   CATEGORÍA ACTUAL (CORREGIDO)
========================= */

$queried_object = get_queried_object();

if ( isset( $queried_object->taxonomy ) && $queried_object->taxonomy === 'product_cat' ) {
    // Cuando vienes desde /product-category/slug/
    $categoria_actual = $queried_object->slug;
} elseif ( isset($_GET['categoria']) ) {
    // Cuando usas el menú custom ?categoria=slug
    $categoria_actual = sanitize_text_field($_GET['categoria']);
} else {
    $categoria_actual = 'todos';
}

/* =========================
   CATEGORÍAS PARA EL MENÚ
========================= */

$categorias = get_terms([
    'taxonomy'   => 'product_cat',
    'hide_empty' => false,
    'exclude'    => [15]
]);
?>

<main>
    <div class="container-luis">
        <div class="productos">
            <h1 class="h1n text-center">PRODUCTOS</h1>

            <ul class="menu-principal">
                <li class="categorias">
                    <a href="#" class="categorias-link">Categorías ▼</a>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>">
                                Todos
                            </a>
                        </li>

                        <?php foreach ($categorias as $cat) : ?>
                            <li>
                                <a href="<?php echo esc_url( get_term_link( $cat ) ); ?>">
                                    <?php echo esc_html( $cat->name ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </div>

        <?php
        /* =========================
           QUERY DE PRODUCTOS
        ========================= */

        $args = [
            'post_type'      => 'product',
            'posts_per_page' => -1
        ];

        if ( $categoria_actual !== 'todos' ) {
            $args['tax_query'] = [
                [
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => $categoria_actual
                ]
            ];
        }

        $query = new WP_Query( $args );
        ?>

        <div class="product-grid">
            <?php while ( $query->have_posts() ) : $query->the_post(); global $product; ?>

                <?php
                $imagen_principal = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                if ( ! $imagen_principal ) {
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
                            data-product_id="<?php echo get_the_ID(); ?>"
                        >
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Vector.png" alt="Agregar al carrito">
                        </a>
                    </div>

                    <h3 class="product-card__title"><?php the_title(); ?></h3>
                    <p class="product-card__price"><?php echo $precio; ?></p>
                </article>

            <?php endwhile; ?>
        </div>

        <?php wp_reset_postdata(); ?>
    </div>
</main>

<?php get_footer(); ?>
