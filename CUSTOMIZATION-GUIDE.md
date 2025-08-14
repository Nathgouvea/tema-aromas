# 🎨 Tema Aromas - Customization Guide

**Complete Guide for Theme Customization** | **Developer-Friendly** | **Maintainable Code**

---

## 📋 **Overview**

This guide provides comprehensive instructions for customizing the Tema Aromas theme while maintaining code quality, performance, and update compatibility.

**Customization Philosophy:**
- 🔧 **Child Theme Recommended** - Preserve customizations during updates
- 📱 **Mobile-First Approach** - All customizations should be responsive
- ♿ **Accessibility First** - Maintain WCAG 2.1 AA compliance
- ⚡ **Performance Conscious** - Optimize all custom code

---

## 🏗️ **Architecture Overview**

### **Theme Structure**
```
tema-aromas/
├── 📁 assets/
│   ├── 📁 css/         # Modular stylesheets
│   └── 📁 js/          # JavaScript modules
├── 📁 inc/             # PHP includes
├── 📁 woocommerce/     # WooCommerce overrides
├── functions.php       # Main functions
├── functions-seo.php   # SEO functionality
├── performance-optimization.php # Performance features
└── 📄 Template files   # Page templates
```

### **CSS Architecture**
```css
/* Load Order */
1. base.css           /* Foundation styles */
2. header.css         /* Header & navigation */
3. pages.css          /* Static page styles */
4. homepage.css       /* Homepage specific */
5. woocommerce.css    /* E-commerce styles */
6. footer.css         /* Footer styles */
7. utilities.css      /* Helper classes */
```

---

## 👶 **Child Theme Setup**

### **Create Child Theme**

**1. Create Child Theme Folder:**
```bash
/wp-content/themes/tema-aromas-child/
```

**2. Create style.css:**
```css
/*
Theme Name: Tema Aromas Child
Description: Child theme for Tema Aromas
Template: tema-aromas
Version: 1.0.0
*/

/* Your custom styles here */
```

**3. Create functions.php:**
```php
<?php
/**
 * Tema Aromas Child Theme Functions
 */

// Enqueue parent theme styles
function tema_aromas_child_enqueue_styles() {
    // Parent theme styles
    wp_enqueue_style('tema-aromas-parent', 
        get_template_directory_uri() . '/style.css'
    );
    
    // Child theme styles
    wp_enqueue_style('tema-aromas-child', 
        get_stylesheet_directory_uri() . '/style.css',
        array('tema-aromas-parent'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'tema_aromas_child_enqueue_styles');

// Your custom functions here
?>
```

---

## 🎨 **Design Customization**

### **Color Scheme Modification**

**Method 1: CSS Custom Properties (Recommended)**
```css
/* In child theme style.css */
:root {
    /* Primary Colors */
    --cor-primaria: #your-primary-color;
    --cor-accent: #your-accent-color;
    --cor-gold: #your-gold-color;
    
    /* Background Colors */
    --cor-fundo: #your-background;
    --cor-texto: #your-text-color;
    
    /* Utility Colors */
    --cor-success: #your-success-color;
    --cor-warning: #your-warning-color;
    --cor-error: #your-error-color;
}
```

**Method 2: WordPress Customizer**
```php
// In child theme functions.php
function tema_aromas_child_customize_register($wp_customize) {
    // Add color section
    $wp_customize->add_section('tema_aromas_colors', array(
        'title' => 'Cores do Tema',
        'priority' => 30,
    ));
    
    // Primary color control
    $wp_customize->add_setting('primary_color', array(
        'default' => '#6b4fc4',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'primary_color',
        array(
            'label' => 'Cor Primária',
            'section' => 'tema_aromas_colors',
        )
    ));
}
add_action('customize_register', 'tema_aromas_child_customize_register');
```

### **Typography Customization**

