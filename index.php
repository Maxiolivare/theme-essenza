<?php get_header();?>
  <main>
    <!-- HERO SECTION -->
    <section class="hero">
      <div class="hero__overlay"></div>
      <div class="container hero__content">
        <h1>VELAS DE SOJA HECHAS A MANO CON AMOR</h1>
        <p>Aromas naturales, larga duración y compromiso con el medio ambiente.</p>
        <a href="tienda.html" class="btn-luis btn-luis--primary">Ver Tienda</a>
      </div>
    </section>
    <!-- LO MAS QUERIDO -->
    <section class="section section-products" aria-labelledby="titulo-mas-querido">
      <div class="container">
        <h2 id="titulo-mas-querido">LO MÁS QUERIDO POR NUESTROS CLIENTES</h2>
        <div class="product-grid">
          <article class="product-card">
            <div class="product-card__image" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/producto home-1.png');"></div>
            <h3 class="product-card__title">Arreglo floral, rosas.</h3>
            <p class="product-card__price">$ 15.000</p>
          </article>
          <article class="product-card">
            <div class="product-card__image" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/producto\ home-2.png');"></div>
            <h3 class="product-card__title">Arreglo floral, flores.</h3>
            <p class="product-card__price">$ 15.000</p>
          </article>
          <article class="product-card">
            <div class="product-card__image" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/producto\ home-3.png');"></div>
            <h3 class="product-card__title">Rosas en maceta cabeza.</h3>
            <p class="product-card__price">$ 10.000</p>
          </article>
          <article class="product-card">
            <div class="product-card__image" style="background-image: url('<?php echo get_template_directory_uri();?>/assets/img/producto\ home-4.png');"></div>
            <h3 class="product-card__title">Malteada de chocolate.</h3>
            <p class="product-card__price">$ 15.000</p>
          </article>
        </div>
        <div class="section__actions">
          <a href="#tienda.html" class="btn-luis btn-luis--secondary">Ver más</a>
        </div>
      </div>
    </section>
    <!-- CATEGORiAS -->
    <section class="section section-categories" id="tienda">
      <div class="container">
        <h2>EXPLORA NUESTRAS CATEGORÍAS</h2>
        <div class="category-grid">
          <article class="category-card">
            <div class="category-card__icon">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-categoria-gourmet.svg" alt="Categoría Gourmet">
            </div>
            <h3 class="category-card__title">Gourmet</h3>
          </article>
          <article class="category-card">
            <div class="category-card__icon">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-caregorias-arreglos-florales.svg" alt="Arreglos florales">
            </div>
            <h3 class="category-card__title">Arreglos Florales</h3>
          </article>
          <article class="category-card">
            <div class="category-card__icon">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-categoria-flores.svg" alt="Flores">
            </div>
            <h3 class="category-card__title">Flores</h3>
          </article>
          <article class="category-card">
            <div class="category-card__icon">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-categoria-animales.svg" alt="Animales">
            </div>
            <h3 class="category-card__title">Animales</h3>
          </article>
        </div>
      </div>
    </section>
    <!-- EVENTOS -->
    <section class="section section-events">
      <div class="container">
        <h2>EVENTOS / FERIAS</h2>
        <div class="events-layout">
          <div class="events-info">
            <div class="events-info__item">
              <span class="events-info__icon">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-ubicacion.svg" alt="Ubicación">
              </span>
              <div>
                <p class="events-info__label">Ubicación</p>
                <p>Viña del Mar, Plaza Sucre</p>
              </div>
            </div>
            <div class="events-info__item">
              <span class="events-info__icon">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-calendario.svg" alt="Fechas">
              </span>
              <div>
                <p class="events-info__label">Fechas</p>
                <p>10 a 12 de octubre</p>
              </div>
            </div>
            <div class="events-info__item">
              <span class="events-info__icon">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-reloj.svg" alt="Horario">
              </span>
              <div>
                <p class="events-info__label">Horario</p>
                <p>10:00 am a 19:00 pm</p>
              </div>
            </div>
          </div>
          <div class="events-map">
            <iframe
              title="Mapa Plaza Sucre, Viña del Mar"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3325.769182996026!2d-71.552!3d-33.024!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9689de63d1b3f1f1%3A0x0!2sPlaza%20Sucre%2C%20Vi%C3%B1a%20del%20Mar!5e0!3m2!1ses-419!2scl!4v1700000000000"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php get_footer();?>