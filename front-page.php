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

            <div class="hero-content-left">
                <div class="hero-text-left">
                    <h1 class="hero-title-handwritten">
                        <?php esc_html_e('Ilumine seus sentidos', 'tema_aromas'); ?>
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

                <div class="trust-item-horizontal whatsapp-highlight">
                    <div class="trust-icon-horizontal whatsapp">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                        </svg>
                    </div>
                    <div class="trust-content-horizontal">
                        <h3><?php esc_html_e('Ficou em dúvida?', 'tema_aromas'); ?></h3>
                        <p><?php esc_html_e('Chama no WhatsApp', 'tema_aromas'); ?></p>
                    </div>
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