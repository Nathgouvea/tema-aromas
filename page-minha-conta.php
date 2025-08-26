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
                <?php tema_aromas_breadcrumbs(); ?>
                <h1 class="page-title luxury-heading"><?php the_title(); ?></h1>
                <p class="page-subtitle"><?php esc_html_e('Gerencie suas informações pessoais, pedidos e preferências', 'tema_aromas'); ?></p>
            </div>

            <?php if (!is_user_logged_in()) : ?>
                <div class="account-welcome luxury-card">
                    <h2 class="welcome-title"><?php esc_html_e('Bem-vindo à sua conta', 'tema_aromas'); ?></h2>
                    <p class="welcome-text">
                        <?php esc_html_e('Acesse sua conta para acompanhar pedidos, gerenciar informações pessoais e descobrir ofertas exclusivas.', 'tema_aromas'); ?>
                    </p>
                </div>
            <?php endif; ?>

            <div class="page-content">
                <?php
                // Use official WooCommerce my account shortcode
                echo do_shortcode('[woocommerce_my_account]');
                ?>
            </div>

            <?php if (is_user_logged_in()) : ?>
                <div class="account-benefits luxury-section">
                    <h3 class="benefits-title"><?php esc_html_e('Benefícios da sua conta', 'tema_aromas'); ?></h3>
                    <div class="benefits-grid">
                        <div class="benefit-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="benefit-icon">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22,4 12,14.01 9,11.01"></polyline>
                            </svg>
                            <div class="benefit-content">
                                <h4><?php esc_html_e('Pedidos Rápidos', 'tema_aromas'); ?></h4>
                                <p><?php esc_html_e('Dados salvos para compras mais ágeis', 'tema_aromas'); ?></p>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="benefit-icon">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <div class="benefit-content">
                                <h4><?php esc_html_e('Ofertas Exclusivas', 'tema_aromas'); ?></h4>
                                <p><?php esc_html_e('Promoções especiais para clientes cadastrados', 'tema_aromas'); ?></p>
                            </div>
                        </div>
                        <div class="benefit-item">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="benefit-icon">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="8.5" cy="7" r="4"></circle>
                                <polyline points="17,11 19,13 23,9"></polyline>
                            </svg>
                            <div class="benefit-content">
                                <h4><?php esc_html_e('Acompanhamento', 'tema_aromas'); ?></h4>
                                <p><?php esc_html_e('Rastreie seus pedidos em tempo real', 'tema_aromas'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
