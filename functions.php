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

        // Featured Products Slideshow JavaScript
        wp_enqueue_script(
            'tema-aromas-featured-slideshow',
            get_template_directory_uri() . '/assets/js/featured-slideshow.js',
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
