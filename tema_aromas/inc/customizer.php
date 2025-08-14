<?php
/**
 * Tema Aromas Customizer
 * 
 * Customizer settings for theme options
 * 
 * @package TemaAromas
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add postMessage support for site title and description
 */
function tema_aromas_customize_register($wp_customize) {
    // Make built-in settings use postMessage
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';

    // Color settings
    $wp_customize->add_section('tema_aromas_colors', [
        'title' => __('Cores do Tema', 'tema_aromas'),
        'priority' => 30,
    ]);

    // Primary color
    $wp_customize->add_setting('primary_color', [
        'default' => '#6b4fc4',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', [
        'label' => __('Cor Primária', 'tema_aromas'),
        'section' => 'tema_aromas_colors',
        'settings' => 'primary_color',
    ]));

    // Accent color
    $wp_customize->add_setting('accent_color', [
        'default' => '#8b5fd6',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport' => 'postMessage',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', [
        'label' => __('Cor de Destaque', 'tema_aromas'),
        'section' => 'tema_aromas_colors',
        'settings' => 'accent_color',
    ]));

    // Social media settings
    $wp_customize->add_section('tema_aromas_social', [
        'title' => __('Redes Sociais', 'tema_aromas'),
        'priority' => 35,
    ]);

    // Facebook URL
    $wp_customize->add_setting('facebook_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('facebook_url', [
        'label' => __('URL do Facebook', 'tema_aromas'),
        'section' => 'tema_aromas_social',
        'type' => 'url',
    ]);

    // Instagram URL
    $wp_customize->add_setting('instagram_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('instagram_url', [
        'label' => __('URL do Instagram', 'tema_aromas'),
        'section' => 'tema_aromas_social',
        'type' => 'url',
    ]);

    // WhatsApp URL
    $wp_customize->add_setting('whatsapp_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('whatsapp_url', [
        'label' => __('URL do WhatsApp', 'tema_aromas'),
        'section' => 'tema_aromas_social',
        'type' => 'url',
    ]);

    // YouTube URL
    $wp_customize->add_setting('youtube_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('youtube_url', [
        'label' => __('URL do YouTube', 'tema_aromas'),
        'section' => 'tema_aromas_social',
        'type' => 'url',
    ]);

    // Contact information
    $wp_customize->add_section('tema_aromas_contact', [
        'title' => __('Informações de Contato', 'tema_aromas'),
        'priority' => 40,
    ]);

    // Phone
    $wp_customize->add_setting('contact_phone', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('contact_phone', [
        'label' => __('Telefone', 'tema_aromas'),
        'section' => 'tema_aromas_contact',
        'type' => 'text',
    ]);

    // Email
    $wp_customize->add_setting('contact_email', [
        'default' => '',
        'sanitize_callback' => 'sanitize_email',
    ]);

    $wp_customize->add_control('contact_email', [
        'label' => __('E-mail', 'tema_aromas'),
        'section' => 'tema_aromas_contact',
        'type' => 'email',
    ]);

    // Address
    $wp_customize->add_setting('contact_address', [
        'default' => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('contact_address', [
        'label' => __('Endereço', 'tema_aromas'),
        'section' => 'tema_aromas_contact',
        'type' => 'textarea',
    ]);

    // Homepage settings
    $wp_customize->add_section('tema_aromas_homepage', [
        'title' => __('Configurações da Homepage', 'tema_aromas'),
        'priority' => 45,
    ]);

    // Hero section title
    $wp_customize->add_setting('hero_title', [
        'default' => __('Desperte Seus Sentidos com Aromas Únicos', 'tema_aromas'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ]);

    $wp_customize->add_control('hero_title', [
        'label' => __('Título do Hero', 'tema_aromas'),
        'section' => 'tema_aromas_homepage',
        'type' => 'text',
    ]);

    // Hero section subtitle
    $wp_customize->add_setting('hero_subtitle', [
        'default' => __('Descubra nossa coleção exclusiva de aromatizadores, velas e home sprays que transformarão seu ambiente em um refúgio de bem-estar.', 'tema_aromas'),
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage',
    ]);

    $wp_customize->add_control('hero_subtitle', [
        'label' => __('Subtítulo do Hero', 'tema_aromas'),
        'section' => 'tema_aromas_homepage',
        'type' => 'textarea',
    ]);

    // Hero CTA text
    $wp_customize->add_setting('hero_cta_text', [
        'default' => __('Ver Loja', 'tema_aromas'),
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ]);

    $wp_customize->add_control('hero_cta_text', [
        'label' => __('Texto do Botão CTA', 'tema_aromas'),
        'section' => 'tema_aromas_homepage',
        'type' => 'text',
    ]);

    // Hero CTA URL
    $wp_customize->add_setting('hero_cta_url', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('hero_cta_url', [
        'label' => __('URL do Botão CTA', 'tema_aromas'),
        'section' => 'tema_aromas_homepage',
        'type' => 'url',
    ]);

    // Footer settings
    $wp_customize->add_section('tema_aromas_footer', [
        'title' => __('Configurações do Rodapé', 'tema_aromas'),
        'priority' => 50,
    ]);

    // Footer text
    $wp_customize->add_setting('footer_text', [
        'default' => __('© 2024 Tema Aromas. Todos os direitos reservados.', 'tema_aromas'),
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'postMessage',
    ]);

    $wp_customize->add_control('footer_text', [
        'label' => __('Texto do Rodapé', 'tema_aromas'),
        'section' => 'tema_aromas_footer',
        'type' => 'textarea',
    ]);

    // Newsletter signup text
    $wp_customize->add_setting('newsletter_title', [
        'default' => __('Receba Novidades', 'tema_aromas'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('newsletter_title', [
        'label' => __('Título da Newsletter', 'tema_aromas'),
        'section' => 'tema_aromas_footer',
        'type' => 'text',
    ]);

    $wp_customize->add_setting('newsletter_text', [
        'default' => __('Cadastre-se para receber ofertas exclusivas e novidades sobre nossos produtos aromáticos.', 'tema_aromas'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('newsletter_text', [
        'label' => __('Texto da Newsletter', 'tema_aromas'),
        'section' => 'tema_aromas_footer',
        'type' => 'textarea',
    ]);
}
add_action('customize_register', 'tema_aromas_customize_register');

/**
 * Render the site title for the selective refresh partial
 */
function tema_aromas_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial
 */
function tema_aromas_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously
 */
function tema_aromas_customize_preview_js() {
    wp_enqueue_script(
        'tema-aromas-customizer',
        get_template_directory_uri() . '/assets/js/customizer.js',
        ['customize-preview'],
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('customize_preview_init', 'tema_aromas_customize_preview_js');

/**
 * Add customizer CSS
 */
function tema_aromas_customizer_css() {
    $primary_color = get_theme_mod('primary_color', '#6b4fc4');
    $accent_color = get_theme_mod('accent_color', '#8b5fd6');

    if ($primary_color !== '#6b4fc4' || $accent_color !== '#8b5fd6') {
        ?>
        <style type="text/css">
            :root {
                --cor-primaria: <?php echo esc_html($primary_color); ?>;
                --cor-accent: <?php echo esc_html($accent_color); ?>;
                --gradiente-luxo: linear-gradient(135deg, <?php echo esc_html($primary_color); ?> 0%, <?php echo esc_html($accent_color); ?> 100%);
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'tema_aromas_customizer_css');

/**
 * Selective refresh for customizer
 */
function tema_aromas_customize_selective_refresh($wp_customize) {
    // Add selective refresh for site title
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.site-title',
        'render_callback' => 'tema_aromas_customize_partial_blogname',
    ]);

    // Add selective refresh for site tagline
    $wp_customize->selective_refresh->add_partial('blogdescription', [
        'selector' => '.site-description',
        'render_callback' => 'tema_aromas_customize_partial_blogdescription',
    ]);

    // Add selective refresh for hero title
    $wp_customize->selective_refresh->add_partial('hero_title', [
        'selector' => '.hero-title',
        'render_callback' => function() {
            return get_theme_mod('hero_title', __('Desperte Seus Sentidos com Aromas Únicos', 'tema_aromas'));
        },
    ]);

    // Add selective refresh for hero subtitle
    $wp_customize->selective_refresh->add_partial('hero_subtitle', [
        'selector' => '.hero-subtitle',
        'render_callback' => function() {
            return get_theme_mod('hero_subtitle', __('Descubra nossa coleção exclusiva de aromatizadores, velas e home sprays que transformarão seu ambiente em um refúgio de bem-estar.', 'tema_aromas'));
        },
    ]);

    // Add selective refresh for hero CTA
    $wp_customize->selective_refresh->add_partial('hero_cta_text', [
        'selector' => '.hero-cta',
        'render_callback' => function() {
            return get_theme_mod('hero_cta_text', __('Ver Loja', 'tema_aromas'));
        },
    ]);

    // Add selective refresh for footer text
    $wp_customize->selective_refresh->add_partial('footer_text', [
        'selector' => '.footer-text',
        'render_callback' => function() {
            return get_theme_mod('footer_text', __('© 2024 Tema Aromas. Todos os direitos reservados.', 'tema_aromas'));
        },
    ]);
}
add_action('customize_register', 'tema_aromas_customize_selective_refresh');

/**
 * Customizer JavaScript for live preview
 */
function tema_aromas_customizer_js() {
    ?>
    <script type="text/javascript">
    (function($) {
        // Primary color
        wp.customize('primary_color', function(value) {
            value.bind(function(newval) {
                document.documentElement.style.setProperty('--cor-primaria', newval);
                document.documentElement.style.setProperty('--gradiente-luxo', 
                    'linear-gradient(135deg, ' + newval + ' 0%, ' + 
                    wp.customize('accent_color')() + ' 100%)');
            });
        });

        // Accent color
        wp.customize('accent_color', function(value) {
            value.bind(function(newval) {
                document.documentElement.style.setProperty('--cor-accent', newval);
                document.documentElement.style.setProperty('--gradiente-luxo', 
                    'linear-gradient(135deg, ' + wp.customize('primary_color')() + ' 0%, ' + 
                    newval + ' 100%)');
            });
        });

        // Site title
        wp.customize('blogname', function(value) {
            value.bind(function(newval) {
                $('.site-title a').text(newval);
            });
        });

        // Site description
        wp.customize('blogdescription', function(value) {
            value.bind(function(newval) {
                $('.site-description').text(newval);
            });
        });

        // Hero title
        wp.customize('hero_title', function(value) {
            value.bind(function(newval) {
                $('.hero-title').text(newval);
            });
        });

        // Hero subtitle
        wp.customize('hero_subtitle', function(value) {
            value.bind(function(newval) {
                $('.hero-subtitle').text(newval);
            });
        });

        // Hero CTA text
        wp.customize('hero_cta_text', function(value) {
            value.bind(function(newval) {
                $('.hero-cta').text(newval);
            });
        });

        // Footer text
        wp.customize('footer_text', function(value) {
            value.bind(function(newval) {
                $('.footer-text').html(newval);
            });
        });

    })(jQuery);
    </script>
    <?php
}

// Only add customizer JS in the customizer preview
if (is_customize_preview()) {
    add_action('wp_footer', 'tema_aromas_customizer_js');
}
