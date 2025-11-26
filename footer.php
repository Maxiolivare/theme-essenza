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
// Manejo simple del menú hamburguesa en móvil
document.addEventListener("DOMContentLoaded", () => {
  const btnOpen = document.getElementById("btnOpenMenu");
  const btnClose = document.getElementById("btnCloseMenu");
  const mobileMenu = document.getElementById("mobileMenu");

  const openMenu = () => {
    mobileMenu.classList.add("mobile-menu--visible");
    document.body.classList.add("menu-open");
  };

  const closeMenu = () => {
    mobileMenu.classList.remove("mobile-menu--visible");
    document.body.classList.remove("menu-open");
  };

  if (btnOpen) btnOpen.addEventListener("click", openMenu);
  if (btnClose) btnClose.addEventListener("click", closeMenu);

  // Cierra el menú si se hace click fuera del panel central
  mobileMenu.addEventListener("click", (e) => {
    if (e.target === mobileMenu) {
      closeMenu();
    }
  });

  // Cierra al hacer click en cualquier enlace del menú móvil
  mobileMenu.querySelectorAll(".mobile-menu__link").forEach((link) => {
    link.addEventListener("click", closeMenu);
  });
});

//Barra active dinamica de cada enlace de cada pagina en el header

// Función para actualizar links activos
function actualizarLinksActivos() {
  const currentPath = window.location.pathname; 
  const currentHash = window.location.hash; 

  const mobileLinks = document.querySelectorAll('.mobile-menu__link');
  const desktopLinks = document.querySelectorAll('.main-nav .nav-link');

  function actualizarLista(links) {
    links.forEach(link => {
      const href = link.getAttribute('href');

      if ((href.startsWith('#') && href === currentHash) ||
          (!href.startsWith('#') && currentPath.includes(href))) {
        link.classList.add('active');
        link.classList.add('nav-link--active');
      } else {
        link.classList.remove('active');
        link.classList.remove('nav-link--active');
      }
    });
  }

  actualizarLista(mobileLinks);
  actualizarLista(desktopLinks);
}

window.addEventListener('DOMContentLoaded', actualizarLinksActivos);
window.addEventListener('hashchange', actualizarLinksActivos);

// script para checkout y detalle-producto

/* Funciones de añadir cantidad de productos */
function incrementar() {
    let visual = document.getElementById('cantidadVisual');
    let real = document.getElementById('cantidadReal');
    let valor = parseInt(real.value) + 1;
    if (valor <= real.max) {
        real.value = valor;
        visual.textContent = valor;
    }
}

function decrementar() {
    let visual = document.getElementById('cantidadVisual');
    let real = document.getElementById('cantidadReal');
    let valor = parseInt(real.value) - 1;
    if (valor >= real.min) {
        real.value = valor;
        visual.textContent = valor;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const real = document.getElementById('cantidadReal');
    if (real) {
        document.getElementById('cantidadVisual').textContent = real.value;
    }
});

/* Cambiar texto botón */
function cambiarTextoBoton(){
    const btn = document.getElementById('liveToastBtnCarrito');
    if (!btn) return;

    let textNode = null;
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
}

/********************************************
 *  AÑADIR AL CARRITO SIN RECARGAR + TOAST
 ********************************************/
document.addEventListener("DOMContentLoaded", function () {

    const botonBonito = document.getElementById("liveToastBtnCarrito");
    const toastEl = document.getElementById("liveToast");

    if (!botonBonito || !toastEl) return;

    const toast = bootstrap.Toast.getOrCreateInstance(toastEl);

    botonBonito.addEventListener("click", function () {

        const productID = botonBonito.dataset.product_id;

        fetch("/?wc-ajax=add_to_cart", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `product_id=${productID}&quantity=1`
        })
        .then(res => res.json())
        .then(data => {

            toast.show();
            cambiarTextoBoton();

            if (data && data.fragments) {
                for (const selector in data.fragments) {
                    const el = document.querySelector(selector);
                    if (el) el.innerHTML = data.fragments[selector];
                }
            }
        })
        .catch(err => console.error("Error añadiendo al carrito:", err));
    });
});

/* Plugins */ 
Fancybox.bind("[data-fancybox]", {});

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

document.getElementById("btnEliminarSeleccionados")?.addEventListener("click", function() {

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

/* TIENDA: Filtro Categorias */
document.addEventListener("DOMContentLoaded", function () {
    const botonCategorias = document.querySelector(".categorias-link");
    const submenu = document.querySelector(".submenu");

    if (botonCategorias)
        botonCategorias.addEventListener("click", function (e) {
            e.preventDefault();
            submenu.classList.toggle("activo");
        });
});

</script>

  </script>
</body>
</html>
