<?php
/**
 * Template Name: Rastreamento de Pedido
 * Template for Order Tracking Page
 *
 * Delivery is handled by Correios via Melhor Envio.
 * This page directs customers to track via Correios website.
 *
 * @package TemaAromas
 * @version 3.0.0
 */

get_header(); ?>

<main id="main" class="site-main luxury-container page-rastreamento" tabindex="-1">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="page-header luxury-section">
                <h1 class="page-title luxury-heading"><?php the_title(); ?></h1>
            </div>

            <div class="tracking-content">
                <!-- Main Info -->
                <div class="tracking-hero">
                    <div class="tracking-hero-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                            <rect x="1" y="3" width="15" height="13"></rect>
                            <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>
                    </div>
                    <h2><?php esc_html_e('Como rastrear seu pedido', 'tema_aromas'); ?></h2>
                    <p><?php esc_html_e('As entregas são realizadas pelos Correios através do Melhor Envio. Para rastrear seu pedido, utilize o código de rastreamento enviado por email.', 'tema_aromas'); ?></p>
                </div>

                <!-- Steps -->
                <div class="tracking-steps">
                    <div class="tracking-step">
                        <div class="tracking-step-number">1</div>
                        <div class="tracking-step-content">
                            <h3><?php esc_html_e('Encontre seu código de rastreamento', 'tema_aromas'); ?></h3>
                            <p><?php esc_html_e('Após o envio do pedido, você receberá um email com o código de rastreamento dos Correios. Verifique também a pasta de spam.', 'tema_aromas'); ?></p>
                        </div>
                    </div>
                    <div class="tracking-step">
                        <div class="tracking-step-number">2</div>
                        <div class="tracking-step-content">
                            <h3><?php esc_html_e('Acesse o site dos Correios', 'tema_aromas'); ?></h3>
                            <p><?php esc_html_e('Clique no botão abaixo para acessar o rastreamento oficial dos Correios e insira o código recebido.', 'tema_aromas'); ?></p>
                        </div>
                    </div>
                    <div class="tracking-step">
                        <div class="tracking-step-number">3</div>
                        <div class="tracking-step-content">
                            <h3><?php esc_html_e('Acompanhe a entrega', 'tema_aromas'); ?></h3>
                            <p><?php esc_html_e('O status será atualizado a cada movimentação do pacote. O prazo varia conforme a modalidade (PAC ou Sedex) e a região.', 'tema_aromas'); ?></p>
                        </div>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="tracking-cta">
                    <a href="https://www.correios.com.br/rastreamento" target="_blank" rel="noopener noreferrer" class="tracking-cta-button">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <?php esc_html_e('Rastrear nos Correios', 'tema_aromas'); ?>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" class="external-icon">
                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                            <polyline points="15 3 21 3 21 9"></polyline>
                            <line x1="10" y1="14" x2="21" y2="3"></line>
                        </svg>
                    </a>
                </div>

                <!-- Help Card -->
                <div class="tracking-help-card">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <div>
                        <h3><?php esc_html_e('Não recebeu o código de rastreamento?', 'tema_aromas'); ?></h3>
                        <p>
                            <?php
                            printf(
                                wp_kses(
                                    __('Entre em contato pelo <a href="%s">WhatsApp (16) 99162-6921</a> ou por email <a href="%s">zensecrets.suporte@gmail.com</a> e enviaremos o código para você.', 'tema_aromas'),
                                    array('a' => array('href' => array()))
                                ),
                                esc_url('https://wa.me/5516991626921'),
                                esc_url('mailto:zensecrets.suporte@gmail.com')
                            );
                            ?>
                        </p>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
