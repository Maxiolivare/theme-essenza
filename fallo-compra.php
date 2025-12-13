<?php
/*
Template Name: Fallo Compra
*/
get_header();

// LOOP de WordPress
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<main class="pago-error-main">
  <div class="pago-error-container">

    <section class="pago-error-card" aria-labelledby="titulo-error-pago">
      <div class="pago-error-icon">
        ⚠️
      </div>

      <h1 id="titulo-error-pago" class="pago-error-title">
        <?php the_title(); ?>
      </h1>

      <p class="pago-error-text">
        Tu compra no pudo completarse. Puede que el pago haya sido rechazado o que haya ocurrido
        un error con la conexión.
      </p>

      <p class="pago-error-text-sec">
        No te preocupes, puedes intentarlo nuevamente o volver a la tienda para revisar tu carrito.
      </p>

      <div class="pago-error-actions">
        <a href="checkout.html" class="btn btn--primary pago-error-btn">
          Intentar nuevamente
        </a>
        <a href="tienda.html" class="btn btn--secondary btn--ghost">
          Volver a la tienda
        </a>
      </div>

      <p class="pago-error-help">
        Si el problema persiste, por favor informa del problema a través de nuestra
        <a href="contacto.html">página de contacto</a>
        con el asunto <strong>“Error de pago Essenza”</strong>.
      </p>
    </section>

  </div>
</main>

<?php
    endwhile;
endif;

get_footer();
?>
