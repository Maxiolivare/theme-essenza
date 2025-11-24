<?php
/**
 * Custom Shop Page Template
 * Overridden from WooCommerce archive-product.php
 */
defined( 'ABSPATH' ) || exit;
// Abrir contenedor principal
do_action( 'woocommerce_before_main_content' );
?>
<?php get_header(); ?>
  <main>
      <div class="productos">
        <h1 class="productos-h1">PRODUCTOS</h1>
        <ul>
          <li class="categorias">
            <a href="#" onclick="mostrarSubmenu(event)">Categorías ▼</a>
            <!-- SUBMENÚ -->
            <ul class="submenu" id="lista-categorias">
              <li><a onclick="mostrarCategoria('florales')">Arreglos florales</a></li>
              <li><a onclick="mostrarCategoria('gourmet')">Gourmet</a></li>
              <li><a onclick="mostrarCategoria('flores')">Flores</a></li>
              <li><a onclick="mostrarCategoria('animales')">Animales</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- IMÁGENES -->
      <div id="contenedor-categorias" class="contenedor-categorias"></div>
  </main>
<?php
if ( woocommerce_product_loop() ) {
    do_action( 'woocommerce_before_shop_loop' );

    // ---------- LOOP DE PRODUCTOS ----------
    woocommerce_product_loop_start();

    if ( wc_get_loop_prop( 'total' ) ) {
        while ( have_posts() ) {
            the_post();

            do_action( 'woocommerce_shop_loop' );

            // tarjeta de producto
            wc_get_template_part( 'content', 'product' );
        }
    }

    woocommerce_product_loop_end();

    // ---------- PAGINACIÓN ----------
    do_action( 'woocommerce_after_shop_loop' );

} else {

    do_action( 'woocommerce_no_products_found' );
}

do_action( 'woocommerce_after_main_content' );
?>

<?php get_footer(); ?>
