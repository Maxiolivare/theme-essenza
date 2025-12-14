<?php
/*
Template Name: Registro
*/
get_header();

// LOOP de WordPress
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<main class="auth-main">
  <div class="auth-container">

    <section class="auth-card" aria-labelledby="registro-title">
      <h1 id="registro-title" class="auth-title"><?php the_title(); ?></h1>
      <p class="auth-subtitle">
        Crea tu cuenta para guardar tus datos y seguir tus pedidos.
      </p>

      <form class="auth-form" method="post" action="<?php echo esc_url( home_url('/login') ); ?>">
        
        <div class="auth-field">
          <label for="reg-nombre">Nombre</label>
          <input
            type="text"
            id="reg-nombre"
            name="billing_first_name"
            placeholder="Tu nombre"
            required>
        </div>

        <div class="auth-field">
          <label for="reg-apellido">Apellido</label>
          <input
            type="text"
            id="reg-apellido"
            name="billing_last_name"
            placeholder="Tu apellido"
            required>
        </div>

        <div class="auth-field">
          <label for="reg-email">Correo electrónico</label>
          <input
            type="email"
            id="reg-email"
            name="email"
            placeholder="ejemplo@correo.cl"
            required>
        </div>

        <div class="auth-field">
          <label for="reg-password">Contraseña</label>
          <input
            type="password"
            id="reg-password"
            name="password"
            placeholder="Crea una contraseña"
            required>
        </div>

        <div class="auth-field">
          <label for="reg-password2">Repetir contraseña</label>
          <input
            type="password"
            id="reg-password2"
            name="password2"
            placeholder="Repite la contraseña"
            required>
        </div>

        <button type="submit" class="btn btn--primary auth-btn">
          Crear cuenta
        </button>

      </form>

      <div class="auth-switch">
        <span>¿Ya tienes cuenta?</span>
    <a href="<?php echo esc_url( home_url('/login') ); ?>" class="auth-link">
        Iniciar sesión
    </a>
      </div>
    </section>

  </div>
</main>

<?php
    endwhile;
endif;

get_footer();
?>


