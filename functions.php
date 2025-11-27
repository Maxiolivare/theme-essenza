<?php
// Soporte WooCommerce
function theme_essenza_soporte_woocommerce() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    add_theme_support('wc-product-gallery-zoom');
}
add_action('after_setup_theme', 'theme_essenza_soporte_woocommerce');

// Thumbnails
add_theme_support('post-thumbnails');

function ocultar_titulo_solo_en_tienda($show) {
    if (is_shop()) {
        return false;
    }
    return $show;
}
add_filter('woocommerce_show_page_title', 'ocultar_titulo_solo_en_tienda');

// Desactivar todos los mensajes (notices) de WooCommerce
remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_cart', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_notices', 'wc_print_notices', 10 );

// ---------------------------------------------------------------------
// ACTIVAR SOPORTE WOOCOMMERCE EN EL TEMA
// ---------------------------------------------------------------------
function mi_tema_soporte_wc() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'mi_tema_soporte_wc' );


// ---------------------------------------------------------------------
// ASEGURAR QUE LOS FRAGMENTOS AJAX ESTÉN ACTIVOS (impide recarga completa)
// ---------------------------------------------------------------------
function mi_forzar_cart_fragments() {
    wp_enqueue_script( 'wc-cart-fragments' ); // Importantísimo
}
add_action( 'wp_enqueue_scripts', 'mi_forzar_cart_fragments', 1 );


// ---------------------------------------------------------------------
// EVITAR QUE OTRO CÓDIGO DESACTIVE LOS FRAGMENTOS
// (MUY común en tutoriales que rompen el AJAX del carrito)
// ---------------------------------------------------------------------
function mi_prevenir_desactivacion_fragmentos( $scripts ) {
    if ( isset( $scripts['wc-cart-fragments'] ) ) {
        $scripts['wc-cart-fragments']['deps'][] = 'jquery';
    }
    return $scripts;
}
add_filter( 'woocommerce_get_scripts', 'mi_prevenir_desactivacion_fragmentos' );


// ---------------------------------------------------------------------
// OCULTAR LOS MENSAJES TIPO:
// “X se ha añadido al carrito. Ver carrito”
// (como pediste anteriormente)
// ---------------------------------------------------------------------
add_filter( 'wc_add_to_cart_message_html', '__return_empty_string' );
add_filter( 'woocommerce_coupon_message', '__return_empty_string' );
add_filter( 'woocommerce_remove_cart_item_notice', '__return_empty_string' );