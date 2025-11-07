<?php
/**
 * Template Name: Página Sobre os Aromas
 * Description: Página educativa sobre aromaterapia e nossos produtos.
 *
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<div class="luxury-container">
    <main id="main" class="site-main">
        <article id="page-sobre-aromas" class="page-content luxury-page">
            
            <!-- Simple Page Header -->
            <section class="page-header-section luxury-section">
                <div class="container">
                    <div class="page-header-content text-center animate-fade-in-up">
                        <h1 class="page-title luxury-heading">Nossos Aromas</h1>
                        <p class="page-subtitle">
                            Descubra nossa coleção exclusiva de fragrâncias naturais, cada uma criada para despertar sensações únicas
                        </p>
                    </div>
                </div>
            </section>

            <!-- Fragrance Selection Pills -->
            <section class="fragrance-pills-section">
                <div class="fragrance-pills-container">
                    <button class="fragrance-pill active" data-fragrance="flor-de-figo">Flor de Figo</button>
                    <button class="fragrance-pill" data-fragrance="cha-branco">Chá Branco</button>
                    <button class="fragrance-pill" data-fragrance="bamboo">Bamboo</button>
                    <button class="fragrance-pill" data-fragrance="marinho">Marinho</button>
                    <button class="fragrance-pill" data-fragrance="palo-santo">Palo Santo</button>
                </div>
            </section>

            <!-- Fragrance Accordion Section -->
            <section class="fragrance-accordion-section">
                <div class="fragrance-accordion-container">
                    
                    <!-- Flor de Figo -->
                    <div class="fragrance-accordion-item active" id="flor-de-figo">
                        <button class="fragrance-accordion-header" aria-expanded="true" aria-controls="flor-de-figo-content">
                            <h2>Flor de Figo</h2>
                            <svg class="accordion-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6,9 12,15 18,9"></polyline>
                                </svg>
                        </button>
                        <div id="flor-de-figo-content" class="fragrance-accordion-content" aria-hidden="false">
                            <div class="fragrance-content-grid">
                                <div class="fragrance-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/aroma-flor-de-figo.webp"
                                         alt="Flor de Figo Collection" loading="lazy" decoding="async">
                                </div>
                                <div class="fragrance-details">
                                    <div class="fragrance-notes">
                                        <div class="note-column">
                                            <h4>FAMILIA OLFATIVA</h4>
                                            <p>Frutado Adocicado</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS</h4>
                                            <p>Cassis, Toranja, Baunilha e Caramelo</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>PROJEÇÃO NO AMBIENTE</h4>
                                            <p>Forte</p>
                                        </div>
                                    </div>
                                    <div class="fragrance-description">
                                        <h4>Características</h4>
                                        <p>Sofisticado, marcante e acolhedor. Um floral frutado envolvente, que combina a doçura do figo com um toque de elegância.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                
                    <!-- Chá Branco -->
                    <div class="fragrance-accordion-item" id="cha-branco">
                        <button class="fragrance-accordion-header" aria-expanded="false" aria-controls="cha-branco-content">
                            <h2>Chá Branco</h2>
                            <svg class="accordion-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6,9 12,15 18,9"></polyline>
                            </svg>
                        </button>
                        <div id="cha-branco-content" class="fragrance-accordion-content" aria-hidden="true">
                            <div class="fragrance-content-grid">
                                <div class="fragrance-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/aroma-chá-branco.webp"
                                         alt="Chá Branco Collection" loading="lazy">
                                </div>
                                <div class="fragrance-details">
                                    <div class="fragrance-notes">
                                        <div class="note-column">
                                            <h4>FAMILIA OLFATIVA</h4>
                                            <p>Floral Cítrico</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS</h4>
                                            <p>Lima, Laranja, Chá Branco e Jasmin</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>PROJEÇÃO NO AMBIENTE</h4>
                                            <p>Suave</p>
                                        </div>
                                    </div>
                                    <div class="fragrance-description">
                                        <h4>Características</h4>
                                        <p>Leve, refrescante e delicado. Um aroma que traz clareza, paz e serenidade, ideal para criar uma atmosfera de leveza e de relaxamento.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bamboo -->
                    <div class="fragrance-accordion-item" id="bamboo">
                        <button class="fragrance-accordion-header" aria-expanded="false" aria-controls="bamboo-content">
                            <h2>Bamboo</h2>
                            <svg class="accordion-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6,9 12,15 18,9"></polyline>
                            </svg>
                        </button>
                        <div id="bamboo-content" class="fragrance-accordion-content" aria-hidden="true">
                            <div class="fragrance-content-grid">
                                <div class="fragrance-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/aroma-bamboo.webp"
                                         alt="Bamboo Collection" loading="lazy">
                                </div>
                                <div class="fragrance-details">
                                    <div class="fragrance-notes">
                                        <div class="note-column">
                                            <h4>FAMILIA OLFATIVA</h4>
                                            <p>Bamboo</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>LIMPEZA ENERGÉTICA</h4>
                                            <p>Verde, Natural e Reconfortante</p>
                                        </div>
                                    </div>
                                    <div class="fragrance-description">
                                        <h4>Características</h4>
                                        <p>Um aroma que remete à natureza viva, trazendo harmonia e equilíbrio para o ambiente.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Marinho -->
                    <div class="fragrance-accordion-item" id="marinho">
                        <button class="fragrance-accordion-header" aria-expanded="false" aria-controls="marinho-content">
                            <h2>Marinho</h2>
                            <svg class="accordion-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6,9 12,15 18,9"></polyline>
                            </svg>
                        </button>
                        <div id="marinho-content" class="fragrance-accordion-content" aria-hidden="true">
                            <div class="fragrance-content-grid">
                                <div class="fragrance-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/aroma-marinho.webp"
                                         alt="Marinho Collection" loading="lazy">
                                </div>
                                <div class="fragrance-details">
                                    <div class="fragrance-notes">
                                        <div class="note-column">
                                            <h4>FAMILIA OLFATIVA</h4>
                                            <p>Frescor Aquático</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS</h4>
                                            <p>Lima, Limão, Lavanda, Algas Marinhas</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>PROJEÇÃO NO AMBIENTE</h4>
                                            <p>Forte</p>
                                        </div>
                                    </div>
                                    <div class="fragrance-description">
                                        <h4>Características</h4>
                                        <p>Refrescante como a brisa do mar. Uma combinação que traz notas aquáticas e refrescantes, ideal para quem busca frescor com personalidade.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Palo Santo -->
                    <div class="fragrance-accordion-item" id="palo-santo">
                        <button class="fragrance-accordion-header" aria-expanded="false" aria-controls="palo-santo-content">
                            <h2>Palo Santo</h2>
                            <svg class="accordion-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6,9 12,15 18,9"></polyline>
                            </svg>
                        </button>
                        <div id="palo-santo-content" class="fragrance-accordion-content" aria-hidden="true">
                            <div class="fragrance-content-grid">
                                <div class="fragrance-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/aroma-palo-santo.webp"
                                         alt="Palo Santo Collection" loading="lazy">
                                </div>
                                <div class="fragrance-details">
                                    <div class="fragrance-notes">
                                        <div class="note-column">
                                            <h4>FAMILIA OLFATIVA</h4>
                                            <p>Amadeirado</p>
                                        </div>
                                    </div>
                                    <div class="fragrance-description">
                                        <h4>Características</h4>
                                        <p>O Palo Santo é uma madeira utilizada como incenso natural. Perfeito para meditação, alinhamento e purificação.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Call to Action -->
            <section class="content-section cta-section">
                <div class="cta-content">
                    <h2 class="luxury-heading cta-title">
                        <?php esc_html_e('Pronto para Transformar Seu Ambiente?', 'tema_aromas'); ?>
                    </h2>
                    <p class="cta-subtitle">
                        <?php esc_html_e('Explore nossa coleção completa de produtos aromáticos e encontre a fragrância perfeita para cada momento.', 'tema_aromas'); ?>
                    </p>
                    <div class="cta-buttons">
                        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-luxury btn-primary">
                            <?php esc_html_e('Ver Todos os Produtos', 'tema_aromas'); ?>
                        </a>
                        <a href="<?php 
                            $contato_page = get_page_by_path('fale-conosco');
                            if ($contato_page) {
                                echo esc_url(get_permalink($contato_page));
                            } else {
                                echo esc_url(home_url('/fale-conosco/'));
                            }
                        ?>" class="btn-luxury btn-secondary">
                            <?php esc_html_e('Fale Conosco', 'tema_aromas'); ?>
                        </a>
                    </div>
                </div>
            </section>

        </article>
    </main>
</div>

<?php get_footer(); ?>
