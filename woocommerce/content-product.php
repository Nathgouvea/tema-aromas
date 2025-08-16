<?php
/**
 * The template for displaying product content within loops
 *
 * This template is a minimal override of WooCommerce default
 * to add luxury styling classes and structure
 *
 * @package TemaAromas
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<li <?php wc_product_class('luxury-product-card animate-fade-in-up', $product); ?>>
    <div class="product-card-inner">
        <?php
        /**
         * Hook: woocommerce_before_shop_loop_item.
         *
         * @hooked woocommerce_template_loop_product_link_open - 10
         */
        do_action('woocommerce_before_shop_loop_item');

        /**
         * Hook: woocommerce_before_shop_loop_item_title.
         *
         * @hooked woocommerce_show_product_loop_sale_flash - 10
         * @hooked woocommerce_template_loop_product_thumbnail - 10
         */
        ?>
        <div class="product-image-wrapper">
            <?php do_action('woocommerce_before_shop_loop_item_title'); ?>
        </div>

        <div class="product-content">
            <?php
            /**
             * Hook: woocommerce_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_product_title - 10
             */
            ?>
            <h2 class="woocommerce-loop-product__title product-title">
                <?php do_action('woocommerce_shop_loop_item_title'); ?>
            </h2>

            <?php
            /**
             * Hook: woocommerce_after_shop_loop_item_title.
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            ?>
            <div class="product-meta">
                <?php do_action('woocommerce_after_shop_loop_item_title'); ?>
            </div>


        </div>

        <div class="product-actions">
            <?php
            /**
             * Hook: woocommerce_after_shop_loop_item.
             *
             * @hooked woocommerce_template_loop_product_link_close - 5
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
            do_action('woocommerce_after_shop_loop_item');
            ?>
        </div>
    </div>
</li>
