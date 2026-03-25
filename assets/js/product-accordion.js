/*!
 * Product Accordion
 * Converts product tabs to accordion on single product page
 */

(function() {
  'use strict';

  function initProductAccordion() {
    var panels = document.querySelectorAll('.woocommerce-tabs .panel');

    if (!panels.length) return;

    // Wrap content (everything except h2) in a container for smooth animation
    panels.forEach(function(panel) {
      var heading = panel.querySelector('h2');
      if (!heading) return;

      var wrapper = document.createElement('div');
      wrapper.className = 'accordion-content';

      // Move all children except h2 into the wrapper
      var children = Array.from(panel.children);
      children.forEach(function(child) {
        if (child !== heading) {
          wrapper.appendChild(child);
        }
      });
      panel.appendChild(wrapper);

      // Add click handler
      heading.addEventListener('click', function() {
        var isActive = panel.classList.contains('active');

        // Close all panels
        panels.forEach(function(p) { p.classList.remove('active'); });

        // Open clicked panel (if it was closed)
        if (!isActive) {
          panel.classList.add('active');
        }
      });
    });

    // Open first panel by default
    if (panels[0]) {
      panels[0].classList.add('active');
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initProductAccordion);
  } else {
    initProductAccordion();
  }

})();
