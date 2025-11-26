document.addEventListener("DOMContentLoaded", () => {
    /* -----------------------------------------
       MENÚ MÓVIL
    ----------------------------------------- */
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

    mobileMenu?.addEventListener("click", (e) => {
        if (e.target === mobileMenu) closeMenu();
    });

    mobileMenu?.querySelectorAll(".mobile-menu__link").forEach((link) => {
        link.addEventListener("click", closeMenu);
    });


    /* -----------------------------------------
       ACTIVAR LINK ACTIVO EN EL HEADER
    ----------------------------------------- */
    function actualizarLinksActivos() {
        const currentPath = window.location.pathname;
        const currentHash = window.location.hash;

        const mobileLinks = document.querySelectorAll('.mobile-menu__link');
        const desktopLinks = document.querySelectorAll('.main-nav .nav-link');

        function actualizarLista(links) {
            links.forEach(link => {
                const href = link.getAttribute('href');

                if (
                    (href.startsWith('#') && href === currentHash) ||
                    (!href.startsWith('#') && currentPath.includes(href))
                ) {
                    link.classList.add('active', 'nav-link--active');
                } else {
                    link.classList.remove('active', 'nav-link--active');
                }
            });
        }

        actualizarLista(mobileLinks);
        actualizarLista(desktopLinks);
    }

    actualizarLinksActivos();
    window.addEventListener('hashchange', actualizarLinksActivos);


    /* -----------------------------------------
       CANTIDAD EN SINGLE PRODUCT
    ----------------------------------------- */
    const real = document.getElementById('cantidadReal');
    if (real) {
        document.getElementById('cantidadVisual').textContent = real.value;
    }

    /* -----------------------------------------
       AGREGAR AL CARRITO (SINGLE PRODUCT AJAX)
    ----------------------------------------- */
    const btnSingle = document.getElementById("liveToastBtnCarrito");

    if (btnSingle) {
        btnSingle.addEventListener("click", function (e) {
            e.preventDefault();

            const productID = this.dataset.product_id;

            if (!productID) {
                console.error("Falta data-product_id en el botón.");
                return;
            }

            const url = "/?wc-ajax=add_to_cart";

            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                },
                body: "product_id=" + productID
            })
            .then(res => res.json())
            .then(data => {

                if (data.error) {
                    console.error("WooCommerce error:", data);
                    return;
                }

                /* -------------------------------
                   MOSTRAR TOAST
                -------------------------------- */
                const toastEl = document.getElementById("liveToast");
                if (toastEl) {
                    const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                    toast.show();
                }

                /* -------------------------------
                   ACTUALIZAR NUMERITO DEL CARRITO
                -------------------------------- */
                actualizarCarritoHeader();

                /* Evento general de WooCommerce */
                document.body.dispatchEvent(new Event("added_to_cart"));
            })
            .catch(err => console.error(err));
        });
    }

    /* -----------------------------------------
       FUNCIÓN: Actualizar numerito del carrito
    ----------------------------------------- */
    function actualizarCarritoHeader() {
        fetch("/?wc-ajax=get_refreshed_fragments", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
            }
        })
        .then(res => res.json())
        .then(data => {
            // Busca el numerito del carrito
            const cartCountEl = document.querySelector(".cart-count");

            if (cartCountEl && data?.fragments) {
                // WooCommerce actualiza los fragmentos del header
                Object.entries(data.fragments).forEach(([selector, html]) => {
                    const el = document.querySelector(selector);
                    if (el) el.outerHTML = html;
                });
            }
        })
        .catch(err => console.error("Error actualizando carrito:", err));
    }


    /* -----------------------------------------
       FANCYBOX
    ----------------------------------------- */
    Fancybox.bind("[data-fancybox]", {});


    /* -----------------------------------------
       CARRITO – Cantidades
    ----------------------------------------- */
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

    document.body.addEventListener('change', () => {
        const updateButton = document.querySelector('button[name="update_cart"]');
        if (updateButton) updateButton.disabled = false;
    });

    /* -----------------------------------------
       ELIMINAR PRODUCTOS SELECCIONADOS EN CARRITO
    ----------------------------------------- */
    const btnEliminar = document.getElementById("btnEliminarSeleccionados");
    if (btnEliminar) {
        btnEliminar.addEventListener("click", function () {
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
    }

    /* -----------------------------------------
       FILTRO TIENDA → ABRIR SUBMENÚ
    ----------------------------------------- */
    const botonCategorias = document.querySelector(".categorias-link");
    const submenu = document.querySelector(".submenu");

    if (botonCategorias && submenu) {
        botonCategorias.addEventListener("click", function (e) {
            e.preventDefault();
            submenu.classList.toggle("activo");
        });
    }
});



