# WooCommerce Email Customization Guide - Tema Aromas

## Overview

Yes, it's absolutely possible to customize the CSS for WooCommerce emails that clients receive! This guide covers all the methods available for the Tema Aromas theme.

## Methods Available

### 1. **Built-in WooCommerce Email Customizer (Recommended)**

**Access Path:** WooCommerce → Settings → Emails

**Features:**

- Visual editor for email templates
- Change colors, fonts, and layouts
- Add your logo and branding
- Preview changes before sending
- No coding required

**Steps:**

1. Go to WooCommerce → Settings → Emails
2. Click "Customize" on any email template
3. Use the visual editor to make changes
4. Save and test

### 2. **Custom CSS File (Advanced - Already Implemented)**

The Tema Aromas theme includes a comprehensive email CSS file at `assets/css/emails.css` with:

- **Luxury Design System**: Premium styling matching your theme
- **Brazilian Market Focus**: Portuguese text and BRL currency
- **Responsive Design**: Mobile-friendly email layouts
- **Brand Consistency**: Zen Secrets branding throughout

### 3. **PHP Customization (Advanced - Already Implemented)**

The theme includes PHP functions in `inc/woocommerce.php` for:

- Custom email headers with logo
- Enhanced email footers with trust indicators
- WhatsApp contact integration
- Brazilian Portuguese translations
- Custom order status labels

## What's Already Customized

### ✅ **Email Styling**

- Luxury purple gradient headers (`#6B4FC4` to `#8B5FD6`)
- Premium typography and spacing
- Elegant product tables and order details
- Trust indicators and social proof
- WhatsApp contact section

### ✅ **Content Customization**

- Portuguese email subjects and content
- Zen Secrets branding and messaging
- Trust indicators (shipping, payment, natural ingredients)
- Social media links (Instagram, Email)
- Payment method icons (Visa, Mastercard, PIX, etc.)

### ✅ **Email Templates**

- Order confirmation emails
- Order status updates
- Shipping notifications
- Completed order emails
- Customer account emails

## How to Test Email Customizations

### 1. **Preview in WooCommerce**

```
WooCommerce → Settings → Emails → [Template] → Preview
```

### 2. **Send Test Email**

```
WooCommerce → Settings → Emails → [Template] → Send Test Email
```

### 3. **Create Test Order**

- Add products to cart
- Complete checkout process
- Check email received

## Customization Options

### **Colors & Branding**

```css
/* Primary brand color */
--cor-primaria: #6b4fc4;

/* Gradient for headers */
background: linear-gradient(135deg, #6b4fc4 0%, #8b5fd6 100%);

/* WhatsApp green */
background: linear-gradient(135deg, #25d366 0%, #128c7e 100%);
```

### **Typography**

```css
/* Email headings */
.email-section-title {
  font-size: 20px;
  font-weight: 600;
  color: #6b4fc4;
}

/* Body text */
.email-content {
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
  line-height: 1.6;
  color: #333;
}
```

### **Layout & Spacing**

```css
/* Email container */
.email-container {
  max-width: 600px;
  margin: 0 auto;
  border-radius: 16px;
  box-shadow: 0 8px 32px rgba(107, 79, 196, 0.12);
}

/* Section spacing */
.email-section {
  margin-bottom: 30px;
}
```

## Advanced Customizations

### **Custom Email Templates**

Create custom email templates in your theme:

```
/woocommerce/emails/
├── customer-completed-order.php
├── customer-processing-order.php
├── customer-on-hold-order.php
└── customer-refunded-order.php
```

### **Conditional Content**

```php
// Show different content for different order statuses
if ($order->get_status() === 'completed') {
    echo '<div class="tracking-info">...</div>';
}
```

### **Dynamic Content**

```php
// Add customer-specific information
$customer_name = $order->get_billing_first_name();
echo '<p>Olá ' . esc_html($customer_name) . '!</p>';
```

## Email Types Available

### **Customer Emails**

- **New Order**: Sent to customer when order is placed
- **Processing Order**: Sent when order status changes to processing
- **Completed Order**: Sent when order is completed
- **Refunded Order**: Sent when order is refunded
- **Cancelled Order**: Sent when order is cancelled

