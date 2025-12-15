<?php
/*
Template Name: Contacto
*/
get_header();

// LOOP
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<!-- ===================== CONTENIDO PRINCIPAL ===================== -->
<main class="contact-page">

    <section class="contact-section">
        <div class="container contact-layout">

            <!-- Texto introductorio -->
            <div class="contact-text">
                <h1 class="contact-title h1n"><?php the_title(); ?></h1>

                <p>Este espacio de contacto es para ti.</p>
                <p>
                    Si tienes dudas sobre mis productos o necesitas más información,
                    puedes escribirme aquí.
                </p>
                <p>
                    A través del formulario me llegará directamente tu mensaje y lo responderé con gusto.
                </p>
                <p>
                    Si tuviste algún problema con un pedido, no dudes en contarlo para ayudarte a solucionarlo.
                </p>
                <p>
                    Tus sugerencias y comentarios ayudan para seguir mejorando.
                </p>
                <p>
                    En redes sociales comparto novedades, promociones y un poco del día a día de mi trabajo.
                </p>
            </div>

            <!-- Tarjeta con formulario -->
            <div class="contact-form-card">
                <?php echo do_shortcode('[contact-form-7 id="e320f41" title="Formulario de contacto 1"]'); ?>
            </div>
        </div>
    </section>

    <!-- Contacto directo (redes) -->
    <section class="contact-direct">
        <div class="container contact-direct-inner">

            <p class="contact-direct-title">O escríbenos directamente a</p>

            <div class="contact-direct-row">
                <div class="contact-direct-icon">
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-instagram.svg" 
                        alt="Instagram Essenza">
                </div>
                <p class="contact-direct-text">@Essenzachilevelas</p>
            </div>

            <div class="contact-direct-row">
                <div class="contact-direct-icon">
                    <img 
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-gmail.svg" 
                        alt="Correo Essenza">
                </div>
                <p class="contact-direct-text">essenzachile.velas@gmail.com</p>
            </div>

        </div>
    </section>

</main>

<?php
    endwhile;
endif;

get_footer();
?>
