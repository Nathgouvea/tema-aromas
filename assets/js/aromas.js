/*!
 * Tema Aromas - Aromas Page JavaScript
 * Accordion and Tab Navigation with scroll-sync
 * Version: 3.0.0
 */

document.addEventListener("DOMContentLoaded", function () {
  var fragrancePills = document.querySelectorAll(".fragrance-pill");
  var accordionItems = document.querySelectorAll(".fragrance-accordion-item");
  var pillsSection = document.querySelector(".fragrance-pills-section");
  var isScrollingFromClick = false;

  // --- Helpers ---

  function closeAllAccordions() {
    accordionItems.forEach(function (item) {
      item.classList.remove("active");
      var content = item.querySelector(".fragrance-accordion-content");
      var header = item.querySelector(".fragrance-accordion-header");
      if (content && header) {
        content.setAttribute("aria-hidden", "true");
        header.setAttribute("aria-expanded", "false");
      }
    });
    fragrancePills.forEach(function (p) {
      p.classList.remove("active");
    });
  }

  function openAccordion(item) {
    item.classList.add("active");
    var content = item.querySelector(".fragrance-accordion-content");
    var header = item.querySelector(".fragrance-accordion-header");
    if (content && header) {
      content.setAttribute("aria-hidden", "false");
      header.setAttribute("aria-expanded", "true");
    }
    // Sync pill
    var id = item.getAttribute("id");
    var pill = document.querySelector('[data-fragrance="' + id + '"]');
    if (pill) {
      pill.classList.add("active");
      // Scroll pill into view if container overflows
      pill.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "center" });
    }
  }

  function smoothScrollTo(element) {
    var offset = pillsSection ? pillsSection.offsetHeight + 20 : 120;
    var top = element.getBoundingClientRect().top + window.pageYOffset - offset;
    window.scrollTo({ top: top, behavior: "smooth" });
  }

  // --- Pill clicks ---

  fragrancePills.forEach(function (pill) {
    pill.addEventListener("click", function () {
      var targetId = this.getAttribute("data-fragrance");
      var targetAccordion = document.getElementById(targetId);
      if (!targetAccordion) return;

      closeAllAccordions();
      openAccordion(targetAccordion);

      isScrollingFromClick = true;
      smoothScrollTo(targetAccordion);

      // Re-enable scroll sync after animation
      setTimeout(function () {
        isScrollingFromClick = false;
      }, 800);
    });

    // Arrow key navigation
    pill.addEventListener("keydown", function (e) {
      if (e.key === "ArrowLeft" || e.key === "ArrowRight") {
        e.preventDefault();
        var pills = Array.from(fragrancePills);
        var idx = pills.indexOf(this);
        var next = e.key === "ArrowRight"
          ? (idx + 1) % pills.length
          : (idx - 1 + pills.length) % pills.length;
        pills[next].focus();
        pills[next].click();
      }
    });
  });

  // --- Accordion header clicks ---

  accordionItems.forEach(function (item) {
    var header = item.querySelector(".fragrance-accordion-header");
    if (!header) return;

    header.addEventListener("click", function () {
      var wasActive = item.classList.contains("active");

      closeAllAccordions();

      if (!wasActive) {
        openAccordion(item);
      }
    });

    header.addEventListener("keydown", function (e) {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        this.click();
      }
    });
  });

  // --- Scroll sync: activate pill + open accordion when scrolling ---

  if (accordionItems.length > 0 && pillsSection) {
    var scrollObserver = new IntersectionObserver(
      function (entries) {
        if (isScrollingFromClick) return;

        entries.forEach(function (entry) {
          if (entry.isIntersecting && entry.intersectionRatio >= 0.3) {
            var item = entry.target;

            // Only switch if this item isn't already active
            if (!item.classList.contains("active")) {
              closeAllAccordions();
              openAccordion(item);
            }
          }
        });
      },
      {
        threshold: 0.3,
        rootMargin: "-" + (pillsSection.offsetHeight + 20) + "px 0px -40% 0px",
      }
    );

    accordionItems.forEach(function (item) {
      scrollObserver.observe(item);
    });
  }

  // --- Sticky pills shadow ---

  if (pillsSection) {
    window.addEventListener("scroll", function () {
      if (window.scrollY > 100) {
        pillsSection.style.boxShadow = "0 1px 4px rgba(0, 0, 0, 0.1)";
      } else {
        pillsSection.style.boxShadow = "none";
      }
    });
  }
});
