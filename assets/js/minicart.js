/*!
 * Tema Aromas - Mini Cart JavaScript
 * Smooth mini cart interactions with premium animations
 * Version: 1.0.0
 */

(function () {
  "use strict";

  let isCartOpen = false;
  let cartOverlay = null;

  /**
   * Initialize mini cart functionality
   */
  function initMiniCart() {
    // Only initialize if WooCommerce is active
    if (!document.body.classList.contains("woocommerce-active")) {
      return;
    }

    createCartOverlay();
    initCartToggle();
    initCartEvents();
    initCartUpdates();
    initQuantityControls();

    console.log("🛒 Mini cart inicializado");
  }

  /**
   * Create cart overlay
   */
  function createCartOverlay() {
    cartOverlay = document.createElement("div");
    cartOverlay.className = "cart-overlay";
    cartOverlay.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            backdrop-filter: blur(4px);
        `;

    document.body.appendChild(cartOverlay);

    // Close cart when clicking overlay
    cartOverlay.addEventListener("click", closeCart);
  }

  /**
   * Initialize cart toggle functionality
   */
  function initCartToggle() {
    const cartToggles = document.querySelectorAll(
      ".cart-toggle, .mini-cart-toggle, [data-cart-toggle]"
    );

    cartToggles.forEach((toggle) => {
      toggle.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();

        if (isCartOpen) {
          closeCart();
        } else {
          openCart();
        }
      });

      // Keyboard support
      toggle.addEventListener("keydown", function (e) {
        if (e.key === "Enter" || e.key === " ") {
          e.preventDefault();
          this.click();
        }
      });
    });
  }

  /**
   * Initialize cart events
   */
  function initCartEvents() {
    // Close cart on escape key
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && isCartOpen) {
        closeCart();
      }
    });

    // Handle cart drawer interactions
    document.addEventListener("click", function (e) {
      const cartDrawer = document.querySelector(
        ".mini-cart-drawer, .cart-drawer"
      );

      if (cartDrawer && isCartOpen) {
        // Don't close if clicking inside the cart drawer
        if (cartDrawer.contains(e.target)) {
          return;
        }

        // Don't close if clicking on cart toggle
        if (
          e.target.closest(
            ".cart-toggle, .mini-cart-toggle, [data-cart-toggle]"
          )
        ) {
          return;
        }

        // Close if clicking outside
        closeCart();
      }
    });

    // Handle mini cart close button
    document.addEventListener("click", function (e) {
      if (e.target.closest(".mini-cart-close")) {
        e.preventDefault();
        e.stopPropagation();
        closeCart();
      }
    });
  }

  /**
   * Initialize cart updates and AJAX handlers
   */
  function initCartUpdates() {
    // Listen for WooCommerce cart updates
    document.addEventListener("wc_fragments_refreshed", updateCartCount);
    document.addEventListener("added_to_cart", handleAddToCart);
    document.addEventListener("removed_from_cart", updateCartCount);

    // Handle quantity changes in mini cart
    document.addEventListener("change", function (e) {
      if (e.target.matches(".mini-cart-quantity, .cart-quantity")) {
        updateCartQuantity(e.target);
      }
    });

    // Handle remove from cart
    document.addEventListener("click", function (e) {
      if (e.target.matches(".remove-from-cart, .mini-cart-remove")) {
        e.preventDefault();
        removeFromCart(e.target);
      }
    });
  }

  /**
   * Open mini cart
   */
  function openCart() {
    const cartDrawer = document.querySelector(
      ".mini-cart-drawer, .cart-drawer"
    );
    const cartToggle = document.querySelector(
      ".cart-toggle, .mini-cart-toggle, [data-cart-toggle]"
    );

    if (!cartDrawer) {
      console.warn("Cart drawer not found");
      return;
    }

    // Set states
    isCartOpen = true;

    // Update ARIA states
    if (cartToggle) {
      cartToggle.setAttribute("aria-expanded", "true");
    }

    // Show overlay
    cartOverlay.style.visibility = "visible";
    cartOverlay.style.opacity = "1";

    // Show cart drawer
    cartDrawer.classList.add("open");
    cartDrawer.style.transform = "translateX(0)";

    // Prevent body scroll
    document.body.style.overflow = "hidden";

    // Focus management
    const firstFocusable = cartDrawer.querySelector(
      'button, a, input, [tabindex]:not([tabindex="-1"])'
    );
    if (firstFocusable) {
      firstFocusable.focus();
    }

    // Announce to screen readers
    announceToScreenReader("Carrinho de compras aberto");

    // Dispatch custom event
    document.dispatchEvent(new CustomEvent("cartOpened"));
  }

  /**
   * Close mini cart
   */
  function closeCart() {
    const cartDrawer = document.querySelector(
      ".mini-cart-drawer, .cart-drawer"
    );
    const cartToggle = document.querySelector(
      ".cart-toggle, .mini-cart-toggle, [data-cart-toggle]"
    );

    if (!cartDrawer) return;

    // Set states
    isCartOpen = false;

    // Update ARIA states
    if (cartToggle) {
      cartToggle.setAttribute("aria-expanded", "false");
    }

    // Hide overlay
    cartOverlay.style.opacity = "0";
    cartOverlay.style.visibility = "hidden";

    // Hide cart drawer
    cartDrawer.classList.remove("open");
    cartDrawer.style.transform = "translateX(100%)";

    // Restore body scroll
    document.body.style.overflow = "";

    // Return focus to toggle
    if (cartToggle) {
      cartToggle.focus();
    }

    // Announce to screen readers
    announceToScreenReader("Carrinho de compras fechado");

    // Dispatch custom event
    document.dispatchEvent(new CustomEvent("cartClosed"));
  }

  /**
   * Handle add to cart events
   */
  function handleAddToCart(e) {
    // Show success animation
    showCartAnimation();

    // Update cart count
    updateCartCount();

    // Show notification
    showCartNotification("Produto adicionado ao carrinho!", "success");

    // Auto-open cart (optional) - with longer delay for better UX
    if (shouldAutoOpenCart()) {
      setTimeout(openCart, 1000); // Increased from 500ms to 1000ms for less aggressive behavior
    }
  }

  /**
   * Update cart count display
   */
  function updateCartCount() {
    // This would typically be handled by WooCommerce fragments
    // but we can add visual feedback here
    const cartCounts = document.querySelectorAll(
      ".cart-count, .mini-cart-count"
    );

    cartCounts.forEach((count) => {
      // Add pulse animation with longer duration for better UX
      count.classList.add("animate-pulse");
      setTimeout(() => {
        count.classList.remove("animate-pulse");
      }, 2000); // Increased from 1000ms to 2000ms for more user-friendly experience
    });
  }

  /**
   * Show cart animation
   */
  function showCartAnimation() {
    const cartToggle = document.querySelector(
      ".cart-toggle, .mini-cart-toggle"
    );

    if (cartToggle) {
      cartToggle.classList.add("cart-updated");
      setTimeout(() => {
        cartToggle.classList.remove("cart-updated");
      }, 1500); // Increased from 600ms to 1500ms for more user-friendly experience
    }
  }

  /**
   * Show cart notification
   */
  function showCartNotification(message, type = "info") {
    const notification = document.createElement("div");
    notification.className = `cart-notification cart-notification-${type}`;
    notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: var(--cor-primaria);
            color: white;
            padding: var(--espacamento-sm) var(--espacamento-md);
            border-radius: 8px;
            box-shadow: var(--sombra-luxo);
            z-index: 10000;
            transform: translateX(100%);
            transition: transform 0.5s ease; /* Slower, more user-friendly transition */
            max-width: 300px;
        `;

    notification.textContent = message;
    document.body.appendChild(notification);

    // Animate in
    setTimeout(() => {
      notification.style.transform = "translateX(0)";
    }, 100);

    // Animate out and remove
    setTimeout(() => {
      notification.style.transform = "translateX(100%)";
      setTimeout(() => {
        if (notification.parentNode) {
          notification.parentNode.removeChild(notification);
        }
      }, 300);
    }, 3000);
  }

  /**
   * Update cart quantity
   */
  function updateCartQuantity(input) {
    const cartKey = input.dataset.cartKey;
    const quantity = parseInt(input.value);

    if (!cartKey || quantity < 0) return;

    // Show loading state
    input.style.opacity = "0.5";
    input.disabled = true;

    // AJAX update (this would integrate with WooCommerce)
    const formData = new FormData();
    formData.append("action", "update_cart_quantity");
    formData.append("cart_key", cartKey);
    formData.append("quantity", quantity);
    formData.append("nonce", temaAromas.nonce);

    fetch(temaAromas.ajaxurl, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // Update cart fragments
          updateCartFragments(data.fragments);
          showCartNotification("Quantidade atualizada", "success");
        } else {
          showCartNotification("Erro ao atualizar quantidade", "error");
        }
      })
      .catch((error) => {
        showCartNotification("Erro ao atualizar quantidade", "error");
      })
      .finally(() => {
        input.style.opacity = "1";
        input.disabled = false;
      });
  }

  /**
   * Remove item from cart
   */
  function removeFromCart(button) {
    const cartKey = button.dataset.cartKey;
    const cartItem = button.closest(".mini-cart-item, .cart-item");

    if (!cartKey || !cartItem) return;

    // Confirm removal
    if (!confirm("Remover este item do carrinho?")) return;

    // Show loading state
    cartItem.style.opacity = "0.5";

    // AJAX remove (this would integrate with WooCommerce)
    const formData = new FormData();
    formData.append("action", "remove_cart_item");
    formData.append("cart_key", cartKey);
    formData.append("nonce", temaAromas.nonce);

    fetch(temaAromas.ajaxurl, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // Animate out
          cartItem.style.transform = "translateX(100%)";
          setTimeout(() => {
            updateCartFragments(data.fragments);
          }, 300);
          showCartNotification("Item removido do carrinho", "success");
        } else {
          cartItem.style.opacity = "1";
          showCartNotification("Erro ao remover item", "error");
        }
      })
      .catch((error) => {
        cartItem.style.opacity = "1";
        showCartNotification("Erro ao remover item", "error");
      });
  }

  /**
   * Update cart fragments
   */
  function updateCartFragments(fragments) {
    // This would typically be handled by WooCommerce
    // but we can add custom logic here
    Object.keys(fragments).forEach((selector) => {
      const elements = document.querySelectorAll(selector);
      elements.forEach((element) => {
        element.outerHTML = fragments[selector];
      });
    });

    // Re-initialize after update
    initCartEvents();
  }

  /**
   * Check if cart should auto-open
   */
  function shouldAutoOpenCart() {
    // Don't auto-open on mobile
    if (window.innerWidth < 768) return false;

    // Don't auto-open if already open
    if (isCartOpen) return false;

    // Don't auto-open on checkout/cart pages
    if (
      document.body.classList.contains("woocommerce-checkout") ||
      document.body.classList.contains("woocommerce-cart")
    ) {
      return false;
    }

    return true;
  }

  /**
   * Initialize quantity controls (+ and - buttons)
   */
  function initQuantityControls() {
    // Handle quantity increase
    document.addEventListener("click", function (e) {
      const plusBtn = e.target.closest(".quantity-plus");
      if (plusBtn) {
        e.preventDefault();
        e.stopPropagation();

        const cartItemKey = plusBtn.dataset.cartItemKey;
        const input = document.querySelector(`.quantity-input[data-cart-item-key="${cartItemKey}"]`);

        if (input) {
          const currentQty = parseInt(input.value) || 0;
          const newQty = currentQty + 1;
          input.value = newQty;
          updateMiniCartQuantity(cartItemKey, newQty);
        }
      }
    });

    // Handle quantity decrease
    document.addEventListener("click", function (e) {
      const minusBtn = e.target.closest(".quantity-minus");
      if (minusBtn) {
        e.preventDefault();
        e.stopPropagation();

        const cartItemKey = minusBtn.dataset.cartItemKey;
        const input = document.querySelector(`.quantity-input[data-cart-item-key="${cartItemKey}"]`);

        if (input) {
          const currentQty = parseInt(input.value) || 0;
          const newQty = Math.max(1, currentQty - 1); // Minimum 1
          input.value = newQty;
          updateMiniCartQuantity(cartItemKey, newQty);
        }
      }
    });

    // Re-initialize after WooCommerce updates the cart
    jQuery(document.body).on("wc_fragments_refreshed", function () {
      console.log("🔄 Cart fragments refreshed - quantity controls reinitialized");
    });
  }

  /**
   * Update mini cart quantity via AJAX
   */
  function updateMiniCartQuantity(cartItemKey, quantity) {
    if (typeof jQuery === "undefined" || typeof wc_add_to_cart_params === "undefined") {
      console.error("jQuery or WooCommerce not loaded");
      return;
    }

    // Show loading state
    const input = document.querySelector(`.quantity-input[data-cart-item-key="${cartItemKey}"]`);
    if (input) {
      input.style.opacity = "0.6";
      input.disabled = true;
    }

    // Use WooCommerce cart hash update
    jQuery.ajax({
      type: "POST",
      url: wc_add_to_cart_params.wc_ajax_url.toString().replace("%%endpoint%%", "update_cart_item_qty"),
      data: {
        cart_item_key: cartItemKey,
        qty: quantity
      },
      success: function (response) {
        if (response && response.fragments) {
          // Update cart fragments (WooCommerce standard method)
          jQuery.each(response.fragments, function (key, value) {
            jQuery(key).replaceWith(value);
          });

          // Trigger event for other scripts
          jQuery(document.body).trigger("wc_fragment_refresh");
          jQuery(document.body).trigger("updated_cart_totals");

          // Re-initialize quantity controls after update
          setTimeout(function() {
            initQuantityControls();
          }, 100);

          // Show success feedback
          showCartNotification("Quantidade atualizada", "success");
        }
      },
      error: function () {
        showCartNotification("Erro ao atualizar quantidade", "error");
        // Restore input state
        if (input) {
          input.style.opacity = "1";
          input.disabled = false;
        }
      },
      complete: function () {
        // Restore input state
        if (input) {
          input.style.opacity = "1";
          input.disabled = false;
        }
      }
    });
  }

  /**
   * Announce to screen readers
   */
  function announceToScreenReader(message) {
    const liveRegion = document.getElementById("live-region");
    if (liveRegion) {
      liveRegion.textContent = message;
      setTimeout(() => {
        liveRegion.textContent = "";
      }, 1000);
    }
  }

  /**
   * Initialize when DOM is ready
   */
  function init() {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", initMiniCart);
    } else {
      initMiniCart();
    }
  }

  // Start initialization
  init();
})();
