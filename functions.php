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

// para activar personalizacion de checkout
add_filter( 'woocommerce_checkout_block_enabled', '__return_false' );
add_filter( 'wc_blocks_checkout_enabled', '__return_false' );
add_filter( 'woocommerce_cart_block_enabled', '__return_false' ); 