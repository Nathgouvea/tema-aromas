# Tema Aromas - Required Fixes & Improvements

**Created:** October 10, 2025  
**Priority Levels:** 🔴 Critical | ⚠️ High | 🟡 Medium | 🟢 Low

---

## 🔴 CRITICAL - Fix Immediately

### 1. Fix Cart Fragments (Mini-Cart Broken)

**Priority:** 🔴 CRITICAL  
**File:** `performance-optimization.php` (line ~251-261)  
**Status:** ❌ Not Fixed

**Issue:**  
The `wc-cart-fragments` script is being dequeued on non-shop pages, which breaks the mini-cart counter throughout the site.

**Action Required:**

```php
// Remove or comment out this line:
wp_dequeue_script('wc-cart-fragments');
```

**Testing:**

- [ ] Add product to cart from homepage
- [ ] Verify cart icon counter updates without page refresh
- [ ] Test on all pages (home, about, contact, shop)

---

### 2. Security Vulnerability - Category Creation Endpoint

**Priority:** 🔴 CRITICAL  
**File:** `functions.php` (line ~411)  
**Status:** ❌ Not Fixed

**Issue:**  
Any visitor can trigger category creation via URL parameter without authentication.

**Action Required:**
Add capability check and nonce verification:

```php
if (current_user_can('manage_options') &&
    isset($_GET['create_categories']) &&
    $_GET['create_categories'] === 'yes' &&
    check_admin_referer('create_categories_nonce')) {
    // ... existing code
}
```

**Testing:**

- [ ] Try accessing URL without being logged in (should fail)
- [ ] Try accessing URL as subscriber (should fail)
- [ ] Try accessing URL as admin (should work)

---

### 3. WooCommerce Template Version Numbers

**Priority:** 🔴 CRITICAL  
**Files:**

- `woocommerce/content-product.php` (line 9)
- `woocommerce/cart/mini-cart.php` (line 9)

**Status:** ❌ Not Fixed

**Issue:**  
Template overrides show theme version (1.0.0) instead of WooCommerce template version. This will cause outdated template warnings.

**Action Required:**

1. Check your WooCommerce version (Plugins page)
2. Update `@version` tag to match WooCommerce version
3. Add comment about checking for updates

```php
/**
 * @version 8.6.0  // Update to your WooCommerce version
 *
 * IMPORTANT: This overrides WooCommerce core template.
 * Check WooCommerce > Status > Templates after updates.
 */
```

**Testing:**

- [ ] Go to WooCommerce > Status > Templates
- [ ] Verify no "Outdated templates" warnings appear
- [ ] Document template versions for future reference

---

## ⚠️ HIGH PRIORITY - Fix This Week

### 4. Database Settings Modified by Theme

**Priority:** ⚠️ HIGH  
**File:** `inc/woocommerce-setup.php` (lines 84-119)  
**Status:** ❌ Not Fixed

**Issue:**  
Theme permanently modifies WooCommerce settings in database. These persist after theme deactivation (violates WordPress best practices).

**Action Required:**

1. Create new file: `inc/woocommerce-filters.php`
2. Convert all `update_option()` calls to filters
3. Comment out `tema_aromas_configure_woocommerce_settings()` function
4. Include new file in `functions.php`

**Settings to Convert:**

- `woocommerce_currency` → filter
- `woocommerce_currency_pos` → filter
- `woocommerce_price_decimal_sep` → filter
- `woocommerce_price_thousand_sep` → filter
- `woocommerce_price_num_decimals` → filter
- Guest checkout settings → filter
- Image sizes → filter

**Testing:**

- [ ] Verify R$ currency displays correctly
- [ ] Check number formatting (R$ 1.234,56)
- [ ] Switch to another theme (settings should revert)
- [ ] Switch back to Tema Aromas (settings should apply again)

---

### 5. jQuery Migrate Removal (Compatibility Risk)

