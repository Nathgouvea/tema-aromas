<?php
/**
 * Template Name: Política de Entrega
 *
 * @package Tema_Aromas
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="luxury-container">
        <!-- Page Header -->
        <section class="page-header-section">
            <div class="page-header-content">
                <h1 class="page-title">Política de Entrega</h1>
                <p class="page-subtitle">Informações sobre nosso processo de envio e prazos de entrega</p>
            </div>
        </section>

        <!-- Shipping Policy Content -->
        <section class="legal-content-section">
            <div class="luxury-container">
                <div class="legal-content">
                    <div class="legal-intro">
                        <p class="legal-intro-text">
                            Na Zen Secrets, trabalhamos para que seus produtos cheguem com segurança e
                            dentro do prazo. Confira abaixo todas as informações sobre nossa política de entrega.
                        </p>
                    </div>

                    <div class="legal-sections">
                        <div class="legal-section">
                            <h2 class="legal-section-title">1. Cálculo de Frete</h2>
                            <div class="legal-section-content">
                                <p>O valor do frete é calculado automaticamente durante o processo de checkout,
                                baseado nos seguintes critérios:</p>
                                <ul>
                                    <li><strong>CEP de entrega:</strong> O endereço informado determina o prazo e valor</li>
                                    <li><strong>Peso e dimensões:</strong> Calculados conforme os produtos no carrinho</li>
                                    <li><strong>Modalidade de envio:</strong> Oferecemos diferentes opções com prazos e valores variados</li>
                                </ul>
                                <p><strong>Importante:</strong> O prazo e valor do frete são informados antes de finalizar a compra,
                                permitindo que você escolha a melhor opção.</p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">2. Transportadoras</h2>
                            <div class="legal-section-content">
                                <p>Trabalhamos com transportadoras confiáveis para garantir a segurança dos seus produtos:</p>
                                <ul>
                                    <li><strong>Correios:</strong> Principal parceiro para envios em todo o Brasil</li>
                                    <li><strong>Transportadoras parceiras:</strong> Para regiões específicas e entregas expressas</li>
                                </ul>
                                <p>A escolha da transportadora é feita automaticamente de acordo com seu CEP e
                                disponibilidade no momento da compra.</p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">3. Prazo de Processamento</h2>
                            <div class="legal-section-content">
                                <p>Após a confirmação do pagamento, seu pedido segue o seguinte processo:</p>
                                <ol>
                                    <li><strong>Confirmação de pagamento:</strong> Até 2 dias úteis (para boleto e PIX)</li>
                                    <li><strong>Separação e embalagem:</strong> 1-2 dias úteis</li>
                                    <li><strong>Postagem:</strong> Após a embalagem, o pedido é enviado à transportadora</li>
                                </ol>
                                <p class="highlight-box">
                                    <strong>Atenção:</strong> O prazo de entrega começa a contar <strong>após</strong>
                                    o envio do produto, não da data da compra.
                                </p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">4. Rastreamento do Pedido</h2>
                            <div class="legal-section-content">
                                <p>Você poderá acompanhar seu pedido das seguintes formas:</p>
                                <ul>
                                    <li><strong>E-mail:</strong> Enviaremos o código de rastreamento assim que o pedido for postado</li>
                                    <li><strong>Página de Rastreamento:</strong> Acesse nossa <a href="<?php echo esc_url(home_url('/rastreamento/')); ?>">página de rastreamento</a></li>
                                    <li><strong>Site dos Correios:</strong> Use o código fornecido no site oficial</li>
                                </ul>
                                <p><strong>Prazo de atualização:</strong> As informações de rastreamento podem levar
                                até 24 horas para aparecer após a postagem.</p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">5. Áreas de Entrega</h2>
                            <div class="legal-section-content">
                                <h3>5.1 Abrangência</h3>
                                <p>Realizamos entregas para <strong>todo o território nacional</strong>:</p>
                                <ul>
                                    <li>Capitais e regiões metropolitanas</li>
                                    <li>Interior de todos os estados</li>
                                    <li>Áreas rurais e remotas (prazo estendido)</li>
                                </ul>

                                <h3>5.2 Prazos por Região</h3>
                                <p>Os prazos variam conforme a localidade:</p>
                                <ul>
                                    <li><strong>Região Sudeste:</strong> 3-7 dias úteis</li>
                                    <li><strong>Região Sul:</strong> 5-10 dias úteis</li>
                                    <li><strong>Região Centro-Oeste:</strong> 5-10 dias úteis</li>
                                    <li><strong>Região Nordeste:</strong> 7-12 dias úteis</li>
                                    <li><strong>Região Norte:</strong> 10-15 dias úteis</li>
                                </ul>
                                <p><em>* Prazos aproximados, sujeitos a alterações conforme transportadora.</em></p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">6. Problemas com a Entrega</h2>
                            <div class="legal-section-content">
                                <h3>6.1 Atraso na Entrega</h3>
                                <p>Se seu pedido não chegar no prazo estimado:</p>
                                <ol>
                                    <li>Aguarde 2 dias úteis além do prazo (pode haver atrasos da transportadora)</li>
                                    <li>Verifique o rastreamento para ver a localização do pacote</li>
                                    <li>Entre em contato conosco através dos canais abaixo</li>
                                </ol>

                                <h3>6.2 Produto Extraviado</h3>
                                <p>Em caso de extravio confirmado pela transportadora:</p>
                                <ul>
                                    <li>Realizamos o reenvio do produto sem custos adicionais</li>
                                    <li>Ou processamos o reembolso integral, se preferir</li>
                                    <li>O prazo para resolução é de até 7 dias úteis após a confirmação do extravio</li>
                                </ul>

                                <h3>6.3 Recusa de Entrega</h3>
                                <p>Se a entrega for tentada mas não houver ninguém no endereço:</p>
                                <ul>
                                    <li>A transportadora fará até 3 tentativas de entrega</li>
                                    <li>Após 3 tentativas, o pedido retorna ao remetente</li>
                                    <li>Você será notificado e poderá retirar na agência ou agendar nova entrega</li>
                                </ul>
                                <p><strong>Atenção:</strong> O reenvio após devolução pode gerar custos adicionais
                                de frete.</p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">7. Cuidados ao Receber</h2>
                            <div class="legal-section-content">
                                <p>Ao receber seu pedido, recomendamos:</p>
                                <ol>
                                    <li><strong>Verifique a embalagem:</strong> Confira se não há danos visíveis</li>
                                    <li><strong>Confira os produtos:</strong> Certifique-se de que todos os itens estão corretos</li>
                                    <li><strong>Reporte problemas:</strong> Entre em contato imediatamente se houver danos ou produtos faltando</li>
                                </ol>
                                <p class="highlight-box">
                                    <strong>Importante:</strong> Fotografe a embalagem e os produtos caso identifique
                                    qualquer problema. Isso agiliza o processo de resolução.
                                </p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">8. Contato para Dúvidas sobre Entrega</h2>
                            <div class="legal-section-content">
                                <p>Para questões relacionadas à entrega, entre em contato:</p>
                                <div class="contact-info-box">
                                    <p><strong>WhatsApp:</strong> <?php echo esc_html(TEMA_AROMAS_WHATSAPP_DISPLAY); ?></p>
                                    <p><strong>E-mail:</strong> <?php echo esc_html(TEMA_AROMAS_EMAIL); ?></p>
                                    <p><strong>Instagram:</strong> <?php echo esc_html(TEMA_AROMAS_INSTAGRAM_DISPLAY); ?></p>
                                    <p><strong>Página de Contato:</strong> <a href="<?php echo esc_url(home_url('/fale-conosco/')); ?>">Fale Conosco</a></p>
                                </div>
                                <p><strong>Horário de atendimento:</strong> Segunda a sexta, das 9h às 18h</p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">9. Política de Privacidade</h2>
                            <div class="legal-section-content">
                                <p>Os dados de entrega fornecidos são utilizados exclusivamente para o envio dos produtos
                                e não são compartilhados com terceiros além das transportadoras parceiras.</p>
                                <p>Para mais informações, consulte nossa
                                <a href="<?php echo esc_url(home_url('/politica-privacidade/')); ?>">Política de Privacidade</a>.</p>
                            </div>
                        </div>
                    </div>

                    <div class="legal-footer">
                        <p><strong>Última atualização:</strong> <?php echo date('d/m/Y'); ?></p>
                        <p>Esta política pode ser alterada a qualquer momento. Recomendamos consultá-la regularmente.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
