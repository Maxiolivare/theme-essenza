<?php get_header();?>
  <main>
    <!-- HERO SECTION -->
    <section class="hero">
      <div class="hero__overlay"></div>
      <div class="container-luis hero__content">
        <h1 class="h1-luis">VELAS DE SOJA HECHAS A MANO CON AMOR</h1>
        <p>Aromas naturales, larga duración y compromiso con el medio ambiente.</p>
        <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>" class="btn-luis btn-luis--primary">Ver Tienda</a>
      </div>
    </section>
    <section class="section section-products" aria-labelledby="titulo-mas-querido">
      <div class="container-luis">
        <h2 id="titulo-mas-querido">LO MÁS QUERIDO POR NUESTROS CLIENTES</h2>
        <div class="product-grid">
          <?php
          $args = array(
              'post_type'      => 'product',
              'posts_per_page' => 4, 
              'tax_query'      => array(
                  array(
                      'taxonomy' => 'product_tag',
                      'field'    => 'slug',
                      'terms'    => 'lo-mas-querido',
                  ),
              ),
          );
          $queridos = new WP_Query($args);
          if ($queridos->have_posts()) :
              while ($queridos->have_posts()) :
                  $queridos->the_post();
                  global $product;
                  $img = get_the_post_thumbnail_url(get_the_ID(), 'large');
                  if (!$img) $img = wc_placeholder_img_src();
                  $precio = $product->get_price_html();
          ?>
              <article class="product-card">
                <a href="<?php the_permalink(); ?>">
                  <div class="product-card__image"
                      style="background-image: url('<?php echo esc_url($img); ?>');">
                  </div>
                  <h3 class="product-card__title"><?php the_title(); ?></h3>
                  <p class="product-card__price"><?php echo $precio; ?></p>
                </a>
              </article>
          <?php
              endwhile;
              wp_reset_postdata();
          else :
          ?>
            <p>No hay productos destacados aún.</p>
          <?php endif; ?>
        </div>
        <div class="section__actions">
          <a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"
            class="btn-luis btn-luis--secondary">Ver más</a>
        </div>
      </div>
    </section>
    <!-- CATEGORiAS -->
    <section class="section section-categories" id="tienda">
      <div class="container-luis">
        <h2>EXPLORA NUESTRAS CATEGORÍAS</h2>

        <div class="category-grid">

          <?php
          // Obtener categorías de productos WooCommerce
          $categorias = get_terms( array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false, // solo categorías con productos
            'slug'       => array('gourmet', 'arreglo-floral', 'flores', 'animales'), // ORDÉN que tú quieras
          ));
          foreach ( $categorias as $cat ) :
            // Imagen de la categoría
            $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
            $imagen = $thumbnail_id ? wp_get_attachment_url( $thumbnail_id ) : wc_placeholder_img_src();
            // Link a la categoría
            $link = get_term_link( $cat );
          ?>
          <article class="category-card">
            <a href="<?php echo esc_url( $link ); ?>">
              <div class="category-card__icon">
                <img src="<?php echo esc_url( $imagen ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>">
              </div>
              <h3 class="category-card__title">
                <?php echo esc_html( $cat->name ); ?>
              </h3>
            </a>
          </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <section class="section section-events">
      <div class="container-luis">
        <h2>EVENTOS / FERIAS</h2>
        <div class="events-layout">
          <div class="events-info">
            <div class="events-info__item">
              <span class="events-info__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-ubicacion.svg" alt="Ubicación">
              </span>
              <div>
                <p class="events-info__label">Ubicación</p>
                <p><?php echo esc_html( SCF::get('ubicacion_evento') ); ?></p>
              </div>
            </div>
            <div class="events-info__item">
              <span class="events-info__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-calendario.svg" alt="Fechas">
              </span>
              <div>
                <p class="events-info__label">Fechas</p>
                <p><?php echo esc_html( SCF::get('fecha_evento') ); ?></p>
              </div>
            </div>
            <div class="events-info__item">
              <span class="events-info__icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icono-reloj.svg" alt="Horario">
              </span>
              <div>
                <p class="events-info__label">Horario</p>
                <p><?php echo esc_html( SCF::get('horario_evento') ); ?></p>
              </div>
            </div>
          </div>
          <div class="events-map">
            <?php
              $mapa = SCF::get('mapa_evento');
              if ($mapa) {
                echo $mapa;
              }
            ?>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php get_footer();?>