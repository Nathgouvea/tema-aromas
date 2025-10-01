/**
 * Novidades Products Slider
 *
 * Handles the novidades products slider functionality on homepage
 *
 * @package TemaAromas
 * @version 1.0.0
 */

(function () {
  "use strict";

  class NovidadesProductsSlider {
    constructor() {
      this.slider = document.getElementById("novidades-products-slider");
      this.prevBtn = document.getElementById("novidades-slider-prev");
      this.nextBtn = document.getElementById("novidades-slider-next");
      this.dotsContainer = document.getElementById("novidades-slider-dots");

      if (!this.slider || !this.prevBtn || !this.nextBtn) {
        return; // Exit if elements don't exist
      }

      this.currentSlide = 0;
      this.slidesPerView = this.getSlidesPerView();
      this.totalSlides = 0;
      this.maxSlides = 0;

      this.init();
    }

    init() {
      this.setupSlider();
      this.createDots();
      this.bindEvents();
      this.updateSlider();
    }

    setupSlider() {
      // Get all product items
      const products = this.slider.querySelectorAll(
        ".woocommerce ul.products li.product"
      );
      this.totalSlides = products.length;

      if (this.totalSlides === 0) {
        return;
      }

      // Calculate how many slides we can show
      this.slidesPerView = this.getSlidesPerView();
      this.maxSlides = Math.max(0, this.totalSlides - this.slidesPerView);

      // Set initial transform
      this.updateSlider();
    }

    getSlidesPerView() {
      const width = window.innerWidth;
      if (width < 768) {
        return 2; // Mobile: 2 products per view
      } else if (width < 1024) {
        return 3; // Tablet: 3 products per view
      } else {
        return 4; // Desktop: 4 products per view
      }
    }

    createDots() {
      if (!this.dotsContainer || this.maxSlides <= 0) {
        return;
      }

      this.dotsContainer.innerHTML = "";

      for (let i = 0; i <= this.maxSlides; i++) {
        const dot = document.createElement("button");
        dot.className = "slider-dot";
        if (i === 0) dot.classList.add("active");
        dot.setAttribute("aria-label", `Ir para slide ${i + 1}`);
        dot.addEventListener("click", () => this.goToSlide(i));
        this.dotsContainer.appendChild(dot);
      }
    }

    bindEvents() {
      // Navigation buttons
      this.prevBtn.addEventListener("click", () => this.prevSlide());
      this.nextBtn.addEventListener("click", () => this.nextSlide());

      // Keyboard navigation
      this.slider.addEventListener("keydown", (e) => {
        if (e.key === "ArrowLeft") {
          e.preventDefault();
          this.prevSlide();
        } else if (e.key === "ArrowRight") {
          e.preventDefault();
          this.nextSlide();
        }
      });

      // Touch/swipe support
      this.addTouchSupport();

      // Window resize
      window.addEventListener("resize", () => {
        this.handleResize();
      });
    }

    addTouchSupport() {
      let startX = 0;
      let startY = 0;
      let isDragging = false;

      this.slider.addEventListener("touchstart", (e) => {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
        isDragging = true;
      });

      this.slider.addEventListener("touchmove", (e) => {
        if (!isDragging) return;

        const currentX = e.touches[0].clientX;
        const currentY = e.touches[0].clientY;
        const diffX = startX - currentX;
        const diffY = startY - currentY;

        // Only prevent default if horizontal swipe is more significant
        if (Math.abs(diffX) > Math.abs(diffY)) {
          e.preventDefault();
        }
      });

      this.slider.addEventListener("touchend", (e) => {
        if (!isDragging) return;

        const endX = e.changedTouches[0].clientX;
        const diffX = startX - endX;
        const threshold = 50; // Minimum swipe distance

        if (Math.abs(diffX) > threshold) {
          if (diffX > 0) {
            this.nextSlide(); // Swipe left - next slide
          } else {
            this.prevSlide(); // Swipe right - previous slide
          }
        }

        isDragging = false;
      });
    }

    handleResize() {
      const newSlidesPerView = this.getSlidesPerView();
      if (newSlidesPerView !== this.slidesPerView) {
        this.slidesPerView = newSlidesPerView;
        this.maxSlides = Math.max(0, this.totalSlides - this.slidesPerView);

        // Adjust current slide if needed
        if (this.currentSlide > this.maxSlides) {
          this.currentSlide = this.maxSlides;
        }

        this.createDots();
        this.updateSlider();
      }
    }

    prevSlide() {
      if (this.currentSlide > 0) {
        this.currentSlide--;
        this.updateSlider();
        this.updateDots();
        this.updateButtons();
      }
    }

    nextSlide() {
      if (this.currentSlide < this.maxSlides) {
        this.currentSlide++;
        this.updateSlider();
        this.updateDots();
        this.updateButtons();
      }
    }

    goToSlide(slideIndex) {
      if (slideIndex >= 0 && slideIndex <= this.maxSlides) {
        this.currentSlide = slideIndex;
        this.updateSlider();
        this.updateDots();
        this.updateButtons();
      }
    }

    updateSlider() {
      if (!this.slider) return;

      const slideWidth = 100 / this.slidesPerView;
      const translateX = -(this.currentSlide * slideWidth);
      this.slider.style.transform = `translateX(${translateX}%)`;
    }

    updateDots() {
      if (!this.dotsContainer) return;

      const dots = this.dotsContainer.querySelectorAll(".slider-dot");
      dots.forEach((dot, index) => {
        dot.classList.toggle("active", index === this.currentSlide);
      });
    }

    updateButtons() {
      if (!this.prevBtn || !this.nextBtn) return;

      this.prevBtn.disabled = this.currentSlide === 0;
      this.nextBtn.disabled = this.currentSlide === this.maxSlides;
    }

    // Public method to refresh slider (useful for dynamic content)
    refresh() {
      this.setupSlider();
      this.createDots();
      this.updateSlider();
      this.updateDots();
      this.updateButtons();
    }
  }

  // Initialize when DOM is ready
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => {
      new NovidadesProductsSlider();
    });
  } else {
    new NovidadesProductsSlider();
  }

  // Auto-play functionality (optional)
  class NovidadesSliderAutoPlay {
    constructor(sliderInstance) {
      this.slider = sliderInstance;
      this.interval = null;
      this.autoPlayDelay = 5000; // 5 seconds
      this.isPaused = false;

      this.init();
    }

    init() {
      if (!this.slider) return;

      this.startAutoPlay();
      this.addPauseOnHover();
    }

    startAutoPlay() {
      this.interval = setInterval(() => {
        if (
          !this.isPaused &&
          this.slider.currentSlide < this.slider.maxSlides
        ) {
          this.slider.nextSlide();
        } else if (
          !this.isPaused &&
          this.slider.currentSlide >= this.slider.maxSlides
        ) {
          this.slider.goToSlide(0); // Loop back to start
        }
      }, this.autoPlayDelay);
    }

    stopAutoPlay() {
      if (this.interval) {
        clearInterval(this.interval);
        this.interval = null;
      }
    }

    addPauseOnHover() {
      const sliderElement = document.getElementById(
        "novidades-products-slider"
      );
      if (!sliderElement) return;

      sliderElement.addEventListener("mouseenter", () => {
        this.isPaused = true;
      });

      sliderElement.addEventListener("mouseleave", () => {
        this.isPaused = false;
      });
    }
  }

  // Initialize auto-play if enabled
  document.addEventListener("DOMContentLoaded", () => {
    const sliderInstance = new NovidadesProductsSlider();
    if (sliderInstance.slider) {
      new NovidadesSliderAutoPlay(sliderInstance);
    }
  });
})();
