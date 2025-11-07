/*!
 * Tema Aromas - Aromas Page JavaScript
 * Apple-Style Accordion and Tab Navigation
 * Version: 2.0.0
 */

document.addEventListener("DOMContentLoaded", function () {
  // Select fragrance pills (tabs) and accordion items
  const fragrancePills = document.querySelectorAll(".fragrance-pill");
  const accordionItems = document.querySelectorAll(".fragrance-accordion-item");
  const pillsSection = document.querySelector(".fragrance-pills-section");

  fragrancePills.forEach((pill) => {
    pill.addEventListener("click", function () {
      const targetFragrance = this.getAttribute("data-fragrance");

      // Remove active class from all pills
      fragrancePills.forEach((p) => p.classList.remove("active"));

      // Add active class to clicked pill
      this.classList.add("active");

      // Close all accordion items
      accordionItems.forEach((item) => {
        item.classList.remove("active");
        const content = item.querySelector(".fragrance-accordion-content");
        const header = item.querySelector(".fragrance-accordion-header");

        if (content && header) {
          content.setAttribute("aria-hidden", "true");
          header.setAttribute("aria-expanded", "false");
        }
      });

      // Open corresponding accordion item
      const targetAccordion = document.getElementById(targetFragrance);
      if (targetAccordion) {
        targetAccordion.classList.add("active");
        const content = targetAccordion.querySelector(
          ".fragrance-accordion-content"
        );
        const header = targetAccordion.querySelector(
          ".fragrance-accordion-header"
        );

        if (content && header) {
          content.setAttribute("aria-hidden", "false");
          header.setAttribute("aria-expanded", "true");
        }

        // Smooth scroll to accordion item
        targetAccordion.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });

  // Accordion Headers Functionality
  const accordionHeaders = document.querySelectorAll(
    ".fragrance-accordion-header"
  );

  accordionHeaders.forEach((header) => {
    header.addEventListener("click", function () {
      const accordionItem = this.closest(".fragrance-accordion-item");
      const content = accordionItem.querySelector(
        ".fragrance-accordion-content"
      );
      const isActive = accordionItem.classList.contains("active");

      // Close all accordion items
      accordionItems.forEach((item) => {
        item.classList.remove("active");
        const itemContent = item.querySelector(".fragrance-accordion-content");
        const itemHeader = item.querySelector(".fragrance-accordion-header");

        if (itemContent && itemHeader) {
          itemContent.setAttribute("aria-hidden", "true");
          itemHeader.setAttribute("aria-expanded", "false");
        }
      });

      // Remove active class from all pills
      fragrancePills.forEach((pill) => pill.classList.remove("active"));

      // If this item wasn't active, open it
      if (!isActive) {
        accordionItem.classList.add("active");
        content.setAttribute("aria-hidden", "false");
        this.setAttribute("aria-expanded", "true");

        // Update corresponding pill
        const fragranceId = accordionItem.getAttribute("id");
        const correspondingPill = document.querySelector(
          `[data-fragrance="${fragranceId}"]`
        );
        if (correspondingPill) {
          correspondingPill.classList.add("active");
        }
      }
    });

    // Keyboard accessibility
    header.addEventListener("keydown", function (e) {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        this.click();
      }
    });
  });

  // Initialize: Ensure Flor de Figo is open by default
  const defaultAccordion = document.getElementById("flor-de-figo");
  const defaultPill = document.querySelector('[data-fragrance="flor-de-figo"]');

  if (defaultAccordion && defaultPill) {
    defaultAccordion.classList.add("active");
    defaultPill.classList.add("active");

    const content = defaultAccordion.querySelector(
      ".fragrance-accordion-content"
    );
    const header = defaultAccordion.querySelector(
      ".fragrance-accordion-header"
    );

    if (content && header) {
      content.setAttribute("aria-hidden", "false");
      header.setAttribute("aria-expanded", "true");
    }
  }

  // Apple-style smooth scroll enhancement
  function smoothScrollToElement(element, offset = 100) {
    const elementPosition = element.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.pageYOffset - offset;

    window.scrollTo({
      top: offsetPosition,
      behavior: "smooth",
    });
  }

  // Enhanced pill click with Apple-style scroll behavior
  fragrancePills.forEach((pill) => {
    pill.addEventListener("click", function () {
      setTimeout(() => {
        const targetFragrance = this.getAttribute("data-fragrance");
        const targetAccordion = document.getElementById(targetFragrance);
        if (targetAccordion) {
          smoothScrollToElement(targetAccordion, 120);
        }
      }, 100);
    });

    // Arrow key navigation for tabs (Apple-style)
    pill.addEventListener("keydown", function (e) {
      if (e.key === "ArrowLeft" || e.key === "ArrowRight") {
        e.preventDefault();
        const currentIndex = Array.from(fragrancePills).indexOf(this);
        let nextIndex;

        if (e.key === "ArrowRight") {
          nextIndex = (currentIndex + 1) % fragrancePills.length;
        } else {
          nextIndex =
            (currentIndex - 1 + fragrancePills.length) % fragrancePills.length;
        }

        fragrancePills[nextIndex].focus();
        fragrancePills[nextIndex].click();
      }
    });
  });

  // Sticky navigation scroll effect (Apple-style)
  if (pillsSection) {
    let lastScrollY = window.scrollY;

    window.addEventListener("scroll", () => {
      const currentScrollY = window.scrollY;

      if (currentScrollY > 100) {
        pillsSection.style.boxShadow = "0 1px 4px rgba(0, 0, 0, 0.1)";
      } else {
        pillsSection.style.boxShadow = "none";
      }

      lastScrollY = currentScrollY;
    });
  }

  // Preload images for smooth transitions
  accordionItems.forEach((item) => {
    const img = item.querySelector(".fragrance-image img");
    if (img && img.dataset.src) {
      const tempImg = new Image();
      tempImg.src = img.dataset.src;
    }
  });

  // Intersection Observer for scroll animations (Apple-style)
  const observerOptions = {
    threshold: 0.1,
    rootMargin: "0px 0px -50px 0px",
  };

  const accordionObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1";
        entry.target.style.transform = "translateY(0)";
      }
    });
  }, observerOptions);

  // Observe accordion items
  accordionItems.forEach((item) => {
    accordionObserver.observe(item);
  });
});
