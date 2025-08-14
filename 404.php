<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<div class="luxury-container">
    <div class="content-area">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title luxury-heading"><?php esc_html_e('Oops! Página não encontrada', 'tema_aromas'); ?></h1>
            </header>

            <div class="page-content">
                <div class="error-content luxury-card">
                    <!-- 404 Illustration -->
                    <div class="error-illustration">
                        <svg width="200" height="150" viewBox="0 0 200 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <!-- 404 Text -->
                            <text x="100" y="80" text-anchor="middle" font-family="'Playfair Display', serif" font-size="48" font-weight="700" fill="var(--cor-primaria)">404</text>
                            
                            <!-- Decorative Elements -->
                            <circle cx="50" cy="40" r="3" fill="var(--cor-accent)" opacity="0.6">
                                <animate attributeName="opacity" values="0.6;1;0.6" dur="2s" repeatCount="indefinite"/>
                            </circle>
                            <circle cx="150" cy="40" r="3" fill="var(--cor-accent)" opacity="0.8">
                                <animate attributeName="opacity" values="0.8;1;0.8" dur="2.5s" repeatCount="indefinite"/>
                            </circle>
                            <circle cx="30" cy="120" r="2" fill="var(--cor-gold)" opacity="0.7">
                                <animate attributeName="opacity" values="0.7;1;0.7" dur="3s" repeatCount="indefinite"/>
                            </circle>
                            <circle cx="170" cy="120" r="2" fill="var(--cor-gold)" opacity="0.9">
                                <animate attributeName="opacity" values="0.9;1;0.9" dur="1.8s" repeatCount="indefinite"/>
                            </circle>
                            
                            <!-- Wavy Line -->
                            <path d="M20 100 Q50 90 80 100 T140 100 T180 100" stroke="var(--cor-accent)" stroke-width="2" fill="none" opacity="0.5"/>
                        </svg>
                    </div>

                    <div class="error-message">
                        <h2 class="error-subtitle"><?php esc_html_e('A página que você procura não existe', 'tema_aromas'); ?></h2>
                        <p class="error-description">
                            <?php esc_html_e('Parece que você se perdeu entre nossos aromas. A página que você estava procurando pode ter sido movida, renomeada ou não existe mais.', 'tema_aromas'); ?>
                        </p>
                    </div>

                    <!-- Search Form -->
                    <div class="error-search">
                        <h3><?php esc_html_e('Que tal uma busca?', 'tema_aromas'); ?></h3>
                        <?php get_search_form(); ?>
                    </div>

                    <!-- Quick Links -->
                    <div class="error-links">
                        <h3><?php esc_html_e('Links úteis:', 'tema_aromas'); ?></h3>
                        <div class="quick-links">
                            <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-luxury">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                    <polyline points="9,22 9,12 15,12 15,22"></polyline>
                                </svg>
                                <?php esc_html_e('Página Inicial', 'tema_aromas'); ?>
                            </a>

                            <?php if (class_exists('WooCommerce')) : ?>
                                <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="btn-luxury-outline">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <circle cx="9" cy="21" r="1"></circle>
                                        <circle cx="20" cy="21" r="1"></circle>
                                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                    </svg>
                                    <?php esc_html_e('Nossa Loja', 'tema_aromas'); ?>
                                </a>
                            <?php endif; ?>

                            <a href="<?php echo esc_url(get_permalink(get_page_by_path('fale-conosco'))); ?>" class="btn-luxury-outline">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <?php esc_html_e('Contato', 'tema_aromas'); ?>
                            </a>
                        </div>
                    </div>

                    <!-- Popular Categories -->
                    <?php if (class_exists('WooCommerce')) : ?>
                        <div class="error-categories">
                            <h3><?php esc_html_e('Categorias populares:', 'tema_aromas'); ?></h3>
                            <div class="category-links">
                                <?php
                                $categories = [
                                    'aromatizadores' => __('Aromatizadores', 'tema_aromas'),
                                    'home-spray' => __('Home Spray', 'tema_aromas'),
                                    'velas-aromaticas' => __('Velas Aromáticas', 'tema_aromas'),
                                    'kits-especiais' => __('Kits Especiais', 'tema_aromas'),
                                ];

                                foreach ($categories as $slug => $name) :
                                    $term_link = get_term_link($slug, 'product_cat');
                                    if (!is_wp_error($term_link)) :
                                ?>
                                    <a href="<?php echo esc_url($term_link); ?>" class="category-link">
                                        <?php echo esc_html($name); ?>
                                    </a>
                                <?php 
                                    endif;
                                endforeach; 
                                ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Contact CTA -->
                    <div class="error-contact">
                        <p class="contact-message">
                            <?php esc_html_e('Ainda não encontrou o que procura?', 'tema_aromas'); ?>
                        </p>
                        <p class="contact-description">
                            <?php esc_html_e('Nossa equipe está pronta para ajudar você a encontrar o aroma perfeito.', 'tema_aromas'); ?>
                        </p>
                        
                        <?php if (get_theme_mod('whatsapp_number')) : ?>
                            <a href="https://wa.me/<?php echo esc_attr(preg_replace('/\D/', '', get_theme_mod('whatsapp_number'))); ?>?text=<?php echo urlencode(__('Olá! Preciso de ajuda para encontrar um produto.', 'tema_aromas')); ?>" 
                               class="btn-whatsapp" 
                               target="_blank" 
                               rel="noopener noreferrer">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.726"/>
                                </svg>
                                <?php esc_html_e('Falar no WhatsApp', 'tema_aromas'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<style>
/* 404 Page Specific Styles */
.error-404 {
    text-align: center;
    padding: var(--espacamento-xxl) 0;
}

.error-content {
    max-width: 600px;
    margin: 0 auto;
    padding: var(--espacamento-xxl);
}

.error-illustration {
    margin-bottom: var(--espacamento-xl);
}

.error-subtitle {
    font-size: 1.5rem;
    color: var(--cor-texto);
    margin-bottom: var(--espacamento-md);
    font-weight: 600;
}

.error-description {
    color: var(--cor-accent);
    font-size: 1.125rem;
    line-height: 1.6;
    margin-bottom: var(--espacamento-xl);
}

.error-search,
.error-links,
.error-categories,
.error-contact {
    margin-bottom: var(--espacamento-xl);
    padding-bottom: var(--espacamento-lg);
    border-bottom: 1px solid var(--cor-borda);
}

.error-contact {
    border-bottom: none;
}

.error-search h3,
.error-links h3,
.error-categories h3 {
    font-size: 1.25rem;
    margin-bottom: var(--espacamento-md);
    color: var(--cor-texto);
}

.quick-links {
    display: flex;
    gap: var(--espacamento-md);
    justify-content: center;
    flex-wrap: wrap;
}

.category-links {
    display: flex;
    gap: var(--espacamento-sm);
    justify-content: center;
    flex-wrap: wrap;
}

.category-link {
    display: inline-block;
    padding: var(--espacamento-xs) var(--espacamento-md);
    background: rgba(107, 79, 196, 0.1);
    color: var(--cor-primaria);
    text-decoration: none;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 500;
    transition: var(--transicao-rapida);
}

.category-link:hover {
    background: var(--cor-primaria);
    color: var(--cor-fundo);
    transform: translateY(-2px);
}

.contact-message {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--cor-texto);
    margin-bottom: var(--espacamento-xs);
}

.contact-description {
    color: var(--cor-accent);
    margin-bottom: var(--espacamento-lg);
}

.btn-whatsapp {
    display: inline-flex;
    align-items: center;
    gap: var(--espacamento-xs);
    background: #25D366;
    color: white;
    padding: var(--espacamento-sm) var(--espacamento-lg);
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: var(--transicao-suave);
    box-shadow: var(--sombra-sutil);
}

.btn-whatsapp:hover {
    background: #128C7E;
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--sombra-luxo);
}

@media (max-width: 767px) {
    .error-content {
        padding: var(--espacamento-lg);
    }
    
    .quick-links {
        flex-direction: column;
        align-items: center;
    }
    
    .category-links {
        gap: var(--espacamento-xs);
    }
}
</style>

<?php get_footer(); ?>
