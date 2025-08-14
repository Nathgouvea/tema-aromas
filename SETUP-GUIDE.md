# 🚀 Tema Aromas - Complete Setup Guide

**Quick Setup in 15 minutes** | **Production Ready** | **Brazilian E-commerce Optimized**

---

## 📋 **Pre-Installation Checklist**

Before installing the theme, ensure you have:

- [ ] **WordPress 6.0+** installed and running
- [ ] **PHP 8.0+** (recommended for optimal performance)
- [ ] **MySQL 5.7+** or **MariaDB 10.3+**
- [ ] **Memory Limit:** 256MB minimum (512MB recommended)
- [ ] **Admin Access** to WordPress dashboard
- [ ] **SSL Certificate** installed (recommended for e-commerce)

---

## 🔧 **Step 1: WordPress & Plugin Setup**

### **1.1 Install Required Plugins**

```bash
# Essential Plugins (Install via WordPress Admin)
✅ WooCommerce (Latest Version)
✅ WooCommerce Mercado Pago (Brazilian Payments)
✅ Melhor Envio (Brazilian Shipping)

# Recommended Plugins
✅ Yoast SEO or RankMath (SEO optimization)
✅ WP Rocket or W3 Total Cache (Performance)
✅ Wordfence Security (Security)
✅ UpdraftPlus (Backup)
```

### **1.2 Configure WordPress Settings**

**General Settings:**
- **Site Language:** Portuguese (Brazil)
- **Timezone:** São Paulo (UTC-3)
- **Date Format:** d/m/Y (Brazilian standard)

**Permalink Settings:**
- **Structure:** `/%postname%/` (SEO friendly)

---

## 📦 **Step 2: Theme Installation**

### **2.1 Upload Theme Files**

**Method 1: WordPress Admin (Recommended)**
1. Download `tema-aromas.zip`
2. Go to **Appearance > Themes > Add New**
3. Click **Upload Theme**
4. Select the zip file and click **Install Now**
5. Click **Activate**

**Method 2: FTP Upload**
1. Extract `tema-aromas.zip`
2. Upload `tema-aromas` folder to `/wp-content/themes/`
3. Go to **Appearance > Themes**
4. Click **Activate** on Tema Aromas

### **2.2 Initial Theme Activation**

Upon activation, the theme automatically:

```php
✅ Creates essential WooCommerce pages
✅ Sets up product categories
✅ Configures Brazilian localization
✅ Optimizes performance settings
✅ Sets up navigation menus
```

---

## 🏪 **Step 3: WooCommerce Configuration**

### **3.1 WooCommerce Setup Wizard**

Complete the WooCommerce setup:

1. **Store Location:** Brazil
2. **Currency:** Brazilian Real (R$)
3. **Payment Methods:** 
   - Bank Transfer
   - Mercado Pago (install plugin)
4. **Shipping:** 
   - Melhor Envio integration
   - Manual shipping zones

### **3.2 Essential WooCommerce Settings**

**General Settings:**
```
Store Address: [Your Address]
City: [Your City]
Country: Brazil
Currency: Brazilian Real (R$)
Currency Position: Left with space (R$ 99,90)
Decimal Separator: , (comma)
Thousand Separator: . (period)
```

**Product Settings:**
```
Shop Page: /loja/
Default Product Sorting: Popularity
Add to Cart Behavior: Redirect to cart page
Enable Product Reviews: Yes
```

**Tax Settings:**
```
Enable Taxes: Yes
Prices Include Tax: Yes (Brazilian law)
Display Prices: Including tax
```

### **3.3 Shipping Configuration**

**Brazilian Shipping Zones:**
1. **São Paulo (State):** Free shipping above R$ 200
2. **Southeast Region:** R$ 15 shipping fee
3. **Rest of Brazil:** R$ 25 shipping fee
4. **CEP Integration:** Use Melhor Envio plugin

---

## 🎨 **Step 4: Theme Customization**

### **4.1 Logo and Branding**

1. Go to **Appearance > Customize > Site Identity**
2. Upload your logo (recommended size: 200x100px)
3. Set site title and tagline
4. Upload favicon (32x32px)

### **4.2 Menu Configuration**

