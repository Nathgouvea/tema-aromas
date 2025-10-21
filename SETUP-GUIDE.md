# Zen Secrets Theme - Setup Guide for Online Deployment

## Common Issue: Pages/Categories Not Displaying After Theme Upload

If the "Aromas" category page (or other pages) don't display after uploading the theme to your online server, follow these steps:

### 1. Flush Permalinks (MOST IMPORTANT)

After uploading the theme to your live server, you **MUST** flush the permalink structure:

**Steps:**
1. Log into WordPress Admin
2. Go to **Settings → Permalinks**
3. Don't change anything - just click **"Save Changes"** button at the bottom
4. This regenerates the `.htaccess` file and WordPress rewrite rules

**Why this is needed:** WordPress caches URL structures. When you upload a new theme, the old URL rules might conflict with the new structure.

---

### 2. Verify WooCommerce Page Setup

Make sure WooCommerce pages are properly configured:

1. Go to **WooCommerce → Settings → Advanced**
2. Check that these pages are assigned:
   - Shop page
   - Cart page
   - Checkout page
   - My account page
   - Terms and conditions page (optional)

---

### 3. Check Product Categories

The "Aromas" breadcrumb suggests this is a product category. Verify:

1. Go to **Products → Categories**
2. Make sure all categories exist:
   - Aromatizadores
   - Home Spray
   - Velas Aromáticas
   - Kits Especiais
   - Lembrancinhas
   - Acessórios

---

### 4. Verify Navigation Menus

1. Go to **Appearance → Menus**
2. Check that you have a menu assigned to "Header" location
3. Verify all menu items are pointing to the correct pages/categories

---

### 5. Check .htaccess File (if using Apache)

Make sure your `.htaccess` file in the WordPress root has the correct WordPress rules:

```apache
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress
```

**If file permissions prevent automatic writing:** Manually add this code to `.htaccess`

---

### 6. Debugging 404 Errors

If you're getting 404 errors:

**Check:**
- [ ] Permalinks have been flushed (Step 1)
- [ ] The category/page actually exists in the database
- [ ] Your web server has `mod_rewrite` enabled (for Apache)
- [ ] File permissions allow WordPress to write to `.htaccess`

**Enable WordPress Debug Mode:**
1. Edit `wp-config.php`
2. Find: `define('WP_DEBUG', false);`
3. Change to: `define('WP_DEBUG', true);`
4. This will show detailed error messages

---

### 7. Database Export/Import Issues

If you exported the database from local and imported to live:

1. **Search and Replace URLs:** Use a plugin like "Better Search Replace" to change:
   - From: `http://localhost/zensecrets`
   - To: `https://zensecrets.com.br`

2. **Regenerate thumbnails:** Use "Regenerate Thumbnails" plugin

---

### 8. Server Requirements

Make sure your hosting meets these requirements:
- PHP 7.4 or higher (8.0+ recommended)
- MySQL 5.7+ or MariaDB 10.3+
- Apache with mod_rewrite OR Nginx
- Memory limit: 256MB+ recommended
- Max execution time: 300+ seconds

---

### Quick Checklist for "Aromas" Page Not Showing:

1. ✅ Flush permalinks (Settings → Permalinks → Save)
2. ✅ Check if WooCommerce is active
3. ✅ Verify product categories exist (Products → Categories)
4. ✅ Check navigation menu (Appearance → Menus)
5. ✅ Clear browser cache and try incognito mode
6. ✅ Check `.htaccess` file permissions (should be 644)
7. ✅ Verify mod_rewrite is enabled on server

---

## Still Not Working?

**Contact your hosting provider and ask them to:**
1. Enable `mod_rewrite` for Apache
2. Check server error logs for any PHP errors
3. Verify file/folder permissions are correct (folders: 755, files: 644)

**Or enable debug mode to see the actual error:**
```php
// In wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

Check `/wp-content/debug.log` for error messages.

---

## Theme-Specific Pages

This theme includes these special page templates:
- **Template Name: Página Sobre os Aromas** → `page-sobre-aromas.php`
- **Template Name: Página Fale Conosco** → `page-fale-conosco.php`
- **Template Name: Página de Categorias** → `page-categorias.php`

To use them:
1. Create a new page
2. In Page Attributes (right sidebar), select the template
3. Publish the page

---

## Support

For theme support, check:
- Theme documentation
- WordPress.org support forums
- WooCommerce documentation (for product-related issues)
