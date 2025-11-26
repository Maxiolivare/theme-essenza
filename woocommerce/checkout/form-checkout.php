<?php
/**
 * Checkout Form
 * Tu diseño personalizado - 100% funcional con WooCommerce
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_checkout_form', $checkout);

// Si no hay carrito, redirigir al carrito
if (!$checkout->get_checkout_fields()) {
    wc_print_notice(__('El carrito está vacío.', 'woocommerce'), 'error');
    return;
}
?>

<div class="accordion mb-4" id="accordionResumen">
    <div class="accordion-item blanco-secundario">
        <h2 class="accordion-header">
            <button class="accordion-button blanco-secundario collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseResumen" aria-expanded="false">
                <span>Resumen del pedido<i class="bi bi-chevron-down accordion-icon ms-3"></i><i class="bi bi-chevron-up accordion-icon ms-3"></i></span>
                <div class="ms-auto">
                    <strong><?php echo WC()->cart->get_cart_total(); ?></strong>
                </div>
            </button>
        </h2>
        <div id="collapseResumen" class="accordion-collapse collapse show" data-bs-parent="#accordionResumen">
            <div class="accordion-body">
                <div class="container">
                    <?php foreach (WC()->cart->get_cart() as $cart_item) :
                        $product = $cart_item['data'];
                        $thumbnail = $product->get_image('thumbnail', ['class' => 'imagen-miniatura ratio ratio-1x1 cuadrar-img bg-img rounded-4']);
                    ?>
                        <div class="row mb-3 align-items-center">
                            <div class="col-md-2"><?php echo $thumbnail; ?></div>
                            <div class="col-4 d-flex align-items-start flex-column">
                                <p class="fw-semibold mb-0"><?php echo $product->get_name(); ?></p>
                                <small class="fw-light">Cantidad: <?php echo $cart_item['quantity']; ?></small>
                            </div>
                            <div class="col-sm-2 ms-auto text-end">
                                <p class="fw-semibold mb-0"><?php echo wc_price($cart_item['line_total'] + $cart_item['line_tax']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <hr>

                    <div class="row mx-auto">
                        <div class="col-md-5 me-auto"><p>Subtotal</p></div>
                        <div class="col-md-5 ms-auto text-end"><p><?php echo WC()->cart->get_cart_subtotal(); ?></p></div>
                    </div>
                    <div class="row mx-auto">
                        <div class="col-md-5 me-auto"><p>Coste de envío</p></div>
                        <div class="col-md-5 ms-auto text-end"><p><?php echo WC()->cart->get_cart_shipping_total(); ?></p></div>
                    </div>
                    <?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) : ?>
                        <div class="row mx-auto">
                            <div class="col-md-5 me-auto"><p>IVA</p></div>
                            <div class="col-md-5 ms-auto text-end"><p><?php echo WC()->cart->get_taxes_total(true, true); ?></p></div>
                        </div>
                    <?php endif; ?>
                    <div class="row mx-auto fw-bold">
                        <div class="col-md-5 me-auto"><p>Total</p></div>
                        <div class="col-md-5 ms-auto text-end"><p><?php echo WC()->cart->get_total(); ?></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <h2 class="mb-4">Contacto</h2>

                <?php do_action('woocommerce_checkout_billing_form', $checkout); ?>

                <h2 class="mt-5 mb-4">Dirección de envío</h2>

                <?php do_action('woocommerce_checkout_shipping_form', $checkout); ?>

            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <!-- Métodos de envío -->
                <h5 class="fw-bold mb-3">FORMA DE ENVÍO</h5>
                <div class="woocommerce-checkout-shipping-methods">
                    <?php do_action('woocommerce_checkout_before_shipping_methods'); ?>
                    <?php do_action('woocommerce_checkout_shipping'); ?>
                    <?php do_action('woocommerce_checkout_after_shipping_methods'); ?>
                </div>

                <!-- Métodos de pago -->
                <h5 class="fw-bold mb-3 mt-5">MÉTODO DE PAGO</h5>
                <div class="woocommerce-checkout-payment-methods">
                    <?php do_action('woocommerce_checkout_payment'); ?>
                </div>

                <!-- Botón final -->
                <div class="form-row place-order mt-5">
                    <?php woocommerce_checkout_place_order_button(); ?>
                </div>

                <?php wp_nonce_field('woocommerce-process_checkout', 'woocommerce-process-checkout-nonce'); ?>
            </div>
        </div>
    </div>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>