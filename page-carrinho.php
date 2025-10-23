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

            <div class="page-content">
                <?php
                // Use official WooCommerce cart shortcode
                echo do_shortcode('[woocommerce_cart]');
                ?>
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
