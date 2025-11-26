<?php
defined('ABSPATH') || exit;

do_action( 'woocommerce_before_checkout_form', $checkout );

// Si el carrito está vacío
if ( WC()->cart->is_empty() ) {
    wc_print_notice( __( 'Tu carrito está vacío.', 'woocommerce' ), 'error' );
    return;
}
?>

<?php get_header(); ?>

<body class="fondo">

<main class="py-4 py-lg-5">
    <div class="container">

        <!-- RESUMEN DEL PEDIDO (ACORDEÓN) -->
        <div class="accordion mb-4" id="accordionExample">
            <div class="accordion-item blanco-secundario border-0 shadow-sm rounded-4">
                <h2 class="accordion-header">
                    <button class="accordion-button blanco-secundario collapsed fw-bold fs-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        Resumen del pedido
                        <i class="bi bi-chevron-down accordion-icon ms-3"></i>
                        <i class="bi bi-chevron-up accordion-icon ms-3"></i>
                        <span class="ms-auto fw-bold text-primary">
                            <?php echo WC()->cart->get_cart_total(); ?>
                        </span>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body pt-4">
                        <?php echo is_rtl() ? 'pe-5' : 'ps-5'; ?>">
                        <?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
                        <?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
                        <div id="order_review" class="woocommerce-checkout-review-order">
                            <?php do_action( 'woocommerce_checkout_order_review' ); ?>
                        </div>
                        <?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORMULARIO COMPLETO -->
        <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?
