<?php
/**
 * Template for Order Tracking Page
 *
 * @package TemaAromas
 * @version 2.0.0
 */

get_header(); ?>

<main id="main" class="site-main luxury-container page-rastreamento" tabindex="-1">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="page-header luxury-section">
                <h1 class="page-title luxury-heading"><?php the_title(); ?></h1>
            </div>

            <div class="tracking-page-layout">
                <!-- Tracking Form -->
                <div class="tracking-form-section">
                    <div class="tracking-form-card">
                        <div class="tracking-form-header">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <rect x="1" y="3" width="15" height="13"></rect>
                                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                                <circle cx="18.5" cy="18.5" r="2.5"></circle>
                            </svg>
                            <h2><?php esc_html_e('Rastrear pedido', 'tema_aromas'); ?></h2>
                        </div>
                        <p class="tracking-form-description">
                            <?php esc_html_e('Insira o número do pedido e o email usado na compra.', 'tema_aromas'); ?>
                        </p>

                        <?php echo do_shortcode('[woocommerce_order_tracking]'); ?>
                    </div>
                </div>

                <!-- Info Sidebar -->
                <div class="tracking-info-sidebar">
                    <div class="tracking-info-card">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="16" x2="12" y2="12"></line>
                            <line x1="12" y1="8" x2="12.01" y2="8"></line>
                        </svg>
                        <div>
                            <h3><?php esc_html_e('Sobre a entrega', 'tema_aromas'); ?></h3>
                            <p><?php esc_html_e('As entregas são realizadas pelos Correios (via Melhor Envio). O prazo de entrega pode variar de acordo com a modalidade escolhida e a região de destino.', 'tema_aromas'); ?></p>
                        </div>
                    </div>

                    <div class="tracking-info-card">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <div>
                            <h3><?php esc_html_e('Onde encontro o número do pedido?', 'tema_aromas'); ?></h3>
                            <p><?php esc_html_e('O número do pedido foi enviado para o seu email após a confirmação da compra. Verifique também a pasta de spam.', 'tema_aromas'); ?></p>
                        </div>
                    </div>

                    <div class="tracking-info-card">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <div>
                            <h3><?php esc_html_e('Precisa de ajuda?', 'tema_aromas'); ?></h3>
                            <p>
                                <?php
                                printf(
                                    wp_kses(
                                        __('Entre em contato pelo <a href="%s">WhatsApp (16) 99162-6921</a> ou por email <a href="%s">secretszen888@gmail.com</a>.', 'tema_aromas'),
                                        array('a' => array('href' => array()))
                                    ),
                                    esc_url('https://wa.me/5516991626921'),
                                    esc_url('mailto:secretszen888@gmail.com')
                                );
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
