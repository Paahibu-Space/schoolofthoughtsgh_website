@extends('frontend.layout')
@section('styles')
<style>
/* Hero Section */
.events-details-hero {
  height: 65vh;
  background-size: cover;
  background-position: center;
  position: relative;
  margin-bottom: 0;
}

.hero-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.7));
}

.events-details-hero h1 {
  text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
  letter-spacing: 0.5px;
  font-weight: 700;
}

/* Details Section */
.details-section {
  padding: 4rem 0;
  background-color: var(--light-bg);
  position: relative;
  z-index: 1;
}

.details-section .container {
  position: relative;
  margin-top: -80px;
}

.details-image {
  border-radius: var(--border-radius);
  overflow: hidden;
  box-shadow: var(--box-shadow);
  height: 100%;
  background-color: white;
  padding: 8px;
}

.details-image img {
  transition: var(--transition);
  object-fit: cover;
  height: 100%;
  border-radius: calc(var(--border-radius) - 2px);
}

/* Event Details Box */
.event-details-box {
  background: var(--primary-color);
  border-radius: var(--border-radius);
  box-shadow: var(--box-shadow);
  transition: var(--transition);
}

.event-details-box h3 {
  font-weight: 600;
  font-size: 1.5rem;
  border-bottom: 1px solid rgba(255,255,255,0.1);
  padding-bottom: 0.75rem;
}

.event-details-box i {
  color: var(--secondary-color);
  font-size: 1.2rem;
}

.event-details-box strong {
  font-weight: 600;
  display: block;
  margin-bottom: 0.25rem;
  font-size: 0.85rem;
  color: rgba(255,255,255,0.9);
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.event-details-box p {
  font-size: 1.05rem;
}

.event-details-box li {
  margin-bottom: 1.25rem !important;
}

.event-details-box li:last-child {
  margin-bottom: 0 !important;
}

/* Categories Box */
.categories-box {
  background: white;
  border-radius: var(--border-radius);
  box-shadow: var(--box-shadow);
  transition: var(--transition);
}

.categories-box h3 {
  font-weight: 600;
  font-size: 1.5rem;
  border-bottom: 1px solid rgba(0,0,0,0.1);
  padding-bottom: 0.75rem;
  color: var(--primary-color);
}

.categories-box a {
  transition: var(--transition);
  padding: 0.75rem;
  border-radius: var(--border-radius);
  font-weight: 500;
}

.categories-box a:hover {
  background: rgba(0,0,0,0.05);
  transform: translateX(5px);
  color: var(--secondary-color) !important;
}

.categories-box i {
  color: var(--secondary-color);
  font-size: 1.1rem;
  transition: var(--transition);
}

.categories-box a:hover i {
  transform: scale(1.1);
}

/* Event Content Section */
.summit-section {
  background-color: white;
  padding: 4rem 0 5rem;
}

.summit-section h3 {
  color: var(--primary-color);
  font-size: 1.8rem;
  position: relative;
  padding-bottom: 0.75rem;
}

.summit-section h3:after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  width: 60px;
  height: 3px;
  background-color: var(--secondary-color);
}

.summit-content {
  font-size: 1.05rem;
  line-height: 1.8;
  color: #444;
}

/* Gallery */
.summit-image h4 {
  color: var(--primary-color);
  font-weight: 600;
  margin-top: 2.5rem;
  font-size: 1.5rem;
  padding-left: 20px
}

.gallery-filter {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
  padding: 1rem 1.25rem;
  background: var(--light-bg);
  border-radius: var(--border-radius);
  box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.gallery-stats {
  font-size: 0.95rem;
  color: var(--text-color);
}

.gallery-stats strong {
  color: var(--secondary-color);
  font-size: 1.1rem;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
  gap: 1.25rem;
  margin-top: 1.5rem;
}

.gallery-item {
  position: relative;
  border-radius: var(--border-radius);
  overflow: hidden;
  box-shadow: var(--box-shadow);
  height: 200px;
  transition: var(--transition);
}

.gallery-item img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: var(--transition);
}

.gallery-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.12);
}

.gallery-item:hover img {
  transform: scale(1.05);
}

.gallery-item-caption {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(transparent, rgba(0,0,0,0.75));
  padding: 1rem;
  color: white;
  transform: translateY(100%);
  transition: var(--transition);
}

