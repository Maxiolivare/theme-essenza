<?php
/*
Template Name: Compra Confirmación
*/
get_header();

// LOOP de WordPress
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<main class="confirm-main">
    <div class="container confirm-container">

        <section class="confirm-card" aria-labelledby="titulo-confirmacion">
            <div class="confirm-icon">
                ✅
            </div>

            <h1 id="titulo-confirmacion" class="confirm-title">
                ¡Gracias por tu compra!
            </h1>

            <p class="confirm-text">
                Hemos recibido tu pedido y lo estamos preparando con dedicación.
                En unos minutos recibirás un correo con el detalle de tu compra.
            </p>

            <!-- Resumen de pedido (ejemplo estático para la maqueta) -->
            <div class="confirm-block">
                <h2 class="confirm-block__title">Resumen del pedido</h2>

                <p class="confirm-order-number">
                    N° de pedido: <strong>#EZS-2025-00123</strong>
                </p>

                <ul class="confirm-order-list">
                    <li class="confirm-order-item">
                        <span>Vela Gourmet Frutilla</span>
                        <span>x1</span>
                        <span>$15.000</span>
                    </li>
                    <li class="confirm-order-item">
                        <span>Vela Flores Silvestres</span>
                        <span>x2</span>
                        <span>$30.000</span>
                    </li>
                </ul>

                <div class="confirm-order-total">
                    <span>Total</span>
                    <span class="confirm-order-total__amount">$45.000</span>
                </div>
            </div>

            <!-- Datos de entrega (también a modo de maqueta) -->
            <div class="confirm-block">
                <h2 class="confirm-block__title">Datos de entrega</h2>

                <p class="confirm-detail"><strong>Nombre:</strong> Nombre Apellido</p>
                <p class="confirm-detail"><strong>Dirección:</strong> Calle Ejemplo 123, Viña del Mar</p>
                <p class="confirm-detail"><strong>Método de entrega:</strong> Envío a domicilio / Retiro en feria</p>
                <p class="confirm-detail"><strong>Estimación:</strong> 3 a 5 días hábiles</p>
            </div>

            <!-- Acciones -->
            <div class="confirm-actions">
                <a href="tienda.html" class="btn btn--primary">Seguir comprando</a>
                <a href="index.html" class="btn btn--secondary btn--ghost">Volver al inicio</a>
            </div>

            <p class="confirm-help">
                ¿Tienes dudas? Escríbenos a
                <a href="mailto:essenzachile.velas@gmail.com">essenzachile.velas@gmail.com</a>
            </p>
        </section>

    </div>
</main>

<?php
    endwhile;
endif;

get_footer();
?>
