<?php echo "<!-- CARRITO PERSONALIZADO -->"; ?>

<?php
/**
 * Custom Cart Page Template
 * Compatible with WooCommerce 10.1.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' );
?>

<div class="carrito-container">
    <h2 class="carrito-titulo">Tu carrito</h2>

    <?php wc_print_notices(); ?>

    <form class="woocommerce-cart-form" 
          action="<?php echo esc_url( wc_get_cart_url() ); ?>" 
          method="post">

        <table class="carrito-tabla">
            <thead>
                <tr>
                    <th class="carrito-col-producto">Producto</th>
                    <th class="carrito-col-total">Total</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :

                    $_product = $cart_item['data'];

                    if ( ! $_product || ! $_product->exists() ) continue;

                    ?>
                    <tr class="carrito-item">

                        <!-- PRODUCTO -->
                        <td class="carrito-producto">
                            <div class="carrito-producto-imagen">
                                <?php echo $_product->get_image('woocommerce_thumbnail'); ?>
                            </div>

                            <div class="carrito-producto-detalles">
                                <h3 class="carrito-producto-nombre">
                                    <?php echo $_product->get_name(); ?>
                                </h3>

                                <span class="carrito-precio-unitario">
                                    <?php echo wc_price( $_product->get_price() ); ?>
                                </span>

                                <div class="carrito-cantidad">
                                    <?php
                                    woocommerce_quantity_input( array(
                                        'input_name'  => "cart[{$cart_item_key}][qty]",
                                        'input_value' => $cart_item['quantity'],
                                        'min_value'   => 1,
                                    ) );
                                    ?>
                                </div>

                                <a class="carrito-eliminar"
                                   href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>">
                                    Eliminar producto
                                </a>
                            </div>
                        </td>

                        <!-- TOTAL ITEM -->
                        <td class="carrito-total-item">
                            <?php echo WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ); ?>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <button type="submit" class="carrito-actualizar" name="update_cart">
            Actualizar carrito
        </button>

        <?php wp_nonce_field( 'woocommerce-cart' ); ?>
    </form>

    <!-- RESUMEN -->
    <div class="carrito-resumen">
        <p class="carrito-total-general">
            Total de la compra:
            <strong><?php wc_cart_totals_order_total_html(); ?></strong>
        </p>

        <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" 
           class="carrito-btn-comprar">
            Comprar
        </a>
    </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>


