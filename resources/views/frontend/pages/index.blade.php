@extends('frontend.layout')
@section('content')


    <!-- {{-- Hero Section------ --}} -->

    <section class="hero-slider">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
          <!-- Indicators -->
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#heroCarousel"
              data-bs-slide-to="0"
              class="active"
            ></button>
            <button
              type="button"
              data-bs-target="#heroCarousel"
              data-bs-slide-to="1"
            ></button>
            <button
              type="button"
              data-bs-target="#heroCarousel"
              data-bs-slide-to="2"
            ></button>
          </div>
  
          <!-- Slides -->
          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
              <img
                src="{{ asset('assets/images/hero1.png') }}"
                class="d-block w-100"
                alt="Nature"
              />
              <div class="carousel-caption d-flex align-items-center">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-6 text-start">
                      <h1 class="animate__animated animate__fadeInDown">
                        School of Thoughts
                      </h1>
                      <p
                        class="animate__animated animate__fadeInUp animate__delay-1s"
                      >
                        Transforming taught into ideas for Changes
                      </p>
                      <div
                        class="btn-group animate__animated animate__fadeInUp animate__delay-2s"
                      >
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
  
            <!-- Slide 2 -->
            <div class="carousel-item">
              <img
                src="{{ asset('assets/images/hero2.jpg') }}"
                class="d-block w-100"
                alt="Community"
              />
              <div class="carousel-caption d-flex align-items-center">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-6 text-start">
                      <h1 class="animate__animated animate__fadeInDown">
                        Build a Better Future
                      </h1>
                      <p
                        class="animate__animated animate__fadeInUp animate__delay-1s"
                      >
                        Our programs empower individuals and create lasting impact
                        in underserved communities.
                      </p>
                      <div
                        class="btn-group animate__animated animate__fadeInUp animate__delay-2s"
                      >
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
              <img
                src="{{ asset('assets/images/hero3.jpg') }}"
                class="d-block w-100"
                alt="Hope"
              />
              <div class="carousel-caption d-flex align-items-center">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-6 text-start">
                      <h1 class="animate__animated animate__fadeInDown">
                        Be Part of the Change
                      </h1>
                      <p
                        class="animate__animated animate__fadeInUp animate__delay-1s"
                      >
                        Together we can make a difference. Your support helps us
                        reach more people in need.
                      </p>
                      <div
                        class="btn-group animate__animated animate__fadeInUp animate__delay-2s"
                      >
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
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#heroCarousel"
            data-bs-slide="next"
          >
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
                <img
                  src="{{ asset('assets/images/about-down.png') }}"
                  alt="Team working"
                  class="img-stack-bottom"
                />
                <img
                  src="{{ asset('assets/images/about-top.png') }}"
                  alt="Community event"
                  class="img-stack-top"
                />
              </div>
            </div>
          </div>
        </div>
      </section>
  
      <!-- {{-- Our Team Section---- --}} -->
      <section class="team-section mt-3">
        <!-- Centered Title -->
        <div class="container text-center my-3">
          <h2 class="display-4 fw-bold">Our Team</h2>
        </div>
  
        <div class="container-fluid">
          <div class="row align-items-center">
            <!-- Left Column - Content -->
            <div class="col-lg-6 content-col">
              <div class="px-4 px-lg-5">
                <h3 class="mb-4">Abraham Agoni</h3>
                <p class="mb-4">
                  “Education is the foundation of greatness. At school of taught
                  Ghana we empower minds to shape the feature”
                </p>
                <p class="mb-4"><strong>Founder</strong></p>
                <a href="#" class="btn second-btn mb-3">
                  Meet Our Team <i class="fas fa-arrow-right ms-2"></i>
                </a>
              </div>
            </div>
  
            <!-- Right Column - Parallax Image -->
            <div class="col-lg-6 parallax-col p-0">
              <div class="parallax-image"></div>
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
              <a href="#" class="btn btn-outline-primary">
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