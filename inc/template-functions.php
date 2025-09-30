<?php
/**
 * Tema Aromas Template Functions
 * 
 * Custom template functions and utilities
 * 
 * @package TemaAromas
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Display the site logo
 */
function tema_aromas_site_logo() {
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-text" rel="home">
            <span class="luxury-heading"><?php bloginfo('name'); ?></span>
        </a>
        <?php
    }
}

/**
 * Get WooCommerce category URL with fallback
 */
function tema_aromas_get_category_url($category_slug) {
    if (class_exists('WooCommerce')) {
        $term_link = get_term_link($category_slug, 'product_cat');
        if (!is_wp_error($term_link)) {
            return $term_link;
        }
    }
    // Fallback to shop page if category doesn't exist
    return class_exists('WooCommerce') ? wc_get_page_permalink('shop') : home_url('/shop/');
}

/**
 * Display the main navigation menu
 */
function tema_aromas_main_navigation() {
    if (has_nav_menu('header')) {
        wp_nav_menu([
            'theme_location' => 'header',
            'menu_class' => 'main-nav-menu luxury-menu',
            'container' => 'nav',
            'container_class' => 'main-navigation',
            'container_aria_label' => __('Menu principal', 'tema_aromas'),
            'depth' => 2,
            'walker' => new Tema_Aromas_Walker_Nav_Menu(),
        ]);
    } else {
        ?>
        <nav class="main-navigation" aria-label="<?php esc_attr_e('Menu principal', 'tema_aromas'); ?>">
            <ul class="main-nav-menu luxury-menu">
                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('INÍCIO', 'tema_aromas'); ?></a></li>
                <li class="dropdown">
                    <a href="<?php echo esc_url(class_exists('WooCommerce') ? wc_get_page_permalink('shop') : home_url('/shop/')); ?>" class="dropdown-toggle" aria-expanded="false" aria-haspopup="true">
                        <?php esc_html_e('COMPRAR', 'tema_aromas'); ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo esc_url(tema_aromas_get_category_url('aromatizadores')); ?>"><?php esc_html_e('AROMATIZADORES', 'tema_aromas'); ?></a></li>
                        <li><a href="<?php echo esc_url(tema_aromas_get_category_url('home-spray')); ?>"><?php esc_html_e('HOME SPRAY', 'tema_aromas'); ?></a></li>
                        <li><a href="<?php echo esc_url(tema_aromas_get_category_url('velas-aromaticas')); ?>"><?php esc_html_e('VELAS AROMÁTICAS', 'tema_aromas'); ?></a></li>
                        <li><a href="<?php echo esc_url(tema_aromas_get_category_url('kits-especiais')); ?>"><?php esc_html_e('KITS ESPECIAIS', 'tema_aromas'); ?></a></li>
                        <li><a href="<?php echo esc_url(tema_aromas_get_category_url('lembrancinhas')); ?>"><?php esc_html_e('LEMBRANCINHAS', 'tema_aromas'); ?></a></li>
                        <li><a href="<?php echo esc_url(tema_aromas_get_category_url('acessorios')); ?>"><?php esc_html_e('ACESSÓRIOS', 'tema_aromas'); ?></a></li>
                    </ul>
                </li>
                <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('sobre-os-aromas'))); ?>"><?php esc_html_e('SOBRE OS AROMAS', 'tema_aromas'); ?></a></li>
                <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('fale-conosco'))); ?>"><?php esc_html_e('FALE CONOSCO', 'tema_aromas'); ?></a></li>
            </ul>
        </nav>
        <?php
    }
}

/**
 * Display header icons (search, account, cart)
 */
