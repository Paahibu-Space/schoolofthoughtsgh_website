// public/js/gallery.js
document.addEventListener('DOMContentLoaded', function() {
    // Initialize the lightbox if it exists on the page
    if (typeof lightbox !== 'undefined') {
        // Configure lightbox options
        lightbox.option({
            'resizeDuration': 300,
            'wrapAround': true,
            'albumLabel': 'Image %1 of %2',
            'fadeDuration': 300,
            'imageFadeDuration': 300,
            'positionFromTop': 50,
            'showImageNumberLabel': true
        });
    }
    
    // Lazy loading functionality for gallery images
    const lazyImages = document.querySelectorAll('.gallery-grid img');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    const src = img.getAttribute('data-src');
                    if (src) {
                        img.src = src;
                        img.removeAttribute('data-src');
                    }
                    imageObserver.unobserve(img);
                }
            });
        });
        
        lazyImages.forEach(img => {
            const currentSrc = img.src;
            if (currentSrc) {
                img.setAttribute('data-src', currentSrc);
                // Set a placeholder or low-res image
                img.src = 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1 1"%3E%3C/svg%3E';
                imageObserver.observe(img);
            }
        });
    }
    
    // Optional: Add filtering capability for gallery images
    const filterButtons = document.querySelectorAll('.gallery-filter-btn');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all buttons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            const galleryItems = document.querySelectorAll('.gallery-grid .gallery-item');
            
            galleryItems.forEach(item => {
                if (filter === 'all') {
                    item.style.display = 'block';
                } else {
                    const categories = item.getAttribute('data-category');
                    if (categories && categories.includes(filter)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
        });
    });
    
    // Add smooth scroll to gallery sections
    const galleryLinks = document.querySelectorAll('a[href^="#gallery-"]');
    galleryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Add masonry layout to gallery if needed
    const masonryGrids = document.querySelectorAll('.gallery-masonry');
    if (masonryGrids.length > 0 && typeof Masonry === 'function') {
        masonryGrids.forEach(grid => {
            new Masonry(grid, {
                itemSelector: '.gallery-item',
                columnWidth: '.gallery-sizer',
                percentPosition: true
            });
        });
    }
});