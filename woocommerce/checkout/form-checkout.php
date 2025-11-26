<?php
/**
 * Checkout form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * @version 9.4.0
 */

<?php
defined( 'ABSPATH' ) || exit;

// Required by WooCommerce – show notices
wc_print_notices();

// Required hook
do_action( 'woocommerce_before_checkout_form', $checkout );

// Block checkout if cart empty
if ( WC()->cart->is_empty() ) {
    wc_print_notice( __('Tu carrito está vacío.', 'woocommerce'), 'error' );
    return;
}
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" 
    action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

<?php get_header(); ?>

<main class="py-4 py-lg-5">
<div class="container">

    <!-- RESUMEN DEL PEDIDO -->
    <div class="accordion mb-5" id="accordionResumen">
        <div class="accordion-item blanco-secundario border-0 shadow-sm rounded-4">
            <h2 class="accordion-header">
                <button class="accordion-button blanco-secundario collapsed fw-bold fs-5" 
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseResumen">
                    Resumen del pedido
                    <i class="bi bi-chevron-down ms-3"></i>
                    <i class="bi bi-chevron-up ms-3"></i>
                    <span class="ms-auto fw-bold"><?php echo WC()->cart->get_cart_total(); ?></span>
                </button>
            </h2>
            <div id="collapseResumen" class="accordion-collapse collapse show">
                <div class="accordion-body pt-4">

                    <?php foreach ( WC()->cart->get_cart() as $cart_item ) :
                        $product    = $cart_item['data'];
                        $thumbnail  = $product->get_image(array('class' => 'imagen-miniatura ratio ratio-1x1 cuadrar-img bg-img rounded-4'));
                    ?>
                        <div class="row align-items-center mb-3">
                            <div class="col-2"><?php echo $thumbnail; ?></div>
                            <div class="col-6 col-md-7">
                                <p class="fw-semibold mb-0"><?php echo $product->get_name(); ?></p>
                                <small class="text-muted">Cantidad: <?php echo $cart_item['quantity']; ?></small>
                            </div>
                            <div class="col text-end">
                                <strong><?php echo wc_price( $cart_item['line_total'] + $cart_item['line_tax'] ); ?></strong>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <hr class="my-4">

                    <div class="row fw-bold text-dark">
                        <div class="col">Subtotal</div>
                        <div class="col text-end"><?php echo WC()->cart->get_cart_subtotal(); ?></div>
                    </div>
                    <div class="row text-dark">
                        <div class="col">Envío</div>
                        <div class="col text-end"><?php echo WC()->cart->get_cart_shipping_total(); ?></div>
                    </div>

                    <?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
                    <div class="row text-dark">
                        <div class="col">IVA</div>
                        <div class="col text-end"><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></div>
                    </div>
                    <?php endif; ?>

                    <div class="row fs-5 fw-bold text-primary mt-3">
                        <div class="col">Total</div>
                        <div class="col text-end"><?php echo WC()->cart->get_total(); ?></div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- FORMULARIO -->
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <h2 class="mb-4">Contacto</h2>
            <?php do_action( 'woocommerce_checkout_billing' ); ?>

            <h2 class="mt-5 mb-4">Dirección de envío</h2>
            <?php do_action( 'woocommerce_checkout_shipping' ); ?>

            <h5 class="fw-bold mt-5 mb-3">FORMA DE ENVÍO</h5>
            <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

            <h5 class="fw-bold mt-5 mb-3">MÉTODO DE PAGO</h5>
            <?php do_action( 'woocommerce_checkout_payment', $checkout ); ?>

            <div class="mt-5">
                <button type="submit" class="w-100 btn btn-lg border border-naranjo-oscuro bg-naranjo text-white fw-bold py-3 rounded-3 shadow" 
                    name="woocommerce_checkout_place_order" id="place_order">
                    Realizar pedido
                </button>
            </div>

            <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>

        </div>
    </div>

</div>
</main>

<?php get_footer(); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
