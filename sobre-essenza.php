<?php
/*
Template Name: Sobre Essenza
*/
get_header();
// LOOP 
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
?>

<main class="fondo">
    <div class="row pt-5 mx-auto">

        <!-- Imagen izquierda -->
<div class="col-md-4 d-flex justify-content-start crop-10-abajo">
    <img 
        src="<?php echo esc_url( SCF::get( 'flores_sobre_essenza_1' ) ); ?>" 
        alt="flores-sobre-essenza01" 
        class="img-fluid img-izquierda mb-n1">
</div>


        <!-- Texto -->
        <div class="col-md-6 d-flex flex-column" style="height: 100%;">

            <!-- TÍTULO ARRIBA PEGADO -->
            <h1 class="ms-5 text-center text-md-start mt-5 pt-0">Sobre Essenza</h1>

            <!-- CONTENEDOR FLEX QUE OCUPA EL RESTO DEL ALTO -->
            <div class="d-flex flex-column flex-grow-1 my-5">

                <!-- PÁRRAFO CENTRADO VERTICALMENTE EN EL ESPACIO RESTANTE -->
                <div class="ps-5 pe-5">
                    <p class="text-start">
                        “En Essenza creemos que una vela no solo ilumina un espacio,
                        también transmite emociones, recuerdos y sensaciones únicas.
                        Cada creación está pensada para acompañar momentos de calma,
                        inspiración y conexión personal.”
                    </p>
                </div>

            </div>

        </div>

        <!-- Imagen derecha -->
        <div class="col-md-2 d-flex justify-content-end">
            <img 
                src="<?php echo get_template_directory_uri(''); ?>/assets/img/flores-sobre-essenza02.png" 
                alt="flores-sobre-essenza02" 
                class="img-fluid img-derecha">
        </div>

    </div>

    <div class="separador text-center">
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/separador.png" 
            alt="linea-separadora" 
            class="img-fluid">
    </div>

    <!-- Emprendimiento -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mx-auto text-center py-5">
                <h1>Emprendimiento</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto shadow p-3 mb-5 bg-body-tertiary rounded">
                <p>
                    Este proyecto nació de la pasión de Margarita, una emprendedora que decidió transformar su gusto por los aromas y lo artesanal en un oficio lleno de significado.
                    Desde su propio hogar, Margarita diseña, produce y cuida cada detalle de las velas: desde la elección de la cera hasta el envasado final. Todo se hace a mano, con dedicación y cariño, lo que hace que cada vela sea única.
                </p>
            </div>
        </div>

        <div class="row bg-img">
            <div class="col-md-12 my-3">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <ul class="fw-regular lista-sin-estilo espaciado-lista">
                            <h3 class="fw-bold mb-4">Lo que diferencia a Essenza no es solo el producto, sino el esfuerzo y compromiso detrás de él</h3>

                            <li>✔ 100% cera de soya natural, ecológica y amigable con el medio ambiente.</li>
                            <li>✔ Aromas exclusivos, inspirados en flores, frutos, postres y momentos especiales.</li>
                            <li>✔ Hechas completamente a mano, cuidando cada detalle.</li>
                            <li>✔ Producción en pequeñas cantidades, garantizando calidad y frescura en cada vela.</li>
                            <li>✔ Un emprendimiento local que mantiene viva la tradición artesanal.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="separador text-center my-5">
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/separador.png" 
            alt="linea-separadora" 
            class="img-fluid">
    </div>

    <!-- La persona detrás de la marca -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto text-center py-5">
                <h1>La persona detrás de la marca</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto text-center mb-4">
                <img 
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/emprendedora-margarita.png" 
                    alt="emprendedora-margarita" 
                    class="img-fluid rounded-4 shadow border-emprendedora p-2 py-3">
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <p class="my-3 fw-regular">
                    Soy Margarita, trabajo sola en todo el proceso: idear, diseñar, producir y distribuir. Este esfuerzo personal es parte del sello de Essenza. No hay producción masiva ni procesos fríos; al contrario, cada vela pasa por sus manos y lleva consigo su dedicación y pasión.
                </p>
            </div>
        </div>
    </div>

    <div class="separador text-center py-5">
        <img 
            src="<?php echo get_template_directory_uri(); ?>/assets/img/separador.png" 
            alt="linea-separadora" 
            class="img-fluid">
    </div>

</main>
<?php

    endwhile;
endif;
/* Aqui deberia de ir mi footer */
get_footer(); 
?>





