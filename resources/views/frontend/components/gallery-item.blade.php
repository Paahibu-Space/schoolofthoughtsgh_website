{{-- resources/views/components/gallery-item.blade.php --}}
@props([
    'image', 
    'lightboxGroup' => 'gallery',
    'showCaption' => true,
    'captionPosition' => 'overlay', // overlay or bottom
    'aspectRatio' => '4:3', // 16:9, 1:1, etc.
    'hoverEffect' => 'zoom' // zoom, fade, slide
])

@php
    // Calculate padding based on aspect ratio
    $ratio = explode(':', $aspectRatio);
    $padding = ($ratio[1] / $ratio[0]) * 100;
    
    // Determine hover effect class
    $hoverClass = 'hover-' . $hoverEffect;
    
    // Determine caption position class
    $captionClass = 'caption-' . $captionPosition;
@endphp

<div {{ $attributes->merge(['class' => 'gallery-component-item ' . $hoverClass . ' ' . $captionClass]) }} style="padding-bottom: {{ $padding }}%;">
    <a href="{{ asset('storage/' . $image->image_path) }}" 
       data-lightbox="{{ $lightboxGroup }}" 
       data-title="{{ $image->title ?? '' }}" 
       class="gallery-component-link">
        <img src="{{ asset('storage/' . $image->image_path) }}" 
             alt="{{ $image->title ?? 'Gallery image' }}" 
             class="gallery-component-image">
        
        @if($showCaption && ($image->title || $image->description) && $captionPosition === 'overlay')
            <div class="gallery-component-caption overlay">
                @if($image->title)
                    <h4 class="gallery-component-title">{{ $image->title }}</h4>
                @endif
                @if($image->description)
                    <p class="gallery-component-description">{{ $image->description }}</p>
                @endif
            </div>
        @endif
    </a>
    
    @if($showCaption && ($image->title || $image->description) && $captionPosition === 'bottom')
        <div class="gallery-component-caption bottom">
            @if($image->title)
                <h4 class="gallery-component-title">{{ $image->title }}</h4>
            @endif
            @if($image->description)
                <p class="gallery-component-description">{{ $image->description }}</p>
            @endif
        </div>
    @endif
</div>

<style>
    .gallery-component-item {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
        height: 0;
        margin-bottom: 20px;
    }
    
    /* Hover effects */
    .gallery-component-item.hover-zoom:hover .gallery-component-image {
        transform: scale(1.05);
    }
    
    .gallery-component-item.hover-fade:hover .gallery-component-image {
        opacity: 0.8;
    }
    
    .gallery-component-item.hover-slide:hover .gallery-component-image {
        transform: translateY(-10px);
    }
    
    .gallery-component-item:hover {
        transform: translateY(-5px);
    }
    
    .gallery-component-link {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: block;
    }
    
    .gallery-component-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: absolute;
        top: 0;
        left: 0;
        transition: all 0.4s ease;
    }
    
    /* Caption styles */
    .gallery-component-caption {
        padding: 15px;
    }
    
    .gallery-component-caption.overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        color: white;
        transform: translateY(100%);
        transition: transform 0.3s ease;
    }
    
    .gallery-component-item:hover .gallery-component-caption.overlay {
        transform: translateY(0);
    }
    
    .gallery-component-caption.bottom {
        background-color: #fff;
        border-top: 1px solid #f1f1f1;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
    }
    
    .gallery-component-title {
        font-size: 1rem;
        font-weight: 600;
        margin-bottom: 0.3rem;
    }
    
    .caption-bottom .gallery-component-title {
        color: #333;
    }
    
    .gallery-component-description {
        font-size: 0.85rem;
        line-height: 1.4;
        margin-bottom: 0;
    }
    
    .caption-bottom .gallery-component-description {
        color: #6c757d;
    }
</style>