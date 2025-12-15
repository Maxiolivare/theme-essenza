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

add_action('wp_ajax_custom_add_to_cart', 'custom_add_to_cart');
add_action('wp_ajax_nopriv_custom_add_to_cart', 'custom_add_to_cart');

function custom_add_to_cart() {

    if ( ! isset($_POST['product_id'], $_POST['quantity']) ) {
        wp_send_json_error();
    }

    $product_id = absint($_POST['product_id']);
    $quantity   = max(1, absint($_POST['quantity']));

    WC()->cart->add_to_cart($product_id, $quantity);

    wp_send_json_success();
}

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

// Ocultar aviso y formulario de cupón en el checkout
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
// Ocultar todos los notices de WooCommerce en el checkout
add_action( 'wp', function() {
    if ( is_checkout() && ! is_wc_endpoint_url() ) {
        remove_action( 'woocommerce_before_checkout_form', 'woocommerce_output_all_notices', 10 );
        remove_action( 'woocommerce_before_checkout_form', 'woocommerce_show_messages', 10 );
        remove_action( 'woocommerce_before_cart', 'woocommerce_output_all_notices', 10 );
        remove_action( 'woocommerce_before_single_product', 'woocommerce_output_all_notices', 10 );
    }
});
//custom post types
function registrar_cpt_ferias() {

  $labels = array(
    'name'               => 'Ferias',
    'singular_name'      => 'Feria',
    'menu_name'          => 'Ferias',
    'add_new'            => 'Agregar feria',
    'add_new_item'       => 'Agregar nueva feria',
    'edit_item'          => 'Editar feria',
    'new_item'           => 'Nueva feria',
    'view_item'          => 'Ver feria',
    'search_items'       => 'Buscar ferias',
    'not_found'          => 'No hay ferias',
    'not_found_in_trash' => 'No hay ferias en la papelera',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => true, // Gutenberg / REST
    'has_archive'        => false,
    'rewrite'            => array( 'slug' => 'ferias' ),
    'supports'           => array( 'title' ),
  );

  register_post_type( 'ferias', $args );
}
add_action( 'init', 'registrar_cpt_ferias' );

// Para que woocommerce no reescriba el css de checkout
add_filter( 'woocommerce_form_field_args', 'essenza_estilos_checkout', 10, 3 );
function essenza_estilos_checkout( $args, $key, $value ) {

	// input, select, textarea
	$args['input_class'][] = 'form-control';
	$args['input_class'][] = 'border-naranjo-oscuro';
	$args['input_class'][] = 'blanco-secundario';

	// wrapper (p.form-row)
	$args['class'][] = 'mb-3';

	// label
	$args['label_class'][] = 'form-label';

	return $args;
}

