<?php
/**
 * The template for displaying all single posts and pages
 *
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<div class="luxury-container">
    <div class="content-area">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('luxury-post'); ?>>
                <?php
                // Breadcrumbs
                tema_aromas_breadcrumbs();
                ?>

                <header class="entry-header">
                    <?php if (is_single()) : ?>
                        <?php tema_aromas_post_categories(); ?>
                    <?php endif; ?>

                    <?php the_title('<h1 class="entry-title luxury-heading">', '</h1>'); ?>

                    <?php if (is_single()) : ?>
                        <div class="entry-meta">
                            <?php tema_aromas_post_meta(); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-featured-image">
                            <?php the_post_thumbnail('large', [
                                'loading' => 'lazy',
                                'class' => 'featured-image',
                            ]); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content">
                    <?php
                    the_content(sprintf(
                        wp_kses(
                            __('Continue lendo<span class="sr-only"> "%s"</span>', 'tema_aromas'),
                            [
                                'span' => [
                                    'class' => [],
                                ],
                            ]
                        ),
                        wp_kses_post(get_the_title())
                    ));

                    wp_link_pages([
                        'before' => '<div class="page-links">' . esc_html__('Páginas:', 'tema_aromas'),
                        'after'  => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ]);
                    ?>
                </div>

                <?php if (is_single()) : ?>
                    <footer class="entry-footer">
                        <?php tema_aromas_post_footer(); ?>
                    </footer>
                <?php endif; ?>
            </article>

            <?php if (is_single()) : ?>
                <!-- Author Bio -->
                <?php tema_aromas_author_bio(); ?>

                <!-- Related Posts -->
                <?php tema_aromas_related_posts(); ?>

                <!-- Post Navigation -->
                <nav class="post-navigation luxury-navigation" aria-label="<?php esc_attr_e('Navegação entre posts', 'tema_aromas'); ?>">
                    <div class="nav-links">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        ?>

                        <?php if ($prev_post) : ?>
                            <div class="nav-previous">
                                <a href="<?php echo esc_url(get_permalink($prev_post)); ?>" class="nav-link">
                                    <div class="nav-direction">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <polyline points="15,18 9,12 15,6"></polyline>
                                        </svg>
                                        <?php esc_html_e('Post anterior', 'tema_aromas'); ?>
                                    </div>
                                    <div class="nav-title"><?php echo esc_html(get_the_title($prev_post)); ?></div>
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ($next_post) : ?>
                            <div class="nav-next">
                                <a href="<?php echo esc_url(get_permalink($next_post)); ?>" class="nav-link">
                                    <div class="nav-direction">
                                        <?php esc_html_e('Próximo post', 'tema_aromas'); ?>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                            <polyline points="9,6 15,12 9,18"></polyline>
                                        </svg>
                                    </div>
                                    <div class="nav-title"><?php echo esc_html(get_the_title($next_post)); ?></div>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </nav>
            <?php endif; ?>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
