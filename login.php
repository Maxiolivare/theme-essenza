<?php
/*
Template Name: Login
*/

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
      // Arreglo con opciones personalizadas
      $args = array(
          'redirect'       => site_url('/mi-cuenta'),
          'form_id'        => 'loginform',
          'label_username' => '', // removemos etiquetas nativas
          'label_password' => '',
          'label_log_in'   => '',
          'remember'       => false,
          'value_remember' => false,
      );

      // Guardamos el formulario original en una variable
      $login_form = wp_login_form( $args, false );
      ?>

      <form name="loginform" id="loginform" class="auth-form" action="<?php echo esc_url( site_url('wp-login.php', 'login_post') ); ?>" method="post">

        <!-- Username -->
        <div class="auth-field">
          <label for="login-email">Correo electrónico</label>
          <input type="text" name="log" id="login-email" class="form-control" placeholder="ejemplo@correo.cl" required>
        </div>

        <!-- Password -->
        <div class="auth-field">
          <label for="login-password">Contraseña</label>
          <input type="password" name="pwd" id="login-password" class="form-control" placeholder="••••••••" required>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn--primary auth-btn">Iniciar sesión</button>

        <!-- Redirect hidden -->
        <input type="hidden" name="redirect_to" value="<?php echo esc_url( site_url('/mi-cuenta') ); ?>">
      </form>

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
