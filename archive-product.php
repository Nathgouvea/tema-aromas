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
                        <?php
                        // Custom category descriptions
                        $category = get_queried_object();
                        $category_descriptions = array(
                            'aromatizadores' => 'Com alta projeção e longa duração, nossos aromatizadores transformam o seu ambiente, criando uma atmosfera envolvente e sofisticada. Escolha o aroma que mais combina com você e eleve sua experiência de bem-estar.',
                            'home-spray' => 'Com apenas algumas borrifadas, nossos Home Sprays perfumam instantaneamente o seu ambiente. Além disso, podem ser aplicados em tecidos, garantindo uma fixação prolongada da fragrância. Práticos e versáteis, eles transformam o ambiente em segundos.',
                            'velas-aromaticas' => 'Nossas velas aromáticas são produzidas com ingredientes 100% naturais. Com cera de coco e pavio de madeira, livres de parafinas, nossas velas foram cuidadosamente desenvolvidas para uma queima limpa e perfeita. Muito além de perfumar, elas criam uma atmosfera única, transformando qualquer instante em um momento de relaxamento, aconchego e conexão.',
                            'kits-especiais' => 'Nossos kits oferecem o melhor custo-benefício e são a escolha perfeita para você vivenciar a experiência completa de nossas fragrâncias. Além disso, tornam-se presentes memoráveis para qualquer ocasião.',
                            'lembrancinhas' => 'Lembrancinhas personalizadas para eventos ou brindes corporativos que encantam. Descubra nossas opções e surpreenda seus clientes ou convidados.',
                            'acessorios' => 'Nossos acessórios foram selecionados para complementar sua experiência com aromas. Cada peça é pensada para harmonizar com nossos produtos, tornando o uso mais prático, elegante e prazeroso.'
                        );

                        if (isset($category_descriptions[$category->slug])) :
                        ?>
                            <p class="page-subtitle category-subtitle">
                                <?php echo esc_html($category_descriptions[$category->slug]); ?>
                            </p>
                        <?php elseif (category_description()) : ?>
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

                    <!-- Empty Category Message -->
                    <div class="no-products-found luxury-card text-center">
                        <div class="no-products-content">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="no-products-icon">
                                <path d="M9 12l2 2 4-4"></path>
                                <path d="M21 12c.552 0 1-.448 1-1V5c0-.552-.448-1-1-1H3c-.552 0-1 .448-1 1v6c0 .552.448 1 1 1h18z"></path>
                                <path d="M3 12v6c0 .552.448 1 1 1h16c.552 0 1-.448 1-1v-6H3z"></path>
                            </svg>
                            <h3 class="no-products-title"><?php esc_html_e('Nenhum produto encontrado', 'tema_aromas'); ?></h3>
                            <p class="no-products-message">
                                <?php if (is_product_category()) : ?>
                                    <?php printf(esc_html__('Esta categoria ainda não possui produtos. Em breve teremos produtos incríveis em %s!', 'tema_aromas'), single_cat_title('', false)); ?>
                                <?php else : ?>
                                    <?php esc_html_e('Ainda não temos produtos disponíveis nesta seção. Em breve teremos novidades incríveis!', 'tema_aromas'); ?>
                                <?php endif; ?>
                            </p>
                            <div class="no-products-actions">
                                <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-luxury">
                                    <?php esc_html_e('Ver Todos os Produtos', 'tema_aromas'); ?>
                                </a>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('fale-conosco'))); ?>" class="btn-luxury-outline">
                                    <?php esc_html_e('Fale Conosco', 'tema_aromas'); ?>
                                </a>
                            </div>
                        </div>
                    </div>

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
