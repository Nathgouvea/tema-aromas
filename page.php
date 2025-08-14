<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<div class="luxury-container">
    <div class="content-area">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('luxury-page'); ?>>
                <?php
                // Breadcrumbs
                tema_aromas_breadcrumbs();
                ?>

                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title luxury-heading">', '</h1>'); ?>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="page-featured-image">
                            <?php the_post_thumbnail('large', [
                                'loading' => 'lazy',
                                'class' => 'featured-image',
                            ]); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages([
                        'before' => '<div class="page-links">' . esc_html__('Páginas:', 'tema_aromas'),
                        'after'  => '</div>',
                        'link_before' => '<span class="page-number">',
                        'link_after'  => '</span>',
                    ]);
                    ?>
                </div>

                <?php if (get_edit_post_link()) : ?>
                    <footer class="entry-footer">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    __('Editar <span class="sr-only">%s</span>', 'tema_aromas'),
                                    [
                                        'span' => [
                                            'class' => [],
                                        ],
                                    ]
                                ),
                                wp_kses_post(get_the_title())
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </footer>
                <?php endif; ?>
            </article>

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
