// Manejo simple del menú hamburguesa en movil + enlaces activos
document.addEventListener("DOMContentLoaded", () => {
  const btnOpen = document.getElementById("btnOpenMenu");
  const btnClose = document.getElementById("btnCloseMenu");
  const mobileMenu = document.getElementById("mobileMenu");

  const openMenu = () => {
    if (!mobileMenu) return;
    mobileMenu.classList.add("mobile-menu--visible");
    document.body.classList.add("menu-open");
  };

  const closeMenu = () => {
    if (!mobileMenu) return;
    mobileMenu.classList.remove("mobile-menu--visible");
    document.body.classList.remove("menu-open");
  };

  if (btnOpen) btnOpen.addEventListener("click", openMenu);
  if (btnClose) btnClose.addEventListener("click", closeMenu);

  // Cerrar tocando fuera del contenido
  if (mobileMenu) {
    mobileMenu.addEventListener("click", (e) => {
      if (e.target === mobileMenu) closeMenu();
    });

    // Cerrar al hacer clic en un enlace
    mobileMenu.querySelectorAll(".mobile-menu__link").forEach((link) => {
      link.addEventListener("click", closeMenu);
    });
  }

  // ========== ENLACES ACTIVOS DINAMICOS (desktop + movil) ==========
  const mobileLinks = document.querySelectorAll(".mobile-menu__link");
  const desktopLinks = document.querySelectorAll(".main-nav .nav-link");

  // Nombre del archivo actual (index.html, tienda.html, etc....-)
  let currentPage = window.location.pathname.split("/").pop();
  if (!currentPage || currentPage === "") {
    currentPage = "index.html"; // por si el navegador no muestra el archivo
  }

  // Función auxiliar para marcar activo según href
  const setActiveLink = (nodeList, activeClass) => {
    nodeList.forEach((link) => {
      const href = link.getAttribute("href");
      if (!href) return;

      const hrefFile = href.split("/").pop(); // por si algún día hay subcarpetas

      if (hrefFile === currentPage) {
        link.classList.add(activeClass);
      }
    });
  };

  // Mobile usa .active (para la barrita/puntito blancos)
  setActiveLink(mobileLinks, "active");

  // Desktop usa .nav-link--active (para el subrayado)
  setActiveLink(desktopLinks, "nav-link--active");
});



//Edicion de Metodo de pago del perfil
const modal = document.getElementById("modalPago");
const btnAbrir = document.getElementById("btnAbrirModal");
const btnCerrar = document.getElementById("btnCerrarModal");

btnAbrir.addEventListener("click", () => {
  modal.classList.add("modal--visible");
});

btnCerrar.addEventListener("click", () => {
  modal.classList.remove("modal--visible");
});



// ===== MODAL DETALLE DE PEDIDO =====

document.addEventListener("DOMContentLoaded", () => {
  const modal = document.getElementById("modalDetalle");
  const closeBtn = document.getElementById("closeModal");

  // Abrir modal con cualquier botón "Ver detalle"
  document.querySelectorAll(".pedido-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      modal.classList.add("active");
    });
  });

  // Cerrar modal al hacer clic en la X
  closeBtn?.addEventListener("click", () => {
    modal.classList.remove("active");
  });

  // Cerrar al hacer click fuera del contenido
  modal?.addEventListener("click", (e) => {
    if (e.target.id === "modalDetalle") {
      modal.classList.remove("active");
    }
  });
});




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
/* Plugins */ 
/*Activar fancybox, permite ver imagenes como galeria*/
Fancybox.bind("[data-fancybox]", {
  // Your custom options
});

(function(){
	document.addEventListener('DOMContentLoaded', function(){
		// inputs y selects dentro del checkout: añadir clases bootstrap y tu clase personalizada
		const form = document.querySelector('.woocommerce-checkout');
		if(!form) return;
        
		// Añadir clases a inputs, selects y textarea generados por WooCommerce
		form.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], input[type="password"], textarea, select').forEach(function(el){
			// evitar duplicar clases
			el.classList.add('form-control');
			el.classList.add('border-naranjo-oscuro');
		});

		// Añadir clases a los wrapper de métodos de pago y envío para que coincidan con diseño
		form.querySelectorAll('.woocommerce-shipping-methods, .wc_payment_methods, .woocommerce-checkout-review-order-table').forEach(function(el){
			el.classList.add('bg-white');
		});

		// Ajustes para radios/checkboxes dentro de wrappers para estilizar similar al HTML
		form.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(function(r){
			// si quieres, podemos envolverlos o añadir clases; por ahora solo aseguramos visibilidad
			r.classList.add('');
		});
	});
})();


//CARRITO 


document.addEventListener("click", function (e) {

  if (e.target.closest(".qty-plus")) {
    const btn = e.target.closest(".qty-plus");
    const key = btn.dataset.target;
    const input = document.getElementById("qty-" + key);

    if (!input) return;

    input.value = parseInt(input.value || 1) + 1;
    input.dispatchEvent(new Event("change", { bubbles: true }));
  }

  if (e.target.closest(".qty-minus")) {
    const btn = e.target.closest(".qty-minus");
    const key = btn.dataset.target;
    const input = document.getElementById("qty-" + key);

    if (!input) return;

    if (parseInt(input.value) > 1) {
      input.value = parseInt(input.value) - 1;
      input.dispatchEvent(new Event("change", { bubbles: true }));
    }
  }
});


document.addEventListener("change", function (e) {
  if (e.target.classList.contains("qty")) {
    const updateBtn = document.querySelector('button[name="update_cart"]');
    if (updateBtn) updateBtn.click();
  }
});


/* TIENDA: Filtro Categorias */
document.addEventListener("DOMContentLoaded", function () {
    const botonCategorias = document.querySelector(".categorias-link");
    const submenu = document.querySelector(".submenu");

    botonCategorias.addEventListener("click", function (e) {
        e.preventDefault();
        submenu.classList.toggle("activo");
    });
});
