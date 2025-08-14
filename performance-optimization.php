<?php
/**
 * Tema Aromas Performance Optimization
 * 
 * Handles critical CSS, lazy loading, and performance optimizations
 *
 * @package TemaAromas
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Inline critical CSS for above-the-fold content
 */
function tema_aromas_inline_critical_css() {
    if (is_front_page()) {
        $critical_css_path = get_template_directory() . '/assets/css/critical.css';
        if (file_exists($critical_css_path)) {
            $critical_css = file_get_contents($critical_css_path);
            $critical_css = preg_replace('/\/\*.*?\*\//s', '', $critical_css); // Remove comments
            $critical_css = preg_replace('/\s+/', ' ', $critical_css); // Minify
            echo '<style id="critical-css">' . trim($critical_css) . '</style>' . "\n";
        }
    }
}
add_action('wp_head', 'tema_aromas_inline_critical_css', 1);

/**
 * Defer non-critical CSS loading
 */
function tema_aromas_defer_css($html, $handle) {
    // List of non-critical CSS handles to defer
    $defer_handles = [
        'tema-aromas-utilities',
        'tema-aromas-pages',
        'tema-aromas-footer'
    ];
    
    if (in_array($handle, $defer_handles)) {
        $html = str_replace('rel="stylesheet"', 'rel="preload" as="style" onload="this.onload=null;this.rel=\'stylesheet\'"', $html);
        // Get the stylesheet URL using wp_styles global
        global $wp_styles;
        if (isset($wp_styles->registered[$handle])) {
            $src = $wp_styles->registered[$handle]->src;
            if (!preg_match('|^(https?:)?//|', $src) && !($wp_styles->content_url && 0 === strpos($src, $wp_styles->content_url))) {
                $src = $wp_styles->base_url . $src;
            }
            $html .= '<noscript><link rel="stylesheet" href="' . esc_url($src) . '"></noscript>';
        }
    }
    
    return $html;
}
add_filter('style_loader_tag', 'tema_aromas_defer_css', 10, 2);

/**
 * Optimize JavaScript loading
 */
function tema_aromas_optimize_js_loading($tag, $handle) {
    // List of scripts to defer
    $defer_scripts = [
        'tema-aromas-pages',
        'tema-aromas-accessibility',
        'tema-aromas-minicart'
    ];
    
    // List of scripts to load async
    $async_scripts = [
        'tema-aromas-homepage'
    ];
    
    if (in_array($handle, $defer_scripts)) {
        $tag = str_replace('<script ', '<script defer ', $tag);
    } elseif (in_array($handle, $async_scripts)) {
        $tag = str_replace('<script ', '<script async ', $tag);
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'tema_aromas_optimize_js_loading', 10, 2);

/**
 * Optimize images with modern formats and lazy loading
 */
function tema_aromas_optimize_images($content) {
    // Add modern image format support
    $content = preg_replace_callback(
        '/<img([^>]+)src=["\']([^"\']+)["\']([^>]*)>/i',
        function($matches) {
            $img_tag = $matches[0];
            $src = $matches[2];
            
            // Add loading="lazy" if not present
            if (strpos($img_tag, 'loading=') === false) {
                $img_tag = str_replace('<img', '<img loading="lazy"', $img_tag);
            }
            
            // Add decoding="async" if not present
            if (strpos($img_tag, 'decoding=') === false) {
                $img_tag = str_replace('<img', '<img decoding="async"', $img_tag);
            }
            
            return $img_tag;
        },
        $content
    );
    
    return $content;
}
add_filter('the_content', 'tema_aromas_optimize_images');
add_filter('post_thumbnail_html', 'tema_aromas_optimize_images');

/**
 * Add resource hints for better performance
 */
function tema_aromas_add_resource_hints() {
    // DNS prefetch for external resources
    echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//fonts.gstatic.com">' . "\n";
    
    // Preload critical fonts
    echo '<link rel="preload" href="https://fonts.gstatic.com/s/inter/v12/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuLyfAZ9hiA.woff2" as="font" type="font/woff2" crossorigin>' . "\n";
    
    // Preload critical images on homepage
    if (is_front_page()) {
        if (has_custom_logo()) {
            $logo_id = get_theme_mod('custom_logo');
            if ($logo_id) {
                $logo_url = wp_get_attachment_image_url($logo_id, 'full');
                if ($logo_url) {
                    echo '<link rel="preload" href="' . esc_url($logo_url) . '" as="image">' . "\n";
                }
            }
        }
    }
}
add_action('wp_head', 'tema_aromas_add_resource_hints', 0);

/**
 * Minify HTML output
 */
function tema_aromas_minify_html($buffer) {
    if (!is_admin() && !is_feed() && !is_robots()) {
        // Remove HTML comments (except IE conditional comments)
        $buffer = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $buffer);
        
        // Remove extra whitespace
        $buffer = preg_replace('/\s+/', ' ', $buffer);
        $buffer = preg_replace('/>\s+</', '><', $buffer);
        
        // Remove trailing whitespace
        $buffer = trim($buffer);
    }
    
    return $buffer;
}

