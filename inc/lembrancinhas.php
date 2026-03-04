<?php
/**
 * Lembrancinhas Product Configurator
 *
 * Custom cascading dropdowns and pricing for Lembrancinhas products.
 * Adds Tipo → Aroma → Quantidade selection with dynamic pricing.
 *
 * @package tema_aromas
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Check if a product belongs to the 'lembrancinhas' category
 *
 * @param int|WC_Product|null $product Product ID, object, or null for global
 * @return bool
 */
function tema_aromas_is_lembrancinha($product = null) {
    if (is_null($product)) {
        global $product;
    }
    if (is_numeric($product)) {
        $product_id = $product;
    } elseif (is_a($product, 'WC_Product')) {
        $product_id = $product->get_id();
    } else {
        return false;
    }
    return has_term('lembrancinhas', 'product_cat', $product_id);
}

/**
 * Get the Lembrancinhas price matrix
 *
 * @return array tipo => [ quantidade => price ]
 */
function tema_aromas_lembrancinhas_prices() {
    return [
        'mini-velas' => [
            25  => 199.90,
            50  => 349.90,
            100 => 599.90,
        ],
        'mini-home-spray' => [
            25  => 224.90,
            50  => 399.90,
            100 => 699.90,
        ],
    ];
}

/**
 * Get aroma options per tipo
 *
 * @return array tipo_slug => [ aroma_slug => aroma_label ]
 */
function tema_aromas_lembrancinhas_aromas() {
    return [
        'mini-velas' => [
            'flor-de-figo' => 'Flor de Figo',
            'cha-branco'   => 'Chá Branco',
            'bamboo'       => 'Bamboo',
            'palo-santo'   => 'Palo Santo',
        ],
        'mini-home-spray' => [
            'flor-de-figo' => 'Flor de Figo',
            'cha-branco'   => 'Chá Branco',
            'bamboo'       => 'Bamboo',
            'marinho'      => 'Marinho',
        ],
    ];
}

/**
 * Get tipo labels
 *
 * @return array tipo_slug => label
 */
function tema_aromas_lembrancinhas_tipo_labels() {
    return [
        'mini-velas'      => 'Mini Velas Aromáticas',
        'mini-home-spray' => 'Mini Home Spray',
    ];
}

// ============================================================================
// Product Page: Configurator UI
// ============================================================================

/**
 * Render the Lembrancinhas configurator dropdowns and notices
 */
function tema_aromas_lembrancinhas_configurator() {
    global $product;

    if (!tema_aromas_is_lembrancinha($product)) {
        return;
    }

    $tipo_labels = tema_aromas_lembrancinhas_tipo_labels();
    ?>
    <div class="lembrancinhas-configurator" id="lembrancinhas-configurator">
        <!-- Dropdown 1: Tipo -->
        <div class="lembrancinhas-field">
            <label for="lembrancinha-tipo">Tipo</label>
            <select id="lembrancinha-tipo" name="lembrancinha_tipo" required>
                <option value="">Selecione o tipo...</option>
                <?php foreach ($tipo_labels as $slug => $label) : ?>
                    <option value="<?php echo esc_attr($slug); ?>"><?php echo esc_html($label); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Dropdown 2: Aroma (cascading) -->
        <div class="lembrancinhas-field">
            <label for="lembrancinha-aroma">Aroma</label>
            <select id="lembrancinha-aroma" name="lembrancinha_aroma" required disabled>
                <option value="">Selecione o tipo primeiro...</option>
            </select>
        </div>

        <!-- Dropdown 3: Quantidade -->
        <div class="lembrancinhas-field">
            <label for="lembrancinha-quantidade">Quantidade</label>
            <select id="lembrancinha-quantidade" name="lembrancinha_quantidade" required disabled>
                <option value="">Selecione a quantidade...</option>
                <option value="25">25 unidades</option>
                <option value="50">50 unidades</option>
                <option value="100">100 unidades</option>
            </select>
        </div>

        <!-- Dynamic Price Display -->
        <div class="lembrancinhas-price-display" id="lembrancinhas-price-display" style="display: none;">
            <span class="price-label">Valor total:</span>
            <span class="price-amount" id="lembrancinhas-price-amount"></span>
        </div>

        <!-- Info Notice: Above 100 -->
        <div class="lembrancinhas-notice lembrancinhas-notice--contact">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
            </svg>
            <p>Para pedidos acima de 100 unidades, entre em contato pelo
                <a href="<?php echo esc_url(TEMA_AROMAS_WHATSAPP_URL); ?>" target="_blank" rel="noopener noreferrer">WhatsApp <?php echo esc_html(TEMA_AROMAS_WHATSAPP_DISPLAY); ?></a>
                ou por email
                <a href="mailto:<?php echo esc_attr(TEMA_AROMAS_EMAIL); ?>"><?php echo esc_html(TEMA_AROMAS_EMAIL); ?></a>.
            </p>
        </div>

        <!-- Info Notice: Production Time -->
        <div class="lembrancinhas-notice lembrancinhas-notice--production">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="12" cy="12" r="10"></circle>
                <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
            <p><strong>Prazo de produção:</strong> 7 dias para início da produção + 15 dias para envio + prazo de entrega dos Correios.</p>
        </div>
    </div>
    <?php
}
add_action('woocommerce_before_add_to_cart_button', 'tema_aromas_lembrancinhas_configurator', 10);

