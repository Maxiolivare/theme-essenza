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
                <h1 class="contact-title"><?php the_title(); ?></h1>

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
                <form action="#" method="post" class="contact-form">

                    <!-- Nombre -->
                    <div class="form-group">
                        <label for="nombre">Nombre<span class="required">*</span></label>
                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            placeholder="Juan Santome Villa Mercedez"
                            required
                        />
                        <p class="form-help">Introduce un nombre</p>
                    </div>

                    <!-- Correo (deshabilitado según mockup) -->
                    <div class="form-group">
                        <label for="correo">Correo<span class="required">*</span></label>
                        <input
                            type="email"
                            id="correo"
                            name="correo"
                            value="Deshabilitado"
                            class="input-disabled"
                            disabled
                        />
                    </div>

                    <!-- Teléfono -->
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <div class="phone-row">
                            <div class="phone-prefix">
                                <select name="codigo" id="codigo">
                                    <option value="+56">+56</option>
                                    <option value="+54">+54</option>
                                    <option value="+55">+55</option>
                                    <option value="+591">+591</option>
                                </select>
                            </div>
                            <input
                                type="tel"
                                id="telefono"
                                name="telefono"
                                placeholder="9 3523 8991"
                            />
                        </div>
                    </div>

                    <!-- Mensaje -->
                    <div class="form-group">
                        <label for="mensaje">Mensaje<span class="required">*</span></label>
                        <textarea
                            id="mensaje"
                            name="mensaje"
                            rows="5"
                            placeholder="¿Qué es lo que necesitas?"
                            required
                        ></textarea>
                    </div>

                    <!-- Botón enviar -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn--contact-submit">
                            Enviar
                        </button>
                    </div>

                </form>
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
