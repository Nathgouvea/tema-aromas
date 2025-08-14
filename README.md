# 🌟 Tema Aromas - Premium WordPress WooCommerce Theme

**Version:** 1.0.0  
**Author:** Custom Development  
**Requires:** WordPress 6.0+, WooCommerce 7.0+  
**License:** GPL v2 or later  
**Language:** Portuguese (Brazil) - pt_BR

---

## 🎯 **Overview**

Tema Aromas is a luxurious, modern WordPress theme specifically designed for aromatherapy and wellness WooCommerce stores in Brazil. The theme combines premium visual design with robust functionality, featuring a sophisticated purple and gold color scheme that evokes luxury and tranquility.

### ✨ **Key Features**

- 🏪 **Complete WooCommerce Integration** using official shortcodes
- 🇧🇷 **Brazilian Localization** (pt_BR, BRL currency, CEP formatting)
- ♿ **WCAG 2.1 AA Accessibility** compliant
- ⚡ **High Performance** (Lighthouse Score 90+)
- 📱 **Mobile-First Responsive** design
- 🔍 **SEO Optimized** with Open Graph and JSON-LD structured data
- 🎨 **Luxury Design** with animations and premium styling
- 🛡️ **Security Hardened** with modern best practices

---

## 🚀 **Quick Start**

### **1. Installation**

1. Download the theme files
2. Upload to `/wp-content/themes/tema-aromas/`
3. Activate the theme in WordPress admin
4. Install and activate WooCommerce plugin

### **2. Initial Setup**

```bash
# After activation, the theme will automatically:
✅ Create essential pages (Cart, Checkout, My Account)
✅ Set up product categories
✅ Configure Brazilian localization
✅ Optimize performance settings
```

### **3. Required Pages**

The theme automatically creates these pages with proper templates:

- **Homepage** (`front-page.php`) - Hero section with featured products
- **About** (`page-sobre-aromas.php`) - Educational content with FAQ
- **Contact** (`page-fale-conosco.php`) - Contact form and information
- **Categories** (`page-categorias.php`) - Product category showcase
- **Legal Pages** - Terms, Privacy, Returns policies

---

## 🏗️ **Theme Structure**

```
tema-aromas/
├── 📂 assets/
│   ├── 📂 css/
│   │   ├── base.css           # Core styles and typography
│   │   ├── header.css         # Header and navigation
│   │   ├── footer.css         # Footer styling
│   │   ├── pages.css          # Static pages styling
│   │   ├── homepage.css       # Homepage specific styles
│   │   ├── woocommerce.css    # WooCommerce styling
│   │   ├── utilities.css      # Helper classes
│   │   └── critical.css       # Above-the-fold critical CSS
│   └── 📂 js/
│       ├── main.js            # Core functionality
│       ├── menu_dropdown.js   # Navigation dropdowns
│       ├── accessibility.js   # A11y enhancements
│       ├── pages.js          # Static pages interactions
│       ├── homepage.js       # Homepage animations
│       └── minicart.js       # Cart functionality
├── 📂 inc/
│   ├── class-nav-walker.php   # Custom navigation walker
│   ├── customizer.php         # Theme customization
│   ├── template-functions.php # Helper functions
│   └── woocommerce.php        # WooCommerce integration
├── 📂 woocommerce/           # WooCommerce template overrides
├── functions.php             # Main theme functions
├── functions-seo.php         # SEO and meta optimization
├── performance-optimization.php # Performance enhancements
├── theme.json               # WordPress theme configuration
└── 📄 Template Files (.php)  # Page templates
```

---

## 🎨 **Design System**

### **Color Palette**

```css
/* Primary Colors */
--cor-primaria: #6b4fc4; /* Luxury Purple */
--cor-accent: #8b5fd6; /* Light Purple */
--cor-gold: #d4af37; /* Premium Gold */

/* Base Colors */
--cor-texto: #000000; /* Elegant Black */
--cor-fundo: #ffffff; /* Premium White */
--cor-borda: #e6e6e6; /* Subtle Gray */

/* Utility Colors */
--cor-success: #28a745; /* Success Green */
--cor-warning: #ffc107; /* Warning Amber */
--cor-error: #dc3545; /* Error Red */
```

### **Typography**

- **Primary Font:** Inter (Google Fonts)
- **Heading Sizes:** Responsive clamp() functions
- **Line Height:** 1.6 for optimal readability
- **Font Weights:** 400, 500, 600, 700, 800

### **Spacing System**

