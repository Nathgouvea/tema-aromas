<?php
/**
 * Template for Checkout Page
 * 
 * This page uses the official WooCommerce checkout shortcode
 * Create a page called "Finalizar Compra" and assign this template
 * or add [woocommerce_checkout] shortcode to page content
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

            <!-- Checkout Progress Indicator -->
            <div class="checkout-progress">
                <div class="progress-step completed">
                    <div class="step-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 11l3 3L22 4"></path>
                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                        </svg>
                    </div>
                    <span class="step-label"><?php esc_html_e('Carrinho', 'tema_aromas'); ?></span>
                </div>
                <div class="progress-line completed"></div>
                <div class="progress-step active">
                    <div class="step-icon">
                        <span class="step-number">2</span>
                    </div>
                    <span class="step-label"><?php esc_html_e('Checkout', 'tema_aromas'); ?></span>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step">
                    <div class="step-icon">
                        <span class="step-number">3</span>
                    </div>
                    <span class="step-label"><?php esc_html_e('Concluído', 'tema_aromas'); ?></span>
                </div>
            </div>

            <div class="checkout-security-notice luxury-card">
                <div class="security-icons">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="security-icon">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <span class="security-text"><?php esc_html_e('Checkout 100% Seguro com SSL', 'tema_aromas'); ?></span>
                </div>
                <div class="payment-methods">
                    <small><?php esc_html_e('Aceitamos todos os cartões e PIX via Mercado Pago', 'tema_aromas'); ?></small>
                </div>
            </div>

            <div class="page-content">
                <?php
                // Use official WooCommerce checkout shortcode
                echo do_shortcode('[woocommerce_checkout]');
                ?>
            </div>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
