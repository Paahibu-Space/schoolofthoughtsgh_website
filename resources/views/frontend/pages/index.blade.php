@extends('frontend.layout')
@section('content')


    <!-- {{-- Hero Section------ --}} -->

    <section class="hero-slider">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="{{ asset('assets/images/hero1.png') }}" class="d-block w-100" alt="Nature" />
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 text-start">
                                    <h1 class="animate__animated animate__fadeInDown">
                                        School of Thoughts Ghana
                                    </h1>
                                    <p class="animate__animated animate__fadeInUp animate__delay-1s">
                                        We Think To Change! We Are Change!
                                    </p>
                                    <div class="btn-group animate__animated animate__fadeInUp animate__delay-2s">
                                        <a href="{{ route('frontend.about') }}" class="btn btn-primary me-3">
                                            Get Involved <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-light">
                                            Donate Now <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/hero2.jpg') }}" class="d-block w-100" alt="Community" />
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 text-start">
                                    <h1 class="animate__animated animate__fadeInDown">
                                        Build a Better Future
                                    </h1>
                                    <p class="animate__animated animate__fadeInUp animate__delay-1s">
                                        Our programs empower individuals and create lasting impact
                                        in underserved communities.
                                    </p>
                                    <div class="btn-group animate__animated animate__fadeInUp animate__delay-2s">
                                        <a href="#" class="btn btn-primary me-3">
                                            Get Involved <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-light">
                                            Donate Now <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="{{ asset('assets/images/hero3.webp') }}" class="d-block w-100" alt="Hope" />
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 text-start">
                                    <h1 class="animate__animated animate__fadeInDown">
                                        Be Part of the Change
                                    </h1>
                                    <p class="animate__animated animate__fadeInUp animate__delay-1s">
                                        Together we can make a difference. Your support helps us
                                        reach more people in need.
                                    </p>
                                    <div class="btn-group animate__animated animate__fadeInUp animate__delay-2s">
                                        <a href="#" class="btn btn-primary me-3">
                                            Get Involved <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-light">
                                            Donate Now <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- {{-- About Section----------- --}} -->
    <section class="about-section py-3">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text Content -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="display-5 fw-bold mb-4">About Us</h2>
                    <p class="lead mb-3">
                        School of Thoughts Ghana is an award-winning registered Non-profit
                        organization that is designed to bridge the educational gap
                        between the Northern and Southern parts of Ghana through Human
                        Capacity Development, Advocacy and Opportunity Creation. It
                        focuses on the tuition of activities such as Reading and Writing,
                        Debate and Public Speaking, Talent and Leadership Development, and
                        Information Technology.
                    </p>
                    <p class="mb-4">
                        Under its Advocacy strand, it pushes for the implementation of
                        policies that would improve the education conditions and
                        opportunities in
                    </p>
                    <a href="#" class="btn learn-btn">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>

                <!-- Image Stack -->
                <div class="col-lg-6">
                    <div class="image-stack">
                        <img src="{{ asset('assets/images/about-down.png') }}" alt="Team working"
                            class="img-stack-bottom" />
                        <img src="{{ asset('assets/images/about-top.png') }}" alt="Community event" class="img-stack-top" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- EVENTS SECTION --}}
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
                                        <p>{{ $event->excerpt ?? Str::limit($event->description, 150) }}</p>
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
                    <p class="lead">No upcoming events scheduled. Please check back later!</p>
                </div>
            @endif
        </div>
    </section>

    {{-- PAST EVENTS SECTION --}}
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
                    <p class="lead">No past events. Check back later!</p>
                </div>
            @endif
        </div>
    </section>

    <section class="blogs-section py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Latest Blogs</h2>
                </div>
            </div>

            @if ($featuredBlogs->count() > 0)
                <div class="row g-4">
                    @foreach ($featuredBlogs as $blog)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="blog-card h-100">
                                <div class="blog-img">
                                    <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="img-fluid">
                                </div>
                                <div class="blog-content p-4">
                                    <h3>{{ $blog->title }}</h3>
                                    <p class="mb-3">{!! iFrameFilterInSummernoteAndRender(Str::limit($blog->content, 100)) !!}</p>
                                    <a href="{{ route('frontend.blog.show', $blog->slug) }}" class="btn learn-btn">
                                        Read More <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-5">
                    <a href="{{ route('frontend.blogs') }}" class="btn learn-btn">
                        View All Blog Posts
                    </a>
                </div>
            @else
                <div class="text-center py-4">
                    <p class="lead">No blog posts available yet. Check back soon!</p>
                </div>
            @endif
        </div>
    </section>

    

    @include('frontend.pages.gallery.featured')
@endsection
