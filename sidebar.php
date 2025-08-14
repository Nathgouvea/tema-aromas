<?php
/**
 * The sidebar containing the main widget area
 *
 * @package TemaAromas
 * @version 1.0.0
 */

if (!is_active_sidebar('sidebar-filters')) {
    return;
}
?>

<aside id="secondary" class="widget-area sidebar" role="complementary">
    <h2 class="sr-only"><?php esc_html_e('Sidebar', 'tema_aromas'); ?></h2>
    <?php dynamic_sidebar('sidebar-filters'); ?>
</aside>
