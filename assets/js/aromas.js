/*!
 * Tema Aromas - Aromas Page JavaScript
 * Accordion and Pills Functionality
 * Version: 1.0.0
 */

document.addEventListener("DOMContentLoaded", function () {
  // Fragrance Pills Functionality
  const fragrancePills = document.querySelectorAll(".fragrance-pill");
  const accordionItems = document.querySelectorAll(".fragrance-accordion-item");

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

  // Smooth scroll enhancement for better UX
  function smoothScrollToElement(element, offset = 100) {
    const elementPosition = element.getBoundingClientRect().top;
    const offsetPosition = elementPosition + window.pageYOffset - offset;

    window.scrollTo({
      top: offsetPosition,
      behavior: "smooth",
    });
  }

  // Enhanced pill click with better scroll behavior
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
  });
});
