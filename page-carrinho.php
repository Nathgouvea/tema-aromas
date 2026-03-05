<?php
/**
 * Template for Cart Page
 * 
 * This page uses the official WooCommerce cart shortcode
 * Create a page called "Carrinho" and assign this template
 * or add [woocommerce_cart] shortcode to page content
 * 
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main luxury-container" tabindex="-1">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="page-header luxury-section">
                <h1 class="page-title luxury-heading"><?php the_title(); ?></h1>
            </div>

            <!-- Checkout Progress Indicator -->
            <div class="checkout-progress">
                <div class="progress-step active">
                    <div class="step-icon">
                        <span class="step-number">1</span>
                    </div>
                    <span class="step-label"><?php esc_html_e('Carrinho', 'tema_aromas'); ?></span>
                </div>
                <div class="progress-line"></div>
                <div class="progress-step">
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

            <div class="page-content">
                <?php if (class_exists('WooCommerce') && WC()->cart->is_empty()) : ?>
                    <div class="cart-empty-state">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="cart-empty-icon" aria-hidden="true">
                            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <path d="M16 10a4 4 0 0 1-8 0"></path>
                        </svg>
                        <h2 class="cart-empty-title"><?php esc_html_e('Seu carrinho está vazio', 'tema_aromas'); ?></h2>
                        <p class="cart-empty-message"><?php esc_html_e('Explore nossa coleção de aromas premium e encontre o aroma perfeito para você.', 'tema_aromas'); ?></p>
                        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-luxury">
                            <?php esc_html_e('Explorar Produtos', 'tema_aromas'); ?>
                        </a>
                    </div>
                <?php else : ?>
                    <?php echo do_shortcode('[woocommerce_cart]'); ?>
                <?php endif; ?>
            </div>

            <?php if (class_exists('WooCommerce') && !WC()->cart->is_empty()) : ?>
                <div class="continue-shopping luxury-section">
                    <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-luxury-outline">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <polyline points="15,18 9,12 15,6"></polyline>
                        </svg>
                        <?php esc_html_e('Continuar Comprando', 'tema_aromas'); ?>
                    </a>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
