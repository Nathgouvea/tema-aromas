<?php
/**
 * Alternative Navigation Setup
 * 
 * This shows how to modify the navigation to use custom pages instead of WooCommerce categories
 * 
 * IMPORTANT: This is just a reference - don't run this file
 */

// Alternative approach: Link to custom pages instead of WooCommerce categories
// You would replace the dropdown links in header.php with something like this:

/*
<li class="menu-item">
    <a href="<?php 
        $page = get_page_by_path('categoria-aromatizadores');
        if ($page) {
            echo esc_url(get_permalink($page));
        } else {
            echo esc_url(home_url('/categoria-aromatizadores/'));
        }
    ?>" class="menu-link">
        <span class="category-icon">🌸</span>
        <?php esc_html_e('AROMATIZADORES', 'tema_aromas'); ?>
    </a>
</li>
*/

// Or link directly to shop with category filters:
/*
<li class="menu-item">
    <a href="<?php echo esc_url(add_query_arg('product_cat', 'aromatizadores', wc_get_page_permalink('shop'))); ?>" class="menu-link">
        <span class="category-icon">🌸</span>
        <?php esc_html_e('AROMATIZADORES', 'tema_aromas'); ?>
    </a>
</li>
*/

echo "<h2>Alternative Navigation Options</h2>";
echo "<p>If you prefer not to use WooCommerce categories, here are your options:</p>";
echo "<ol>";
echo "<li><strong>Create custom pages</strong> for each category (e.g., page-categoria-aromatizadores.php)</li>";
echo "<li><strong>Link to shop page with filters</strong> using URL parameters</li>";
echo "<li><strong>Use a custom taxonomy</strong> instead of WooCommerce categories</li>";
echo "</ol>";
echo "<p>Let me know which approach you prefer and I'll help you implement it!</p>";
?>



