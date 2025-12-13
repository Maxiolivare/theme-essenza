<?php
/*
Template Name: Login
*/

// Si el usuario ya está logueado, lo mandamos al perfil o mi cuenta
if ( is_user_logged_in() ) {
    wp_redirect( site_url('/mi-cuenta') );
    exit;
}

get_header();
?>

<main class="auth-main">
  <div class="auth-container">

    <section class="auth-card" aria-labelledby="login-title">
      <h1 id="login-title" class="auth-title">Iniciar sesión</h1>
      <p class="auth-subtitle">
        Ingresa con tu correo para acceder a tu perfil y ver tus compras.
      </p>

      <?php
      wp_login_form( array(
          'redirect'       => site_url('/mi-cuenta'), // a dónde va al loguearse
          'label_username' => 'Correo electrónico',
          'label_password' => 'Contraseña',
          'label_remember' => 'Recordarme',
          'label_log_in'   => 'Iniciar sesión',
          'remember'       => false,

          // CLASES PERSONALIZADAS (clave para tu CSS)
          'form_id'        => 'loginform',
          'id_username'    => 'login-email',
          'id_password'    => 'login-password',
      ) );
      ?>

      <div class="auth-extra">
        <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>" class="auth-link">
          ¿Olvidaste tu contraseña?
        </a>
      </div>

      <div class="auth-switch">
        <span>¿Aún no tienes cuenta?</span>
        <a href="<?php echo esc_url( site_url('/registro') ); ?>" class="auth-link">
          Crear cuenta
        </a>
      </div>
    </section>

  </div>
</main>

<?php get_footer(); ?>
