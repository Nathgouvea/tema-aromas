<?php
/**
 * Template for My Account Page
 * 
 * This page uses the official WooCommerce my account shortcode
 * Create a page called "Minha Conta" and assign this template
 * or add [woocommerce_my_account] shortcode to page content
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
                <p class="page-subtitle"><?php esc_html_e('Gerencie suas informações pessoais, pedidos e preferências', 'tema_aromas'); ?></p>
            </div>

            <div class="page-content">
                <?php
                // Use official WooCommerce my account shortcode
                echo do_shortcode('[woocommerce_my_account]');
                ?>
            </div>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
