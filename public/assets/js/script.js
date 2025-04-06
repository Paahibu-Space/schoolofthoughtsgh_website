document.addEventListener('DOMContentLoaded', function() {
    // 1. Initialize Swiper slider
    const swiper = new Swiper('.events-slider', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        }
    });

    // 2. Proper Parallax Effect
    const parallaxImage = document.querySelector('.parallax-image');
    if (parallaxImage) {
        const updateParallax = () => {
            if (window.innerWidth >= 992) {
                const scrollPosition = window.pageYOffset;
                const elementPosition = parallaxImage.getBoundingClientRect().top + scrollPosition;
                const distance = scrollPosition - elementPosition;
                parallaxImage.style.transform = `translateY(${distance * 0.3}px)`;
            } else {
                parallaxImage.style.transform = 'none';
            }
        };

        window.addEventListener('scroll', updateParallax);
        window.addEventListener('resize', updateParallax);
        updateParallax(); // Initial call
    }

    // 3. Burger Menu (unchanged)
    const burger = document.querySelector('.burger');
    if (burger) {
        burger.addEventListener('click', function() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('active');
            this.classList.toggle('toggle');
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Pause animation on hover for better UX
    const track = document.querySelector('.partners-track');
    if (track) {
        track.addEventListener('mouseenter', () => {
            track.style.animationPlayState = 'paused';
        });
        
        track.addEventListener('mouseleave', () => {
            track.style.animationPlayState = 'running';
        });
    }

    // Touch support for mobile devices
    let touchStartX = 0;
    let touchEndX = 0;
    
    const handleTouch = () => {
        if (track) {
            track.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
                track.style.animationPlayState = 'paused';
            }, {passive: true});
            
            track.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                if (Math.abs(touchEndX - touchStartX) < 5) {
                    track.style.animationPlayState = 'running';
                }
            }, {passive: true});
        }
    };
    
    if ('ontouchstart' in window) {
        handleTouch();
    }
});