function tema_aromas_header_icons() {
    ?>
    <div class="header-icons">
        <!-- Search Icon -->
        <button class="header-icon search-toggle" aria-label="<?php esc_attr_e('Abrir busca', 'tema_aromas'); ?>" aria-expanded="false">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="21 21l-4.35-4.35"></path>
            </svg>
        </button>

        <!-- My Account Icon -->
        <?php if (class_exists('WooCommerce')) : ?>
            <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="header-icon account-icon" aria-label="<?php esc_attr_e('Minha conta', 'tema_aromas'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </a>

            <!-- Cart Icon -->
            <button class="header-icon cart-toggle" aria-label="<?php esc_attr_e('Abrir carrinho', 'tema_aromas'); ?>" aria-expanded="false">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
            </button>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Display post meta information
 */
function tema_aromas_post_meta() {
    ?>
    <div class="post-meta">
        <time class="post-date" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
            <?php echo esc_html(get_the_date()); ?>
        </time>
        <span class="meta-separator">•</span>
        <span class="post-author">
            <?php
            printf(
                esc_html__('Por %s', 'tema_aromas'),
                '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a>'
            );
            ?>
        </span>
        <?php if (has_category()) : ?>
            <span class="meta-separator">•</span>
            <span class="post-categories">
                <?php the_category(', '); ?>
            </span>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Display breadcrumbs
 */
function tema_aromas_breadcrumbs() {
    if (is_front_page()) return;

    ?>
    <nav class="breadcrumbs" aria-label="<?php esc_attr_e('Navegação estrutural', 'tema_aromas'); ?>">
        <ol class="breadcrumb-list">
            <li class="breadcrumb-item">
                <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Início', 'tema_aromas'); ?></a>
            </li>
            
            <?php if (is_category() || is_single()) : ?>
                <?php if (is_single()) : ?>
                    <?php $categories = get_the_category(); ?>
                    <?php if (!empty($categories)) : ?>
                        <li class="breadcrumb-item">
                            <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                                <?php echo esc_html($categories[0]->name); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
                
                <li class="breadcrumb-item active" aria-current="page">
                    <?php 
                    if (is_category()) {
                        single_cat_title();
                    } elseif (is_single()) {
                        the_title();
                    }
                    ?>
                </li>
                
            <?php elseif (is_page()) : ?>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php the_title(); ?>
                </li>
                
            <?php elseif (is_search()) : ?>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php printf(esc_html__('Resultados da busca por: %s', 'tema_aromas'), get_search_query()); ?>
                </li>
                
            <?php elseif (is_404()) : ?>
                <li class="breadcrumb-item active" aria-current="page">
                    <?php esc_html_e('Página não encontrada', 'tema_aromas'); ?>
                </li>
            <?php endif; ?>
        </ol>
    </nav>
    <?php
}

/**
 * Display social media links
 */
function tema_aromas_social_links() {
    $social_links = [
        'facebook' => get_theme_mod('facebook_url'),
        'instagram' => get_theme_mod('instagram_url'),
        'whatsapp' => get_theme_mod('whatsapp_url'),
        'youtube' => get_theme_mod('youtube_url'),
    ];

    $social_links = array_filter($social_links);

    if (empty($social_links)) return;

    ?>
    <div class="social-links">
        <?php foreach ($social_links as $platform => $url) : ?>
            <a href="<?php echo esc_url($url); ?>" 
               class="social-link social-<?php echo esc_attr($platform); ?>" 
               target="_blank" 
               rel="noopener noreferrer"
               aria-label="<?php echo esc_attr(ucfirst($platform)); ?>">
                <?php tema_aromas_social_icon($platform); ?>
            </a>
        <?php endforeach; ?>
    </div>
    <?php
}

/**
 * Get social media icon SVG
 */
function tema_aromas_social_icon($platform) {
    $icons = [
        'facebook' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>',
        'instagram' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>',
        'whatsapp' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.686"/></svg>',
        'youtube' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>',
    ];

    if (isset($icons[$platform])) {
        echo $icons[$platform];
    }
}

/**
 * Display contact information
 */
function tema_aromas_contact_info() {
    ?>
    <div class="contact-info">
        <!-- Email -->
        <div class="contact-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
            <a href="mailto:secretszen888@gmail.com" target="_blank">
                secretszen888@gmail.com
            </a>
        </div>

        <!-- WhatsApp -->
        <div class="contact-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.686"/>
            </svg>
            <a href="https://wa.me/5516991626921" target="_blank" rel="noopener noreferrer">
                (16) 99162-6921
            </a>
        </div>

        <!-- Instagram -->
        <div class="contact-item">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
            <a href="https://instagram.com/secretszen" target="_blank" rel="noopener noreferrer">
                @secretszen
            </a>
        </div>
    </div>
    <?php
}

/**
 * Custom excerpt with read more link
 */
function tema_aromas_excerpt_with_link($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $excerpt = get_the_excerpt($post_id);
    $permalink = get_permalink($post_id);
    $read_more = sprintf(
        '<a href="%s" class="read-more-link">%s</a>',
        esc_url($permalink),
        esc_html__('Leia mais', 'tema_aromas')
    );

    echo $excerpt . ' ' . $read_more;
}

/**
 * Get theme option with default
 */
function tema_aromas_get_option($option, $default = '') {
    return get_theme_mod($option, $default);
}

/**
 * Display post categories
 */
function tema_aromas_post_categories() {
    $categories = get_the_category();
    if (!empty($categories)) {
        echo '<div class="post-categories">';
        foreach ($categories as $category) {
            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="post-category">';
            echo esc_html($category->name);
            echo '</a>';
        }
        echo '</div>';
    }
}

/**
 * Display post footer with tags
 */
function tema_aromas_post_footer() {
    $tags = get_the_tags();
    if ($tags) {
        echo '<div class="post-tags">';
        echo '<span class="tags-label">' . esc_html__('Tags:', 'tema_aromas') . '</span>';
        foreach ($tags as $tag) {
            echo '<a href="' . esc_url(get_tag_link($tag->term_id)) . '" class="post-tag">';
            echo esc_html($tag->name);
            echo '</a>';
        }
        echo '</div>';
    }
}

/**
 * Display author bio
 */
function tema_aromas_author_bio() {
    $author_description = get_the_author_meta('description');
    if ($author_description) {
        echo '<div class="author-bio luxury-card">';
        echo '<div class="author-info">';
        echo '<div class="author-avatar">';
        echo get_avatar(get_the_author_meta('ID'), 80);
        echo '</div>';
        echo '<div class="author-details">';
        echo '<h3 class="author-name">' . esc_html(get_the_author()) . '</h3>';
        echo '<p class="author-description">' . wp_kses_post($author_description) . '</p>';
        echo '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" class="author-link">';
        echo esc_html__('Ver todos os posts', 'tema_aromas');
        echo '</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}

/**
 * Display related posts
 */
function tema_aromas_related_posts() {
    $post_id = get_the_ID();
    $categories = wp_get_post_categories($post_id);
    
    if ($categories) {
        $related_posts = get_posts([
            'category__in' => $categories,
            'post__not_in' => [$post_id],
            'posts_per_page' => 3,
            'orderby' => 'rand',
            'meta_query' => [
                [
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                ]
            ]
        ]);

        if ($related_posts) {
            echo '<section class="related-posts">';
            echo '<h3 class="related-title luxury-heading">' . esc_html__('Posts relacionados', 'tema_aromas') . '</h3>';
            echo '<div class="related-grid luxury-grid luxury-grid-3">';
            
            foreach ($related_posts as $post) {
                setup_postdata($post);
                echo '<article class="related-post luxury-card">';
                if (has_post_thumbnail($post->ID)) {
                    echo '<div class="related-thumbnail">';
                    echo '<a href="' . esc_url(get_permalink($post->ID)) . '">';
                    echo get_the_post_thumbnail($post->ID, 'medium');
                    echo '</a>';
                    echo '</div>';
                }
                echo '<div class="related-content">';
                echo '<h4 class="related-post-title">';
                echo '<a href="' . esc_url(get_permalink($post->ID)) . '">' . esc_html(get_the_title($post->ID)) . '</a>';
                echo '</h4>';
                echo '<div class="related-meta">';
                echo '<span class="related-date">' . esc_html(get_the_date('', $post->ID)) . '</span>';
                echo '</div>';
                echo '</div>';
                echo '</article>';
            }
            wp_reset_postdata();
            
            echo '</div>';
            echo '</section>';
        }
    }
}
