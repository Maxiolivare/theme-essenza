<?php
/*
Template Name: Recuperar Contraseña
*/
get_header();

// LOOP de WordPress
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<main class="rec-wrapper">
  <section class="rec-card">

    <h1><?php the_title(); ?></h1>

    <p class="rec-intro">
      Ingresa el correo asociado a tu cuenta...
    </p>

    <form class="rec-form" method="post" action="<?php echo esc_url( wp_lostpassword_url() ); ?>">
      <label class="rec-label">Correo electrónico</label>
      <input type="email" class="rec-input" name="user_login" required>
      <button type="submit" class="btn btn--primary rec-btn">Enviar enlace</button>
    </form>

    <p class="rec-note">Si el correo existe, recibirás un enlace pronto.</p>

    <p class="rec-back">
      ¿Recordaste tu contraseña?
      <a href="<?php echo esc_url( wp_login_url() ); ?>">Volver a iniciar sesión</a>
    </p>

  </section>
</main>

<?php
    endwhile;
endif;

get_footer();
?>
