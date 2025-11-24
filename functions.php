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

// Ocultar títulos WooCommerce
add_filter('woocommerce_show_page_title', '__return_false');
