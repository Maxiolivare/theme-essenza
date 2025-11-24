<?php
/**
 * Custom Shop Page Template
 * Overridden from WooCommerce archive-product.php
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

// Abrir contenedor principal
do_action( 'woocommerce_before_main_content' );
?>

<div class="tienda-header">
    <h1 class="titulo-tienda">Tienda</h1>

    <div class="filtros-tienda">
        <button class="btn-filtro categoria">Categorías</button>
        <button class="btn-filtro ordenar">Ordenar</button>
    </div>
</div>

<?php
if ( woocommerce_product_loop() ) {

    // ---------- LIMPIAR FILTROS DEFAULT ----------
    // Estos hooks son removidos en functions.php:
    // woocommerce_result_count
    // woocommerce_catalog_ordering
    do_action( 'woocommerce_before_shop_loop' );

    // ---------- LOOP DE PRODUCTOS ----------
    woocommerce_product_loop_start();

    if ( wc_get_loop_prop( 'total' ) ) {
        while ( have_posts() ) {
            the_post();

            do_action( 'woocommerce_shop_loop' );

            // Aquí entra cada tarjeta de producto
            wc_get_template_part( 'content', 'product' );
        }
    }

    woocommerce_product_loop_end();

    // ---------- PAGINACIÓN ----------
    do_action( 'woocommerce_after_shop_loop' );

} else {

    do_action( 'woocommerce_no_products_found' );
}

// Cerrar contenedor principal
do_action( 'woocommerce_after_main_content' );

// Sidebar (si tu tema no usa sidebar, lo puedes quitar)
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