**Priority:** ⚠️ HIGH  
**File:** `performance-optimization.php` (lines 192-197)  
**Status:** ❌ Not Fixed

**Issue:**  
Removing jQuery Migrate breaks many WooCommerce extensions (payment gateways, shipping plugins, etc.)

**Action Required:**
Comment out or remove the jQuery re-registration code:

```php
// jQuery Migrate removal - DISABLED for WooCommerce compatibility
// Many extensions require jQuery Migrate
/*
if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), false, NULL);
    wp_enqueue_script('jquery');
}
*/
```

**Testing:**

- [ ] Test Mercado Pago payment gateway
- [ ] Test Melhor Envio shipping
- [ ] Test cart functionality
- [ ] Check browser console for jQuery errors
- [ ] Test with WooCommerce Blocks (if used)

---

### 6. Contact Form Spam Protection

**Priority:** ⚠️ HIGH  
**File:** `page-fale-conosco.php` (line ~103)  
**Status:** ❌ Not Fixed

**Issue:**  
No rate limiting or spam protection on contact form. Vulnerable to:

- Spam submissions
- Email bombing
- Server resource abuse

**Action Required:**
Add rate limiting using transients:

```php
// Rate limiting check
$last_submission = get_transient('contact_form_' . md5($_SERVER['REMOTE_ADDR']));
if ($last_submission) {
    $errors[] = 'Por favor, aguarde 5 minutos antes de enviar outra mensagem.';
} else {
    set_transient('contact_form_' . md5($_SERVER['REMOTE_ADDR']), time(), 5 * MINUTE_IN_SECONDS);
    // ... process form
}
```

**Consider Adding:**

- [ ] Google reCAPTCHA v3
- [ ] Honeypot field
- [ ] Server-side validation
- [ ] Email throttling

**Testing:**

- [ ] Submit form twice quickly (2nd should be blocked)
- [ ] Wait 5 minutes, submit again (should work)
- [ ] Test from different IP addresses

---

## 🟡 MEDIUM PRIORITY - Fix This Month

### 7. Inefficient gettext Filter

**Priority:** 🟡 MEDIUM  
**File:** `functions.php` (lines 510-517)  
**Status:** ❌ Not Fixed

**Issue:**  
Current filter runs on EVERY translated string in WooCommerce (performance impact).

**Action Required:**
Use more specific filter:

```php
// Replace gettext with gettext_with_context for better performance
add_filter('gettext_with_context', function($translated_text, $text, $context, $domain) {
    if ($domain === 'woocommerce' && $context === 'Order action button') {
        if ($text === 'View') {
            return 'Ver';
        }
    }
    return $translated_text;
}, 10, 4);
```

**Testing:**

- [ ] Verify "Ver" still appears in My Account orders table
- [ ] Check page load time (should be slightly faster)
- [ ] Test with translation plugins

---

### 8. Hardcoded Contact Information

**Priority:** 🟡 MEDIUM  
**Files:** Multiple (37 instances found)  
**Status:** ❌ Not Fixed

**Issue:**  
Contact information hardcoded in multiple files. Changing WhatsApp/email requires editing many files.

**Action Required:**

1. Add constants to `functions.php`:

```php
define('TEMA_AROMAS_WHATSAPP', '5516991626921');
define('TEMA_AROMAS_WHATSAPP_URL', 'https://wa.me/5516991626921');
define('TEMA_AROMAS_INSTAGRAM', '@secretszen');
define('TEMA_AROMAS_INSTAGRAM_URL', 'https://www.instagram.com/secretszen');
define('TEMA_AROMAS_EMAIL', 'secretszen888@gmail.com');
```

2. Replace hardcoded values in files:
   - `header.php`
   - `footer.php`
   - `page-fale-conosco.php`
   - `front-page.php`
   - `inc/woocommerce.php` (email templates)

**Files to Update:**

