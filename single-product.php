<?php
/**
 * single-product.php - WooCommerce Essenza
 * Sobreescribe el detalle de producto por completo
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php
global $product;
if ( ! is_a( $product, 'WC_Product' ) ) {
    $product = wc_get_product( get_the_ID() );
}
?>

<?php
remove_all_filters( 'woocommerce_cart_product_quantity' );
remove_action( 'woocommerce_before_quantity_input_field', 'woocommerce_quantity_input_label' );
remove_action( 'woocommerce_after_quantity_input_field', 'woocommerce_quantity_input_label' );
?>

<?php do_action( 'woocommerce_before_single_product' ); ?>

<main class="fondo">
<div class="container textos mt-5">
<div class="row">

<!-- IMÁGENES -->
<div class="col-md-6 mx-auto">
    <div class="mb-4">
        <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id() ); ?>" 
               data-fancybox="gallery" class="d-block ratio ratio-1x1 mb-3">
                <?php the_post_thumbnail( 'large', ['class' => 'img-fluid cuadrar-img w-100 bg-img rounded-4'] ); ?>
            </a>
        <?php endif; ?>

        <?php foreach ( $product->get_gallery_image_ids() as $attachment_id ) :
            $image_link = wp_get_attachment_url( $attachment_id ); ?>
            <a href="<?php echo esc_url( $image_link ); ?>" 
               data-fancybox="gallery"
               class="mx-auto d-inline-block w-25 bg-img ratio ratio-1x1 rounded-5 me-2 mb-3">
                <img src="<?php echo esc_url( $image_link ); ?>" class="img-fluid cuadrar-img" alt="">
            </a>
        <?php endforeach; ?>
    </div>
</div>

<!-- INFO -->
<div class="col-md-6 mx-auto">

<h1 class="titulos-48 text-cinzel fw-bold"><?php the_title(); ?></h1>
<p class="my-3"><?php the_excerpt(); ?></p>

<div class="mb-4">
    <h2 class="precio-tamano text-inter fw-semibold textos-naranja-oscuro mb-1 precio-tamano">
        <?php woocommerce_template_single_price(); ?>
    </h2>
    <small class="text-muted">IVA incluido</small>
</div>


<p class="my-3 parrafos-24">Detalles del producto:</p>
<?php wc_display_product_attributes( $product ); ?>

<!-- ================= FORM REAL DE WOOCOMMERCE ================= -->
<form class="cart" method="post" enctype="multipart/form-data"
      action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>">

<!-- CANTIDAD -->
<div class="mx-auto d-flex align-items-center my-4 mb-4">
    <div class="col-md-4">
        <p class="parrafos-24 mb-0">Cantidad:</p>
    </div>
    <div class="col-md-8 d-flex align-items-center ms-3">
        <?php
        woocommerce_quantity_input( array(
            'min_value'   => $product->get_min_purchase_quantity(),
            'max_value'   => $product->get_max_purchase_quantity(),
            'input_value' => 1,
            'classes'     => array( 'form-control', 'qty', 'text-center' ),
        ) );
        ?>
    </div>
</div>

<!-- BOTONES -->
<div class="d-flex gap-3 my-5">

    <button type="submit"
            name="add-to-cart"
            value="<?php echo esc_attr( $product->get_id() ); ?>"
            class="btn btn-secundary text-nowrap px-4 flex-fill single_add_to_cart_button">
        <i class="bi bi-cart3"></i> Agregar al carrito
    </button>

    <button type="submit"
            name="add-to-cart"
            value="<?php echo esc_attr( $product->get_id() ); ?>"
            formaction="<?php echo esc_url( wc_get_checkout_url() ); ?>"
            class="btn btn-secundary px-4 flex-fill">
        Comprar ahora
    </button>

</div>

</form>
<!-- ============================================================ -->

</div>
</div>

<div class="row">
    <div class="col-md-10 my-4">
        <h5 class="text-danger">Material inflamable: Utilizar con precaución</h5>
    </div>
</div>
</div>

<!-- RELACIONADOS (NO TOCADO) -->
<?php /* tu bloque de relacionados sigue igual */ ?>

</main>

<?php endwhile; ?>
<?php get_footer(); ?>
