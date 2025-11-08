/*!
 * Tema Aromas - Accessibility JavaScript
 * Focus management, skip links, and ARIA enhancements
 * Version: 1.0.0
 */

(function () {
  "use strict";

  /**
   * Initialize accessibility features
   */
  function initAccessibility() {
    initSkipLinks();
    initFocusManagement();
    initKeyboardNavigation();
    initARIAEnhancements();
    initScreenReaderSupport();
  }

  /**
   * Skip links functionality
   */
  function initSkipLinks() {
    const skipLinks = document.querySelectorAll(".skip-link");

    skipLinks.forEach((link) => {
      link.addEventListener("click", function (e) {
        const targetId = this.getAttribute("href");
        const targetElement = document.querySelector(targetId);

        if (targetElement) {
          e.preventDefault();

          // Make target focusable if it isn't already
          if (!targetElement.hasAttribute("tabindex")) {
            targetElement.setAttribute("tabindex", "-1");
          }

          // Focus the target element
          targetElement.focus();

          // Scroll to target
          targetElement.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });

          targetElement.addEventListener(
            "blur",
            function () {
              if (this.getAttribute("tabindex") === "-1") {
                this.removeAttribute("tabindex");
              }
            },
            { once: true }
          );
        }
      });
    });
  }

  /**
   * Focus management
   */
  function initFocusManagement() {
    // Focus trap for modals and dropdowns
    let focusedElementBeforeModal = null;

    // Store the currently focused element when a modal opens
    document.addEventListener("modalOpen", function (e) {
      focusedElementBeforeModal = document.activeElement;
      trapFocus(e.detail.modal);
    });

    // Return focus when modal closes
    document.addEventListener("modalClose", function () {
      if (focusedElementBeforeModal) {
        focusedElementBeforeModal.focus();
        focusedElementBeforeModal = null;
      }
    });

    // Enhanced focus indicators
    document.addEventListener("keydown", function (e) {
      if (e.key === "Tab") {
        document.body.classList.add("keyboard-navigation");
      }
    });

    document.addEventListener("mousedown", function () {
      document.body.classList.remove("keyboard-navigation");
    });
  }

  /**
   * Focus trap for modals
   */
  function trapFocus(element) {
    const focusableElements = element.querySelectorAll(
      'a[href], button, textarea, input[type="text"], input[type="radio"], input[type="checkbox"], select, [tabindex]:not([tabindex="-1"])'
    );

    const firstFocusableElement = focusableElements[0];
    const lastFocusableElement =
      focusableElements[focusableElements.length - 1];

    element.addEventListener("keydown", function (e) {
      if (e.key === "Tab") {
        if (e.shiftKey) {
          if (document.activeElement === firstFocusableElement) {
            lastFocusableElement.focus();
            e.preventDefault();
          }
        } else {
          if (document.activeElement === lastFocusableElement) {
            firstFocusableElement.focus();
            e.preventDefault();
          }
        }
      }

      if (e.key === "Escape") {
        document.dispatchEvent(new CustomEvent("modalClose"));
      }
    });

    // Focus first element
    if (firstFocusableElement) {
      firstFocusableElement.focus();
    }
  }

  /**
   * Keyboard navigation enhancements
   */
  function initKeyboardNavigation() {
    // Dropdown menus keyboard navigation
    const dropdownToggles = document.querySelectorAll('[aria-haspopup="true"]');

    dropdownToggles.forEach((toggle) => {
      toggle.addEventListener("keydown", function (e) {
        const dropdown = document.querySelector(
          this.getAttribute("aria-controls")
        );

        if (!dropdown) return;

        switch (e.key) {
          case "Enter":
          case " ":
          case "ArrowDown":
            e.preventDefault();
            openDropdown(this, dropdown);
            break;
          case "Escape":
            closeDropdown(this, dropdown);
            break;
        }
      });
    });

    // Menu item navigation
    document.addEventListener("keydown", function (e) {
      if (e.target.matches(".dropdown-menu a, .dropdown-menu button")) {
        const menuItems = Array.from(
          e.target.closest(".dropdown-menu").querySelectorAll("a, button")
        );
        const currentIndex = menuItems.indexOf(e.target);

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
            const toggle = document.querySelector(
              `[aria-controls="${e.target.closest(".dropdown-menu").id}"]`
            );
            if (toggle) {
              closeDropdown(toggle, e.target.closest(".dropdown-menu"));
            }
            break;
        }
      }
    });
  }

  /**
   * ARIA enhancements
   */
  function initARIAEnhancements() {
    // Dynamic ARIA live regions
    createLiveRegion();

    // ARIA expanded states for toggles
    const toggles = document.querySelectorAll("[data-toggle]");
    toggles.forEach((toggle) => {
      const target = document.querySelector(toggle.dataset.toggle);
      if (target) {
        toggle.setAttribute("aria-expanded", "false");
        toggle.setAttribute("aria-controls", target.id || generateId());

        if (!target.id) {
          target.id = generateId();
        }
      }
    });

    // Progress indicators
    const progressBars = document.querySelectorAll(".progress-bar");
    progressBars.forEach((bar) => {
      if (!bar.hasAttribute("role")) {
        bar.setAttribute("role", "progressbar");
      }
      if (!bar.hasAttribute("aria-valuemin")) {
        bar.setAttribute("aria-valuemin", "0");
      }
      if (!bar.hasAttribute("aria-valuemax")) {
        bar.setAttribute("aria-valuemax", "100");
      }
    });
  }

  /**
   * Screen reader support
   */
  function initScreenReaderSupport() {
    // Announce page changes
    const pageTitle = document.title;
    announceToScreenReader(`Página carregada: ${pageTitle}`);

    // Form validation announcements
    const forms = document.querySelectorAll("form");
    forms.forEach((form) => {
      form.addEventListener("submit", function (e) {
        const invalidFields = form.querySelectorAll(":invalid");
        if (invalidFields.length > 0) {
          announceToScreenReader(
            `Formulário contém ${invalidFields.length} erro(s). Por favor, corrija os campos destacados.`
          );
        }
      });
    });

    // Loading state announcements
    document.addEventListener("loadingStart", function () {
      announceToScreenReader("Carregando conteúdo...");
    });

    document.addEventListener("loadingEnd", function () {
      announceToScreenReader("Conteúdo carregado com sucesso.");
    });
  }

  /**
   * Utility functions
   */
  function openDropdown(toggle, dropdown) {
    toggle.setAttribute("aria-expanded", "true");
    dropdown.classList.add("show");

    // Focus first menu item
    const firstMenuItem = dropdown.querySelector("a, button");
    if (firstMenuItem) {
      firstMenuItem.focus();
    }
  }

  function closeDropdown(toggle, dropdown) {
    toggle.setAttribute("aria-expanded", "false");
    dropdown.classList.remove("show");
    toggle.focus();
  }

  function createLiveRegion() {
    const liveRegion = document.createElement("div");
    liveRegion.id = "live-region";
    liveRegion.setAttribute("aria-live", "polite");
    liveRegion.setAttribute("aria-atomic", "true");
    liveRegion.style.cssText = `
            position: absolute;
            left: -10000px;
            width: 1px;
            height: 1px;
            overflow: hidden;
        `;
    document.body.appendChild(liveRegion);
  }

  function announceToScreenReader(message) {
    const liveRegion = document.getElementById("live-region");
    if (liveRegion) {
      liveRegion.textContent = message;

      // Clear after announcement
      setTimeout(() => {
        liveRegion.textContent = "";
      }, 1000);
    }
  }

  function generateId() {
    return "aria-" + Math.random().toString(36).substr(2, 9);
  }

  /**
   * High contrast mode detection and support
   */
  function initHighContrastSupport() {
    // Detect high contrast mode
    if (window.matchMedia) {
      const highContrastQuery = window.matchMedia("(prefers-contrast: high)");

      function handleHighContrast(e) {
        if (e.matches) {
          document.body.classList.add("high-contrast");
        } else {
          document.body.classList.remove("high-contrast");
        }
      }

      handleHighContrast(highContrastQuery);
      highContrastQuery.addListener(handleHighContrast);
    }
  }

  /**
   * Reduced motion preference
   */
  function initReducedMotionSupport() {
    if (window.matchMedia) {
      const reducedMotionQuery = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
      );

      function handleReducedMotion(e) {
        if (e.matches) {
          document.body.classList.add("reduced-motion");
          // Disable animations
          const style = document.createElement("style");
          style.innerHTML = `
                        *, *::before, *::after {
                            animation-duration: 0.01ms !important;
                            animation-iteration-count: 1 !important;
                            transition-duration: 0.01ms !important;
                            scroll-behavior: auto !important;
                        }
                    `;
          document.head.appendChild(style);
        } else {
          document.body.classList.remove("reduced-motion");
        }
      }

      handleReducedMotion(reducedMotionQuery);
      reducedMotionQuery.addListener(handleReducedMotion);
    }
  }

  /**
   * Initialize when DOM is ready
   */
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function () {
      initAccessibility();
      initHighContrastSupport();
      initReducedMotionSupport();
    });
  } else {
    initAccessibility();
    initHighContrastSupport();
    initReducedMotionSupport();
  }
})();
