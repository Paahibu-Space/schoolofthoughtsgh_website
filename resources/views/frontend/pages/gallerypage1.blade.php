@extends('frontend.layout')

@section('content')
    <!-- Hero Section -->
    <section class="gallery-page">
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
            <h2 class="mb-2">Our Amazing Gallery</h2>

            <p>Explore our amazing gallery and enjoy every moment</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Images section one-- -->
    <section class="gallery-section py-5">
      <div class="container">
        <!-- Gallery Title -->
        <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
            <h3 class="text-start fw-bold mb-3">
              2019 – STARTRIGHT SUMMIT 2019
            </h3>
          </div>
        </div>

        <!-- Gallery Images -->
        <div class="row g-4">
          <!-- Image 1 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image1.png') }}"
                alt="Gallery Image 1"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Annual Conference</h5>
                  <p>June 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 2 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image2.png') }}"
                alt="Gallery Image 2"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Workshop Session</h5>
                  <p>May 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 3 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image3.png') }}"
                alt="Gallery Image 3"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Student Presentation</h5>
                  <p>April 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 4 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image4.png') }}"
                alt="Gallery Image 4"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Award Ceremony</h5>
                  <p>March 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 5 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image5.png') }}"
                alt="Gallery Image 5"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Panel Discussion</h5>
                  <p>February 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 6 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/speaker4.png') }}"
                alt="Gallery Image 6"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Networking Event</h5>
                  <p>January 2023</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Images section two-- -->
    <section class="gallery-section py-5">
      <div class="container">
        <!-- Gallery Title -->
        <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
            <h3 class="text-start fw-bold mb-3">
              2019 – STARTRIGHT SUMMIT 2019
            </h3>
          </div>
        </div>

        <!-- Gallery Images -->
        <div class="row g-4">
          <!-- Image 1 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image6.png') }}"
                alt="Gallery Image 1"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Annual Conference</h5>
                  <p>June 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 2 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image7.png') }}"
                alt="Gallery Image 2"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Workshop Session</h5>
                  <p>May 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 3 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image8.png') }}"
                alt="Gallery Image 3"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Student Presentation</h5>
                  <p>April 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 4 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image9.png') }}"
                alt="Gallery Image 4"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Award Ceremony</h5>
                  <p>March 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 5 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image10.png') }}"
                alt="Gallery Image 5"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Panel Discussion</h5>
                  <p>February 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 6 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/speaker4.png') }}"
                alt="Gallery Image 6"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Networking Event</h5>
                  <p>January 2023</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Images section three-- -->
    <section class="gallery-section py-5">
      <div class="container">
        <!-- Gallery Title -->
        <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
            <h3 class="text-start fw-bold mb-3">
              2019 – STARTRIGHT SUMMIT 2019
            </h3>
          </div>
        </div>

        <!-- Gallery Images -->
        <div class="row g-4">
          <!-- Image 1 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image11.png') }}"
                alt="Gallery Image 1"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Annual Conference</h5>
                  <p>June 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 2 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image12.png') }}"
                alt="Gallery Image 2"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Workshop Session</h5>
                  <p>May 2023</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Image 3 -->
          <div class="col-12 col-md-6 col-lg-4">
            <div class="gallery-item">
              <img
                src="{{ asset('assets/images/image13.png') }}"
                alt="Gallery Image 3"
                class="img-fluid"
              />
              <div class="gallery-overlay">
                <div class="gallery-caption">
                  <h5>Student Presentation</h5>
                  <p>April 2023</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials Section---- -->
    <section class="testimonial-section py-3">
      <div class="parallax-bg"></div>
      <div class="testimonial-overlay"></div>
      <div class="container py-5">
        <div class="row justify-content-center mb-4">
          <div class="col-lg-8 text-center">
            <h2 class="display-5 fw-bold text-white">Our Testimonies</h2>
            
          </div>
        </div>

        <div class="row g-4 justify-content-center">
          <!-- Testimonial 1 -->
          <div class="col-md-6 col-lg-4">
            <div class="testimonial-card">
              <div class="testimonial-content">
                <div class="profile-img">
                  <img
                    src="{{ asset('assets/images/recent1.png') }}"
                    alt="Sarah Johnson"
                    class="img-fluid"
                  />
                </div>
                <div class="testimonial-text">
                  <p>
                    "The School of Thoughts transformed my perspective on
                    education. The innovative approach helped me develop
                    critical thinking skills I use daily in my career."
                  </p>
                  <h5>Sarah Johnson</h5>
                  <small>Alumni, Class of 2020</small>
                </div>
              </div>
            </div>
          </div>

          <!-- Testimonial 2 -->
          <div class="col-md-6 col-lg-4">
            <div class="testimonial-card">
              <div class="testimonial-content">
                <div class="profile-img">
                  <img
                    src="{{ asset('assets/images/team-image.png') }}"
                    alt="Michael Chen"
                    class="img-fluid"
                  />
                </div>
                <div class="testimonial-text">
                  <p>
                    "As a parent, I've seen remarkable growth in my child's
                    curiosity and problem-solving abilities since joining the
                    program. Highly recommended!"
                  </p>
                  <h5>Michael Chen</h5>
                  <small>Parent</small>
                </div>
              </div>
            </div>
          </div>

          <!-- Testimonial 3 -->
          <div class="col-md-6 col-lg-4">
            <div class="testimonial-card">
              <div class="testimonial-content">
                <div class="profile-img">
                  <img
                    src="{{ asset('assets/images/recent4.png') }}"
                    alt="Emily Rodriguez"
                    class="img-fluid"
                  />
                </div>
                <div class="testimonial-text">
                  <p>
                    "The workshops provided practical tools I've implemented in
                    my classroom. My students are more engaged and excited about
                    learning than ever before."
                  </p>
                  <h5>Emily Rodriguez</h5>
                  <small>Educator</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonial Video Section -->
    <section class="testimonial-video-section py-5">
      <div class="video-background">
        <div class="background-overlay"></div>
      </div>

      <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
              <h2 class="display-5 fw-bold text-white">Our Video Testimonials</h2>
              <p class=" text-white">Hear from our community members</p>
            </div>
          </div>
        <div class="row justify-content-center">
          <div class="col-lg-8 col-xl-6">
            <div class="video-container shadow-lg">
              <div class="ratio ratio-16x9">
                <iframe
                  src="https://www.youtube.com/embed/YOUR_VIDEO_ID?rel=0"
                  title="Testimonial Video"
                  allowfullscreen
                ></iframe>
              </div>
              <div class="play-button">
                <i class="fas fa-play"></i>
              </div>
            </div>

            <div class="testimonial-content text-center mt-5">
              <h2 class="text-white mb-3">Hear From Our Community</h2>
              <p class=" text-white">
                See what our students and partners have to say about their
                experiences
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection