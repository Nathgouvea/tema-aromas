/*!
 * Tema Aromas - Menu Dropdown JavaScript
 * Simplified, reliable dropdown menu behavior
 * Version: 2.0.0 - Rewritten for consistency and performance
 */

(function () {
  "use strict";

  // State management
  let activeDropdown = null;
  let hoverTimeout = null;
  const HOVER_DELAY = 150; // Delay before closing dropdown on mouse leave

  /**
   * Initialize dropdown menus
   */
  function initDropdownMenus() {
    const dropdownToggles = document.querySelectorAll(
      ".dropdown-toggle, .menu-item-has-children > a"
    );

    if (dropdownToggles.length === 0) {
      return;
    }

    dropdownToggles.forEach((toggle) => {
      setupDropdown(toggle);
    });

    // Close dropdowns when clicking outside
    document.addEventListener("click", handleOutsideClick);

    // Close dropdowns on escape key
    document.addEventListener("keydown", handleEscapeKey);

    // Handle window resize to close dropdowns
    window.addEventListener("resize", debounce(closeAllDropdowns, 250));
  }

  /**
   * Setup individual dropdown with unified event handling
   */
  function setupDropdown(toggle) {
    // Skip on mobile/tablet - mobile-menu.js handles dropdowns < 1024px
    if (!isDesktop()) {
      return;
    }

    const dropdownId =
      toggle.getAttribute("aria-controls") || toggle.dataset.dropdownTarget;
    let dropdown = dropdownId ? document.getElementById(dropdownId) : null;

    // If no dropdown ID, check for next sibling
    if (!dropdown) {
      dropdown = toggle.nextElementSibling;
      if (dropdown && dropdown.classList.contains("dropdown-menu")) {
        // Generate ID for proper ARIA
        dropdown.id = "dropdown-" + Math.random().toString(36).substr(2, 9);
        toggle.setAttribute("aria-controls", dropdown.id);
      }
    }

    if (!dropdown || !dropdown.classList.contains("dropdown-menu")) {
      return;
    }

    // Set initial ARIA states
    toggle.setAttribute("aria-expanded", "false");
    toggle.setAttribute("aria-haspopup", "true");

    const dropdownContainer =
      toggle.closest(".dropdown") ||
      toggle.closest(".menu-item-has-children") ||
      toggle.parentElement;

    if (!dropdownContainer) {
      return;
    }

    // Desktop: Use hover for better UX
    if (isDesktop()) {
      setupDesktopBehavior(toggle, dropdown, dropdownContainer);
    }

    // All devices: Click/tap support
    setupClickBehavior(toggle, dropdown);

    // Keyboard navigation
    setupKeyboardNavigation(toggle, dropdown);
  }

  /**
   * Setup desktop hover behavior
   */
  function setupDesktopBehavior(toggle, dropdown, container) {
    // Open on mouse enter
    container.addEventListener("mouseenter", function () {
      if (!isDesktop()) return; // Safety check
      clearTimeout(hoverTimeout);
      openDropdown(toggle, dropdown);
    });

    // Close on mouse leave (with delay for better UX)
    container.addEventListener("mouseleave", function () {
      if (!isDesktop()) return; // Safety check
      hoverTimeout = setTimeout(() => {
        closeDropdown(toggle, dropdown);
      }, HOVER_DELAY);
    });

    // Keep open when hovering dropdown itself
    dropdown.addEventListener("mouseenter", function () {
      clearTimeout(hoverTimeout);
    });
  }

  /**
   * Setup click/tap behavior (works on all devices)
   */
  function setupClickBehavior(toggle, dropdown) {
    toggle.addEventListener("click", function (e) {
      // On desktop, clicking should toggle (in addition to hover)
      // On mobile/tablet, clicking is the primary interaction
      e.preventDefault();
      e.stopPropagation();

      const isOpen = toggle.getAttribute("aria-expanded") === "true";

      if (isOpen) {
        closeDropdown(toggle, dropdown);
      } else {
        // Close other dropdowns first
        closeAllDropdowns();
        openDropdown(toggle, dropdown);
      }
    });
  }

  /**
   * Setup keyboard navigation
   */
  function setupKeyboardNavigation(toggle, dropdown) {
    // Toggle keyboard interaction
    toggle.addEventListener("keydown", function (e) {
      switch (e.key) {
        case "Enter":
        case " ":
          e.preventDefault();
          const isOpen = toggle.getAttribute("aria-expanded") === "true";
          if (isOpen) {
            closeDropdown(toggle, dropdown);
          } else {
            closeAllDropdowns();
            openDropdown(toggle, dropdown);
          }
          break;
        case "ArrowDown":
          e.preventDefault();
          if (toggle.getAttribute("aria-expanded") !== "true") {
            openDropdown(toggle, dropdown);
          }
          focusFirstMenuItem(dropdown);
          break;
        case "Escape":
          e.preventDefault();
          closeDropdown(toggle, dropdown);
          toggle.focus();
          break;
      }
    });

    // Dropdown keyboard navigation
    dropdown.addEventListener("keydown", function (e) {
      const menuItems = Array.from(
        dropdown.querySelectorAll('a, button, [tabindex="0"]')
      );
      const currentIndex = menuItems.indexOf(document.activeElement);

      switch (e.key) {
        case "ArrowDown":
          e.preventDefault();
          const nextIndex =
            currentIndex < menuItems.length - 1 ? currentIndex + 1 : 0;
          menuItems[nextIndex].focus();
          break;
        case "ArrowUp":
          e.preventDefault();
          const prevIndex =
            currentIndex > 0 ? currentIndex - 1 : menuItems.length - 1;
          menuItems[prevIndex].focus();
          break;
        case "Escape":
          e.preventDefault();
          closeDropdown(toggle, dropdown);
          toggle.focus();
          break;
        case "Tab":
          // Allow normal tab behavior but close dropdown when tabbing out
          if (!dropdown.contains(e.relatedTarget)) {
            closeDropdown(toggle, dropdown);
          }
          break;
      }
    });
  }

  /**
   * Open dropdown
   */
  function openDropdown(toggle, dropdown) {
    // Close other dropdowns
    if (activeDropdown && activeDropdown !== dropdown) {
      const activeToggle = document.querySelector(
        `[aria-controls="${activeDropdown.id}"]`
      );
      if (activeToggle) {
        closeDropdown(activeToggle, activeDropdown);
      }
    }

    // Update ARIA
    toggle.setAttribute("aria-expanded", "true");
    toggle.classList.add("active");

    // Show dropdown with CSS class
    dropdown.classList.add("show");
    dropdown.setAttribute("aria-hidden", "false");

    // Track active dropdown
    activeDropdown = dropdown;
  }

  /**
   * Close dropdown
   */
  function closeDropdown(toggle, dropdown) {
    // Update ARIA
    toggle.setAttribute("aria-expanded", "false");
    toggle.classList.remove("active");

    // Hide dropdown
    dropdown.classList.remove("show");
    dropdown.setAttribute("aria-hidden", "true");

    // Clear active dropdown
    if (activeDropdown === dropdown) {
      activeDropdown = null;
    }
  }

  /**
   * Close all dropdowns
   */
  function closeAllDropdowns(e) {
    const openDropdowns = document.querySelectorAll(".dropdown-menu.show");

    openDropdowns.forEach((dropdown) => {
      const toggle = document.querySelector(`[aria-controls="${dropdown.id}"]`);
      if (toggle) {
        // Don't close if clicking inside
        if (e && (toggle.contains(e.target) || dropdown.contains(e.target))) {
          return;
        }
        closeDropdown(toggle, dropdown);
      }
    });
  }

  /**
   * Handle clicks outside dropdown
   */
  function handleOutsideClick(e) {
    closeAllDropdowns(e);
  }

  /**
   * Handle escape key
   */
  function handleEscapeKey(e) {
    if (e.key === "Escape") {
      closeAllDropdowns();
    }
  }

  /**
   * Focus first menu item in dropdown
   */
  function focusFirstMenuItem(dropdown) {
    const firstItem = dropdown.querySelector('a, button, [tabindex="0"]');
    if (firstItem) {
      firstItem.focus();
    }
  }

  /**
   * Check if desktop viewport
   */
  function isDesktop() {
    return window.innerWidth >= 1024;
  }

  /**
   * Debounce utility
   */
  function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
      const later = () => {
        clearTimeout(timeout);
        func(...args);
      };
      clearTimeout(timeout);
      timeout = setTimeout(later, wait);
    };
  }

  /**
   * Initialize when DOM is ready
   */
  function init() {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", initDropdownMenus);
    } else {
      initDropdownMenus();
    }
  }

  // Start initialization
  init();
})();
