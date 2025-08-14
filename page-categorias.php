<?php
/**
 * Template Name: Categorias
 * 
 * Page template for displaying the 6 aromatherapy product categories
 * Beautiful grid layout with luxury styling
 * 
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main categorias-main" tabindex="-1">
    
    <!-- Page Header -->
    <section class="page-header-section luxury-section">
        <div class="container">
            <?php tema_aromas_breadcrumbs(); ?>
            <div class="page-header-content text-center animate-fade-in-up">
                <h1 class="page-title luxury-heading">
                    <?php esc_html_e('Nossas Categorias', 'tema_aromas'); ?>
                </h1>
                <p class="page-subtitle">
                    <?php esc_html_e('Explore nossa coleção completa de produtos de aromaterapia premium, cada um cuidadosamente selecionado para transformar seus momentos.', 'tema_aromas'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Categories Grid Section -->
    <section class="categories-grid-section luxury-section">
        <div class="container">
            <div class="categories-grid animate-fade-in-up">
                
                <!-- Aromatizadores -->
                <article class="category-card luxury-card-hover" data-category="aromatizadores">
                    <div class="category-card-inner">
                        <div class="category-image">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/categoria-aromatizadores.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Aromatizadores elétricos premium', 'tema_aromas'); ?>" 
                                 loading="lazy"
                                 width="400" 
                                 height="300">
                            <div class="category-overlay">
                                <div class="category-icon">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M9.75 3.104v5.714a2.454 2.454 0 01-.881 1.895l-2.777 2.364a.75.75 0 00.022 1.05A3.75 3.75 0 009.75 15.75v.75c0 .414.336.75.75.75h3c.414 0 .75-.336.75-.75v-.75a3.75 3.75 0 003.636-1.573.75.75 0 00.022-1.05l-2.777-2.364a2.454 2.454 0 01-.881-1.895V3.104"></path>
                                        <path d="M8.25 21v-4.875a2.854 2.854 0 00-2.854-2.854H4.5c-.825 0-1.5.675-1.5 1.5V21M15.75 21v-4.875c0-1.576 1.278-2.854 2.854-2.854H19.5c.825 0 1.5.675 1.5 1.5V21"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="category-content">
                            <h2 class="category-title"><?php esc_html_e('Aromatizadores', 'tema_aromas'); ?></h2>
                            <p class="category-description">
                                <?php esc_html_e('Difusores elétricos elegantes que espalham fragrâncias uniformemente por todo o ambiente com tecnologia ultrassônica.', 'tema_aromas'); ?>
                            </p>
                            <div class="category-features">
                                <span class="feature-tag"><?php esc_html_e('Ultrassônicos', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('Timer', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('LED', 'tema_aromas'); ?></span>
                            </div>
                            <div class="category-cta">
                                <a href="<?php echo esc_url(get_term_link('aromatizadores', 'product_cat')); ?>" class="btn-luxury">
                                    <?php esc_html_e('Ver Produtos', 'tema_aromas'); ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Home Spray -->
                <article class="category-card luxury-card-hover" data-category="home-spray">
                    <div class="category-card-inner">
                        <div class="category-image">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/categoria-home-spray.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Home spray aromático instantâneo', 'tema_aromas'); ?>" 
                                 loading="lazy"
                                 width="400" 
                                 height="300">
                            <div class="category-overlay">
                                <div class="category-icon">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                        <path d="M2 17l10 5 10-5"></path>
                                        <path d="M2 12l10 5 10-5"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="category-content">
                            <h2 class="category-title"><?php esc_html_e('Home Spray', 'tema_aromas'); ?></h2>
                            <p class="category-description">
                                <?php esc_html_e('Sprays aromáticos de ação instantânea para perfumar qualquer ambiente rapidamente. Ideais para momentos especiais.', 'tema_aromas'); ?>
                            </p>
                            <div class="category-features">
                                <span class="feature-tag"><?php esc_html_e('Instantâneo', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('Portátil', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('Natural', 'tema_aromas'); ?></span>
                            </div>
                            <div class="category-cta">
                                <a href="<?php echo esc_url(get_term_link('home-spray', 'product_cat')); ?>" class="btn-luxury">
                                    <?php esc_html_e('Ver Produtos', 'tema_aromas'); ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Velas Aromáticas -->
                <article class="category-card luxury-card-hover" data-category="velas-aromaticas">
                    <div class="category-card-inner">
                        <div class="category-image">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/categoria-velas.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Velas aromáticas artesanais', 'tema_aromas'); ?>" 
                                 loading="lazy"
                                 width="400" 
                                 height="300">
                            <div class="category-overlay">
                                <div class="category-icon">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="category-content">
                            <h2 class="category-title"><?php esc_html_e('Velas Aromáticas', 'tema_aromas'); ?></h2>
                            <p class="category-description">
                                <?php esc_html_e('Velas artesanais de cera natural que combinam a magia da luz com fragrâncias encantadoras para momentos únicos.', 'tema_aromas'); ?>
                            </p>
                            <div class="category-features">
                                <span class="feature-tag"><?php esc_html_e('Cera Natural', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('Artesanal', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('Longa Duração', 'tema_aromas'); ?></span>
                            </div>
                            <div class="category-cta">
                                <a href="<?php echo esc_url(get_term_link('velas-aromaticas', 'product_cat')); ?>" class="btn-luxury">
                                    <?php esc_html_e('Ver Produtos', 'tema_aromas'); ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Kits Especiais -->
                <article class="category-card luxury-card-hover" data-category="kits-especiais">
                    <div class="category-card-inner">
                        <div class="category-image">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/categoria-kits.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Kits especiais de aromaterapia', 'tema_aromas'); ?>" 
                                 loading="lazy"
                                 width="400" 
                                 height="300">
                            <div class="category-overlay">
                                <div class="category-icon">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                        <path d="M7 21h10"></path>
                                        <path d="M12 16v5"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="category-content">
                            <h2 class="category-title"><?php esc_html_e('Kits Especiais', 'tema_aromas'); ?></h2>
                            <p class="category-description">
                                <?php esc_html_e('Conjuntos cuidadosamente montados com produtos complementares. Economia garantida e experiência completa.', 'tema_aromas'); ?>
                            </p>
                            <div class="category-features">
                                <span class="feature-tag"><?php esc_html_e('Economia', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('Completo', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('Premium', 'tema_aromas'); ?></span>
                            </div>
                            <div class="category-cta">
                                <a href="<?php echo esc_url(get_term_link('kits-especiais', 'product_cat')); ?>" class="btn-luxury">
                                    <?php esc_html_e('Ver Produtos', 'tema_aromas'); ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Lembrancinhas -->
                <article class="category-card luxury-card-hover" data-category="lembrancinhas">
                    <div class="category-card-inner">
                        <div class="category-image">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/categoria-lembrancinhas.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Lembrancinhas aromáticas para eventos', 'tema_aromas'); ?>" 
                                 loading="lazy"
                                 width="400" 
                                 height="300">
                            <div class="category-overlay">
                                <div class="category-icon">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="category-content">
                            <h2 class="category-title"><?php esc_html_e('Lembrancinhas', 'tema_aromas'); ?></h2>
                            <p class="category-description">
                                <?php esc_html_e('Pequenos presentes aromáticos para casamentos, aniversários e eventos especiais. Memórias olfativas inesquecíveis.', 'tema_aromas'); ?>
                            </p>
                            <div class="category-features">
                                <span class="feature-tag"><?php esc_html_e('Personalizável', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('Eventos', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('Especial', 'tema_aromas'); ?></span>
                            </div>
                            <div class="category-cta">
                                <a href="<?php echo esc_url(get_term_link('lembrancinhas', 'product_cat')); ?>" class="btn-luxury">
                                    <?php esc_html_e('Ver Produtos', 'tema_aromas'); ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Acessórios -->
                <article class="category-card luxury-card-hover" data-category="acessorios">
                    <div class="category-card-inner">
                        <div class="category-image">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/categoria-acessorios.jpg'); ?>" 
                                 alt="<?php esc_attr_e('Acessórios para aromaterapia', 'tema_aromas'); ?>" 
                                 loading="lazy"
                                 width="400" 
                                 height="300">
                            <div class="category-overlay">
                                <div class="category-icon">
                                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                        <path d="M9 12l2 2 4-4"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="category-content">
                            <h2 class="category-title"><?php esc_html_e('Acessórios', 'tema_aromas'); ?></h2>
                            <p class="category-description">
                                <?php esc_html_e('Complementos essenciais para sua experiência aromática: varetas, recipientes, suportes e muito mais.', 'tema_aromas'); ?>
                            </p>
                            <div class="category-features">
                                <span class="feature-tag"><?php esc_html_e('Essencial', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('Qualidade', 'tema_aromas'); ?></span>
                                <span class="feature-tag"><?php esc_html_e('Durável', 'tema_aromas'); ?></span>
                            </div>
                            <div class="category-cta">
                                <a href="<?php echo esc_url(get_term_link('acessorios', 'product_cat')); ?>" class="btn-luxury">
                                    <?php esc_html_e('Ver Produtos', 'tema_aromas'); ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12,5 19,12 12,19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="categories-cta-section luxury-section">
        <div class="container">
            <div class="cta-content text-center animate-fade-in-up">
                <h2 class="cta-title luxury-heading">
                    <?php esc_html_e('Não Encontrou o que Procura?', 'tema_aromas'); ?>
                </h2>
                <p class="cta-description">
                    <?php esc_html_e('Nossa equipe especializada está pronta para ajudar você a encontrar o aroma perfeito para cada momento e ambiente.', 'tema_aromas'); ?>
                </p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('fale-conosco'))); ?>" class="btn-luxury">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <?php esc_html_e('Fale Conosco', 'tema_aromas'); ?>
                    </a>
                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-luxury-outline">
                        <?php esc_html_e('Ver Toda Loja', 'tema_aromas'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
