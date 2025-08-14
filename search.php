<?php
/**
 * The template for displaying search results pages
 *
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<div class="luxury-container">
    <div class="content-area">
        <header class="page-header">
            <?php
            // Breadcrumbs
            tema_aromas_breadcrumbs();
            ?>

            <h1 class="page-title luxury-heading">
                <?php
                printf(
                    esc_html__('Resultados da busca por: %s', 'tema_aromas'),
                    '<span class="search-term">' . get_search_query() . '</span>'
                );
                ?>
            </h1>

            <?php if (have_posts()) : ?>
                <p class="search-results-count">
                    <?php
                    global $wp_query;
                    printf(
                        esc_html(_n(
                            'Encontrado %s resultado',
                            'Encontrados %s resultados',
                            $wp_query->found_posts,
                            'tema_aromas'
                        )),
                        '<strong>' . number_format_i18n($wp_query->found_posts) . '</strong>'
                    );
                    ?>
                </p>
            <?php endif; ?>

            <!-- Search form for refinement -->
            <div class="search-refinement">
                <?php get_search_form(); ?>
            </div>
        </header>

        <?php if (have_posts()) : ?>
            <!-- Filter results if WooCommerce is active -->
            <?php if (class_exists('WooCommerce')) : ?>
                <div class="search-filters">
                    <div class="filter-tabs" role="tablist">
                        <button class="filter-tab active" data-filter="all" role="tab" aria-selected="true">
                            <?php esc_html_e('Todos', 'tema_aromas'); ?>
                        </button>
                        <button class="filter-tab" data-filter="product" role="tab" aria-selected="false">
                            <?php esc_html_e('Produtos', 'tema_aromas'); ?>
                        </button>
                        <button class="filter-tab" data-filter="post" role="tab" aria-selected="false">
                            <?php esc_html_e('Blog', 'tema_aromas'); ?>
                        </button>
                        <button class="filter-tab" data-filter="page" role="tab" aria-selected="false">
                            <?php esc_html_e('Páginas', 'tema_aromas'); ?>
                        </button>
                    </div>
                </div>
            <?php endif; ?>

            <div class="search-results">
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $post_type = get_post_type();
                    $result_class = 'search-result luxury-card animate-fade-in-up';
                    $result_class .= ' result-type-' . $post_type;
                    ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class($result_class); ?>>
                        <!-- Result Type Badge -->
                        <div class="result-type-badge">
                            <?php
                            switch ($post_type) {
                                case 'product':
                                    echo '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>';
                                    esc_html_e('Produto', 'tema_aromas');
                                    break;
                                case 'post':
                                    echo '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"></path><polyline points="14,2 14,8 20,8"></polyline></svg>';
                                    esc_html_e('Blog', 'tema_aromas');
                                    break;
                                case 'page':
                                    echo '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>';
                                    esc_html_e('Página', 'tema_aromas');
                                    break;
                                default:
                                    echo '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="6" x2="12" y2="12"></line><line x1="16.24" y1="16.24" x2="12" y2="12"></line></svg>';
                                    echo esc_html(ucfirst($post_type));
                                    break;
                            }
                            ?>
                        </div>

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="result-thumbnail">
                                <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                                    <?php the_post_thumbnail('medium', [
                                        'loading' => 'lazy',
                                        'alt' => get_the_title(),
                                    ]); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="luxury-card-content">
                            <header class="entry-header">
                                <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
                                
                                <?php if ($post_type === 'product' && class_exists('WooCommerce')) : ?>
                                    <!-- Product Price -->
                                    <?php
                                    $product = wc_get_product(get_the_ID());
                                    if ($product) :
                                    ?>
                                        <div class="product-price">
                                            <?php echo $product->get_price_html(); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php elseif ($post_type === 'post') : ?>
                                    <!-- Post Meta -->
                                    <div class="entry-meta">
                                        <?php tema_aromas_post_meta(); ?>
                                    </div>
                                <?php endif; ?>
                            </header>

                            <div class="entry-summary">
                                <?php
                                // Highlight search terms in excerpt
                                $excerpt = get_the_excerpt();
                                $search_query = get_search_query();
                                if ($search_query && $excerpt) {
                                    $highlighted_excerpt = preg_replace(
                                        '/(' . preg_quote($search_query, '/') . ')/i',
                                        '<mark>$1</mark>',
                                        $excerpt
                                    );
                                    echo wp_kses_post($highlighted_excerpt);
                                } else {
                                    the_excerpt();
                                }
                                ?>
                            </div>

                            <footer class="entry-footer">
                                <?php if ($post_type === 'product' && class_exists('WooCommerce')) : ?>
                                    <a href="<?php the_permalink(); ?>" class="btn-luxury">
                                        <?php esc_html_e('Ver produto', 'tema_aromas'); ?>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <circle cx="9" cy="21" r="1"></circle>
                                            <circle cx="20" cy="21" r="1"></circle>
                                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                        </svg>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>" class="btn-luxury-outline">
                                        <?php esc_html_e('Leia mais', 'tema_aromas'); ?>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12,5 19,12 12,19"></polyline>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            // Pagination
            the_posts_pagination([
                'mid_size' => 2,
                'prev_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15,18 9,12 15,6"></polyline></svg>' . esc_html__('Anterior', 'tema_aromas'),
                'next_text' => esc_html__('Próximo', 'tema_aromas') . '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9,6 15,12 9,18"></polyline></svg>',
                'class' => 'luxury-pagination',
            ]);
            ?>

        <?php else : ?>
            <section class="no-results not-found">
                <div class="page-content luxury-card">
                    <p><?php esc_html_e('Desculpe, mas nada foi encontrado para os termos de busca. Tente novamente com palavras-chave diferentes.', 'tema_aromas'); ?></p>
                    
                    <!-- Suggest popular searches -->
                    <div class="search-suggestions">
                        <h3><?php esc_html_e('Sugestões de busca:', 'tema_aromas'); ?></h3>
                        <ul class="suggestion-list">
                            <li><a href="<?php echo esc_url(home_url('/?s=aromatizador')); ?>"><?php esc_html_e('Aromatizador', 'tema_aromas'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/?s=vela')); ?>"><?php esc_html_e('Velas', 'tema_aromas'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/?s=home+spray')); ?>"><?php esc_html_e('Home Spray', 'tema_aromas'); ?></a></li>
                            <li><a href="<?php echo esc_url(home_url('/?s=kit')); ?>"><?php esc_html_e('Kits', 'tema_aromas'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
