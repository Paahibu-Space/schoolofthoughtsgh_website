@extends('frontend.layout')
@section('content')

    <!-- Hero Section -->
    <section class="about-hero">
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
            <h2 class="mb-2">About Us</h2>

            <p>
              School of Thoughts Ghana is an award-winning registered Non-profit
              organization that is designed to bridge the educational gap
              between the Northern and Southern parts of Ghana through Human
              Capacity Development, Advocacy and Opportunity Creation. It
              focuses on the tuition of activities such as Reading and Writing,
              Debate and Public Speaking, Talent and Leadership Development, and
              Information Technology. Under its Advocacy strand, it pushes for
              the implementation of policies that would improve the education
              conditions and opportunities in Northern Ghana. Its Opportunity
              Creation strand affords young people from the North an opportunity
              to enjoy the events, programs, scholarships and training that are
              hitherto concentrated in the capital cities of the country.
            </p>
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
            <p>
              To train and raise socially responsible young leaders who would
              understand the value of Quality Education and the tenets of global
              citizenship
            </p>
          </div>
          <div class="col-lg-4 mission-image">
            <img
              src="{{ asset('assets/images/mission.png') }}"
              alt="Students learning"
              class="img-fluid rounded-circle"
            />
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
            <img
              src="{{ asset('assets/images/vision.png') }}"
              alt="Graduation ceremony"
              class="img-fluid rounded-circle"
            />
          </div>
          <div class="col-lg-8 vision-content order-lg-2 order-1">
            <p class="">
              To be the hub for the formulation and implementation of activities
              geared towards the achievement of SDG 4; Quality Education, first
              in Northern Ghana and then other deprived regions in the
              continent.
            </p>
            
          </div>
        </div>
      </div>
    </section>

    <!-- Team Section -->
    <section class="team-section py-5 bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
            <h2>Our Amazing Team</h2>
         
          </div>
        </div>

        <div class="team-slider-container">
          <div class="team-slider-track">
            <!-- Team Member 1 -->
            <div class="team-card">
              <img
                src="{{ asset('assets/images/team.png') }}"
                alt="Team Member"
                class="img-fluid"
              />
              <div class="team-info">
                <h5>Dr. Sarah Johnson</h5>
                <p>Principal</p>
              </div>
            </div>

            <!-- Team Member 2 -->
            <div class="team-card">
              <img
                src="{{ asset('assets/images/team-image.png') }}"
                alt="Team Member"
                class="img-fluid"
              />
              <div class="team-info">
                <h5>Michael Chen</h5>
                <p>Academic Director</p>
              </div>
            </div>

            <!-- Team Member 3 -->
            <div class="team-card">
              <img
                src="{{ asset('assets/images/team.png') }}"
                alt="Team Member"
                class="img-fluid"
              />
              <div class="team-info">
                <h5>Emily Rodriguez</h5>
                <p>Head of Science</p>
              </div>
            </div>

            <!-- Team Member 4 -->
            <div class="team-card">
              <img
                src="{{ asset('assets/images/team-image.png') }}"
                alt="Team Member"
                class="img-fluid"
              />
              <div class="team-info">
                <h5>David Wilson</h5>
                <p>Head of Arts</p>
              </div>
            </div>

            <!-- Team Member 5 -->
            <div class="team-card">
              <img
                src="{{ asset('assets/images/team.png') }}"
                alt="Team Member"
                class="img-fluid"
              />
              <div class="team-info">
                <h5>Lisa Thompson</h5>
                <p>Student Counselor</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection