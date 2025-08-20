<?php
/**
 * Tema Aromas SEO and Meta Tags
 * 
 * Handles Open Graph, Schema markup, and meta optimization
 *
 * @package TemaAromas
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Open Graph meta tags
 */
function tema_aromas_add_og_meta() {
    if (is_front_page()) {
        $title = get_bloginfo('name') . ' - ' . get_bloginfo('description');
        $description = 'Descubra nossa coleção premium de aromatizadores, velas e home sprays que transformam qualquer ambiente. Aromaterapia de qualidade para seu bem-estar.';
        $image = get_template_directory_uri() . '/screenshot.png';
        $url = home_url('/');
    } elseif (is_page()) {
        $title = get_the_title() . ' - ' . get_bloginfo('name');
        $description = get_the_excerpt() ?: wp_trim_words(get_the_content(), 30);
        $image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_template_directory_uri() . '/screenshot.png';
        $url = get_permalink();
    } elseif (is_product()) {
        global $product;
        // Ensure we have a valid product object
        if (!is_object($product)) {
            $product = wc_get_product(get_the_ID());
        }
        $title = get_the_title() . ' - ' . get_bloginfo('name');
        $description = '';
        if ($product && is_object($product)) {
            $description = wp_trim_words($product->get_short_description() ?: $product->get_description(), 30);
            $image = wp_get_attachment_image_url($product->get_image_id(), 'large');
        } else {
            $description = get_the_excerpt() ?: wp_trim_words(get_the_content(), 30);
            $image = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_template_directory_uri() . '/screenshot.png';
        }
        $url = get_permalink();
    } else {
        $title = wp_get_document_title();
        $description = get_bloginfo('description');
        $image = get_template_directory_uri() . '/screenshot.png';
        $url = get_permalink() ?: home_url(add_query_arg(null, null));
    }

    // Clean description
    $description = wp_strip_all_tags($description);
    $description = str_replace(["\n", "\r", "\t"], ' ', $description);
    $description = preg_replace('/\s+/', ' ', trim($description));
    
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:type" content="' . (is_front_page() ? 'website' : 'article') . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    echo '<meta property="og:locale" content="pt_BR">' . "\n";
    
    // Twitter Cards
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";
    
    // Additional meta
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta name="robots" content="index, follow, max-image-preview:large">' . "\n";
    
    // Canonical URL
    echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
}
add_action('wp_head', 'tema_aromas_add_og_meta', 1);

/**
 * Add Schema.org structured data
 */
function tema_aromas_add_schema_markup() {
    if (is_front_page()) {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
            'url' => home_url('/'),
            'logo' => get_template_directory_uri() . '/screenshot.png',
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'areaServed' => 'BR',
                'availableLanguage' => 'Portuguese'
            ],
            'sameAs' => [
                // Add social media URLs here when available
            ]
        ];
        
        // Add local business schema if applicable
        $local_business = [
            '@context' => 'https://schema.org',
            '@type' => 'Store',
            'name' => get_bloginfo('name'),
            'description' => 'Loja especializada em aromaterapia, aromatizadores, velas aromáticas e home sprays premium.',
            'url' => home_url('/'),
            'address' => [
                '@type' => 'PostalAddress',
                'addressCountry' => 'BR',
                'addressLocality' => 'São Paulo'
            ],
            'currenciesAccepted' => 'BRL',
            'paymentAccepted' => 'Cash, Credit Card, Debit Card, Bank Transfer'
        ];
        
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
        echo '<script type="application/ld+json">' . wp_json_encode($local_business, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
        
    } elseif (is_product()) {
        global $product;
        
        // Ensure we have a valid product object
        if (!is_object($product)) {
            $product = wc_get_product(get_the_ID());
        }
        
        if ($product && is_object($product)) {
            $schema = [
                '@context' => 'https://schema.org',
                '@type' => 'Product',
                'name' => get_the_title(),
                'description' => wp_strip_all_tags($product->get_short_description() ?: $product->get_description()),
                'image' => wp_get_attachment_image_url($product->get_image_id(), 'large'),
                'url' => get_permalink(),
                'brand' => [
                    '@type' => 'Brand',
                    'name' => get_bloginfo('name')
                ],
                'offers' => [
                    '@type' => 'Offer',
                    'price' => $product->get_price(),
                'priceCurrency' => 'BRL',
                'availability' => $product->is_in_stock() ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
                'url' => get_permalink(),
                'seller' => [
                    '@type' => 'Organization',
                    'name' => get_bloginfo('name')
                ]
            ]
        ];
        
        // Add reviews if available
        $reviews = get_comments([
            'post_id' => get_the_ID(),
            'status' => 'approve',
            'type' => 'review'
        ]);
        
        if (!empty($reviews)) {
            $total_rating = 0;
            $review_count = count($reviews);
            
            foreach ($reviews as $review) {
                $rating = get_comment_meta($review->comment_ID, 'rating', true);
                if ($rating) {
                    $total_rating += intval($rating);
                }
            }
            
            if ($total_rating > 0) {
                $average_rating = $total_rating / $review_count;
                $schema['aggregateRating'] = [
                    '@type' => 'AggregateRating',
                    'ratingValue' => $average_rating,
                    'reviewCount' => $review_count,
                    'bestRating' => 5,
                    'worstRating' => 1
                ];
            }
        }
        
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
        }
    }
}
add_action('wp_head', 'tema_aromas_add_schema_markup', 2);