// ============================================================================
// Product Page: Replace Default Price with "A partir de"
// ============================================================================

/**
 * Remove default price and add "A partir de" for Lembrancinhas
 */
function tema_aromas_lembrancinhas_modify_price_display() {
    global $product;

    if (tema_aromas_is_lembrancinha($product)) {
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
        add_action('woocommerce_single_product_summary', 'tema_aromas_lembrancinhas_price_range', 10);
    }
}
add_action('woocommerce_single_product_summary', 'tema_aromas_lembrancinhas_modify_price_display', 1);

/**
 * Display "A partir de R$ X" price
 */
function tema_aromas_lembrancinhas_price_range() {
    $prices = tema_aromas_lembrancinhas_prices();
    $min_price = PHP_FLOAT_MAX;
    foreach ($prices as $quantities) {
        foreach ($quantities as $price) {
            if ($price < $min_price) {
                $min_price = $price;
            }
        }
    }
    echo '<p class="price lembrancinhas-starting-price">';
    echo '<span class="lembrancinhas-from-label">A partir de </span>';
    echo wp_kses_post(wc_price($min_price));
    echo '</p>';
}

// ============================================================================
// Product Page: Hide Quantity Input & Add Body Class
// ============================================================================

/**
 * Lock quantity to 1 for Lembrancinhas (quantity is in the configurator dropdown)
 */
function tema_aromas_lembrancinhas_quantity_args($args, $product) {
    if (tema_aromas_is_lembrancinha($product)) {
        $args['min_value']   = 1;
        $args['max_value']   = 1;
        $args['input_value'] = 1;
    }
    return $args;
}
add_filter('woocommerce_quantity_input_args', 'tema_aromas_lembrancinhas_quantity_args', 10, 2);

/**
 * Add 'is-lembrancinha' body class for CSS targeting
 */
function tema_aromas_lembrancinhas_body_class($classes) {
    if (is_product()) {
        global $product;
        if (tema_aromas_is_lembrancinha($product)) {
            $classes[] = 'is-lembrancinha';
        }
    }
    return $classes;
}
add_filter('body_class', 'tema_aromas_lembrancinhas_body_class');

/**
 * Customize single product add-to-cart button text for Lembrancinhas
 */
function tema_aromas_lembrancinhas_single_button_text($text, $product) {
    if (tema_aromas_is_lembrancinha($product)) {
        return __('Adicionar ao Carrinho', 'tema_aromas');
    }
    return $text;
}
add_filter('woocommerce_product_single_add_to_cart_text', 'tema_aromas_lembrancinhas_single_button_text', 10, 2);

// ============================================================================
// Add to Cart: Validation
// ============================================================================

/**
 * Validate Lembrancinhas fields before adding to cart
 */
function tema_aromas_lembrancinhas_validate_add_to_cart($passed, $product_id) {
    if (!tema_aromas_is_lembrancinha($product_id)) {
        return $passed;
    }

    $tipo       = isset($_POST['lembrancinha_tipo']) ? sanitize_text_field(wp_unslash($_POST['lembrancinha_tipo'])) : '';
    $aroma      = isset($_POST['lembrancinha_aroma']) ? sanitize_text_field(wp_unslash($_POST['lembrancinha_aroma'])) : '';
    $quantidade = isset($_POST['lembrancinha_quantidade']) ? absint($_POST['lembrancinha_quantidade']) : 0;

    $valid_tipos = array_keys(tema_aromas_lembrancinhas_prices());
    if (!in_array($tipo, $valid_tipos, true)) {
        wc_add_notice(__('Por favor, selecione o tipo de lembrancinha.', 'tema_aromas'), 'error');
        return false;
    }

    $valid_aromas = array_keys(tema_aromas_lembrancinhas_aromas()[$tipo] ?? []);
    if (!in_array($aroma, $valid_aromas, true)) {
        wc_add_notice(__('Por favor, selecione o aroma.', 'tema_aromas'), 'error');
        return false;
    }

    $valid_quantities = array_keys(tema_aromas_lembrancinhas_prices()[$tipo] ?? []);
    if (!in_array($quantidade, $valid_quantities, true)) {
        wc_add_notice(__('Por favor, selecione a quantidade.', 'tema_aromas'), 'error');
        return false;
    }

    return $passed;
}
add_filter('woocommerce_add_to_cart_validation', 'tema_aromas_lembrancinhas_validate_add_to_cart', 10, 2);

