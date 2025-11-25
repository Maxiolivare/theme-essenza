<div class="container cart-custom py-5">
<?php echo '<!-- CUSTOM CART LOADED -->'; ?>
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

    <!-- Encabezado tabla -->
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

        <div class="row align-items-center mb-4 cart-item">
            
            <!-- Checkbox -->
            <div class="col-auto">
                <span class="check-circle <?php echo $cart_item['quantity'] > 0 ? 'active' : ''; ?>"></span>
            </div>

            <!-- Imagen -->
            <div class="col-auto">
                <?php echo $product->get_image( 'woocommerce_thumbnail', ['class' => 'rounded product-img'] ); ?>
            </div>

            <!-- Nombre, precio, cantidad -->
            <div class="col">
                <p class="product-name mb-1"><?php echo $product->get_name(); ?></p>
                <p class="price mb-2">$<?php echo $product->get_price(); ?></p>

                <div class="qty-box d-inline-flex align-items-center border rounded px-2 me-3">
                    <button type="button" class="qty-btn" data-type="minus">-</button>
                    <?php
                        woocommerce_quantity_input([
                            'input_class' => 'qty-input',
                        ], $product, $cart_item_key);
                    ?>
                    <button type="button" class="qty-btn" data-type="plus">+</button>
                </div>

                <a class="remove-link" href="<?php echo wc_get_cart_remove_url( $cart_item_key ); ?>">
                    Eliminar producto
                </a>
            </div>

            <!-- Subtotal -->
            <div class="col-3 text-end">
                <p class="subtotal fw-semibold">
                    <?php echo WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] ); ?>
                </p>
            </div>

        </div>

        <?php endforeach; ?>

        <!-- Botón actualizar -->
        <button type="submit" class="d-none" name="update_cart"></button>
    </form>

    <!-- Total -->
    <div class="row justify-content-end mt-5">
        <div class="col-auto text-end">
            <p class="total-label">Total de la compra</p>
        </div>
        <div class="col-auto">
            <p class="total-amount fw-bold">$<?php echo WC()->cart->total; ?></p>
        </div>
    </div>

    <!-- Botón comprar -->
    <div class="text-center mt-4">
        <a href="<?php echo wc_get_checkout_url(); ?>" class="btn btn-buy px-5 py-2">Comprar</a>
    </div>
</div>



