<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 * Enhanced with luxury styling for Tema Aromas
 *
 * @package TemaAromas
 * @version 1.0.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_mini_cart'); ?>

<?php if (!WC()->cart->is_empty()) : ?>

    <ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr($args['list_class']); ?>">
        <?php
        do_action('woocommerce_before_mini_cart_contents');

        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
            $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
            $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

            if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key)) {
                $product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
                $thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
                $product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                ?>
                <li class="woocommerce-mini-cart-item <?php echo esc_attr(apply_filters('woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key)); ?>">
                    <div class="mini-cart-item-content">
                        <div class="mini-cart-item-image">
                            <?php if (empty($product_permalink)) : ?>
                                <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                            <?php else : ?>
                                <a href="<?php echo esc_url($product_permalink); ?>">
                                    <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="mini-cart-item-details">
                            <div class="mini-cart-item-header">
                                <div class="mini-cart-item-title-group">
                                    <?php
                                    // Get product brand/category if exists
                                    $categories = get_the_terms($product_id, 'product_cat');
                                    if ($categories && !is_wp_error($categories)) {
                                        $category = array_shift($categories);
                                        ?>
                                        <span class="mini-cart-item-brand"><?php echo esc_html($category->name); ?></span>
                                    <?php } ?>

                                    <div class="mini-cart-item-title">
                                        <?php if (empty($product_permalink)) : ?>
                                            <?php echo wp_kses_post($product_name); ?>
                                        <?php else : ?>
                                            <a href="<?php echo esc_url($product_permalink); ?>">
                                                <?php echo wp_kses_post($product_name); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <?php
                                    // Display size/variation if exists
                                    echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                    ?>
                                </div>

                                <div class="mini-cart-item-remove">
                                    <?php
                                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        'woocommerce_cart_item_remove_link',
                                        sprintf(
                                            '<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">
                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                                </svg>
                                            </a>',
                                            esc_url(wc_get_cart_remove_url($cart_item_key)),
                                            esc_attr__('Remove this item', 'woocommerce'),
                                            esc_attr($product_id),
                                            esc_attr($cart_item_key),
                                            esc_attr($_product->get_sku())
                                        ),
                                        $cart_item_key
                                    );
                                    ?>
                                </div>
                            </div>

                            <div class="mini-cart-item-quantity-controls">
                                <div class="quantity-selector">
                                    <button type="button" class="quantity-minus" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>" aria-label="<?php esc_attr_e('Decrease quantity', 'tema_aromas'); ?>">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                    <input type="number" class="quantity-input" value="<?php echo esc_attr($cart_item['quantity']); ?>" min="1" readonly data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>">
                                    <button type="button" class="quantity-plus" data-cart-item-key="<?php echo esc_attr($cart_item_key); ?>" aria-label="<?php esc_attr_e('Increase quantity', 'tema_aromas'); ?>">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </div>
                                <div class="mini-cart-item-price">
                                    <?php echo $product_price; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            }
        }

        do_action('woocommerce_mini_cart_contents');
        ?>
    </ul>

    <div class="mini-cart-footer">
        <div class="mini-cart-total">
            <span class="total-label"><?php esc_html_e('Total', 'tema_aromas'); ?></span>
            <span class="total-amount"><?php echo WC()->cart->get_cart_subtotal(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
        </div>

        <p class="mini-cart-tax-notice">
            <?php esc_html_e('Impostos incluídos e frete calculado no checkout', 'tema_aromas'); ?>
        </p>

        <?php do_action('woocommerce_widget_shopping_cart_before_buttons'); ?>

        <div class="woocommerce-mini-cart__buttons buttons">
            <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="button wc-forward btn-view-cart">
                <?php esc_html_e('View cart', 'woocommerce'); ?>
            </a>
            <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="button checkout wc-forward btn-checkout">
                <?php esc_html_e('Checkout', 'woocommerce'); ?>
            </a>
        </div>
    </div>

<?php else : ?>

    <div class="mini-cart-empty">
        <p class="woocommerce-mini-cart__empty-message">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="empty-cart-icon">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
            <?php esc_html_e('No products in the cart.', 'woocommerce'); ?>
        </p>
        <p>
            <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="button btn-luxury">
                <?php esc_html_e('Continue shopping', 'tema_aromas'); ?>
            </a>
        </p>
    </div>

<?php endif; ?>

<?php do_action('woocommerce_after_mini_cart'); ?>
