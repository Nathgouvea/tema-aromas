<?php
/**
 * Ultra Minimal Functions for Testing
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Basic Theme Setup
 */
function tema_aromas_minimal_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    
    register_nav_menus([
        'header' => 'Menu Principal',
    ]);
}
add_action('after_setup_theme', 'tema_aromas_minimal_setup');

/**
 * Enqueue basic styles
 */
function tema_aromas_minimal_scripts() {
    wp_enqueue_style('tema-aromas-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'tema_aromas_minimal_scripts');
