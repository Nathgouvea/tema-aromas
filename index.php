<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<div class="luxury-container">
    <div class="content-area">
        <section class="posts-section">
            <?php if (have_posts()) : ?>
                <header class="page-header">
                    <?php if (is_home() && !is_front_page()) : ?>
                        <h1 class="page-title luxury-heading"><?php single_post_title(); ?></h1>
                    <?php else : ?>
                        <h1 class="page-title luxury-heading"><?php esc_html_e('Blog', 'tema_aromas'); ?></h1>
                    <?php endif; ?>
                </header>

                <div class="posts-grid luxury-grid luxury-grid-2">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('luxury-card animate-fade-in-up'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
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
                                    <?php tema_aromas_post_meta(); ?>
                                </header>

                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>

                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="btn-luxury-outline">
                                        <?php esc_html_e('Leia mais', 'tema_aromas'); ?>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12,5 19,12 12,19"></polyline>
                                        </svg>
                                    </a>
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
                    <header class="page-header">
                        <h1 class="page-title luxury-heading"><?php esc_html_e('Nada encontrado', 'tema_aromas'); ?></h1>
                    </header>

                    <div class="page-content luxury-card">
                        <?php if (is_home() && current_user_can('publish_posts')) : ?>
                            <p>
                                <?php
                                printf(
                                    wp_kses(
                                        __('Pronto para publicar seu primeiro post? <a href="%1$s">Comece aqui</a>.', 'tema_aromas'),
                                        [
                                            'a' => [
                                                'href' => [],
                                            ],
                                        ]
                                    ),
                                    esc_url(admin_url('post-new.php'))
                                );
                                ?>
                            </p>
                        <?php elseif (is_search()) : ?>
                            <p><?php esc_html_e('Desculpe, mas nada foi encontrado para os termos de busca. Tente novamente com palavras-chave diferentes.', 'tema_aromas'); ?></p>
                            <?php get_search_form(); ?>
                        <?php else : ?>
                            <p><?php esc_html_e('Parece que não conseguimos encontrar o que você está procurando. Talvez a busca possa ajudar.', 'tema_aromas'); ?></p>
                            <?php get_search_form(); ?>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>
        </section>

        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>
