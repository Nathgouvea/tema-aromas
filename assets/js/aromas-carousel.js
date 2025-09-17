/**
 * Aromas Carousel JavaScript
 * Handles sliding functionality for the aromas showcase section
 *
 * @package TemaAromas
 * @version 1.0.0
 */

class AromasCarousel {
  constructor() {
    this.carousel = document.getElementById("aromasCarousel");
    this.prevBtn = document.getElementById("aromasPrev");
    this.nextBtn = document.getElementById("aromasNext");
    this.dotsContainer = document.getElementById("aromasDots");
    this.cards = this.carousel
      ? this.carousel.querySelectorAll(".aroma-card")
      : [];

    this.currentIndex = 0;
    this.cardsPerView = this.getCardsPerView();
    this.totalSlides = Math.ceil(this.cards.length / this.cardsPerView);

    this.init();
  }

  init() {
    if (!this.carousel || this.cards.length === 0) return;

    this.createDots();
    this.updateCarousel();
    this.bindEvents();
    this.handleResize();
  }

  getCardsPerView() {
    const width = window.innerWidth;
    if (width <= 480) return 1;
    if (width <= 768) return 1;
    if (width <= 1024) return 2;
    return 5; // Show all 5 aromas on desktop
  }

  createDots() {
    if (!this.dotsContainer) return;

    this.dotsContainer.innerHTML = "";

    for (let i = 0; i < this.totalSlides; i++) {
      const dot = document.createElement("button");
      dot.className = "carousel-dot";
      if (i === 0) dot.classList.add("active");
      dot.setAttribute("aria-label", `Ir para slide ${i + 1}`);
      dot.addEventListener("click", () => this.goToSlide(i));
      this.dotsContainer.appendChild(dot);
    }
  }

  updateCarousel() {
    if (!this.carousel) return;

    const translateX = -(this.currentIndex * (100 / this.cardsPerView));
    this.carousel.style.transform = `translateX(${translateX}%)`;

    // Update dots
    const dots = this.dotsContainer
      ? this.dotsContainer.querySelectorAll(".carousel-dot")
      : [];
    dots.forEach((dot, index) => {
      dot.classList.toggle("active", index === this.currentIndex);
    });

    // Update navigation buttons
    if (this.prevBtn) {
      this.prevBtn.disabled = this.currentIndex === 0;
    }
    if (this.nextBtn) {
      this.nextBtn.disabled = this.currentIndex >= this.totalSlides - 1;
    }
  }

  goToSlide(index) {
    if (index < 0 || index >= this.totalSlides) return;

    this.currentIndex = index;
    this.updateCarousel();
  }

  nextSlide() {
    if (this.currentIndex < this.totalSlides - 1) {
      this.currentIndex++;
      this.updateCarousel();
    }
  }

  prevSlide() {
    if (this.currentIndex > 0) {
      this.currentIndex--;
      this.updateCarousel();
    }
  }

  bindEvents() {
    if (this.prevBtn) {
      this.prevBtn.addEventListener("click", () => this.prevSlide());
    }

    if (this.nextBtn) {
      this.nextBtn.addEventListener("click", () => this.nextSlide());
    }

    // Keyboard navigation
    document.addEventListener("keydown", (e) => {
      if (this.carousel && this.carousel.closest(":hover")) {
        if (e.key === "ArrowLeft") {
          e.preventDefault();
          this.prevSlide();
        } else if (e.key === "ArrowRight") {
          e.preventDefault();
          this.nextSlide();
        }
      }
    });

    // Touch/swipe support
    this.addTouchSupport();
  }

  addTouchSupport() {
    if (!this.carousel) return;

    let startX = 0;
    let startY = 0;
    let isDragging = false;

    this.carousel.addEventListener("touchstart", (e) => {
      startX = e.touches[0].clientX;
      startY = e.touches[0].clientY;
      isDragging = true;
    });

    this.carousel.addEventListener("touchmove", (e) => {
      if (!isDragging) return;

      const currentX = e.touches[0].clientX;
      const currentY = e.touches[0].clientY;
      const diffX = startX - currentX;
      const diffY = startY - currentY;

      // Only prevent default if horizontal swipe
      if (Math.abs(diffX) > Math.abs(diffY)) {
        e.preventDefault();
      }
    });

    this.carousel.addEventListener("touchend", (e) => {
      if (!isDragging) return;

      const endX = e.changedTouches[0].clientX;
      const diffX = startX - endX;
      const threshold = 50;

      if (Math.abs(diffX) > threshold) {
        if (diffX > 0) {
          this.nextSlide();
        } else {
          this.prevSlide();
        }
      }

      isDragging = false;
    });
  }

  handleResize() {
    let resizeTimeout;
    window.addEventListener("resize", () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(() => {
        const newCardsPerView = this.getCardsPerView();
        if (newCardsPerView !== this.cardsPerView) {
          this.cardsPerView = newCardsPerView;
          this.totalSlides = Math.ceil(this.cards.length / this.cardsPerView);
          this.currentIndex = Math.min(this.currentIndex, this.totalSlides - 1);
          this.createDots();
          this.updateCarousel();
        }
      }, 250);
    });
  }
}

// Initialize carousel when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  new AromasCarousel();
});

// Re-initialize if content is loaded dynamically
if (typeof jQuery !== "undefined") {
  jQuery(document).ready(() => {
    new AromasCarousel();
  });
}
