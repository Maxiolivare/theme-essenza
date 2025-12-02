<?php
/**
 * single-product.php - WooCommerce Essenza
 * Sobreescribe el detalle de producto por completo
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>



    <?php
    // ¡¡ESTO ES LO QUE FALTABA!! sin esto el single tiende a combinarse con otras variables
    global $product;
    
    // Si por alguna razón $product no está definido (raro pero pasa), lo forzamos:
    if ( ! is_a( $product, 'WC_Product' ) ) {
        $product = wc_get_product( get_the_ID() );
    }
    ?>
    <!-- ===== ESTO ELIMINA EL LABEL PARA SIEMPRE ===== -->
    <?php remove_all_filters( 'woocommerce_cart_product_quantity' ); ?>
    <?php remove_action( 'woocommerce_before_quantity_input_field', 'woocommerce_quantity_input_label' ); ?>
    <?php remove_action( 'woocommerce_after_quantity_input_field', 'woocommerce_quantity_input_label' ); ?>
    <!-- =============================================== -->

    <!-- Hook importante para que WooCommerce cargue scripts y estilos del producto -->
    <?php do_action( 'woocommerce_before_single_product' ); ?>

    <main class="fondo">
        <div class="container textos mt-5">
            <div class="row">
                <!-- IMÁGENES DEL PRODUCTO -->
                <div class="col-md-6 mx-auto ">
                    <!-- Imagen principal -->
                    <div class="mb-4">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" 
                               data-fancybox="gallery" class="d-block ratio ratio-1x1 mb-3">
                                <?php the_post_thumbnail( 'large', ['class' => ' img-fluid cuadrar-img w-100 bg-img rounded-4'] ); ?>
                            </a>
                        <?php endif; ?>

                        <!-- Miniaturas -->
                        <?php
                        $attachment_ids = $product->get_gallery_image_ids();
                        if ( $attachment_ids ) :
                            foreach ( $attachment_ids as $attachment_id ) :
                                $image_link = wp_get_attachment_url( $attachment_id );
                                ?>
                                <a href="<?php echo esc_url( $image_link ); ?>" 
                                   data-fancybox="gallery" 
                                   class="mx-auto d-inline-block w-25 bg-img ratio ratio-1x1 rounded-5 me-2 mb-3">
                                    <img src="<?php echo esc_url( $image_link ); ?>" 
                                         class="img-fluid cuadrar-img" alt="Miniatura">
                                </a>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>

                <!-- INFORMACIÓN DEL PRODUCTO -->
                <div class="col-md-6 mx-auto">
                    <h1 class="titulos-48 text-cinzel fw-bold"><?php the_title(); ?></h1>
                    <p class="my-3"><?php the_excerpt(); ?></p>

                    <!-- Precio -->
                    <div class="border border-2 rounded-2 w-50 border-naranjo-oscuro textos-naranja-oscuro mb-4">
                        
                        <h2 class="text-start align-middle ms-4 sub-titulos-32 my-2 text-inter fw-semibold">
                            <?php woocommerce_template_single_price(); ?>
                        </h2>
                    </div>

                    <p class="my-3 parrafos-24">Detalles del producto:</p>
                    <?php wc_display_product_attributes( $product ); ?>

                    <!-- Contador de productos -->
                    <div class="mx-auto d-flex align-items-center mb-4">
                        <div class="col-md-4">
                            <p class="parrafos-24 mb-0">Cantidad:</p>
                        </div>
                        <div class="col-md-8 d-flex align-items-center ms-3">
                    
                            <!-- Contador, para que se vea visualmente y no use el de woocomerce por defecto-->
                            <div class="btn-group me-3" role="group">
                                <button type="button" class="btn btn-primary bg-white border-naranjo-oscuro textos-naranja-oscuro border-end-0 btn-lg" onclick="decrementar()">
                                    <i class="bi bi-dash-circle"></i>
                                </button>
                                <button type="button" id="cantidadVisual" class="btn btn-primary bg-white border-naranjo-oscuro textos-naranja-oscuro border-end-0 border-start-0 btn-lg">
                                    1
                                </button>
                                <button type="button" class="btn btn-primary bg-white border-naranjo-oscuro textos-naranja-oscuro border-start-0 btn-lg" onclick="incrementar()">
                                    <i class="bi bi-plus-circle"></i>
                                </button>
                            </div>
                            <!-- ESTE ES EL INPUT REAL que WooCommerce lee (lo ocultamos) -->
                                <?php
                            woocommerce_quantity_input( array(
                                'min_value'   => 1,
                                'max_value'   => $product->get_max_purchase_quantity(), //colocar luego, solo desactivado para probar muchos productos
                                'input_value' => 1,
                                'input_name'  => 'quantity',
                                'input_id'    => 'cantidadReal',
                                'classes'     => ['d-none'],           // oculta el input
                            ), $product );
                            ?>
    
                    
                        </div>
                    </div>
                     <!-- boton de añadir al carro -->
                    <div class="d-flex gap-3 my-5">
                        <button type="button" 
                                id="liveToastBtnCarrito" 
                                class="btn btn-secundary text-nowrap px-4 flex-fill">
                            <i class="bi bi-cart3"></i> Agregar al carrito
                        </button>
                        <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-secundary px-4 flex-fill">
                            Comprar ahora
                        </a>
                    </div>
                    
                    <!-- Botón REAL de WooCommerce (lo dejamos oculto, pero FUNCIONA) -->
                    <div class="d-none">
                        <?php woocommerce_template_single_add_to_cart(); ?>
                    </div>


                    <!-- Toast, se activa al apretar agregar carrito. -->
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <i class="bi bi-bell-fill pe-1"></i>
                                <strong class="me-auto">Essenza</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                Su producto ha sido añadido al carrito <i class="bi bi-check2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-10 my-4">
                    <h5 class="text-danger">Material inflamable: Utilizar con precaución</h5>
                </div>
            </div>
        </div>

            <!-- Productos relacionados -->
             
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12 my-5">
                    <h1 class="text-center text-cinzel fw-bold">Podrían Interesarte</h1>
                </div>

                <?php
                global $post;
                $product = wc_get_product($post->ID);

                // Obtener categorías y tags del producto actual
                $cats_array = wp_get_post_terms($post->ID, 'product_cat', ['fields' => 'ids']);
                $tags_array = wp_get_post_terms($post->ID, 'product_tag', ['fields' => 'ids']);

                // Query de productos relacionados (máximo 3 para que quede exactamente como tu diseño)
                $related = new WP_Query([
                    'post_type'           => 'product',
                    'posts_per_page'      => 3,
                    'post__not_in'        => [$post->ID], // Excluir el producto actual
                    'no_found_rows'       => true,
                    'ignore_sticky_posts' => true,
                    'tax_query'           => [
                        'relation' => 'OR',
                        [
                            'taxonomy' => 'product_cat',
                            'field'    => 'id',
                            'terms'    => $cats_array,
                            'operator' => 'IN'
                        ],
                        [
                            'taxonomy' => 'product_tag',
                            'field'    => 'id',
                            'terms'    => $tags_array,
                            'operator' => 'IN'
                        ]
                    ],
                    'orderby' => 'rand', // opcional: puedes cambiar a 'date' si prefieres los más nuevos
                ]);

                if ($related->have_posts()) :
                    while ($related->have_posts()) : $related->the_post();
                        $related_product = wc_get_product(get_the_ID());
                        ?>
                        <div class="col-md-3 mx-auto mb-3">
                            <a href="<?php the_permalink(); ?>" class="card rounded-top shadow-sm text-decoration-none">
                                <div class="ratio ratio-1x1 rounded-top">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top img-fluid w-100 border-bottom cuadrar-img ratio ratio-1x1 rounded-5 me-2', 'alt' => get_the_title()]); ?>
                                    <?php else : ?>
                                        <img src="<?php echo wc_placeholder_img_src('woocommerce_single'); ?>" class="card-img-top img-fluid w-100 border-bottom cuadrar-img ratio ratio-1x1 rounded-5 me-2" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><?php the_title(); ?></p>
                                    <h2 class="textos-naranja-oscuro">
                                        <?php echo $related_product->get_price_html(); ?>
                                    </h2>
                                </div>
                            </a>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Si por alguna razón no hay relacionados, muestra 3 placeholders bonitos (para que nunca quede vacío)
                    for ($i = 1; $i <= 3; $i++) : ?>
                        <div class="col-md-3 mx-auto">
                            <a href="#" class="card rounded-top shadow-sm text-decoration-none opacity-50">
                                <div class="ratio ratio-1x1 rounded-top bg-light">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <small class="text-muted">Sin productos relacionados</small>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text text-muted">Producto de ejemplo</p>
                                    <h2 class="textos-naranja-oscuro">$0</h2>
                                </div>
                            </a>
                        </div>
                    <?php endfor;
                endif;
                ?>
            </div>
        </div>

    </main>

<?php endwhile; ?>

<?php get_footer(); ?>
