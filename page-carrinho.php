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
                <?php tema_aromas_breadcrumbs(); ?>
                <h1 class="page-title luxury-heading"><?php the_title(); ?></h1>
            </div>

            <div class="page-content">
                <?php
                // Use official WooCommerce cart shortcode
                echo do_shortcode('[woocommerce_cart]');
                ?>
            </div>

            <div class="cart-additional-info luxury-section">
                <div class="trust-indicators">
                    <div class="trust-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="trust-icon">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <span><?php esc_html_e('Compra Segura', 'tema_aromas'); ?></span>
                    </div>
                    <div class="trust-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="trust-icon">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span><?php esc_html_e('Frete Grátis acima de R$ 99', 'tema_aromas'); ?></span>
                    </div>
                    <div class="trust-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="trust-icon">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7,10 12,15 17,10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        <span><?php esc_html_e('Entrega Rápida', 'tema_aromas'); ?></span>
                    </div>
                </div>
            </div>

            <?php if (class_exists('WooCommerce')) : ?>
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
