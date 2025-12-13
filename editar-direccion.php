<?php
/*
Template Name: Editar Dirección
*/
get_header();

// LOOP de WordPress
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<main class="perfil-main container">

  <h1 class="perfil-titulo"><?php the_title(); ?></h1>

  <form action="#" method="POST" class="form-box">

    <!-- Dirección -->
    <label class="form-label">Dirección</label>
    <input type="text" class="form-input" placeholder="Ej: Calle Los Aromas 1234" required />

    <!-- Ciudad -->
    <label class="form-label">Ciudad / Comuna</label>
    <input type="text" class="form-input" placeholder="Ej: Viña del Mar" required />

    <!-- Región -->
    <label class="form-label">Región</label>
    <select class="form-input" required>
      <option value="">Seleccionar región</option>
      <option>Región de Valparaíso</option>
      <option>Región Metropolitana</option>
      <option>Región del Biobío</option>
      <option>Región de Coquimbo</option>
    </select>

    <!-- Código postal -->
    <label class="form-label">Código postal (opcional)</label>
    <input type="text" class="form-input" placeholder="Ej: 2520000" />

    <!-- Indicaciones -->
    <label class="form-label">Indicaciones adicionales (opcional)</label>
    <textarea class="form-input" rows="3" placeholder="Ej: Departamento 304, torre norte"></textarea>

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