/**
 * Improve heading hierarchy
 */
function tema_aromas_fix_heading_hierarchy($content) {
    // Only process on frontend
    if (is_admin()) {
        return $content;
    }
    
    // Ensure only one H1 per page
    if (is_singular()) {
        // Convert multiple H1s to H2s, except the first one
        $h1_count = 0;
        $content = preg_replace_callback(
            '/<h1([^>]*)>(.*?)<\/h1>/i',
            function($matches) use (&$h1_count) {
                $h1_count++;
                if ($h1_count > 1) {
                    return '<h2' . $matches[1] . '>' . $matches[2] . '</h2>';
                }
                return $matches[0];
            },
            $content
        );
    }
    
    return $content;
}
add_filter('the_content', 'tema_aromas_fix_heading_hierarchy');

/**
 * Add breadcrumbs for better navigation and SEO
 */
function tema_aromas_get_breadcrumbs() {
    if (is_front_page()) {
        return '';
    }
    
    $breadcrumbs = [];
    $breadcrumbs[] = [
        'title' => esc_html__('Início', 'tema_aromas'),
        'url' => home_url('/')
    ];
    
    if (is_shop() || is_product_category() || is_product_tag() || is_product()) {
        $shop_page_id = wc_get_page_id('shop');
        if ($shop_page_id) {
            $breadcrumbs[] = [
                'title' => get_the_title($shop_page_id),
                'url' => get_permalink($shop_page_id)
            ];
        }
    }
    
    if (is_product_category()) {
        $current_cat = get_queried_object();
        if ($current_cat->parent) {
            $parent_cat = get_term($current_cat->parent, 'product_cat');
            $breadcrumbs[] = [
                'title' => $parent_cat->name,
                'url' => get_term_link($parent_cat)
            ];
        }
        $breadcrumbs[] = [
            'title' => $current_cat->name,
            'url' => ''
        ];
    } elseif (is_product()) {
        $product_cats = wp_get_post_terms(get_the_ID(), 'product_cat');
        if (!empty($product_cats)) {
            $main_cat = $product_cats[0];
            $breadcrumbs[] = [
                'title' => $main_cat->name,
                'url' => get_term_link($main_cat)
            ];
        }
        $breadcrumbs[] = [
            'title' => get_the_title(),
            'url' => ''
        ];
    } elseif (is_page()) {
        $breadcrumbs[] = [
            'title' => get_the_title(),
            'url' => ''
        ];
    }
    
    if (count($breadcrumbs) <= 1) {
        return '';
    }
    
    $output = '<nav class="breadcrumbs" aria-label="' . esc_attr__('Navegação estrutural', 'tema_aromas') . '">';
    $output .= '<ol class="breadcrumb-list">';
    
    foreach ($breadcrumbs as $index => $crumb) {
        $is_last = $index === count($breadcrumbs) - 1;
        $output .= '<li class="breadcrumb-item' . ($is_last ? ' breadcrumb-current' : '') . '">';
        
        if (!$is_last && !empty($crumb['url'])) {
            $output .= '<a href="' . esc_url($crumb['url']) . '">' . esc_html($crumb['title']) . '</a>';
        } else {
            $output .= '<span>' . esc_html($crumb['title']) . '</span>';
        }
        
        if (!$is_last) {
            $output .= '<span class="breadcrumb-separator" aria-hidden="true"> / </span>';
        }
        
        $output .= '</li>';
    }
    
    $output .= '</ol></nav>';
    
    return $output;
}

/**
 * Display breadcrumbs
 */
function tema_aromas_display_breadcrumbs() {
    echo tema_aromas_get_breadcrumbs();
}

/**
 * Add preload hints for critical resources
 */
function tema_aromas_add_preload_hints() {
    // Preload critical fonts
    echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
    
    // Preload critical CSS
    if (is_front_page()) {
        echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/css/homepage.css?ver=' . wp_get_theme()->get('Version') . '" as="style">' . "\n";
    }
    
    // DNS prefetch for external resources
    echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//fonts.gstatic.com">' . "\n";
}
add_action('wp_head', 'tema_aromas_add_preload_hints', 0);

/**
 * Optimize images with lazy loading and srcset
 */
function tema_aromas_add_lazy_loading($content) {
    // Add loading="lazy" to images that don't already have it
    $content = preg_replace('/<img(?![^>]*loading=)([^>]+)>/i', '<img loading="lazy"$1>', $content);
    
    return $content;
}
add_filter('the_content', 'tema_aromas_add_lazy_loading');
add_filter('post_thumbnail_html', 'tema_aromas_add_lazy_loading');

/**
 * Remove unnecessary meta generators and clean up head
 */
function tema_aromas_cleanup_head() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
}
add_action('init', 'tema_aromas_cleanup_head');

/**
 * Add security headers
 */
function tema_aromas_add_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
        header('Referrer-Policy: strict-origin-when-cross-origin');
    }
}
add_action('send_headers', 'tema_aromas_add_security_headers');
