<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        function updateLogo() {
            const header = document.querySelector('.site-header');
            const logoWhite = document.getElementById('logo-white');
            const logoBlack = document.getElementById('logo-black');
            
            if (!header || !logoWhite || !logoBlack) return;
            
            // Check if we're on homepage and not scrolled
            const isHomepage = document.body.classList.contains('homepage');
            const isScrolled = header.classList.contains('scrolled') || window.scrollY > 50;
            
            // Determine which logo to show
            let shouldShowWhiteLogo = false;
            
            if (isHomepage && !isScrolled) {
                // Homepage hero - white logo on transparent/dark background
                shouldShowWhiteLogo = true;
            } else {
                // All other cases - black logo on white background
                shouldShowWhiteLogo = false;
            }
            
            // Update logo visibility with smooth transition
            if (shouldShowWhiteLogo) {
                logoWhite.style.display = 'block';
                logoBlack.style.display = 'none';
                // Add small delay for smooth transition
                setTimeout(() => {
                    logoWhite.style.opacity = '1';
                    logoWhite.style.transform = 'scale(1)';
                }, 50);
            } else {
                logoWhite.style.display = 'none';
                logoBlack.style.display = 'block';
                // Add small delay for smooth transition
                setTimeout(() => {
                    logoBlack.style.opacity = '1';
                    logoBlack.style.transform = 'scale(1)';
                }, 50);
            }
        }
        
        // Initial logo update
        updateLogo();
        
        // Update logo on scroll
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(updateLogo, 10);
        });
        
        // Update logo on window resize
        window.addEventListener('resize', updateLogo);
        
        // Update logo when header classes change (for dynamic header states)
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    updateLogo();
                }
            });
        });
        
        const header = document.querySelector('.site-header');
        if (header) {
            observer.observe(header, { attributes: true });
        }
    });
    </script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Skip Link for Accessibility -->
<a class="skip-link sr-only" href="#main"><?php esc_html_e('Pular para o conteúdo', 'tema_aromas'); ?></a>

