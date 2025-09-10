/*!
 * Tema Aromas - Main JavaScript
 * Sophisticated interactions and micro-animations
 * Version: 1.0.0
 */

(function () {
  "use strict";

  // Theme namespace
  window.TemaAromas = window.TemaAromas || {};

  /**
   * Initialize theme
   */
  function init() {
    // Wait for DOM to be ready
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", initializeTheme);
    } else {
      initializeTheme();
    }
  }

  /**
   * Initialize all theme functionality
   */
  function initializeTheme() {
    console.log("🌸 Tema Aromas - Inicializando tema luxuoso...");

    // Initialize components
    initSmoothScrolling();
    initLazyLoading();
    initAnimationObserver();
    initFormEnhancements();
    initScrollToTop();
    initHeaderScroll();
    initCopyrightYear();

    // Dispatch theme ready event
    document.dispatchEvent(new CustomEvent("themeReady"));
    console.log("✨ Tema Aromas - Tema inicializado com sucesso!");
  }

  /**
   * Smooth scrolling for anchor links
   */
  function initSmoothScrolling() {
    const anchors = document.querySelectorAll('a[href^="#"]');

    anchors.forEach((anchor) => {
      anchor.addEventListener("click", function (e) {
        const targetId = this.getAttribute("href");
        const targetElement = document.querySelector(targetId);

        if (targetElement && targetId !== "#") {
          e.preventDefault();

          targetElement.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });

          // Update URL without jumping
          history.pushState(null, null, targetId);
        }
      });
    });
  }

  /**
   * Lazy loading for images with intersection observer
   */
  function initLazyLoading() {
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');

    if ("IntersectionObserver" in window) {
      const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const img = entry.target;

            // Add fade-in effect
            img.style.opacity = "0";
            img.style.transition = "opacity 0.3s ease";

            img.addEventListener("load", () => {
              img.style.opacity = "1";
            });

            imageObserver.unobserve(img);
          }
        });
      });

      lazyImages.forEach((img) => imageObserver.observe(img));
    }
  }

  /**
   * Animation observer for reveal effects
   */
  function initAnimationObserver() {
    const animatedElements = document.querySelectorAll(
      ".animate-fade-in-up, .animate-fade-in-left, .animate-fade-in-right"
    );

    if ("IntersectionObserver" in window) {
      const animationObserver = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.style.opacity = "1";
              entry.target.style.transform = "translateY(0) translateX(0)";
              animationObserver.unobserve(entry.target);
            }
          });
        },
        {
          threshold: 0.1,
          rootMargin: "0px 0px -50px 0px",
        }
      );

      animatedElements.forEach((el) => {
        el.style.opacity = "0";
        el.style.transition = "opacity 0.6s ease, transform 0.6s ease";

        if (el.classList.contains("animate-fade-in-up")) {
          el.style.transform = "translateY(30px)";
        } else if (el.classList.contains("animate-fade-in-left")) {
          el.style.transform = "translateX(-30px)";
        } else if (el.classList.contains("animate-fade-in-right")) {
          el.style.transform = "translateX(30px)";
        }

        animationObserver.observe(el);
      });
    }
  }

  /**
   * Form enhancements
   */
  function initFormEnhancements() {
    const forms = document.querySelectorAll(".luxury-form");

    forms.forEach((form) => {
      const inputs = form.querySelectorAll(
        ".luxury-form-input, .luxury-form-textarea"
      );

      inputs.forEach((input) => {
        // Floating label effect
        const label = form.querySelector(`label[for="${input.id}"]`);

        if (label) {
          input.addEventListener("focus", () => {
            label.style.color = "var(--cor-primaria)";
            label.style.transform = "translateY(-2px)";
            label.style.transition = "all 0.2s ease";
          });

          input.addEventListener("blur", () => {
            if (!input.value) {
              label.style.color = "";
              label.style.transform = "";
            }
          });
        }

        // Real-time validation feedback
        input.addEventListener("input", () => {
          if (input.checkValidity()) {
            input.style.borderColor = "#28a745";
          } else {
            input.style.borderColor = input.value ? "#dc3545" : "";
          }
        });
      });
    });
  }

  /**
   * Scroll to top button
   */
  function initScrollToTop() {
    // Create scroll to top button
    const scrollBtn = document.createElement("button");
    scrollBtn.innerHTML = "↑";
    scrollBtn.className = "scroll-to-top";
    scrollBtn.setAttribute("aria-label", "Voltar ao topo");
    scrollBtn.style.cssText = `
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--gradiente-luxo);
            color: white;
            border: none;
            font-size: 20px;
            cursor: pointer;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: var(--transicao-suave);
            box-shadow: var(--sombra-luxo);
        `;

    document.body.appendChild(scrollBtn);

    // Show/hide button based on scroll position
    window.addEventListener("scroll", () => {
      if (window.pageYOffset > 300) {
        scrollBtn.style.opacity = "1";
        scrollBtn.style.visibility = "visible";
      } else {
        scrollBtn.style.opacity = "0";
        scrollBtn.style.visibility = "hidden";
      }
    });

    // Scroll to top on click
    scrollBtn.addEventListener("click", () => {
      window.scrollTo({
        top: 0,
        behavior: "smooth",
      });
    });

    // Hover effect
    scrollBtn.addEventListener("mouseenter", () => {
      scrollBtn.style.transform = "translateY(-3px) scale(1.1)";
    });

    scrollBtn.addEventListener("mouseleave", () => {
      scrollBtn.style.transform = "translateY(0) scale(1)";
    });
  }

  /**
   * Header scroll effects
   */
  function initHeaderScroll() {
    const header = document.querySelector(".site-header");
    if (!header) return;

    let lastScrollY = window.pageYOffset;
    let ticking = false;

    function updateHeader() {
      const scrollY = window.pageYOffset;

      if (scrollY > 100) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }

      // Hide header on scroll down, show on scroll up
      if (scrollY > lastScrollY && scrollY > 200) {
        header.style.transform = "translateY(-100%)";
      } else {
        header.style.transform = "translateY(0)";
      }

      lastScrollY = scrollY;
      ticking = false;
    }

    function requestTick() {
      if (!ticking) {
        requestAnimationFrame(updateHeader);
        ticking = true;
      }
    }

    window.addEventListener("scroll", requestTick);
  }

  /**
   * Utility functions
   */
  TemaAromas.utils = {
    /**
     * Debounce function
     */
    debounce: function (func, wait, immediate) {
      let timeout;
      return function executedFunction() {
        const context = this;
        const args = arguments;

        const later = function () {
          timeout = null;
          if (!immediate) func.apply(context, args);
        };

        const callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);

        if (callNow) func.apply(context, args);
      };
    },

    /**
     * Throttle function
     */
    throttle: function (func, limit) {
      let inThrottle;
      return function () {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
          func.apply(context, args);
          inThrottle = true;
          setTimeout(() => (inThrottle = false), limit);
        }
      };
    },

    /**
     * Get element offset
     */
    getOffset: function (el) {
      const rect = el.getBoundingClientRect();
      return {
        top: rect.top + window.pageYOffset,
        left: rect.left + window.pageXOffset,
        width: rect.width,
        height: rect.height,
      };
    },

    /**
     * Check if element is in viewport
     */
    isInViewport: function (el) {
      const rect = el.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <=
          (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <=
          (window.innerWidth || document.documentElement.clientWidth)
      );
    },
  };

  /**
   * Performance monitoring
   */
  function initPerformanceMonitoring() {
    if ("performance" in window) {
      window.addEventListener("load", () => {
        setTimeout(() => {
          const perf = performance.getEntriesByType("navigation")[0];
          console.log("📊 Performance metrics:", {
            "DOM Content Loaded": Math.round(
              perf.domContentLoadedEventEnd - perf.domContentLoadedEventStart
            ),
            "Load Complete": Math.round(
              perf.loadEventEnd - perf.loadEventStart
            ),
            "Total Load Time": Math.round(perf.loadEventEnd - perf.fetchStart),
          });
        }, 0);
      });
    }
  }

  /**
   * Initialize automatic copyright year update
   */
  function initCopyrightYear() {
    const copyrightYearElement = document.getElementById('copyright-year');
    
    if (copyrightYearElement) {
      const currentYear = new Date().getFullYear();
      copyrightYearElement.textContent = currentYear;
      console.log(`📅 Copyright year updated to: ${currentYear}`);
    }
  }

  // Initialize performance monitoring in development
  if (
    window.location.hostname === "localhost" ||
    window.location.hostname === "127.0.0.1"
  ) {
    initPerformanceMonitoring();
  }

  // Start initialization
  init();
})();
