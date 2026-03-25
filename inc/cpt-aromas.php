<?php
/**
 * Custom Post Type: Aromas
 *
 * Allows admin to manage aromas from the WordPress dashboard.
 * Used on the "Sobre os Aromas" page and homepage carousel.
 *
 * @package TemaAromas
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register the Aroma custom post type
 */
function tema_aromas_register_cpt_aroma() {
    $labels = [
        'name'               => 'Aromas',
        'singular_name'      => 'Aroma',
        'menu_name'          => 'Aromas',
        'add_new'            => 'Adicionar Novo',
        'add_new_item'       => 'Adicionar Novo Aroma',
        'edit_item'          => 'Editar Aroma',
        'new_item'           => 'Novo Aroma',
        'view_item'          => 'Ver Aroma',
        'search_items'       => 'Buscar Aromas',
        'not_found'          => 'Nenhum aroma encontrado',
        'not_found_in_trash' => 'Nenhum aroma na lixeira',
        'all_items'          => 'Todos os Aromas',
    ];

    $args = [
        'labels'       => $labels,
        'public'       => false,
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_position' => 25,
        'menu_icon'    => 'dashicons-palmtree',
        'supports'     => ['title', 'thumbnail', 'page-attributes'],
        'has_archive'  => false,
        'rewrite'      => false,
    ];

    register_post_type('aroma', $args);
}
add_action('init', 'tema_aromas_register_cpt_aroma');

/**
 * Add meta boxes for aroma details
 */
