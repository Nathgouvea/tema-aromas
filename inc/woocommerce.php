<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package TemaAromas
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function tema_aromas_woocommerce_setup() {
    add_theme_support(
        'woocommerce',
        [
            'thumbnail_image_width' => 600,
            'single_image_width'    => 1200,
            'product_grid'          => [
                'default_rows'    => 3,
                'min_rows'        => 1,
                'default_columns' => 4,
                'min_columns'     => 1,
                'max_columns'     => 6,
            ],
        ]
    );
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'tema_aromas_woocommerce_setup');

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function tema_aromas_woocommerce_scripts() {
    wp_enqueue_style('tema-aromas-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce.css', [], wp_get_theme()->get('Version'));

    $font_path   = WC()->plugin_url() . '/assets/fonts/';
    $inline_font = '@font-face {
            font-family: "star";
            src: url("' . $font_path . 'star.eot");
            src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
                url("' . $font_path . 'star.woff") format("woff"),
                url("' . $font_path . 'star.ttf") format("truetype"),
                url("' . $font_path . 'star.svg#star") format("svg");
            font-weight: normal;
            font-style: normal;
        }';

    wp_add_inline_style('tema-aromas-woocommerce-style', $inline_font);
}
add_action('wp_enqueue_scripts', 'tema_aromas_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function tema_aromas_woocommerce_active_body_class($classes) {
    $classes[] = 'woocommerce-active';
    return $classes;
}
add_filter('body_class', 'tema_aromas_woocommerce_active_body_class');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function tema_aromas_woocommerce_related_products_args($args) {
    $defaults = [
        'posts_per_page' => 3,
        'columns'        => 3,
    ];

    $args = wp_parse_args($defaults, $args);

    return $args;
}
add_filter('woocommerce_output_related_products_args', 'tema_aromas_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('tema_aromas_woocommerce_wrapper_before')) {
    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function tema_aromas_woocommerce_wrapper_before() {
        ?>
        <div class="luxury-container">
            <div class="content-area">
        <?php
    }
}
add_action('woocommerce_before_main_content', 'tema_aromas_woocommerce_wrapper_before');

if (!function_exists('tema_aromas_woocommerce_wrapper_after')) {
    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function tema_aromas_woocommerce_wrapper_after() {
        ?>
            </div>
        </div>
        <?php
    }
}
add_action('woocommerce_after_main_content', 'tema_aromas_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
    <?php
        if ( function_exists( 'tema_aromas_woocommerce_header_cart' ) ) {
            tema_aromas_woocommerce_header_cart();
        }
    ?>
 */

if (!function_exists('tema_aromas_woocommerce_cart_link_fragment')) {
    /**
     * Cart Fragments.
     *
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param array $fragments Fragments to refresh via AJAX.
     * @return array Fragments to refresh via AJAX.
     */
    function tema_aromas_woocommerce_cart_link_fragment($fragments) {
        ob_start();
        tema_aromas_woocommerce_cart_link();
        $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }
}
add_filter('woocommerce_add_to_cart_fragments', 'tema_aromas_woocommerce_cart_link_fragment');

if (!function_exists('tema_aromas_woocommerce_cart_link')) {
    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function tema_aromas_woocommerce_cart_link() {
        ?>
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e('Ver seu carrinho de compras', 'tema_aromas'); ?>">
            <?php
            $item_count_text = sprintf(
                /* translators: number of items in the mini cart. */
                _n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'tema_aromas'),
                WC()->cart->get_cart_contents_count()
            );
            ?>
            <span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span> <span class="count"><?php echo esc_html($item_count_text); ?></span>
        </a>
        <?php
    }
}

if (!function_exists('tema_aromas_woocommerce_header_cart')) {
    /**
     * Display Header Cart.
     *
     * @return void
     */
    function tema_aromas_woocommerce_header_cart() {
        if (is_cart()) {
            $class = 'current-menu-item';
        } else {
            $class = '';
        }
        ?>
        <ul id="site-header-cart" class="site-header-cart">
            <li class="<?php echo esc_attr($class); ?>">
                <?php tema_aromas_woocommerce_cart_link(); ?>
            </li>
            <li>
                <?php
                $instance = [
                    'title' => '',
                ];

                the_widget('WC_Widget_Cart', $instance);
                ?>
            </li>
        </ul>
        <?php
    }
}

/**
 * Customize WooCommerce breadcrumbs
 */
function tema_aromas_woocommerce_breadcrumbs() {
    return [
        'delimiter'   => ' &rsaquo; ',
        'wrap_before' => '<nav class="woocommerce-breadcrumb luxury-breadcrumb" aria-label="' . esc_attr__('Você está aqui:', 'tema_aromas') . '">',
        'wrap_after'  => '</nav>',
        'before'      => '',
        'after'       => '',
        'home'        => _x('Início', 'breadcrumb', 'tema_aromas'),
    ];
}
add_filter('woocommerce_breadcrumb_defaults', 'tema_aromas_woocommerce_breadcrumbs');

/**
 * Use custom image size for product thumbnails in loops
 */
