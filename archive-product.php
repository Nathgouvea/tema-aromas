<?php
/**
 * The template for displaying product archives
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
                    <?php if (is_shop()) : ?>
                        <h1 class="page-title luxury-heading">
                            <?php esc_html_e('Nossa Loja', 'tema_aromas'); ?>
                        </h1>
                        <p class="page-subtitle">
                            <?php esc_html_e('Descubra nossa coleção completa de produtos aromáticos premium', 'tema_aromas'); ?>
                        </p>
                    <?php elseif (is_product_category()) : ?>
                        <h1 class="page-title luxury-heading">
                            <?php woocommerce_page_title(); ?>
                        </h1>
                        <?php if (category_description()) : ?>
                            <div class="category-description luxury-text">
                                <?php echo category_description(); ?>
                            </div>
                        <?php endif; ?>
                    <?php elseif (is_product_tag()) : ?>
                        <h1 class="page-title luxury-heading">
                            <?php esc_html_e('Produtos com a tag: ', 'tema_aromas'); ?>
                            <?php single_tag_title(); ?>
                        </h1>
                    <?php else : ?>
                        <h1 class="page-title luxury-heading">
                            <?php woocommerce_page_title(); ?>
                        </h1>
                    <?php endif; ?>
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

    </div>
</div>

<?php get_footer(); ?>
