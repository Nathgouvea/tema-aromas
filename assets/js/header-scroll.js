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
        console.log("Header scrolled - added scrolled class");
      } else {
        header.classList.remove("scrolled");
        console.log("Header not scrolled - removed scrolled class");
      }

      // Update body class for homepage scroll state
      if (isHomepage) {
        if (scrollPosition > scrollThreshold) {
          body.classList.add("homepage-scrolled");
          console.log("Homepage scrolled - added homepage-scrolled class");
        } else {
          body.classList.remove("homepage-scrolled");
          console.log("Homepage not scrolled - removed homepage-scrolled class");
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

    // Listen for scroll events
    window.addEventListener("scroll", requestTick);
  });
})();