- [ ] `header.php`
- [ ] `footer.php`
- [ ] `page-fale-conosco.php`
- [ ] `front-page.php`
- [ ] `page-sobre-aromas.php`
- [ ] `inc/woocommerce.php`
- [ ] Email templates

---

### 9. Backup Files in Production

**Priority:** 🟡 MEDIUM  
**Location:** Theme root directory  
**Status:** ❌ Not Fixed

**Issue:**  
Multiple backup files increase theme size and could be accidentally loaded.

**Files to Remove:**

- [ ] `functions-backup.php`
- [ ] `functions-original.php`
- [ ] `functions-current.php`
- [ ] `functions-minimal.php`
- [ ] `header-current.php`
- [ ] `header-minimal.php`
- [ ] `footer-current.php`
- [ ] `footer-minimal.php`
- [ ] `index-current.php`
- [ ] `index-minimal.php`

**Action Required:**

1. Ensure all are in Git history
2. Delete from theme directory
3. Update `.gitignore` to exclude `*-backup.php`, `*-original.php`, `*-current.php`

---

### 10. Email Template Override Conflicts

**Priority:** 🟡 MEDIUM  
**File:** `inc/woocommerce.php` (lines 327-499)  
**Status:** ⚠️ Monitor

**Issue:**  
Custom email header/footer could conflict with:

- Email customizer plugins
- WooCommerce extensions (WooCommerce Subscriptions, Bookings, etc.)
- Future WooCommerce email changes

**Action Required:**

1. Add priority parameter to hooks (default is 10):

```php
add_action('woocommerce_email_header', 'tema_aromas_woocommerce_email_header', 20, 2);
```

2. Add checks for plugin conflicts:

```php
// Don't override if specific plugins are active
if (class_exists('WC_Email_Customizer')) {
    return;
}
```

3. Document which emails are being customized

**Testing:**

- [ ] Test order confirmation emails
- [ ] Test order status update emails
- [ ] Test password reset emails
- [ ] Test with email customizer plugins

---

## 🟢 LOW PRIORITY - Future Improvements

### 11. Performance Monitoring in Production

**Priority:** 🟢 LOW  
**File:** `performance-optimization.php` (lines 221-246)  
**Status:** ⚠️ Review

**Issue:**  
Performance monitoring script runs on all pages (even for visitors).

**Action Required:**
Only show for logged-in admins:

```php
function tema_aromas_add_performance_monitoring() {
    if (!current_user_can('manage_options')) {
        return;
    }
    // ... monitoring code
}
```

---

### 12. Disable Block Library CSS Globally

**Priority:** 🟢 LOW  
**File:** `performance-optimization.php` (lines 185-190)  
**Status:** ⚠️ Review

**Issue:**  
Blocks CSS is disabled globally. If you ever use Gutenberg blocks, they won't be styled.

**Action Required:**
Be more selective:

```php
// Only dequeue on specific pages
if (!is_admin() && !is_singular(['post', 'page'])) {
    wp_dequeue_style('wp-block-library');
}
```

---

### 13. Add Changelog Documentation

**Priority:** 🟢 LOW  
**File:** Create `CHANGELOG.md`  
**Status:** ❌ Not Created

**Action Required:**
Create changelog to track:

- WooCommerce template overrides
- WordPress/WooCommerce version compatibility
- Breaking changes
- Security fixes

---

### 14. Create Child Theme Option

**Priority:** 🟢 LOW  
**Status:** 🤔 Consider

**Issue:**  
Direct theme modifications make updates harder. Consider creating child theme structure.

**Benefits:**

- Easier updates
- Safer customizations
- Better for client handoff

**Action Required:**

1. Create child theme structure
2. Move customizations to child theme
3. Document parent/child relationship

---

## 📊 Testing Checklist

### Before Deployment