// ============================================================================
// Cart: Save Custom Data
// ============================================================================

/**
 * Add Lembrancinhas configuration to cart item data
 */
function tema_aromas_lembrancinhas_add_cart_item_data($cart_item_data, $product_id) {
    if (!tema_aromas_is_lembrancinha($product_id)) {
        return $cart_item_data;
    }

    $tipo       = sanitize_text_field(wp_unslash($_POST['lembrancinha_tipo'] ?? ''));
    $aroma      = sanitize_text_field(wp_unslash($_POST['lembrancinha_aroma'] ?? ''));
    $quantidade = absint($_POST['lembrancinha_quantidade'] ?? 0);

    if ($tipo && $aroma && $quantidade) {
        $cart_item_data['lembrancinha_tipo']       = $tipo;
        $cart_item_data['lembrancinha_aroma']      = $aroma;
        $cart_item_data['lembrancinha_quantidade']  = $quantidade;

        // Unique key so different configurations are separate cart items
        $cart_item_data['unique_key'] = md5($tipo . $aroma . $quantidade);
    }

    return $cart_item_data;
}
add_filter('woocommerce_add_cart_item_data', 'tema_aromas_lembrancinhas_add_cart_item_data', 10, 2);

// ============================================================================
// Cart: Set Custom Price
// ============================================================================

/**
 * Set the custom price for Lembrancinhas cart items
 */
function tema_aromas_lembrancinhas_set_cart_price($cart) {
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    if (did_action('woocommerce_before_calculate_totals') >= 2) {
        return;
    }

    $prices = tema_aromas_lembrancinhas_prices();

    foreach ($cart->get_cart() as $cart_item) {
        if (isset($cart_item['lembrancinha_tipo'], $cart_item['lembrancinha_quantidade'])) {
            $tipo = $cart_item['lembrancinha_tipo'];
            $qty  = $cart_item['lembrancinha_quantidade'];

            if (isset($prices[$tipo][$qty])) {
                $cart_item['data']->set_price($prices[$tipo][$qty]);
            }
        }
    }
}
add_action('woocommerce_before_calculate_totals', 'tema_aromas_lembrancinhas_set_cart_price', 20);

// ============================================================================
// Cart/Checkout: Display Configuration
// ============================================================================

/**
 * Display Lembrancinhas configuration in cart and checkout
 */
function tema_aromas_lembrancinhas_get_item_data($item_data, $cart_item) {
    $aromas      = tema_aromas_lembrancinhas_aromas();
    $tipo_labels = tema_aromas_lembrancinhas_tipo_labels();

    if (isset($cart_item['lembrancinha_tipo'])) {
        $tipo = $cart_item['lembrancinha_tipo'];
        $item_data[] = [
            'key'   => __('Tipo', 'tema_aromas'),
            'value' => $tipo_labels[$tipo] ?? $tipo,
        ];
    }

    if (isset($cart_item['lembrancinha_aroma'], $cart_item['lembrancinha_tipo'])) {
        $tipo       = $cart_item['lembrancinha_tipo'];
        $aroma_slug = $cart_item['lembrancinha_aroma'];
        $item_data[] = [
            'key'   => __('Aroma', 'tema_aromas'),
            'value' => $aromas[$tipo][$aroma_slug] ?? $aroma_slug,
        ];
    }

    if (isset($cart_item['lembrancinha_quantidade'])) {
        $item_data[] = [
            'key'   => __('Quantidade', 'tema_aromas'),
            'value' => $cart_item['lembrancinha_quantidade'] . ' unidades',
        ];
    }

    return $item_data;
}
add_filter('woocommerce_get_item_data', 'tema_aromas_lembrancinhas_get_item_data', 10, 2);

