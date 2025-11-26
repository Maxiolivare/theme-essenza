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
/* CARRITO */

document.querySelectorAll(".qty-btn-custom").forEach(btn => {
    btn.addEventListener("click", function () {

        const type = this.dataset.type;
        const key = this.dataset.target;

        const realInput = document.getElementById("qty-real-" + key);
        const visualBtn = document.getElementById("cantidadVisual-" + key);

        let current = parseInt(realInput.value);

        if (type === "minus" && current > 1) current--;
        if (type === "plus") current++;

        realInput.value = current;
        visualBtn.innerText = current;

        document.querySelector("button[name='update_cart']").click();
    });
});
document.addEventListener('DOMContentLoaded', function() {

    jQuery(document.body).off('change', 'input.qty');

});
document.addEventListener('DOMContentLoaded', function() {

    const updateButton = document.querySelector('button[name="update_cart"]');

    document.querySelectorAll('input.qty').forEach(function(input){
        input.addEventListener('change', function(){
            updateButton.disabled = false;
        });
    });

});
document.getElementById("btnEliminarSeleccionados").addEventListener("click", function() {

    const checkboxes = document.querySelectorAll("input[name='cart[]']:checked");

    if (checkboxes.length === 0) {
        alert("No hay productos seleccionados");
        return;
    }
    const form = document.querySelector("form.woocommerce-cart-form");
    checkboxes.forEach(chk => {
        const cartKey = chk.value;
        const qtyInput = document.querySelector(`input[name='cart[${cartKey}][qty]']`);
        if (qtyInput) qtyInput.value = 0;
    });

    form.submit(); 
});
</script>

  </script>
</body>
</html>
