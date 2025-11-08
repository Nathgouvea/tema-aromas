<?php
/**
 * Minimal Functions for Debugging
 * 
 * @package TemaAromas
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Contact Information Constants
 * Centralized contact info for easy maintenance
 */
define('TEMA_AROMAS_WHATSAPP', '5516991626921');
define('TEMA_AROMAS_WHATSAPP_URL', 'https://wa.me/5516991626921');
define('TEMA_AROMAS_WHATSAPP_DISPLAY', '(16) 99162-6921');
define('TEMA_AROMAS_INSTAGRAM', '@secretszen');
define('TEMA_AROMAS_INSTAGRAM_URL', 'https://www.instagram.com/secretszen');
define('TEMA_AROMAS_EMAIL', 'secretszen888@gmail.com');

/**
 * Theme Setup
 */
function tema_aromas_setup() {
    // Make theme available for translation
    load_theme_textdomain('tema_aromas', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');
    
    // Add custom image sizes for better quality product cards
    add_image_size('product-card', 600, 750, true); // 4:5 aspect ratio
    add_image_size('product-card-2x', 1200, 1500, true); // Retina version

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for HTML5 markup
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);

    // Set up the WordPress core custom background feature
    add_theme_support('custom-background', [
        'default-color' => 'ffffff',
        'default-image' => '',
    ]);

    // Add theme support for custom logo
    add_theme_support('custom-logo', [
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    // Register navigation menus
    register_nav_menus([
        'header' => esc_html__('Menu Principal', 'tema_aromas'),
        'footer' => esc_html__('Menu Rodapé', 'tema_aromas'),
    ]);

    // Add WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'tema_aromas_setup');

/**
 * Enqueue scripts and styles.
 */
function tema_aromas_scripts() {
    $theme_version = wp_get_theme()->get('Version');
    
    // Add cache-busting for development
    if (defined('WP_DEBUG') && WP_DEBUG) {
        $theme_version = $theme_version . '.' . time();
    }

    // Main stylesheet
    wp_enqueue_style('tema-aromas-style', get_stylesheet_uri(), [], $theme_version);

    // Google Fonts
    wp_enqueue_style(
        'tema-aromas-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap',
        [],
        null
    );

    // Base CSS
    wp_enqueue_style(
        'tema-aromas-base',
        get_template_directory_uri() . '/assets/css/base.css',
        ['tema-aromas-style'],
        $theme_version
    );

    // Buttons CSS (unified button system)
    wp_enqueue_style(
        'tema-aromas-buttons',
        get_template_directory_uri() . '/assets/css/buttons.css',
        ['tema-aromas-base'],
        $theme_version
    );

    // Utilities CSS
    wp_enqueue_style(
        'tema-aromas-utilities',
        get_template_directory_uri() . '/assets/css/utilities.css',
        ['tema-aromas-base'],
        $theme_version
    );

    // Header CSS
    wp_enqueue_style(
        'tema-aromas-header',
        get_template_directory_uri() . '/assets/css/header.css',
        ['tema-aromas-base'],
        $theme_version
    );

    // Footer CSS
    wp_enqueue_style(
        'tema-aromas-footer',
        get_template_directory_uri() . '/assets/css/footer.css',
        ['tema-aromas-base'],
        $theme_version
    );

    // Pages CSS (for static content pages)
    wp_enqueue_style(
        'tema-aromas-pages',
        get_template_directory_uri() . '/assets/css/pages.css',
        ['tema-aromas-base'],
        $theme_version
    );

    // WooCommerce CSS (for WooCommerce pages)
    if (class_exists('WooCommerce') && (is_woocommerce() || is_cart() || is_checkout() || is_account_page())) {
        wp_enqueue_style(
            'tema-aromas-woocommerce',
            get_template_directory_uri() . '/assets/css/woocommerce.css',
            ['tema-aromas-base', 'tema-aromas-pages'],
            $theme_version
        );
    }

    // Legal Pages CSS (for policy and legal pages)
    if (is_page_template([
        'page-politica-privacidade.php',
        'page-termos-condicoes.php', 
        'page-faq.php'
    ])) {
        wp_enqueue_style(
            'tema-aromas-legal-pages',
            get_template_directory_uri() . '/assets/css/legal-pages.css',
            ['tema-aromas-base'],
            $theme_version
        );
    }

    // Homepage CSS (for front page)
    if (is_front_page()) {
        wp_enqueue_style(
            'tema-aromas-homepage',
            get_template_directory_uri() . '/assets/css/homepage.css',
            ['tema-aromas-base'],
            $theme_version
        );
    }

    // Main JavaScript
    wp_enqueue_script(
        'tema-aromas-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        $theme_version,
        true
    );

    // Menu Dropdown JavaScript
    wp_enqueue_script(
        'tema-aromas-menu-dropdown',
        get_template_directory_uri() . '/assets/js/menu_dropdown.js',
        [],
        $theme_version,
        true
    );
    
    // Mobile Menu JavaScript
    wp_enqueue_script(
        'tema-aromas-mobile-menu',
        get_template_directory_uri() . '/assets/js/mobile-menu.js',
        [],
        $theme_version,
        true
    );

    // Accessibility JavaScript
    wp_enqueue_script(
        'tema-aromas-accessibility',
        get_template_directory_uri() . '/assets/js/accessibility.js',
        [],
        $theme_version,
        true
    );

    // Header Scroll Effect JavaScript
    wp_enqueue_script(
        'tema-aromas-header-scroll',
        get_template_directory_uri() . '/assets/js/header-scroll.js',
        [],
        $theme_version,
        true
    );

    // Mini Cart JavaScript
    if (class_exists('WooCommerce')) {
        wp_enqueue_script(
            'tema-aromas-minicart',
            get_template_directory_uri() . '/assets/js/minicart.js',
            ['jquery'],
            $theme_version,
            true
        );

        // Localize script for AJAX and nonce
        wp_localize_script(
            'tema-aromas-minicart',
            'temaAromas',
            [
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce'   => wp_create_nonce('tema_aromas_cart_nonce')
            ]
        );

        // Product Accordion JavaScript (single product page)
        if (is_product()) {
            wp_enqueue_script(
                'tema-aromas-product-accordion',
                get_template_directory_uri() . '/assets/js/product-accordion.js',
                [],
                $theme_version,
                true
            );
        }
    }

    // Search Functionality JavaScript
    wp_enqueue_script(
        'tema-aromas-search',
        get_template_directory_uri() . '/assets/js/search.js',
        [],
        $theme_version,
        true
    );

    // Pages JavaScript (for static content pages)
    wp_enqueue_script(
        'tema-aromas-pages',
        get_template_directory_uri() . '/assets/js/pages.js',
        [],
        $theme_version,
        true
    );

    // Aromas Page JavaScript (for accordion and pills functionality)
    if (is_page_template('page-sobre-aromas.php') || is_page('sobre-os-aromas')) {
        wp_enqueue_script(
            'tema-aromas-aromas',
            get_template_directory_uri() . '/assets/js/aromas.js',
            [],
            $theme_version,
            true
        );
    }

    // Homepage JavaScript (for front page)
    if (is_front_page()) {
        // Aromas Carousel JavaScript (homepage aromas slider)
        wp_enqueue_script(
            'tema-aromas-aromas-carousel',
            get_template_directory_uri() . '/assets/js/aromas-carousel.js',
            [],
            $theme_version,
            true
        );

        // Product Sliders JavaScript (featured & novidades sliders)
        wp_enqueue_script(
            'tema-aromas-product-sliders',
            get_template_directory_uri() . '/assets/js/product-sliders.js',
            [],
            $theme_version,
            true
        );

        wp_enqueue_script(
            'tema-aromas-homepage',
            get_template_directory_uri() . '/assets/js/homepage.js',
            [],
            $theme_version,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'tema_aromas_scripts');

/**
 * Disable caching during development
 */
function tema_aromas_disable_dev_caching() {
    if (defined('WP_DEBUG') && WP_DEBUG) {
        // Disable browser caching for development
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
    }
}
add_action('send_headers', 'tema_aromas_disable_dev_caching');

/**
 * Register widget area.
 */
function tema_aromas_widgets_init() {
    register_sidebar([
        'name'          => esc_html__('Sidebar de Filtros', 'tema_aromas'),
        'id'            => 'sidebar-filters',
        'description'   => esc_html__('Adicione widgets de filtro de produtos aqui.', 'tema_aromas'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);

    register_sidebar([
        'name'          => esc_html__('Rodapé Coluna 1', 'tema_aromas'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Adicione widgets para a primeira coluna do rodapé.', 'tema_aromas'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);

    register_sidebar([
        'name'          => esc_html__('Rodapé Coluna 2', 'tema_aromas'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Adicione widgets para a segunda coluna do rodapé.', 'tema_aromas'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);

    register_sidebar([
        'name'          => esc_html__('Rodapé Coluna 3', 'tema_aromas'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Adicione widgets para a terceira coluna do rodapé.', 'tema_aromas'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', 'tema_aromas_widgets_init');

/**
 * Create WooCommerce product categories on theme activation
 */
function tema_aromas_create_product_categories() {
    if (!class_exists('WooCommerce')) {
        return;
    }

    $categories = [
        'aromatizadores' => [
            'name' => 'Aromatizadores',
            'description' => 'Difusores elétricos elegantes que espalham fragrâncias uniformemente por todo o ambiente com tecnologia ultrassônica.'
        ],
        'home-spray' => [
            'name' => 'Home Spray',
            'description' => 'Sprays aromáticos de ação instantânea para perfumar qualquer ambiente rapidamente. Ideais para momentos especiais.'
        ],
        'velas-aromaticas' => [
            'name' => 'Velas Aromáticas',
            'description' => 'Velas artesanais de cera natural que combinam a magia da luz com fragrâncias encantadoras para momentos únicos.'
        ],
        'kits-especiais' => [
            'name' => 'Kits Especiais',
            'description' => 'Conjuntos cuidadosamente montados com produtos complementares. Economia garantida e experiência completa.'
        ],
        'lembrancinhas' => [
            'name' => 'Lembrancinhas',
            'description' => 'Pequenos presentes aromáticos para casamentos, aniversários e eventos especiais. Memórias olfativas inesquecíveis.'
        ],
        'acessorios' => [
            'name' => 'Acessórios',
            'description' => 'Complementos essenciais para sua experiência aromática: varetas, recipientes, suportes e muito mais.'
        ]
    ];

    foreach ($categories as $slug => $category_data) {
        // Check if category already exists
        if (!get_term_by('slug', $slug, 'product_cat')) {
            wp_insert_term(
                $category_data['name'],
                'product_cat',
                [
                    'slug' => $slug,
                    'description' => $category_data['description']
                ]
            );
        }
    }
}
add_action('after_switch_theme', 'tema_aromas_create_product_categories');

/**
 * Manual trigger to create categories (secured with authentication)
 */
function tema_aromas_manual_create_categories() {
    // SECURITY FIX: Only allow admins to create categories
    if (isset($_GET['create_categories']) && $_GET['create_categories'] === 'yes') {
        // Check if user has admin capabilities
        if (!current_user_can('manage_options')) {
            wp_die('Você não tem permissão para acessar esta funcionalidade.');
        }
        
        // Verify nonce for additional security (optional but recommended)
        // To use this, add ?create_categories=yes&_wpnonce=[nonce_value] to URL
        if (isset($_GET['_wpnonce']) && !wp_verify_nonce($_GET['_wpnonce'], 'create_categories')) {
            wp_die('Token de segurança inválido.');
        }
        
        tema_aromas_create_product_categories();
        echo '<div style="background: #4CAF50; color: white; padding: 20px; margin: 20px; border-radius: 5px;">';
        echo '<h3>✅ Categorias WooCommerce criadas com sucesso!</h3>';
        echo '<p>As categorias de produtos foram criadas. Agora você pode:</p>';
        echo '<ul>';
        echo '<li>Acessar o painel WordPress → Produtos → Categorias</li>';
        echo '<li>Adicionar produtos às categorias</li>';
        echo '<li>Testar a navegação do menu</li>';
        echo '</ul>';
        echo '<p><strong>Importante:</strong> Remova este parâmetro da URL após usar.</p>';
        echo '</div>';
        echo '<script>setTimeout(function(){ window.location.href = "' . home_url() . '"; }, 5000);</script>';
        exit;
    }
}
add_action('init', 'tema_aromas_manual_create_categories');

/**
 * Set Brazilian Portuguese locale
 */
add_filter('locale', function($locale) {
    return 'pt_BR';
});

/**
 * Set Brazilian currency symbol for WooCommerce
 */
add_filter('woocommerce_currency_symbol', function($symbol, $currency) {
    if ($currency === 'BRL') {
        return 'R$';
    }
    return $symbol;
}, 10, 2);

/**
 * Add custom body classes
 */
function tema_aromas_body_classes($classes) {
    // Add homepage class for navbar color management
    if (is_front_page()) {
        $classes[] = 'homepage';
    }
    
    return $classes;
}
add_filter('body_class', 'tema_aromas_body_classes');





/**
 * Include required files
 */
if (file_exists(get_template_directory() . '/inc/template-functions.php')) {
    require_once get_template_directory() . '/inc/template-functions.php';
}

if (file_exists(get_template_directory() . '/inc/customizer.php')) {
    require_once get_template_directory() . '/inc/customizer.php';
}

if (file_exists(get_template_directory() . '/inc/class-nav-walker.php')) {
    require_once get_template_directory() . '/inc/class-nav-walker.php';
}

if (class_exists('WooCommerce') && file_exists(get_template_directory() . '/inc/woocommerce.php')) {
    require_once get_template_directory() . '/inc/woocommerce.php';
}

if (file_exists(get_template_directory() . '/inc/woocommerce-setup.php')) {
    require_once get_template_directory() . '/inc/woocommerce-setup.php';
}

// SEO and Meta optimization
if (file_exists(get_template_directory() . '/functions-seo.php')) {
    require_once get_template_directory() . '/functions-seo.php';
}

// Performance optimization
if (file_exists(get_template_directory() . '/performance-optimization.php')) {
    require_once get_template_directory() . '/performance-optimization.php';
}

/**
 * Remove Downloads menu item from WooCommerce My Account navigation
 */
add_filter('woocommerce_account_menu_items', function($menu_items) {
    // Remove the Downloads menu item
    if (isset($menu_items['downloads'])) {
        unset($menu_items['downloads']);
    }
    return $menu_items;
}, 10, 1);

/**
 * Change "Visualizar" to "Ver" in orders table for better UX
 */
add_filter('gettext', function($translated_text, $text, $domain) {
    if ($domain === 'woocommerce') {
        if ($translated_text === 'Visualizar') {
            return 'Ver';
        }
    }
    return $translated_text;
}, 10, 3);

/**
 * Move product tabs inside summary div for accordion layout
 */
function tema_aromas_move_product_tabs() {
    // Remove tabs from default position (priority 10)
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

    // Add tabs inside summary div (after meta - priority 40)
    add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 45);

    // Remove product meta (category and tags) from single product page
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
}
add_action('after_setup_theme', 'tema_aromas_move_product_tabs');

/**
 * Set related products to display 4 columns
 */
add_filter('woocommerce_output_related_products_args', function($args) {
    $args['columns'] = 4;
    return $args;
});

/**
 * ===========================================================================
 * Apple-Style WooCommerce Email Customization
 * ===========================================================================
 *
 * Applies clean, minimal Apple design to all WooCommerce transactional emails
 * - Typography: SF Pro Display inspired fonts
 * - Colors: Brand purple (#6b4fc4) with subtle gradients
 * - Layout: Spacious, clean, and mobile-responsive
 * - Elements: Rounded corners, soft shadows, modern buttons
 */

/**
 * Add custom CSS to WooCommerce emails
 * Using multiple hooks to ensure styles are applied
 */
function tema_aromas_email_styles() {
    ?>
    <style type="text/css">
        /* Apple-Style Email Base Reset */
        body {
            margin: 0 !important;
            padding: 0 !important;
            background-color: #f5f5f7 !important;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif !important;
            -webkit-font-smoothing: antialiased !important;
            -moz-osx-font-smoothing: grayscale !important;
        }

        /* Email Container - Clean White Card */
        #wrapper {
            background-color: #f5f5f7 !important;
            padding: 40px 20px !important;
        }

        #template_container {
            background-color: #ffffff !important;
            border: none !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08) !important;
            max-width: 600px !important;
            margin: 0 auto !important;
            overflow: hidden !important;
        }

        /* Header - Apple Gradient Style */
        #template_header {
            background: linear-gradient(135deg, #6b4fc4 0%, #8b6fd9 100%) !important;
            border: none !important;
            padding: 40px 40px 32px !important;
            text-align: center !important;
            border-top-left-radius: 16px !important;
            border-top-right-radius: 16px !important;
        }

        #template_header h1 {
            color: #ffffff !important;
            font-size: 28px !important;
            font-weight: 600 !important;
            margin: 0 !important;
            padding: 0 !important;
            letter-spacing: -0.015em !important;
            line-height: 1.2 !important;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.15) !important;
        }

        /* Body Content - Spacious Apple Layout */
        #template_body {
            background-color: #ffffff !important;
            padding: 0 !important;
        }

        #body_content {
            background-color: #ffffff !important;
            padding: 40px !important;
        }

        #body_content_inner {
            color: #1d1d1f !important;
            font-size: 17px !important;
            line-height: 1.5 !important;
            text-align: left !important;
        }

        /* Typography - Apple Style */
        h2 {
            color: #1d1d1f !important;
            font-size: 24px !important;
            font-weight: 600 !important;
            margin: 32px 0 16px !important;
            letter-spacing: -0.015em !important;
            line-height: 1.2 !important;
        }

        h3 {
            color: #1d1d1f !important;
            font-size: 20px !important;
            font-weight: 600 !important;
            margin: 24px 0 12px !important;
            letter-spacing: -0.01em !important;
        }

        p {
            color: #555555 !important;
            font-size: 17px !important;
            line-height: 1.5 !important;
            margin: 0 0 16px !important;
        }

        /* Links - Purple Brand Color */
        a {
            color: #6b4fc4 !important;
            text-decoration: none !important;
            font-weight: 500 !important;
        }

        a:hover {
            text-decoration: underline !important;
        }

        /* Order Details Table - Clean Minimal */
        table.td {
            border: none !important;
            width: 100% !important;
            margin: 24px 0 !important;
            border-collapse: separate !important;
            border-spacing: 0 !important;
        }

        table.td th {
            background-color: #f5f5f7 !important;
            color: #1d1d1f !important;
            font-size: 14px !important;
            font-weight: 600 !important;
            text-align: left !important;
            padding: 16px !important;
            border: none !important;
            text-transform: uppercase !important;
            letter-spacing: 0.05em !important;
        }

        table.td th:first-child {
            border-top-left-radius: 8px !important;
        }

        table.td th:last-child {
            border-top-right-radius: 8px !important;
        }

        table.td td {
            background-color: #ffffff !important;
            color: #555555 !important;
            font-size: 15px !important;
            padding: 16px !important;
            border-bottom: 1px solid #f0f0f0 !important;
            vertical-align: top !important;
        }

        table.td tr:last-child td {
            border-bottom: none !important;
        }

        table.td tr:last-child td:first-child {
            border-bottom-left-radius: 8px !important;
        }

        table.td tr:last-child td:last-child {
            border-bottom-right-radius: 8px !important;
        }

        /* Order Total - Highlighted */
        .order-total {
            background-color: #f5f5f7 !important;
            padding: 20px !important;
            border-radius: 12px !important;
            margin: 24px 0 !important;
        }

        .order-total th,
        .order-total td {
            font-size: 20px !important;
            font-weight: 600 !important;
            color: #1d1d1f !important;
            padding: 8px 0 !important;
            border: none !important;
        }

        /* Addresses Box - Card Style */
        .addresses {
            display: table !important;
            width: 100% !important;
            margin: 24px 0 !important;
        }

        .address {
            display: table-cell !important;
            width: 50% !important;
            padding: 24px !important;
            background-color: #fafafa !important;
            border-radius: 12px !important;
            vertical-align: top !important;
        }

        .address:first-child {
            padding-right: 12px !important;
        }

        .address:last-child {
            padding-left: 12px !important;
        }

        .address h3 {
            font-size: 14px !important;
            font-weight: 600 !important;
            color: #86868b !important;
            text-transform: uppercase !important;
            letter-spacing: 0.06em !important;
            margin: 0 0 12px !important;
        }

        .address address {
            font-style: normal !important;
            font-size: 15px !important;
            line-height: 1.6 !important;
            color: #555555 !important;
        }

        /* Buttons - Apple Pill Style */
        .btn,
        a.button,
        button.button,
        input.button {
            background: linear-gradient(135deg, #6b4fc4 0%, #8b6fd9 100%) !important;
            color: #ffffff !important;
            padding: 14px 32px !important;
            border-radius: 980px !important;
            font-size: 17px !important;
            font-weight: 500 !important;
            text-decoration: none !important;
            display: inline-block !important;
            border: none !important;
            box-shadow: 0 4px 12px rgba(107, 79, 196, 0.25) !important;
            letter-spacing: -0.01em !important;
            margin: 16px 0 !important;
        }

        .btn:hover,
        a.button:hover {
            box-shadow: 0 6px 20px rgba(107, 79, 196, 0.35) !important;
            transform: translateY(-1px) !important;
        }

        /* Footer - Subtle Apple Style */
        #template_footer {
            background-color: #ffffff !important;
            border-top: 1px solid #f0f0f0 !important;
            padding: 32px 40px !important;
            text-align: center !important;
            border-bottom-left-radius: 16px !important;
            border-bottom-right-radius: 16px !important;
        }

        #template_footer #credit {
            color: #86868b !important;
            font-size: 14px !important;
            line-height: 1.6 !important;
            margin: 0 !important;
            text-align: center !important;
        }

        #template_footer #credit a {
            color: #6b4fc4 !important;
            font-weight: 500 !important;
        }

        /* Product Images - Rounded */
        img {
            border-radius: 8px !important;
            max-width: 100% !important;
            height: auto !important;
        }

        /* Mobile Responsive */
        @media only screen and (max-width: 600px) {
            #wrapper {
                padding: 20px 10px !important;
            }

            #template_container {
                border-radius: 12px !important;
            }

            #template_header,
            #body_content,
            #template_footer {
                padding: 24px 20px !important;
            }

            #template_header h1 {
                font-size: 24px !important;
            }

            h2 {
                font-size: 20px !important;
            }

            p,
            #body_content_inner {
                font-size: 15px !important;
            }

            table.td th,
            table.td td {
                padding: 12px 8px !important;
                font-size: 14px !important;
            }

            .addresses {
                display: block !important;
            }

            .address {
                display: block !important;
                width: 100% !important;
                margin-bottom: 16px !important;
                padding: 16px !important;
            }

            .address:first-child,
            .address:last-child {
                padding: 16px !important;
            }

            .btn,
            a.button {
                padding: 12px 24px !important;
                font-size: 15px !important;
            }
        }

        /* Dark Mode Support (for email clients that support it) */
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #000000 !important;
            }

            #wrapper {
                background-color: #000000 !important;
            }

            #template_container {
                background-color: #1d1d1f !important;
                box-shadow: 0 4px 24px rgba(255, 255, 255, 0.05) !important;
            }

            #body_content,
            #body_content_inner {
                background-color: #1d1d1f !important;
            }

            h2, h3 {
                color: #f5f5f7 !important;
            }

            p,
            table.td td,
            .address address {
                color: #a1a1a6 !important;
            }

            table.td th {
                background-color: #2d2d2f !important;
                color: #f5f5f7 !important;
            }

            table.td td {
                background-color: #1d1d1f !important;
                border-bottom-color: #2d2d2f !important;
            }

            .address {
                background-color: #2d2d2f !important;
            }

            #template_footer {
                background-color: #1d1d1f !important;
                border-top-color: #2d2d2f !important;
            }
        }
    </style>
    <?php
}
add_action('woocommerce_email_header', 'tema_aromas_email_styles');

