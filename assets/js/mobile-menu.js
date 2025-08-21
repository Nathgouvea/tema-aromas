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

    if (!menuToggle || !primaryMenuContainer) {
      console.warn('Mobile menu elements not found');
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

    // Close menu when clicking overlay
    if (mobileMenuOverlay) {
      mobileMenuOverlay.addEventListener('click', closeMenu);
      mobileMenuOverlay.addEventListener('touchstart', closeMenu, { passive: true });
    }

    // Handle sub-menu dropdowns in mobile
    initMobileSubMenus();

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
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const body = document.body;

    menuOpen = !menuOpen;

    if (menuOpen) {
      // Open menu
      menuToggle.classList.add('is-active');
      menuToggle.setAttribute('aria-expanded', 'true');
      
      primaryMenuContainer.classList.add('is-open');
      
      if (mobileMenuOverlay) {
        mobileMenuOverlay.classList.add('is-visible');
        mobileMenuOverlay.setAttribute('aria-hidden', 'false');
      }
      
      body.classList.add('mobile-menu-open');
      
      // Prevent body scroll
      body.style.overflow = 'hidden';
      
      // Focus management
      setTimeout(() => {
        const firstMenuItem = primaryMenuContainer.querySelector('a, button');
        if (firstMenuItem) {
          firstMenuItem.focus();
        }
      }, 300);
      
      // Announce to screen readers
      announceToScreenReader('Menu aberto');
    } else {
      closeMenu();
    }
  }

  function closeMenu() {
    const menuToggle = document.querySelector('.menu-toggle');
    const primaryMenuContainer = document.querySelector('.primary-menu-container');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const body = document.body;

    menuOpen = false;

    // Close menu
    menuToggle.classList.remove('is-active');
    menuToggle.setAttribute('aria-expanded', 'false');
    
    primaryMenuContainer.classList.remove('is-open');
    
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
    
    dropdownToggles.forEach(toggle => {
      // Remove existing click handlers
      const newToggle = toggle.cloneNode(true);
      toggle.parentNode.replaceChild(newToggle, toggle);
      
      // Add mobile-specific dropdown button
      const dropdownButton = document.createElement('button');
      dropdownButton.className = 'mobile-dropdown-toggle';
      dropdownButton.setAttribute('aria-label', 'Abrir submenu');
      dropdownButton.innerHTML = '<svg width="12" height="8" viewBox="0 0 12 8" fill="none"><path d="M1 1L6 6L11 1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
      
      // Insert button after the link
      if (!newToggle.parentNode.querySelector('.mobile-dropdown-toggle')) {
        newToggle.parentNode.insertBefore(dropdownButton, newToggle.nextSibling);
      }
      
      // Handle dropdown button click
      dropdownButton.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        toggleSubMenu(this);
      });
      
      dropdownButton.addEventListener('touchstart', function(e) {
        e.stopPropagation();
        toggleSubMenu(this);
      }, { passive: true });
    });
  }

  function toggleSubMenu(button) {
    const parentItem = button.closest('.menu-item-has-children');
    const subMenu = parentItem.querySelector('.sub-menu');
    
    if (!subMenu) return;
    
    const isOpen = parentItem.classList.contains('submenu-open');
    
    // Close other open submenus at the same level
    const siblings = Array.from(parentItem.parentNode.children);
    siblings.forEach(sibling => {
      if (sibling !== parentItem && sibling.classList.contains('submenu-open')) {
        sibling.classList.remove('submenu-open');
        const siblingButton = sibling.querySelector('.mobile-dropdown-toggle');
        if (siblingButton) {
          siblingButton.setAttribute('aria-expanded', 'false');
        }
      }
    });
    
    if (isOpen) {
      // Close submenu
      parentItem.classList.remove('submenu-open');
      button.setAttribute('aria-expanded', 'false');
      subMenu.style.maxHeight = '0';
    } else {
      // Open submenu
      parentItem.classList.add('submenu-open');
      button.setAttribute('aria-expanded', 'true');
      subMenu.style.maxHeight = subMenu.scrollHeight + 'px';
    }
  }

  function closeAllSubMenus() {
    const openSubMenus = document.querySelectorAll('.submenu-open');
    openSubMenus.forEach(item => {
      item.classList.remove('submenu-open');
      const button = item.querySelector('.mobile-dropdown-toggle');
      if (button) {
        button.setAttribute('aria-expanded', 'false');
      }
      const subMenu = item.querySelector('.sub-menu');
      if (subMenu) {
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