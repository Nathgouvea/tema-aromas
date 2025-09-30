<?php
/**
 * Setup Product Categories Script
 * 
 * This script creates the required WooCommerce product categories
 * 
 * IMPORTANT: Delete this file after running it
 */

// Load WordPress
require_once('../../../wp-load.php');

// Check if WooCommerce is active
if (!class_exists('WooCommerce')) {
    die('❌ WooCommerce is not active. Please activate WooCommerce first.');
}

echo "<h2>🛍️ Setting Up Product Categories</h2>";

// Define the categories to create
$categories = [
    [
        'name' => 'Aromatizadores',
        'slug' => 'aromatizadores',
        'description' => 'Aromatizadores de ambiente com ingredientes naturais'
    ],
    [
        'name' => 'Home Spray',
        'slug' => 'home-spray',
        'description' => 'Sprays aromáticos para ambientes'
    ],
    [
        'name' => 'Velas Aromáticas',
        'slug' => 'velas-aromaticas',
        'description' => 'Velas aromáticas artesanais'
    ],
    [
        'name' => 'Kits Especiais',
        'slug' => 'kits-especiais',
        'description' => 'Kits especiais com produtos selecionados'
    ],
    [
        'name' => 'Lembrancinhas',
        'slug' => 'lembrancinhas',
        'description' => 'Lembrancinhas aromáticas para eventos especiais'
    ],
    [
        'name' => 'Acessórios',
        'slug' => 'acessorios',
        'description' => 'Acessórios para aromaterapia'
    ]
];

$created_count = 0;
$existing_count = 0;

foreach ($categories as $category_data) {
    // Check if category already exists
    $existing_term = get_term_by('slug', $category_data['slug'], 'product_cat');
    
    if ($existing_term) {
        echo "<p>✅ <strong>" . $category_data['name'] . "</strong> already exists (ID: " . $existing_term->term_id . ")</p>";
        $existing_count++;
    } else {
        // Create the category
        $result = wp_insert_term(
            $category_data['name'],
            'product_cat',
            [
                'slug' => $category_data['slug'],
                'description' => $category_data['description']
            ]
        );
        
        if (is_wp_error($result)) {
            echo "<p>❌ Error creating <strong>" . $category_data['name'] . "</strong>: " . $result->get_error_message() . "</p>";
        } else {
            echo "<p>✅ Created <strong>" . $category_data['name'] . "</strong> (ID: " . $result['term_id'] . ")</p>";
            $created_count++;
        }
    }
}

echo "<hr>";
echo "<h3>📊 Summary:</h3>";
echo "<p>✅ Created: " . $created_count . " categories</p>";
echo "<p>ℹ️ Already existed: " . $existing_count . " categories</p>";

if ($created_count > 0 || $existing_count > 0) {
    echo "<h3>🎉 Success!</h3>";
    echo "<p>Your navigation dropdown should now work correctly!</p>";
    echo "<p><strong>Next steps:</strong></p>";
    echo "<ol>";
    echo "<li>Go to WordPress Admin → Products → Categories to manage your categories</li>";
    echo "<li>Add products to each category</li>";
    echo "<li>Test the navigation dropdown</li>";
    echo "<li>Delete this script file for security</li>";
    echo "</ol>";
} else {
    echo "<h3>⚠️ No categories were processed</h3>";
    echo "<p>Please check the error messages above.</p>";
}

echo "<hr>";
echo "<p><strong>Category URLs that will be created:</strong></p>";
foreach ($categories as $category_data) {
    $category_url = home_url('/product-category/' . $category_data['slug'] . '/');
    echo "<p><strong>" . $category_data['name'] . ":</strong> <a href='" . $category_url . "' target='_blank'>" . $category_url . "</a></p>";
}
?>