**Font Family Changes:**
```css
/* Google Fonts Alternative */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

:root {
    --font-primary: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
    --font-heading: 'Poppins', Georgia, serif;
}

body {
    font-family: var(--font-primary);
}

h1, h2, h3, h4, h5, h6 {
    font-family: var(--font-heading);
}
```

**Font Size Adjustments:**
```css
/* Responsive font scaling */
:root {
    --font-scale: 1.2; /* Increase for larger text */
}

h1 { font-size: calc(2rem * var(--font-scale)); }
h2 { font-size: calc(1.5rem * var(--font-scale)); }
h3 { font-size: calc(1.25rem * var(--font-scale)); }
```

### **Spacing Customization**

**Modify Spacing Scale:**
```css
:root {
    /* Custom spacing values */
    --espacamento-xs: 0.75rem;   /* Increased from 0.5rem */
    --espacamento-sm: 1.25rem;   /* Increased from 1rem */
    --espacamento-md: 2rem;      /* Increased from 1.5rem */
    --espacamento-lg: 2.5rem;    /* Increased from 2rem */
    --espacamento-xl: 4rem;      /* Increased from 3rem */
    --espacamento-xxl: 5rem;     /* Increased from 4rem */
}
```

---

## 📄 **Template Customization**

### **Create Custom Page Templates**

**1. Copy Template to Child Theme:**
```bash
# Copy from parent to child theme
cp /tema-aromas/page.php /tema-aromas-child/page-custom.php
```

**2. Modify Template Header:**
```php
<?php
/**
 * Template Name: Custom Page Template
 * Description: Your custom page layout
 */

get_header(); ?>

<div class="custom-page-layout">
    <!-- Your custom content -->
    <?php while (have_posts()) : the_post(); ?>
        <article class="custom-article">
            <h1><?php the_title(); ?></h1>
            <div class="custom-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
```

### **Homepage Customization**

**Override Homepage Sections:**
```php
// In child theme functions.php
function tema_aromas_child_homepage_hero() {
    ?>
    <section class="custom-hero">
        <div class="luxury-container">
            <h1>Your Custom Hero Title</h1>
            <p>Your custom hero description</p>
            <a href="/loja/" class="btn-luxury btn-primary">
                Shop Now
            </a>
        </div>
    </section>
    <?php
}

// Replace default hero
remove_action('tema_aromas_homepage_hero', 'tema_aromas_display_hero');
add_action('tema_aromas_homepage_hero', 'tema_aromas_child_homepage_hero');
```

### **WooCommerce Template Overrides**

**1. Copy WooCommerce Templates:**
```bash
# Copy to child theme
/tema-aromas-child/woocommerce/single-product.php
/tema-aromas-child/woocommerce/archive-product.php
```

**2. Customize Product Display:**
```php
// Custom product card layout
function tema_aromas_child_product_card() {
    global $product;
    ?>
    <div class="custom-product-card">
        <div class="product-image">
            <?php echo woocommerce_get_product_thumbnail(); ?>
        </div>
        <div class="product-info">
            <h3><?php the_title(); ?></h3>
            <div class="price"><?php echo $product->get_price_html(); ?></div>
            <a href="<?php the_permalink(); ?>" class="btn-luxury btn-secondary">
                Ver Produto
            </a>
        </div>
    </div>
    <?php
}
```

---

## 🔧 **Functionality Customization**

### **Custom Post Types**

**Add Blog Post Type:**
```php
// In child theme functions.php
function tema_aromas_child_register_blog_post_type() {
    register_post_type('blog_aromas', array(
        'labels' => array(
            'name' => 'Blog Posts',
            'singular_name' => 'Blog Post',
        ),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-edit-page',
        'rewrite' => array('slug' => 'blog'),
    ));
}
add_action('init', 'tema_aromas_child_register_blog_post_type');
```

### **Custom Fields**

**Add Product Features:**
```php
// Add custom fields to products
function tema_aromas_child_add_product_fields() {
    woocommerce_wp_text_input(array(
        'id' => '_fragrance_notes',
        'label' => 'Notas de Fragrância',
        'description' => 'Descreva as notas da fragrância',
    ));
    
    woocommerce_wp_text_input(array(
        'id' => '_usage_instructions',
        'label' => 'Instruções de Uso',
        'description' => 'Como usar o produto',
    ));
}
add_action('woocommerce_product_options_general_product_data', 
    'tema_aromas_child_add_product_fields');

// Save custom fields
function tema_aromas_child_save_product_fields($post_id) {
    $fragrance_notes = $_POST['_fragrance_notes'];
    if (!empty($fragrance_notes)) {
        update_post_meta($post_id, '_fragrance_notes', $fragrance_notes);
    }
    
    $usage_instructions = $_POST['_usage_instructions'];
    if (!empty($usage_instructions)) {
        update_post_meta($post_id, '_usage_instructions', $usage_instructions);
    }
}
add_action('woocommerce_process_product_meta', 
    'tema_aromas_child_save_product_fields');
```

### **Custom Widgets**

**Instagram Feed Widget:**
```php
class Tema_Aromas_Instagram_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'tema_aromas_instagram',
            'Instagram Feed',
            array('description' => 'Exibe feed do Instagram')
        );
    }
    
    public function widget($args, $instance) {
        echo $args['before_widget'];
        echo $args['before_title'] . 'Siga-nos no Instagram' . $args['after_title'];
        
        // Instagram feed code here
        echo '<div class="instagram-feed">';
        echo '<!-- Instagram posts -->';
        echo '</div>';
        
        echo $args['after_widget'];
    }
    
    public function form($instance) {
        $username = !empty($instance['username']) ? $instance['username'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('username'); ?>">
                Nome de usuário:
            </label>
            <input class="widefat" 
                   id="<?php echo $this->get_field_id('username'); ?>"
                   name="<?php echo $this->get_field_name('username'); ?>"
                   type="text" 
                   value="<?php echo esc_attr($username); ?>">
        </p>
        <?php
    }
}

// Register widget
function tema_aromas_child_register_widgets() {
    register_widget('Tema_Aromas_Instagram_Widget');
}
add_action('widgets_init', 'tema_aromas_child_register_widgets');
```

---

## 📱 **Mobile Customization**

### **Mobile-Specific Styles**

**Enhanced Mobile Navigation:**
```css
/* Mobile menu customization */
@media (max-width: 767px) {
    .mobile-menu {
        background: linear-gradient(135deg, var(--cor-primaria), var(--cor-accent));
        padding: var(--espacamento-lg);
    }
    
    .mobile-menu-item {
        padding: var(--espacamento-sm);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
    }
    
    .mobile-menu-item:hover {
        background: rgba(255, 255, 255, 0.1);
    }
}
```

**Touch-Friendly Elements:**
```css
/* Increase touch targets */
@media (max-width: 767px) {
    .btn-luxury {
        min-height: 48px; /* Minimum touch target */
        padding: var(--espacamento-md) var(--espacamento-lg);
    }
    
    .product-card {
        margin-bottom: var(--espacamento-lg);
        padding: var(--espacamento-md);
    }
}
```

---

## 🛒 **E-commerce Customization**

### **Custom Checkout Fields**

**Add Delivery Instructions:**
```php
// Add custom checkout field
function tema_aromas_child_checkout_fields($fields) {
    $fields['billing']['delivery_instructions'] = array(
        'label' => 'Instruções de Entrega',
        'placeholder' => 'Ex: Deixar com o porteiro',
        'required' => false,
        'class' => array('form-row-wide'),
        'clear' => true,
        'type' => 'textarea',
        'priority' => 120,
    );
    
    return $fields;
}
add_filter('woocommerce_checkout_fields', 'tema_aromas_child_checkout_fields');

// Save field data
function tema_aromas_child_save_checkout_field($order_id) {
    if (!empty($_POST['delivery_instructions'])) {
        update_post_meta($order_id, 'delivery_instructions', 
            sanitize_textarea_field($_POST['delivery_instructions']));
    }
}
add_action('woocommerce_checkout_update_order_meta', 
    'tema_aromas_child_save_checkout_field');
```