```css
--espacamento-xs: 0.5rem; /* 8px */
--espacamento-sm: 1rem; /* 16px */
--espacamento-md: 1.5rem; /* 24px */
--espacamento-lg: 2rem; /* 32px */
--espacamento-xl: 3rem; /* 48px */
--espacamento-xxl: 4rem; /* 64px */
```

---

## 🛒 **WooCommerce Integration**

### **Official Shortcodes Used**

```php
// Product Display
[products limit="8" columns="4"]
[product_categories number="6" columns="3"]
[products featured="true" limit="3"]
[recent_products limit="4"]

// Essential Pages
[woocommerce_cart]
[woocommerce_checkout]
[woocommerce_my_account]
[woocommerce_order_tracking]
```

### **Brazilian E-commerce Features**

- 🇧🇷 **Currency:** Real Brasileiro (R$)
- 📮 **CEP:** Brazilian postal code formatting
- 📱 **Phone:** Brazilian phone number masks
- 💳 **Payments:** Mercado Pago integration ready
- 📦 **Shipping:** Melhor Envio compatibility

### **Product Categories**

The theme creates 6 main categories:

1. **AROMATIZADORES** - Essential oil diffusers
2. **HOME SPRAY** - Room fragrances
3. **VELAS AROMÁTICAS** - Scented candles
4. **KITS ESPECIAIS** - Gift sets
5. **LEMBRANCINHAS** - Party favors
6. **ACESSÓRIOS** - Aromatherapy accessories

---

## 📱 **Responsive Design**

### **Breakpoints**

```css
/* Mobile First Approach */
/* Base: 320px+ (Mobile) */

@media (min-width: 768px) {
  /* Tablet */
}
@media (min-width: 1024px) {
  /* Desktop */
}
@media (min-width: 1200px) {
  /* Large Desktop */
}
```

### **Navigation**

- **Mobile:** Hamburger menu with smooth animations
- **Desktop:** Horizontal menu with dropdown categories
- **Accessibility:** Full keyboard navigation support

---

## ♿ **Accessibility Features**

### **WCAG 2.1 AA Compliance**

- ✅ **Color Contrast:** 4.5:1 minimum ratio
- ✅ **Keyboard Navigation:** All interactive elements accessible
- ✅ **Screen Readers:** Semantic HTML and ARIA labels
- ✅ **Focus Management:** Visible focus indicators
- ✅ **Skip Links:** Quick navigation for assistive technology

### **ARIA Implementation**

```html
<!-- Navigation -->
<nav aria-label="Menu principal">
  <button aria-expanded="false" aria-haspopup="true">COMPRAR</button>
</nav>

<!-- Forms -->
<label for="email">E-mail</label>
<input id="email" type="email" required aria-describedby="email-help" />

<!-- Status Messages -->
<div role="alert" aria-live="polite">Produto adicionado ao carrinho</div>
```

---

## ⚡ **Performance Optimization**

### **Core Web Vitals Optimization**

- **LCP (Largest Contentful Paint):** < 2.5s
- **FID (First Input Delay):** < 100ms
- **CLS (Cumulative Layout Shift):** < 0.1

### **Optimization Features**

```php
// Critical CSS Inlining
✅ Above-the-fold styles inlined for faster render

// Image Optimization
✅ Lazy loading with intersection observer
✅ Modern format support (WebP)
✅ Responsive images with srcset

// JavaScript Optimization
✅ Deferred loading for non-critical scripts
✅ Async loading for enhanced functionality

// Font Optimization
✅ Preload critical fonts
✅ Font-display: swap for faster text render
```

### **Caching Headers**

```php
// Static Assets: 1 year cache
Cache-Control: public, max-age=31536000

// HTML Pages: 1 hour cache
Cache-Control: public, max-age=3600
```

---

## 🔍 **SEO Features**

### **Meta Tags**

```html
<!-- Open Graph for Social Media -->
<meta property="og:title" content="Page Title" />
<meta property="og:description" content="Page Description" />
<meta property="og:image" content="Featured Image" />
<meta property="og:locale" content="pt_BR" />

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Page Title" />
```

### **Structured Data (JSON-LD)**

```json
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Site Name",
  "description": "Site Description",
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "BR"
  }
}
```

### **Breadcrumbs**

```html
<nav aria-label="Navegação estrutural">
  <ol class="breadcrumb-list">
    <li><a href="/">Início</a></li>
    <li><a href="/loja/">Loja</a></li>
    <li><span>Produto Atual</span></li>
  </ol>
</nav>
```

---

## 🛡️ **Security Features**

### **Headers Implemented**

