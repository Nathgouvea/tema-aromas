/**
 * Featured Products Slideshow
 * 
 * Handles the slideshow functionality for featured products on homepage
 *
 * @package TemaAromas
 * @version 1.0.0
 */

(function() {
    'use strict';

    class FeaturedSlideshow {
        constructor() {
            this.track = document.getElementById('featured-slideshow-track');
            this.dotsContainer = document.getElementById('featured-slideshow-dots');
            this.prevBtn = document.querySelector('.slideshow-prev');
            this.nextBtn = document.querySelector('.slideshow-next');
            
            if (!this.track) return;
            
            this.slides = this.track.querySelectorAll('.slideshow-slide');
            this.currentSlide = 0;
            this.slidesToShow = this.getSlidesToShow();
            this.totalSlides = this.slides.length;
            this.maxSlide = Math.max(0, this.totalSlides - this.slidesToShow);
            
            this.init();
        }

        init() {
            this.createDots();
            this.bindEvents();
            this.updateSlideshow();
            this.startAutoPlay();
        }

        getSlidesToShow() {
            const width = window.innerWidth;
            if (width >= 1200) return 4;
            if (width >= 1024) return 3;
            if (width >= 768) return 2;
            return 1;
        }

        createDots() {
            if (!this.dotsContainer) return;
            
            this.dotsContainer.innerHTML = '';
            const totalDots = Math.ceil(this.totalSlides / this.slidesToShow);
            
            for (let i = 0; i < totalDots; i++) {
                const dot = document.createElement('button');
                dot.className = 'slideshow-dot';
                dot.setAttribute('aria-label', `Ir para o slide ${i + 1}`);
                dot.addEventListener('click', () => this.goToSlide(i));
                this.dotsContainer.appendChild(dot);
            }
            
            this.dots = this.dotsContainer.querySelectorAll('.slideshow-dot');
        }

        bindEvents() {
            if (this.prevBtn) {
                this.prevBtn.addEventListener('click', () => this.prevSlide());
            }
            
            if (this.nextBtn) {
                this.nextBtn.addEventListener('click', () => this.nextSlide());
            }

            // Touch/swipe support
            this.track.addEventListener('touchstart', (e) => this.handleTouchStart(e));
            this.track.addEventListener('touchmove', (e) => this.handleTouchMove(e));
            this.track.addEventListener('touchend', (e) => this.handleTouchEnd(e));

            // Keyboard navigation
            this.track.addEventListener('keydown', (e) => this.handleKeydown(e));

            // Pause on hover
            this.track.addEventListener('mouseenter', () => this.pauseAutoPlay());
            this.track.addEventListener('mouseleave', () => this.startAutoPlay());

            // Resize handling
            window.addEventListener('resize', () => this.handleResize());
        }

        handleTouchStart(e) {
            this.touchStartX = e.touches[0].clientX;
            this.touchStartY = e.touches[0].clientY;
            this.isDragging = false;
        }

        handleTouchMove(e) {
            if (!this.touchStartX) return;
            
            const touchCurrentX = e.touches[0].clientX;
            const touchCurrentY = e.touches[0].clientY;
            const diffX = Math.abs(touchCurrentX - this.touchStartX);
            const diffY = Math.abs(touchCurrentY - this.touchStartY);
            
            if (diffX > diffY && diffX > 10) {
                this.isDragging = true;
                e.preventDefault();
            }
        }

        handleTouchEnd(e) {
            if (!this.isDragging || !this.touchStartX) return;
            
            const touchEndX = e.changedTouches[0].clientX;
            const diffX = this.touchStartX - touchEndX;
            
            if (Math.abs(diffX) > 50) {
                if (diffX > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
            }
            
            this.touchStartX = null;
            this.isDragging = false;
        }

        handleKeydown(e) {
            switch(e.key) {
                case 'ArrowLeft':
                    e.preventDefault();
                    this.prevSlide();
                    break;
                case 'ArrowRight':
                    e.preventDefault();
                    this.nextSlide();
                    break;
                case 'Home':
                    e.preventDefault();
                    this.goToSlide(0);
                    break;
                case 'End':
                    e.preventDefault();
                    this.goToSlide(this.maxSlide);
                    break;
            }
        }

        handleResize() {
            const newSlidesToShow = this.getSlidesToShow();
            if (newSlidesToShow !== this.slidesToShow) {
                this.slidesToShow = newSlidesToShow;
                this.maxSlide = Math.max(0, this.totalSlides - this.slidesToShow);
                this.currentSlide = Math.min(this.currentSlide, this.maxSlide);
                this.createDots();
                this.updateSlideshow();
            }
        }

        nextSlide() {
            if (this.currentSlide < this.maxSlide) {
                this.currentSlide++;
            } else {
                this.currentSlide = 0; // Loop back to start
            }
            this.updateSlideshow();
        }

        prevSlide() {
            if (this.currentSlide > 0) {
                this.currentSlide--;
            } else {
                this.currentSlide = this.maxSlide; // Loop to end
            }
            this.updateSlideshow();
        }

        goToSlide(slideIndex) {
            this.currentSlide = Math.max(0, Math.min(slideIndex, this.maxSlide));
            this.updateSlideshow();
        }

        updateSlideshow() {
            const slideWidth = 100 / this.slidesToShow;
            const translateX = -(this.currentSlide * slideWidth);
            
            this.track.style.transform = `translateX(${translateX}%)`;
            
            // Update navigation buttons
            if (this.prevBtn) {
                this.prevBtn.disabled = this.currentSlide === 0;
            }
            if (this.nextBtn) {
                this.nextBtn.disabled = this.currentSlide === this.maxSlide;
            }
            
            // Update dots
            if (this.dots) {
                const currentDot = Math.floor(this.currentSlide / this.slidesToShow);
                this.dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentDot);
                });
            }
        }

        startAutoPlay() {
            this.pauseAutoPlay();
            this.autoPlayInterval = setInterval(() => {
                this.nextSlide();
            }, 5000); // 5 seconds
        }

        pauseAutoPlay() {
            if (this.autoPlayInterval) {
                clearInterval(this.autoPlayInterval);
                this.autoPlayInterval = null;
            }
        }

        destroy() {
            this.pauseAutoPlay();
            // Remove event listeners if needed
        }
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            new FeaturedSlideshow();
        });
    } else {
        new FeaturedSlideshow();
    }

})();
