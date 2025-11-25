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

// Sincroniza al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    let real = document.getElementById('cantidadReal');
    document.getElementById('cantidadVisual').textContent = real.value;
});
/*     Fin de funciones de añadir cantidad de productos */
/* Funcion para cambiar el texto de añadir a carrito a eliminar de carrito */
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
        // Actualizar mensaje del toast segun si es para agregar o añadir
        const liveToast = document.getElementById('liveToast');
        if (liveToast) {
            const body = liveToast.querySelector('.toast-body');
            if (body) {
                if (textNode.nodeValue.trim() === 'Eliminar del Carrito') {
                    body.innerHTML = '<p class="d-inline m-0 align-middle">Su producto ha sido añadido al Carrito <i class="bi bi-check2 align-middle"></i></p>';
                } else {
                    body.innerHTML = '<p class="d-inline m-0 align-middle">Su producto ha sido eliminado del carrito <i class="bi bi-check2 align-middle"></i></p>';
                }
            }
        }
}
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
/* Plugins */ 
/*Activar fancybox, permite ver imagenes como galeria*/
Fancybox.bind("[data-fancybox]", {
  // Your custom options
});
