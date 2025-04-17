@extends('frontend.layout')

@section('content')
    <!-- Hero Section -->
    <section class="team-hero">
      <div class="hero-overlay"></div>
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12 text-center">
            <h1 class="display-3 fw-bold text-white">
              We think to change ! We are Change !
            </h1>
          </div>
        </div>
      </div>
    </section>

    <!-- Team Section -->
    <section class="our-team-section py-5">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
            <h5 class="text-dark mb-3">OUR TEAM</h5>
            <h1 class="display-3 fw-bold text-dark">Meet the Clonify team</h1>
            <p class="lead">
              Alone we can do little, together we can do so much, Team work is a
              secret that makes common people achieve uncommon result.
            </p>
          </div>
        </div>

        <div class="row g-4">
          <!-- Team Member 1 -->
          <div class="col-md-6 col-lg-3">
            <div class="our-team-card text-start">
              <div class="team-img">
                <img
                  src="{{ asset('assets/images/team.png') }}"
                  alt="Dr. Sarah Johnson"
                  class="img-fluid"
                />
              </div>
              <h4 class="mt-4 mb-1">Abraham Agoni</h4>
              <p class="text-muted mb-3">Founder</p>
              <p>None of Us is as smart as all of us</p>
            </div>
          </div>

          <!-- Team Member 2 -->
          <div class="col-md-6 col-lg-3">
            <div class="our-team-card text-start">
              <div class="team-img">
                <img
                  src="{{ asset('assets/images/team2.png') }}"
                  alt="Michael Chen"
                  class="img-fluid"
                />
              </div>
              <h4 class="mt-4 mb-1">Prince Avarade</h4>
              <p class="text-muted mb-3">Academic Director</p>
              <p>
                At school of Ghana we believe in nurturing mind and building
                legacy of excellence
              </p>
            </div>
          </div>
          <!-- Team Member 3 -->
          <div class="col-md-6 col-lg-3">
            <div class="our-team-card text-start">
              <div class="team-img">
                <img
                  src="{{ asset('assets/images/team3.png') }}"
                  alt="Michael Chen"
                  class="img-fluid"
                />
              </div>
              <h4 class="mt-4 mb-1">Joel Nasara Sulemana</h4>
              <p class="text-muted mb-3">Senior Communications Officer</p>
              <p>Education is most powerful tool to change the world</p>
            </div>
          </div>
          <!-- Team Member 4 -->
          <div class="col-md-6 col-lg-3">
            <div class="our-team-card text-start">
              <div class="team-img">
                <img
                  src="{{ asset('assets/images/team4.png') }}"
                  alt="Michael Chen"
                  class="img-fluid"
                />
              </div>
              <h4 class="mt-4 mb-1">Daniel Bajaba</h4>
              <p class="text-muted mb-3">Programs Coordinator</p>
              <p>Discipline, teamwork and passion make champions</p>
            </div>
          </div>
          <!-- Team Member 5 -->
          <div class="col-md-6 col-lg-3">
            <div class="our-team-card text-start">
              <div class="team-img">
                <img
                  src="{{ asset('assets/images/team5.png') }}"
                  alt="Michael Chen"
                  class="img-fluid"
                />
              </div>
              <h4 class="mt-4 mb-1">Cecelia Kwara</h4>
              <p class="text-muted mb-3">Assistant Communications Officer</p>
              <p>Every Student deserves the right opportunity to succeed</p>
            </div>
          </div>
          <!-- Team Member 6 -->
          <div class="col-md-6 col-lg-3">
            <div class="our-team-card text-start">
              <div class="team-img">
                <img
                  src="{{ asset('assets/images/image7.png') }}"
                  alt="Michael Chen"
                  class="img-fluid"
                />
              </div>
              <h4 class="mt-4 mb-1">Thomas Akanjo</h4>
              <p class="text-muted mb-3">Finance Officer</p>
              <p>A strong foundation today builds a sustainable future</p>
            </div>
          </div>
          <!-- Team Member 7 -->
          <div class="col-md-6 col-lg-3">
            <div class="our-team-card text-start">
              <div class="team-img">
                <img
                  src="{{ asset('assets/images/image10.png') }}"
                  alt="Michael Chen"
                  class="img-fluid"
                />
              </div>
              <h4 class="mt-4 mb-1">Prince Avarade</h4>
              <p class="text-muted mb-3">Academic Director</p>
              <p>
                At school of Ghana we believe in nurturing mind and building
                legacy of excellence
              </p>
            </div>
          </div>
          <!-- Team Member 8 -->
          <div class="col-md-6 col-lg-3">
            <div class="our-team-card text-start">
              <div class="team-img">
                <img
                  src="{{ asset('assets/images/team-image.png') }}"
                  alt="Michael Chen"
                  class="img-fluid"
                />
              </div>
              <h4 class="mt-4 mb-1">Prince Avarade</h4>
              <p class="text-muted mb-3">Academic Director</p>
              <p>
                At school of Ghana we believe in nurturing mind and building
                legacy of excellence
              </p>
            </div>
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
          </div>
        </div>

        <div class="row g-4">
          <!-- Impact Item 1 -->
          <div class="col-md-6 col-lg-3">
            <div class="impact-card text-center p-4">
              <i class="fas fa-graduation-cap fa-3x mb-4"></i>
              <p class="fw-bold fs-5">5K +</p>
              <p class="fw-bold fs-5">Students</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="impact-card text-center p-4">
              <i class="fas fa-school fa-3x mb-4"></i>
              <p class="fw-bold fs-5">50 +</p>
              <p class="fw-bold fs-5">Schools</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="impact-card text-center p-4">
              <i class="fas fa-globe fa-3x mb-4"></i>
              <p class="fw-bold fs-5">10 +</p>
              <p class="fw-bold fs-5">Region</p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="impact-card text-center p-4">
              <i class="fas fas fa-user-friends fa-3x mb-4"></i>
              <p class="fw-bold fs-5">200 +</p>
              <p class="fw-bold fs-5">Volunteers</p>
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

    @endsection