/**
 * Make quantity non-editable in cart for Lembrancinhas items
 */
function tema_aromas_lembrancinhas_cart_item_quantity($product_quantity, $cart_item_key, $cart_item) {
    if (isset($cart_item['lembrancinha_tipo'])) {
        return sprintf('<span class="quantity">%s</span>', esc_html($cart_item['quantity']));
    }
    return $product_quantity;
}
add_filter('woocommerce_cart_item_quantity', 'tema_aromas_lembrancinhas_cart_item_quantity', 10, 3);

// ============================================================================
// Order: Save Configuration to Order Meta
// ============================================================================

/**
 * Save Lembrancinhas configuration to order item meta
 */
function tema_aromas_lembrancinhas_save_order_item_meta($item, $cart_item_key, $values, $order) {
    $tipo_labels = tema_aromas_lembrancinhas_tipo_labels();
    $aromas      = tema_aromas_lembrancinhas_aromas();

    if (isset($values['lembrancinha_tipo'])) {
        $tipo = $values['lembrancinha_tipo'];
        $item->add_meta_data(__('Tipo', 'tema_aromas'), $tipo_labels[$tipo] ?? $tipo, true);
    }

    if (isset($values['lembrancinha_aroma'], $values['lembrancinha_tipo'])) {
        $tipo       = $values['lembrancinha_tipo'];
        $aroma_slug = $values['lembrancinha_aroma'];
        $item->add_meta_data(__('Aroma', 'tema_aromas'), $aromas[$tipo][$aroma_slug] ?? $aroma_slug, true);
    }

    if (isset($values['lembrancinha_quantidade'])) {
        $item->add_meta_data(__('Quantidade', 'tema_aromas'), $values['lembrancinha_quantidade'] . ' unidades', true);
    }
}
add_action('woocommerce_checkout_create_order_line_item', 'tema_aromas_lembrancinhas_save_order_item_meta', 10, 4);

// ============================================================================
// Redirect after Add to Cart (prevent form resubmission on refresh)
// ============================================================================

/**
 * Redirect back to the referring page after adding any item to cart
 * Prevents browser "resend form" popup on page refresh
 */
function tema_aromas_add_to_cart_redirect($url) {
    $referer = wp_get_referer();
    if ($referer) {
        return $referer;
    }
    return $url;
}
add_filter('woocommerce_add_to_cart_redirect', 'tema_aromas_add_to_cart_redirect', 10, 1);

// ============================================================================
// Scripts: Enqueue JS + Pass Configuration
// ============================================================================

/**
 * Enqueue Lembrancinhas scripts and pass configuration to JS
 */
function tema_aromas_lembrancinhas_scripts() {
    if (!is_product()) {
        return;
    }

    $product_id = get_queried_object_id();
    if (!has_term('lembrancinhas', 'product_cat', $product_id)) {
        return;
    }

    $theme_version = wp_get_theme()->get('Version');
    if (defined('WP_DEBUG') && WP_DEBUG) {
        $theme_version = $theme_version . '.' . time();
    }

    wp_enqueue_script(
        'tema-aromas-lembrancinhas',
        get_template_directory_uri() . '/assets/js/lembrancinhas.js',
        [],
        $theme_version,
        true
    );

    // Build image map from product gallery: index 0 = mini-velas, index 1 = mini-home-spray
    $product = wc_get_product($product_id);
    $images  = [];
    $tipos   = array_keys(tema_aromas_lembrancinhas_prices());

    if ($product) {
        // Featured image as default
        $featured_id = $product->get_image_id();
        if ($featured_id) {
            $images['default'] = wp_get_attachment_image_url($featured_id, 'woocommerce_single');
        }

        // Gallery images mapped to tipos by position
        $gallery_ids = $product->get_gallery_image_ids();
        foreach ($gallery_ids as $index => $img_id) {
            if (isset($tipos[$index])) {
                $images[$tipos[$index]] = wp_get_attachment_image_url($img_id, 'woocommerce_single');
            }
        }
    }

    wp_localize_script('tema-aromas-lembrancinhas', 'lembranchinhasConfig', [
        'prices'            => tema_aromas_lembrancinhas_prices(),
        'aromas'            => tema_aromas_lembrancinhas_aromas(),
        'images'            => $images,
        'currencySymbol'    => 'R$',
        'currencyDecimals'  => 2,
        'decimalSeparator'  => ',',
        'thousandSeparator' => '.',
    ]);
}
add_action('wp_enqueue_scripts', 'tema_aromas_lembrancinhas_scripts');
