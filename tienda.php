<main>
      <div class="productos">
        <h1 class="productos-h1">PRODUCTOS</h1>

        <ul>
          <li class="categorias">
            <a href="#" onclick="mostrarSubmenu(event)">Categorías ▼</a>

            <!-- SUBMENÚ -->
            <ul class="submenu" id="lista-categorias">
              <li><a onclick="mostrarCategoria('florales')">Arreglos florales</a></li>
              <li><a onclick="mostrarCategoria('gourmet')">Gourmet</a></li>
              <li><a onclick="mostrarCategoria('flores')">Flores</a></li>
              <li><a onclick="mostrarCategoria('animales')">Animales</a></li>
            </ul>
          </li>
        </ul>
      </div>

      <!-- IMÁGENES -->
      <div id="contenedor-categorias" class="contenedor-categorias"></div>
    </main>
