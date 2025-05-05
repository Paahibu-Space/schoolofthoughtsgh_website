{{-- resources/views/gallery/featured.blade.php --}}
<style>
    a {
        text-decoration: none
    }
    .featured-gallery-section {
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
    
    .featured-gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        grid-gap: 1.5rem;
    }
    
    .featured-gallery-item {
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: #fff;
    }
    
    .featured-gallery-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }
    
    .featured-gallery-link {
        display: block;
        color: inherit;
    }
    
    .featured-gallery-link:hover {
        text-decoration: none;
        color: inherit;
    }
    
    .featured-image-wrapper {
        height: 200px;
        overflow: hidden;
    }
    
    .featured-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .featured-gallery-item:hover .featured-image-wrapper img {
        transform: scale(1.05);
    }
    
    .featured-gallery-info {
        padding: 1.25rem;
    }
    
    .event-title {
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
    }
    
    .event-date {
        font-size: 0.9rem;
        color: #6c757d;
    }
    
    .no-featured-images {
        text-align: center;
        padding: 2rem;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
    
    @media (max-width: 768px) {
        .featured-gallery-section {
            padding: 3rem 0;
        }
        
        .section-title {
            font-size: 1.5rem;
        }
        
        .featured-gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 1rem;
        }
    }
</style>
<div class="featured-gallery-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Featured Gallery</h2>
            <a href="{{ route('gallery.index') }}" class="view-all-link">View All <i class="fas fa-arrow-right"></i></a>
        </div>
        
        @if($featuredImages->count() > 0)
            <div class="featured-gallery-grid">
                @foreach($featuredImages as $image)
                    <div class="featured-gallery-item">
                        <a href="{{ route('gallery.show', $image->event_id) }}" class="featured-gallery-link">
                            <div class="featured-image-wrapper">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title ?? 'Featured image' }}">
                            </div>
                            <div class="featured-gallery-info">
                                <h4 class="event-title">{{ $image->event->title }}</h4>
                                <div class="event-date">{{ $image->event->created_at->format('M d, Y') }}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-featured-images">
                <p>No featured images available.</p>
            </div>
        @endif
    </div>
</div>