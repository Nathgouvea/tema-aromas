<?php
/**
 * The template for displaying archive pages
 *
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<div class="luxury-container">
    <div class="content-area">
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <?php
                // Breadcrumbs
                tema_aromas_breadcrumbs();

                // Archive title
                the_archive_title('<h1 class="page-title luxury-heading">', '</h1>');
                
                // Archive description
                the_archive_description('<div class="archive-description luxury-text">', '</div>');
                ?>
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
                                <?php if (is_category() || is_tag()) : ?>
                                    <?php tema_aromas_post_categories(); ?>
                                <?php endif; ?>

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
                    <p><?php esc_html_e('Parece que não conseguimos encontrar o que você está procurando. Talvez a busca possa ajudar.', 'tema_aromas'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>
