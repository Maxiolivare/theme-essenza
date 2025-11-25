<?php
/*
 * Template Name: Single (detalle-producto)
 * single-product.php - WooCommerce
 */

get_header(); ?>
 
    <?php while ( have_posts() ) : the_post(); ?>
    
    <main class="fondo">
        <div class="container textos mt-5">
            <div class="row">
                <!-- ================ IMÁGENES DEL PRODUCTO ================ -->
                <div class="col-md-6 mx-auto">
                    <!-- Imagen principal -->
                    <div class="mb-4">
                        <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" 
                           data-fancybox="gallery" class="contorno d-block">
                            <?php the_post_thumbnail( 'large', ['class' => 'img-fluid cuadrar-img w-100 bg-img rounded-4'] ); ?>
                        </a>
                    </div>

                    <!-- Miniaturas (Galería de WooCommerce) -->
                    <?php
                    $attachment_ids = $product->get_gallery_image_ids();
                    if ( $attachment_ids ) :
                        foreach ( $attachment_ids as $attachment_id ) :
                            $image_link = wp_get_attachment_url( $attachment_id );
                            ?>
                            <a href="<?php echo $image_link; ?>" 
                               data-fancybox="gallery" 
                               class="contorno mx-auto d-inline-block w-25 bg-img ratio ratio-1x1 rounded-5 me-2 mb-3">
                                <img src="<?php echo $image_link; ?>" 
                                     class="img-fluid cuadrar-img" 
                                     alt="Miniatura">
                            </a>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>

                <!-- ================ INFORMACIÓN DEL PRODUCTO ================ -->
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
                    <?php
                    // Mostrar atributos personalizados (Duración, Aroma, Tamaño, etc.)
                    if ( $product->has_attributes() ) {
                        wc_display_product_attributes( $product );
                    }
                    ?>

                    <!-- Cantidad + Añadir al carrito -->
                    <form class="cart my-4" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype="multipart/form-data">
                        <div class="d-flex align-items-center mb-4">
                            <div class="col-md-4">
                                <p class="parrafos-24 mb-0">Cantidad:</p>
                            </div>
                            <div class="col-md-6 justify-content-start d-flex ms-3">
                                <?php woocommerce_quantity_input( array(
                                    'min_value'   => 1,
                                    'max_value'   => $product->get_max_purchase_quantity(),
                                    'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1,
                                ) ); ?>
                                <?php woocommerce_template_single_add_to_cart(); ?>
                            </div>
                        </div>
                    </form>

                    <!-- Botones personalizados (opcional: puedes dejar solo el de WooCommerce) -->
                    <div class="d-flex gap-3 my-5">
                        <button type="button" id="liveToastBtnCarrito" onclick="cambiarTextoBoton()" 
                                class="btn btn-secundary text-nowrap px-4 flex-fill">
                            <i class="bi bi-cart3"></i> Agregar al carrito
                        </button>
                        <a href="<?php echo wc_get_cart_url(); ?>" class="btn btn-secundary px-4 flex-fill">
                            Comprar ahora
                        </a>
                    </div>

                    <!-- Toast de confirmación -->
                    <div class="toast-container position-fixed bottom-0 end-0 p-3">
                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <i class="bi bi-bell-fill pe-1"></i>
                                <strong class="me-auto">Essenza</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body">
                                <p class="d-inline m-0 align-middle">Su producto ha sido añadido al carrito <i class="bi bi-check2 align-middle"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Advertencia -->
            <div class="row">
                <div class="col-md-10 my-4">
                    <h5 class="text-danger">Material inflamable: Utilizar con precaución</h5>
                </div>
            </div>
        </div>

        <!-- ================ PRODUCTOS RELACIONADOS ================ -->
        <?php woocommerce_output_related_products(); ?>
     <?php endwhile; ?>       
    </main>



    <?php get_footer(); ?>