**Primary Menu Setup:**
1. Go to **Appearance > Menus**
2. Create new menu: "Menu Principal"
3. Add these items in order:
   ```
   INÍCIO (Homepage)
   COMPRAR (Custom Link: #)
     └── AROMATIZADORES (Product Category)
     └── HOME SPRAY (Product Category)
     └── VELAS AROMÁTICAS (Product Category)
     └── KITS ESPECIAIS (Product Category)
     └── LEMBRANCINHAS (Product Category)
     └── ACESSÓRIOS (Product Category)
   SOBRE OS AROMAS (Page)
   FALE CONOSCO (Page)
   ```
4. Assign to "Header Menu" location

### **4.3 Homepage Content**

The theme uses `front-page.php` with sections:

**Hero Section:**
- Edit via **Pages > Homepage**
- Update hero title and subtitle
- Set call-to-action buttons

**Featured Products:**
- Managed via WooCommerce shortcodes
- Mark products as "Featured" in WooCommerce

**Category Highlights:**
- Automatically displays 6 main categories
- Add category images via **Products > Categories**

---

## 📄 **Step 5: Content Pages Setup**

### **5.1 About Page (Sobre os Aromas)**

1. Go to **Pages > Sobre os Aromas**
2. Add content sections:
   ```
   - Introduction to Aromatherapy
   - Your Brand Story  
   - Product Benefits
   - FAQ Section (uses accordion)
   ```

### **5.2 Contact Page (Fale Conosco)**

1. Go to **Pages > Fale Conosco**
2. Update contact information:
   ```
   - Physical Address
   - Phone Numbers
   - Email Address
   - Business Hours
   - Google Maps Embed
   ```

### **5.3 Legal Pages**

Create and link these essential pages:

**Privacy Policy:**
- Template: WooCommerce privacy policy generator
- Link in footer menu

**Terms & Conditions:**
- Include shipping, returns, and warranty info
- Link in checkout process

**Returns & Exchanges:**
- 7-day return policy (Brazilian law)
- Exchange procedures

---

## 🛒 **Step 6: Product Catalog Setup**

### **6.1 Product Categories**

Set up the 6 main categories with:

**For each category:**
1. **Category Name:** Portuguese names
2. **Description:** SEO-friendly descriptions
3. **Category Image:** 400x400px minimum
4. **Parent Category:** Organize hierarchically

### **6.2 Sample Products**

Add sample products for each category:

**Product Information:**
```
Title: [Product Name in Portuguese]
Description: Detailed product benefits
Short Description: Key selling points
Price: R$ format with decimals
Images: High-quality lifestyle photos
Categories: Assign to appropriate categories
Tags: Aromatherapy-related keywords
```

### **6.3 Product Attributes**

Create useful attributes:
```
Fragrance: Lavanda, Eucalipto, Citrus, etc.
Size: 250ml, 500ml, 1L
Type: Difusor, Vela, Spray
Occasion: Relaxamento, Energia, Sono, etc.
```

---

## 📱 **Step 7: Mobile Optimization**

### **7.1 Mobile Testing**

Test on these devices:
- [ ] iPhone (Safari)
- [ ] Android (Chrome)
- [ ] Tablet (iPad/Android)

**Key Areas to Test:**
- Navigation menu (hamburger)
- Product pages
- Checkout process
- Contact forms

### **7.2 Performance Optimization**

**Enable Caching:**
1. Install WP Rocket or W3 Total Cache
2. Configure basic caching settings
3. Enable GZIP compression
4. Optimize images

**Image Optimization:**
- Use WebP format when possible
- Compress images before upload
- Use appropriate image sizes

---

## 🔍 **Step 8: SEO Configuration**

### **8.1 Install SEO Plugin**

**Yoast SEO Setup:**
1. Install and activate Yoast SEO
2. Run the configuration wizard
3. Set focus keywords for main pages

**Key SEO Settings:**
```
Business Type: LocalBusiness
Organization Name: [Your Business Name]
Logo: [Your Logo URL]
Social Profiles: Add all social media links
```

### **8.2 Essential Meta Information**

**Homepage:**
```
Title: [Business Name] - Aromaterapia Premium no Brasil
Description: Descubra nossa coleção premium de aromatizadores, velas aromáticas e home sprays. Aromaterapia de qualidade para transformar seu ambiente.
```

**Product Pages:**
```
Title: [Product Name] - [Category] | [Business Name]
Description: [Product benefits and key features in Portuguese]
```

---

## 🛡️ **Step 9: Security Setup**

### **9.1 Security Plugin Configuration**

**Wordfence Security:**
1. Install and activate Wordfence
2. Run security scan
3. Enable firewall protection
4. Set up login security