### **Custom Product Badges**

**Add "Novo" Badge:**
```php
// Add new product badge
function tema_aromas_child_new_product_badge() {
    global $product;
    
    $created = strtotime($product->get_date_created());
    $thirty_days_ago = strtotime('-30 days');
    
    if ($created > $thirty_days_ago) {
        echo '<span class="product-badge badge-new">Novo</span>';
    }
}
add_action('woocommerce_before_single_product_summary', 
    'tema_aromas_child_new_product_badge', 15);
```

**Badge Styles:**
```css
.product-badge {
    position: absolute;
    top: var(--espacamento-sm);
    right: var(--espacamento-sm);
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    z-index: 10;
}

.badge-new {
    background: var(--cor-success);
    color: white;
}

.badge-sale {
    background: var(--cor-error);
    color: white;
}
```

---

## 🎯 **Performance Optimization**

### **Custom CSS Optimization**

**Critical CSS for Custom Styles:**
```php
// Add custom critical CSS
function tema_aromas_child_critical_css() {
    if (is_front_page()) {
        ?>
        <style id="child-critical-css">
            /* Your critical styles here */
            .custom-hero {
                min-height: 80vh;
                display: flex;
                align-items: center;
                background: var(--gradiente-luxo);
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'tema_aromas_child_critical_css', 2);
```

### **Conditional Asset Loading**

**Load Scripts Only When Needed:**
```php
// Conditional script loading
function tema_aromas_child_conditional_scripts() {
    // Load Instagram widget script only on pages with widget
    if (is_active_widget(false, false, 'tema_aromas_instagram')) {
        wp_enqueue_script('instagram-feed', 
            get_stylesheet_directory_uri() . '/js/instagram-feed.js',
            array('jquery'),
            '1.0.0',
            true
        );
    }
    
    // Load custom product scripts only on product pages
    if (is_product()) {
        wp_enqueue_script('custom-product', 
            get_stylesheet_directory_uri() . '/js/custom-product.js',
            array('jquery'),
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'tema_aromas_child_conditional_scripts');
```

---

## 🔍 **SEO Customization**

### **Custom Schema Markup**

**Add FAQ Schema:**
```php
function tema_aromas_child_faq_schema() {
    if (is_page('sobre-os-aromas')) {
        $faq_schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => array(
                array(
                    '@type' => 'Question',
                    'name' => 'Como usar aromatizadores?',
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => 'Adicione algumas gotas do óleo essencial...'
                    )
                ),
                // More FAQ items
            )
        );
        
        echo '<script type="application/ld+json">' . 
             json_encode($faq_schema, JSON_UNESCAPED_UNICODE) . 
             '</script>';
    }
}
add_action('wp_head', 'tema_aromas_child_faq_schema');
```

### **Custom Meta Tags**

**Add Custom Meta for Specific Pages:**
```php
function tema_aromas_child_custom_meta() {
    if (is_page('categorias')) {
        echo '<meta name="description" content="Explore nossa coleção completa de produtos de aromaterapia. Aromatizadores, velas, home sprays e muito mais.">';
        echo '<meta name="keywords" content="aromaterapia, aromatizadores, velas aromáticas, home spray">';
    }
}
add_action('wp_head', 'tema_aromas_child_custom_meta');
```

---

## 🛡️ **Security Customization**

### **Additional Security Headers**

```php
// Enhanced security headers
function tema_aromas_child_security_headers() {
    if (!is_admin()) {
        header('Content-Security-Policy: default-src \'self\'; script-src \'self\' \'unsafe-inline\' https://www.google-analytics.com;');
        header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
    }
}
add_action('send_headers', 'tema_aromas_child_security_headers');
```

