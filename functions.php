<?php
add_theme_support('post-thumbnails');

function mi_tema_soporte_woocommerce() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mi_tema_soporte_woocommerce' );

/* modificar woocommerce */
add_filter( 'woocommerce_show_page_title', '__return_false' );