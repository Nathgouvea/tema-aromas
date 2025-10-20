/*!
 * Tema Aromas - Mobile Menu
 * Handles hamburger menu functionality for mobile devices
 * Version: 1.0.0
 */

(function () {
  "use strict";

  let menuOpen = false;
  let touchStartX = 0;
  let touchStartY = 0;

  function initMobileMenu() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const primaryMenuContainer = document.querySelector('.primary-menu-container');
    const siteNavigation = document.querySelector('#site-navigation');
    const menuCloseButton = document.querySelector('.menu-close-button');

    console.log('🔍 Menu elements found:', {
      menuToggle: !!menuToggle,
      primaryMenuContainer: !!primaryMenuContainer,
      siteNavigation: !!siteNavigation,
      mobileMenuOverlay: !!mobileMenuOverlay,
      menuCloseButton: !!menuCloseButton
    });

    if (!menuToggle) {
      console.warn('⚠️ Menu toggle button not found');
      return;
    }

    if (!primaryMenuContainer && !siteNavigation) {
      console.warn('⚠️ No menu container found');
      return;
    }

    // Create overlay if it doesn't exist
    if (!mobileMenuOverlay) {
      const overlay = document.createElement('div');
      overlay.className = 'mobile-menu-overlay hidden-desktop';
      overlay.setAttribute('aria-hidden', 'true');
      document.querySelector('.site-header').appendChild(overlay);
    }

    // Handle menu toggle click
    menuToggle.addEventListener('click', toggleMenu);
    menuToggle.addEventListener('touchstart', function(e) {
      e.stopPropagation();
      toggleMenu(e);
    }, { passive: true });

    // Handle menu close button click (inside menu panel)
    if (menuCloseButton) {
      menuCloseButton.addEventListener('click', closeMenu);
      menuCloseButton.addEventListener('touchstart', function(e) {
        e.stopPropagation();
      }, { passive: true });
    }

    // Close menu when clicking overlay
    const overlay = document.querySelector('.mobile-menu-overlay');
    if (overlay) {
      overlay.addEventListener('click', closeMenu);
      overlay.addEventListener('touchstart', closeMenu, { passive: true });
    }

    // Handle sub-menu dropdowns in mobile
    // NOTE: Dropdowns are initialized when menu opens (see toggleMenu function)
    // This avoids timing issues and ensures elements are in DOM

    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape' && menuOpen) {
        closeMenu();
      }
    });

    // Handle swipe to close
    initSwipeToClose();

    // Handle window resize
    window.addEventListener('resize', debounce(handleResize, 250));

    console.log('📱 Mobile menu initialized');
  }

  function toggleMenu(e) {
    if (e) {
      e.preventDefault();
      e.stopPropagation();
    }

    const menuToggle = document.querySelector('.menu-toggle');
    const primaryMenuContainer = document.querySelector('.primary-menu-container');
    const mainNavigation = document.querySelector('.main-navigation');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const body = document.body;

    menuOpen = !menuOpen;

    if (menuOpen) {
      // Open menu
      menuToggle.classList.add('is-active');
      menuToggle.setAttribute('aria-expanded', 'true');

      // Add is-open class to both navigation elements
      if (mainNavigation) {
        mainNavigation.classList.add('is-open');
      }
      if (primaryMenuContainer) {
        primaryMenuContainer.classList.add('is-open');
      }

      if (mobileMenuOverlay) {
        mobileMenuOverlay.classList.add('is-visible');
        mobileMenuOverlay.setAttribute('aria-hidden', 'false');
      }

      body.classList.add('mobile-menu-open');

      // Prevent body scroll
      body.style.overflow = 'hidden';

      // Focus management
      setTimeout(() => {
        const firstMenuItem = primaryMenuContainer ? primaryMenuContainer.querySelector('a, button') : null;
        if (firstMenuItem) {
          firstMenuItem.focus();
        }
      }, 300);

      // Reinitialize dropdowns after menu animation completes
      // This ensures dropdown elements are in DOM and can receive events
      setTimeout(() => {
        initMobileSubMenus();
        console.log('🔄 Dropdowns reinitialized after menu open');
      }, 350);

      // Announce to screen readers
      announceToScreenReader('Menu aberto');
    } else {
      closeMenu();
    }
  }

  function closeMenu() {
    const menuToggle = document.querySelector('.menu-toggle');
    const primaryMenuContainer = document.querySelector('.primary-menu-container');
    const mainNavigation = document.querySelector('.main-navigation');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const body = document.body;

    menuOpen = false;

    // Close menu
    menuToggle.classList.remove('is-active');
    menuToggle.setAttribute('aria-expanded', 'false');

    // Remove is-open class from both navigation elements
    if (mainNavigation) {
      mainNavigation.classList.remove('is-open');
    }
    if (primaryMenuContainer) {
      primaryMenuContainer.classList.remove('is-open');
    }

    if (mobileMenuOverlay) {
      mobileMenuOverlay.classList.remove('is-visible');
      mobileMenuOverlay.setAttribute('aria-hidden', 'true');
    }

    body.classList.remove('mobile-menu-open');

    // Restore body scroll
    body.style.overflow = '';

    // Return focus to menu toggle
    menuToggle.focus();

    // Close all sub-menus
    closeAllSubMenus();

    // Announce to screen readers
    announceToScreenReader('Menu fechado');
  }

  function initMobileSubMenus() {
    const dropdownToggles = document.querySelectorAll('.menu-item-has-children > a');

    console.log('📋 Found dropdown toggles:', dropdownToggles.length);

    dropdownToggles.forEach(toggle => {
      // Skip if already initialized to prevent duplicate event listeners
      if (toggle.dataset.dropdownInitialized === 'true') {
        return;
      }

      console.log('Setting up dropdown for:', toggle.textContent.trim());

      // Make the menu link itself handle the dropdown on mobile
      toggle.addEventListener('click', function(e) {
        console.log('🖱️ Click on:', this.textContent.trim());
        e.preventDefault();
        e.stopPropagation();
        toggleSubMenu(this);
      });

      toggle.addEventListener('touchstart', function(e) {
        console.log('👆 Touch on:', this.textContent.trim());
        e.stopPropagation();
      }, { passive: true });

      // Mark as initialized
      toggle.dataset.dropdownInitialized = 'true';
    });
  }

  function toggleSubMenu(link) {
    const parentItem = link.closest('.menu-item-has-children');
    const subMenu = parentItem.querySelector('.dropdown-menu, .sub-menu');

    if (!subMenu) {
      console.log('No submenu found for:', link);
      return;
    }

    const isOpen = subMenu.classList.contains('show') || parentItem.classList.contains('submenu-open');

    // Close other open submenus at the same level
    const siblings = Array.from(parentItem.parentNode.children);
    siblings.forEach(sibling => {
      if (sibling !== parentItem) {
        const siblingMenu = sibling.querySelector('.dropdown-menu, .sub-menu');
        if (siblingMenu) {
          siblingMenu.classList.remove('show');
          siblingMenu.style.maxHeight = '0';
        }
        sibling.classList.remove('submenu-open');
        const siblingLink = sibling.querySelector('.menu-item-has-children > a');
        if (siblingLink) {
          siblingLink.setAttribute('aria-expanded', 'false');
        }
      }
    });

    if (isOpen) {
      // Close submenu
      parentItem.classList.remove('submenu-open');
      subMenu.classList.remove('show');
      link.setAttribute('aria-expanded', 'false');
      subMenu.style.maxHeight = '0';
    } else {
      // Open submenu
      parentItem.classList.add('submenu-open');
      subMenu.classList.add('show');
      link.setAttribute('aria-expanded', 'true');
      subMenu.style.maxHeight = subMenu.scrollHeight + 'px';
    }
  }

  function closeAllSubMenus() {
    const openSubMenus = document.querySelectorAll('.submenu-open');
    openSubMenus.forEach(item => {
      item.classList.remove('submenu-open');
      const link = item.querySelector('.menu-item-has-children > a');
      if (link) {
        link.setAttribute('aria-expanded', 'false');
      }
      const subMenu = item.querySelector('.dropdown-menu, .sub-menu');
      if (subMenu) {
        subMenu.classList.remove('show');
        subMenu.style.maxHeight = '0';
      }
    });
  }

  function initSwipeToClose() {
    const primaryMenuContainer = document.querySelector('.primary-menu-container');
    
    if (!primaryMenuContainer) return;
    
    primaryMenuContainer.addEventListener('touchstart', function(e) {
      touchStartX = e.touches[0].clientX;
      touchStartY = e.touches[0].clientY;
    }, { passive: true });
    
    primaryMenuContainer.addEventListener('touchmove', function(e) {
      if (!touchStartX || !touchStartY) return;
      
      const touchEndX = e.touches[0].clientX;
      const touchEndY = e.touches[0].clientY;
      
      const diffX = touchStartX - touchEndX;
      const diffY = touchStartY - touchEndY;
      
      // Detect horizontal swipe (right to left to close)
      if (Math.abs(diffX) > Math.abs(diffY) && diffX < -50) {
        closeMenu();
        touchStartX = 0;
        touchStartY = 0;
      }
    }, { passive: true });
  }

  function handleResize() {
    if (window.innerWidth >= 1024 && menuOpen) {
      closeMenu();
    }
  }

  function announceToScreenReader(message) {
    const announcement = document.createElement('div');
    announcement.className = 'sr-only';
    announcement.setAttribute('aria-live', 'polite');
    announcement.textContent = message;
    document.body.appendChild(announcement);
    
    setTimeout(() => {
      document.body.removeChild(announcement);
    }, 1000);
  }

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

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMobileMenu);
  } else {
    initMobileMenu();
  }

  // Also initialize after theme is ready (if using the TemaAromas namespace)
  document.addEventListener('themeReady', initMobileMenu);

})();