function tema_aromas_aroma_meta_boxes() {
    add_meta_box(
        'aroma_details',
        'Detalhes do Aroma',
        'tema_aromas_aroma_details_callback',
        'aroma',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'tema_aromas_aroma_meta_boxes');

/**
 * Render the meta box fields
 */
function tema_aromas_aroma_details_callback($post) {
    wp_nonce_field('tema_aromas_aroma_nonce', 'aroma_nonce');

    $fields = [
        'familia_olfativa' => get_post_meta($post->ID, '_aroma_familia_olfativa', true),
        'notas'            => get_post_meta($post->ID, '_aroma_notas', true),
        'projecao'         => get_post_meta($post->ID, '_aroma_projecao', true),
        'caracteristicas'  => get_post_meta($post->ID, '_aroma_caracteristicas', true),
        'sentimento'       => get_post_meta($post->ID, '_aroma_sentimento', true),
        'descricao_curta'  => get_post_meta($post->ID, '_aroma_descricao_curta', true),
    ];
    ?>
    <style>
        .aroma-fields { display: grid; gap: 20px; }
        .aroma-field label { display: block; font-weight: 600; margin-bottom: 6px; font-size: 13px; }
        .aroma-field input[type="text"],
        .aroma-field textarea,
        .aroma-field select { width: 100%; padding: 8px 12px; border: 1px solid #8c8f94; border-radius: 4px; font-size: 14px; }
        .aroma-field textarea { min-height: 80px; resize: vertical; }
        .aroma-field .description { color: #646970; font-size: 12px; margin-top: 4px; }
        .aroma-fields-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    </style>
    <div class="aroma-fields">
        <div class="aroma-fields-row">
            <div class="aroma-field">
                <label for="aroma_familia_olfativa">Família Olfativa</label>
                <input type="text" id="aroma_familia_olfativa" name="aroma_familia_olfativa"
                       value="<?php echo esc_attr($fields['familia_olfativa']); ?>"
                       placeholder="Ex: Frutado Adocicado, Floral Cítrico, Amadeirado">
            </div>
            <div class="aroma-field">
                <label for="aroma_projecao">Projeção no Ambiente</label>
                <select id="aroma_projecao" name="aroma_projecao">
                    <option value="">— Selecionar —</option>
                    <option value="Suave" <?php selected($fields['projecao'], 'Suave'); ?>>Suave</option>
                    <option value="Moderada" <?php selected($fields['projecao'], 'Moderada'); ?>>Moderada</option>
                    <option value="Forte" <?php selected($fields['projecao'], 'Forte'); ?>>Forte</option>
                </select>
            </div>
        </div>

        <div class="aroma-field">
            <label for="aroma_notas">Notas</label>
            <input type="text" id="aroma_notas" name="aroma_notas"
                   value="<?php echo esc_attr($fields['notas']); ?>"
                   placeholder="Ex: Cassis, Toranja, Baunilha e Caramelo">
            <p class="description">Separe as notas por vírgula.</p>
        </div>

        <div class="aroma-field">
            <label for="aroma_caracteristicas">Características</label>
            <textarea id="aroma_caracteristicas" name="aroma_caracteristicas"
                      placeholder="Descreva as características do aroma..."><?php echo esc_textarea($fields['caracteristicas']); ?></textarea>
            <p class="description">Descrição detalhada que aparece na página de aromas.</p>
        </div>

        <div class="aroma-fields-row">
            <div class="aroma-field">
                <label for="aroma_sentimento">Sentimento / Badge</label>
                <input type="text" id="aroma_sentimento" name="aroma_sentimento"
                       value="<?php echo esc_attr($fields['sentimento']); ?>"
                       placeholder="Ex: Pureza, Doçura, Equilíbrio">
                <p class="description">Palavra que aparece no card da homepage.</p>
            </div>
            <div class="aroma-field">
                <label for="aroma_descricao_curta">Descrição Curta</label>
                <input type="text" id="aroma_descricao_curta" name="aroma_descricao_curta"
                       value="<?php echo esc_attr($fields['descricao_curta']); ?>"
                       placeholder="Ex: Pureza e serenidade em cada respiração">
                <p class="description">Frase curta que aparece no card da homepage.</p>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Save meta box data
 */
function tema_aromas_save_aroma_meta($post_id) {
    if (!isset($_POST['aroma_nonce']) || !wp_verify_nonce($_POST['aroma_nonce'], 'tema_aromas_aroma_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $text_fields = [
        'aroma_familia_olfativa' => '_aroma_familia_olfativa',
        'aroma_notas'            => '_aroma_notas',
        'aroma_projecao'         => '_aroma_projecao',
        'aroma_sentimento'       => '_aroma_sentimento',
        'aroma_descricao_curta'  => '_aroma_descricao_curta',
    ];

    foreach ($text_fields as $post_key => $meta_key) {
        if (isset($_POST[$post_key])) {
            update_post_meta($post_id, $meta_key, sanitize_text_field($_POST[$post_key]));
        }
    }

    if (isset($_POST['aroma_caracteristicas'])) {
        update_post_meta($post_id, '_aroma_caracteristicas', sanitize_textarea_field($_POST['aroma_caracteristicas']));
    }
}
add_action('save_post_aroma', 'tema_aromas_save_aroma_meta');

/**
 * Customize admin columns for Aromas
 */
function tema_aromas_aroma_columns($columns) {
    $new_columns = [];
    $new_columns['cb'] = $columns['cb'];
    $new_columns['thumbnail'] = 'Imagem';
    $new_columns['title'] = 'Aroma';
    $new_columns['familia'] = 'Família Olfativa';
    $new_columns['projecao'] = 'Projeção';
    $new_columns['sentimento'] = 'Sentimento';
    $new_columns['menu_order'] = 'Ordem';
    return $new_columns;
}
add_filter('manage_aroma_posts_columns', 'tema_aromas_aroma_columns');

function tema_aromas_aroma_column_content($column, $post_id) {
    switch ($column) {
        case 'thumbnail':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, [50, 50], ['style' => 'border-radius: 6px;']);
            } else {
                echo '—';
            }
            break;
        case 'familia':
            echo esc_html(get_post_meta($post_id, '_aroma_familia_olfativa', true) ?: '—');
            break;
        case 'projecao':
            echo esc_html(get_post_meta($post_id, '_aroma_projecao', true) ?: '—');
            break;
        case 'sentimento':
            echo esc_html(get_post_meta($post_id, '_aroma_sentimento', true) ?: '—');
            break;
        case 'menu_order':
            echo (int) get_post_field('menu_order', $post_id);
            break;
    }
}
add_action('manage_aroma_posts_custom_column', 'tema_aromas_aroma_column_content', 10, 2);

/**
 * Make the order column sortable
 */
function tema_aromas_aroma_sortable_columns($columns) {
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter('manage_edit-aroma_sortable_columns', 'tema_aromas_aroma_sortable_columns');

/**
 * Default sort by menu_order
 */
function tema_aromas_aroma_default_sort($query) {
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }
    if ($query->get('post_type') === 'aroma' && !$query->get('orderby')) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}
add_action('pre_get_posts', 'tema_aromas_aroma_default_sort');

/**
 * Helper: get all published aromas, sorted alphabetically by title
 */
function tema_aromas_get_aromas() {
    return get_posts([
        'post_type'      => 'aroma',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'post_status'    => 'publish',
    ]);
}

/**
 * One-time migration: seed the 5 original aromas as posts.
 * Runs once via an option flag, then never again.
 */
function tema_aromas_seed_aromas() {
    if (get_option('tema_aromas_seeded')) {
        return;
    }

    $aromas = [
        [
            'title'      => 'Flor de Figo',
            'order'      => 1,
            'meta'       => [
                '_aroma_familia_olfativa' => 'Frutado Adocicado',
                '_aroma_notas'           => 'Cassis, Toranja, Baunilha e Caramelo',
                '_aroma_projecao'        => 'Forte',
                '_aroma_caracteristicas' => 'Sofisticado, marcante e acolhedor. Um floral frutado envolvente, que combina a doçura do figo com um toque de elegância.',
                '_aroma_sentimento'      => 'Doçura',
                '_aroma_descricao_curta' => 'Doçura natural e sofisticação',
            ],
        ],
        [
            'title'      => 'Chá Branco',
            'order'      => 2,
            'meta'       => [
                '_aroma_familia_olfativa' => 'Floral Cítrico',
                '_aroma_notas'           => 'Lima, Laranja, Chá Branco e Jasmin',
                '_aroma_projecao'        => 'Suave',
                '_aroma_caracteristicas' => 'Leve, refrescante e delicado. Um aroma que traz clareza, paz e serenidade, ideal para criar uma atmosfera de leveza e de relaxamento.',
                '_aroma_sentimento'      => 'Pureza',
                '_aroma_descricao_curta' => 'Pureza e serenidade em cada respiração',
            ],
        ],
        [
            'title'      => 'Bamboo',
            'order'      => 3,
            'meta'       => [
                '_aroma_familia_olfativa' => 'Bamboo',
                '_aroma_notas'           => 'Verde, Natural e Reconfortante',
                '_aroma_projecao'        => '',
                '_aroma_caracteristicas' => 'Um aroma que remete à natureza viva, trazendo harmonia e equilíbrio para o ambiente.',
                '_aroma_sentimento'      => 'Equilíbrio',
                '_aroma_descricao_curta' => 'Frescor natural e equilíbrio zen',
            ],
        ],
        [
            'title'      => 'Marinho',
            'order'      => 4,
            'meta'       => [
                '_aroma_familia_olfativa' => 'Frescor Aquático',
                '_aroma_notas'           => 'Lima, Limão, Lavanda, Algas Marinhas',
                '_aroma_projecao'        => 'Forte',
                '_aroma_caracteristicas' => 'Refrescante como a brisa do mar. Uma combinação que traz notas aquáticas e refrescantes, ideal para quem busca frescor com personalidade.',
                '_aroma_sentimento'      => 'Tranquilidade',
                '_aroma_descricao_curta' => 'Brisa oceânica e tranquilidade',
            ],
        ],
        [
            'title'      => 'Palo Santo',
            'order'      => 5,
            'meta'       => [
                '_aroma_familia_olfativa' => 'Amadeirado',
                '_aroma_notas'           => '',
                '_aroma_projecao'        => '',
                '_aroma_caracteristicas' => 'O Palo Santo é uma madeira utilizada como incenso natural. Perfeito para meditação, alinhamento e purificação.',
                '_aroma_sentimento'      => 'Energia',
                '_aroma_descricao_curta' => 'Madeira sagrada e energia positiva',
            ],
        ],
    ];

    foreach ($aromas as $aroma_data) {
        $post_id = wp_insert_post([
            'post_type'   => 'aroma',
            'post_title'  => $aroma_data['title'],
            'post_status' => 'publish',
            'menu_order'  => $aroma_data['order'],
        ]);

        if ($post_id && !is_wp_error($post_id)) {
            foreach ($aroma_data['meta'] as $key => $value) {
                update_post_meta($post_id, $key, $value);
            }
        }
    }

    update_option('tema_aromas_seeded', true);
}
add_action('admin_init', 'tema_aromas_seed_aromas');
