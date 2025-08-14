<?php
/**
 * Custom Navigation Walker for Tema Aromas
 * 
 * Enhanced accessibility and luxury dropdown functionality
 * 
 * @package TemaAromas
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Custom walker for main navigation menu
 */
class Tema_Aromas_Walker_Nav_Menu extends Walker_Nav_Menu {

    /**
     * Start Level - Wrapper for sub-menus
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        
        // Generate unique ID for dropdown
        $dropdown_id = 'dropdown-' . uniqid();
        
        $output .= "\n$indent<ul class=\"sub-menu dropdown-menu\" id=\"$dropdown_id\">\n";
    }

    /**
     * End Level - Close sub-menu wrapper
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Start Element - Individual menu items
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // Add dropdown classes for parent items
        $has_children = in_array('menu-item-has-children', $classes);
        if ($has_children) {
            $classes[] = 'dropdown';
        }

        // Add current item classes
        if (in_array('current-menu-item', $classes) || in_array('current-menu-parent', $classes)) {
            $classes[] = 'current';
        }

        /**
         * Filter the CSS class(es) applied to a menu item's list item element
         */
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        /**
         * Filter the ID applied to a menu item's list item element
         */
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';

        // Add dropdown attributes for parent items
        if ($has_children) {
            $dropdown_id = 'dropdown-' . $item->ID;
            $attributes .= ' class="menu-link dropdown-toggle"';
            $attributes .= ' aria-expanded="false"';
            $attributes .= ' aria-haspopup="true"';
            $attributes .= ' aria-controls="' . $dropdown_id . '"';
        } else {
            $attributes .= ' class="menu-link"';
        }

        $item_output = isset($args->before) ? $args->before : '';
        $item_output .= '<a' . $attributes .'>';
        $item_output .= (isset($args->link_before) ? $args->link_before : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after : '');
        
        // Add dropdown icon for parent items
        if ($has_children) {
            $item_output .= '<svg class="dropdown-icon" width="12" height="8" viewBox="0 0 12 8" fill="none" aria-hidden="true">';
            $item_output .= '<path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>';
            $item_output .= '</svg>';
        }
        
        $item_output .= '</a>';
        $item_output .= isset($args->after) ? $args->after : '';

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * End Element - Close menu item
     */
    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}
