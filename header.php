<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Essenza | Velas de soya artesanales</title>
  <!-- Fuentes Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Inter:wght@300;400;500;600&family=Lora:wght@400;500;600&display=swap" rel="stylesheet">
  <!-- Estilos -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/scss/style.scss" />
</head>
<body>
  <!-- ===================== MENÚ MÓVIL OVERLAY ===================== -->
  <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
    <div class="mobile-menu__header">
      <button class="icon-btn icon-btn--close" id="btnCloseMenu" aria-label="Cerrar menú">
        ✕
      </button>
      <div class="mobile-menu__logo">
        <div class="logo-circle">Essenza</div>
      </div>
    </div>
    <nav class="mobile-menu__nav">
      <!-- Ítem ACTIVO (Inicio) -->
      <a href="#inicio" class="mobile-menu__link active">
        <span class="mobile-menu__icon">
          <!-- SVG de Inicio -->
          <img src="assets/icons/icon-home.svg" alt="Inicio">
        </span>
        <span>Inicio</span>
      </a>
      <a href="#tienda" class="mobile-menu__link">
        <span class="mobile-menu__icon">
          <!-- SVG de Tienda -->
          <img src="assets/icons/icon-store.svg" alt="Tienda">
        </span>
        <span>Tienda</span>
      </a>
      <a href="#sobre-essenza" class="mobile-menu__link">
        <span class="mobile-menu__icon">
          <!-- SVG Sobre Essenza -->
          <img src="assets/icons/icon-about.svg" alt="Sobre Essenza">
        </span>
        <span>Sobre Essenza</span>
      </a>
      <a href="#contacto" class="mobile-menu__link">
        <span class="mobile-menu__icon">
          <!-- SVG Contacto -->
          <img src="assets/icons/icon-contact.svg" alt="Contacto">
        </span>
        <span>Contacto</span>
      </a>
      <a href="#carrito" class="mobile-menu__link">
        <span class="mobile-menu__icon">
          <!-- SVG Carrito -->
          <img src="assets/icons/icon-cart.svg" alt="Carrito">
        </span>
        <span>Carrito</span>
      </a>
    </nav>
    <div class="mobile-menu__footer">
      <p>“Ilumina tus momentos con la calidez de lo artesanal”</p>
      <p class="mobile-menu__brand">🕯️ Essenza</p>
      <!-- Si más adelante tienes un SVG de velita, aquí también lo puedes cambiar -->
    </div>
  </div>
  <!-- ===================== FIN MENÚ MÓVIL ===================== -->
  <!-- ===================== HEADER ===================== -->
  <header class="site-header" id="inicio">
    <div class="container header-container">
      <!-- Logo -->
      <div class="header-left">
        <a href="index.html" class="logo-link">
          <div class="logo-circle">Essenza</div>
        </a>
      </div>
      <!-- Menú hamburguesa (si luego tienes SVG, también puedes cambiar esto) -->
      <button class="icon-btn icon-btn--menu" id="btnOpenMenu" aria-label="Abrir menú">
        <!-- Puedes reemplazar el texto ☰ por un SVG -->
        <!-- <img src="assets/icons/icon-menu.svg" alt="Menú"> -->
        ☰
      </button>
      <!-- Nav desktop -->
      <nav class="main-nav" aria-label="Navegación principal">
        <a href="#inicio" class="nav-link nav-link--active">Inicio</a>
        <a href="#tienda" class="nav-link">Tienda</a>
        <a href="#sobre-essenza" class="nav-link">Sobre Essenza</a>
        <a href="#contacto" class="nav-link">Contacto</a>
      </nav>
      <!-- Iconos derecha -->
      <div class="header-right">
        <button class="icon-btn" aria-label="Ver carrito">
          <span class="icon-round">
            <!-- Aquí ya estabas usando SVG, lo puedes reemplazar por el del mockup si quieres -->
            <img src="assets/img/icono-carrito.svg" alt="Carrito">
          </span>
        </button>
        <button class="icon-btn" aria-label="Cuenta">
          <span class="icon-round">
            <img src="assets/img/icono-perfil.svg" alt="Perfil">
          </span>
        </button>
      </div>
    </div>
  </header>