/**
 * Start output buffering for HTML minification (only in production)
 */
function tema_aromas_start_minification() {
    if (!WP_DEBUG && !is_admin()) {
        ob_start('tema_aromas_minify_html');
    }
}
add_action('template_redirect', 'tema_aromas_start_minification');

/**
 * Remove unnecessary WordPress features for performance
 */
function tema_aromas_remove_unnecessary_features() {
    // Remove emoji support
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    
    // Remove block library CSS if not using Gutenberg blocks
    if (!is_admin()) {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-blocks-style');
    }
    
    // Remove unnecessary jQuery migrate
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), false, NULL);
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'tema_aromas_remove_unnecessary_features');

/**
 * Optimize database queries
 */
function tema_aromas_optimize_queries() {
    // Remove unnecessary queries
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
    
    // Limit post revisions
    if (!defined('WP_POST_REVISIONS')) {
        define('WP_POST_REVISIONS', 3);
    }
    
    // Optimize heartbeat
    add_filter('heartbeat_settings', function($settings) {
        $settings['interval'] = 60; // 60 seconds
        return $settings;
    });
}
add_action('init', 'tema_aromas_optimize_queries');

/**
 * Add performance monitoring
 */
function tema_aromas_add_performance_monitoring() {
    if (current_user_can('manage_options') && isset($_GET['perf'])) {
        echo '<script>
            // Performance monitoring
            window.addEventListener("load", function() {
                if (performance.timing) {
                    const loadTime = performance.timing.loadEventEnd - performance.timing.navigationStart;
                    const domReady = performance.timing.domContentLoadedEventEnd - performance.timing.navigationStart;
                    console.log("Page Load Time: " + loadTime + "ms");
                    console.log("DOM Ready Time: " + domReady + "ms");
                }
                
                if (performance.getEntriesByType) {
                    const paintEntries = performance.getEntriesByType("paint");
                    paintEntries.forEach(function(entry) {
                        console.log(entry.name + ": " + entry.startTime + "ms");
                    });
                }
            });
        </script>';
    }
}
add_action('wp_footer', 'tema_aromas_add_performance_monitoring');

/**
 * Optimize WooCommerce assets
 */
function tema_aromas_optimize_woocommerce_assets() {
    if (!is_woocommerce() && !is_cart() && !is_checkout() && !is_account_page()) {
        // Dequeue WooCommerce scripts and styles on non-shop pages
        wp_dequeue_script('wc-cart-fragments');
        wp_dequeue_script('woocommerce');
        wp_dequeue_style('woocommerce-general');
        wp_dequeue_style('woocommerce-layout');
        wp_dequeue_style('woocommerce-smallscreen');
    }
}
add_action('wp_enqueue_scripts', 'tema_aromas_optimize_woocommerce_assets', 99);

/**
 * Cache optimization
 */
function tema_aromas_set_cache_headers() {
    if (!is_admin() && !is_user_logged_in()) {
        // Set cache headers for static assets
        $request_uri = $_SERVER['REQUEST_URI'];
        
        if (preg_match('/\.(css|js|png|jpg|jpeg|gif|webp|svg|woff|woff2|ttf|eot)$/i', $request_uri)) {
            header('Cache-Control: public, max-age=31536000'); // 1 year
            header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
        } else {
            header('Cache-Control: public, max-age=3600'); // 1 hour for HTML
        }
    }
}
add_action('send_headers', 'tema_aromas_set_cache_headers');

/**
 * Optimize fonts loading
 */
function tema_aromas_optimize_fonts() {
    // Remove default Google Fonts loading if any
    wp_dequeue_style('google-fonts');
    
    // Add optimized font loading
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" media="print" onload="this.media=\'all\'">' . "\n";
    echo '<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"></noscript>' . "\n";
}
add_action('wp_head', 'tema_aromas_optimize_fonts', 1);
