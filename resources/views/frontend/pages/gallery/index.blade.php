{{-- resources/views/gallery/index.blade.php --}}
@extends('frontend.layout')

@section('title', 'Event Gallery')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Fixed spacing for gallery hero to appear after navigation */
    .gallery-hero {
        background-color: #f8f9fc;
        padding: 4rem 0;
        margin-bottom: 2rem;
        text-align: center;
        margin-top: 0;
        margin-top: 100px
    }
    
    .gallery-hero h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 1rem;
    }
    
    .gallery-hero p {
        font-size: 1.1rem;
        color: #6c757d;
        max-width: 800px;
        margin: 0 auto;
    }
    
    .event-gallery-container {
        padding: 3rem 0;
    }
    
    .event-card {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 2.5rem;
        background-color: #fff;
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    
    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }
    
    .event-image {
        height: 250px;
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
    }
    
    .event-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .event-card:hover .event-image img {
        transform: scale(1.05);
    }
    
    .event-details {
        padding: 1.5rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    
    .event-title {
        font-size: 1.4rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
    }
    
    .event-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
        color: #6c757d;
        font-size: 0.9rem;
    }
    
    .event-meta i {
        margin-right: 0.5rem;
    }
    
    .event-description {
        margin-bottom: 1.5rem;
        color: #6c757d;
        font-size: 0.95rem;
        line-height: 1.6;
        flex-grow: 1;
    }
    
    .event-cta {
        text-align: right;
        margin-top: auto;
    }
    
    .view-gallery-btn {
        background-color: #4e73df;
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: 25px;
        font-size: 0.9rem;
        text-decoration: none;
        transition: background-color 0.3s;
        display: inline-flex;
        align-items: center;
    }
    
    .view-gallery-btn:hover {
        background-color: #3a5bd8;
        color: white;
        text-decoration: none;
    }
    
    .view-gallery-btn i {
        margin-left: 0.5rem;
    }
    
    .pagination {
        margin-top: 1.5rem;
        justify-content: center;
    }
    
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }
    
    .no-events {
        text-align: center;
        padding: 3rem 0;
        color: #6c757d;
    }
    
    .image-count {
        background-color: rgba(78, 115, 223, 0.1);
        color: #4e73df;
        padding: 0.25rem 0.75rem;
        border-radius: 25px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    
    /* Grid layout fixes */
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    
    .col-md-6, .col-lg-4 {
        padding-right: 15px;
        padding-left: 15px;
        margin-bottom: 30px;
    }
</style>
@endsection

@section('content')
    <div class="nav-spacing"></div>
    
    <section class="gallery-hero">
        <div class="container">
            <h1>Event Gallery</h1>
            <p>Browse through our collection of memorable moments from past events</p>
        </div>
    </section>

    <div class="container event-gallery-container">
        @if($events->count() > 0)
            <div class="row">
                @foreach($events as $event)
                    <div class="col-md-6 col-lg-4">
                        <div class="event-card">
                            <a href="{{ route('gallery.show', $event->id) }}" class="event-image">
                                @if($event->galleryImages->first())
                                    <img src="{{ asset('storage/' . $event->galleryImages->first()->image_path) }}" 
                                         alt="{{ $event->title ?? 'Event image' }}" 
                                         loading="lazy">
                                @else
                                    <img src="{{ asset('images/no-image.jpg') }}" 
                                         alt="No image available" 
                                         loading="lazy">
                                @endif
                            </a>
                            <div class="event-details">
                                <h3 class="event-title">{{ $event->title ?? 'Untitled Event' }}</h3>
                                <div class="event-meta">
                                    <div>
                                        <i class="far fa-calendar"></i> 
                                        {{ $event->created_at->format('M d, Y') }}
                                    </div>
                                    <span class="image-count">
                                        {{ $event->gallery_images_count ?? 0 }} Photos
                                    </span>
                                </div>
                                <div class="event-description">
                                    {!! Str::limit($event->description ?? 'No description available', 100) !!}
                                </div>
                                <div class="event-cta">
                                    <a href="{{ route('gallery.show', $event->id) }}" class="view-gallery-btn">
                                        View Gallery <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="pagination-container">
                {{ $events->links() }}
            </div>
        @else
            <div class="no-events">
                <i class="far fa-images fa-4x mb-3"></i>
                <h3>No events available</h3>
                <p>Check back soon for upcoming event galleries.</p>
            </div>
        @endif
    </div>
@endsection