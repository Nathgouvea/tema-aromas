<?php
/**
 * Tema Aromas Theme Customizer
 *
 * @package TemaAromas
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tema_aromas_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            [
                'selector'        => '.site-title a',
                'render_callback' => 'tema_aromas_customize_partial_blogname',
            ]
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            [
                'selector'        => '.site-description',
                'render_callback' => 'tema_aromas_customize_partial_blogdescription',
            ]
        );
    }

    // Contact Information Section
    $wp_customize->add_section('tema_aromas_contact_info', [
        'title'    => __('Informações de Contato', 'tema_aromas'),
        'priority' => 30,
    ]);

    // Contact Phone
    $wp_customize->add_setting('contact_phone', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('contact_phone', [
        'label'   => __('Telefone', 'tema_aromas'),
        'section' => 'tema_aromas_contact_info',
        'type'    => 'text',
    ]);

    // Contact Email
    $wp_customize->add_setting('contact_email', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ]);

    $wp_customize->add_control('contact_email', [
        'label'   => __('E-mail', 'tema_aromas'),
        'section' => 'tema_aromas_contact_info',
        'type'    => 'email',
    ]);

    // Contact Address
    $wp_customize->add_setting('contact_address', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('contact_address', [
        'label'   => __('Endereço', 'tema_aromas'),
        'section' => 'tema_aromas_contact_info',
        'type'    => 'textarea',
    ]);

    // Social Media Section
    $wp_customize->add_section('tema_aromas_social_media', [
        'title'    => __('Redes Sociais', 'tema_aromas'),
        'priority' => 31,
    ]);

    // Facebook URL
    $wp_customize->add_setting('facebook_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('facebook_url', [
        'label'   => __('Facebook URL', 'tema_aromas'),
        'section' => 'tema_aromas_social_media',
        'type'    => 'url',
    ]);

    // Instagram URL
    $wp_customize->add_setting('instagram_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('instagram_url', [
        'label'   => __('Instagram URL', 'tema_aromas'),
        'section' => 'tema_aromas_social_media',
        'type'    => 'url',
    ]);

    // WhatsApp Number
    $wp_customize->add_setting('whatsapp_number', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('whatsapp_number', [
        'label'       => __('WhatsApp', 'tema_aromas'),
        'description' => __('Número com código do país (ex: 5511999999999)', 'tema_aromas'),
        'section'     => 'tema_aromas_social_media',
        'type'        => 'text',
    ]);

    // YouTube URL
    $wp_customize->add_setting('youtube_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control('youtube_url', [
        'label'   => __('YouTube URL', 'tema_aromas'),
        'section' => 'tema_aromas_social_media',
        'type'    => 'url',
    ]);

    // Footer Section
    $wp_customize->add_section('tema_aromas_footer', [
        'title'    => __('Rodapé', 'tema_aromas'),
        'priority' => 32,
    ]);

    // Footer Description
    $wp_customize->add_setting('footer_description', [
        'default'           => __('Desperte seus sentidos com nossa coleção exclusiva de aromas premium. Qualidade, sofisticação e bem-estar em cada produto.', 'tema_aromas'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('footer_description', [
        'label'   => __('Descrição do Rodapé', 'tema_aromas'),
        'section' => 'tema_aromas_footer',
        'type'    => 'textarea',
    ]);

    // Footer Text
    $wp_customize->add_setting('footer_text', [
        'default'           => __('© 2024 Tema Aromas. Todos os direitos reservados.', 'tema_aromas'),
        'sanitize_callback' => 'wp_kses_post',
    ]);

    $wp_customize->add_control('footer_text', [
        'label'   => __('Texto de Copyright', 'tema_aromas'),
        'section' => 'tema_aromas_footer',
        'type'    => 'textarea',
    ]);

    // Newsletter Section
    $wp_customize->add_setting('newsletter_title', [
        'default'           => __('Receba Novidades', 'tema_aromas'),
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('newsletter_title', [
        'label'   => __('Título da Newsletter', 'tema_aromas'),
        'section' => 'tema_aromas_footer',
        'type'    => 'text',
    ]);

    $wp_customize->add_setting('newsletter_text', [
        'default'           => __('Cadastre-se para receber ofertas exclusivas e novidades sobre nossos produtos aromáticos.', 'tema_aromas'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);

    $wp_customize->add_control('newsletter_text', [
        'label'   => __('Texto da Newsletter', 'tema_aromas'),
        'section' => 'tema_aromas_footer',
        'type'    => 'textarea',
    ]);
}
add_action('customize_register', 'tema_aromas_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function tema_aromas_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function tema_aromas_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
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