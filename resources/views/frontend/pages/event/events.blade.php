@extends('frontend.layout')
@section('content')

    <!-- Hero Section -->
    <section class="events-hero">
      <div class="hero-overlay"></div>
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12 text-center">
            <!-- <h1 class="display-3 fw-bold text-white">About Our School</h1> -->
          </div>
        </div>
      </div>
    </section>

    <!-- Intro Section -->
    <section class="about-intro mx-4 py-3 mt-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h2 class="mb-2">About Our Events</h2>

            <p>
              The School of Thought hosts events to provide a dynamic platform
              for intellectual engagement, critical discourse, and collaborative
              learning. These gatherings are designed to foster creativity,
              innovation, and the exchange of diverse perspectives. By bringing
              together thought leaders, students, and community members, the
              events aim to inspire meaningful conversations that drive personal
              and societal growth. Ultimately, the School of Thought seeks to
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
            <h2 class="display-5 fw-bold mb-3">Explore Our Events</h2>
          </div>
        </div>

        <div class="swiper events-slider">
          <div class="swiper-wrapper">
            <!-- Event Card 1 -->
            <div class="swiper-slide">
              <div class="event-card card-1">
                <div class="event-img">
                  <img
                    src="{{ asset('assets/images/event1.png') }}"
                    alt="Workshop"
                    class="img-fluid"
                  />
                </div>
                <div class="event-content">
                  <h3>2019 – STARTRIGHT SUMMIT</h3>
                  <p>
                    The maiden educational summit that witnessed over 200
                    students, teachers and parents to discuss the roles of
                    stakeholders in achieving quality education in Ghana.
                  </p>
                  <a href="{{ route('frontend.startright') }}" class="btn learn-btn">
                    Learn More <i class="fas fa-arrow-right ms-2"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Event Card 2 -->
            <div class="swiper-slide">
              <div class="event-card card-2">
                <div class="event-img">
                  <img
                    src="{{ asset('assets/images/about-top.png') }}"
                    alt="Conference"
                    class="img-fluid"
                  />
                </div>
                <div class="event-content">
                  <h3>2020 – EDUTOUR:</h3>
                  <p>
                    To compliment the effort of the Ghana Educational Service in
                    reviving the need for education after Covid, the team toured
                    up to 16 schools, engaging over 800 students
                  </p>
                  <a href="{{ route('frontend.edutor') }}" class="btn learn-btn">
                    Learn More <i class="fas fa-arrow-right ms-2"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Event Card 3 -->
            <div class="swiper-slide">
              <div class="event-card card-3">
                <div class="event-img">
                  <img
                    src="{{ asset('assets/images/about-down.png') }}"
                    alt="Networking"
                    class="img-fluid"
                  />
                </div>
                <div class="event-content">
                  <h3>2021 – AFRIJAM</h3>
                  <p>
                    8 young females were sponsored to attend the Centenary
                    Anniversary camp of the Ghana Girl Guides Association. This
                    was an opportunity for the girls to be exposed
                  </p>
                  <a href="{{ route('frontend.afrijam') }}" class="btn learn-btn">
                    Learn More <i class="fas fa-arrow-right ms-2"></i>
                  </a>
                </div>
              </div>
            </div>

            <!-- Event Card 4 -->
            <div class="swiper-slide">
              <div class="event-card card-4">
                <div class="event-img">
                  <img
                    src="{{ asset('assets/images/dropdown5.png') }}"
                    alt="Seminar"
                    class="img-fluid"
                  />
                </div>
                <div class="event-content">
                  <h3>Industry Seminar</h3>
                  <p>Learn from leading experts in your field.</p>
                  <a href="{{ route('frontend.industry-seminar') }}" class="btn learn-btn">
                    Learn More <i class="fas fa-arrow-right ms-2"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-pagination"></div>
        </div>
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

    <div class="row g-4">
      <!-- Blog Card 1 -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="blog-card h-100">
          <div class="blog-img">
            <img src="{{ asset('assets/images/blog1.png') }}" alt="Workshop" class="img-fluid">
          </div>
          <div class="blog-content p-4">
            <h3>2019 – STARTRIGHT SUMMIT</h3>
            <p class="mb-3">
              The maiden educational summit that witnessed over 200
              students, teachers and parents to discuss the roles of
              stakeholders in achieving quality education in Ghana.
            </p>
            <a href="{{ route('frontend.startright') }}" class="btn btn-outline-primary">
              Read More <i class="fas fa-arrow-right ms-2"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Blog Card 2 -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="blog-card h-100">
          <div class="blog-img">
            <img src="{{ asset('assets/images/blog2.png') }}" alt="Conference" class="img-fluid">
          </div>
          <div class="blog-content p-4">
            <h3>2020 – EDUTOUR:</h3>
            <p class="mb-3">
              To compliment the effort of the Ghana Educational Service in
              reviving the need for education after Covid, the team toured
              up to 16 schools, engaging over 800 students.
            </p>
            <a href="#" class="btn btn-outline-primary">
              Read More <i class="fas fa-arrow-right ms-2"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Blog Card 3 -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="blog-card h-100">
          <div class="blog-img">
            <img src="{{ asset('assets/images/about-down.png') }}" alt="Networking" class="img-fluid">
          </div>
          <div class="blog-content p-4">
            <h3>2021 – AFRIJAM</h3>
            <p class="mb-3">
              8 young females were sponsored to attend the Centenary
              Anniversary camp of the Ghana Girl Guides Association. This
              was an opportunity for the girls to be exposed.
            </p>
            <a href="#" class="btn btn-outline-primary">
              Read More <i class="fas fa-arrow-right ms-2"></i>
            </a>
          </div>
        </div>
      </div>

      <!-- Blog Card 4 -->
      <div class="col-12 col-md-6 col-lg-3">
        <div class="blog-card h-100">
          <div class="blog-img">
            <img src="{{ asset('assets/images/event1.png') }}" alt="Seminar" class="img-fluid">
          </div>
          <div class="blog-content p-4">
            <h3>Industry Seminar</h3>
            <p class="mb-3">Learn from leading experts in your field.</p>
            <a href="#" class="btn btn-outline-primary">
              Read More <i class="fas fa-arrow-right ms-2"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


    <!-- Partners Section -->
    <section class="partners-section py-5">
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
              <img
                src="{{ asset('assets/images/part1.png') }}"
                alt="Partner 1"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="{{ asset('assets/images/part2.png') }}"
                alt="Partner 2"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="{{ asset('assets/images/part3.png') }}"
                alt="Partner 3"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="{{ asset('assets/images/part4.png') }}"
                alt="Partner 4"
                class="img-fluid"
              />
            </div>
          </div>

          <!-- Row 2 -->
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="{{ asset('assets/images/part5.png') }}"
                alt="Partner 5"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="{{ asset('assets/images/part6.png') }}"
                alt="Partner 6"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="{{ asset('assets/images/part7.png') }}"
                alt="Partner 7"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="{{ asset('assets/images/part8.png') }}"
                alt="Partner 8"
                class="img-fluid"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- gallery--- Section -->
    <section class="gallery-section py-5 bg-light">
      <div class="container">
        <div class="row justify-content-center mb-3">
          <div class="col-lg-8 text-center">
            <h2 class="display-5 fw-bold">Our Gallery</h2>
            <p>A glimpse of our capturing moment of Impact</p>
          </div>
        </div>

        <div class="gallery-slider-container">
          <div class="team-slider-track">
            <!-- Team Member 1 -->
            <div class="gallery-card">
              <img
                src="{{ asset('assets/images/gallery1.png') }}"
                alt="Team Member"
                class="img-fluid"
              />
            </div>

            <!-- Team Member 2 -->
            <div class="gallery-card">
              <img
                src="{{ asset('assets/images/team-image.png') }}"
                alt="Team Member"
                class="img-fluid"
              />
            </div>

            <!-- Team Member 3 -->
            <div class="gallery-card">
              <img
                src="{{ asset('assets/images/team.png') }}"
                alt="Team Member"
                class="img-fluid"
              />
            </div>

            <!-- Team Member 4 -->
            <div class="gallery-card">
              <img
                src="{{ asset('assets/images/gallery1.png') }}"
                alt="Team Member"
                class="img-fluid"
              />
            </div>

            <!-- Team Member 5 -->
            <div class="gallery-card">
              <img
                src="{{ asset('assets/images/team.png') }}"
                alt="Team Member"
                class="img-fluid"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection