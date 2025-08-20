/*!
 * Tema Aromas - Search Functionality
 * Expandable search form with smooth animations
 * Version: 1.0.0
 */

(function () {
  "use strict";

  /**
   * Initialize search functionality
   */
  function initSearch() {
    const searchToggle = document.querySelector('.search-toggle');
    const searchForm = document.getElementById('search-form');
    const searchClose = document.querySelector('.search-close');
    const searchField = document.getElementById('woocommerce-product-search-field');

    if (!searchToggle || !searchForm) return;

    // Toggle search form
    searchToggle.addEventListener('click', function (e) {
      e.preventDefault();
      
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      
      if (isExpanded) {
        closeSearch();
      } else {
        openSearch();
      }
    });

    // Close search form
    if (searchClose) {
      searchClose.addEventListener('click', closeSearch);
    }

    // Close on escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && searchForm.classList.contains('show')) {
        closeSearch();
      }
    });

    // Close on click outside
    document.addEventListener('click', function (e) {
      if (!searchForm.contains(e.target) && !searchToggle.contains(e.target)) {
        if (searchForm.classList.contains('show')) {
          closeSearch();
        }
      }
    });

    function openSearch() {
      searchForm.classList.add('show');
      searchForm.setAttribute('aria-hidden', 'false');
      searchToggle.setAttribute('aria-expanded', 'true');
      
      // Focus search field after animation
      setTimeout(() => {
        if (searchField) {
          searchField.focus();
        }
      }, 300);
      
      // Add body class to prevent scrolling
      document.body.classList.add('search-open');
    }

    function closeSearch() {
      searchForm.classList.remove('show');
      searchForm.setAttribute('aria-hidden', 'true');
      searchToggle.setAttribute('aria-expanded', 'false');
      
      // Remove body class
      document.body.classList.remove('search-open');
      
      // Clear search field
      if (searchField) {
        searchField.value = '';
      }
    }
  }

  /**
   * Initialize when DOM is ready
   */
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initSearch);
  } else {
    initSearch();
  }

  // Export for global access if needed
  window.TemaAromas = window.TemaAromas || {};
  window.TemaAromas.search = {
    init: initSearch
  };

})();
