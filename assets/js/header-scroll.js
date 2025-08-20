/**
 * Header Scroll Effect
 * Handles transparent to solid header transition
 */

(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        const header = document.getElementById('masthead');
        const heroSection = document.querySelector('.hero-luxury-screenshot');
        
        if (!header) return;

        // Check if we're on a page with the hero section
        const hasHero = heroSection !== null;
        
        // Function to update header state
        function updateHeaderState() {
            const scrollPosition = window.scrollY;
            const heroHeight = hasHero ? heroSection.offsetHeight : 0;
            const scrollThreshold = hasHero ? heroHeight * 0.1 : 50; // 10% of hero height or 50px
            
            if (scrollPosition > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        }

        // Only add transparent class if we have a hero section
        if (hasHero) {
            header.classList.add('transparent-header');
        } else {
            // Remove transparent class on pages without hero
            header.classList.remove('transparent-header');
        }

        // Initial check
        updateHeaderState();

        // Throttle function for better performance
        let ticking = false;
        function requestTick() {
            if (!ticking) {
                window.requestAnimationFrame(updateHeaderState);
                ticking = true;
                setTimeout(function() {
                    ticking = false;
                }, 100);
            }
        }

        // Listen for scroll events
        window.addEventListener('scroll', requestTick);
        
        // Listen for resize events (in case hero height changes)
        window.addEventListener('resize', updateHeaderState);
    });
})();