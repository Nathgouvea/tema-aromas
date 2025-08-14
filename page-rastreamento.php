<?php
/**
 * Template for Order Tracking Page
 * 
 * This page uses the official WooCommerce order tracking shortcode
 * Create a page called "Rastreamento de Pedido" and assign this template
 * or add [woocommerce_order_tracking] shortcode to page content
 * 
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main luxury-container" tabindex="-1">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="page-header luxury-section">
                <?php tema_aromas_breadcrumbs(); ?>
                <h1 class="page-title luxury-heading"><?php the_title(); ?></h1>
            </div>

            <div class="tracking-intro luxury-card">
                <h2 class="tracking-title"><?php esc_html_e('Acompanhe seu pedido', 'tema_aromas'); ?></h2>
                <p class="tracking-description">
                    <?php esc_html_e('Para rastrear seu pedido, insira o número do pedido e o email usado na compra nos campos abaixo.', 'tema_aromas'); ?>
                </p>
                <div class="tracking-help">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="help-icon">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M9,9a3,3,0,0,1,6,0c0,2-3,3-3,3"></path>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                    <small>
                        <?php esc_html_e('O número do pedido foi enviado por email após a confirmação da compra.', 'tema_aromas'); ?>
                    </small>
                </div>
            </div>

            <div class="page-content">
                <?php
                // Use official WooCommerce order tracking shortcode
                echo do_shortcode('[woocommerce_order_tracking]');
                ?>
            </div>

            <div class="tracking-additional-info luxury-section">
                <div class="info-cards">
                    <div class="info-card luxury-card">
                        <h3><?php esc_html_e('Precisa de ajuda?', 'tema_aromas'); ?></h3>
                        <p><?php esc_html_e('Entre em contato conosco se tiver dúvidas sobre seu pedido.', 'tema_aromas'); ?></p>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('fale-conosco'))); ?>" class="btn-luxury-outline">
                            <?php esc_html_e('Fale Conosco', 'tema_aromas'); ?>
                        </a>
                    </div>
                    <div class="info-card luxury-card">
                        <h3><?php esc_html_e('Tempo de Entrega', 'tema_aromas'); ?></h3>
                        <ul class="delivery-times">
                            <li><?php esc_html_e('Região Metropolitana: 2-4 dias úteis', 'tema_aromas'); ?></li>
                            <li><?php esc_html_e('Interior SP: 3-6 dias úteis', 'tema_aromas'); ?></li>
                            <li><?php esc_html_e('Outros Estados: 5-10 dias úteis', 'tema_aromas'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
