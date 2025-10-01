<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays the homepage of the site.
 * It contains all the main sections with luxury design and WooCommerce integration.
 *
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<div class="luxury-container">
    <main id="main" class="site-main homepage">

        <!-- Hero Section - Matching Screenshot Design -->
        <section class="hero-luxury-screenshot">
            <div class="hero-background">
                <img 
                    src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/Foto-tela-inicial-.webp'); ?>" 
                    alt="<?php esc_attr_e('Zen Secrets - Aromas Premium', 'tema_aromas'); ?>" 
                    class="hero-image" 
                    loading="eager"
                />
                <div class="hero-overlay-left"></div>
            </div>

            <div class="hero-content-container">
                <div class="hero-content-left">
                    <div class="hero-text-left">
                        <h1 class="hero-title-handwritten">
                            <?php esc_html_e('Aromas que transformam ambientes', 'tema_aromas'); ?>
                        </h1>
                        <p class="hero-subtitle-elegant">
                            <?php esc_html_e('Velas e aromas criados para o seu ritual de bem-estar.', 'tema_aromas'); ?>
                        </p>
                        <div class="hero-ctas-left">
                            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-comprar-agora">
                                <?php esc_html_e('Comprar Agora', 'tema_aromas'); ?>
                            </a>
                            <a href="<?php 
                                $sobre_page = get_page_by_path('sobre-os-aromas');
                                if ($sobre_page) {
                                    echo esc_url(get_permalink($sobre_page));
                                } else {
                                    echo esc_url(home_url('/sobre-os-aromas/'));
                                }
                            ?>" class="btn-ver-colecoes">
                                <?php esc_html_e('Ver Coleções', 'tema_aromas'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trust Indicators - Horizontal Layout Matching Screenshot -->
        <section class="trust-indicators-horizontal">
            <div class="trust-grid-horizontal">
                <div class="trust-item-horizontal">
                    <div class="trust-icon-horizontal payment">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                            <line x1="1" y1="10" x2="23" y2="10"/>
                        </svg>
                    </div>
                    <div class="trust-content-horizontal">
                        <h3><?php esc_html_e('Pagamento facilitado', 'tema_aromas'); ?></h3>
                        <p><?php esc_html_e('Cartão, Pix e Boleto Bancário', 'tema_aromas'); ?></p>
                    </div>
                </div>

                <div class="trust-item-horizontal">
                    <div class="trust-icon-horizontal shipping">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="1" y="3" width="15" height="13"/>
                            <polygon points="16,3 21,8 21,16 16,16"/>
                            <circle cx="5.5" cy="18.5" r="2.5"/>
                            <circle cx="18.5" cy="18.5" r="2.5"/>
                        </svg>
                    </div>
                    <div class="trust-content-horizontal">
                        <h3><?php esc_html_e('Envio para todo Brasil', 'tema_aromas'); ?></h3>
                        <p><?php esc_html_e('Rastreamento disponível', 'tema_aromas'); ?></p>
                    </div>
                </div>

                <div class="trust-item-horizontal">
                    <div class="trust-icon-horizontal security">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <path d="M9 12l2 2 4-4"/>
                        </svg>
                    </div>
                    <div class="trust-content-horizontal">
                        <h3><?php esc_html_e('Compra Segura', 'tema_aromas'); ?></h3>
                        <p><?php esc_html_e('Seus dados protegidos', 'tema_aromas'); ?></p>
                    </div>
                </div>

                <a href="https://wa.me/5516991626921" class="trust-item-horizontal whatsapp-highlight" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e('Ficou em dúvida? Chama no WhatsApp - (16) 99162-6921', 'tema_aromas'); ?>">
                    <div class="trust-icon-horizontal whatsapp">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                        </svg>
                    </div>
                    <div class="trust-content-horizontal">
                        <h3><?php esc_html_e('Ficou em dúvida?', 'tema_aromas'); ?></h3>
                        <p><?php esc_html_e('Chama no WhatsApp', 'tema_aromas'); ?></p>
                    </div>
                </a>
            </div>
        </section>

        <!-- Aromas Showcase Section - Friendly Redesign -->
        <section class="aromas-friendly-showcase">
            <!-- Friendly Header with Visual Elements -->
            <div class="aromas-friendly-header">
                <div class="aromas-header-content">
                    <div class="aromas-header-text">
                        <div class="aromas-subtitle">✨ <?php esc_html_e('Nossos Aromas Especiais', 'tema_aromas'); ?> ✨</div>
                        <h2 class="aromas-main-title">
                            <?php esc_html_e('Aromas que transformam ambientes', 'tema_aromas'); ?>
                        </h2>
                        <div class="aromas-title-decoration">
                            <div class="decoration-line"></div>
                            <div class="decoration-icon">🌸</div>
                            <div class="decoration-line"></div>
                        </div>
                        <p class="aromas-description">
                            <?php esc_html_e('Na Zen Secrets, acreditamos no poder dos aromas para criar experiências únicas e memoráveis. Cada produto é cuidadosamente elaborado para trazer harmonia e bem-estar ao seu espaço.', 'tema_aromas'); ?>
                        </p>
                    </div>
                    <div class="aromas-header-visual">
                        <div class="aromas-hero-image">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/all-aromatizadores.webp" 
                                 alt="<?php esc_attr_e('Aromas Zen Secrets - Coleção Premium', 'tema_aromas'); ?>" 
                                 loading="lazy">
                            <div class="aromas-image-overlay">
                                <div class="overlay-text">
                                    <span class="overlay-icon">🌸</span>
                                    <span class="overlay-label"><?php esc_html_e('Aromas Premium', 'tema_aromas'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Interactive Aromas Grid -->
            <div class="aromas-interactive-grid">
                <!-- Chá Branco -->
                <div class="aroma-interactive-card" data-aroma="chabranco">
                    <div class="aroma-card-inner">
                        <div class="aroma-image-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/all-chabranco.webp" 
                                 alt="<?php esc_attr_e('Chá Branco - Aromas Zen Secrets', 'tema_aromas'); ?>" 
                                 loading="lazy">
                            <div class="aroma-image-overlay">
                                <div class="aroma-feeling-badge">Pureza</div>
                            </div>
                        </div>
                        <div class="aroma-content">
                            <div class="aroma-icon">🌸</div>
                            <h3 class="aroma-name"><?php esc_html_e('Chá Branco', 'tema_aromas'); ?></h3>
                            <p class="aroma-sensation"><?php esc_html_e('Pureza e serenidade em cada respiração', 'tema_aromas'); ?></p>
                            <div class="aroma-features">
                                <span class="feature-tag">Relaxante</span>
                                <span class="feature-tag">Suave</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Flor de Figo -->
                <div class="aroma-interactive-card" data-aroma="flordefigo">
                    <div class="aroma-card-inner">
                        <div class="aroma-image-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/all-flordefigo.webp" 
                                 alt="<?php esc_attr_e('Flor de Figo - Aromas Zen Secrets', 'tema_aromas'); ?>" 
                                 loading="lazy">
                            <div class="aroma-image-overlay">
                                <div class="aroma-feeling-badge">Doçura</div>
                            </div>
                        </div>
                        <div class="aroma-content">
                            <div class="aroma-icon">🌿</div>
                            <h3 class="aroma-name"><?php esc_html_e('Flor de Figo', 'tema_aromas'); ?></h3>
                            <p class="aroma-sensation"><?php esc_html_e('Doçura natural e sofisticação', 'tema_aromas'); ?></p>
                            <div class="aroma-features">
                                <span class="feature-tag">Aconchegante</span>
                                <span class="feature-tag">Elegante</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bamboo -->
                <div class="aroma-interactive-card" data-aroma="bamboo">
                    <div class="aroma-card-inner">
                        <div class="aroma-image-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/vela-bamboo.jpg" 
                                 alt="<?php esc_attr_e('Bamboo - Aromas Zen Secrets', 'tema_aromas'); ?>" 
                                 loading="lazy">
                            <div class="aroma-image-overlay">
                                <div class="aroma-feeling-badge">Equilíbrio</div>
                            </div>
                        </div>
                        <div class="aroma-content">
                            <div class="aroma-icon">🎋</div>
                            <h3 class="aroma-name"><?php esc_html_e('Bamboo', 'tema_aromas'); ?></h3>
                            <p class="aroma-sensation"><?php esc_html_e('Frescor natural e equilíbrio zen', 'tema_aromas'); ?></p>
                            <div class="aroma-features">
                                <span class="feature-tag">Refrescante</span>
                                <span class="feature-tag">Zen</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Marinho -->
                <div class="aroma-interactive-card" data-aroma="marinho">
                    <div class="aroma-card-inner">
                        <div class="aroma-image-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/marinho.webp" 
                                 alt="<?php esc_attr_e('Marinho - Aromas Zen Secrets', 'tema_aromas'); ?>" 
                                 loading="lazy">
                            <div class="aroma-image-overlay">
                                <div class="aroma-feeling-badge">Tranquilidade</div>
                            </div>
                        </div>
                        <div class="aroma-content">
                            <div class="aroma-icon">🌊</div>
                            <h3 class="aroma-name"><?php esc_html_e('Marinho', 'tema_aromas'); ?></h3>
                            <p class="aroma-sensation"><?php esc_html_e('Brisa oceânica e tranquilidade', 'tema_aromas'); ?></p>
                            <div class="aroma-features">
                                <span class="feature-tag">Calmante</span>
                                <span class="feature-tag">Marinho</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Palo Santo -->
                <div class="aroma-interactive-card" data-aroma="palosanto">
                    <div class="aroma-card-inner">
                        <div class="aroma-image-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Vela-palo-santo.webp" 
                                 alt="<?php esc_attr_e('Palo Santo - Aromas Zen Secrets', 'tema_aromas'); ?>" 
                                 loading="lazy">
                            <div class="aroma-image-overlay">
                                <div class="aroma-feeling-badge">Energia</div>
                            </div>
                        </div>
                        <div class="aroma-content">
                            <div class="aroma-icon">🕯️</div>
                            <h3 class="aroma-name"><?php esc_html_e('Palo Santo', 'tema_aromas'); ?></h3>
                            <p class="aroma-sensation"><?php esc_html_e('Madeira sagrada e energia positiva', 'tema_aromas'); ?></p>
                            <div class="aroma-features">
                                <span class="feature-tag">Sagrado</span>
                                <span class="feature-tag">Energizante</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="aromas-friendly-cta">
                <div class="cta-content">
                    <h3 class="cta-title"><?php esc_html_e('Pronto para transformar seu ambiente?', 'tema_aromas'); ?></h3>
                    <p class="cta-subtitle"><?php esc_html_e('Descubra nossa coleção completa de aromas especiais', 'tema_aromas'); ?></p>
                    <div class="cta-buttons">
                        <a href="<?php 
                            $sobre_page = get_page_by_path('sobre-os-aromas');
                            if ($sobre_page) {
                                echo esc_url(get_permalink($sobre_page));
                            } else {
                                echo esc_url(home_url('/sobre-os-aromas/'));
                            }
                        ?>" class="btn-aromas-primary">
                            <span class="btn-icon">🌸</span>
                            <?php esc_html_e('Conheça Todos os Aromas', 'tema_aromas'); ?>
                        </a>
                        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-aromas-secondary">
                            <span class="btn-icon">🛍️</span>
                            <?php esc_html_e('Ver Produtos', 'tema_aromas'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products Section - Slider Layout -->
        <section class="featured-products-slider">
            <div class="section-header">
                <h2 class="section-title luxury-heading">
                    <?php esc_html_e('Produtos em Destaque', 'tema_aromas'); ?>
                </h2>
                <p class="section-subtitle">
                    <?php esc_html_e('Descubra nossa seleção especial de aromas que transformam qualquer ambiente em um refúgio de tranquilidade e bem-estar.', 'tema_aromas'); ?>
                </p>
            </div>
            
            <!-- Featured Products Slider Container -->
            <div class="featured-slider-container">
                <div class="featured-slider-wrapper">
                    <div class="featured-slider" id="featured-products-slider">
                        <?php if (class_exists('WooCommerce')) : ?>
                            <?php echo do_shortcode('[products featured="true" limit="8" columns="1"]'); ?>
                        <?php else : ?>
                            <p><?php esc_html_e('WooCommerce não está ativo. Ative o plugin para exibir os produtos.', 'tema_aromas'); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Slider Navigation -->
                <div class="slider-navigation">
                    <button class="slider-btn slider-prev" id="featured-slider-prev" aria-label="<?php esc_attr_e('Produto anterior', 'tema_aromas'); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="15,18 9,12 15,6"></polyline>
                        </svg>
                    </button>
                    <button class="slider-btn slider-next" id="featured-slider-next" aria-label="<?php esc_attr_e('Próximo produto', 'tema_aromas'); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="9,18 15,12 9,6"></polyline>
                        </svg>
                    </button>
                </div>
                
                <!-- Slider Dots -->
                <div class="slider-dots" id="featured-slider-dots">
                    <!-- Dots will be generated by JavaScript -->
                </div>
            </div>
            
            <div class="featured-cta">
                <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-luxury btn-primary">
                    <?php esc_html_e('Ver Todos os Produtos', 'tema_aromas'); ?>
                </a>
            </div>
        </section>

        <!-- Nossos Produtos Queridos -->
        <section class="produtos-queridos-section">
            <div class="section-header">
                <h2 class="section-title luxury-heading">
                    <?php esc_html_e('Nossos Produtos Queridos', 'tema_aromas'); ?>
                </h2>
                <p class="section-subtitle">
                    <?php esc_html_e('Descubra nossa linha completa de produtos para harmonizar seu ambiente', 'tema_aromas'); ?>
                </p>
            </div>
            
            <div class="produtos-grid">
                <!-- Velas Aromáticas -->
                <div class="produto-card velas-card animate-fade-in-up">
                    <div class="produto-image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/all-candles.webp" 
                             alt="<?php esc_attr_e('Velas Aromáticas Zen Secrets', 'tema_aromas'); ?>" 
                             loading="lazy">
                        <div class="produto-overlay"></div>
                        <div class="produto-category-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M12 1v6m0 6v6m11-7h-6m-6 0H1"/>
                            </svg>
                        </div>
                    </div>
                    <div class="produto-content">
                        <h3 class="produto-title"><?php esc_html_e('Velas Aromáticas', 'tema_aromas'); ?></h3>
                        <p class="produto-description">
                            <?php esc_html_e('Fragrâncias exclusivas para criar momentos especiais em seu ambiente', 'tema_aromas'); ?>
                        </p>
                    </div>
                </div>
                
                <!-- Aromatizadores -->
                <div class="produto-card aromatizadores-card animate-fade-in-up">
                    <div class="produto-image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/all-aromatizadores.webp" 
                             alt="<?php esc_attr_e('Aromatizadores Zen Secrets', 'tema_aromas'); ?>" 
                             loading="lazy">
                        <div class="produto-overlay"></div>
                        <div class="produto-category-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                <path d="M9 9h6v6H9z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="produto-content">
                        <h3 class="produto-title"><?php esc_html_e('Aromatizadores', 'tema_aromas'); ?></h3>
                        <p class="produto-description">
                            <?php esc_html_e('Perfume seu espaço com nossas essências naturais duradouras', 'tema_aromas'); ?>
                        </p>
                    </div>
                </div>
                
                <!-- Home Spray -->
                <div class="produto-card homespray-card animate-fade-in-up">
                    <div class="produto-image">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/all-homespray.webp" 
                             alt="<?php esc_attr_e('Home Spray Zen Secrets', 'tema_aromas'); ?>" 
                             loading="lazy">
                        <div class="produto-overlay"></div>
                        <div class="produto-category-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"/>
                                <path d="M2 17l10 5 10-5"/>
                                <path d="M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                    </div>
                    <div class="produto-content">
                        <h3 class="produto-title"><?php esc_html_e('Home Spray', 'tema_aromas'); ?></h3>
                        <p class="produto-description">
                            <?php esc_html_e('Fragrâncias refrescantes para uma atmosfera instantaneamente agradável', 'tema_aromas'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Lembrancinhas Block -->
        <section class="lembrancinhas-block">
            <div class="lembrancinhas-content">
                <div class="lembrancinhas-text">
                    <h2 class="section-title luxury-heading">
                        <?php esc_html_e('Encomende com a gente sua lembrancinha', 'tema_aromas'); ?>
                    </h2>
                    <p class="section-subtitle">
                        <?php esc_html_e('Torne seu evento ainda mais especial com nossas lembrancinhas personalizadas. Criamos produtos únicos que vão marcar o seu momento e encantar seus convidados.', 'tema_aromas'); ?>
                    </p>
                    <div class="lembrancinhas-features">
                        <div class="feature-item">
                            <span class="feature-icon">🎁</span>
                            <span><?php esc_html_e('Produtos personalizados para seu evento', 'tema_aromas'); ?></span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">💝</span>
                            <span><?php esc_html_e('Embalagens especiais', 'tema_aromas'); ?></span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">🌟</span>
                            <span><?php esc_html_e('Fragrâncias exclusivas', 'tema_aromas'); ?></span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">💜</span>
                            <span><?php esc_html_e('Atendimento personalizado', 'tema_aromas'); ?></span>
                        </div>
                    </div>
                    <div class="lembrancinhas-cta">
                        <a href="<?php echo esc_url(get_term_link('lembrancinhas', 'product_cat')); ?>" class="btn-luxury btn-primary">
                            <?php esc_html_e('Fale via nosso pelo WhatsApp!', 'tema_aromas'); ?>
                        </a>
                    </div>
                </div>
                <div class="lembrancinhas-visual">
                    <div class="lembrancinhas-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Lembrancinha.webp" 
                             alt="<?php esc_attr_e('Lembrancinhas Zen Secrets', 'tema_aromas'); ?>" 
                             loading="lazy">
                    </div>
                </div>
            </div>
        </section>

        <!-- Product Carousel -->
        <section class="product-carousel">
            <div class="section-header">
                <h2 class="section-title luxury-heading">
                    <?php esc_html_e('Novidades', 'tema_aromas'); ?>
                </h2>
                <p class="section-subtitle">
                    <?php esc_html_e('Confira os lançamentos mais recentes da nossa coleção aromática.', 'tema_aromas'); ?>
                </p>
            </div>
            
            <div class="carousel-container">
                <?php if (class_exists('WooCommerce')) : ?>
                    <div class="product-carousel-wrapper">
                        <?php echo do_shortcode('[recent_products limit="8" columns="4"]'); ?>
                    </div>
                <?php else : ?>
                    <p><?php esc_html_e('WooCommerce não está ativo. Ative o plugin para exibir os produtos.', 'tema_aromas'); ?></p>
                <?php endif; ?>
            </div>
        </section>



    </main>
</div>

<?php get_footer(); ?>