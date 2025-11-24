<?php
/**
 * Custom Shop Page Template
 * Clean version without duplicate loops
 * Template: archive-product.php
 */

defined('ABSPATH') || exit();

get_header(); ?>

<main>
  <div class="productos">
    <h1 class="productos-h1">PRODUCTOS</h1>
    <ul>
      <li class="categorias">
        <a href="#" onclick="mostrarSubmenu(event)">Categorías ▼</a>
        <ul class="submenu" id="lista-categorias">
          <li><a onclick="mostrarCategoria('florales')">Arreglos florales</a></li>
          <li><a onclick="mostrarCategoria('gourmet')">Gourmet</a></li>
          <li><a onclick="mostrarCategoria('flores')">Flores</a></li>
          <li><a onclick="mostrarCategoria('animales')">Animales</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <div id="contenedor-categorias" class="contenedor-categorias"></div>

  <?php
  /**
   * Aquí WooCommerce maneja el loop completo sin duplicarse.
   */
  woocommerce_content();
  ?>
</main>

<?php get_footer(); ?>