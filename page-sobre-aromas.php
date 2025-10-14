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
            
            <!-- Hero Section with Product Background -->
            <section class="aromas-hero-modern">
                <div class="aromas-hero-background">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Foto-tela-inicial-.webp" 
                         alt="Nossos Aromas Zen Secrets" class="hero-bg-image">
                    <div class="hero-overlay"></div>
                </div>
                <div class="aromas-hero-content">
                    <h1 class="aromas-hero-title">Nossos Aromas</h1>
                    <p class="aromas-hero-subtitle">
                        Descubra nossa coleção exclusiva de fragrâncias naturais, cada uma criada para despertar sensações únicas
                    </p>
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
                                            <h4>NOTAS DE TOPO</h4>
                                            <p>Bergamota, Limão Siciliano</p>
                            </div>
                                        <div class="note-column">
                                            <h4>NOTAS DE CORAÇÃO</h4>
                                            <p>Flor de Figo, Jasmim, Lírio</p>
                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS DE FUNDO</h4>
                                            <p>Âmbar, Almíscar, Madeira</p>
                            </div>
                        </div>
                                    <div class="fragrance-description">
                                        <h4>Características</h4>
                                        <p>Uma fragrância sofisticada que combina a doçura da flor de figo com notas cítricas e florais. Perfeita para criar um ambiente elegante e acolhedor.</p>
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
                                            <h4>NOTAS DE TOPO</h4>
                                            <p>Limão, Bergamota, Folhas Verdes</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS DE CORAÇÃO</h4>
                                            <p>Chá Branco, Jasmim, Muguet</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS DE FUNDO</h4>
                                            <p>Almíscar, Cedro, Âmbar</p>
                                        </div>
                                    </div>
                                    <div class="fragrance-description">
                                        <h4>Características</h4>
                                        <p>Uma fragrância delicada e purificante que traz a serenidade do chá branco. Ideal para momentos de relaxamento e contemplação.</p>
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
                                            <h4>NOTAS DE TOPO</h4>
                                            <p>Folhas de Bambu, Cítricos Verdes</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS DE CORAÇÃO</h4>
                                            <p>Lírio do Vale, Folhas Verdes</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS DE FUNDO</h4>
                                            <p>Madeira de Bambu, Almíscar</p>
                                        </div>
                                    </div>
                                    <div class="fragrance-description">
                                        <h4>Características</h4>
                                        <p>Uma fragrância fresca e natural que evoca a tranquilidade da natureza. Perfeita para purificar o ambiente e trazer sensação de paz.</p>
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
                                            <h4>NOTAS DE TOPO</h4>
                                            <p>Brisa Marinha, Sal Marinho</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS DE CORAÇÃO</h4>
                                            <p>Algas Marinhas, Lavanda</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS DE FUNDO</h4>
                                            <p>Driftwood, Almíscar Aquático</p>
                                        </div>
                                    </div>
                                    <div class="fragrance-description">
                                        <h4>Características</h4>
                                        <p>Uma fragrância refrescante que traz a essência do oceano para seu ambiente. Ideal para criar uma atmosfera revigorante e energizante.</p>
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
                                            <h4>NOTAS DE TOPO</h4>
                                            <p>Palo Santo, Cítricos</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS DE CORAÇÃO</h4>
                                            <p>Madeira Sagrada, Especiarias</p>
                                        </div>
                                        <div class="note-column">
                                            <h4>NOTAS DE FUNDO</h4>
                                            <p>Resinas, Sândalo, Incenso</p>
                                        </div>
                                    </div>
                                    <div class="fragrance-description">
                                        <h4>Características</h4>
                                        <p>Uma fragrância mística e purificadora que conecta com a espiritualidade. Tradicionalmente usada para limpeza energética e meditação.</p>
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
