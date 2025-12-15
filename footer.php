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

document.addEventListener('DOMContentLoaded', () => {
    const qtyInput = document.getElementById('customQty');
    const btnAdd = document.getElementById('btnAgregarCarrito');
    const btnBuy = document.getElementById('btnComprarAhora');
    function addToCart(productId, qty, redirect = false) {
        const data = new FormData();
        data.append('action', 'custom_add_to_cart');
        data.append('product_id', productId);
        data.append('quantity', qty);
        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            credentials: 'same-origin',
            body: data
        })
        .then(res => res.json())
        .then(response => {
            if (!response.success) return;
            if (redirect) {
                window.location.href = '<?php echo wc_get_checkout_url(); ?>';
            } else {
                const toastEl = document.getElementById('liveToast');
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
        });
    }
    btnAdd.addEventListener('click', () => {
        addToCart(
            btnAdd.dataset.productId,
            qtyInput.value
        );
    });
    btnBuy.addEventListener('click', () => {
        addToCart(
            btnBuy.dataset.productId,
            qtyInput.value,
            true
        );
    });
});
</script>

  </script>
</body>
</html>
