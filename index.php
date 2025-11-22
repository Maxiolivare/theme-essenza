<?php get_header();?>
  <main>
    <!-- HERO -->
    <section class="hero">
      <div class="hero__overlay"></div>
      <div class="container hero__content">
        <h1>VELAS DE SOJA HECHAS A MANO CON AMOR</h1>
        <p>Aromas naturales, larga duración y compromiso con el medio ambiente.</p>
        <a href="#tienda" class="btn btn--primary">Ver Tienda</a>
      </div>
    </section>
    <!-- LO MÁS QUERIDO -->
    <section class="section section-products" aria-labelledby="titulo-mas-querido">
      <div class="container">
        <h2 id="titulo-mas-querido">LO MÁS QUERIDO POR NUESTROS CLIENTES</h2>
        <div class="product-grid">
          <article class="product-card">
            <div class="product-card__image" style="background-image: url('assets/img/producto home-1.png');"></div>
            <h3 class="product-card__title">Arreglo floral, rosas.</h3>
            <p class="product-card__price">$ 15.000</p>
          </article>
          <article class="product-card">
            <div class="product-card__image" style="background-image: url('assets/img/producto2.jpg');"></div>
            <h3 class="product-card__title">Arreglo floral, flores.</h3>
            <p class="product-card__price">$ 15.000</p>
          </article>
          <article class="product-card">
            <div class="product-card__image" style="background-image: url('assets/img/producto3.jpg');"></div>
            <h3 class="product-card__title">Rosas en maceta cabeza.</h3>
            <p class="product-card__price">$ 10.000</p>
          </article>
          <article class="product-card">
            <div class="product-card__image" style="background-image: url('assets/img/producto4.jpg');"></div>
            <h3 class="product-card__title">Malteada de chocolate.</h3>
            <p class="product-card__price">$ 15.000</p>
          </article>
        </div>
        <div class="section__actions">
          <a href="#tienda" class="btn btn--secondary">Ver más</a>
        </div>
      </div>
    </section>
    <!-- CATEGORÍAS -->
    <section class="section section-categories" id="tienda">
      <div class="container">
        <h2>EXPLORA NUESTRAS CATEGORÍAS</h2>
        <div class="category-grid">
          <article class="category-card">
            <div class="category-card__icon">
              <!-- SVG categoría Gourmet -->
              <img src="assets/icons/category-gourmet.svg" alt="Categoría Gourmet">
            </div>
            <h3 class="category-card__title">Gourmet</h3>
          </article>
          <article class="category-card">
            <div class="category-card__icon">
              <!-- SVG categoría Arreglos Florales -->
              <img src="assets/icons/category-arreglos.svg" alt="Arreglos florales">
            </div>
            <h3 class="category-card__title">Arreglos Florales</h3>
          </article>
          <article class="category-card">
            <div class="category-card__icon">
              <!-- SVG categoría Flores -->
              <img src="assets/icons/category-flores.svg" alt="Flores">
            </div>
            <h3 class="category-card__title">Flores</h3>
          </article>
          <article class="category-card">
            <div class="category-card__icon">
              <!-- SVG categoría Animales -->
              <img src="assets/icons/category-animales.svg" alt="Animales">
            </div>
            <h3 class="category-card__title">Animales</h3>
          </article>
        </div>
      </div>
    </section>
    <!-- EVENTOS / FERIAS -->
    <section class="section section-events">
      <div class="container">
        <h2>EVENTOS / FERIAS</h2>
        <div class="events-layout">
          <div class="events-info">
            <div class="events-info__item">
              <span class="events-info__icon">
                <!-- SVG ubicación -->
                <img src="assets/icons/icon-location.svg" alt="Ubicación">
              </span>
              <div>
                <p class="events-info__label">Ubicación</p>
                <p>Viña del Mar, Plaza Sucre</p>
              </div>
            </div>
            <div class="events-info__item">
              <span class="events-info__icon">
                <!-- SVG calendario -->
                <img src="assets/icons/icon-calendar.svg" alt="Fechas">
              </span>
              <div>
                <p class="events-info__label">Fechas</p>
                <p>10 a 12 de octubre</p>
              </div>
            </div>
            <div class="events-info__item">
              <span class="events-info__icon">
                <!-- SVG reloj -->
                <img src="assets/icons/icon-clock.svg" alt="Horario">
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
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>
    </section>
    <!-- SOBRE ESSENZA -->
    <section class="section section-about" id="sobre-essenza">
      <div class="container">
        <h2>SOBRE ESSENZA</h2>
        <p>
          Essenza es un emprendimiento de velas de soya artesanales creadas por Margarita,
          con diseños inspirados en flores, postres y pequeños momentos de alegría.
          Cada pieza es elaborada a mano, con cera vegetal y aromas que cuidan tu hogar.
        </p>
      </div>
    </section>
    <!-- CONTACTO -->
    <section class="section section-contact" id="contacto">
      <div class="container">
        <h2>CONTACTO</h2>
        <p>
          Si tienes dudas sobre los productos o quieres hacer un pedido especial,
          escríbenos a <a href="mailto:essenzachile.velas@gmail.com">essenzachile.velas@gmail.com</a>.
        </p>
      </div>
    </section>
  </main>
<?php get_footer();?>