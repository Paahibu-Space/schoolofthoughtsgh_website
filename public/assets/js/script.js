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
        document.getElementById('current-year').textContent = new Date().getFullYear();
        
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
    const iframe = videoContainer.querySelector('.iframe');
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

// public/js/contact.js

document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Client-side validation
            if (!validateForm()) {
                return;
            }
            
            // Show loading state
            const submitBtn = contactForm.querySelector('.submit-btn');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnIcon = submitBtn.querySelector('.btn-icon');
            const spinner = submitBtn.querySelector('.spinner-border');
            
            submitBtn.disabled = true;
            btnText.textContent = 'Sending...';
            btnIcon.classList.add('d-none');
            spinner.classList.remove('d-none');
            
            // Get form data
            const formData = new FormData(contactForm);
            
            // Send AJAX request
            fetch(contactForm.getAttribute('action'), {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Reset loading state
                submitBtn.disabled = false;
                btnText.textContent = 'Send Message';
                btnIcon.classList.remove('d-none');
                spinner.classList.add('d-none');
                
                if (data.success) {
                    // Show success message
                    const successAlert = document.createElement('div');
                    successAlert.classList.add('alert', 'alert-success');
                    successAlert.textContent = data.message;
                    
                    // Insert alert before form
                    contactForm.parentNode.insertBefore(successAlert, contactForm);
                    
                    // Reset form
                    contactForm.reset();
                    
                    // Reset reCAPTCHA
                    if (typeof grecaptcha !== 'undefined') {
                        grecaptcha.reset();
                    }
                    
                    // Remove success message after 5 seconds
                    setTimeout(() => {
                        successAlert.remove();
                    }, 5000);
                } else {
                    // Show error messages
                    if (data.errors) {
                        displayErrors(data.errors);
                    } else {
                        // General error message
                        const errorAlert = document.createElement('div');
                        errorAlert.classList.add('alert', 'alert-danger');
                        errorAlert.textContent = data.message || 'An error occurred. Please try again.';
                        
                        // Insert alert before form
                        contactForm.parentNode.insertBefore(errorAlert, contactForm);
                        
                        // Remove error message after 5 seconds
                        setTimeout(() => {
                            errorAlert.remove();
                        }, 5000);
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                
                // Reset loading state
                submitBtn.disabled = false;
                btnText.textContent = 'Send Message';
                btnIcon.classList.remove('d-none');
                spinner.classList.add('d-none');
                
                // Show error message
                const errorAlert = document.createElement('div');
                errorAlert.classList.add('alert', 'alert-danger');
                errorAlert.textContent = 'An error occurred. Please try again.';
                
                // Insert alert before form
                contactForm.parentNode.insertBefore(errorAlert, contactForm);
                
                // Remove error message after 5 seconds
                setTimeout(() => {
                    errorAlert.remove();
                }, 5000);
            });
        });
    }
    
    // Client-side validation function
    function validateForm() {
        let isValid = true;
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const subject = document.getElementById('subject');
        const message = document.getElementById('message');
        
        // Reset previous error messages
        document.querySelectorAll('.is-invalid').forEach(el => {
            el.classList.remove('is-invalid');
        });
        document.querySelectorAll('.invalid-feedback').forEach(el => {
            el.remove();
        });
        
        // Validate name
        if (!name.value.trim()) {
            displayFieldError(name, 'Please enter your name');
            isValid = false;
        }
        
        // Validate email
        if (!email.value.trim()) {
            displayFieldError(email, 'Please enter your email address');
            isValid = false;
        } else if (!isValidEmail(email.value)) {
            displayFieldError(email, 'Please enter a valid email address');
            isValid = false;
        }
        
        // Validate subject
        if (!subject.value.trim()) {
            displayFieldError(subject, 'Please enter a subject');
            isValid = false;
        }
        
        // Validate message
        if (!message.value.trim()) {
            displayFieldError(message, 'Please enter your message');
            isValid = false;
        } else if (message.value.trim().length < 10) {
            displayFieldError(message, 'Your message is too short (minimum 10 characters)');
            isValid = false;
        }
        
        // Validate reCAPTCHA
        if (typeof grecaptcha !== 'undefined') {
            const recaptchaResponse = grecaptcha.getResponse();
            if (!recaptchaResponse) {
                const recaptchaWrapper = document.querySelector('.g-recaptcha');
                const errorSpan = document.createElement('span');
                errorSpan.classList.add('text-danger', 'd-block', 'mt-2');
                errorSpan.textContent = 'Please complete the reCAPTCHA';
                recaptchaWrapper.parentNode.appendChild(errorSpan);
                isValid = false;
            }
        }
        
        return isValid;
    }
    
    // Display field error
    function displayFieldError(field, message) {
        field.classList.add('is-invalid');
        const errorSpan = document.createElement('span');
        errorSpan.classList.add('invalid-feedback');
        errorSpan.textContent = message;
        field.parentNode.appendChild(errorSpan);
    }
    
    // Display server-side errors
    function displayErrors(errors) {
        for (const field in errors) {
            const inputField = document.querySelector(`[name="${field}"]`);
            if (inputField) {
                inputField.classList.add('is-invalid');
                const errorSpan = document.createElement('span');
                errorSpan.classList.add('invalid-feedback');
                errorSpan.textContent = errors[field][0];
                inputField.parentNode.appendChild(errorSpan);
            } else if (field === 'g-recaptcha-response') {
                const recaptchaWrapper = document.querySelector('.g-recaptcha');
                if (recaptchaWrapper) {
                    const errorSpan = document.createElement('span');
                    errorSpan.classList.add('text-danger', 'd-block', 'mt-2');
                    errorSpan.textContent = errors[field][0];
                    recaptchaWrapper.parentNode.appendChild(errorSpan);
                }
            }
        }
    }
    
    // Email validation helper
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
});