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

        <!-- Hero Section -->
        <section class="hero-section homepage-hero">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title luxury-heading">
                        <?php esc_html_e('Transforme Seu Ambiente com', 'tema_aromas'); ?>
                        <span class="hero-highlight"><?php esc_html_e('Aromas Exclusivos', 'tema_aromas'); ?></span>
                    </h1>
                    <p class="hero-subtitle">
                        <?php esc_html_e('Descubra nossa coleção premium de aromatizadores, velas e home sprays que criam experiências únicas e despertam seus sentidos com fragrâncias sofisticadas.', 'tema_aromas'); ?>
                    </p>
                    <div class="hero-cta">
                        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-luxury btn-primary btn-large">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <?php esc_html_e('Explorar Produtos', 'tema_aromas'); ?>
                        </a>
                        <a href="<?php 
                            $sobre_page = get_page_by_path('sobre-os-aromas');
                            if ($sobre_page) {
                                echo esc_url(get_permalink($sobre_page));
                            } else {
                                echo esc_url(home_url('/sobre-os-aromas/'));
                            }
                        ?>" class="btn-luxury btn-secondary btn-large">
                            <?php esc_html_e('Sobre os Aromas', 'tema_aromas'); ?>
                        </a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="hero-product-showcase">
                        <div class="showcase-item animate-float-1">
                            <div class="product-visual diffuser">
                                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <circle cx="12" cy="8" r="6"/>
                                    <path d="M12 14v7"/>
                                    <path d="M8 18h8"/>
                                </svg>
                            </div>
                        </div>
                        <div class="showcase-item animate-float-2">
                            <div class="product-visual candle">
                                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M12 2L15 8h6l-5 4 2 6-6-4-6 4 2-6-5-4h6z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="showcase-item animate-float-3">
                            <div class="product-visual spray">
                                <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M7 18v-2a4 4 0 0 1 4-4v0a4 4 0 0 1 4 4v2"/>
                                    <circle cx="12" cy="6" r="4"/>
                                    <path d="M12 14v4"/>
                                    <path d="M8 18h8"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-decoration">
                <svg class="hero-wave" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0,60 Q300,120 600,60 T1200,60 L1200,120 L0,120 Z" fill="url(#heroGradient)" opacity="0.1"/>
                    <defs>
                        <linearGradient id="heroGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" style="stop-color:var(--cor-primaria);stop-opacity:1" />
                            <stop offset="100%" style="stop-color:var(--cor-accent);stop-opacity:1" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </section>

        <!-- Trust Indicators -->
        <section class="trust-indicators">
            <div class="trust-grid">
                <div class="trust-item animate-fade-in-up">
                    <div class="trust-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('Qualidade Premium', 'tema_aromas'); ?></h3>
                    <p><?php esc_html_e('Produtos selecionados com óleos essenciais naturais', 'tema_aromas'); ?></p>
                </div>
                
                <div class="trust-item animate-fade-in-up">
                    <div class="trust-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                            <polyline points="7.5,4.21 12,6.81 16.5,4.21"/>
                            <polyline points="7.5,19.79 7.5,14.6 3,12"/>
                            <polyline points="21,12 16.5,14.6 16.5,19.79"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('Entrega Rápida', 'tema_aromas'); ?></h3>
                    <p><?php esc_html_e('Frete grátis acima de R$ 150 para todo o Brasil', 'tema_aromas'); ?></p>
                </div>
                
                <div class="trust-item animate-fade-in-up">
                    <div class="trust-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('Satisfação Garantida', 'tema_aromas'); ?></h3>
                    <p><?php esc_html_e('7 dias para trocas e devoluções sem complicações', 'tema_aromas'); ?></p>
                </div>
                
                <div class="trust-item animate-fade-in-up">
                    <div class="trust-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M9 12l2 2 4-4"/>
                            <circle cx="12" cy="12" r="9"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('Pagamento Seguro', 'tema_aromas'); ?></h3>
                    <p><?php esc_html_e('Checkout protegido e múltiplas formas de pagamento', 'tema_aromas'); ?></p>
                </div>
            </div>
        </section>

        <!-- About Aromas Block -->
        <section class="about-aromas-block">
            <div class="about-content">
                <div class="about-text">
                    <h2 class="section-title luxury-heading">
                        <?php esc_html_e('O Poder dos Aromas', 'tema_aromas'); ?>
                    </h2>
                    <p class="section-subtitle">
                        <?php esc_html_e('A aromaterapia é uma arte milenar que utiliza o poder das fragrâncias naturais para criar ambientes únicos e promover bem-estar. Nossos produtos são cuidadosamente selecionados para proporcionar experiências sensoriais transformadoras.', 'tema_aromas'); ?>
                    </p>
                    <div class="benefits-mini">
                        <div class="benefit-mini">
                            <span class="benefit-icon">🧘‍♀️</span>
                            <span><?php esc_html_e('Relaxamento', 'tema_aromas'); ?></span>
                        </div>
                        <div class="benefit-mini">
                            <span class="benefit-icon">🎯</span>
                            <span><?php esc_html_e('Concentração', 'tema_aromas'); ?></span>
                        </div>
                        <div class="benefit-mini">
                            <span class="benefit-icon">✨</span>
                            <span><?php esc_html_e('Energia', 'tema_aromas'); ?></span>
                        </div>
                        <div class="benefit-mini">
                            <span class="benefit-icon">❤️</span>
                            <span><?php esc_html_e('Bem-estar', 'tema_aromas'); ?></span>
                        </div>
                    </div>
                    <a href="<?php 
                        $sobre_page = get_page_by_path('sobre-os-aromas');
                        if ($sobre_page) {
                            echo esc_url(get_permalink($sobre_page));
                        } else {
                            echo esc_url(home_url('/sobre-os-aromas/'));
                        }
                    ?>" class="btn-luxury btn-primary">
                        <?php esc_html_e('Saiba Mais', 'tema_aromas'); ?>
                    </a>
                </div>
                <div class="about-visual">
                    <div class="aroma-illustration">
                        <div class="aroma-circle circle-1"></div>
                        <div class="aroma-circle circle-2"></div>
                        <div class="aroma-circle circle-3"></div>
                        <div class="aroma-center">
                            <svg width="100" height="100" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products Section -->
        <section class="featured-products">
            <div class="section-header">
                <h2 class="section-title luxury-heading">
                    <?php esc_html_e('Produtos em Destaque', 'tema_aromas'); ?>
                </h2>
                <p class="section-subtitle">
                    <?php esc_html_e('Descubra nossa seleção especial de aromas que transformam qualquer ambiente em um refúgio de tranquilidade e bem-estar.', 'tema_aromas'); ?>
                </p>
            </div>
            
            <!-- WooCommerce Featured Products -->
            <div class="featured-products-grid">
                <?php if (class_exists('WooCommerce')) : ?>
                    <?php echo do_shortcode('[products featured="true" limit="6" columns="3"]'); ?>
                <?php else : ?>
                    <p><?php esc_html_e('WooCommerce não está ativo. Ative o plugin para exibir os produtos.', 'tema_aromas'); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="featured-cta">
                <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-luxury btn-primary">
                    <?php esc_html_e('Ver Todos os Produtos', 'tema_aromas'); ?>
                </a>
            </div>
        </section>

        <!-- Category Highlights -->
        <section class="category-highlights">
            <div class="section-header">
                <h2 class="section-title luxury-heading">
                    <?php esc_html_e('Nossas Categorias', 'tema_aromas'); ?>
                </h2>
                <p class="section-subtitle">
                    <?php esc_html_e('Cada categoria foi pensada para atender diferentes necessidades e momentos do seu dia.', 'tema_aromas'); ?>
                </p>
            </div>
            
            <div class="category-grid">
                <div class="category-card featured animate-fade-in-up">
                    <div class="category-icon">
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="12" cy="8" r="6"/>
                            <path d="M12 14v7"/>
                            <path d="M8 18h8"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('Aromatizadores', 'tema_aromas'); ?></h3>
                    <p><?php esc_html_e('Difusores ultrassônicos e elétricos para uma experiência aromática contínua', 'tema_aromas'); ?></p>
                    <a href="<?php echo esc_url(get_term_link('aromatizadores', 'product_cat')); ?>" class="btn-luxury btn-secondary">
                        <?php esc_html_e('Explorar', 'tema_aromas'); ?>
                    </a>
                </div>
                
                <div class="category-card animate-fade-in-up">
                    <div class="category-icon">
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M12 2L15 8h6l-5 4 2 6-6-4-6 4 2-6-5-4h6z"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('Velas Aromáticas', 'tema_aromas'); ?></h3>
                    <p><?php esc_html_e('Velas artesanais com cera natural e fragrâncias exclusivas', 'tema_aromas'); ?></p>
                    <a href="<?php echo esc_url(get_term_link('velas-aromaticas', 'product_cat')); ?>" class="btn-luxury btn-secondary">
                        <?php esc_html_e('Descobrir', 'tema_aromas'); ?>
                    </a>
                </div>
                
                <div class="category-card animate-fade-in-up">
                    <div class="category-icon">
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M7 18v-2a4 4 0 0 1 4-4v0a4 4 0 0 1 4 4v2"/>
                            <circle cx="12" cy="6" r="4"/>
                            <path d="M12 14v4"/>
                            <path d="M8 18h8"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('Home Spray', 'tema_aromas'); ?></h3>
                    <p><?php esc_html_e('Sprays aromáticos para perfumar instantaneamente qualquer ambiente', 'tema_aromas'); ?></p>
                    <a href="<?php echo esc_url(get_term_link('home-spray', 'product_cat')); ?>" class="btn-luxury btn-secondary">
                        <?php esc_html_e('Ver Mais', 'tema_aromas'); ?>
                    </a>
                </div>
            </div>
        </section>

        <!-- Lembrancinhas Block -->
        <section class="lembrancinhas-block">
            <div class="lembrancinhas-content">
                <div class="lembrancinhas-visual">
                    <div class="gift-illustration">
                        <div class="gift-box">
                            <svg width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <polyline points="20,12 20,19 4,19 4,12"/>
                                <rect x="2" y="7" width="20" height="5"/>
                                <line x1="12" y1="22" x2="12" y2="7"/>
                                <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"/>
                                <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"/>
                            </svg>
                        </div>
                        <div class="sparkles">
                            <span class="sparkle sparkle-1">✨</span>
                            <span class="sparkle sparkle-2">💫</span>
                            <span class="sparkle sparkle-3">⭐</span>
                        </div>
                    </div>
                </div>
                <div class="lembrancinhas-text">
                    <h2 class="section-title luxury-heading">
                        <?php esc_html_e('Lembrancinhas Especiais', 'tema_aromas'); ?>
                    </h2>
                    <p class="section-subtitle">
                        <?php esc_html_e('Crie momentos únicos e inesquecíveis com nossas lembrancinhas personalizadas. Perfeitas para casamentos, batizados, aniversários e eventos corporativos.', 'tema_aromas'); ?>
                    </p>
                    <div class="lembrancinhas-features">
                        <div class="feature-item">
                            <span class="feature-icon">🎁</span>
                            <span><?php esc_html_e('Personalização Exclusiva', 'tema_aromas'); ?></span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">💝</span>
                            <span><?php esc_html_e('Embalagens Premium', 'tema_aromas'); ?></span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">🌟</span>
                            <span><?php esc_html_e('Fragrâncias Especiais', 'tema_aromas'); ?></span>
                        </div>
                    </div>
                    <div class="lembrancinhas-cta">
                        <a href="<?php echo esc_url(get_term_link('lembrancinhas', 'product_cat')); ?>" class="btn-luxury btn-primary">
                            <?php esc_html_e('Ver Lembrancinhas', 'tema_aromas'); ?>
                        </a>
                        <a href="<?php 
                            $contato_page = get_page_by_path('fale-conosco');
                            if ($contato_page) {
                                echo esc_url(get_permalink($contato_page));
                            } else {
                                echo esc_url(home_url('/fale-conosco/'));
                            }
                        ?>" class="btn-luxury btn-secondary">
                            <?php esc_html_e('Solicitar Orçamento', 'tema_aromas'); ?>
                        </a>
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

        <!-- Newsletter CTA -->
        <section class="newsletter-cta">
            <div class="newsletter-content">
                <div class="newsletter-text">
                    <h2 class="newsletter-title">
                        <?php esc_html_e('Receba Novidades e Ofertas Exclusivas', 'tema_aromas'); ?>
                    </h2>
                    <p class="newsletter-subtitle">
                        <?php esc_html_e('Cadastre-se em nossa newsletter e seja o primeiro a saber sobre lançamentos, promoções especiais e dicas de aromaterapia.', 'tema_aromas'); ?>
                    </p>
                </div>
                <div class="newsletter-form">
                    <form class="newsletter-signup" method="post" action="">
                        <div class="form-group newsletter-group">
                            <input type="email" name="newsletter_email" placeholder="<?php esc_attr_e('Seu melhor e-mail', 'tema_aromas'); ?>" required class="luxury-form-input">
                            <button type="submit" class="btn-luxury btn-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22,2 15,22 11,13 2,9 22,2"></polygon>
                                </svg>
                                <?php esc_html_e('Cadastrar', 'tema_aromas'); ?>
                            </button>
                        </div>
                        <small class="newsletter-privacy">
                            <?php esc_html_e('Seus dados estão seguros conosco. Não enviamos spam.', 'tema_aromas'); ?>
                        </small>
                    </form>
                </div>
            </div>
        </section>

    </main>
</div>

<?php get_footer(); ?>