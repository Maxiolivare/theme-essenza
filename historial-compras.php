<?php
/*
Template Name: Historial de Compras
*/
get_header();

// LOOP de WordPress
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<main class="perfil-contenido container">

    <h1 class="perfil-titulo"><?php the_title(); ?></h1>

    <div class="historial-lista">

        <!-- Pedido 1 -->
        <div class="pedido-card">
            <div>
                <p class="pedido-id"><strong>Pedido:</strong> ESZ-1024</p>
                <p class="pedido-fecha"><strong>Fecha:</strong> 12 Nov 2025</p>
                <p class="pedido-total"><strong>Total:</strong> $27.000</p>
                <p class="pedido-estado completado">Completado</p>
            </div>

            <button class="btn pedido-btn">Ver detalle</button>
        </div>

        <!-- Pedido 2 -->
        <div class="pedido-card">
            <div>
                <p class="pedido-id"><strong>Pedido:</strong> ESZ-1020</p>
                <p class="pedido-fecha"><strong>Fecha:</strong> 02 Nov 2025</p>
                <p class="pedido-total"><strong>Total:</strong> $18.000</p>
                <p class="pedido-estado pendiente">Pendiente</p>
            </div>

            <button class="btn pedido-btn">Ver detalle</button>
        </div>

        <!-- Pedido 3 -->
        <div class="pedido-card">
            <div>
                <p class="pedido-id"><strong>Pedido:</strong> ESZ-1009</p>
                <p class="pedido-fecha"><strong>Fecha:</strong> 28 Oct 2025</p>
                <p class="pedido-total"><strong>Total:</strong> $32.000</p>
                <p class="pedido-estado cancelado">Cancelado</p>
            </div>

            <button class="btn pedido-btn">Ver detalle</button>
        </div>

    </div>

</main>

<!-- ===================== MODAL DETALLE DEL PEDIDO ===================== -->
<div class="modal" id="modalDetalle">
    <div class="modal-content">
        <button class="modal-close" id="closeModal">✕</button>

        <h2>Detalle del Pedido</h2>

        <p><strong>ID Pedido:</strong> ESZ-1024</p>
        <p><strong>Fecha:</strong> 12 noviembre 2025</p>
        <p><strong>Estado:</strong> Completado</p>

        <h3>Productos</h3>
        <ul class="modal-productos">
            <li>Vela Floral — $15.000</li>
            <li>Pack Aromas — $12.000</li>
        </ul>

        <p class="modal-total"><strong>Total:</strong> $27.000</p>
    </div>
</div>

<?php
    endwhile;
endif;

get_footer();
?>
