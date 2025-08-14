# Tema Aromas - WordPress Theme

![WordPress](https://img.shields.io/badge/WordPress-5.8+-blue?logo=wordpress)
![WooCommerce](https://img.shields.io/badge/WooCommerce-6.0+-purple?logo=woocommerce)
![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?logo=php)
![License](https://img.shields.io/badge/License-GPL%20v2-green)

A luxurious, modern WordPress theme designed specifically for aromatherapy WooCommerce stores in Brazil. Built with premium design aesthetics, accessibility standards, and optimal performance.

## 🌟 Features

### Design & UX
- **Luxurious aesthetic** with elegant color palette and sophisticated shadows
- **Mobile-first responsive design** optimized for all devices
- **Premium typography** with Google Fonts integration
- **Micro-interactions** and smooth transitions for enhanced UX
- **WCAG 2.1 AA accessibility compliance**

### WooCommerce Integration
- **Full WooCommerce compatibility** using official shortcodes and functionality
- **Brazilian market optimization** (pt_BR localization, BRL currency, CEP format)
- **Product galleries** with elegant hover states
- **Mini cart** with luxury styling
- **Checkout optimization** for Brazilian payment methods

### Performance
- **Lighthouse scores 90+** for performance and accessibility
- **Optimized assets** with lazy loading and critical CSS
- **Clean, semantic HTML** structure
- **Minimal JavaScript** approach for better performance

### Brazilian Localization
- **Portuguese (pt_BR)** language support
- **BRL currency formatting** (R$ 99,90)
- **CEP postal code** format support
- **Brazilian payment methods** styling (Pix, Mercado Pago, etc.)
- **Melhor Envio** integration support

## 🛍️ Product Categories

The theme is designed for six main product categories:
- **Aromatizadores** - Essential oil diffusers
- **Home Spray** - Home fragrance sprays  
- **Velas Aromáticas** - Aromatic candles
- **Kits Especiais** - Special gift sets
- **Lembrancinhas** - Party favors and gifts
- **Acessórios** - Aromatherapy accessories

## 🎨 Design System

### Color Palette
```css
--cor-primaria: #6b4fc4;    /* Primary purple */
--cor-texto: #000000;       /* Elegant black */
--cor-fundo: #ffffff;       /* Premium white */
--cor-borda: #e6e6e6;       /* Subtle gray */
--cor-accent: #8b5fd6;      /* Light purple for hover */
--cor-gold: #d4af37;        /* Gold for premium elements */
```

### Typography
- Elegant heading hierarchy (H1 unique per page)
- Generous spacing for sophisticated layout
- Readable contrast ratios (4.5:1 minimum)

## 📁 Project Structure

```
tema_aromas/
├── style.css              # Theme header and main styles
├── functions.php          # Theme setup and functionality
├── theme.json            # Design tokens and theme configuration
├── assets/
│   ├── css/              # Organized CSS files
│   │   ├── base.css      # Typography, layout, luxury utilities
│   │   ├── utilities.css # Helper classes and animations
│   │   └── woocommerce.css # WooCommerce-specific styling
│   └── js/               # Minimal JavaScript
│       ├── main.js       # General interactions
│       ├── accessibility.js # Focus management
│       ├── menu_dropdown.js # Dropdown behavior
│       └── minicart.js   # Mini cart interactions
├── templates/            # PHP template files
├── page-templates/       # Custom page templates
└── inc/                  # Theme includes
```

## 🚀 Installation

1. **Download** the theme files
2. **Upload** to `/wp-content/themes/` directory
3. **Activate** the theme in WordPress admin
4. **Install WooCommerce** plugin
5. **Configure** WooCommerce for Brazilian market:
   - Currency: Brazilian Real (R$)
   - Country: Brazil
   - Enable appropriate payment gateways

## ⚙️ Setup Requirements

### WordPress
- WordPress 5.8 or higher
- PHP 8.0 or higher
- WooCommerce 6.0 or higher

### Recommended Plugins
- **WooCommerce** (required)
- **WooCommerce Extra Checkout Fields for Brazil**
- **Mercado Pago payments for WooCommerce**
- **Melhor Envio** for shipping

### Performance Optimization
- Use a caching plugin (WP Rocket, W3 Total Cache)
- Optimize images (WebP format recommended)
- Use a CDN for better performance

## 🎯 Navigation Structure

### Main Menu
1. **INÍCIO** - Homepage
2. **COMPRAR** - Shop with category dropdown:
   - Aromatizadores
   - Home Spray  
   - Velas Aromáticas
   - Kits Especiais
   - Lembrancinhas
   - Acessórios
3. **SOBRE OS AROMAS** - About page
4. **FALE CONOSCO** - Contact page

### Header Icons
- Search (expandable)
- My Account (WooCommerce)
- Cart with counter (WooCommerce)

## 🛠️ Development

### CSS Architecture
- **BEM methodology** for component naming
- **CSS custom properties** for design tokens
- **Mobile-first** responsive approach
- **Utility classes** for common patterns

### JavaScript Philosophy
- **Minimal JavaScript** approach
- **Progressive enhancement**
- **Accessibility first**
- **No jQuery dependencies** (vanilla JS)

### Accessibility Features
- Semantic HTML structure
- ARIA labels and landmarks
- Keyboard navigation support
- Screen reader compatibility
- Focus management
- Skip links

## 📈 Performance Targets

- **Lighthouse Performance**: 90+
- **Lighthouse Accessibility**: 90+
- **First Contentful Paint**: <2s
- **Largest Contentful Paint**: <2.5s

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Code Standards
- Follow WordPress Coding Standards
- Use proper sanitization and validation
- Maintain WCAG 2.1 AA compliance
- Write semantic, accessible HTML
- Comment complex functionality

## 📝 License

This project is licensed under the GPL v2 License - see the [LICENSE](LICENSE) file for details.

## 🏷️ Version History

### v1.0.0 (Current)
- Initial release
- Complete theme structure
- WooCommerce integration
- Brazilian market optimization
- Accessibility compliance
- Performance optimization

## 📞 Support

For support and questions:
- Create an issue in this repository
- Contact: [your-email@domain.com]

## 🎨 Credits

- **Design**: Luxury aromatherapy aesthetic
- **Icons**: Custom SVG icons
- **Images**: Product photography included
- **Fonts**: Google Fonts integration

---

**Made with ❤️ for the Brazilian aromatherapy market**