/**
 * Alternative method - Add styles via email header styles hook
 */
add_filter('woocommerce_email_styles', function($css, $email) {
    $apple_styles = '
        body {
            margin: 0 !important;
            padding: 0 !important;
            background-color: #f5f5f7 !important;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
        }
        #wrapper {
            background-color: #f5f5f7 !important;
            padding: 40px 20px !important;
        }
        #template_container {
            background-color: #ffffff !important;
            border: none !important;
            border-radius: 16px !important;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08) !important;
            max-width: 600px !important;
        }
        #template_header {
            background: linear-gradient(135deg, #6b4fc4 0%, #8b6fd9 100%) !important;
            border: none !important;
            padding: 40px !important;
            text-align: center !important;
            border-radius: 16px 16px 0 0 !important;
        }
        #template_header h1 {
            color: #ffffff !important;
            font-size: 28px !important;
            font-weight: 600 !important;
            margin: 0 !important;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.15) !important;
        }
        #body_content {
            padding: 40px !important;
            background-color: #ffffff !important;
        }
        h2 {
            color: #1d1d1f !important;
            font-size: 24px !important;
            font-weight: 600 !important;
        }
        p {
            color: #555555 !important;
            font-size: 17px !important;
            line-height: 1.5 !important;
        }
        a {
            color: #6b4fc4 !important;
            font-weight: 500 !important;
        }
        table.td th {
            background-color: #f5f5f7 !important;
            color: #1d1d1f !important;
            font-weight: 600 !important;
            padding: 16px !important;
        }
        table.td td {
            padding: 16px !important;
            border-bottom: 1px solid #f0f0f0 !important;
        }
        .button,
        a.button {
            background: linear-gradient(135deg, #6b4fc4 0%, #8b6fd9 100%) !important;
            color: #ffffff !important;
            padding: 14px 32px !important;
            border-radius: 980px !important;
            text-decoration: none !important;
            box-shadow: 0 4px 12px rgba(107, 79, 196, 0.25) !important;
        }
        #template_footer {
            background-color: #ffffff !important;
            border-top: 1px solid #f0f0f0 !important;
            padding: 32px 40px !important;
            border-radius: 0 0 16px 16px !important;
        }
    ';

    return $css . $apple_styles;
}, 10, 2);

