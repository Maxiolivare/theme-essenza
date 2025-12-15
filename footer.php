  <footer class="site-footer">
    <div class="footer-main">
      <div class="container-luis footer-grid">

        <div class="footer-col">
          <nav class="footer-nav">
            <a href="#inicio.html" class="footer-link">Inicio</a>
            <a href="#tienda.html" class="footer-link">Tienda</a>
            <a href="#contacto.html" class="footer-link">Contacto</a>
          </nav>
        </div>

        <div class="footer-col footer-col--center">
          <div class="logo-circle logo-circle--footer">
            <img src="<?php echo get_template_directory_uri();?>/assets/img/Logo-essenza.svg" alt="Logo Essenza">
          </div>
        </div>

        <div class="footer-col footer-col--right">
          <p class="footer-social-title">Redes Sociales</p>
          <div class="footer-social">
            <a href="#" class="social-icon">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-instagram.svg" alt="Instagram Essenza">
            </a>
            <a href="mailto:essenzachile.velas@gmail.com" class="social-icon">
              <img src="<?php echo get_template_directory_uri();?>/assets/img/icono-gmail.svg" alt="Correo Essenza">
            </a>
          </div>
        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container-luis footer-bottom__inner">
        <p>© 2025 Essenza. Todos los derechos reservados</p>
        <nav class="footer-legal">
          <a href="#" class="footer-legal__link">Términos y condiciones</a>
          <span>|</span>
          <a href="#" class="footer-legal__link">Política de reembolsos</a>
          <span>|</span>
          <a href="#" class="footer-legal__link">Política de privacidad</a>
        </nav>
      </div>
    </div>
  </footer>
  <!-- JS -->
  <!--Script de plugins-->
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.1/dist/fancybox/fancybox.umd.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  <script src="<?php echo get_template_directory_uri();?>/assets/js/script.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
    const botonCategorias = document.querySelector(".categorias-link");
    const submenu = document.querySelector(".submenu");

    botonCategorias.addEventListener("click", function (e) {
        e.preventDefault();
        submenu.style.display = submenu.style.display === "block" ? "none" : "block";
    });
});
document.addEventListener('DOMContentLoaded', function() {

    const qtyInputs = document.querySelectorAll('.woocommerce-cart-form .qty');
    const updateCartButton = document.querySelector('button[name="update_cart"]');
    if (qtyInputs.length > 0 && updateCartButton) {
        qtyInputs.forEach(function(input) {
            input.addEventListener('change', function() {
                updateCartButton.click();
            });
        });
    }
});
// Sincronizar al cargar
document.addEventListener('DOMContentLoaded', () => {
    const real = document.getElementById('cantidadReal');
    document.getElementById('cantidadVisual').textContent = real.value;
});
/*     Fin de funciones de añadir cantidad de productos */
/* Funcion para cambiar el texto de añadir a carrito a eliminar de carrito */
function cambiarTextoBoton(){
    const btn = document.getElementById('liveToastBtnCarrito');
    if (!btn) return;let textNode = null;
for (let n of btn.childNodes) {
    if (n.nodeType === Node.TEXT_NODE) { textNode = n; break; }
}
if (!textNode) {
    textNode = document.createTextNode(' Agregar al Carrito');
    btn.appendChild(textNode);
}

const current = textNode.nodeValue.trim();
if (current === 'Agregar al Carrito' || current === 'Agregar al carrito') {
    textNode.nodeValue = ' Eliminar del Carrito';
} else {
    textNode.nodeValue = ' Agregar al Carrito';
}
    // Actualizar mensaje del toast segun si es para agregar o añadir
    const liveToast = document.getElementById('liveToast');
    if (liveToast) {
        const body = liveToast.querySelector('.toast-body');
        if (body) {
            if (textNode.nodeValue.trim() === 'Eliminar del Carrito') {
                body.innerHTML = '<p class="d-inline m-0 align-middle">Su producto ha sido añadido al Carrito'+'<i class="bi bi-check2 align-middle"></i></p>';
            } else {
                body.innerHTML = '<p class="d-inline m-0 align-middle">Su producto ha sido eliminado del carrito'+'<i class="bi bi-check2 align-middle"></i></p>';
            }
        }
    }}

{ /*     Funciones de Toast de Bootstrap, con esto se activa. */
    const toastTrigger = document.getElementById('liveToastBtnCarrito') // Cambiado para que funcione con el id de carrito
    const toastLiveExample = document.getElementById('liveToast')

    if (toastTrigger) {
    const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
    toastTrigger.addEventListener('click', () => {
        toastBootstrap.show()
    })
    }
}
document.addEventListener('DOMContentLoaded', function () {
    const botonBonito = document.getElementById('liveToastBtnCarrito');
    const botonReal    = document.querySelector('.single_add_to_cart_button'); // botón oculto de WooCommerce

    if (!botonBonito || !botonReal) return;

    // Cuando haces clic en tu botón bonito → haces clic en el real (invisible)
    botonBonito.addEventListener('click', function () {
        botonReal.click();  // ← esto añade el producto de verdad al carrito
    });

    // Después de que WooCommerce añada el producto → cambiamos el texto
    document.body.addEventListener('added_to_cart', function () {
        cambiarTextoBoton();
    });
});
</script>

  </script>
</body>
</html>