### **Admin Emails**

- **New Order**: Sent to admin when new order is placed
- **Cancelled Order**: Sent to admin when order is cancelled
- **Failed Order**: Sent to admin when payment fails
- **Low Stock**: Sent when products are low in stock

## Best Practices

### **1. Mobile-First Design**

- Keep emails under 600px width
- Use large, touch-friendly buttons
- Test on mobile devices

### **2. Brand Consistency**

- Use consistent colors and fonts
- Include your logo in headers
- Maintain brand voice in content

### **3. Clear Call-to-Actions**

- Prominent buttons for key actions
- Clear next steps for customers
- Easy access to support

### **4. Trust Building**

- Include trust indicators
- Show payment methods
- Provide contact information

## Troubleshooting

### **Common Issues**

**1. Emails not styled correctly**

- Check if email CSS is enqueued
- Verify WooCommerce email hooks are working
- Test with different email clients

**2. Images not displaying**

- Use absolute URLs for images
- Check image file permissions
- Test with different email clients

**3. Custom content not showing**

- Verify hook priorities
- Check if functions are properly hooked
- Test with different order statuses

### **Debug Steps**

1. Enable WordPress debug mode
2. Check WooCommerce logs
3. Test with different email clients
4. Verify theme file permissions

## Email Client Compatibility

### **Well-Supported Features**

- ✅ Basic CSS (colors, fonts, spacing)
- ✅ Tables and layouts
- ✅ Images and logos
- ✅ Links and buttons

### **Limited Support**

- ⚠️ CSS Grid and Flexbox
- ⚠️ Advanced animations
- ⚠️ Custom fonts (use web-safe fonts)
- ⚠️ Complex CSS selectors

### **Recommended Approach**

- Use table-based layouts for critical content
- Keep CSS simple and widely supported
- Test in major email clients (Gmail, Outlook, Apple Mail)
- Provide fallbacks for unsupported features

## Performance Considerations

### **Email Size Optimization**

- Compress images before sending
- Use web-safe fonts when possible
- Minimize CSS and HTML
- Test email delivery times

### **Delivery Best Practices**

- Use reliable SMTP services
- Monitor email delivery rates
- Follow anti-spam guidelines
- Maintain good sender reputation

## Support & Resources

### **Theme Support**

- Check `inc/woocommerce.php` for custom functions
- Review `assets/css/emails.css` for styling
- Use theme hooks and filters

### **WooCommerce Documentation**

- [Email Customization Guide](https://docs.woocommerce.com/document/customise-woocommerce-emails/)
- [Email Hooks Reference](https://docs.woocommerce.com/document/woocommerce-email-hooks/)
- [Template Structure](https://docs.woocommerce.com/document/template-structure/)

### **Testing Tools**

- [Email on Acid](https://www.emailonacid.com/) - Email testing
- [Litmus](https://www.litmus.com/) - Email client testing
- [Mailtrap](https://mailtrap.io/) - Email testing environment

## Quick Start Checklist

- [ ] **Review current email templates** in WooCommerce settings
- [ ] **Test email previews** for different order statuses
- [ ] **Send test emails** to verify styling
- [ ] **Customize colors and branding** using the visual editor
- [ ] **Add your logo** to email headers
- [ ] **Test on mobile devices** for responsiveness
- [ ] **Verify Portuguese translations** are working
- [ ] **Check trust indicators** are displaying correctly
- [ ] **Test WhatsApp contact** functionality
- [ ] **Verify payment method icons** are showing

## Conclusion

The Tema Aromas theme provides comprehensive WooCommerce email customization out of the box. You can:

1. **Use the built-in customizer** for quick visual changes
2. **Modify the CSS file** for advanced styling
3. **Customize PHP functions** for content changes
4. **Create custom templates** for complete control

All emails will maintain the luxury, Brazilian-focused design that matches your website's aesthetic while providing a professional customer experience.

---

**Need Help?** Check the theme documentation or contact support for assistance with advanced customizations.