.gallery-item:hover .gallery-item-caption {
  transform: translateY(0);
}

.gallery-item-title {
  font-weight: 600;
  font-size: 0.9rem;
  margin-bottom: 0.25rem;
}

.gallery-item-description {
  font-size: 0.8rem;
  opacity: 0.9;
}

.no-images {
  text-align: center;
  padding: 3rem;
  background: var(--light-bg);
  border-radius: var(--border-radius);
  color: var(--secondary-color);
  box-shadow: var(--box-shadow);
}

.no-images i {
  color: var(--secondary-color);
  opacity: 0.7;
}

/* Recent Posts */
.recent-posts {
  background: white;
  border-radius: var(--border-radius);
  box-shadow: var(--box-shadow);
}

.recent-posts h3 {
  color: var(--primary-color);
  font-weight: 600;
  border-bottom: 1px solid rgba(0,0,0,0.1);
  padding-bottom: 0.75rem;
  margin-bottom: 1.5rem;
}

.recent-posts h3 i {
  color: var(--secondary-color);
}

.post-item {
  transition: var(--transition);
  padding: 0.5rem;
  border-radius: var(--border-radius);
}

.post-item:hover {
  background-color: var(--light-bg);
  transform: translateY(-3px);
}

.post-item img {
  object-fit: cover;
  border-radius: 6px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.1);
  transition: var(--transition);
}

.post-item:hover img {
  transform: scale(1.05);
}

.post-content p {
  font-weight: 600;
  color: var(--text-color);
  line-height: 1.3;
  transition: var(--transition);
}

.post-content a:hover p {
  color: var(--secondary-color);
}

.post-meta {
  font-size: 0.85rem;
  color: var(--secondary-color);
}

.post-meta i {
  color: var(--secondary-color);
}

/* Responsive Adjustments */
@media (max-width: 1199px) {
  .events-details-hero {
    height: 55vh;
  }
  
  .details-section .container {
    margin-top: -60px;
  }
}

@media (max-width: 991px) {
  .events-details-hero {
    height: 45vh;
  }
  
  .details-section .container {
    margin-top: 0;
  }
  
  .gallery-grid {
    grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
  }
  
  .details-image {
    margin-bottom: 2rem;
  }
}

@media (max-width: 767px) {
  .events-details-hero {
    height: 35vh;
  }
  
  .events-details-hero h1 {
    font-size: 2.5rem;
  }
  
  .details-section {
    padding: 3rem 0;
  }
  
  .gallery-grid {
    grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
  }
  
  .gallery-item {
    height: 150px;
  }
}

@media (max-width: 575px) {
  .events-details-hero {
    height: 30vh;
  }
  
  .events-details-hero h1 {
    font-size: 2rem;
  }
  
  .details-section {
    padding: 2rem 0;
  }
  
  .gallery-grid {
    grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
    gap: 1rem;
  }
  
  .gallery-item {
    height: 130px;
  }
}

/* Animation for page load */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.details-section, 
.summit-section {
  animation: fadeIn 0.6s ease-out forwards;
}

