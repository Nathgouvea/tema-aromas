<?php
/**
 * Template Name: Página Fale Conosco
 * Description: Página de contato com formulário e informações.
 *
 * @package TemaAromas
 * @version 1.0.0
 */

get_header(); ?>

<div class="luxury-container">
    <main id="main" class="site-main">
        <article id="page-fale-conosco" class="page-content luxury-page">
            
            <!-- Hero Section -->
            <section class="hero-section contato-hero">
                <div class="hero-content">
                    <h1 class="luxury-heading hero-title">
                        <?php esc_html_e('Fale Conosco', 'tema_aromas'); ?>
                    </h1>
                    <p class="hero-subtitle">
                        <?php esc_html_e('Estamos aqui para ajudar! Entre em contato conosco para dúvidas, sugestões ou informações sobre nossos produtos aromáticos.', 'tema_aromas'); ?>
                    </p>
                </div>
            </section>

            <!-- Contact Methods -->
            <section class="content-section contact-methods">
                <div class="contact-grid">
                    <div class="contact-card animate-fade-in-up">
                        <div class="contact-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <h3><?php esc_html_e('Telefone', 'tema_aromas'); ?></h3>
                        <p><?php esc_html_e('(11) 99999-9999', 'tema_aromas'); ?></p>
                        <small><?php esc_html_e('Segunda a sexta, 9h às 18h', 'tema_aromas'); ?></small>
                    </div>
                    
                    <div class="contact-card animate-fade-in-up">
                        <div class="contact-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                <polyline points="22,6 12,13 2,6"/>
                            </svg>
                        </div>
                        <h3><?php esc_html_e('E-mail', 'tema_aromas'); ?></h3>
                        <p>contato@zensecrets.com.br</p>
                        <small><?php esc_html_e('Respondemos em até 24h', 'tema_aromas'); ?></small>
                    </div>
                    
                    <div class="contact-card animate-fade-in-up">
                        <div class="contact-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                                <circle cx="12" cy="10" r="3"/>
                            </svg>
                        </div>
                        <h3><?php esc_html_e('Endereço', 'tema_aromas'); ?></h3>
                        <p><?php esc_html_e('São Paulo, SP', 'tema_aromas'); ?></p>
                        <small><?php esc_html_e('Entregamos para todo o Brasil', 'tema_aromas'); ?></small>
                    </div>
                    
                    <div class="contact-card animate-fade-in-up">
                        <div class="contact-icon">
                            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/>
                            </svg>
                        </div>
                        <h3><?php esc_html_e('Redes Sociais', 'tema_aromas'); ?></h3>
                        <p>@zensecrets</p>
                        <small><?php esc_html_e('Siga-nos para novidades', 'tema_aromas'); ?></small>
                    </div>
                </div>
            </section>

            <!-- Contact Form -->
            <section class="content-section contact-form-section">
                <div class="section-header">
                    <h2 class="luxury-heading section-title">
                        <?php esc_html_e('Envie sua Mensagem', 'tema_aromas'); ?>
                    </h2>
                    <p class="section-subtitle">
                        <?php esc_html_e('Preencha o formulário abaixo e entraremos em contato o mais breve possível.', 'tema_aromas'); ?>
                    </p>
                </div>
                
                <div class="contact-form-container">
                    <?php
                    // Check if form was submitted
                    if (isset($_POST['contact_form_submit']) && wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_action')) {
                        
                        // Sanitize form data
                        $name = sanitize_text_field($_POST['contact_name']);
                        $email = sanitize_email($_POST['contact_email']);
                        $phone = sanitize_text_field($_POST['contact_phone']);
                        $subject = sanitize_text_field($_POST['contact_subject']);
                        $message = sanitize_textarea_field($_POST['contact_message']);
                        
                        // Validate required fields
                        $errors = array();
                        if (empty($name)) $errors[] = 'Nome é obrigatório';
                        if (empty($email) || !is_email($email)) $errors[] = 'E-mail válido é obrigatório';
                        if (empty($message)) $errors[] = 'Mensagem é obrigatória';
                        
                        if (empty($errors)) {
                            // Send email
                            $to = get_option('admin_email');
                            $email_subject = 'Contato do site - ' . $subject;
                            $email_message = "Nome: $name\n";
                            $email_message .= "E-mail: $email\n";
                            $email_message .= "Telefone: $phone\n";
                            $email_message .= "Assunto: $subject\n\n";
                            $email_message .= "Mensagem:\n$message";
                            
                            $headers = array(
                                'Content-Type: text/plain; charset=UTF-8',
                                'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
                                'Reply-To: ' . $name . ' <' . $email . '>'
                            );
                            
                            if (wp_mail($to, $email_subject, $email_message, $headers)) {
                                echo '<div class="contact-success"><p>' . esc_html__('Mensagem enviada com sucesso! Entraremos em contato em breve.', 'tema_aromas') . '</p></div>';
                            } else {
                                echo '<div class="contact-error"><p>' . esc_html__('Erro ao enviar mensagem. Tente novamente.', 'tema_aromas') . '</p></div>';
                            }
                        } else {
                            echo '<div class="contact-error"><ul>';
                            foreach ($errors as $error) {
                                echo '<li>' . esc_html($error) . '</li>';
                            }
                            echo '</ul></div>';
                        }
                    }
                    ?>
                    
                    <form method="post" class="contact-form luxury-form" novalidate>
                        <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_name"><?php esc_html_e('Nome Completo', 'tema_aromas'); ?> *</label>
                                <input type="text" id="contact_name" name="contact_name" required 
                                       value="<?php echo isset($_POST['contact_name']) ? esc_attr($_POST['contact_name']) : ''; ?>"
                                       class="luxury-form-input">
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_email"><?php esc_html_e('E-mail', 'tema_aromas'); ?> *</label>
                                <input type="email" id="contact_email" name="contact_email" required 
                                       value="<?php echo isset($_POST['contact_email']) ? esc_attr($_POST['contact_email']) : ''; ?>"
                                       class="luxury-form-input">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_phone"><?php esc_html_e('Telefone', 'tema_aromas'); ?></label>
                                <input type="tel" id="contact_phone" name="contact_phone" 
                                       value="<?php echo isset($_POST['contact_phone']) ? esc_attr($_POST['contact_phone']) : ''; ?>"
                                       class="luxury-form-input" placeholder="(11) 99999-9999">
                            </div>
                            
                            <div class="form-group">
                                <label for="contact_subject"><?php esc_html_e('Assunto', 'tema_aromas'); ?></label>
                                <select id="contact_subject" name="contact_subject" class="luxury-form-input">
                                    <option value=""><?php esc_html_e('Selecione um assunto', 'tema_aromas'); ?></option>
                                    <option value="Dúvidas sobre produtos" <?php selected(isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '', 'Dúvidas sobre produtos'); ?>><?php esc_html_e('Dúvidas sobre produtos', 'tema_aromas'); ?></option>
                                    <option value="Pedidos e entregas" <?php selected(isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '', 'Pedidos e entregas'); ?>><?php esc_html_e('Pedidos e entregas', 'tema_aromas'); ?></option>
                                    <option value="Trocas e devoluções" <?php selected(isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '', 'Trocas e devoluções'); ?>><?php esc_html_e('Trocas e devoluções', 'tema_aromas'); ?></option>
                                    <option value="Sugestões" <?php selected(isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '', 'Sugestões'); ?>><?php esc_html_e('Sugestões', 'tema_aromas'); ?></option>
                                    <option value="Outros" <?php selected(isset($_POST['contact_subject']) ? $_POST['contact_subject'] : '', 'Outros'); ?>><?php esc_html_e('Outros', 'tema_aromas'); ?></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="contact_message"><?php esc_html_e('Sua Mensagem', 'tema_aromas'); ?> *</label>
                            <textarea id="contact_message" name="contact_message" rows="6" required 
                                      class="luxury-form-input" placeholder="<?php esc_attr_e('Conte-nos como podemos ajudar...', 'tema_aromas'); ?>"><?php echo isset($_POST['contact_message']) ? esc_textarea($_POST['contact_message']) : ''; ?></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" name="contact_form_submit" class="btn-luxury btn-primary">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <line x1="22" y1="2" x2="11" y2="13"></line>
                                    <polygon points="22,2 15,22 11,13 2,9 22,2"></polygon>
                                </svg>
                                <?php esc_html_e('Enviar Mensagem', 'tema_aromas'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <!-- Business Hours -->
            <section class="content-section business-hours">
                <div class="section-header">
                    <h2 class="luxury-heading section-title">
                        <?php esc_html_e('Horário de Atendimento', 'tema_aromas'); ?>
                    </h2>
                </div>
                
                <div class="hours-grid">
                    <div class="hours-card">
                        <h3><?php esc_html_e('Atendimento ao Cliente', 'tema_aromas'); ?></h3>
                        <ul>
                            <li><strong><?php esc_html_e('Segunda a Sexta:', 'tema_aromas'); ?></strong> 9h às 18h</li>
                            <li><strong><?php esc_html_e('Sábado:', 'tema_aromas'); ?></strong> 9h às 14h</li>
                            <li><strong><?php esc_html_e('Domingo:', 'tema_aromas'); ?></strong> <?php esc_html_e('Fechado', 'tema_aromas'); ?></li>
                        </ul>
                    </div>
                    
                    <div class="hours-card">
                        <h3><?php esc_html_e('Processamento de Pedidos', 'tema_aromas'); ?></h3>
                        <ul>
                            <li><strong><?php esc_html_e('Segunda a Sexta:', 'tema_aromas'); ?></strong> <?php esc_html_e('Até 17h', 'tema_aromas'); ?></li>
                            <li><strong><?php esc_html_e('Entrega:', 'tema_aromas'); ?></strong> 1-3 <?php esc_html_e('dias úteis', 'tema_aromas'); ?></li>
                            <li><strong><?php esc_html_e('Frete Grátis:', 'tema_aromas'); ?></strong> <?php esc_html_e('Acima de R$ 150', 'tema_aromas'); ?></li>
                        </ul>
                    </div>
                </div>
            </section>

        </article>
    </main>
</div>

<?php get_footer(); ?>
