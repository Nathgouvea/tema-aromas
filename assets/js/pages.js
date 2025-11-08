/*!
 * Tema Aromas - Pages JavaScript
 * Interactive functionality for static pages
 * Version: 1.0.0
 */

(function () {
  "use strict";

  /**
   * Initialize FAQ functionality
   */
  function initFAQ() {
    const faqItems = document.querySelectorAll(".faq-item");

    faqItems.forEach((item) => {
      const question = item.querySelector(".faq-question");
      const answer = item.querySelector(".faq-answer");

      if (!question || !answer) return;

      // Set initial ARIA states
      question.setAttribute("aria-expanded", "false");
      answer.setAttribute("aria-hidden", "true");

      // Add click event
      question.addEventListener("click", function () {
        const isExpanded = question.getAttribute("aria-expanded") === "true";

        // Close all other FAQ items
        faqItems.forEach((otherItem) => {
          const otherQuestion = otherItem.querySelector(".faq-question");
          const otherAnswer = otherItem.querySelector(".faq-answer");

          if (otherItem !== item && otherQuestion && otherAnswer) {
            otherQuestion.setAttribute("aria-expanded", "false");
            otherAnswer.setAttribute("aria-hidden", "true");
          }
        });

        // Toggle current item
        if (!isExpanded) {
          question.setAttribute("aria-expanded", "true");
          answer.setAttribute("aria-hidden", "false");

          // Smooth scroll to keep question in view
          setTimeout(() => {
            question.scrollIntoView({
              behavior: "smooth",
              block: "nearest",
            });
          }, 150);
        } else {
          question.setAttribute("aria-expanded", "false");
          answer.setAttribute("aria-hidden", "true");
        }
      });

      // Keyboard navigation
      question.addEventListener("keydown", function (e) {
        if (e.key === "Enter" || e.key === " ") {
          e.preventDefault();
          question.click();
        }
      });
    });
  }

  /**
   * Initialize contact form enhancements
   */
  function initContactForm() {
    const contactForm = document.querySelector(".contact-form");

    if (!contactForm) return;

    // Phone number formatting
    const phoneInput = contactForm.querySelector("#contact_phone");
    if (phoneInput) {
      phoneInput.addEventListener("input", function (e) {
        let value = e.target.value.replace(/\D/g, "");

        if (value.length <= 11) {
          if (value.length <= 2) {
            value = value.replace(/(\d{0,2})/, "($1");
          } else if (value.length <= 6) {
            value = value.replace(/(\d{2})(\d{0,4})/, "($1) $2");
          } else if (value.length <= 10) {
            value = value.replace(/(\d{2})(\d{4})(\d{0,4})/, "($1) $2-$3");
          } else {
            value = value.replace(/(\d{2})(\d{5})(\d{0,4})/, "($1) $2-$3");
          }
        }

        e.target.value = value;
      });
    }

    // Form validation enhancement
    const inputs = contactForm.querySelectorAll(
      "input[required], textarea[required]"
    );
    inputs.forEach((input) => {
      input.addEventListener("blur", function () {
        validateField(input);
      });

      input.addEventListener("input", function () {
        // Clear error state on input
        input.classList.remove("error");
        const errorMsg = input.parentNode.querySelector(".error-message");
        if (errorMsg) {
          errorMsg.remove();
        }
      });
    });

    // Form submission enhancement
    contactForm.addEventListener("submit", function (e) {
      let isValid = true;

      inputs.forEach((input) => {
        if (!validateField(input)) {
          isValid = false;
        }
      });

      if (!isValid) {
        e.preventDefault();
        const firstError = contactForm.querySelector(".error");
        if (firstError) {
          firstError.focus();
          firstError.scrollIntoView({
            behavior: "smooth",
            block: "center",
          });
        }
      }
    });

  }

  /**
   * Validate individual form field
   */
  function validateField(field) {
    let isValid = true;
    const value = field.value.trim();

    // Remove existing error message
    const existingError = field.parentNode.querySelector(".error-message");
    if (existingError) {
      existingError.remove();
    }

    field.classList.remove("error");

    // Check required fields
    if (field.hasAttribute("required") && !value) {
      showFieldError(field, "Este campo é obrigatório");
      isValid = false;
    }

    // Email validation
    if (field.type === "email" && value) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(value)) {
        showFieldError(field, "Por favor, insira um e-mail válido");
        isValid = false;
      }
    }

    return isValid;
  }

  /**
   * Show field error message
   */
  function showFieldError(field, message) {
    field.classList.add("error");

    const errorDiv = document.createElement("div");
    errorDiv.className = "error-message";
    errorDiv.textContent = message;
    errorDiv.style.color = "#dc3545";
    errorDiv.style.fontSize = "0.875rem";
    errorDiv.style.marginTop = "0.25rem";

    field.parentNode.appendChild(errorDiv);
  }

  /**
   * Initialize scroll animations
   */
  function initScrollAnimations() {
    const animatedElements = document.querySelectorAll(".animate-fade-in-up");

    if (!animatedElements.length) return;

    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.animation = `fadeInUp 0.6s ease-out ${
              entry.target.style.animationDelay || "0s"
            }`;
            observer.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.1,
        rootMargin: "50px",
      }
    );

    animatedElements.forEach((element) => {
      element.style.opacity = "0";
      observer.observe(element);
    });

  }

  /**
   * Initialize smooth scrolling for anchor links
   */
  function initSmoothScrolling() {
    const anchorLinks = document.querySelectorAll('a[href^="#"]');

    anchorLinks.forEach((link) => {
      link.addEventListener("click", function (e) {
        const targetId = this.getAttribute("href");
        const targetElement = document.querySelector(targetId);

        if (targetElement) {
          e.preventDefault();
          targetElement.scrollIntoView({
            behavior: "smooth",
            block: "start",
          });
        }
      });
    });
  }

  /**
   * Initialize all page functionality
   */
  function init() {
    // Wait for DOM to be ready
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", function () {
        initFAQ();
        initContactForm();
        initScrollAnimations();
        initSmoothScrolling();
      });
    } else {
      initFAQ();
      initContactForm();
      initScrollAnimations();
      initSmoothScrolling();
    }
  }

  // Start initialization
  init();
})();