function tema_aromas_custom_product_thumbnail_size($size) {
    if (is_shop() || is_product_category() || is_product_tag()) {
        return 'product-card';
    }
    return $size;
}
add_filter('single_product_archive_thumbnail_size', 'tema_aromas_custom_product_thumbnail_size');

/**
 * Add srcset for better image quality on retina displays
 */
function tema_aromas_product_image_attributes($attr, $attachment, $size) {
    if (is_shop() || is_product_category() || is_product_tag()) {
        $srcset = wp_get_attachment_image_srcset($attachment->ID, 'product-card-2x');
        if ($srcset) {
            $attr['srcset'] = $srcset;
            $attr['sizes'] = '(max-width: 767px) 50vw, (max-width: 1023px) 33vw, 25vw';
        }
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'tema_aromas_product_image_attributes', 10, 3);

/**
 * Change number of products displayed per page
 */
function tema_aromas_woocommerce_products_per_page() {
    return 12;
}
add_filter('loop_shop_per_page', 'tema_aromas_woocommerce_products_per_page', 20);

/**
 * Customize WooCommerce pagination
 */
function tema_aromas_woocommerce_pagination_args($args) {
    $args['prev_text'] = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15,18 9,12 15,6"></polyline></svg>' . esc_html__('Anterior', 'tema_aromas');
    $args['next_text'] = esc_html__('Próximo', 'tema_aromas') . '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9,6 15,12 9,18"></polyline></svg>';
    $args['type'] = 'list';
    
    return $args;
}
add_filter('woocommerce_pagination_args', 'tema_aromas_woocommerce_pagination_args');

/**
 * Add luxury classes to WooCommerce elements
 */
function tema_aromas_woocommerce_post_class($classes, $product) {
    $classes[] = 'luxury-card';
    $classes[] = 'animate-fade-in-up';
    return $classes;
}
add_filter('woocommerce_post_class', 'tema_aromas_woocommerce_post_class', 10, 2);

/**
 * WooCommerce Email Customization
 * ==========================================================================
 */

/**
 * Enqueue custom email styles
 */
function tema_aromas_woocommerce_email_styles() {
    wp_enqueue_style(
        'tema-aromas-woocommerce-emails',
        get_template_directory_uri() . '/assets/css/emails.css',
        [],
        wp_get_theme()->get('Version')
    );
}
add_action('woocommerce_email_enqueue_styles', 'tema_aromas_woocommerce_email_styles');

/**
 * Customize WooCommerce email header
 */
function tema_aromas_woocommerce_email_header($email_heading, $email) {
    ?>
    <div class="email-header">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-zen.svg" alt="<?php echo get_bloginfo('name'); ?>" class="email-logo">
        <h1><?php echo esc_html($email_heading); ?></h1>
        <p><?php echo esc_html__('Obrigado por escolher Zen Secrets!', 'tema_aromas'); ?></p>
    </div>
    <?php
}
add_action('woocommerce_email_header', 'tema_aromas_woocommerce_email_header', 10, 2);

/**
 * Customize WooCommerce email footer
 */
function tema_aromas_woocommerce_email_footer() {
    ?>
    <div class="email-footer">
        <div class="trust-indicators">
            <h3><?php echo esc_html__('Por que escolher Zen Secrets?', 'tema_aromas'); ?></h3>
            <div class="trust-grid">
                <div class="trust-item">
                    <div class="trust-icon">🚚</div>
                    <h4><?php echo esc_html__('Envio Seguro', 'tema_aromas'); ?></h4>
                    <p><?php echo esc_html__('Para todo Brasil', 'tema_aromas'); ?></p>
                </div>
                <div class="trust-item">
                    <div class="trust-icon">💳</div>
                    <h4><?php echo esc_html__('Pagamento Seguro', 'tema_aromas'); ?></h4>
                    <p><?php echo esc_html__('Cartão, Pix e Boleto', 'tema_aromas'); ?></p>
                </div>
                <div class="trust-item">
                    <div class="trust-icon">🌿</div>
                    <h4><?php echo esc_html__('100% Natural', 'tema_aromas'); ?></h4>
                    <p><?php echo esc_html__('Ingredientes naturais', 'tema_aromas'); ?></p>
                </div>
            </div>
        </div>
        
        <div class="whatsapp-contact">
            <h3><?php echo esc_html__('Ficou em dúvida?', 'tema_aromas'); ?></h3>
            <p><?php echo esc_html__('Entre em contato conosco via WhatsApp', 'tema_aromas'); ?></p>
            <a href="https://wa.me/5516991626921" class="whatsapp-button">
                (16) 99162-6921
            </a>
        </div>
        
        <div class="social-links">
            <a href="https://www.instagram.com/secretszen" title="Instagram">📱 Instagram</a>
            <a href="mailto:secretszen888@gmail.com" title="Email">✉️ Email</a>
        </div>
        
        <div class="payment-methods">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/visa.png" alt="Visa">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mastercard.png" alt="Mastercard">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/amex.png" alt="American Express">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/elo.png" alt="Elo">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pix.png" alt="PIX">
        </div>
        
        <p>&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?>. <?php echo esc_html__('Todos os direitos reservados.', 'tema_aromas'); ?></p>
    </div>
    <?php
}
add_action('woocommerce_email_footer', 'tema_aromas_woocommerce_email_footer');

/**
 * Customize order status labels in emails
 */
function tema_aromas_woocommerce_order_status_labels($status) {
    $status_labels = [
        'pending'    => __('Aguardando Pagamento', 'tema_aromas'),
        'processing' => __('Processando', 'tema_aromas'),
        'on-hold'    => __('Em Espera', 'tema_aromas'),
        'completed'  => __('Concluído', 'tema_aromas'),
        'cancelled'  => __('Cancelado', 'tema_aromas'),
        'refunded'   => __('Reembolsado', 'tema_aromas'),
        'failed'     => __('Falhou', 'tema_aromas'),
    ];
    
    return isset($status_labels[$status]) ? $status_labels[$status] : $status;
}
add_filter('woocommerce_order_status_label', 'tema_aromas_woocommerce_order_status_labels');

/**
 * Add custom email content before order details
 */
function tema_aromas_woocommerce_email_before_order_details($order, $sent_to_admin, $plain_text, $email) {
    if (!$sent_to_admin) {
        ?>
        <div class="email-section">
            <h2 class="email-section-title"><?php echo esc_html__('Seu Pedido foi Recebido!', 'tema_aromas'); ?></h2>
            <p><?php echo esc_html__('Olá! Recebemos seu pedido e estamos muito felizes que você tenha escolhido Zen Secrets para cuidar do seu bem-estar.', 'tema_aromas'); ?></p>
            <p><?php echo esc_html__('Abaixo você encontra todos os detalhes do seu pedido:', 'tema_aromas'); ?></p>
        </div>
        <?php
    }
}
add_action('woocommerce_email_before_order_table', 'tema_aromas_woocommerce_email_before_order_details', 10, 4);

/**
 * Add custom email content after order details
 */
function tema_aromas_woocommerce_email_after_order_details($order, $sent_to_admin, $plain_text, $email) {
    if (!$sent_to_admin) {
        ?>
        <div class="email-section">
            <h2 class="email-section-title"><?php echo esc_html__('Próximos Passos', 'tema_aromas'); ?></h2>
            <p><?php echo esc_html__('Assim que seu pagamento for confirmado, começaremos a preparar seu pedido com muito carinho.', 'tema_aromas'); ?></p>
            <p><?php echo esc_html__('Você receberá atualizações sobre o status do seu pedido por email.', 'tema_aromas'); ?></p>
        </div>
        
        <div class="email-actions">
            <a href="<?php echo esc_url(wc_get_account_endpoint_url('orders')); ?>" class="email-button">
                <?php echo esc_html__('Ver Meus Pedidos', 'tema_aromas'); ?>
            </a>
            <a href="<?php echo esc_url(home_url()); ?>" class="email-button secondary">
                <?php echo esc_html__('Continuar Comprando', 'tema_aromas'); ?>
            </a>
        </div>
        <?php
    }
}
add_action('woocommerce_email_after_order_table', 'tema_aromas_woocommerce_email_after_order_details', 10, 4);

/**
 * Customize email subject lines
 */
function tema_aromas_woocommerce_email_subject($subject, $email) {
    $subject = str_replace('Your order', 'Seu pedido', $subject);
    $subject = str_replace('has been received', 'foi recebido', $subject);
    $subject = str_replace('is now complete', 'foi concluído', $subject);
    $subject = str_replace('has been cancelled', 'foi cancelado', $subject);
    
    return $subject;
}
add_filter('woocommerce_email_subject', 'tema_aromas_woocommerce_email_subject', 10, 2);

/**
 * Add tracking information to completed order emails
 */
function tema_aromas_woocommerce_completed_order_email($order, $sent_to_admin, $plain_text, $email) {
    if (!$sent_to_admin && $order->get_meta('_tracking_number')) {
        $tracking_number = $order->get_meta('_tracking_number');
        $tracking_url = $order->get_meta('_tracking_url');
        
        ?>
        <div class="email-section">
            <h2 class="email-section-title"><?php echo esc_html__('Informações de Rastreamento', 'tema_aromas'); ?></h2>
            <p><?php echo esc_html__('Seu pedido foi enviado! Use as informações abaixo para acompanhar a entrega:', 'tema_aromas'); ?></p>
            
            <div class="order-details">
                <p><strong><?php echo esc_html__('Número de Rastreamento:', 'tema_aromas'); ?></strong> <?php echo esc_html($tracking_number); ?></p>
                <?php if ($tracking_url) : ?>
                    <p><strong><?php echo esc_html__('Rastrear Envio:', 'tema_aromas'); ?></strong> 
                        <a href="<?php echo esc_url($tracking_url); ?>" class="email-button">
                            <?php echo esc_html__('Rastrear Agora', 'tema_aromas'); ?>
                        </a>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <?php
    }
}
add_action('woocommerce_email_order_details', 'tema_aromas_woocommerce_completed_order_email', 20, 4);