- [ ] **Cart Functionality**

  - [ ] Add to cart from shop page
  - [ ] Add to cart from single product
  - [ ] Mini-cart updates without refresh
  - [ ] Cart page displays correctly
  - [ ] Remove from cart works
  - [ ] Update quantities works

- [ ] **Checkout Process**

  - [ ] Guest checkout works
  - [ ] Registered user checkout works
  - [ ] Payment gateway integration works
  - [ ] Order confirmation email sends
  - [ ] Thank you page displays

- [ ] **My Account**

  - [ ] Login/logout works
  - [ ] Order history displays
  - [ ] Downloads tab is hidden
  - [ ] Address editing works
  - [ ] Password reset works

- [ ] **Contact Form**

  - [ ] Form validation works
  - [ ] Email sends successfully
  - [ ] Rate limiting prevents spam
  - [ ] Success message displays
  - [ ] Error messages display

- [ ] **Performance**

  - [ ] Page load time < 3 seconds
  - [ ] Lighthouse score > 90
  - [ ] No JavaScript console errors
  - [ ] Images load properly (lazy loading)
  - [ ] Mobile performance acceptable

- [ ] **Compatibility**

  - [ ] Test with Mercado Pago
  - [ ] Test with Melhor Envio
  - [ ] Test with latest WordPress version
  - [ ] Test with latest WooCommerce version
  - [ ] Test on major browsers (Chrome, Firefox, Safari, Edge)

- [ ] **Security**

  - [ ] Nonce verification on forms
  - [ ] Capability checks on admin actions
  - [ ] Data sanitization on inputs
  - [ ] XSS prevention
  - [ ] SQL injection prevention

- [ ] **WooCommerce Status**
  - [ ] WooCommerce > Status > Templates (no warnings)
  - [ ] WooCommerce > Status > System Status (all green)
  - [ ] No outdated template warnings

---

## 🎯 Implementation Schedule

### Week 1 (Critical)

- **Day 1-2:** Fix cart fragments (#1)
- **Day 2:** Add security checks (#2)
- **Day 3:** Update template versions (#3)
- **Day 4-5:** Testing critical fixes

### Week 2 (High Priority)

- **Day 1-2:** Convert settings to filters (#4)
- **Day 3:** Fix jQuery Migrate (#5)
- **Day 4:** Add contact form protection (#6)
- **Day 5:** Testing high priority fixes

### Week 3 (Medium Priority)

- **Day 1:** Optimize gettext filter (#7)
- **Day 2-3:** Replace hardcoded values (#8)
- **Day 4:** Remove backup files (#9)
- **Day 5:** Review email templates (#10)

### Week 4 (Polish & Testing)

- **Day 1-2:** Low priority improvements (#11-14)
- **Day 3-4:** Full regression testing
- **Day 5:** Documentation updates

---

## 📝 Notes

### Important Reminders

- Always test in staging environment first
- Backup database before making changes
- Keep Git commits granular (one fix per commit)
- Update this checklist as items are completed
- Document any issues encountered during fixes

### Plugin Compatibility Watch List

- ✅ WooCommerce (currently compatible)
- ⚠️ Mercado Pago (test after jQuery changes)
- ⚠️ Melhor Envio (test after cart fragment fix)
- ⚠️ WooCommerce Subscriptions (if installed)
- ⚠️ Email customizer plugins (may conflict with custom emails)

### Breaking Changes to Watch For

- WooCommerce 9.0+ template updates
- WordPress 7.0+ jQuery updates
- PHP 8.2+ deprecations
- WooCommerce Blocks migration

---

## ✅ Completion Tracking

**Critical Issues:** 0/3 Fixed (0%)  
**High Priority:** 0/3 Fixed (0%)  
**Medium Priority:** 0/4 Fixed (0%)  
**Low Priority:** 0/4 Fixed (0%)

**Overall Progress:** 0/14 Issues Fixed (0%)

---

_Last Updated: October 10, 2025_  
_Next Review: After completing Week 1 fixes_
