document.addEventListener('DOMContentLoaded', function() {
    // 1. Initialize all Swiper sliders
    const initSwipers = () => {
        // Events Slider
        new Swiper('.events-slider', {
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

        // Blogs Slider
        new Swiper('.blogs-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                576: { slidesPerView: 1 },
                768: { slidesPerView: 1 },
                992: { slidesPerView: 2, spaceBetween: 30 }
            }
        });
    };

    // 2. Parallax Effect
    const initParallax = () => {
        const parallaxBg = document.querySelector('.parallax-bg');
        if (!parallaxBg) return;

        const handleScroll = () => {
            if (window.innerWidth > 992) {
                const scrollPosition = window.pageYOffset;
                const limit = parallaxBg.offsetHeight - window.innerHeight;
                const movement = scrollPosition * 0.3;
                
                if (movement <= limit) {
                    parallaxBg.style.transform = `translateY(${movement}px)`;
                }
            }
        };

        const handleResize = () => {
            if (window.innerWidth <= 992) {
                parallaxBg.style.backgroundAttachment = 'scroll';
                parallaxBg.style.transform = 'none';
            } else {
                parallaxBg.style.backgroundAttachment = 'fixed';
            }
        };

        window.addEventListener('scroll', handleScroll);
        window.addEventListener('resize', handleResize);
        handleResize(); // Initialize
    };

    // 3. Burger Menu
    const initBurgerMenu = () => {
        const burger = document.querySelector('.burger');
        if (!burger) return;
    
        burger.addEventListener('click', function() {
            // Only toggle menu on mobile screens
            if (window.innerWidth <= 992) {
                const navLinks = document.querySelector('.nav-links');
                navLinks.classList.toggle('active');
                this.classList.toggle('toggle');
            }
        });
    
        // Close mobile menu when clicking on dropdown parents
        document.querySelectorAll('.nav-links > li > a').forEach(link => {
            link.addEventListener('click', function(e) {
                if (window.innerWidth <= 992) {
                    const navLinks = document.querySelector('.nav-links');
                    const burger = document.querySelector('.burger');
                    
                    // If this is a dropdown parent link
                    if (this.nextElementSibling && this.nextElementSibling.classList.contains('dropdown-menu')) {
                        e.preventDefault();
                        this.nextElementSibling.classList.toggle('active');
                    } else {
                        // Regular link - close menu
                        navLinks.classList.remove('active');
                        burger.classList.remove('toggle');
                    }
                }
            });
        });
    };
    // 4. Partners Animation
    const initPartnersAnimation = () => {
        const track = document.querySelector('.partners-track');
        if (!track) return;

        // Mouse events
        track.addEventListener('mouseenter', () => {
            track.style.animationPlayState = 'paused';
        });
        
        track.addEventListener('mouseleave', () => {
            track.style.animationPlayState = 'running';
        });

        // Touch support
        if ('ontouchstart' in window) {
            let touchStartX = 0;
            let touchEndX = 0;
            
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

    // 5. Footer Functionality
    const initFooter = () => {
        // Copyright year
        document.getElementById('year').textContent = new Date().getFullYear();
        
        // Back to top button
        const backToTopBtn = document.querySelector('.back-to-top');
        if (backToTopBtn) {
            window.addEventListener('scroll', function() {
                backToTopBtn.classList.toggle('active', window.pageYOffset > 300);
            });
            
            backToTopBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
        
        // Smooth scroll for footer links
        document.querySelectorAll('.footer-left a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    };

    // Initialize all components
    initSwipers();
    initParallax();
    initBurgerMenu();
    initPartnersAnimation();
    initFooter();
});

// Video player
document.addEventListener('DOMContentLoaded', function() {
    const videoContainer = document.querySelector('.video-container');
    const iframe = videoContainer.querySelector('iframe');
    const playButton = document.querySelector('.play-button');
    
    // Hide play button when video starts
    iframe.addEventListener('load', function() {
        iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
    });
    
    videoContainer.addEventListener('click', function() {
        playButton.style.opacity = '0';
        playButton.style.visibility = 'hidden';
        iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
    });
    
    // Reset play button when mouse leaves
    videoContainer.addEventListener('mouseleave', function() {
        if (iframe.src.includes('autoplay=0')) {
            playButton.style.opacity = '1';
            playButton.style.visibility = 'visible';
        }
    });
});