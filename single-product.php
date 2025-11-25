<?php
/**
 * single-product.php - WooCommerce Essenza
 * Sobreescribe el detalle de producto por completo
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php
    // ¡¡¡ESTO ES LO QUE FALTABA!!!
    global $product;
    
    // Si por alguna razón $product no está definido (raro pero pasa), lo forzamos:
    if ( ! is_a( $product, 'WC_Product' ) ) {
        $product = wc_get_product( get_the_ID() );
    }
    ?>

    <!-- Hook importante para que WooCommerce cargue scripts y estilos del producto -->
    <?php do_action( 'woocommerce_before_single_product' ); ?>

    <main class="fondo">
        <div class="container textos mt-5">
            <div class="row">
                <!-- IMÁGENES DEL PRODUCTO -->
                <div class="col-md-6 mx-auto">
                    <!-- Imagen principal -->
                    <div class="mb-4">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" 
                               data-fancybox="gallery" class="d-block ratio ratio-1x1">
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
                    <h1 class="titulos-48"><?php the_title(); ?></h1>
                    <p class="my-3"><?php the_excerpt(); ?></p>

                    <!-- Precio -->
                    <div class="border border-2 rounded-2 w-50 border-naranjo-oscuro textos-naranja-oscuro mb-4">
                        <h2 class="d-inline-block text-start align-middle ms-4 sub-titulos-32 my-2">
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
                                'max_value'   => $product->get_max_purchase_quantity(), // Funciona segun la cantidad de productos que hay, sino, no aumenta, en todos los productos parece que por ahora solo hay 1.
                                'input_value' => 1,
                                'input_id'    => 'cantidadReal',
                                'input_name'  => 'quantity',
                                'classes'     => ['d-none'] // lo ocultamos con Bootstrap
                            ), $product );
                            ?>
                    
                        </div>
                    </div>

                    <!-- Formulario de añadir al carrito, el que esta por defecto, guardado por si necesito volver ?php woocommerce_template_single_add_to_cart(); ?>-->
                    

                    <!-- Personalizacion del boton -->
                    <div class="d-flex gap-3 my-5">
                        <button type="button" id="liveToastBtnCarrito" onclick="cambiarTextoBoton()" 
                                class="btn btn-secundary text-nowrap px-4 flex-fill">
                            <i class="bi bi-cart3"></i> Agregar al carrito
                        </button>
                        <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-secundary px-4 flex-fill">
                            Comprar ahora
                        </a>
                    </div>

                    <!-- Toast -->
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
        <?php woocommerce_output_related_products(); ?>

    </main>

<?php endwhile; ?>

<?php get_footer(); ?>