.details-image {
  animation: fadeIn 0.8s ease-out forwards;
}
</style>
@endsection
@section('content')

    <!-- Hero Section -->
    <section class="events-details-hero"
        style="background-image: url('{{ $event->image ? Storage::url($event->image) : asset('assets/images/event-hero-default.jpg') }}')">
        <div class="hero-overlay"></div>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="display-3 fw-bold text-white">{{ $event->title }}</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Details Section -->
    <section class="details-section py-6">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <!-- Left Column - Image -->
                <div class="col-lg-8">
                    <div class="details-image h-100">
                        <img src="{{ $event->image ? Storage::url($event->image) : asset('assets/images/event-default.png') }}"
                            alt="{{ $event->title }}" class="img-fluid rounded-3 h-100 w-100 object-fit-cover" />
                    </div>
                </div>

                <!-- Right Column - Event Details -->
                <div class="col-lg-4">
                    <div class="h-100 d-flex flex-column">
                        <!-- Event Details Box -->
                        <div class="event-details-box text-white p-4 rounded-3 mb-4">
                            <h3 class="mb-4">Event Details</h3>
                            <ul class="list-unstyled">
                                <li class="mb-3 d-flex">
                                    <i class="fas fa-calendar-alt me-3 mt-1"></i>
                                    <div>
                                        <strong>Date:</strong>
                                        <p class="mb-0">{{ $event->start_date->format('F j, Y') }}
                                            @if ($event->end_date)
                                                - {{ $event->end_date->format('F j, Y') }}
                                            @endif
                                        </p>
                                    </div>
                                </li>
                                @if ($event->location)
                                    <li class="mb-3 d-flex">
                                        <i class="fas fa-map-marker-alt me-3 mt-1"></i>
                                        <div>
                                            <strong>Location:</strong>
                                            <p class="mb-0">{{ $event->location }}</p>
                                        </div>
                                    </li>
                                @endif
                                @if ($event->galleryImages->count() > 0)
                                    <li class="mb-3 d-flex">
                                        <i class="fas fa-images me-3 mt-1"></i>
                                        <div>
                                            <strong>Gallery:</strong>
                                            <p class="mb-0">{{ $event->galleryImages->count() }} photos</p>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        <!-- Categories Box -->
                        <div class="categories-box text-white p-4 rounded-3 flex-grow-1">
                            <h3 class="mb-4 text-dark">Quick Links</h3>
                            <ul class="list-unstyled">
                                <li class="mb-3">
                                    <a href="{{ route('frontend.stories') }}"
                                        class="text-dark text-decoration-none d-flex align-items-center">
                                        <i class="fas fa-book me-3"></i>
                                        <span>Stories</span>
                                    </a>
                                </li>
                                <li class="mb-3">
                                    <a href="{{ route('frontend.events') }}"
                                        class="text-dark text-decoration-none d-flex align-items-center">
                                        <i class="fas fa-calendar-alt me-3"></i>
                                        <span>Events</span>
                                    </a>
                                </li>
                                <li class="mb-3">
                                    <a href="{{ route('frontend.blogs') }}"
                                        class="text-dark text-decoration-none d-flex align-items-center">
                                        <i class="fas fa-users me-3"></i>
                                        <span>Blogs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Event Content Section -->
    <section class="summit-section py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Left Column - Event Content -->
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-4">{{ $event->title }}</h3>
                    <div class="summit-content mb-4">
                        {!! $event->description !!}
                    </div>

                    @if ($event->galleryImages->count() > 0)
                        <div class="summit-image">
                            <h4 class="mb-3">Event Gallery</h4>
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
                                @foreach ($event->galleryImages->sortBy('display_order') as $image)
                                    <div class="gallery-item">
                                        <a href="{{ asset('storage/' . $image->image_path) }}"
                                            data-lightbox="event-gallery" data-title="{{ $image->title ?? '' }}"
                                            data-alt="{{ $image->title ?? 'Gallery Image' }}">
                                            <img src="{{ asset('storage/' . $image->image_path) }}"
                                                alt="{{ $image->title ?? 'Gallery Image' }}">
                                            @if ($image->title || $image->description)
                                                <div class="gallery-item-caption">
                                                    @if ($image->title)
                                                        <div class="gallery-item-title">{{ $image->title }}</div>
                                                    @endif
                                                    @if ($image->description)
                                                        <div class="gallery-item-description">{{ $image->description }}
                                                        </div>
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
            </div>
        </div>

        <!-- Right Column - Recent Events -->
        <div class="col-lg-4 mt-3">
            <div class="recent-posts text-dark p-4 rounded-3 h-100">
                <h3 class="mb-4">
                    <i class="fas fa-calendar me-2"></i>Recent Events
                </h3>

                @foreach ($recentEvents as $recentEvent)
                    <div class="post-item d-flex mb-4 pb-3 border-bottom">
                        <img src="{{ $recentEvent->image ? Storage::url($recentEvent->image) : asset('assets/images/event-default-thumb.png') }}"
                            alt="{{ $recentEvent->title }}" class="flex-shrink-0 me-3 rounded-2" width="80"
                            height="80" />
                        <div class="post-content">
                            <a href="{{ route('frontend.event.show', $recentEvent->id) }}" class="text-decoration-none">
                                <p class="mb-2 strong">{{ $recentEvent->title }}</p>
                            </a>
                            <div class="post-meta d-flex align-items-center">
                                <i class="far fa-calendar-alt me-2"></i>
                                <small class="text-dark">{{ $recentEvent->start_date->format('F j, Y') }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
        </div>
    </section>

@endsection
