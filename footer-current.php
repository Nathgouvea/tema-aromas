    </main><!-- #main -->

    <footer id="colophon" class="site-footer luxury-footer">
        <div class="container">
            <!-- Footer Content -->
            <div class="footer-content">
                <div class="footer-sections">
                    <!-- Footer Section 1 -->
                    <div class="footer-section footer-about">
                        <div class="footer-branding">
                            <?php if (has_custom_logo()) : ?>
                                <div class="footer-logo">
                                    <?php the_custom_logo(); ?>
                                </div>
                            <?php else : ?>
                                <h3 class="footer-site-title luxury-heading">
                                    <?php bloginfo('name'); ?>
                                </h3>
                            <?php endif; ?>
                            
                            <p class="footer-description">
                                <?php 
                                $footer_description = get_theme_mod('footer_description', __('Desperte seus sentidos com nossa coleção exclusiva de aromas premium. Qualidade, sofisticação e bem-estar em cada produto.', 'tema_aromas'));
                                echo esc_html($footer_description);
                                ?>
                            </p>
                        </div>

                        <!-- Social Links -->
                        <?php tema_aromas_social_links(); ?>
                    </div>

                    <!-- Footer Section 2 - Navigation -->
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

                    <!-- Footer Section 3 - Categories -->
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

                    <!-- Footer Section 4 - Contact -->
                    <div class="footer-section footer-contact">
                        <h4 class="footer-title"><?php esc_html_e('Contato', 'tema_aromas'); ?></h4>
                        
                        <!-- Contact Information -->
                        <?php tema_aromas_contact_info(); ?>
                    </div>
                </div>
            </div>

            <!-- Payment Methods & Trust Seals -->
            <div class="footer-payments">
                <div class="payment-methods">
                    <h5 class="payment-title"><?php esc_html_e('Formas de Pagamento', 'tema_aromas'); ?></h5>
                    <div class="payment-icons">
                        <!-- Mercado Pago -->
                        <div class="payment-icon" title="Mercado Pago">
                            <svg width="40" height="24" viewBox="0 0 40 24" fill="none">
                                <rect width="40" height="24" rx="4" fill="#00B1EA"/>
                                <text x="20" y="16" font-family="Arial, sans-serif" font-size="8" font-weight="bold" text-anchor="middle" fill="white">MP</text>
                            </svg>
                        </div>
                        
                        <!-- Credit Cards -->
                        <div class="payment-icon" title="Cartões de Crédito">
                            <svg width="40" height="24" viewBox="0 0 40 24" fill="none">
                                <rect width="40" height="24" rx="4" fill="#1A1F71"/>
                                <rect x="4" y="8" width="32" height="2" fill="white"/>
                                <rect x="4" y="14" width="12" height="2" fill="white"/>
                            </svg>
                        </div>
                        
                        <!-- PIX -->
                        <div class="payment-icon" title="PIX">
                            <svg width="40" height="24" viewBox="0 0 40 24" fill="none">
                                <rect width="40" height="24" rx="4" fill="#32BCAD"/>
                                <text x="20" y="16" font-family="Arial, sans-serif" font-size="8" font-weight="bold" text-anchor="middle" fill="white">PIX</text>
                            </svg>
                        </div>
                        
                        <!-- Boleto -->
                        <div class="payment-icon" title="Boleto Bancário">
                            <svg width="40" height="24" viewBox="0 0 40 24" fill="none">
                                <rect width="40" height="24" rx="4" fill="#FF6900"/>
                                <rect x="4" y="6" width="32" height="1" fill="white"/>
                                <rect x="4" y="9" width="32" height="1" fill="white"/>
                                <rect x="4" y="12" width="32" height="1" fill="white"/>
                                <rect x="4" y="15" width="32" height="1" fill="white"/>
                                <rect x="4" y="18" width="32" height="1" fill="white"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Trust Seals -->
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

            <!-- Legal Pages -->
            <div class="footer-legal">
                <nav class="legal-navigation" aria-label="<?php esc_attr_e('Links legais', 'tema_aromas'); ?>">
                    <ul class="legal-menu">
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('politica-de-privacidade'))); ?>"><?php esc_html_e('Política de Privacidade', 'tema_aromas'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('termos-e-condicoes'))); ?>"><?php esc_html_e('Termos e Condições', 'tema_aromas'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('trocas-e-devolucoes'))); ?>"><?php esc_html_e('Trocas e Devoluções', 'tema_aromas'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('envio-e-entrega'))); ?>"><?php esc_html_e('Envio e Entrega', 'tema_aromas'); ?></a></li>
                        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('faq'))); ?>"><?php esc_html_e('FAQ', 'tema_aromas'); ?></a></li>
                    </ul>
                </nav>
            </div>

            <!-- Copyright -->
            <div class="footer-copyright">
                <div class="copyright-content">
                    <p class="footer-text">
                        <?php echo wp_kses_post(get_theme_mod('footer_text', __('© 2024 Tema Aromas. Todos os direitos reservados.', 'tema_aromas'))); ?>
                    </p>
                    
                    <p class="developer-credit">
                        <?php esc_html_e('Desenvolvido com', 'tema_aromas'); ?> 
                        <span class="heart" aria-label="amor">💜</span> 
                        <?php esc_html_e('para uma experiência aromática única', 'tema_aromas'); ?>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button (will be created by JavaScript) -->
    
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
