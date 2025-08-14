<?php
/**
 * Template for displaying search forms
 *
 * @package TemaAromas
 * @version 1.0.0
 */
?>

<form role="search" method="get" class="search-form luxury-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="search-field" class="sr-only">
        <?php esc_html_e('Buscar por:', 'tema_aromas'); ?>
    </label>
    <div class="search-input-group">
        <input type="search" 
               id="search-field"
               class="search-field luxury-form-input" 
               placeholder="<?php esc_attr_e('Digite sua busca...', 'tema_aromas'); ?>" 
               value="<?php echo get_search_query(); ?>" 
               name="s" />
        <button type="submit" class="search-submit btn-luxury">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="21 21l-4.35-4.35"></path>
            </svg>
            <span class="sr-only"><?php esc_html_e('Buscar', 'tema_aromas'); ?></span>
        </button>
    </div>
</form>
