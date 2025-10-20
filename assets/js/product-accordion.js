/*!
 * Product Accordion
 * Converts product tabs to accordion on single product page
 */

(function() {
  'use strict';

  function initProductAccordion() {
    const panels = document.querySelectorAll('.woocommerce-tabs .panel');

    if (!panels.length) return;

    // Make first panel active by default
    if (panels[0]) {
      panels[0].classList.add('active');
    }

    panels.forEach(panel => {
      const heading = panel.querySelector('h2');

      if (!heading) return;

      // Add click handler to heading
      heading.addEventListener('click', function() {
        const isActive = panel.classList.contains('active');

        // Toggle current panel
        if (isActive) {
          panel.classList.remove('active');
        } else {
          panel.classList.add('active');
        }
      });
    });
  }

  // Initialize when DOM is ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initProductAccordion);
  } else {
    initProductAccordion();
  }

})();