```php
X-Content-Type-Options: nosniff
X-Frame-Options: SAMEORIGIN
X-XSS-Protection: 1; mode=block
Referrer-Policy: strict-origin-when-cross-origin
```

### **WordPress Hardening**

- ✅ Removed WordPress version disclosure
- ✅ Disabled XML-RPC when not needed
- ✅ Sanitized all user inputs
- ✅ Escaped all outputs
- ✅ Used nonces for form security

---

## 🔧 **Customization**

### **Theme Customizer Options**

Access via **Appearance > Customize**:

1. **Site Identity**

   - Logo upload and configuration
   - Site title and tagline
   - Favicon setup

2. **Colors**

   - Primary color adjustment
   - Accent color modification
   - Background customization

3. **Typography**

   - Font family selection
   - Font size adjustments
   - Line height modifications

4. **Layout Options**
   - Container width settings
   - Sidebar configurations
   - Footer layout choices

### **Custom CSS Variables**

Override default styles by modifying CSS custom properties:

```css
:root {
  --cor-primaria: #your-color; /* Primary color */
  --cor-accent: #your-accent; /* Accent color */
  --espacamento-lg: 3rem; /* Spacing adjustment */
}
```

### **Child Theme Support**

To create a child theme:

```php
// functions.php in child theme
<?php
function child_theme_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}
add_action('wp_enqueue_scripts', 'child_theme_styles');
?>
```

---

## 📋 **Browser Support**

### **Supported Browsers**

| Browser        | Version |
| -------------- | ------- |
| Chrome         | 90+     |
| Firefox        | 88+     |
| Safari         | 14+     |
| Edge           | 90+     |
| iOS Safari     | 14+     |
| Android Chrome | 90+     |

### **Graceful Degradation**

- CSS Grid with Flexbox fallbacks
- Modern features with polyfills
- Progressive enhancement approach

---

## 🚀 **Performance Benchmarks**

### **Lighthouse Scores (Target)**

- **Performance:** 90+ 🟢
- **Accessibility:** 95+ 🟢
- **Best Practices:** 95+ 🟢
- **SEO:** 100 🟢

### **Load Time Targets**

- **First Contentful Paint:** < 1.5s
- **Largest Contentful Paint:** < 2.5s
- **Speed Index:** < 2.0s
- **Total Blocking Time:** < 200ms

---

## 🛠️ **Development**

### **Build Tools**

The theme uses modern development practices:

- **CSS:** Custom properties for maintainability
- **JavaScript:** ES6+ with graceful degradation
- **Performance:** Critical CSS extraction
- **Accessibility:** Automated testing integration

### **Code Standards**

- **PHP:** WordPress Coding Standards
- **CSS:** BEM methodology when beneficial
- **JavaScript:** Modern ES6+ features
- **Accessibility:** WCAG 2.1 AA guidelines

---

## 📞 **Support & Documentation**

### **Getting Help**

1. **Theme Documentation:** This README file
2. **WordPress Codex:** [https://codex.wordpress.org/](https://codex.wordpress.org/)
3. **WooCommerce Docs:** [https://woocommerce.com/documentation/](https://woocommerce.com/documentation/)

### **Common Issues**

**Q: Products not displaying correctly?**
A: Ensure WooCommerce is installed and activated. Check that product categories are properly assigned.

**Q: Contact form not working?**
A: Verify that your WordPress site can send emails. Consider installing an SMTP plugin for better email delivery.

**Q: Page loading slowly?**
A: Enable caching plugin (WP Rocket, W3 Total Cache). Optimize images and consider a CDN.

---

## 📋 **Changelog**

### **Version 1.0.0** - Initial Release

#### ✅ **Added**

- Complete theme implementation
- WooCommerce integration
- Brazilian localization
- Accessibility compliance
- Performance optimization
- SEO implementation
- Mobile-responsive design
- Luxury visual design

#### 🔧 **Technical**

- WordPress 6.0+ compatibility
- WooCommerce 7.0+ support
- PHP 8.0+ optimization
- Modern CSS features
- ES6+ JavaScript

---

## 📄 **License**

This theme is licensed under the GPL v2 or later.

```
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
```

---

## 🎉 **Credits**

- **Design Inspiration:** Modern luxury e-commerce trends
- **Fonts:** Inter by Google Fonts
- **Icons:** Custom SVG icons
- **Images:** Placeholder images for demonstration
- **Development:** Custom WordPress development

---

**Made with ❤️ for the aromatherapy community in Brazil** 🇧🇷

_Transform your aromatherapy business with a theme that reflects the luxury and tranquility of your products._
