<?php
/*
Template Name: Editar Datos
*/
get_header();

// LOOP de WordPress
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<main class="perfil-main container">

  <h1 class="perfil-titulo"><?php the_title(); ?></h1>

  <form action="#" method="POST" class="form-box">

    <!-- Nombre -->
    <label class="form-label">Nombre completo</label>
    <input type="text" class="form-input" placeholder="Ej: Luis Astudillo" required />

    <!-- Correo -->
    <label class="form-label">Correo electrónico</label>
    <input type="email" class="form-input" placeholder="Ej: usuario@correo.com" required />

    <!-- Teléfono -->
    <label class="form-label">Teléfono</label>
    <input type="text" class="form-input" placeholder="+56 9 1234 5678" />

    <!-- Botones -->
    <div class="form-actions">
      <a href="perfil.html" class="btn btn--secondary">Cancelar</a>
      <button type="submit" class="btn btn--primary">Guardar cambios</button>
    </div>

  </form>

</main>

<?php
    endwhile;
endif;

get_footer();
?>
