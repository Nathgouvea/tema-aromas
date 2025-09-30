<?php
/**
 * Debug Navigation Script
 * 
 * This script helps debug navigation menu issues
 * 
 * IMPORTANT: Delete this file after debugging
 */

// Load WordPress
require_once('../../../wp-load.php');

echo "<h2>🔍 Navigation Debug Information</h2>";

// Check if header menu location exists
$menu_locations = get_nav_menu_locations();
echo "<h3>Menu Locations:</h3>";
echo "<pre>";
print_r($menu_locations);
echo "</pre>";

// Check if header menu is assigned
if (isset($menu_locations['header'])) {
    $header_menu_id = $menu_locations['header'];
    echo "<h3>Header Menu ID: " . $header_menu_id . "</h3>";
    
    // Get menu object
    $menu = wp_get_nav_menu_object($header_menu_id);
    if ($menu) {
        echo "<h3>Menu Object:</h3>";
        echo "<pre>";
        print_r($menu);
        echo "</pre>";
        
        // Get menu items
        $menu_items = wp_get_nav_menu_items($header_menu_id);
        echo "<h3>Menu Items:</h3>";
        if ($menu_items) {
            foreach ($menu_items as $item) {
                echo "<p><strong>" . $item->title . "</strong> - " . $item->url . " (ID: " . $item->ID . ")</p>";
            }
        } else {
            echo "<p>No menu items found</p>";
        }
    } else {
        echo "<p>❌ Menu object not found</p>";
    }
} else {
    echo "<h3>❌ No menu assigned to 'header' location</h3>";
    echo "<p>This means the default menu structure should be used.</p>";
}

// Check if fale-conosco page exists
echo "<h3>Page Check:</h3>";
$fale_conosco_page = get_page_by_path('fale-conosco');
if ($fale_conosco_page) {
    echo "<p>✅ 'fale-conosco' page exists: " . get_permalink($fale_conosco_page->ID) . "</p>";
} else {
    echo "<p>❌ 'fale-conosco' page not found</p>";
}

$contato_page = get_page_by_path('contato');
if ($contato_page) {
    echo "<p>⚠️ 'contato' page still exists: " . get_permalink($contato_page->ID) . "</p>";
} else {
    echo "<p>✅ 'contato' page not found (good!)</p>";
}

// Check current page
echo "<h3>Current Page Info:</h3>";
if (is_page()) {
    global $post;
    echo "<p>Current page: " . $post->post_title . " (Slug: " . $post->post_name . ")</p>";
}

echo "<hr>";
echo "<p><strong>Next Steps:</strong></p>";
echo "<ol>";
echo "<li>If a custom menu is assigned, go to WordPress Admin → Appearance → Menus</li>";
echo "<li>Make sure the 'FALE CONOSCO' item is added to the menu</li>";
echo "<li>If no custom menu is assigned, the default menu should work</li>";
echo "<li>Delete this file after debugging</li>";
echo "</ol>";
?>



