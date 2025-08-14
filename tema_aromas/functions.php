<?php
/**
 * Tema Aromas Functions and Definitions
 * 
 * Luxury WordPress theme for aromatherapy WooCommerce store
 * 
 * @package TemaAromas
 * @version 1.0.0
 * @author Nathielle Gouvea
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
        'height'      => 60,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    // Add WooCommerce support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Add support for responsive embedded content
    add_theme_support('responsive-embeds');

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add support for wide alignment
    add_theme_support('align-wide');

    // Register navigation menus
    register_nav_menus([
        'header' => __('Menu Principal', 'tema_aromas'),
        'footer' => __('Menu Rodapé', 'tema_aromas'),
    ]);

    // Set content width for embedded content
    if (!isset($content_width)) {
        $content_width = 1200;
    }
}
add_action('after_setup_theme', 'tema_aromas_setup');

/**
 * Enqueue scripts and styles
 */
function tema_aromas_scripts() {
    $theme_version = wp_get_theme()->get('Version');

    // Main theme stylesheet
    wp_enqueue_style(
        'tema-aromas-style',
        get_stylesheet_uri(),
        [],
        $theme_version
    );

    // Google Fonts - Premium selection for luxury feel
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

    // WooCommerce CSS
    if (class_exists('WooCommerce')) {
        wp_enqueue_style(
            'tema-aromas-woocommerce',
            get_template_directory_uri() . '/assets/css/woocommerce.css',
            ['tema-aromas-base'],
            $theme_version
        );
    }

    // Utilities CSS
    wp_enqueue_style(
        'tema-aromas-utilities',
        get_template_directory_uri() . '/assets/css/utilities.css',
        ['tema-aromas-base'],
        $theme_version
    );

    // Main JavaScript
    wp_enqueue_script(
        'tema-aromas-main',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        $theme_version,
        true
    );

    // Accessibility JavaScript
    wp_enqueue_script(
        'tema-aromas-accessibility',
        get_template_directory_uri() . '/assets/js/accessibility.js',
        ['tema-aromas-main'],
        $theme_version,
        true
    );

    // Menu dropdown JavaScript
    wp_enqueue_script(
        'tema-aromas-menu',
        get_template_directory_uri() . '/assets/js/menu_dropdown.js',
        ['tema-aromas-main'],
        $theme_version,
        true
    );

    // Mini cart JavaScript (only if WooCommerce is active)
    if (class_exists('WooCommerce')) {
        wp_enqueue_script(
            'tema-aromas-minicart',
            get_template_directory_uri() . '/assets/js/minicart.js',
            ['tema-aromas-main'],
            $theme_version,
            true
        );
    }

    // Comment reply script for threaded comments
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // Localize script for AJAX
    wp_localize_script('tema-aromas-main', 'temaAromas', [
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('tema_aromas_nonce'),
        'strings' => [
            'menu_toggle' => __('Alternar menu', 'tema_aromas'),
            'cart_toggle' => __('Alternar carrinho', 'tema_aromas'),
            'search_toggle' => __('Alternar busca', 'tema_aromas'),
        ],
    ]);
}
add_action('wp_enqueue_scripts', 'tema_aromas_scripts');

/**
 * Brazilian localization settings
 */
function tema_aromas_localization() {
    // Set Brazilian Portuguese locale
    add_filter('locale', function() {
        return 'pt_BR';
    });

    // Currency formatting for WooCommerce
    if (class_exists('WooCommerce')) {
        add_filter('woocommerce_currency_symbol', function($symbol, $currency) {
            if ($currency === 'BRL') {
                return 'R$';
            }
            return $symbol;
        }, 10, 2);

        // Brazilian price format
        add_filter('woocommerce_price_format', function($format, $currency_pos) {
            switch ($currency_pos) {
                case 'left':
                    $format = '%1$s %2$s';
                    break;
                case 'right':
                    $format = '%2$s %1$s';
                    break;
                case 'left_space':
                    $format = '%1$s&nbsp;%2$s';
                    break;
                case 'right_space':
                    $format = '%2$s&nbsp;%1$s';
                    break;
            }
            return $format;
        }, 10, 2);
    }
}
add_action('init', 'tema_aromas_localization');

/**
 * Register widget areas
 */
