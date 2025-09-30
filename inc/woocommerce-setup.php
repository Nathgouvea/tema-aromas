<?php
/**
 * WooCommerce Setup Functions
 * 
 * Functions to automatically create required WooCommerce pages
 * and configure essential settings for the Tema Aromas theme
 * 
 * @package TemaAromas
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Create essential WooCommerce pages with shortcodes
 * This function should be called when theme is activated
 */
function tema_aromas_create_woocommerce_pages() {
    // Check if WooCommerce is active
    if (!class_exists('WooCommerce')) {
        return false;
    }

    // Array of pages to create
    $pages = [
        'carrinho' => [
            'title' => 'Carrinho',
            'content' => '[woocommerce_cart]',
            'template' => 'page-carrinho.php'
        ],
        'finalizar-compra' => [
            'title' => 'Finalizar Compra',
            'content' => '[woocommerce_checkout]',
            'template' => 'page-checkout.php'
        ],
        'minha-conta' => [
            'title' => 'Minha Conta',
            'content' => '[woocommerce_my_account]',
            'template' => 'page-minha-conta.php'
        ],
        'rastreamento' => [
            'title' => 'Rastreamento de Pedido',
            'content' => '[woocommerce_order_tracking]',
            'template' => 'page-rastreamento.php'
        ]
    ];

    foreach ($pages as $slug => $page_data) {
        // Check if page already exists
        $existing_page = get_page_by_path($slug);
        
        if (!$existing_page) {
            // Create the page
            $page_id = wp_insert_post([
                'post_title' => $page_data['title'],
                'post_content' => $page_data['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_name' => $slug,
                'post_author' => 1
            ]);

            if ($page_id && !is_wp_error($page_id)) {
                // Set page template if specified
                if (!empty($page_data['template'])) {
                    update_post_meta($page_id, '_wp_page_template', $page_data['template']);
                }

                // Log success
                error_log("Tema Aromas: Created page '{$page_data['title']}' with ID {$page_id}");
            }
        }
    }

    return true;
}

/**
 * Configure WooCommerce settings for Brazilian market
 */
function tema_aromas_configure_woocommerce_settings() {
    if (!class_exists('WooCommerce')) {
        return;
    }

    // Set currency to Brazilian Real
    update_option('woocommerce_currency', 'BRL');
    
    // Set currency position (before with space: R$ 10,00)
    update_option('woocommerce_currency_pos', 'left_space');
    
    // Set decimal separator (comma for Brazilian format)
    update_option('woocommerce_price_decimal_sep', ',');
    
    // Set thousand separator (dot for Brazilian format)
    update_option('woocommerce_price_thousand_sep', '.');
    
    // Set number of decimals
    update_option('woocommerce_price_num_decimals', '2');

    // Enable guest checkout
    update_option('woocommerce_enable_guest_checkout', 'yes');
    
    // Enable customer registration on checkout
    update_option('woocommerce_enable_signup_and_login_from_checkout', 'yes');

    // Configure image sizes for luxury design - Higher quality
    update_option('woocommerce_thumbnail_image_width', '600');
    update_option('woocommerce_single_image_width', '1200');
    update_option('woocommerce_thumbnail_cropping', 'custom');
    update_option('woocommerce_thumbnail_cropping_custom_width', '4');
    update_option('woocommerce_thumbnail_cropping_custom_height', '5');

    // Log configuration
    error_log("Tema Aromas: WooCommerce settings configured for Brazilian market");
}

/**
 * Theme activation hook
 */
function tema_aromas_theme_activation() {
    // Create WooCommerce pages
    tema_aromas_create_woocommerce_pages();
    
    // Configure WooCommerce settings
    tema_aromas_configure_woocommerce_settings();
    
    // Create product categories
    tema_aromas_create_product_categories();
    
    // Flush rewrite rules
    flush_rewrite_rules();
}

// Hook for theme activation (can be called manually or on theme switch)
add_action('after_switch_theme', 'tema_aromas_theme_activation');

/**
 * Add admin notice with setup instructions
 */
function tema_aromas_admin_setup_notice() {
    if (!class_exists('WooCommerce')) {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p>
                <strong><?php esc_html_e('Tema Aromas:', 'tema_aromas'); ?></strong>
                <?php esc_html_e('Para funcionar corretamente, este tema requer o plugin WooCommerce. Por favor, instale e ative o WooCommerce.', 'tema_aromas'); ?>
            </p>
        </div>
        <?php
        return;
    }

    // Check if essential pages exist
    $cart_page = get_page_by_path('carrinho');
    $checkout_page = get_page_by_path('finalizar-compra');
    
    if (!$cart_page || !$checkout_page) {
        ?>
        <div class="notice notice-info is-dismissible">
            <p>
                <strong><?php esc_html_e('Tema Aromas:', 'tema_aromas'); ?></strong>
                <?php esc_html_e('Configure as páginas do WooCommerce indo em WooCommerce > Configurações > Avançado > Configuração de página.', 'tema_aromas'); ?>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'tema_aromas_admin_setup_notice');
