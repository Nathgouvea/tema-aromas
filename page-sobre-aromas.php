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
            
            <!-- Hero Section -->
            <section class="hero-section sobre-hero">
                <div class="hero-content">
                    <h1 class="luxury-heading hero-title">
                        <?php esc_html_e('Sobre os Aromas', 'tema_aromas'); ?>
                    </h1>
                    <p class="hero-subtitle">
                        <?php esc_html_e('Descubra o mundo encantador da aromaterapia e como nossos produtos podem transformar seu ambiente e bem-estar.', 'tema_aromas'); ?>
                    </p>
                </div>
                <div class="hero-decoration">
                    <svg class="aroma-wave" viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0,100 Q100,50 200,100 T400,100 L400,200 L0,200 Z" fill="url(#aromaGradient)" opacity="0.1"/>
                        <defs>
                            <linearGradient id="aromaGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" style="stop-color:var(--cor-primaria);stop-opacity:1" />
                                <stop offset="100%" style="stop-color:var(--cor-accent);stop-opacity:1" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </section>

            <!-- Introdução à Aromaterapia -->
            <section class="content-section aromaterapia-intro">
                <div class="section-header">
                    <h2 class="luxury-heading section-title">
                        <?php esc_html_e('O Que é Aromaterapia?', 'tema_aromas'); ?>
                    </h2>
                </div>
                
                <div class="content-grid">
                    <div class="content-text">
                        <p>
                            <?php esc_html_e('A aromaterapia é uma prática terapêutica milenar que utiliza óleos essenciais extraídos de plantas aromáticas para promover o bem-estar físico, mental e emocional. Cada aroma possui propriedades únicas que podem influenciar positivamente nosso humor, energia e qualidade de vida.', 'tema_aromas'); ?>
                        </p>
                        
                        <p>
                            <?php esc_html_e('Na Zen Secrets, acreditamos no poder transformador dos aromas naturais. Nossos produtos são cuidadosamente selecionados e desenvolvidos para proporcionar experiências aromáticas autênticas e benéficas para sua casa e escritório.', 'tema_aromas'); ?>
                        </p>
                    </div>
                    
                    <div class="benefits-grid">
                        <div class="benefit-card animate-fade-in-up">
                            <div class="benefit-icon">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                                    <circle cx="12" cy="9" r="2.5"/>
                                </svg>
                            </div>
                            <h3><?php esc_html_e('Relaxamento', 'tema_aromas'); ?></h3>
                            <p><?php esc_html_e('Reduz o estresse e promove tranquilidade', 'tema_aromas'); ?></p>
                        </div>
                        
                        <div class="benefit-card animate-fade-in-up">
                            <div class="benefit-icon">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/>
                                    <polyline points="14,2 14,8 20,8"/>
                                    <line x1="16" y1="13" x2="8" y2="13"/>
                                    <line x1="16" y1="17" x2="8" y2="17"/>
                                    <polyline points="10,9 9,9 8,9"/>
                                </svg>
                            </div>
                            <h3><?php esc_html_e('Concentração', 'tema_aromas'); ?></h3>
                            <p><?php esc_html_e('Melhora o foco e produtividade', 'tema_aromas'); ?></p>
                        </div>
                        
                        <div class="benefit-card animate-fade-in-up">
                            <div class="benefit-icon">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                                    <polyline points="9,22 9,12 15,12 15,22"/>
                                </svg>
                            </div>
                            <h3><?php esc_html_e('Ambiente', 'tema_aromas'); ?></h3>
                            <p><?php esc_html_e('Transforma espaços em refúgios acolhedores', 'tema_aromas'); ?></p>
                        </div>
                        
                        <div class="benefit-card animate-fade-in-up">
                            <div class="benefit-icon">
                                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                                </svg>
                            </div>
                            <h3><?php esc_html_e('Bem-estar', 'tema_aromas'); ?></h3>
                            <p><?php esc_html_e('Promove equilíbrio emocional e harmonia', 'tema_aromas'); ?></p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Nossos Produtos -->
            <section class="content-section produtos-destaque">
                <div class="section-header">
                    <h2 class="luxury-heading section-title">
                        <?php esc_html_e('Nossos Produtos', 'tema_aromas'); ?>
                    </h2>
                    <p class="section-subtitle">
                        <?php esc_html_e('Cada categoria foi pensada para atender diferentes necessidades e momentos do seu dia.', 'tema_aromas'); ?>
                    </p>
                </div>
                
                <div class="produtos-grid">
                    <div class="produto-highlight animate-fade-in-up">
                        <div class="produto-icon">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <circle cx="12" cy="8" r="6"/>
                                <path d="M12 14v7"/>
                                <path d="M8 18h8"/>
                            </svg>
                        </div>
                        <h3><?php esc_html_e('Aromatizadores', 'tema_aromas'); ?></h3>
                        <p><?php esc_html_e('Difusores ultrassônicos e elétricos que dispersam fragrâncias de forma contínua e suave, criando uma atmosfera perfeita para qualquer ambiente.', 'tema_aromas'); ?></p>
                        <a href="<?php echo esc_url(get_term_link('aromatizadores', 'product_cat')); ?>" class="btn-luxury">
                            <?php esc_html_e('Ver Aromatizadores', 'tema_aromas'); ?>
                        </a>
                    </div>
                    
                    <div class="produto-highlight animate-fade-in-up">
                        <div class="produto-icon">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M7 18v-2a4 4 0 0 1 4-4v0a4 4 0 0 1 4 4v2"/>
                                <circle cx="12" cy="6" r="4"/>
                                <path d="M12 14v4"/>
                                <path d="M8 18h8"/>
                            </svg>
                        </div>
                        <h3><?php esc_html_e('Home Sprays', 'tema_aromas'); ?></h3>
                        <p><?php esc_html_e('Sprays aromáticos para perfumar instantaneamente qualquer espaço. Ideais para uso rápido em tecidos, ar e ambientes.', 'tema_aromas'); ?></p>
                        <a href="<?php echo esc_url(get_term_link('home-spray', 'product_cat')); ?>" class="btn-luxury">
                            <?php esc_html_e('Ver Home Sprays', 'tema_aromas'); ?>
                        </a>
                    </div>
                    
                    <div class="produto-highlight animate-fade-in-up">
                        <div class="produto-icon">
                            <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M12 2L15 8h6l-5 4 2 6-6-4-6 4 2-6-5-4h6z"/>
                            </svg>
                        </div>
                        <h3><?php esc_html_e('Velas Aromáticas', 'tema_aromas'); ?></h3>
                        <p><?php esc_html_e('Velas artesanais de cera natural com aromas exclusivos. Combinam a magia da luz suave com fragrâncias envolventes.', 'tema_aromas'); ?></p>
                        <a href="<?php echo esc_url(get_term_link('velas-aromaticas', 'product_cat')); ?>" class="btn-luxury">
                            <?php esc_html_e('Ver Velas', 'tema_aromas'); ?>
                        </a>
                    </div>
                </div>
            </section>

            <!-- FAQ Section -->
            <section class="content-section faq-section">
                <div class="section-header">
                    <h2 class="luxury-heading section-title">
                        <?php esc_html_e('Perguntas Frequentes', 'tema_aromas'); ?>
                    </h2>
                    <p class="section-subtitle">
                        <?php esc_html_e('Tire suas dúvidas sobre aromaterapia e nossos produtos.', 'tema_aromas'); ?>
                    </p>
                </div>
                
                <div class="faq-container">
                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false" aria-controls="faq-1">
                            <span><?php esc_html_e('Como escolher o aroma ideal para cada ambiente?', 'tema_aromas'); ?></span>
                            <svg class="faq-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6,9 12,15 18,9"></polyline>
                            </svg>
                        </button>
                        <div id="faq-1" class="faq-answer" aria-hidden="true">
                            <p><?php esc_html_e('Para sala de estar, prefira aromas suaves como lavanda ou vanilla. Para escritório, use hortelã ou eucalipto para concentração. Para quarto, opte por camomila ou bergamota para relaxamento.', 'tema_aromas'); ?></p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false" aria-controls="faq-2">
                            <span><?php esc_html_e('Quanto tempo dura o efeito dos aromatizadores?', 'tema_aromas'); ?></span>
                            <svg class="faq-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6,9 12,15 18,9"></polyline>
                            </svg>
                        </button>
                        <div id="faq-2" class="faq-answer" aria-hidden="true">
                            <p><?php esc_html_e('Nossos aromatizadores funcionam continuamente por 6-8 horas. O aroma permanece no ambiente por até 24 horas, dependendo do tamanho do espaço e ventilação.', 'tema_aromas'); ?></p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false" aria-controls="faq-3">
                            <span><?php esc_html_e('Os produtos são seguros para pets e crianças?', 'tema_aromas'); ?></span>
                            <svg class="faq-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6,9 12,15 18,9"></polyline>
                            </svg>
                        </button>
                        <div id="faq-3" class="faq-answer" aria-hidden="true">
                            <p><?php esc_html_e('Sim, todos nossos produtos utilizam óleos essenciais naturais e são seguros quando usados conforme instruções. Evite aplicação direta em pets e mantenha fora do alcance de crianças pequenas.', 'tema_aromas'); ?></p>
                        </div>
                    </div>
                    
                    <div class="faq-item">
                        <button class="faq-question" aria-expanded="false" aria-controls="faq-4">
                            <span><?php esc_html_e('Como manter e limpar os aromatizadores?', 'tema_aromas'); ?></span>
                            <svg class="faq-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6,9 12,15 18,9"></polyline>
                            </svg>
                        </button>
                        <div id="faq-4" class="faq-answer" aria-hidden="true">
                            <p><?php esc_html_e('Limpe semanalmente com água morna e sabão neutro. Para aromatizadores elétricos, desligue antes da limpeza. Substitua os refis quando a fragrância diminuir.', 'tema_aromas'); ?></p>
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