function tema_aromas_widgets_init() {
    // Footer widgets
    register_sidebar([
        'name'          => __('Rodapé 1', 'tema_aromas'),
        'id'            => 'footer-1',
        'description'   => __('Área de widgets do rodapé - primeira coluna', 'tema_aromas'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => __('Rodapé 2', 'tema_aromas'),
        'id'            => 'footer-2',
        'description'   => __('Área de widgets do rodapé - segunda coluna', 'tema_aromas'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => __('Rodapé 3', 'tema_aromas'),
        'id'            => 'footer-3',
        'description'   => __('Área de widgets do rodapé - terceira coluna', 'tema_aromas'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    // Sidebar for shop filters (WooCommerce)
    if (class_exists('WooCommerce')) {
        register_sidebar([
            'name'          => __('Filtros da Loja', 'tema_aromas'),
            'id'            => 'shop-filters',
            'description'   => __('Área de widgets para filtros da loja WooCommerce', 'tema_aromas'),
            'before_widget' => '<div id="%1$s" class="widget filter-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="filter-title">',
            'after_title'   => '</h4>',
        ]);
    }
}
add_action('widgets_init', 'tema_aromas_widgets_init');

/**
 * Custom excerpt length
 */
function tema_aromas_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'tema_aromas_excerpt_length');

/**
 * Custom excerpt more text
 */
function tema_aromas_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'tema_aromas_excerpt_more');

/**
 * Add custom body classes
 */
function tema_aromas_body_classes($classes) {
    // Add class for luxury theme
    $classes[] = 'luxury-theme';
    
    // Add class if WooCommerce is active
    if (class_exists('WooCommerce')) {
        $classes[] = 'woocommerce-active';
    }
    
    // Add class for mobile detection
    if (wp_is_mobile()) {
        $classes[] = 'mobile-device';
    }
    
    return $classes;
}
add_filter('body_class', 'tema_aromas_body_classes');

/**
 * Security improvements
 */
function tema_aromas_security() {
    // Remove WordPress version from head
    remove_action('wp_head', 'wp_generator');
    
    // Remove RSD link
    remove_action('wp_head', 'rsd_link');
    
    // Remove wlwmanifest link
    remove_action('wp_head', 'wlwmanifest_link');
    
    // Remove shortlink
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('init', 'tema_aromas_security');

/**
 * Performance optimizations
 */
function tema_aromas_performance() {
    // Remove emoji scripts and styles
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    
    // Disable embeds
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'tema_aromas_performance');

/**
 * Contact form handler for page-fale-conosco.php
 */
function tema_aromas_handle_contact_form() {
    if (!isset($_POST['tema_aromas_contact_nonce']) || 
        !wp_verify_nonce($_POST['tema_aromas_contact_nonce'], 'tema_aromas_contact')) {
        return;
    }

    $nome = sanitize_text_field($_POST['nome'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $telefone = sanitize_text_field($_POST['telefone'] ?? '');
    $assunto = sanitize_text_field($_POST['assunto'] ?? '');
    $mensagem = sanitize_textarea_field($_POST['mensagem'] ?? '');

    if (empty($nome) || empty($email) || empty($mensagem)) {
        wp_redirect(add_query_arg('status', 'error', wp_get_referer()));
        exit;
    }

    $to = get_option('admin_email');
    $subject = sprintf(__('Contato do site: %s', 'tema_aromas'), $assunto);
    $body = sprintf(
        __("Nome: %s\nE-mail: %s\nTelefone: %s\nAssunto: %s\n\nMensagem:\n%s", 'tema_aromas'),
        $nome,
        $email,
        $telefone,
        $assunto,
        $mensagem
    );

    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $nome . ' <' . $email . '>',
        'Reply-To: ' . $email,
    ];

    if (wp_mail($to, $subject, $body, $headers)) {
        wp_redirect(add_query_arg('status', 'success', wp_get_referer()));
    } else {
        wp_redirect(add_query_arg('status', 'error', wp_get_referer()));
    }
    exit;
}
add_action('wp', function() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tema_aromas_contact_submit'])) {
        tema_aromas_handle_contact_form();
    }
});

/**
 * Include required files
 */
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/customizer.php';

if (class_exists('WooCommerce')) {
    require_once get_template_directory() . '/inc/woocommerce.php';
}
