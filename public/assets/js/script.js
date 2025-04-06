// Burger menu toggle
const burger = document.querySelector('.burger');
const navLinks = document.querySelector('.nav-links');
const navItems = document.querySelectorAll('.nav-links li');

burger.addEventListener('click', () => {
  // Toggle nav
  navLinks.classList.toggle('active');
  
  // Burger animation
  burger.classList.toggle('toggle');
  
  // Close dropdowns when closing mobile menu
  if (!navLinks.classList.contains('active')) {
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
      menu.style.display = 'none';
    });
  }
});

// Mobile dropdown toggle
navItems.forEach(item => {
  if (item.querySelector('.dropdown-menu')) {
    item.addEventListener('click', function(e) {
      if (window.innerWidth <= 768) {
        e.preventDefault();
        const dropdown = this.querySelector('.dropdown-menu');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
      }
    });
  }
});

// Close menu when clicking a link (optional)
document.querySelectorAll('.nav-links a').forEach(link => {
  link.addEventListener('click', () => {
    if (window.innerWidth <= 768) {
      navLinks.classList.remove('active');
      burger.classList.remove('toggle');
    }
  });
});

    // Parallax effect for larger screens
    function updateParallax() {
        if (window.innerWidth >= 992) {
            const parallax = document.querySelector('.parallax-image');
            if (parallax) {
                window.addEventListener('scroll', function() {
                    const scrollPosition = window.pageYOffset;
                    parallax.style.transform = `translateY(${scrollPosition * 0.3}px)`;
                });
            }
        }
    }
    
    // Initialize and update on resize
    updateParallax();
    window.addEventListener('resize', updateParallax);
});