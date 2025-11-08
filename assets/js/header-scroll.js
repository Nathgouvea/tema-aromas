/**
 * Header Scroll Effect
 * Handles transparent to solid header transition
 */

(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    const header = document.getElementById("masthead");
    const body = document.body;

    if (!header) return;

    // Function to update header state
    function updateHeaderState() {
      const scrollPosition = window.scrollY;
      const scrollThreshold = 10; // Reduced threshold for easier testing
      const isHomepage = body.classList.contains("homepage");

      if (scrollPosition > scrollThreshold) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }

      // Update body class for homepage scroll state
      if (isHomepage) {
        if (scrollPosition > scrollThreshold) {
          body.classList.add("homepage-scrolled");
        } else {
          body.classList.remove("homepage-scrolled");
        }
      }
    }

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

    window.addEventListener("scroll", requestTick);
  });
})();
