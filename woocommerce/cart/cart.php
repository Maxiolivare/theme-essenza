<!-- FILA DEL PRODUCTO -->
<div class="row py-4 producto-item">

    <div class="col-12 col-md-4 d-flex align-items-start mb-3 mb-md-0">
        <div class="form-check me-2 mt-1">
            <input class="form-check-input" type="checkbox" value="">
        </div>
        <?php echo $img; ?>
    </div>

    <!-- INFORMACIÓN -->
    <div class="col-12 col-md-6">
        <h5 class="mb-1 nombre-carrito"><?php echo esc_html( $nombre ); ?></h5>
        <p class="mb-2 precio-carri"><?php echo $precio; ?></p>

        <!-- ATRIBUTOS DEL PRODUCTO -->
        <?php
        if ( ! empty( $cart_item['variation'] ) ) {
            echo '<div class="mb-2 atributos-carrito">';
            foreach ( $cart_item['variation'] as $attr_name => $attr_value ) {
                $label = wc_attribute_label( $attr_name );
                echo '<div class="atributo-linea"><strong>' . esc_html($label) . ':</strong> ' . esc_html($attr_value) . '</div>';
            }
            echo '</div>';
        }
        ?>

        <!-- CANTIDAD -->
        <div class="cantidad-box mb-2 mt-3">
            <div class="btn-group" role="group">

                <button type="button"
                    class="btn btn-primary bg-white border-custom textos-naranja border-end-0 qty-btn-custom"
                    data-type="minus"
                    data-target="<?php echo $cart_item_key; ?>">
                    <i class="bi bi-dash"></i>
                </button>

                <button type="button"
                    id="cantidadVisual-<?php echo $cart_item_key; ?>"
                    class="btn btn-primary bg-white border-custom textos-naranja border-start-0 border-end-0">
                    <?php echo $cart_item['quantity']; ?>
                </button>

                <input type="number"
                    class="d-none"
                    name="cart[<?php echo $cart_item_key; ?>][qty]"
                    id="qty-real-<?php echo $cart_item_key; ?>"
                    value="<?php echo $cart_item['quantity']; ?>"
                    min="1" />

                <button type="button"
                    class="btn btn-primary bg-white border-custom textos-naranja border-start-0 qty-btn-custom"
                    data-type="plus"
                    data-target="<?php echo $cart_item_key; ?>">
                    <i class="bi bi-plus"></i>
                </button>
            </div>

            <a href="<?php echo wc_get_cart_remove_url( $cart_item_key ); ?>" 
               class="ms-3 text-danger">
                <i class="bi bi-trash"></i>
            </a>
        </div>
    </div>

    <div class="col-12 col-md-2 text-md-end mt-3 mt-md-0 subtotal-carrito">
        <strong><?php echo $subtotal; ?></strong>
    </div>
</div>










