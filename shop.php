<?php
/**
 * The template for displaying shop page
 *
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<div class="luxury-container">
    <div class="content-area">
        
        <!-- Page Header -->
        <section class="page-header-section luxury-section">
            <div class="container">
                <?php tema_aromas_breadcrumbs(); ?>
                <div class="page-header-content text-center animate-fade-in-up">
                    <h1 class="page-title luxury-heading">
                        <?php esc_html_e('Nossa Loja', 'tema_aromas'); ?>
                    </h1>
                    <p class="page-subtitle">
                        <?php esc_html_e('Descubra nossa coleção completa de produtos aromáticos premium', 'tema_aromas'); ?>
                    </p>
                </div>
            </div>
        </section>

        <!-- Trust Indicators -->
        <section class="trust-indicators-premium">
            <div class="container">
                <div class="trust-grid">
                    <div class="trust-item">
                        <div class="trust-icon payment">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                                <line x1="1" y1="10" x2="23" y2="10"></line>
                            </svg>
                        </div>
                        <h3>Pagamento Facilitado</h3>
                        <p>Cartão, Pix e Boleto Bancário</p>
                    </div>

                    <div class="trust-item">
                        <div class="trust-icon shipping">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                <polyline points="3.27,6.96 12,12.01 20.73,6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                        </div>
                        <h3>Envio para todo Brasil</h3>
                        <p>Rastreamento disponível</p>
                    </div>

                    <div class="trust-item contact-highlight">
                        <div class="trust-icon whatsapp">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.686"/>
                            </svg>
                        </div>
                        <h3>Ficou em dúvida?</h3>
                        <p>Chama no WhatsApp</p>
                        <a href="https://wa.me/5516991626921" class="whatsapp-btn">
                            (16) 99162-6921
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Products Section -->
        <section class="products-archive-section luxury-section">
            <div class="container">
                
                <?php if (woocommerce_product_loop()) : ?>
                    
                    <?php
                    /**
                     * Hook: woocommerce_before_shop_loop.
                     *
                     * @hooked woocommerce_output_all_notices - 10
                     * @hooked woocommerce_result_count - 20
                     * @hooked woocommerce_catalog_ordering - 30
                     */
                    do_action('woocommerce_before_shop_loop');
                    ?>

                    <div class="woocommerce-products-header">
                        <?php if (woocommerce_products_will_display()) : ?>
                            <div class="woocommerce-result-count">
                                <?php woocommerce_result_count(); ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (woocommerce_products_will_display()) : ?>
                            <div class="woocommerce-ordering">
                                <?php woocommerce_catalog_ordering(); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php woocommerce_product_loop_start(); ?>

                    <?php if (wc_get_loop_prop('is_shortcode')) : ?>
                        <?php $columns = absint(wc_get_loop_prop('columns')); ?>
                        <?php woocommerce_product_subcategories(); ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php wc_get_template_part('content', 'product'); ?>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <?php woocommerce_product_subcategories(); ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php wc_get_template_part('content', 'product'); ?>
                        <?php endwhile; ?>
                    <?php endif; ?>

                    <?php woocommerce_product_loop_end(); ?>

                    <?php
                    /**
                     * Hook: woocommerce_after_shop_loop.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action('woocommerce_after_shop_loop');
                    ?>

                <?php else : ?>

                    <?php
                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action('woocommerce_no_products_found');
                    ?>

                <?php endif; ?>

            </div>
        </section>

        <!-- Call to Action Section -->
        <section class="shop-cta-section luxury-section">
            <div class="container">
                <div class="cta-content text-center animate-fade-in-up">
                    <h2 class="cta-title luxury-heading">
                        <?php esc_html_e('Não Encontrou o que Procura?', 'tema_aromas'); ?>
                    </h2>
                    <p class="cta-description">
                        <?php esc_html_e('Nossa equipe especializada está pronta para ajudar você a encontrar o aroma perfeito para cada momento e ambiente.', 'tema_aromas'); ?>
                    </p>
                    <div class="cta-buttons">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('fale-conosco'))); ?>" class="btn-luxury">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <?php esc_html_e('Fale Conosco', 'tema_aromas'); ?>
                        </a>
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('categorias'))); ?>" class="btn-luxury-outline">
                            <?php esc_html_e('Ver Categorias', 'tema_aromas'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>

<?php get_footer(); ?>
