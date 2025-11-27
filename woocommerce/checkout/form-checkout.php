<?php
/**
 * Checkout form (diseño personalizado basado en tu HTML)
 *
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

// Mostrar avisos
wc_print_notices();

// Hook obligatorio antes del formulario
do_action( 'woocommerce_before_checkout_form', $checkout );

// Bloquear si el carrito está vacío
if ( WC()->cart->is_empty() ) {
	wc_print_notice( __( 'Tu carrito está vacío.', 'woocommerce' ), 'error' );
	return;
}
?>

<form name="checkout" method="post" class="checkout woocommerce-checkout"
      action="<?php echo esc_url( wc_get_checkout_url() ); ?>"
      enctype="multipart/form-data">

<!-- MAIN (estructura y clases adaptadas desde tu HTML original) -->
<main>
	<!-- ACORDEÓN: RESUMEN DEL PEDIDO -->
	<div class="accordion " id="accordionExample">
		<div class="accordion-item blanco-secundario">
			<h2 class="accordion-header">
				<button class="accordion-button blanco-secundario collapsed d-flex align-items-center"
				        type="button"
				        data-bs-toggle="collapse"
				        data-bs-target="#collapseResumen"
				        aria-expanded="true"
				        aria-controls="collapseResumen">

					<span>Resumen del pedido
						<i class="bi bi-chevron-down accordion-icon ms-3" aria-hidden="true"></i>
						<i class="bi bi-chevron-up accordion-icon ms-3" aria-hidden="true"></i>
					</span>

					<div class="ms-auto">
						<span><?php echo WC()->cart->get_cart_total(); ?></span>
					</div>
				</button>
			</h2>

			<div id="collapseResumen" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<!-- Aquí va el resumen dinámico -->
					<div class="container">
						<div class="productos">
							<?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
								$_product   = $cart_item['data'];
								$quantity   = $cart_item['quantity'];
								$line_total = $cart_item['line_total'] + $cart_item['line_tax'];
								$thumbnail  = $_product->get_image( array( 'class' => 'imagen-miniatura ratio ratio-1x1 cuadrar-img bg-img rounded-4' ) );
							?>
								<div class="row mb-3 align-items-center">
									<div class="col-md-2 ">
										<?php echo $thumbnail; ?>
									</div>
									<div class="col-4 d-flex align-items-start flex-column d-inline-block">
										<p class="fw-semibold"><?php echo esc_html( $_product->get_name() ); ?></p>
										<p class="fw-light">Cantidad: <?php echo intval( $quantity ); ?></p>
									</div>
									<div class="col-sm-2 ms-auto">
										<p class="fw-semibold"><?php echo wc_price( $line_total ); ?></p>
									</div>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="row mx-auto">
							<div class="col-md-5 me-auto"><p>Subtotal</p></div>
							<div class="col-md-5 ms-auto"><div class="d-flex justify-content-end"><p><?php echo WC()->cart->get_cart_subtotal(); ?></p></div></div>
						</div>

						<div class="row mx-auto">
							<div class="col-md-5 me-auto"><p>Coste de envío</p></div>
							<div class="col-md-5 ms-auto"><div class="d-flex justify-content-end"><p><?php echo wc_price( WC()->cart->get_shipping_total() ); ?></p></div></div>
						</div>

						<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
						<div class="row mx-auto">
							<div class="col-md-5 me-auto"><p>IVA</p></div>
							<div class="col-md-5 ms-auto"><div class="d-flex justify-content-end"><p><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></p></div></div>
						</div>
						<?php endif; ?>

						<div class="row mx-auto">
							<div class="col-md-5 me-auto"><p>Total</p></div>
							<div class="col-md-5 ms-auto"><div class="d-flex justify-content-end"><p><?php echo WC()->cart->get_total(); ?></p></div></div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- FORMULARIO: contacto, dirección, envío y pago -->
	<div class="container my-5">
		<div class="row">
			<div class="col-md-8 mx-auto">

				<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

				<div id="customer_details">

					<!-- CONTACTO -->
					<h2>Contacto y Direccion de envio</h2>
					<div class="mb-3">
						<?php do_action( 'woocommerce_checkout_billing' ); ?>
					</div>

				</div>

				<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

			</div>
		</div>
	</div>

	<!-- SECCIÓN DE ENVÍO Y PAGO -->
	<div class="container my-5">
		<div class="row">
			<div class="col-md-8 mx-auto">

				<!-- FORMA DE ENVÍO -->
				<h5 class="fw-bold mb-2"></h5>
				<div class="mb-4">
					<?php
					do_action( 'woocommerce_review_order_before_shipping' );
					do_action( 'woocommerce_review_order_after_shipping' );
					?>
				</div>

				<!-- MÉTODO DE PAGO -->
				<h5 class="fw-bold mb-2">MÉTODO DE PAGO</h5>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<div id="order_review" class="mb-3 border border-naranjo-oscuro p-2 rounded-3 bg-white">
					<?php
					do_action( 'woocommerce_checkout_order_review' );
					// payment
					do_action( 'woocommerce_checkout_payment', $checkout );
					?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

				<!-- BOTÓN FINAL -->
				<div class="mt-4">
					<button type="submit"
					        class="w-100 border border-naranjo-oscuro p-2 rounded-3 bg-white fw-bold"
					        name="woocommerce_checkout_place_order"
					        id="place_order">
						<?php esc_html_e( 'Realizar pedido', 'woocommerce' ); ?>
					</button>
				</div>

				<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>

			</div>
		</div>
	</div>

</main>

</form>

<?php
// Hook obligatorio después del formulario
do_action( 'woocommerce_after_checkout_form', $checkout );
?>