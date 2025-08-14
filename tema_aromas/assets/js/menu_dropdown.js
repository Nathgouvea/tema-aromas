/*!
 * Tema Aromas - Menu Dropdown JavaScript
 * Elegant, accessible dropdown menu behavior
 * Version: 1.0.0
 */

(function () {
  "use strict";

  let activeDropdown = null;
  let dropdownTimeout = null;

  /**
   * Initialize dropdown menus
   */
  function initDropdownMenus() {
    const dropdownToggles = document.querySelectorAll(
      ".dropdown-toggle, [data-dropdown-toggle]"
    );
    const dropdowns = document.querySelectorAll(".dropdown-menu");

    // Initialize each dropdown
    dropdownToggles.forEach((toggle) => {
      initDropdown(toggle);
    });

    // Close dropdowns when clicking outside
    document.addEventListener("click", closeAllDropdowns);

    // Close dropdowns on escape key
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") {
        closeAllDropdowns();
      }
    });

    console.log("🎯 Menu dropdown inicializado");
  }

  /**
   * Initialize individual dropdown
   */
  function initDropdown(toggle) {
    const dropdownId =
      toggle.getAttribute("aria-controls") || toggle.dataset.dropdownTarget;
    const dropdown =
      document.getElementById(dropdownId) || toggle.nextElementSibling;

    if (!dropdown) return;

    // Set initial ARIA states
    toggle.setAttribute("aria-expanded", "false");
    toggle.setAttribute("aria-haspopup", "true");

    if (!dropdown.id) {
      dropdown.id = "dropdown-" + Math.random().toString(36).substr(2, 9);
      toggle.setAttribute("aria-controls", dropdown.id);
    }

    // Desktop: hover events
    if (window.innerWidth >= 1024) {
      initDesktopHover(toggle, dropdown);
    }

    // Mobile/tablet: click events
    initMobileClick(toggle, dropdown);

    // Keyboard navigation
    initKeyboardNavigation(toggle, dropdown);

    // Window resize handler
    window.addEventListener(
      "resize",
      TemaAromas.utils.debounce(function () {
        if (window.innerWidth >= 1024) {
          initDesktopHover(toggle, dropdown);
        } else {
          removeDesktopHover(toggle, dropdown);
        }
      }, 250)
    );
  }

  /**
   * Desktop hover functionality
   */
  function initDesktopHover(toggle, dropdown) {
    const dropdownContainer =
      toggle.closest(".dropdown") || toggle.parentElement;

    // Remove existing mobile event listeners
    toggle.removeEventListener("click", handleMobileClick);

    // Hover to open
    dropdownContainer.addEventListener("mouseenter", function () {
      clearTimeout(dropdownTimeout);
      openDropdown(toggle, dropdown);
    });

    // Hover to close (with delay)
    dropdownContainer.addEventListener("mouseleave", function () {
      dropdownTimeout = setTimeout(() => {
        closeDropdown(toggle, dropdown);
      }, 300); // 300ms delay for better UX
    });

    // Prevent closing when hovering over dropdown
    dropdown.addEventListener("mouseenter", function () {
      clearTimeout(dropdownTimeout);
    });
  }

  /**
   * Remove desktop hover events
   */
  function removeDesktopHover(toggle, dropdown) {
    const dropdownContainer =
      toggle.closest(".dropdown") || toggle.parentElement;

    // Clone elements to remove all event listeners
    const newContainer = dropdownContainer.cloneNode(true);
    dropdownContainer.parentNode.replaceChild(newContainer, dropdownContainer);

    // Re-initialize with mobile events
    const newToggle = newContainer.querySelector(
      ".dropdown-toggle, [data-dropdown-toggle]"
    );
    if (newToggle) {
      initMobileClick(newToggle, newToggle.nextElementSibling);
    }
  }

  /**
   * Mobile click functionality
   */
  function initMobileClick(toggle, dropdown) {
    toggle.addEventListener("click", handleMobileClick);
    toggle.addEventListener("touchstart", handleMobileClick, { passive: true });
  }

  /**
   * Handle mobile click events
   */
  function handleMobileClick(e) {
    e.preventDefault();
    e.stopPropagation();

    const toggle = e.currentTarget;
    const dropdownId = toggle.getAttribute("aria-controls");
    const dropdown = document.getElementById(dropdownId);

    if (!dropdown) return;

    const isOpen = toggle.getAttribute("aria-expanded") === "true";

    // Close other dropdowns first
    closeAllDropdowns();

    if (!isOpen) {
      openDropdown(toggle, dropdown);
    }
  }

  /**
   * Keyboard navigation
   */
  function initKeyboardNavigation(toggle, dropdown) {
    toggle.addEventListener("keydown", function (e) {
      switch (e.key) {
        case "Enter":
        case " ":
          e.preventDefault();
          handleMobileClick(e);
          break;
        case "ArrowDown":
          e.preventDefault();
          openDropdown(toggle, dropdown);
          focusFirstMenuItem(dropdown);
          break;
        case "Escape":
          closeDropdown(toggle, dropdown);
          break;
      }
    });

    // Navigation within dropdown
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
          closeDropdown(toggle, dropdown);
          toggle.focus();
          break;
        case "Tab":
          // Allow normal tab behavior but close dropdown
          closeDropdown(toggle, dropdown);
          break;
      }
    });
  }

  /**
   * Open dropdown with animation
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

    // Set ARIA state
    toggle.setAttribute("aria-expanded", "true");

    // Add classes for styling
    dropdown.classList.add("show");
    toggle.classList.add("active");

    // Animation
    dropdown.style.opacity = "0";
    dropdown.style.transform = "translateY(-10px)";
    dropdown.style.transition = "opacity 0.3s ease, transform 0.3s ease";

    // Force reflow
    dropdown.offsetHeight;

    // Animate in
    dropdown.style.opacity = "1";
    dropdown.style.transform = "translateY(0)";

    // Set active dropdown
    activeDropdown = dropdown;

    // Announce to screen readers
    if (window.TemaAromas && window.TemaAromas.announceToScreenReader) {
      window.TemaAromas.announceToScreenReader("Menu expandido");
    }
  }

  /**
   * Close dropdown with animation
   */
  function closeDropdown(toggle, dropdown) {
    // Set ARIA state
    toggle.setAttribute("aria-expanded", "false");

    // Animation out
    dropdown.style.opacity = "0";
    dropdown.style.transform = "translateY(-10px)";

    // Remove classes after animation
    setTimeout(() => {
      dropdown.classList.remove("show");
      toggle.classList.remove("active");

      // Reset styles
      dropdown.style.opacity = "";
      dropdown.style.transform = "";
      dropdown.style.transition = "";
    }, 300);

    // Clear active dropdown
    if (activeDropdown === dropdown) {
      activeDropdown = null;
    }

    // Announce to screen readers
    if (window.TemaAromas && window.TemaAromas.announceToScreenReader) {
      window.TemaAromas.announceToScreenReader("Menu recolhido");
    }
  }

  /**
   * Close all dropdowns
   */
  function closeAllDropdowns(e) {
    const dropdowns = document.querySelectorAll(".dropdown-menu.show");

    dropdowns.forEach((dropdown) => {
      const toggle = document.querySelector(`[aria-controls="${dropdown.id}"]`);
      if (toggle) {
        // Don't close if clicking on the toggle or inside the dropdown
        if (e && (toggle.contains(e.target) || dropdown.contains(e.target))) {
          return;
        }

        closeDropdown(toggle, dropdown);
      }
    });
  }

  /**
   * Focus first menu item
   */
  function focusFirstMenuItem(dropdown) {
    const firstMenuItem = dropdown.querySelector('a, button, [tabindex="0"]');
    if (firstMenuItem) {
      firstMenuItem.focus();
    }
  }

  /**
   * Handle resize events
   */
  function handleResize() {
    // Close all dropdowns on resize
    closeAllDropdowns();

    // Re-initialize based on screen size
    const dropdownToggles = document.querySelectorAll(
      ".dropdown-toggle, [data-dropdown-toggle]"
    );
    dropdownToggles.forEach((toggle) => {
      const dropdownId = toggle.getAttribute("aria-controls");
      const dropdown = document.getElementById(dropdownId);

      if (dropdown) {
        if (window.innerWidth >= 1024) {
          initDesktopHover(toggle, dropdown);
        } else {
          removeDesktopHover(toggle, dropdown);
        }
      }
    });
  }

  /**
   * Touch device detection and handling
   */
  function handleTouchDevices() {
    let hasTouch = false;

    // Detect touch capability
    if ("ontouchstart" in window || navigator.maxTouchPoints > 0) {
      hasTouch = true;
      document.body.classList.add("touch-device");
    }

    // Handle touch events differently
    if (hasTouch) {
      const dropdownToggles = document.querySelectorAll(
        ".dropdown-toggle, [data-dropdown-toggle]"
      );

      dropdownToggles.forEach((toggle) => {
        toggle.addEventListener(
          "touchstart",
          function (e) {
            // Prevent double-tap zoom on touch devices
            e.preventDefault();
          },
          { passive: false }
        );
      });
    }
  }

  /**
   * Initialize when DOM is ready
   */
  function init() {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", function () {
        initDropdownMenus();
        handleTouchDevices();
      });
    } else {
      initDropdownMenus();
      handleTouchDevices();
    }

    // Handle window resize with debounce
    window.addEventListener(
      "resize",
      TemaAromas.utils.debounce(handleResize, 250)
    );
  }

  // Start initialization
  init();
})();
