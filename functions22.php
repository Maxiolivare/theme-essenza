<?php
// ==== ESSENZA - functions.php (versión 100% segura y funcional) ====

// Soporte WooCommerce + galería
function essenza_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'essenza_woocommerce_support');

// Thumbnails
add_theme_support('post-thumbnails');

// Ocultar título solo en la página de tienda
add_filter('woocommerce_show_page_title', function($show) {
    return is_shop() ? false : $show;
});

// AJAX add to cart sin recargar página
add_action('wp_enqueue_scripts', function() {
    if (is_product()) {
        wp_enqueue_script('wc-add-to-cart');
    }
    wp_enqueue_script('wc-cart-fragments');
});

// (Opcional) Quitar sidebar si no la usas
add_action('widgets_init', function() {
    unregister_sidebar('sidebar-1');
});

?>
