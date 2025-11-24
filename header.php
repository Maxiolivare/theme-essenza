<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Essenza - Velas de soya artesanales</title>
  <!-- Fuentes Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Inter:wght@300;400;500;600&family=Lora:wght@400;500;600&display=swap" rel="stylesheet">
  <!-- Estilos -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/scss/style.css"/>
</head>
<body>
  <!-- ===================== MENU MOVIL OVERLAY ===================== -->
  <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
    <div class="mobile-menu__header">
      <button class="icon-btn-luis icon-btn-luis--close" id="btn-luisCloseMenu" aria-label="Cerrar menú">✕</button>

      <div class="mobile-menu__logo">
        <div class="logo-circle">
          <img src="<?php echo get_template_directory_uri();?>/assets/img/Logo-essenza.svg" alt="Logo Essenza">
        </div>
      </div>
    </div>

    <nav class="mobile-menu__nav">
      <a href="#inicio" class="mobile-menu__link active">
        <span class="mobile-menu__icon">
          <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-home.svg" alt="Inicio">
        </span>
        <span>Inicio</span>
      </a>

      <a href="#tienda" class="mobile-menu__link">
        <span class="mobile-menu__icon">
          <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-tienda.svg" alt="Tienda">
        </span>
        <span>Tienda</span>
      </a>

      <a href="#sobre-essenza" class="mobile-menu__link">
        <span class="mobile-menu__icon">
          <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-sobre-la-marca.svg" alt="Sobre Essenza">
        </span>
        <span>Sobre Essenza</span>
      </a>
      <a href="#contacto" class="mobile-menu__link">
        <span class="mobile-menu__icon">
          <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-contacto.svg" alt="Contacto">
        </span>
        <span>Contacto</span>
      </a>
    </nav>

    <div class="mobile-menu__footer">
      <p>“Ilumina tus momentos con la calidez de lo artesanal”</p>
      <p class="mobile-menu__brand">🕯️ Essenza</p>
    </div>
  </div>
  <!-- ===================== FIN DEL MENU MOVIL ===================== -->
  <!-- ===================== HEADER ===================== -->
  <header class="site-header" id="inicio">
    <div class="container-luis header-container-luis">

      <!-- Boton menu mbil (izquierda en mobile) -->
      <button class="icon-btn-luis icon-btn-luis--menu" id="btn-luisOpenMenu" aria-label="Abrir menú">☰</button>

      <!-- Logo -->
      <div class="header-left">
        <a href="index.html" class="logo-link">
          <div class="logo-circle">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/Logo-essenza.svg" alt="Logo Essenza">
          </div>
        </a>
      </div>

      <!-- Nav desktop (ordenador) -->
      <nav class="main-nav" aria-label="Navegación principal">
        <a href="inicio.html" class="nav-link nav-link--active">Inicio</a>
        <a href="#tienda.html" class="nav-link">Tienda</a>
        <a href="#sobre-essenza.html" class="nav-link">Sobre Essenza</a>
        <a href="#contacto" class="nav-link">Contacto</a>
      </nav>

      <!-- Iconos derecha -->
      <div class="header-right">
        <button class="icon-btn-luis" aria-label="Ver carrito">
          <span class="icon-round">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-carrito.svg" alt="Carrito">
          </span>
        </button>

        <button class="icon-btn-luis" aria-label="Cuenta">
          <span class="icon-round">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-perfil.svg" alt="Perfil">
          </span>
        </button>
      </div>

    </div>
  </header>