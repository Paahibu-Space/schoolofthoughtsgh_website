{{-- resources/views/gallery/carousel.blade.php --}}

@unless(empty($event->galleryImages) || $event->galleryImages->count() === 0)
<style>
    .gallery-carousel-section {
        padding: 4rem 0;
        background-color: #f8f9fc;
    }
    
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    
    .section-title {
        font-size: 1.8rem;
        color: #333;
        margin: 0;
    }
    
    .view-all-link {
        color: #4e73df;
        font-weight: 500;
        display: flex;
        align-items: center;
        transition: color 0.3s;
    }
    
    .view-all-link:hover {
        color: #3a5bd8;
        text-decoration: none;
    }
    
    .view-all-link i {
        margin-left: 0.5rem;
        font-size: 0.9rem;
    }
    
    .gallery-carousel-container {
        position: relative;
        padding: 0 50px;
    }
    
    .gallery-carousel {
        display: flex;
        overflow-x: auto;
        scroll-behavior: smooth;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE and Edge */
        gap: 20px;
        padding: 10px 0;
    }
    
    .gallery-carousel::-webkit-scrollbar {
        display: none; /* Chrome, Safari, Opera */
    }
    
    .carousel-item {
        flex: 0 0 300px;
        scroll-snap-align: start;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        background-color: #fff;
        transition: transform 0.3s ease;
    }
    
    .carousel-item:hover {
        transform: translateY(-5px);
    }
    
    .carousel-item-link {
        display: block;
        color: inherit;
        text-decoration: none;
    }
    
    .carousel-image {
        height: 200px;
        overflow: hidden;
    }
    
    .carousel-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .carousel-item:hover .carousel-image img {
        transform: scale(1.05);
    }
    
    .carousel-caption {
        padding: 15px;
    }
    
    .carousel-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
    }
    
    .carousel-event-name {
        font-size: 0.85rem;
        color: #6c757d;
    }
    
    .carousel-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: white;
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
    }
    
    .carousel-nav:hover {
        background-color: #4e73df;
        color: white;
    }
    
    .prev-btn {
        left: 0;
    }
    
    .next-btn {
        right: 0;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .gallery-carousel-section {
            padding: 3rem 0;
        }
        
        .section-title {
            font-size: 1.5rem;
        }
        
        .carousel-item {
            flex: 0 0 250px;
        }
        
        .gallery-carousel-container {
            padding: 0 40px;
        }
    }
    
    @media (max-width: 576px) {
        .section-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
        
        .carousel-item {
            flex: 0 0 200px;
        }
        
        .gallery-carousel-container {
            padding: 0 30px;
        }
        
        .carousel-image {
            height: 150px;
        }
    }
</style>
<div class="gallery-carousel-section">
    <div class="container">
        @if(isset($event->title))
            <div class="section-header">
                <h2 class="section-title">{{ $event->title }}</h2>
                <a href="{{ route('gallery.index') }}" class="view-all-link">View All Galleries <i class="fas fa-arrow-right"></i></a>
            </div>
        @endif
        
        <div class="gallery-carousel-container">
            <div class="gallery-carousel" id="galleryCarousel">
                @foreach($event->galleryImages->sortBy('display_order') as $image)
                    <div class="carousel-item">
                        <a href="{{ isset($image->event) ? route('gallery.show', $image->event_id) : '#' }}" class="carousel-item-link">
                            <div class="carousel-image">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title ?? 'Gallery image' }}">
                            </div>
                            <div class="carousel-caption">
                                @if($image->title)
                                    <h4 class="carousel-title">{{ $image->title }}</h4>
                                @endif
                                @if(isset($image->event))
                                    <div class="carousel-event-name">{{ $image->event->title }}</div>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            
            <button class="carousel-nav prev-btn" id="carouselPrev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="carousel-nav next-btn" id="carouselNext">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('galleryCarousel');
    const prevBtn = document.getElementById('carouselPrev');
    const nextBtn = document.getElementById('carouselNext');
    
    if (!carousel || !prevBtn || !nextBtn) return;
    
    // Calculate scroll amount based on carousel item width + gap
    const scrollAmount = () => {
        const carouselItem = carousel.querySelector('.carousel-item');
        if (!carouselItem) return 320; // Default scroll amount
        
        const itemWidth = carouselItem.offsetWidth;
        const computedStyle = window.getComputedStyle(carousel);
        const gap = parseInt(computedStyle.getPropertyValue('gap'), 10) || 20;
        
        return itemWidth + gap;
    };
    
    // Scroll left
    prevBtn.addEventListener('click', function() {
        carousel.scrollBy({
            left: -scrollAmount(),
            behavior: 'smooth'
        });
    });
    
    // Scroll right
    nextBtn.addEventListener('click', function() {
        carousel.scrollBy({
            left: scrollAmount(),
            behavior: 'smooth'
        });
    });
    
    // Hide/show buttons based on scroll position
    const updateButtonVisibility = () => {
        const isAtStart = carousel.scrollLeft <= 5;
        const isAtEnd = carousel.scrollLeft >= carousel.scrollWidth - carousel.clientWidth - 5;
        
        prevBtn.style.opacity = isAtStart ? '0.5' : '1';
        prevBtn.style.pointerEvents = isAtStart ? 'none' : 'auto';
        
        nextBtn.style.opacity = isAtEnd ? '0.5' : '1';
        nextBtn.style.pointerEvents = isAtEnd ? 'none' : 'auto';
    };
    
    // Initialize button state
    updateButtonVisibility();
    
    // Update button state on scroll
    carousel.addEventListener('scroll', updateButtonVisibility);
    
    // Update on window resize
    window.addEventListener('resize', updateButtonVisibility);
});
</script>
@endunless