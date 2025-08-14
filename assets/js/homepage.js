/*!
 * Tema Aromas - Homepage JavaScript
 * Interactive functionality for the luxury homepage
 * Version: 1.0.0
 */

(function () {
  "use strict";

  /**
   * Initialize homepage animations and interactions
   */
  function initHomepage() {
    initScrollAnimations();
    initNewsletterForm();
    initCounters();
    initParallaxEffect();

    console.log("🏠 Homepage functionality initialized");
  }

  /**
   * Initialize scroll-triggered animations
   */
  function initScrollAnimations() {
    const animatedElements = document.querySelectorAll(".animate-fade-in-up");

    if (!animatedElements.length) return;

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
            observer.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.1,
        rootMargin: "50px",
      }
    );

    animatedElements.forEach((element, index) => {
      element.style.opacity = "0";
      element.style.transform = "translateY(30px)";
      element.style.transition = `opacity 0.6s ease ${
        index * 0.1
      }s, transform 0.6s ease ${index * 0.1}s`;
      observer.observe(element);
    });

    console.log("✨ Scroll animations initialized");
  }

  /**
   * Initialize newsletter form functionality
   */
  function initNewsletterForm() {
    const newsletterForm = document.querySelector(".newsletter-signup");

    if (!newsletterForm) return;

    newsletterForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const emailInput = this.querySelector('input[name="newsletter_email"]');
      const submitButton = this.querySelector('button[type="submit"]');
      const originalButtonText = submitButton.innerHTML;

      if (!emailInput || !emailInput.value.trim()) {
        showNotification("Por favor, insira um e-mail válido.", "error");
        return;
      }

      // Simulate form submission
      submitButton.innerHTML = `
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <circle cx="12" cy="12" r="10"/>
          <polyline points="8,12 12,16 16,12"/>
        </svg>
        Cadastrando...
      `;
      submitButton.disabled = true;

      // Simulate API call
      setTimeout(() => {
        submitButton.innerHTML = `
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="20,6 9,17 4,12"/>
          </svg>
          Cadastrado!
        `;

        emailInput.value = "";
        showNotification(
          "Obrigado! Você receberá nossas novidades em breve.",
          "success"
        );

        setTimeout(() => {
          submitButton.innerHTML = originalButtonText;
          submitButton.disabled = false;
        }, 3000);
      }, 2000);
    });

    console.log("📧 Newsletter form initialized");
  }

  /**
   * Initialize animated counters for trust indicators
   */
  function initCounters() {
    const counterElements = document.querySelectorAll("[data-counter]");

    if (!counterElements.length) return;

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const element = entry.target;
            const target = parseInt(element.dataset.counter);
            animateCounter(element, target);
            observer.unobserve(element);
          }
        });
      },
      { threshold: 0.5 }
    );

    counterElements.forEach((element) => {
      observer.observe(element);
    });
  }

  /**
   * Animate counter from 0 to target value
   */
  function animateCounter(element, target) {
    let current = 0;
    const increment = target / 100;
    const timer = setInterval(() => {
      current += increment;
      element.textContent = Math.round(current);

      if (current >= target) {
        element.textContent = target;
        clearInterval(timer);
      }
    }, 20);
  }

  /**
   * Initialize subtle parallax effect for hero section
   */
  function initParallaxEffect() {
    const heroSection = document.querySelector(".homepage-hero");
    const heroElements = document.querySelectorAll(".showcase-item");

    if (!heroSection || !heroElements.length) return;

    window.addEventListener("scroll", () => {
      const scrolled = window.pageYOffset;
      const heroHeight = heroSection.offsetHeight;
      const heroOffset = heroSection.offsetTop;

      // Only apply effect when hero is visible
      if (scrolled < heroHeight + heroOffset) {
        const speed = scrolled * 0.1;

        heroElements.forEach((element, index) => {
          const multiplier = (index + 1) * 0.02;
          element.style.transform = `translateY(${speed * multiplier}px)`;
        });
      }
    });

    console.log("🌊 Parallax effect initialized");
  }

  /**
   * Show notification to user
   */
  function showNotification(message, type = "info") {
    const notification = document.createElement("div");
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
      <div class="notification-content">
        <span class="notification-icon">
          ${type === "success" ? "✅" : type === "error" ? "❌" : "ℹ️"}
        </span>
        <span class="notification-message">${message}</span>
        <button class="notification-close">&times;</button>
      </div>
    `;

    // Add styles if not already added
    if (!document.querySelector("#notification-styles")) {
      const styles = document.createElement("style");
      styles.id = "notification-styles";
      styles.textContent = `
        .notification {
          position: fixed;
          top: 20px;
          right: 20px;
          z-index: 10000;
          max-width: 400px;
          background: white;
          border-radius: 12px;
          box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
          border-left: 4px solid;
          animation: slideInRight 0.3s ease;
        }
        .notification-success { border-color: #10b981; }
        .notification-error { border-color: #ef4444; }
        .notification-info { border-color: #3b82f6; }
        .notification-content {
          display: flex;
          align-items: center;
          gap: 12px;
          padding: 16px;
        }
        .notification-icon { font-size: 1.2rem; }
        .notification-message { flex: 1; font-size: 0.95rem; }
        .notification-close {
          background: none;
          border: none;
          font-size: 1.5rem;
          cursor: pointer;
          opacity: 0.5;
          transition: opacity 0.2s;
        }
        .notification-close:hover { opacity: 1; }
        @keyframes slideInRight {
          from { transform: translateX(100%); }
          to { transform: translateX(0); }
        }
      `;
      document.head.appendChild(styles);
    }

    document.body.appendChild(notification);

    // Auto remove after 5 seconds
    setTimeout(() => {
      if (notification.parentNode) {
        notification.style.animation = "slideInRight 0.3s ease reverse";
        setTimeout(() => {
          if (notification.parentNode) {
            notification.remove();
          }
        }, 300);
      }
    }, 5000);

    // Close button functionality
    const closeButton = notification.querySelector(".notification-close");
    closeButton.addEventListener("click", () => {
      notification.style.animation = "slideInRight 0.3s ease reverse";
      setTimeout(() => {
        if (notification.parentNode) {
          notification.remove();
        }
      }, 300);
    });
  }

  /**
   * Initialize when DOM is ready
   */
  function init() {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", initHomepage);
    } else {
      initHomepage();
    }
  }

  // Start initialization
  init();
})();
