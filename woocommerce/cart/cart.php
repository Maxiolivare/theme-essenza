<div class="container cart-custom py-5">

    <!-- Título -->
    <h2 class="text-center cart-title mb-5">Tu carrito</h2>

    <!-- Acciones superiores -->
    <div class="row justify-content-between text-center mb-5 cart-actions">
        <div class="col-6 col-md-3">
            <img src="ICONO_ELIMINAR.svg" class="icon-top mb-2" alt="">
            <p class="action-text">Eliminar</p>
        </div>

        <div class="col-6 col-md-3">
            <img src="ICONO_COMPRAR.svg" class="icon-top mb-2" alt="">
            <p class="action-text">Seguir comprando</p>
        </div>
    </div>

    <!-- Encabezado -->
    <div class="row fw-semibold border-bottom pb-2 mb-4 small text-muted">
        <div class="col-8">Producto</div>
        <div class="col-4 text-end">Total</div>
    </div>

    <!-- Loop de productos -->
    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

        <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :

            $product = $cart_item['data'];

            if ( ! $product || ! $product->exists() ) continue;

        ?>

        <div class="row align-items-center cart-item py-4 border-bottom">

            <!-- Check decorativo -->
            <div class="col-auto pe-0">
                <span class="check-circle <?php echo $cart_item['quantity'] > 0 ? 'active' : ''; ?>"></span>
            </div>

            <!-- Imagen -->
            <div class="col-auto">
                <?php echo $product->get_image( 'woocommerce_thumbnail', ['class' => 'product-img rounded'] ); ?>
            </div>

            <!-- Contenido principal: nombre, precio, cantidad -->
            <div class="col ps-4">

                <p class="product-name mb-1 fw-semibold">
                    <?php echo esc_html( $product->get_name() ); ?>
                </p>

                <p class="price mb-2 small">
                    $<?php echo number_format( $product->get_price(), 0, ',', '.' ); ?>
                </p>

                <!-- Box cantidad -->
                <div class="qty-box d-inline-flex align-items-center border rounded px-2 me-3">

                    <button type="button" class="qty-btn" data-type="minus">-</button>

                    <?php
                        woocommerce_quantity_input([
                            'input_class' => 'qty-input',
                            'product_name' => ' ', 
                        ], $product, $cart_item_key);
                    ?>

                    <button type="button" class="qty-btn" data-type="plus">+</button>
                </div>

                <!-- Eliminar -->
                <a class="remove-link small d-block mt-1"
                   href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>">
                    Eliminar producto
                </a>

            </div>

            <!-- Subtotal -->
            <div class="col-3 text-end">

                <p class="subtotal fw-semibold mb-0">
                    <?php
                        echo WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] );
                    ?>
                </p>

            </div>

        </div>

        <?php endforeach; ?>

        <button type="submit" name="update_cart" class="d-none"></button>

    </form>

    <!-- Total general -->
    <div class="row justify-content-end mt-5">

        <div class="col-auto text-end">
            <p class="total-label mb-0">Total de la compra</p>
        </div>

        <div class="col-auto">
            <p class="total-amount fw-bold mb-0">
                $<?php echo number_format( WC()->cart->total, 0, ',', '.' ); ?>
            </p>
        </div>

    </div>

    <!-- Botón comprar -->
    <div class="text-center mt-4">
        <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>"
           class="btn btn-buy px-5 py-2">
           Comprar
        </a>
    </div>

</div>




