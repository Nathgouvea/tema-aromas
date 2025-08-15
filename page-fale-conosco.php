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
            
            <!-- Hero Section with Product Background -->
            <section class="contact-hero-modern">
                <div class="contact-hero-background">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Foto-tela-inicial-.webp" 
                         alt="Produtos Zen Secrets" class="hero-bg-image">
                    <div class="hero-overlay"></div>
                </div>
                <div class="contact-hero-content">
                    <h1 class="contact-hero-title">Fale Conosco</h1>
                    <p class="contact-hero-subtitle">
                        Estamos aqui para ajudar você a encontrar o aroma perfeito para seu ambiente
                    </p>
                </div>
            </section>

            <!-- Main Contact Section - Two Columns -->
            <section class="contact-main-section">
                <div class="contact-two-columns">
                    
                    <!-- Left Column - Contact Information -->
                    <div class="contact-info-column">
                        <div class="contact-methods-title">
                            <h2>Escolha seu canal favorito</h2>
                            <p>Estamos disponíveis em diversos canais</p>
                        </div>
                        
                        <div class="contact-methods-list">
                            <a href="mailto:secretszen888@gmail.com" class="contact-method-item contact-method-link">
                                <div class="contact-method-icon email-icon">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                        <polyline points="22,6 12,13 2,6"/>
                                    </svg>
                                </div>
                                <div class="contact-method-content">
                                    <h3>E-mail</h3>
                                    <p>secretszen888@gmail.com</p>
                                    <small>Resposta em até 24h úteis</small>
                                </div>
                            </a>

                            <a href="https://wa.me/5516991626921" target="_blank" rel="noopener noreferrer" class="contact-method-item contact-method-link">
                                <div class="contact-method-icon whatsapp-icon">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M21.99 6.54c-.76-3.65-3.89-6.54-7.54-6.54-4.14 0-7.5 3.36-7.5 7.5 0 1.32.34 2.64 1 3.78L6.5 18l6.22-1.45c1.14.66 2.46 1 3.78 1 4.14 0 7.5-3.36 7.5-7.5 0-3.65-2.89-6.78-6.01-7.51z"/>
                                        <path d="M8.5 14.5c1.5 1.5 3.5 1.5 5 0"/>
                                    </svg>
                                </div>
                                <div class="contact-method-content">
                                    <h3>WhatsApp</h3>
                                    <p>(16) 99162-6921</p>
                                    <small>Atendimento em horário comercial</small>
                                </div>
                            </a>

                            <a href="https://www.instagram.com/secretszen" target="_blank" rel="noopener noreferrer" class="contact-method-item contact-method-link">
                                <div class="contact-method-icon instagram-icon">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                                    </svg>
                                </div>
                                <div class="contact-method-content">
                                    <h3>Instagram</h3>
                                    <p>@secretszen</p>
                                    <small>Siga-nos para novidades e dicas</small>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Right Column - Contact Form -->
                    <div class="contact-form-column">
                        <div class="contact-form-title">
                            <h2>Envie sua mensagem</h2>
                            <p>Preencha o formulário abaixo e entraremos em contato o mais breve possível</p>
                        </div>

                        <div class="contact-form-container-modern">
                    <?php
                    // Check for Formspree success
                    if (isset($_GET['success']) && $_GET['success'] == '1') {
                        echo '<div class="contact-success"><p>Mensagem enviada com sucesso! Entraremos em contato em breve.</p></div>';
                    }
                    
                    // Check if form was submitted (fallback to WordPress handling)
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
                    
                            <form action="https://formspree.io/f/xovlkqqz" method="post" class="contact-form-modern" novalidate>
                                <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>
                                
                                <!-- Hidden fields for Formspree -->
                                <input type="hidden" name="_subject" value="Novo contato do site Zen Secrets">
                                <input type="hidden" name="_next" value="<?php echo home_url('/fale-conosco?success=1'); ?>">
                                
                                <div class="form-row-modern">
                                    <div class="form-group-modern">
                                        <label for="contact_name">Nome completo*</label>
                                        <div class="input-with-icon">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                                <circle cx="12" cy="7" r="4"/>
                                            </svg>
                                            <input type="text" id="contact_name" name="name" required 
                                                   value="<?php echo isset($_POST['name']) ? esc_attr($_POST['name']) : ''; ?>"
                                                   class="modern-form-input" placeholder="Digite seu nome">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group-modern">
                                        <label for="contact_email">E-mail*</label>
                                        <div class="input-with-icon">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                                <polyline points="22,6 12,13 2,6"/>
                                            </svg>
                                            <input type="email" id="contact_email" name="email" required 
                                                   value="<?php echo isset($_POST['email']) ? esc_attr($_POST['email']) : ''; ?>"
                                                   class="modern-form-input" placeholder="seu@email.com">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group-modern">
                                    <label for="contact_phone">Telefone (opcional)</label>
                                    <div class="input-with-icon">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                                        </svg>
                                        <input type="tel" id="contact_phone" name="phone" 
                                               value="<?php echo isset($_POST['phone']) ? esc_attr($_POST['phone']) : ''; ?>"
                                               class="modern-form-input" placeholder="(00) 00000-0000">
                                    </div>
                                </div>
                                
                                <div class="form-group-modern">
                                    <label for="contact_subject">Assunto*</label>
                                    <select id="contact_subject" name="subject" class="modern-form-input" required>
                                        <option value="">Selecione um assunto</option>
                                        <option value="Dúvidas sobre produtos" <?php selected(isset($_POST['subject']) ? $_POST['subject'] : '', 'Dúvidas sobre produtos'); ?>>Dúvidas sobre produtos</option>
                                        <option value="Pedidos e entregas" <?php selected(isset($_POST['subject']) ? $_POST['subject'] : '', 'Pedidos e entregas'); ?>>Pedidos e entregas</option>
                                        <option value="Trocas e devoluções" <?php selected(isset($_POST['subject']) ? $_POST['subject'] : '', 'Trocas e devoluções'); ?>>Trocas e devoluções</option>
                                        <option value="Sugestões" <?php selected(isset($_POST['subject']) ? $_POST['subject'] : '', 'Sugestões'); ?>>Sugestões</option>
                                        <option value="Outros" <?php selected(isset($_POST['subject']) ? $_POST['subject'] : '', 'Outros'); ?>>Outros</option>
                                    </select>
                                </div>
                                
                                <div class="form-group-modern">
                                    <label for="contact_message">Mensagem*</label>
                                    <textarea id="contact_message" name="message" rows="6" required 
                                              class="modern-form-input" placeholder="Digite sua mensagem aqui..."><?php echo isset($_POST['message']) ? esc_textarea($_POST['message']) : ''; ?></textarea>
                                </div>
                                
                                <div class="form-actions-modern">
                                    <button type="submit" name="contact_form_submit" class="btn-send-modern">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="22" y1="2" x2="11" y2="13"></line>
                                            <polygon points="22,2 15,22 11,13 2,9 22,2"></polygon>
                                        </svg>
                                        Enviar mensagem
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

        </article>
    </main>
</div>

<?php get_footer(); ?>
