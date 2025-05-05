@extends('frontend.layout')
@section('styles')
<style>



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
</style>
  
@endsection
@section('content')
    <!-- Hero Section -->
    <section class="events-hero">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center">
                    <h1 class="display-4 fw-bold mb-3">Explore Our Events</h1>
                    <p class="lead mb-4 text-white">Discover workshops, seminars, and gatherings that inspire growth</p>
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
                      <p class="lead">No upcoming events scheduled. Please check back later!</p>
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
                    <p class="lead">No past events. Check back later!</p>
                </div>
            @endif
        </div>
    </section>

        <!-- Speakers Section------- -->
        <section class="speakers-section py-5">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <h2 class="display-5 fw-bold">Featured Speakers</h2>
                        <p class="lead">Meet our industry-leading experts</p>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Speaker 1 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="speaker-card">
                            <div class="speaker-image">
                                <img src="{{ asset('assets/images/speaker1.png') }}" alt="Speaker 1" class="img-fluid">
                            </div>
                            <div class="speaker-info">
                                <h4>Abraham Agoni</h4>
                                <p>Education Technology</p>
                            </div>
                        </div>
                    </div>

                    <!-- Speaker 2 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="speaker-card">
                            <div class="speaker-image">
                                <img src="{{ asset('assets/images/speaker2.png') }}" alt="Speaker 2" class="img-fluid">
                            </div>
                            <div class="speaker-info">
                                <h4>Michael Chen</h4>
                                <p>Curriculum Development</p>
                            </div>
                        </div>
                    </div>

                    <!-- Speaker 3 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="speaker-card">
                            <div class="speaker-image">
                                <img src="{{ asset('assets/images/speaker3.png') }}" alt="Speaker 3" class="img-fluid">
                            </div>
                            <div class="speaker-info">
                                <h4>Abraham Agoni</h4>
                                <p>Science Education</p>
                            </div>
                        </div>
                    </div>

                    <!-- Speaker 4 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="speaker-card">
                            <div class="speaker-image">
                                <img src="{{ asset('assets/images/speaker4.png') }}" alt="Speaker 4" class="img-fluid">
                            </div>
                            <div class="speaker-info">
                                <h4>David Wilson</h4>
                                <p>Arts Integration</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blogs Section -->
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
                      <a href="#" class="btn learn-btn">
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


        <!-- Partners Section -->
        {{-- <section class="partners-section py-5">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-dark mb-3">Our Partners</h2>
                        <p class="lead">
                            Collaborating with leading organizations to enhance education
                        </p>
                    </div>
                </div>

                <div class="row g-4 justify-content-center align-items-center">
                    <!-- Row 1 -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="partner-logo">
                            <img src="{{ asset('assets/images/part1.png') }}" alt="Partner 1" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="partner-logo">
                            <img src="{{ asset('assets/images/part2.png') }}" alt="Partner 2" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="partner-logo">
                            <img src="{{ asset('assets/images/part3.png') }}" alt="Partner 3" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="partner-logo">
                            <img src="{{ asset('assets/images/part4.png') }}" alt="Partner 4" class="img-fluid" />
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="partner-logo">
                            <img src="{{ asset('assets/images/part5.png') }}" alt="Partner 5" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="partner-logo">
                            <img src="{{ asset('assets/images/part6.png') }}" alt="Partner 6" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="partner-logo">
                            <img src="{{ asset('assets/images/part7.png') }}" alt="Partner 7" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="partner-logo">
                            <img src="{{ asset('assets/images/part8.png') }}" alt="Partner 8" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- gallery--- Section -->
        @include('frontend.pages.gallery.featured')
    @endsection
