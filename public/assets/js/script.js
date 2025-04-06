// navbar.js
document.addEventListener('DOMContentLoaded', function() {
    const burger = document.querySelector('.burger');
    const navLinks = document.querySelector('.nav-links');
    const navItems = document.querySelectorAll('.nav-links li');
    const dropdowns = document.querySelectorAll('.nav-links > li > a:first-child');
    
    // Toggle mobile menu
    burger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        burger.classList.toggle('toggle');
        
        // Close all dropdowns when menu is closed
        if (!navLinks.classList.contains('active')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.classList.remove('active');
            });
        }
    });
    
    // Handle dropdowns on mobile
    dropdowns.forEach(item => {
        item.addEventListener('click', function(e) {
            if (window.innerWidth <= 992) {
                e.preventDefault();
                const dropdown = this.nextElementSibling;
                dropdown.classList.toggle('active');
                
                // Close other dropdowns
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== dropdown) {
                        menu.classList.remove('active');
                    }
                });
            }
        });
    });
    
    // Set active link
    navItems.forEach(item => {
        item.addEventListener('click', function() {
            navItems.forEach(navItem => navItem.querySelector('a').classList.remove('active'));
            this.querySelector('a').classList.add('active');
            
            // Close mobile menu after selection
            if (window.innerWidth <= 992) {
                navLinks.classList.remove('active');
                burger.classList.remove('toggle');
            }
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.nav-links') && window.innerWidth > 992) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                menu.style.opacity = '0';
                menu.style.visibility = 'hidden';
            });
        }
    });
    
    // Update active state on scroll
    window.addEventListener('scroll', function() {
        // You can add section detection logic here if needed
    });
});