### **Custom Login Security**

```php
// Custom login form styling
function tema_aromas_child_login_styles() {
    ?>
    <style>
        .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/images/logo-login.png');
            width: 200px;
            height: 100px;
            background-size: contain;
        }
        
        .login form {
            border-radius: 8px;
            box-shadow: var(--sombra-luxo);
        }
    </style>
    <?php
}
add_action('login_head', 'tema_aromas_child_login_styles');
```

---

## 📋 **Testing Custom Changes**

### **Development Workflow**

**1. Local Testing:**
```bash
# Test on local environment first
- Check responsive design
- Validate HTML/CSS
- Test accessibility
- Performance audit
```

**2. Staging Deployment:**
```bash
# Deploy to staging site
- Full functionality testing
- Cross-browser testing
- Mobile device testing
- Performance monitoring
```

**3. Production Deployment:**
```bash
# Deploy to live site
- Backup current site
- Deploy changes
- Monitor for issues
- Performance verification
```

### **Debug Mode**

**Enable WordPress Debug:**
```php
// In wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

**Custom Debug Function:**
```php
// In child theme functions.php
function tema_aromas_child_debug($data, $label = 'Debug') {
    if (WP_DEBUG) {
        error_log($label . ': ' . print_r($data, true));
    }
}

// Usage
tema_aromas_child_debug($custom_data, 'Custom Data Check');
```

---

## 📚 **Documentation Guidelines**

### **Code Documentation**

**PHP Functions:**
```php
/**
 * Custom function description
 *
 * @param string $parameter Description of parameter
 * @return array Description of return value
 * @since 1.0.0
 */
function tema_aromas_child_custom_function($parameter) {
    // Function code here
    return $result;
}
```

**CSS Comments:**
```css
/* ==========================================================================
   Custom Component Name
   ========================================================================== */

/**
 * Component description
 * 
 * 1. Specific reason for style
 * 2. Another specific reason
 */
.custom-component {
    property: value; /* 1 */
    property: value; /* 2 */
}
```

### **Change Log**

**Maintain a changelog in child theme:**
```markdown
# Changelog

## [1.1.0] - 2024-03-15
### Added
- Custom Instagram widget
- Enhanced mobile navigation
- FAQ schema markup

### Changed
- Updated color scheme
- Modified font sizes

### Fixed
- Mobile menu overlap issue
- Contact form validation
```

---

## 🎉 **Best Practices Summary**

### **Do's:**
- ✅ Use child themes for customizations
- ✅ Follow WordPress coding standards
- ✅ Test on multiple devices and browsers
- ✅ Maintain accessibility standards
- ✅ Document all changes
- ✅ Use CSS custom properties
- ✅ Optimize for performance

### **Don'ts:**
- ❌ Modify parent theme files directly
- ❌ Use !important unless absolutely necessary
- ❌ Ignore mobile responsiveness
- ❌ Skip accessibility testing
- ❌ Forget to backup before changes
- ❌ Use inline styles
- ❌ Ignore performance impact

---

## 📞 **Support & Resources**

### **Documentation:**
- [WordPress Developer Handbook](https://developer.wordpress.org/)
- [WooCommerce Developer Resources](https://woocommerce.github.io/code-reference/)
- [CSS Custom Properties Guide](https://developer.mozilla.org/en-US/docs/Web/CSS/Using_CSS_custom_properties)

### **Tools:**
- **Code Validation:** W3C Markup Validator
- **Accessibility:** WAVE Web Accessibility Evaluator
- **Performance:** Google PageSpeed Insights
- **Browser Testing:** BrowserStack

---

**🎨 Happy Customizing!**

*This guide ensures your customizations maintain the luxury, performance, and accessibility standards of Tema Aromas while providing the flexibility to make it uniquely yours.* ✨
