/**
 * Aromas Slider
 * Handles arrow navigation for the horizontal aromas scroll slider.
 *
 * @package TemaAromas
 * @version 2.0.0
 */

document.addEventListener("DOMContentLoaded", function () {
  var grid = document.querySelector(".aromas-interactive-grid");
  var prevBtn = document.querySelector(".aromas-slider-prev");
  var nextBtn = document.querySelector(".aromas-slider-next");

  if (!grid || !prevBtn || !nextBtn) return;

  function getScrollAmount() {
    var card = grid.querySelector(".aroma-interactive-card");
    if (!card) return 300;
    var style = window.getComputedStyle(grid);
    var gap = parseInt(style.gap) || 24;
    return card.offsetWidth + gap;
  }

  function updateArrows() {
    var scrollLeft = Math.round(grid.scrollLeft);
    var maxScroll = grid.scrollWidth - grid.clientWidth;

    prevBtn.disabled = scrollLeft <= 1;
    nextBtn.disabled = scrollLeft >= maxScroll - 1;
  }

  prevBtn.addEventListener("click", function (e) {
    e.preventDefault();
    grid.scrollBy({ left: -getScrollAmount(), behavior: "smooth" });
  });

  nextBtn.addEventListener("click", function (e) {
    e.preventDefault();
    grid.scrollBy({ left: getScrollAmount(), behavior: "smooth" });
  });

  grid.addEventListener("scroll", updateArrows, { passive: true });
  window.addEventListener("resize", updateArrows);

  // Initial state
  updateArrows();
});
