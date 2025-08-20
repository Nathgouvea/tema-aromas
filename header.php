<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip Link for Accessibility -->
<a class="skip-link sr-only" href="#main"><?php esc_html_e('Pular para o conteúdo', 'tema_aromas'); ?></a>

<div id="page" class="site">
    <header id="masthead" class="site-header luxury-header">
        <div class="container">
            <div class="header-content">
                <!-- Logo / Site Title -->
                <div class="site-branding">
                    <?php if (has_custom_logo()) : ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <div class="site-title-wrapper">
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="luxury-heading">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h1>
                            <?php if (get_bloginfo('description')) : ?>
                                <p class="site-description"><?php bloginfo('description'); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Main Navigation -->
                <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e('Menu principal', 'tema_aromas'); ?>">
                    <button class="menu-toggle hidden-desktop" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Alternar menu', 'tema_aromas'); ?>">
                        <span class="menu-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="menu-text"><?php esc_html_e('Menu', 'tema_aromas'); ?></span>
                    </button>

                    <?php if (has_nav_menu('header')) : ?>
                        <?php wp_nav_menu([
                            'theme_location' => 'header',
                            'menu_id' => 'primary-menu',
                            'menu_class' => 'primary-menu luxury-menu',
                            'container' => 'div',
                            'container_class' => 'primary-menu-container',
                            'depth' => 2,
                            'walker' => new Tema_Aromas_Walker_Nav_Menu(),
                        ]); ?>
                    <?php else : ?>
                        <!-- Default menu structure if no menu is assigned -->
                        <div class="primary-menu-container">
                            <ul id="primary-menu" class="primary-menu luxury-menu">
                                <li class="menu-item">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" class="menu-link">
                                        <span class="menu-icon-home">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                                <polyline points="9,22 9,12 15,12 15,22"></polyline>
                                            </svg>
                                        </span>
                                        <?php esc_html_e('INÍCIO', 'tema_aromas'); ?>
                                    </a>
                                </li>
                                <li class="menu-item menu-item-has-children dropdown">
                                    <a href="#" class="menu-link dropdown-toggle" aria-expanded="false" aria-haspopup="true" aria-controls="comprar-dropdown">
                                        <span class="menu-icon-shop">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                                            </svg>
                                        </span>
                                        <?php esc_html_e('COMPRAR', 'tema_aromas'); ?>
                                        <svg class="dropdown-icon" width="12" height="8" viewBox="0 0 12 8" fill="none">
                                            <path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                    <ul id="comprar-dropdown" class="sub-menu dropdown-menu">
                                        <li class="menu-item">
                                            <a href="<?php echo esc_url(get_term_link('aromatizadores', 'product_cat')); ?>" class="menu-link">
                                                <span class="category-icon">🌸</span>
                                                <?php esc_html_e('AROMATIZADORES', 'tema_aromas'); ?>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?php echo esc_url(get_term_link('home-spray', 'product_cat')); ?>" class="menu-link">
                                                <span class="category-icon">💨</span>
                                                <?php esc_html_e('HOME SPRAY', 'tema_aromas'); ?>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?php echo esc_url(get_term_link('velas-aromaticas', 'product_cat')); ?>" class="menu-link">
                                                <span class="category-icon">🕯️</span>
                                                <?php esc_html_e('VELAS AROMÁTICAS', 'tema_aromas'); ?>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?php echo esc_url(get_term_link('kits-especiais', 'product_cat')); ?>" class="menu-link">
                                                <span class="category-icon">🎁</span>
                                                <?php esc_html_e('KITS ESPECIAIS', 'tema_aromas'); ?>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?php echo esc_url(get_term_link('lembrancinhas', 'product_cat')); ?>" class="menu-link">
                                                <span class="category-icon">💝</span>
                                                <?php esc_html_e('LEMBRANCINHAS', 'tema_aromas'); ?>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="<?php echo esc_url(get_term_link('acessorios', 'product_cat')); ?>" class="menu-link">
                                                <span class="category-icon">✨</span>
                                                <?php esc_html_e('ACESSÓRIOS', 'tema_aromas'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="<?php 
                                        $sobre_page = get_page_by_path('sobre-os-aromas');
                                        if ($sobre_page) {
                                            echo esc_url(get_permalink($sobre_page));
                                        } else {
                                            echo esc_url(home_url('/sobre-os-aromas/'));
                                        }
                                    ?>" class="menu-link">
                                        <span class="menu-icon-about">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                                                <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                            </svg>
                                        </span>
                                        <?php esc_html_e('SOBRE OS AROMAS', 'tema_aromas'); ?>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="<?php 
                                        $contato_page = get_page_by_path('fale-conosco');
                                        if ($contato_page) {
                                            echo esc_url(get_permalink($contato_page));
                                        } else {
                                            echo esc_url(home_url('/fale-conosco/'));
                                        }
                                    ?>" class="menu-link">
                                        <span class="menu-icon-contact">
                                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg>
                                        </span>
                                        <?php esc_html_e('FALE CONOSCO', 'tema_aromas'); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </nav>

                <!-- Header Icons -->
                <div class="header-icons">
                    <!-- Search Toggle -->
                    <button class="header-icon search-toggle" aria-label="<?php esc_attr_e('Abrir busca', 'tema_aromas'); ?>" aria-expanded="false" aria-controls="search-form">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M21 21l-6.35-6.35M11 6a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                        </svg>
                        <span class="sr-only"><?php esc_html_e('Buscar', 'tema_aromas'); ?></span>
                    </button>

                    <!-- My Account Icon -->
                    <?php if (class_exists('WooCommerce')) : ?>
                        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="header-icon account-icon" aria-label="<?php esc_attr_e('Minha conta', 'tema_aromas'); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="sr-only"><?php esc_html_e('Minha Conta', 'tema_aromas'); ?></span>
                        </a>

                        <!-- Cart Icon with Counter -->
                        <button class="header-icon cart-toggle" aria-label="<?php esc_attr_e('Abrir carrinho', 'tema_aromas'); ?>" aria-expanded="false" data-cart-toggle>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
                            <span class="cart-count" <?php echo $cart_count > 0 ? '' : 'style="display: none;"'; ?>>
                                <?php echo esc_html($cart_count); ?>
                            </span>
                            <span class="sr-only"><?php esc_html_e('Carrinho', 'tema_aromas'); ?></span>
                        </button>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Expandable Search Form -->
            <div id="search-form" class="header-search" aria-hidden="true">
                <div class="search-form-container">
                    <?php if (class_exists('WooCommerce')) : ?>
                        <!-- WooCommerce Product Search -->
                        <form role="search" method="get" class="woocommerce-product-search luxury-form" action="<?php echo esc_url(home_url('/')); ?>">
                            <label for="woocommerce-product-search-field" class="sr-only">
                                <?php esc_html_e('Buscar produtos', 'tema_aromas'); ?>
                            </label>
                            <input type="search" 
                                   id="woocommerce-product-search-field" 
                                   class="search-field luxury-form-input" 
                                   placeholder="<?php esc_attr_e('Buscar produtos...', 'tema_aromas'); ?>" 
                                   value="<?php echo get_search_query(); ?>" 
                                   name="s" />
                            <input type="hidden" name="post_type" value="product" />
                            <button type="submit" class="search-submit btn-luxury" aria-label="<?php esc_attr_e('Buscar', 'tema_aromas'); ?>">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M21 21l-6.35-6.35M11 6a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                </svg>
                                <?php esc_html_e('Buscar', 'tema_aromas'); ?>
                            </button>
                        </form>
                    <?php else : ?>
                        <!-- Standard WordPress Search -->
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                    
                    <button class="search-close" aria-label="<?php esc_attr_e('Fechar busca', 'tema_aromas'); ?>">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div class="mobile-menu-overlay hidden-desktop" aria-hidden="true"></div>
    </header>

    <!-- Mini Cart Drawer (WooCommerce) -->
    <?php if (class_exists('WooCommerce')) : ?>
        <div id="mini-cart-drawer" class="mini-cart-drawer" aria-hidden="true">
            <div class="mini-cart-header">
                <h3 class="mini-cart-title"><?php esc_html_e('Carrinho de Compras', 'tema_aromas'); ?></h3>
                <button class="mini-cart-close" aria-label="<?php esc_attr_e('Fechar carrinho', 'tema_aromas'); ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="mini-cart-content">
                <?php woocommerce_mini_cart(); ?>
            </div>
        </div>
    <?php endif; ?>

    <main id="main" class="site-main" tabindex="-1">
