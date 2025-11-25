<?php
defined( 'ABSPATH' ) || exit;
?>

<main>
    <div class="container">
        
        <!-- TÍTULO -->
        <h1 class="h1n">Tu carrito</h1>

        <!-- ACCIONES DE ARRIBA -->
        <div class="row text-center mb-4">
            <div class="col-6">
                <a class="link-carrito" href="<?php echo wc_get_cart_url(); ?>">
                    <img class="mb-2 fs-1 text-accent icono-basura-vela" src="<?php echo get_template_directory_uri();?>/assets/img/Trash.png">
                    <p class="m-0 text-accent">Eliminar</p>
                </a>
            </div>

            <div class="col-6">
                <a class="link-carrito" href="<?php echo wc_get_page_permalink( 'shop' ); ?>">
                    <img class="mb-2 fs-1 text-accent icono-basura-vela" src="<?php echo get_template_directory_uri();?>/assets/img/vela.png">
                    <p class="m-0">Seguir comprando</p>
                </a>
            </div>
        </div>

        <!-- PRODUCTO / TOTAL -->
        <div class="producto-total">
            <div class="col-6">Producto</div>
            <div class="col-6 text-end">Total</div>
        </div>

        <hr class="linea-carrito">

        <!-- FORMULARIO DEL CARRITO -->
        <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                
                $product = $cart_item['data'];
                if ( ! $product || !$product->exists() ) continue;
                
                $product_id = $product->get_id(); 
                $nombre     = $product->get_name();
                $precio     = wc_price( $product->get_price() );
                $subtotal   = WC()->cart->get_product_subtotal( $product, $cart_item['quantity'] );
                $img        = $product->get_image( 'woocommerce_thumbnail', ['class' => 'imagen-p-carrito rounded product-img'] );

            ?>

            <!-- FILA DE PRODUCTO -->
            <div class="row align-items-center py-4">

                <!-- CHECK + IMAGEN -->
                <div class="col-4 d-flex chekp">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                    </div>

                    <?php echo $img; ?>

                </div>

                <!-- NOMBRE, PRECIO, CANTIDAD, ELIMINAR -->
                <div class="col-6">

                    <h5 class="mb-1 nombre-carrito"><?php echo esc_html( $nombre ); ?></h5>

                    <p class="mb-3"><?php echo $precio; ?></p>

                    <!-- CANTIDAD PERSONALIZADA -->
                    <div class="mb-3 cantidad-box">

                        <div class="btn-group me-3" role="group">

                            <!-- Botón restar -->
                            <button type="button"
                                class="btn btn-primary bg-white border-naranjo-oscuro textos-naranja-oscuro border-end-0 btn-lg qty-btn-custom"
                                data-type="minus"
                                data-target="<?php echo $cart_item_key; ?>">
                                <i class="bi bi-dash-circle"></i>
                            </button>

                            <!-- Botón cantidad visual -->
                            <button type="button"
                                id="cantidadVisual-<?php echo $cart_item_key; ?>"
                                class="btn btn-primary bg-white border-naranjo-oscuro textos-naranja-oscuro border-end-0 border-start-0 btn-lg">
                                <?php echo $cart_item['quantity']; ?>
                            </button>

                            <!-- Input real que WooCommerce necesita -->
                            <input type="number"
                                class="d-none"
                                name="cart[<?php echo $cart_item_key; ?>][qty]"
                                id="qty-real-<?php echo $cart_item_key; ?>"
                                value="<?php echo $cart_item['quantity']; ?>"
                                min="1" />

                            <!-- Botón sumar -->
                            <button type="button"
                                class="btn btn-primary bg-white border-naranjo-oscuro textos-naranja-oscuro border-start-0 btn-lg qty-btn-custom"
                                data-type="plus"
                                data-target="<?php echo $cart_item_key; ?>">
                                <i class="bi bi-plus-circle"></i>
                            </button>

                        </div>

                    </div>

                    <div>
                        <a 
                            class="btn minar-p btn-link p-0 mt-2"
                            href="<?php echo wc_get_cart_remove_url( $cart_item_key ); ?>"
                        >
                            Eliminar producto
                        </a>
                    </div>

                </div>

                <!-- SUBTOTAL -->
                <div class="col-2 text-end fs-5">
                    <?php echo $subtotal; ?>
                </div>

            </div>

            <?php endforeach; ?>

            <button type="submit" class="d-none" name="update_cart"></button>

        </form>

        <!-- TOTAL FINAL -->
        <div class="checkout-total">
            <span>Total de la compra</span>
            <span class="total-monto">
                <?php echo wc_price( WC()->cart->total ); ?>
            </span>
        </div>

        <!-- BOTÓN COMPRAR -->
        <a href="<?php echo wc_get_checkout_url(); ?>" class="buy-btn">
            Comprar
        </a>

    </div>
</main>


<!-- SCRIPT PARA MANEJAR CANTIDAD -->
<script>
document.querySelectorAll(".qty-btn-custom").forEach(btn => {
    btn.addEventListener("click", function () {

        const type = this.dataset.type;
        const key = this.dataset.target;

        const realInput = document.getElementById("qty-real-" + key);
        const visualBtn = document.getElementById("cantidadVisual-" + key);

        let current = parseInt(realInput.value);

        if (type === "minus" && current > 1) current--;
        if (type === "plus") current++;

        realInput.value = current;
        visualBtn.innerText = current;

        // Actualizar automáticamente el carrito
        document.querySelector("button[name='update_cart']").click();
    });
});
</script>






