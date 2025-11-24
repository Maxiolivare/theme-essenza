<?php
defined( 'ABSPATH' ) || exit;
wc_print_notices();
?>

<div class="carrito-container">

    <h2 class="carrito-titulo">Tu carrito</h2>

    <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">

        <table class="shop_table carrito-tabla">
            <thead>
                <tr>
                    <th class="col-producto">Producto</th>
                    <th class="col-total">Total</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                    $_product = $cart_item['data'];
                    if ( ! $_product || ! $_product->exists() ) continue;

                    $product_id = $cart_item['product_id'];
                    $product_link = $_product->is_visible() ? $_product->get_permalink() : '';
                ?>

                <tr class="carrito-item">

                    <!-- IMAGEN -->
                    <td class="producto-info">
                        <div class="carrito-producto">
                            <div class="carrito-producto-img">
                                <?php echo $_product->get_image(); ?>
                            </div>

                            <div class="carrito-producto-detalles">
                                <h3><?php echo $_product->get_name(); ?></h3>

                                <span class="precio-unitario">
                                    <?php echo wc_price( $_product->get_price() ); ?>
                                </span>

                                <!-- CANTIDAD -->
                                <div class="cantidad-wrap">
                                    <?php
                                    echo wc_get_formatted_cart_item_data( $cart_item );
                                    woocommerce_quantity_input(
                                        array(
                                            'input_name'  => "cart[{$cart_item_key}][qty]",
                                            'input_value' => $cart_item['quantity'],
                                            'min_value'   => 1,
                                        )
                                    );
                                    ?>
                                </div>

                                <!-- ELIMINAR -->
                                <a class="eliminar-producto"
                                   href="<?php echo esc_url( wc_get_cart_remove_url( $cart_item_key ) ); ?>">
                                   Eliminar producto
                                </a>
                            </div>
                        </div>
                    </td>

                    <!-- TOTAL -->
                    <td class="producto-total">
                        <?php echo WC()->cart->get_product_subtotal($_product, $cart_item['quantity']); ?>
                    </td>
                </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- BOTÓN ACTUALIZAR CARRITO -->
        <button type="submit" class="boton-actualizar" name="update_cart">
            Actualizar
        </button>

    </form>

    <!-- TOTAL GENERAL -->
    <div class="carrito-total">
        <p>Total de la compra: <strong><?php wc_cart_totals_order_total_html(); ?></strong></p>
        <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn-comprar">Comprar</a>
    </div>

</div>

