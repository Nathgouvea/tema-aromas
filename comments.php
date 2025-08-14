<?php
/**
 * The template for displaying comments
 *
 * @package TemaAromas
 * @version 1.0.0
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $tema_aromas_comment_count = get_comments_number();
            if ('1' === $tema_aromas_comment_count) {
                printf(
                    esc_html__('Um comentário em &ldquo;%1$s&rdquo;', 'tema_aromas'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            } else {
                printf(
                    esc_html(
                        _nx(
                            '%1$s comentário em &ldquo;%2$s&rdquo;',
                            '%1$s comentários em &ldquo;%2$s&rdquo;',
                            $tema_aromas_comment_count,
                            'comments title',
                            'tema_aromas'
                        )
                    ),
                    number_format_i18n($tema_aromas_comment_count),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list">
            <?php
            wp_list_comments([
                'style'      => 'ol',
                'short_ping' => true,
            ]);
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

        <?php if (!comments_open()) : ?>
            <p class="no-comments"><?php esc_html_e('Os comentários estão fechados.', 'tema_aromas'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php comment_form(); ?>

</div>