/**
 * Customize email "from" name
 */
add_filter('woocommerce_email_from_name', function($from_name) {
    return 'Secrets Zen - Aromas';
});

/**
 * Customize email "from" address
 */
add_filter('woocommerce_email_from_address', function($from_email) {
    return TEMA_AROMAS_EMAIL;
});

/**
 * Customize email footer text
 */
add_filter('woocommerce_email_footer_text', function($footer_text) {
    return sprintf(
        '&copy; %s Secrets Zen - Aromas | %s | %s',
        date('Y'),
        '<a href="' . TEMA_AROMAS_WHATSAPP_URL . '" style="color: #6b4fc4;">WhatsApp: ' . TEMA_AROMAS_WHATSAPP_DISPLAY . '</a>',
        '<a href="' . TEMA_AROMAS_INSTAGRAM_URL . '" style="color: #6b4fc4;">Instagram: ' . TEMA_AROMAS_INSTAGRAM . '</a>'
    );
});

/**
 * Customize WooCommerce email settings (colors and styling options)
 */
add_filter('woocommerce_email_settings', function($settings) {
    // Override default WooCommerce email colors
    foreach ($settings as $key => $setting) {
        // Base color (header background)
        if (isset($setting['id']) && $setting['id'] === 'woocommerce_email_base_color') {
            $settings[$key]['default'] = '#6b4fc4';
        }
        // Background color
        if (isset($setting['id']) && $setting['id'] === 'woocommerce_email_background_color') {
            $settings[$key]['default'] = '#f5f5f7';
        }
        // Body background color
        if (isset($setting['id']) && $setting['id'] === 'woocommerce_email_body_background_color') {
            $settings[$key]['default'] = '#ffffff';
        }
        // Body text color
        if (isset($setting['id']) && $setting['id'] === 'woocommerce_email_text_color') {
            $settings[$key]['default'] = '#555555';
        }
    }
    return $settings;
});

/**
 * Override WooCommerce email color options directly
 */
add_filter('option_woocommerce_email_base_color', function($value) {
    return empty($value) ? '#6b4fc4' : $value;
});

add_filter('option_woocommerce_email_background_color', function($value) {
    return empty($value) ? '#f5f5f7' : $value;
});

add_filter('option_woocommerce_email_body_background_color', function($value) {
    return empty($value) ? '#ffffff' : $value;
});

add_filter('option_woocommerce_email_text_color', function($value) {
    return empty($value) ? '#555555' : $value;
});
