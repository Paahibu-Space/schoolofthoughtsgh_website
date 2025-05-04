{{-- resources/views/gallery/show.blade.php --}}
@extends('frontend.layout')

@section('title', $event->title . ' - Gallery')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<style>
    .event-gallery-header {
        background-color: #f8f9fc;
        padding: 3rem 0;
        margin-bottom: 2rem;
    }
    
    .event-title {
        font-size: 2.2rem;
        color: #333;
        margin-bottom: 0.75rem;
    }
    
    .event-date {
        color: #6c757d;
        font-size: 1.1rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }
    
    .event-date i {
        margin-right: 0.5rem;
    }
    
    .event-description {
        color: #6c757d;
        font-size: 1rem;
        line-height: 1.7;
        max-width: 800px;
    }
    
    .gallery-container {
        padding-bottom: 4rem;
    }
    
    .gallery-filter {
        margin-bottom: 2rem;
        padding: 1rem;
        background-color: #f8f9fc;
        border-radius: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .gallery-stats {
        font-size: 0.95rem;
        color: #6c757d;
    }
    
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        grid-gap: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        height: 0;
        padding-bottom: 75%; /* 4:3 Aspect Ratio */
    }
    
    .gallery-item:hover {
        transform: translateY(-5px);
    }
    
    .gallery-item a {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .gallery-item:hover img {
        transform: scale(1.05);
    }
    
    .gallery-item-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
        color: white;
        padding: 1rem;
        transform: translateY(100%);
        transition: transform 0.3s ease;
    }
    
    .gallery-item:hover .gallery-item-caption {
        transform: translateY(0);
    }
    
    .gallery-item-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.3rem;
    }
    
    .gallery-item-description {
        font-size: 0.85rem;
        opacity: 0.9;
    }
    
    .back-link {
        display: inline-flex;
        align-items: center;
        color: #4e73df;
        font-weight: 500;
        transition: color 0.3s;
        margin-bottom: 1.5rem;
    }
    
    .back-link:hover {
        color: #3a5bd8;
        text-decoration: none;
    }
    
    .back-link i {
        margin-right: 0.5rem;
    }
    
    .no-images {
        text-align: center;
        padding: 3rem 0;
        color: #6c757d;
    }
    
    /* Responsive adjustments */
    @media (max-width: 767px) {
        .event-gallery-header {
            padding: 2rem 0;
        }
        
        .event-title {
            font-size: 1.8rem;
        }
        
        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 1rem;
        }
        
        .gallery-filter {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .gallery-stats {
            margin-bottom: 1rem;
        }
    }
</style>
@endsection

@section('content')
    <div class="event-gallery-header">
        <div class="container">
            <a href="{{ route('gallery.index') }}" class="back-link">
                <i class="fas fa-arrow-left"></i> Back to All Galleries
            </a>
            <h1 class="event-title">{{ $event->title }}</h1>
            <div class="event-date">
                <i class="far fa-calendar"></i> {{ $event->created_at->format('F d, Y') }}
            </div>
            @if($event->description)
                <div class="event-description">
                    {{ $event->description }}
                </div>
            @endif
        </div>
    </div>

    <div class="container gallery-container">
        @if($event->galleryImages->count() > 0)
            <div class="gallery-filter">
                <div class="gallery-stats">
                    <strong>{{ $event->galleryImages->count() }}</strong> photos in this gallery
                </div>
                {{-- <div class="gallery-layout-toggle">
                    <a href="{{ route('gallery.show', $event->id) }}" class="gallery-layout-btn">
                        <i class="fas fa-th"></i> Grid
                    </a>
                    <a href="{{ route('gallery.masonry', $event->id) }}" class="gallery-layout-btn active">
                        <i class="fas fa-th-large"></i> Masonry
                    </a>
                </div> --}}
            </div>
            
            <div class="gallery-grid">
                @foreach($event->galleryImages->sortBy('display_order') as $image)
                    <div class="gallery-item">
                        <a href="{{ asset('storage/' . $image->image_path) }}" data-lightbox="event-gallery" data-title="{{ $image->title ?? '' }}" data-alt="{{ $image->title ?? 'Gallery Image' }}">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title ?? 'Gallery Image' }}">
                            @if($image->title || $image->description)
                                <div class="gallery-item-caption">
                                    @if($image->title)
                                        <div class="gallery-item-title">{{ $image->title }}</div>
                                    @endif
                                    @if($image->description)
                                        <div class="gallery-item-description">{{ $image->description }}</div>
                                    @endif
                                </div>
                            @endif
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-images">
                <i class="far fa-images fa-4x mb-3"></i>
                <h3>No images available</h3>
                <p>This event gallery is empty. Please check back later.</p>
            </div>
        @endif
    </div>
@endsection


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script>
    // Initialize lightbox options
    lightbox.option({
        'resizeDuration': 300,
        'wrapAround': true,
        'albumLabel': 'Image %1 of %2',
        'fadeDuration': 300,
        'imageFadeDuration': 300,
    });
</script>
@endpush