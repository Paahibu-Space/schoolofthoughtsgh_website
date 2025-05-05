{{-- resources/views/gallery/masonry.blade.php --}}
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
    
    /* Masonry specific styles */
    .gallery-masonry {
        width: 100%;
        margin: 0 auto;
    }
    
    .gallery-sizer,
    .gallery-item {
        width: 32%;
    }
    
    @media (max-width: 992px) {
        .gallery-sizer,
        .gallery-item {
            width: 48%;
        }
    }
    
    @media (max-width: 576px) {
        .gallery-sizer,
        .gallery-item {
            width: 100%;
        }
    }
    
    .gallery-item {
        margin-bottom: 20px;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }
    
    .gallery-item:hover {
        transform: translateY(-5px);
    }
    
    .gallery-item img {
        width: 100%;
        display: block;
        border-radius: 8px;
        transition: transform 0.5s ease;
    }
    
    .gallery-item:hover img {
        transform: scale(1.05);
    }
    
    .gallery-item-caption {
        background-color: #fff;
        padding: 12px 15px;
        border-top: 1px solid #f1f1f1;
    }
    
    .gallery-item-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.3rem;
        color: #333;
    }
    
    .gallery-item-description {
        font-size: 0.85rem;
        color: #6c757d;
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
    
    .gallery-layout-toggle {
        display: flex;
        gap: 10px;
    }
    
    .gallery-layout-btn {
        background-color: #f8f9fc;
        border: 1px solid #e3e6f0;
        border-radius: 4px;
        padding: 6px 12px;
        font-size: 0.9rem;
        color: #6c757d;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .gallery-layout-btn.active {
        background-color: #4e73df;
        color: white;
        border-color: #4e73df;
    }
    
    .gallery-layout-btn:hover:not(.active) {
        background-color: #eaecf4;
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
                <div class="gallery-layout-toggle">
                    <a href="{{ route('gallery.show', $event->id) }}" class="gallery-layout-btn">
                        <i class="fas fa-th"></i> Grid
                    </a>
                    <a href="{{ route('gallery.masonry', $event->id) }}" class="gallery-layout-btn active">
                        <i class="fas fa-th-large"></i> Masonry
                    </a>
                </div>
            </div>
            
            <div class="gallery-masonry">
                <div class="gallery-sizer"></div>
                @foreach($event->galleryImages->sortBy('display_order') as $image)
                    <div class="gallery-item">
                        <a href="{{ asset('storage/' . $image->image_path) }}" data-lightbox="event-gallery" data-title="{{ $image->title ?? '' }}" data-alt="{{ $image->title ?? 'Gallery Image' }}">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->title ?? 'Gallery Image' }}">
                        </a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
<script>
    // Initialize lightbox options
    lightbox.option({
        'resizeDuration': 300,
        'wrapAround': true,
        'albumLabel': 'Image %1 of %2',
        'fadeDuration': 300,
        'imageFadeDuration': 300,
    });
    
    // Initialize Masonry layout
    document.addEventListener('DOMContentLoaded', function() {
        var grid = document.querySelector('.gallery-masonry');
        
        // Initialize Masonry after all images have loaded
        imagesLoaded(grid, function() {
            var msnry = new Masonry(grid, {
                itemSelector: '.gallery-item',
                columnWidth: '.gallery-sizer',
                percentPosition: true,
                gutter: 20
            });
        });
    });
</script>
@endpush