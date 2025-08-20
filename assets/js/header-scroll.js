/**
 * Header Scroll Effect
 * Handles transparent to solid header transition
 */

(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    const header = document.getElementById("masthead");

    if (!header) return;

    // Function to update header state
    function updateHeaderState() {
      const scrollPosition = window.scrollY;
      const scrollThreshold = 50; // Standard scroll threshold

      if (scrollPosition > scrollThreshold) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    }

    // Header is now standardized across all pages
    // No transparent header functionality needed

    // Initial check
    updateHeaderState();

    // Throttle function for better performance
    let ticking = false;
    function requestTick() {
      if (!ticking) {
        window.requestAnimationFrame(updateHeaderState);
        ticking = true;
        setTimeout(function () {
          ticking = false;
        }, 100);
      }
    }

    // Listen for scroll events
    window.addEventListener("scroll", requestTick);
  });
})();
