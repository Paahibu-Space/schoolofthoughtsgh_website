@extends('frontend.layout')
@section('styles')
    <style>
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.7));
        }

        .events-details-hero h1 {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            letter-spacing: 0.5px;
            font-weight: 700;
        }
    </style>
@endsection
@section('content')
    <!-- Hero Section -->
    <section class="events-hero">
        <div class="hero-overlay"></div>
        <div class="container z-1">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-3">Explore Our Events</h1>
                    <p class=" mb-4 text-white">Discover workshops, seminars, and gatherings that inspire growth</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Intro Section -->
    <section class="about-intro mx-4 py-3 mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center">
                    <h2 class="mb-2">About Our Events</h2>
                    <p>
                        The School of Thoughts hosts events to provide a dynamic platform
                        for intellectual engagement, critical discourse, and collaborative
                        learning. These gatherings are designed to foster creativity,
                        innovation, and the exchange of diverse perspectives. By bringing
                        together thought leaders, students, and community members, the
                        events aim to inspire meaningful conversations that drive personal
                        and societal growth. Ultimately, the School of Thoughts seeks to
                        empower individuals to think critically, challenge conventional
                        norms, and take actionable steps toward positive change.
                    </p>
                </div>
            </div>
        </div>
    </section>



    <!-- {{-- Explore Events Section----- --}} -->
    <section class="events-section py-3">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Explore Our Upcoming Events</h2>
                </div>
            </div>

            @if ($upcomingEvents->count() > 0)
                <div class="swiper events-slider">
                    <div class="swiper-wrapper">
                        @foreach ($upcomingEvents as $event)
                            <div class="swiper-slide">
                                <div class="event-card card-{{ $loop->iteration }}">
                                    <div class="event-img">
                                        <img src="{{ $event->image ? Storage::url($event->image) : asset('assets/images/event-default.png') }}"
                                            alt="{{ $event->title }}" class="img-fluid" />
                                    </div>
                                    <div class="event-content">
                                        <h3>{{ $event->title }}</h3>
                                        <p>{!! $event->excerpt ?? Str::limit($event->description, 150) !!}</p>
                                        <a href="{{ route('frontend.event.show', $event->id) }}" class="btn learn-btn">
                                            Learn More <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            @else
                <div class="text-center py-4">
                    <p>No upcoming events scheduled. Please check back later!</p>
                </div>
            @endif
        </div>
    </section>

    <section class="events-section py-3">
        <div class="container">
            <div class="row justify-content-center mb-3">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Explore Our Past Events</h2>
                </div>
            </div>

            @if ($pastEvents->count() > 0)
                <div class="swiper events-slider">
                    <div class="swiper-wrapper">
                        @foreach ($pastEvents as $event)
                            <div class="swiper-slide">
                                <div class="event-card card-{{ $loop->iteration }}">
                                    <div class="event-img">
                                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}"
                                            class="img-fluid" />
                                    </div>
                                    <div class="event-content">
                                        <h3>{{ $event->title }}</h3>
                                        <p>{!! iFrameFilterInSummernoteAndRender($event->excerpt ?? Str::limit($event->description, 150)) !!}</p>
                                        <a href="{{ route('frontend.event.show', $event->id) }}" class="btn learn-btn">
                                            Learn More <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            @else
                <div class="text-center py-4">
                    <p>No past events. Check back later!</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Speakers Section------- -->
    <section class="speakers-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold">Featured Speakers</h2>
                    <p>Meet our industry-leading experts</p>
                </div>
            </div>
    
            <div class="swiper speaker-swiper">
                <div class="swiper-wrapper">
                    @foreach ($events as $event)
                        @foreach ($event->speakers as $speaker)
                            <div class="swiper-slide">
                                <div class="speaker-card text-center">
                                    <div class="speaker-image mb-3">
                                        <img src="{{ asset('storage/' . $speaker->image) }}" alt="{{ $speaker->name }}"
                                             class="img-fluid">
                                    </div>
                                    <div class="speaker-info">
                                        <h5 class="mb-1">{{ $speaker->name }}</h5>
                                        <p class="text-muted mb-0">{{ $speaker->specialty }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
    
                <!-- Swiper controls -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination mt-3"></div>
            </div>
        </div>
    </section>
    

    <!-- gallery--- Section -->
    @include('frontend.pages.gallery.featured')
@endsection

@section('scripts')

<script>
    const swiper = new Swiper('.speaker-swiper', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 4,
            }
        }
    });
</script>
@endsection