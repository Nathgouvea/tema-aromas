<?php
/**
 * Temporary script to change contact page slug from 'contato' to 'fale-conosco'
 * 
 * IMPORTANT: This is a one-time use script. Delete this file after running it.
 * 
 * Instructions:
 * 1. Access this file via browser: http://localhost:8888/zensecrets/wp-content/themes/tema-aromas/change-contact-slug.php
 * 2. The script will automatically change the page slug
 * 3. Delete this file after successful execution
 */

// Load WordPress
require_once('../../../wp-load.php');

// Check if we're in admin or if this is a direct access
if (!current_user_can('manage_options') && !isset($_GET['run_script'])) {
    die('Access denied. Add ?run_script=1 to the URL to run this script.');
}

// Find the page with slug 'contato'
$contato_page = get_page_by_path('contato');

if ($contato_page) {
    // Update the page slug to 'fale-conosco'
    $updated = wp_update_post([
        'ID' => $contato_page->ID,
        'post_name' => 'fale-conosco'
    ]);
    
    if ($updated) {
        echo "<h2>✅ Success!</h2>";
        echo "<p>The page slug has been changed from 'contato' to 'fale-conosco'.</p>";
        echo "<p><strong>New URL:</strong> " . get_permalink($contato_page->ID) . "</p>";
        echo "<p><strong>Please delete this file now for security reasons.</strong></p>";
    } else {
        echo "<h2>❌ Error</h2>";
        echo "<p>Failed to update the page slug.</p>";
    }
} else {
    echo "<h2>ℹ️ Info</h2>";
    echo "<p>No page found with slug 'contato'. The page might already have the correct slug 'fale-conosco'.</p>";
    
    // Check if fale-conosco page exists
    $fale_conosco_page = get_page_by_path('fale-conosco');
    if ($fale_conosco_page) {
        echo "<p>✅ Page with slug 'fale-conosco' already exists: " . get_permalink($fale_conosco_page->ID) . "</p>";
    }
}

echo "<hr>";
echo "<p><strong>Current navigation setup:</strong></p>";
echo "<p>The theme is already configured to look for a page with slug 'fale-conosco'.</p>";
echo "<p>If you see this message, the navigation should work correctly now.</p>";
?>