<div id="page" class="site">
    <header id="masthead" class="site-header luxury-header">
        <div class="container">
            <div class="header-content">
                <!-- Hamburger Menu Button (Left on desktop, Right on mobile/tablet) -->
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false" aria-label="<?php esc_attr_e('Alternar menu', 'tema_aromas'); ?>">
                    <span class="menu-icon">
                        <span></span>
                        <span></span>
                    </span>
                    <span class="menu-text"><?php esc_html_e('MENU', 'tema_aromas'); ?></span>
                </button>

                <!-- Logo / Site Title (Left on mobile, Center on desktop) -->
                <div class="site-branding">
                    <div class="site-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="dynamic-logo-link">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-nome-branca.png'); ?>"
                                 alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                                 class="site-logo-img logo-white"
                                 id="logo-white">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-nome-preta.png'); ?>"
                                 alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                                 class="site-logo-img logo-black"
                                 id="logo-black"
                                 style="display: none;">
                        </a>
                    </div>
                </div>

                <!-- Header Icons (Right) -->
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
                            <span class="cart-count" <?php echo $cart_count > 0 ? '' : 'style="display:none;"'; ?>>
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
                                   value="<?php echo esc_attr(get_search_query()); ?>"
                                   name="s" />
                            <input type="hidden" name="post_type" value="product" />
                            <button type="submit" class="search-submit btn-luxury" aria-label="<?php esc_attr_e('Buscar', 'tema_aromas'); ?>">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M21 21l-6.35-6.35M11 6a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                </svg>
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
        <div class="mobile-menu-overlay" aria-hidden="true"></div>

        <!-- Slide-in Navigation Menu -->
        <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e('Menu principal', 'tema_aromas'); ?>">
            <?php if (has_nav_menu('header')) : ?>
                <div class="primary-menu-container">
                    <!-- Close button inside menu -->
                    <button class="menu-close-button" aria-label="<?php esc_attr_e('Fechar menu', 'tema_aromas'); ?>">
                        <span class="close-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </span>
                        <span class="close-text"><?php esc_html_e('MENU', 'tema_aromas'); ?></span>
                    </button>

                    <?php wp_nav_menu([
                        'theme_location' => 'header',
                        'menu_id' => 'primary-menu',
                        'menu_class' => 'primary-menu luxury-menu',
                        'container' => false,
                        'depth' => 2,
                        'walker' => new Tema_Aromas_Walker_Nav_Menu(),
                    ]); ?>

                    <!-- Menu Footer with Social Icons -->
                    <div class="menu-footer">
                        <!-- Social Icons - Simple outline style -->
                        <div class="menu-social-icons">
                            <a href="https://instagram.com/secretszen" target="_blank" rel="noopener noreferrer" class="menu-social-icon" aria-label="Instagram">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                            </a>
                            <a href="https://wa.me/5516991626921" target="_blank" rel="noopener noreferrer" class="menu-social-icon" aria-label="WhatsApp">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg>
                            </a>
                            <a href="mailto:secretszen888@gmail.com" class="menu-social-icon" aria-label="Email">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                        <!-- Default menu structure if no menu is assigned -->
                        <div class="primary-menu-container">
                            <!-- Close button inside menu -->
                            <button class="menu-close-button" aria-label="<?php esc_attr_e('Fechar menu', 'tema_aromas'); ?>">
                                <span class="close-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </span>
                                <span class="close-text"><?php esc_html_e('MENU', 'tema_aromas'); ?></span>
                            </button>

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

                            <!-- Menu Footer with Action Buttons and Social Icons -->
                            <div class="menu-footer">
                                <!-- Action Buttons: Search, Account, Cart -->
                                <div class="menu-action-buttons">
                                    <button class="menu-action-btn search-toggle" aria-label="<?php esc_attr_e('Abrir busca', 'tema_aromas'); ?>" aria-expanded="false">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <path d="m21 21-4.35-4.35"></path>
                                        </svg>
                                        <span><?php esc_html_e('Buscar', 'tema_aromas'); ?></span>
                                    </button>

                                    <?php if (class_exists('WooCommerce')) : ?>
                                        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="menu-action-btn" aria-label="<?php esc_attr_e('Minha conta', 'tema_aromas'); ?>">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <span><?php esc_html_e('Minha Conta', 'tema_aromas'); ?></span>
                                        </a>

                                        <button class="menu-action-btn cart-toggle" aria-label="<?php esc_attr_e('Abrir carrinho', 'tema_aromas'); ?>" data-cart-toggle>
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                <circle cx="9" cy="21" r="1"></circle>
                                                <circle cx="20" cy="21" r="1"></circle>
                                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                            </svg>
                                            <span><?php esc_html_e('Carrinho', 'tema_aromas'); ?></span>
                                            <?php $cart_count = WC()->cart->get_cart_contents_count(); ?>
                                            <?php if ($cart_count > 0) : ?>
                                                <span class="menu-cart-count"><?php echo esc_html($cart_count); ?></span>
                                            <?php endif; ?>
                                        </button>
                                    <?php endif; ?>
                                </div>

                                <!-- Social Icons - Simple outline style -->
                                <div class="menu-social-icons">
                                    <a href="https://instagram.com/secretszen" target="_blank" rel="noopener noreferrer" class="menu-social-icon" aria-label="Instagram">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                        </svg>
                                    </a>
                                    <a href="https://wa.me/5516991626921" target="_blank" rel="noopener noreferrer" class="menu-social-icon" aria-label="WhatsApp">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                        </svg>
                                    </a>
                                    <a href="mailto:secretszen888@gmail.com" class="menu-social-icon" aria-label="Email">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </nav>
        </div>

        <!-- Mobile Menu Overlay -->
        <div class="mobile-menu-overlay" aria-hidden="true"></div>
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
