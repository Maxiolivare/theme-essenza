<?php
/*
Template Name: Métodos de Pago
*/
get_header();

// LOOP de WordPress
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<main class="perfil-main container">

  <h1 class="perfil-titulo">Metodos de pago</h1>

  <!-- Tarjeta guardada (visual) -->
  <div class="metodo-box">

    <div class="metodo-info">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-tarjeta.svg" alt="Tarjeta" class="metodo-icono">

      <div>
        <p class="metodo-tipo">Tarjeta de Crédito</p>
        <p class="metodo-detalle">•••• •••• •••• 1234</p>
        <p class="metodo-expira">Expira: 08/28</p>
      </div>
    </div>

    <div class="metodo-acciones">
      <a href="#" class="btn-accion editar">Editar</a>
      <a href="#" class="btn-accion eliminar">Eliminar</a>
    </div>

  </div>

  <!-- Botón agregar -->
  <div class="section__actions">
    <a href="#" class="btn btn--primary" id="btnAbrirModal">Agregar método de pago</a>
    <a href="perfil.html" class="btn btn--secondary">Cancelar</a>
  </div>

</main>

<?php
    endwhile;
endif;

get_footer();
?>
