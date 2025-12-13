<?php
/*
Template Name: Perfil
*/
get_header();

// LOOP de WordPress
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<main class="perfil-container container">

  <h1 class="perfil-title"><?php the_title(); ?></h1>

  <div class="perfil-grid">

    <!-- Datos personales -->
    <div class="perfil-block">
      <h2 class="perfil-block__title">Datos personales</h2>

      <p class="perfil-line"><strong>Nombre:</strong> Luis Astudillo</p>
      <p class="perfil-line"><strong>Email:</strong> luis@example.com</p>
      <p class="perfil-line"><strong>Teléfono:</strong> +56 9 1234 5678</p>

      <a href="editar-datos.html" class="btn btn--secondary btn--ghost">Editar información</a>
    </div>

    <!-- Dirección -->
    <div class="perfil-block">
      <h2 class="perfil-block__title">Dirección principal</h2>

      <p class="perfil-line">Av. Libertad 1234, Viña del Mar</p>
      <p class="perfil-line">Chile</p>

      <a href="editar-direccion.html" class="btn btn--secondary btn--ghost">Editar dirección</a>
    </div>

    <!-- Métodos de pago -->
    <div class="perfil-block">
      <h2 class="perfil-block__title">Métodos de pago</h2>

      <p class="perfil-line"><strong>Tarjeta guardada:</strong> Visa terminada en 4582</p>
      <p class="perfil-line"><strong>Expira:</strong> 07/27</p>

      <a href="metodos-pago.html" class="btn btn--secondary btn--ghost">Administrar métodos de pago</a>
    </div>

    <!-- Último pedido -->
    <div class="perfil-block">
      <h2 class="perfil-block__title">Último pedido</h2>

      <p class="perfil-line"><strong>ID Pedido:</strong> #2351</p>
      <p class="perfil-line"><strong>Estado:</strong> Entregado</p>
      <p class="perfil-line"><strong>Total:</strong> $15.000</p>

      <a href="historial-compras.html" class="btn btn--secondary btn--ghost">Ver historial de compras</a>
    </div>

  </div>

</main>

<?php
    endwhile;
endif;

get_footer();
?>
