/**
 * Header Scroll Effect
 * Handles transparent to solid header transition
 */

(function () {
  "use strict";

  document.addEventListener("DOMContentLoaded", function () {
    const header = document.getElementById("masthead");

    if (!header) {
      console.log("Header element not found");
      return;
    }

    console.log("Header scroll effect initialized");

    // Function to update header state
    function updateHeaderState() {
      const scrollPosition = window.scrollY;
      const scrollThreshold = 50; // Standard scroll threshold

      console.log(
        "Scroll position:",
        scrollPosition,
        "Threshold:",
        scrollThreshold
      );

      if (scrollPosition > scrollThreshold) {
        header.classList.add("scrolled");
        console.log("Header scrolled state added");
      } else {
        header.classList.remove("scrolled");
        console.log("Header scrolled state removed");
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

    // Also listen for wheel events to ensure we catch all scroll
    window.addEventListener("wheel", requestTick);

    // Listen for touch events on mobile
    window.addEventListener("touchmove", requestTick);
  });
})();
