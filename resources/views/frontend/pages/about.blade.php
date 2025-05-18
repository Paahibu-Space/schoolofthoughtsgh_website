@extends('frontend.layout')

@section('styles')
<style>
    /* Swiper Styles */
    .institutions-swiper {
        padding: 20px 0 40px;
        width: 100%;
    }
    
    .institution-logo {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 120px;
        padding: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        position: relative;
    }
    
    .institution-logo:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    }
    
    .institution-logo img {
        max-height: 80px;
        width: auto;
        max-width: 100%;
        object-fit: contain;
        /* filter: grayscale(100%);
        opacity: 0.7; */
        transition: all 0.3s ease;
    }
    
    .institution-logo:hover img {
        filter: grayscale(0);
        opacity: 1;
    }
    
    .institution-link {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
    }
    
    .swiper-button-next, 
    .swiper-button-prev {
        color: var(--bs-primary);
        background: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .swiper-button-next::after, 
    .swiper-button-prev::after {
        font-size: 1.2rem;
    }
    
    .swiper-pagination-bullet-active {
        background: var(--bs-primary);
    }
</style>
@endsection
@section('content')

    <!-- Hero Section -->
    <section class="about-hero"
        style="background-image: url('{{ $aboutData['breadcrumb_image'] ? asset('storage/' . $aboutData['breadcrumb_image']) : asset('images/default-breadcrumb.jpg') }}');">
        <div class="hero-overlay"></div>
        <div class="container h-100 z-1">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="display-3 fw-bold text-white">{{ $aboutData['title'] }}</h1>
                    {{-- <ul class="breadcrumb">
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="active">{{ $aboutData['title'] }}</li>
                    </ul> --}}
                </div>
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="about-intro mx-4 py-3 mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center about-content">
                    {{-- <h2 class="mb-2">About Us</h2> --}}

                    {!! $aboutData['general'] !!}

                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <h3 class="mb-4 text-start text-dark">Our Mission</h3>
                <div class="col-lg-8 mission-content">
                    {!! $aboutData['mission']['content'] !!}

                </div>
                <div class="col-lg-4 mission-image">
                    <img src="{{ asset('storage/' . $aboutData['mission']['image']) }}" alt="Students learning"
                        class="img-fluid rounded-circle" />
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="vision-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <h3 class="mb-4 text-end text-dark">Our Vision</h3>
                <div class="col-lg-4 vision-image order-lg-1 order-2">
                    <img src="{{ asset('storage/' . $aboutData['vision']['image']) }}" alt="Graduation ceremony"
                        class="img-fluid rounded-circle" />
                </div>
                <div class="col-lg-8 vision-content order-lg-2 order-1">
                    {!! $aboutData['vision']['content'] !!}


                </div>
            </div>
        </div>
    </section>
<!-- Impact Section -->
<section class="impact-section py-5 text-white">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="mb-4">Our Impact</h2>
                <p>The difference we're making together</p>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($impactItems as $item)
                <div class="col-md-6 col-lg-3">
                    <div class="impact-card text-center p-4 h-100">
                        <i class="{{ $item->icon }} fa-3x mb-4"></i>
                        <p class="fw-bold fs-5 mb-1">
                            <span class="counter" data-target="{{ $item->count }}">0</span>+
                        </p>
                        <p class="fw-bold fs-5">{{ $item->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


    <!-- Team Section -->
    <section class="team-section py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Meet Our Team</h2>
                    <p class=" text-muted">The talented individuals who make it all happen</p>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach ($teamMembers as $member)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="team-card">
                            <div class="team-card-inner">
                                <!-- Front Side -->
                                <div class="team-card-front">
                                    <div class="team-img-wrapper">
                                        <img src="{{ $member->photo ? Storage::url($member->photo) : asset('assets/images/team-default.jpg') }}"
                                            alt="{{ $member->name }}" class="img-fluid">
                                        @if (count($member->getActiveSocialLinks()) > 0)
                                            <div class="social-links">
                                                @foreach ($member->getActiveSocialLinks() as $platform => $url)
                                                    <a href="{{ $url }}" target="_blank" class="social-link">
                                                        <i class="fab fa-{{ $platform }}"></i>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="team-card-body">
                                        <h5 class="mb-1">{{ $member->name }}</h5>
                                        <p class="text-muted mb-2">{{ $member->role }}</p>
                                        <button class="btn btn-sm learn-btn view-details"
                                            data-member-id="{{ $member->id }}">
                                            View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team Member Modal -->
    <div class="modal fade" id="teamMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="row g-0">
                        <!-- Left Column - Image -->
                        <div class="col-md-5">
                            <div class="modal-img-wrapper h-100">
                                <img id="modalMemberImage" src="" alt=""
                                    class="img-fluid h-100 w-100 object-fit-cover">
                            </div>
                        </div>

                        <!-- Right Column - Content -->
                        <div class="col-md-7">
                            <div class="p-4 p-lg-5">
                                <h3 id="modalMemberName" class="mb-2"></h3>
                                <p id="modalMemberRole" class="text-primary mb-4"></p>

                                <div id="modalMemberDescription" class="mb-4"></div>

                                <div class="member-social-links mb-4">
                                    <!-- Social links will be inserted here by JavaScript -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Blogs section --}}
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
                                    <a href="#" class="btn learn-btn">
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
                    <p >No blog posts available yet. Check back soon!</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Partners Section -->
    <section class="partners-section py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-4 fw-bold text-dark mb-3">Our Partners</h2>
                    <p >
                        Collaborating with leading organizations to enhance education
                    </p>
                </div>
            </div>

            @if ($partners->count() > 0)
                <div class="row g-4 justify-content-center align-items-center">
                    @foreach ($partners as $partner)
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="partner-logo">
                                <img src="{{ $partner->image_url }}" alt="{{ $partner->name }}" class="img-fluid"
                                    title="{{ $partner->name }}" loading="lazy" />
                                @if ($partner->website_url)
                                    <a href="{{ $partner->website_url }}" target="_blank" rel="noopener noreferrer"
                                        class="partner-link"></a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-4">
                    <div class="alert alert-info">
                        <i class="fas fa-handshake me-2"></i> Our partner network is growing. Check back soon!
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Institutions Reached Section with Swiper Slider -->
<section class="institutions-section py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="display-4 fw-bold text-dark mb-3">Institutions Worked With</h2>
                <p>
                    Connecting with educational institutions to empower learning
                </p>
            </div>
        </div>

        @if ($institutions->count() > 0)
            <!-- Swiper Container -->
            <div class="swiper institutions-swiper">
                <div class="swiper-wrapper">
                    @foreach ($institutions as $institution)
                        <div class="swiper-slide">
                            <div class="institution-logo">
                                <img src="{{ $institution->image_url }}" alt="{{ $institution->name }}" 
                                     class="img-fluid" title="{{ $institution->name }}" loading="lazy" />
                                @if ($institution->website)
                                    <a href="{{ $institution->website }}" target="_blank" rel="noopener noreferrer"
                                       class="institution-link"></a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
                
                <!-- Add Navigation -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        @else
            <div class="text-center py-4">
                <div class="alert alert-info">
                    <i class="fas fa-university me-2"></i> We're expanding our network of institutions. Stay tuned!
                </div>
            </div>
        @endif
    </div>
</section>



    <section class="py-5 event-highlighted-story">
        <div class="container">
                <div class="row align-items-center">
                    <div class="text-section col-lg-6">
                        <h1>The NGO in Northern Ghana Helping to Achieve SDG 4- Quality Education</h1>
                    </div>
    
                    <div class="video-section col-lg-6">
                        <iframe width="650" height="400" src="https://www.youtube.com/embed/rZqbS-kJj5o?si=Bagpxa3L47F0C4Su" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>                    </div>
        </div>
    </section>
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Team member modal functionality
            const viewButtons = document.querySelectorAll('.view-details');
            const modal = new bootstrap.Modal(document.getElementById('teamMemberModal'));

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const memberId = this.getAttribute('data-member-id');
                    fetchMemberDetails(memberId);
                });
            });

            function fetchMemberDetails(memberId) {
                // In a real application, you would fetch this data via AJAX
                // For this example, we'll use data attributes from the card

                const card = document.querySelector(`[data-member-id="${memberId}"]`).closest('.team-card');
                const name = card.querySelector('h5').textContent;
                const role = card.querySelector('.text-muted').textContent;
                const imgSrc = card.querySelector('img').src;

                // Set modal content
                document.getElementById('modalMemberName').textContent = name;
                document.getElementById('modalMemberRole').textContent = role;
                document.getElementById('modalMemberImage').src = imgSrc;
                document.getElementById('modalMemberImage').alt = name;

                // For demo purposes - in real app you'd get description from AJAX
                document.getElementById('modalMemberDescription').innerHTML =
                    `<p>This would be the detailed description of ${name}, showing their background, experience, and role in the organization. In a real application, this would be pulled from the database.</p>`;

                // Add social links
                const socialLinksContainer = document.querySelector('.member-social-links');
                socialLinksContainer.innerHTML = '';

                // Get social links from the card (in real app, get from AJAX)
                const socialLinks = card.querySelectorAll('.social-link');
                if (socialLinks.length > 0) {
                    socialLinksContainer.innerHTML = '<h6 class="mb-3">Connect:</h6>';
                    socialLinks.forEach(link => {
                        const clone = link.cloneNode(true);
                        clone.classList.remove('social-link');
                        clone.classList.add('btn', 'btn-outline-secondary', 'me-2');
                        socialLinksContainer.appendChild(clone);
                    });
                }

                // Show the modal
                modal.show();
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
    const counters = document.querySelectorAll('.counter');
    const duration = 4000; // Total animation duration in ms
    const animateWhenVisible = true;

    function animateCounter(counter) {
        const target = +counter.getAttribute('data-target');
        let count = 0;
        const incrementTime = 20; // ms
        const steps = duration / incrementTime;
        const increment = target / steps;

        const timer = setInterval(() => {
            count += increment;
            if (count < target) {
                counter.innerText = Math.ceil(count).toLocaleString();
            } else {
                counter.innerText = target.toLocaleString();
                clearInterval(timer);
            }
        }, incrementTime);
    }

    if (animateWhenVisible) {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.querySelectorAll('.counter').forEach(counter => {
                        animateCounter(counter);
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        document.querySelectorAll('.impact-section').forEach(section => {
            observer.observe(section);
        });
    } else {
        counters.forEach(counter => animateCounter(counter));
    }
});

    </script>
@endsection
@endsection
