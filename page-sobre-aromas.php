<?php
/**
 * Template Name: Página Sobre os Aromas
 * Description: Página educativa sobre aromaterapia e nossos produtos.
 *
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<div class="luxury-container">
    <main id="main" class="site-main">
        <article id="page-sobre-aromas" class="page-content luxury-page">

            <section class="page-header-section luxury-section">
                <div class="container">
                    <div class="page-header-content text-center animate-fade-in-up">
                        <h1 class="page-title luxury-heading">Nossos Aromas</h1>
                        <p class="page-subtitle">
                            Descubra nossa coleção exclusiva de fragrâncias naturais, cada uma criada para despertar sensações únicas
                        </p>
                    </div>
                </div>
            </section>

            <?php
            $aromas = tema_aromas_get_aromas();
            if ($aromas) :
            ?>
            <section class="fragrance-pills-section">
                <div class="fragrance-pills-container">
                    <?php foreach ($aromas as $i => $aroma) :
                        $slug = sanitize_title($aroma->post_title);
                    ?>
                        <button class="fragrance-pill<?php echo $i === 0 ? ' active' : ''; ?>" data-fragrance="<?php echo esc_attr($slug); ?>">
                            <?php echo esc_html($aroma->post_title); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="fragrance-accordion-section">
                <div class="fragrance-accordion-container">
                    <?php foreach ($aromas as $i => $aroma) :
                        $slug            = sanitize_title($aroma->post_title);
                        $is_first        = ($i === 0);
                        $familia         = get_post_meta($aroma->ID, '_aroma_familia_olfativa', true);
                        $notas           = get_post_meta($aroma->ID, '_aroma_notas', true);
                        $projecao        = get_post_meta($aroma->ID, '_aroma_projecao', true);
                        $caracteristicas = get_post_meta($aroma->ID, '_aroma_caracteristicas', true);
                        $image_url       = get_the_post_thumbnail_url($aroma->ID, 'large');
                    ?>
                    <div class="fragrance-accordion-item<?php echo $is_first ? ' active' : ''; ?>" id="<?php echo esc_attr($slug); ?>">
                        <button class="fragrance-accordion-header" aria-expanded="<?php echo $is_first ? 'true' : 'false'; ?>" aria-controls="<?php echo esc_attr($slug); ?>-content">
                            <h2><?php echo esc_html($aroma->post_title); ?></h2>
                            <svg class="accordion-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6,9 12,15 18,9"></polyline>
                            </svg>
                        </button>
                        <div id="<?php echo esc_attr($slug); ?>-content" class="fragrance-accordion-content" aria-hidden="<?php echo $is_first ? 'false' : 'true'; ?>">
                            <div class="fragrance-content-grid">
                                <?php if ($image_url) : ?>
                                <div class="fragrance-image">
                                    <img src="<?php echo esc_url($image_url); ?>"
                                         alt="<?php echo esc_attr($aroma->post_title); ?>" loading="lazy" decoding="async">
                                </div>
                                <?php endif; ?>
                                <div class="fragrance-details">
                                    <div class="fragrance-notes">
                                        <?php if ($familia) : ?>
                                        <div class="note-column">
                                            <h4>FAMILIA OLFATIVA</h4>
                                            <p><?php echo esc_html($familia); ?></p>
                                        </div>
                                        <?php endif; ?>
                                        <?php if ($notas) : ?>
                                        <div class="note-column">
                                            <h4>NOTAS</h4>
                                            <p><?php echo esc_html($notas); ?></p>
                                        </div>
                                        <?php endif; ?>
                                        <?php if ($projecao) : ?>
                                        <div class="note-column">
                                            <h4>PROJEÇÃO NO AMBIENTE</h4>
                                            <p><?php echo esc_html($projecao); ?></p>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ($caracteristicas) : ?>
                                    <div class="fragrance-description">
                                        <h4>Características</h4>
                                        <p><?php echo esc_html($caracteristicas); ?></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>

            <section class="content-section cta-section">
                <div class="cta-content">
                    <h2 class="luxury-heading cta-title">
                        <?php esc_html_e('Pronto para Transformar Seu Ambiente?', 'tema_aromas'); ?>
                    </h2>
                    <p class="cta-subtitle">
                        <?php esc_html_e('Explore nossa coleção completa de produtos aromáticos e encontre a fragrância perfeita para cada momento.', 'tema_aromas'); ?>
                    </p>
                    <div class="cta-buttons">
                        <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-luxury btn-primary">
                            <?php esc_html_e('Ver Todos os Produtos', 'tema_aromas'); ?>
                        </a>
                        <a href="<?php 
                            $contato_page = get_page_by_path('fale-conosco');
                            if ($contato_page) {
                                echo esc_url(get_permalink($contato_page));
                            } else {
                                echo esc_url(home_url('/fale-conosco/'));
                            }
                        ?>" class="btn-luxury btn-secondary">
                            <?php esc_html_e('Fale Conosco', 'tema_aromas'); ?>
                        </a>
                    </div>
                </div>
            </section>

        </article>
    </main>
</div>

<?php get_footer(); ?>
