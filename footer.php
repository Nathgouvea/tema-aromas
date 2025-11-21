    </main>

    <footer id="colophon" class="site-footer luxury-footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-sections">
                    <div class="footer-section footer-about">
                        <div class="footer-branding">
                            <div class="footer-logo">
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/logo-nome-branca.png'); ?>" 
                                     alt="<?php echo esc_attr(get_bloginfo('name')); ?>" 
                                     class="footer-logo-img">
                            </div>
                            
                            <p class="footer-description">
                                <?php 
                                $footer_description = get_theme_mod('footer_description', __('Desperte seus sentidos com nossa coleção exclusiva de aromas premium. Qualidade, sofisticação e bem-estar em cada produto.', 'tema_aromas'));
                                echo esc_html($footer_description);
                                ?>
                            </p>
                        </div>

                        <?php tema_aromas_social_links(); ?>
                    </div>

                    <div class="footer-section footer-navigation">
                        <h4 class="footer-title"><?php esc_html_e('Navegação', 'tema_aromas'); ?></h4>
                        <?php if (has_nav_menu('footer')) : ?>
                            <?php wp_nav_menu([
                                'theme_location' => 'footer',
                                'menu_class' => 'footer-menu',
                                'container' => false,
                                'depth' => 1,
                            ]); ?>
                        <?php else : ?>
                            <ul class="footer-menu">
                                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Início', 'tema_aromas'); ?></a></li>
                                <li><a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>"><?php esc_html_e('Loja', 'tema_aromas'); ?></a></li>
                                <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('sobre-os-aromas'))); ?>"><?php esc_html_e('Sobre os Aromas', 'tema_aromas'); ?></a></li>
                                <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('fale-conosco'))); ?>"><?php esc_html_e('Fale Conosco', 'tema_aromas'); ?></a></li>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <div class="footer-section footer-categories">
                        <h4 class="footer-title"><?php esc_html_e('Categorias', 'tema_aromas'); ?></h4>
                        <ul class="footer-categories-list">
                            <li><a href="<?php echo esc_url(get_term_link('aromatizadores', 'product_cat')); ?>"><?php esc_html_e('Aromatizadores', 'tema_aromas'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_term_link('home-spray', 'product_cat')); ?>"><?php esc_html_e('Home Spray', 'tema_aromas'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_term_link('velas-aromaticas', 'product_cat')); ?>"><?php esc_html_e('Velas Aromáticas', 'tema_aromas'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_term_link('kits-especiais', 'product_cat')); ?>"><?php esc_html_e('Kits Especiais', 'tema_aromas'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_term_link('lembrancinhas', 'product_cat')); ?>"><?php esc_html_e('Lembrancinhas', 'tema_aromas'); ?></a></li>
                            <li><a href="<?php echo esc_url(get_term_link('acessorios', 'product_cat')); ?>"><?php esc_html_e('Acessórios', 'tema_aromas'); ?></a></li>
                        </ul>
                    </div>

                    <div class="footer-section footer-contact">
                        <h4 class="footer-title"><?php esc_html_e('Contato', 'tema_aromas'); ?></h4>

                        <?php tema_aromas_contact_info(); ?>
                    </div>
                </div>
            </div>

            <div class="footer-payments">
                <div class="payment-methods">
                    <h5 class="payment-title"><?php esc_html_e('Formas de Pagamento', 'tema_aromas'); ?></h5>
                    <div class="payment-icons">
                        <div class="payment-icon" title="PIX">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/pix.png'); ?>" alt="PIX" width="60" height="auto">
                        </div>

                        <div class="payment-icon" title="Visa">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/visa.png'); ?>" alt="Visa" width="60" height="auto">
                        </div>

                        <div class="payment-icon" title="Mastercard">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/mastercard.png'); ?>" alt="Mastercard" width="60" height="auto">
                        </div>

                        <div class="payment-icon" title="American Express">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/amex.png'); ?>" alt="American Express" width="60" height="auto">
                        </div>

                        <div class="payment-icon" title="Elo">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/elo.png'); ?>" alt="Elo" width="60" height="auto">
                        </div>
                    </div>
                </div>

                <div class="trust-seals">
                    <div class="trust-seal" title="Site Seguro">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            <path d="M9 12l2 2 4-4"></path>
                        </svg>
                        <span><?php esc_html_e('Site Seguro', 'tema_aromas'); ?></span>
                    </div>
                    
                    <div class="trust-seal" title="Entrega Garantida">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="1" y="3" width="15" height="13"></rect>
                            <polygon points="16,8 20,8 23,11 23,16 16,16 16,8"></polygon>
                            <circle cx="5.5" cy="18.5" r="2.5"></circle>
                            <circle cx="18.5" cy="18.5" r="2.5"></circle>
                        </svg>
                        <span><?php esc_html_e('Entrega Garantida', 'tema_aromas'); ?></span>
                    </div>
                </div>
            </div>

            <div class="footer-legal">
                <nav class="legal-navigation" aria-label="<?php esc_attr_e('Links legais', 'tema_aromas'); ?>">
                    <ul class="legal-menu">
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('politica-privacidade'))); ?>"><?php esc_html_e('Política de Privacidade', 'tema_aromas'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('termos-condicoes'))); ?>"><?php esc_html_e('Termos e Condições', 'tema_aromas'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('faq'))); ?>"><?php esc_html_e('FAQ', 'tema_aromas'); ?></a></li>
                    </ul>
                </nav>
            </div>

            <div class="footer-copyright">
                <div class="copyright-content">
                    <p class="footer-text">
                        <?php echo wp_kses_post(get_theme_mod('footer_text', __('© <span id="copyright-year">2025</span> Tema Aromas. Todos os direitos reservados.', 'tema_aromas'))); ?>
                        <span class="footer-divider">|</span>
                        <?php esc_html_e('Desenvolvido com amor por', 'tema_aromas'); ?>
                        <a href="https://pickypixels.studio" target="_blank" rel="noopener noreferrer" class="developer-link">Picky Pixels Studio</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

</div>

<?php wp_footer(); ?>

</body>
</html>
