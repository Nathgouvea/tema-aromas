<?php
/**
 * Template Name: Trocas e Devoluções
 *
 * @package Tema_Aromas
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="luxury-container">
        <!-- Page Header -->
        <section class="page-header-section">
            <div class="page-header-content">
                <h1 class="page-title">Política de Trocas e Devoluções</h1>
                <p class="page-subtitle">Conheça seus direitos e como solicitar a devolução de produtos</p>
            </div>
        </section>

        <!-- Returns Policy Content -->
        <section class="legal-content-section">
            <div class="luxury-container">
                <div class="legal-content">
                    <div class="legal-intro">
                        <p class="legal-intro-text">
                            Na Zen Secrets, sua satisfação é nossa prioridade. Confira abaixo nossa política
                            de devoluções, elaborada em conformidade com o Código de Defesa do Consumidor (CDC).
                        </p>
                    </div>

                    <div class="legal-sections">
                        <div class="legal-section">
                            <h2 class="legal-section-title">1. Direito de Arrependimento (CDC Art. 49)</h2>
                            <div class="legal-section-content">
                                <p>Conforme o Código de Defesa do Consumidor, você tem o direito de devolver
                                produtos comprados online <strong>em até 7 dias corridos</strong> após o recebimento,
                                sem necessidade de justificativa.</p>

                                <div class="highlight-box">
                                    <h3>Condições para Devolução:</h3>
                                    <ul>
                                        <li><strong>Prazo:</strong> 7 dias corridos contados a partir do recebimento</li>
                                        <li><strong>Estado do produto:</strong> Sem uso, na embalagem original</li>
                                        <li><strong>Acompanhamentos:</strong> Todos os acessórios e nota fiscal devem ser devolvidos</li>
                                        <li><strong>Embalagem:</strong> Íntegra e sem violação</li>
                                    </ul>
                                </div>

                                <p><strong>Importante:</strong> Produtos de aromaterapia que tiveram a embalagem violada
                                ou foram utilizados NÃO podem ser devolvidos por questões de higiene e segurança.</p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">2. Não Realizamos Trocas Diretas</h2>
                            <div class="legal-section-content">
                                <p>Por questões logísticas e para agilizar o processo, <strong>não oferecemos troca
                                direta de produtos</strong>.</p>

                                <div class="process-box">
                                    <h3>Como funciona:</h3>
                                    <ol>
                                        <li><strong>Solicite a devolução:</strong> Entre em contato dentro do prazo</li>
                                        <li><strong>Receba o reembolso:</strong> Após análise, devolvemos o valor pago</li>
                                        <li><strong>Faça novo pedido:</strong> Você pode realizar uma nova compra com o produto desejado</li>
                                    </ol>
                                </div>

                                <p><em>Esta política garante mais agilidade e transparência no processo de devolução.</em></p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">3. Como Solicitar Devolução</h2>
                            <div class="legal-section-content">
                                <p>Para solicitar a devolução do seu produto, siga estas etapas:</p>

                                <div class="steps-box">
                                    <h3>Passo 1: Entre em Contato</h3>
                                    <p>Solicite a devolução <strong>em até 7 dias corridos</strong> após receber o produto:</p>
                                    <div class="contact-info-box">
                                        <p><strong>WhatsApp:</strong> <?php echo esc_html(TEMA_AROMAS_WHATSAPP_DISPLAY); ?> (forma mais rápida)</p>
                                        <p><strong>E-mail:</strong> <?php echo esc_html(TEMA_AROMAS_EMAIL); ?></p>
                                        <p><strong>Formulário:</strong> <a href="<?php echo esc_url(home_url('/fale-conosco/')); ?>">Página Fale Conosco</a></p>
                                    </div>

                                    <h3>Passo 2: Informe os Dados</h3>
                                    <p>Na sua solicitação, inclua:</p>
                                    <ul>
                                        <li>Número do pedido</li>
                                        <li>Nome completo usado na compra</li>
                                        <li>Motivo da devolução (opcional, mas ajuda a melhorarmos)</li>
                                        <li>Fotos do produto e embalagem (se houver defeito)</li>
                                    </ul>

                                    <h3>Passo 3: Aguarde Instruções</h3>
                                    <p>Nossa equipe responderá em até 24 horas úteis com:</p>
                                    <ul>
                                        <li>Confirmação da aprovação da devolução</li>
                                        <li>Endereço para envio do produto</li>
                                        <li>Orientações sobre embalagem e envio</li>
                                    </ul>

                                    <h3>Passo 4: Envie o Produto</h3>
                                    <p>Após receber nossas instruções:</p>
                                    <ul>
                                        <li>Embale o produto com cuidado na embalagem original</li>
                                        <li>Inclua todos os acessórios e a nota fiscal</li>
                                        <li>Envie pelos Correios com código de rastreamento</li>
                                        <li>Guarde o comprovante de postagem</li>
                                    </ul>
                                    <p class="warning-box"><strong>Atenção:</strong> O frete de devolução é por conta
                                    do cliente, exceto em casos de defeito ou erro no envio.</p>
                                </div>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">4. Reembolso</h2>
                            <div class="legal-section-content">
                                <h3>4.1 Prazo para Reembolso</h3>
                                <p>Após recebermos e analisarmos o produto devolvido:</p>
                                <ul>
                                    <li><strong>Análise do produto:</strong> Até 3 dias úteis após recebimento</li>
                                    <li><strong>Processamento do reembolso:</strong> Até 5 dias úteis após aprovação</li>
                                    <li><strong>Crédito na conta:</strong> Conforme prazo da operadora do cartão (até 2 faturas)</li>
                                </ul>

                                <h3>4.2 Forma de Reembolso</h3>
                                <p>O reembolso é realizado através da <strong>mesma forma de pagamento</strong> utilizada na compra:</p>
                                <ul>
                                    <li><strong>Cartão de crédito:</strong> Estorno na fatura (pode levar 1-2 ciclos)</li>
                                    <li><strong>PIX/Boleto:</strong> Depósito em conta corrente informada</li>
                                    <li><strong>Outros:</strong> Conforme meio de pagamento original</li>
                                </ul>

                                <h3>4.3 Valor do Reembolso</h3>
                                <p>O valor reembolsado corresponde a:</p>
                                <ul>
                                    <li><strong>Produto:</strong> Valor integral pago</li>
                                    <li><strong>Frete:</strong> Reembolsado apenas se o erro foi nosso (defeito ou produto errado)</li>
                                </ul>
                                <p><em>O frete de devolução NÃO é reembolsado em caso de arrependimento.</em></p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">5. Produtos com Defeito ou Erro no Envio</h2>
                            <div class="legal-section-content">
                                <p>Se você recebeu um produto com defeito ou diferente do pedido:</p>

                                <h3>5.1 Responsabilidade da Loja</h3>
                                <ul>
                                    <li><strong>Prazo estendido:</strong> Até 30 dias para reclamar (Garantia Legal)</li>
                                    <li><strong>Frete de devolução:</strong> Por nossa conta</li>
                                    <li><strong>Frete de reenvio:</strong> Por nossa conta (se preferir receber produto substituto)</li>
                                    <li><strong>Reembolso completo:</strong> Incluindo o frete pago</li>
                                </ul>

                                <h3>5.2 Como Proceder</h3>
                                <ol>
                                    <li><strong>Fotografe:</strong> Tire fotos do defeito ou produto errado</li>
                                    <li><strong>Não use:</strong> Mantenha o produto sem uso</li>
                                    <li><strong>Entre em contato:</strong> O mais rápido possível via WhatsApp ou e-mail</li>
                                    <li><strong>Aguarde instruções:</strong> Enviaremos etiqueta de devolução ou código de postagem</li>
                                </ol>

                                <p class="highlight-box"><strong>Importante:</strong> Em casos de defeito ou erro nosso,
                                assumimos todos os custos de devolução e reenvio.</p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">6. Produtos Que NÃO Podem Ser Devolvidos</h2>
                            <div class="legal-section-content">
                                <p>Por questões de higiene, segurança e características do produto, NÃO aceitamos
                                devolução de:</p>
                                <ul>
                                    <li><strong>Produtos com embalagem violada:</strong> Que tiveram o lacre rompido</li>
                                    <li><strong>Produtos utilizados:</strong> Mesmo que parcialmente</li>
                                    <li><strong>Produtos danificados pelo cliente:</strong> Danos causados após o recebimento</li>
                                    <li><strong>Produtos personalizados:</strong> Feitos sob encomenda específica</li>
                                    <li><strong>Produtos em promoção:</strong> Quando especificado como "venda final" na descrição</li>
                                </ul>
                                <p><em>Exceções são feitas apenas em casos de defeito de fabricação ou erro no envio.</em></p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">7. Cancelamento de Pedido</h2>
                            <div class="legal-section-content">
                                <h3>7.1 Antes do Envio</h3>
                                <p>Você pode solicitar o cancelamento <strong>a qualquer momento antes do envio</strong>:</p>
                                <ul>
                                    <li>Entre em contato imediatamente pelo WhatsApp</li>
                                    <li>Reembolso integral em até 5 dias úteis</li>
                                    <li>Sem custos adicionais</li>
                                </ul>

                                <h3>7.2 Após o Envio</h3>
                                <p>Após a postagem, não é possível cancelar. Neste caso:</p>
                                <ul>
                                    <li>Aguarde o recebimento do produto</li>
                                    <li>Solicite devolução dentro dos 7 dias (direito de arrependimento)</li>
                                    <li>Frete de devolução será por sua conta</li>
                                </ul>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">8. Dúvidas e Contato</h2>
                            <div class="legal-section-content">
                                <p>Para questões sobre devoluções, trocas ou reembolsos:</p>
                                <div class="contact-info-box">
                                    <p><strong>WhatsApp (mais rápido):</strong> <?php echo esc_html(TEMA_AROMAS_WHATSAPP_DISPLAY); ?></p>
                                    <p><strong>E-mail:</strong> <?php echo esc_html(TEMA_AROMAS_EMAIL); ?></p>
                                    <p><strong>Instagram:</strong> <?php echo esc_html(TEMA_AROMAS_INSTAGRAM_DISPLAY); ?></p>
                                    <p><strong>Formulário:</strong> <a href="<?php echo esc_url(home_url('/fale-conosco/')); ?>">Página Fale Conosco</a></p>
                                </div>
                                <p><strong>Horário de atendimento:</strong> Segunda a sexta, das 9h às 18h</p>
                                <p><strong>Tempo de resposta:</strong> Até 24 horas úteis</p>
                            </div>
                        </div>

                        <div class="legal-section">
                            <h2 class="legal-section-title">9. Direitos do Consumidor</h2>
                            <div class="legal-section-content">
                                <p>Esta política está em conformidade com:</p>
                                <ul>
                                    <li><strong>Código de Defesa do Consumidor (Lei 8.078/90)</strong> - Art. 49 (Direito de Arrependimento)</li>
                                    <li><strong>Decreto 7.962/2013</strong> - Comércio eletrônico</li>
                                    <li><strong>Lei Geral de Proteção de Dados (LGPD)</strong> - Proteção de informações pessoais</li>
                                </ul>
                                <p>Para mais informações sobre seus direitos, consulte o site do
                                <a href="https://www.gov.br/consumidor/pt-br" target="_blank" rel="noopener noreferrer">Ministério da Justiça</a> ou
                                <a href="https://www.procon.sp.gov.br/" target="_blank" rel="noopener noreferrer">Procon</a>.</p>
                            </div>
                        </div>
                    </div>

                    <div class="legal-footer">
                        <p><strong>Última atualização:</strong> <?php echo date('d/m/Y'); ?></p>
                        <p>Esta política pode ser alterada a qualquer momento. Recomendamos consultá-la regularmente.</p>
                        <p><strong>Dúvidas?</strong> Entre em contato conosco. Estamos aqui para ajudar!</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>