### **9.2 Basic Security Measures**

```
✅ Strong admin passwords
✅ Limited login attempts
✅ Hide WordPress version
✅ Disable file editing in admin
✅ Regular backups scheduled
✅ SSL certificate installed
```

---

## 💳 **Step 10: Payment Setup**

### **10.1 Mercado Pago Configuration**

1. Create Mercado Pago business account
2. Get API credentials (Public Key & Access Token)
3. Configure in **WooCommerce > Settings > Payments**
4. Test with sandbox mode first

**Payment Methods to Enable:**
- PIX (Instant payment)
- Credit Card
- Bank Transfer
- Boleto Bancário

### **10.2 Payment Testing**

**Test Scenarios:**
- [ ] Successful payment
- [ ] Failed payment
- [ ] Refund process
- [ ] Email notifications

---

## 📊 **Step 11: Analytics & Tracking**

### **11.1 Google Analytics**

1. Create Google Analytics account
2. Install tracking code
3. Set up Enhanced E-commerce tracking
4. Configure conversion goals

### **11.2 Facebook Pixel**

1. Create Facebook Business account
2. Install Facebook Pixel
3. Set up conversion tracking
4. Create custom audiences

---

## ✅ **Step 12: Final Testing**

### **12.1 Complete Site Testing**

**Homepage:**
- [ ] Hero section displays correctly
- [ ] Featured products load
- [ ] Category links work
- [ ] Newsletter signup functions

**Product Pages:**
- [ ] Images load properly
- [ ] Add to cart works
- [ ] Price displays correctly (R$ format)
- [ ] Related products show

**Checkout Process:**
- [ ] Cart updates correctly
- [ ] Brazilian address fields work
- [ ] CEP validation functions
- [ ] Payment methods available

**Contact & Forms:**
- [ ] Contact form sends emails
- [ ] Phone number formatting
- [ ] Google Maps displays

### **12.2 Performance Testing**

**Tools to Use:**
- Google PageSpeed Insights
- GTmetrix
- Pingdom
- WebPageTest

**Target Scores:**
- Performance: 90+
- Accessibility: 95+
- Best Practices: 95+
- SEO: 100

---

## 🎯 **Step 13: Go Live**

### **13.1 Pre-Launch Checklist**

- [ ] All content reviewed and proofread
- [ ] Contact information updated
- [ ] Payment methods tested
- [ ] Shipping rates configured
- [ ] SSL certificate installed
- [ ] Analytics tracking installed
- [ ] Backup system configured
- [ ] Security measures implemented

### **13.2 Launch Day**

1. **Switch to Production:**
   - Disable maintenance mode
   - Switch payment methods to live mode
   - Enable caching

2. **Monitor:**
   - Check for any errors
   - Monitor site performance
   - Test key user flows

3. **Announce:**
   - Social media announcement
   - Email to existing customers
   - Update business listings

---

## 🆘 **Troubleshooting**

### **Common Issues**

**Products Not Displaying:**
```
Solution: Check WooCommerce settings
Ensure shop page is set correctly
Verify product categories are assigned
```

**Slow Loading:**
```
Solution: Enable caching plugin
Optimize images
Check hosting performance
Disable unnecessary plugins
```

**Contact Form Not Working:**
```
Solution: Test email functionality
Install SMTP plugin
Check spam folders
Verify form configuration
```

**Payment Issues:**
```
Solution: Check API credentials
Test in sandbox mode
Verify SSL certificate
Check payment gateway logs
```

---

## 📞 **Support Resources**

### **Documentation Links**
- [WordPress Codex](https://codex.wordpress.org/)
- [WooCommerce Documentation](https://woocommerce.com/documentation/)
- [Mercado Pago Developers](https://www.mercadopago.com.br/developers/)

### **Brazilian Specific Resources**
- [E-commerce Brasil](https://www.ecommercebrasil.com.br/)
- [ABCOMM](https://abcomm.org/)
- [Código de Defesa do Consumidor](http://www.planalto.gov.br/ccivil_03/leis/l8078.htm)

---

## 🎉 **Success!**

Your Tema Aromas website is now ready to launch! 

**Next Steps:**
1. Add your products
2. Start marketing campaigns
3. Monitor analytics
4. Collect customer feedback
5. Continuously optimize

**Made with ❤️ for Brazilian aromatherapy businesses** 🇧🇷

*Transform your aromatherapy business with a website that reflects the luxury and tranquility of your products.*
