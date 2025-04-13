<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta
      name="description"
      content="School of Thought is an educational platform that empowers learners with critical thinking, creativity, and leadership skills."
    />
    <!-- Google Fonts: DM Sans -->
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap"
      rel="stylesheet"
    />

    <title>School Of Thoughts Ghana</title>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="/assets/css/styles.css" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/logo.png" />
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Font Awesome for icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
  </head>

  <body>
    <!-- {{-- Navbar Section----- --}} -->
    <nav class="navbar">
      <div class="navbar-logo">
        <a href="/index.html"></a>
        <img src="/assets/images/logo.png" alt="Logo" />
      </div>

      <ul class="nav-links">
        <li><a href="/index.html" class="active">Home</a></li>

        <li>
          <a href="/assets/pages/aboutus.html"
            >About Us <span class="dropdown-icon">▼</span></a
          >
          <ul class="dropdown-menu">
            <li>
              <a href="#"
                >Who We Are
                <img src="/assets/images/dropdown1.png" alt="Mission"
              /></a>
            </li>
            <li>
              <a href="#"
                >Mission <img src="/assets/images/dropdown3.png" alt="Mission"
              /></a>
            </li>
            <li>
              <a href="#"
                >Vision <img src="/assets/images/dropdown2.png" alt="Team"
              /></a>
            </li>
            <li>
              <a href="#"
                >Our Team <img src="/assets/images/dropdown5.png" alt="History"
              /></a>
            </li>
          </ul>
        </li>

        <li>
          <a href="/assets/pages/events.html"
            >Events <span class="dropdown-icon">▼</span></a
          >
          <ul class="dropdown-menu">
            <li>
              <a href="#"
                >Past Events
                <img src="/assets/images/dropdown4.png" alt="Upcoming"
              /></a>
            </li>
            <li>
              <a href="#"
                >Upcoming Events
                <img src="/assets/images/dropdown2.png" alt="Past"
              /></a>
            </li>
            <li>
              <a href="#"
                >Blogs <img src="/assets/images/dropdown3.png" alt="Gallery"
              /></a>
            </li>
            <li>
              <a href="#"
                >Stories <img src="/assets/images/dropdown1.png" alt="Gallery"
              /></a>
            </li>
          </ul>
        </li>

        <li>
          <a href="#">Get Involved <span class="dropdown-icon">▼</span></a>
          <ul class="dropdown-menu">
            <li>
              <a href="#"
                >Volunteer
                <img src="/assets/images/dropdown3.png" alt="Volunteer"
              /></a>
            </li>
            <li>
              <a href="#"
                >Partnership
                <img src="/assets/images/dropdown2.png" alt="Partner"
              /></a>
            </li>
          </ul>
        </li>

        <li><a href="#" class="donate-btn">Donate</a></li>
      </ul>

      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </nav>

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
                    src="/assets/images/event1.png"
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
                  <a href="/assets/pages/eventsdetails.html" class="btn learn-btn">
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
                    src="/assets/images/about-top.png"
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
                  <a href="/assets/pages/eventsdetails.html" class="btn learn-btn">
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
                    src="/assets/images/about-down.png"
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
                  <a href="#" class="btn learn-btn">
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
                    src="/assets/images/dropdown5.png"
                    alt="Seminar"
                    class="img-fluid"
                  />
                </div>
                <div class="event-content">
                  <h3>Industry Seminar</h3>
                  <p>Learn from leading experts in your field.</p>
                  <a href="#" class="btn learn-btn">
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
                            <img src="/assets/images/speaker1.png" alt="Speaker 1" class="img-fluid">
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
                            <img src="/assets/images/speaker2.png" alt="Speaker 2" class="img-fluid">
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
                            <img src="/assets/images/speaker3.png" alt="Speaker 3" class="img-fluid">
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
                            <img src="/assets/images/speaker4.png" alt="Speaker 4" class="img-fluid">
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
            <img src="/assets/images/blog1.png" alt="Workshop" class="img-fluid">
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
            <img src="/assets/images/blog2.png" alt="Conference" class="img-fluid">
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
            <img src="/assets/images/about-down.png" alt="Networking" class="img-fluid">
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
            <img src="/assets/images/event1.png" alt="Seminar" class="img-fluid">
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
                src="/assets/images/part1.png"
                alt="Partner 1"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="/assets/images/part2.png"
                alt="Partner 2"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="/assets/images/part3.png"
                alt="Partner 3"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="/assets/images/part4.png"
                alt="Partner 4"
                class="img-fluid"
              />
            </div>
          </div>

          <!-- Row 2 -->
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="/assets/images/part5.png"
                alt="Partner 5"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="/assets/images/part6.png"
                alt="Partner 6"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="/assets/images/part7.png"
                alt="Partner 7"
                class="img-fluid"
              />
            </div>
          </div>
          <div class="col-6 col-md-4 col-lg-3">
            <div class="partner-logo">
              <img
                src="/assets/images/part8.png"
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
                src="/assets/images/gallery1.png"
                alt="Team Member"
                class="img-fluid"
              />
            </div>

            <!-- Team Member 2 -->
            <div class="gallery-card">
              <img
                src="/assets/images/team-image.png"
                alt="Team Member"
                class="img-fluid"
              />
            </div>

            <!-- Team Member 3 -->
            <div class="gallery-card">
              <img
                src="/assets/images/team.png"
                alt="Team Member"
                class="img-fluid"
              />
            </div>

            <!-- Team Member 4 -->
            <div class="gallery-card">
              <img
                src="/assets/images/gallery1.png"
                alt="Team Member"
                class="img-fluid"
              />
            </div>

            <!-- Team Member 5 -->
            <div class="gallery-card">
              <img
                src="/assets/images/team.png"
                alt="Team Member"
                class="img-fluid"
              />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- {{-- Footer Section----- --}} -->
    <footer class="footer-section text-white pt-5 pb-3">
      <div class="container">
        <div class="row">
          <!-- Left Column -->
          <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="row">
              <!-- Logo + School Name -->
              <div class="col-12 mb-4">
                <div class="d-flex align-items-center">
                  <img
                    src="/assets/images/logo.png"
                    alt="School Logo"
                    class="footer-logo me-3"
                    style="height: 50px"
                  />
                  <h3 class="mb-0">
                    School of Thoughts <br />
                    Ghana
                  </h3>
                </div>
              </div>

              <!-- Links Column -->
              <div class="col-md-4 col-6 mb-4 mb-md-0">
                <h5 class="text-white mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                  <li class="mb-2">
                    <a href="#" class="text-white text-decoration-none">Home</a>
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-white text-decoration-none"
                      >About Us</a
                    >
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-white text-decoration-none"
                      >Events</a
                    >
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-white text-decoration-none">Blog</a>
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-white text-decoration-none"
                      >Contact</a
                    >
                  </li>
                </ul>
              </div>

              <!-- Products Column -->
              <div class="col-md-4 col-6 mb-4 mb-md-0">
                <h5 class="text-white mb-3">Products</h5>
                <ul class="list-unstyled">
                  <li class="mb-2">
                    <a href="#" class="text-white text-decoration-none"
                      >E-Learning</a
                    >
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-white text-decoration-none"
                      >Curriculum</a
                    >
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-white text-decoration-none"
                      >Resources</a
                    >
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-white text-decoration-none"
                      >Merchandise</a
                    >
                  </li>
                  <li class="mb-2">
                    <a href="#" class="text-white text-decoration-none"
                      >Partnerships</a
                    >
                  </li>
                </ul>
              </div>

              <!-- Contact Column -->
              <div class="col-md-4 col-12">
                <h5 class="text-white mb-3">Contact Us</h5>
                <ul class="list-unstyled">
                  <li class="mb-2 d-flex align-items-center">
                    <i class="fas fa-envelope text-white me-2"></i>
                    <a
                      href="mailto:info@schoolname.edu"
                      class="text-white text-decoration-none"
                      >info@schoolname.edu</a
                    >
                  </li>
                  <li class="d-flex align-items-center">
                    <i class="fas fa-phone text-white me-2"></i>
                    <a
                      href="tel:+12345678900"
                      class="text-white text-decoration-none"
                      >+1 (234) 567-8900</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!-- Right Column (Newsletter) -->
          <div class="col-lg-4">
            <div class="bg-white text-dark p-4 rounded">
              <h5 class="mb-3">Newsletter</h5>
              <p class="text-muted">
                Join us, not as a client, but as a valued member of our
                close-knit community. Let keep yoou Updated.
              </p>
              <form class="mt-4">
                <div class="mb-3">
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Your email address"
                    required
                  />
                </div>
                <a href="#" class="btn learn-btn mt-4">
                  Subscribe <i class="fas fa-arrow-right ms-2"></i>
                </a>
              </form>
            </div>
          </div>
        </div>

        <!-- Divider -->
        <hr class="my-4 bg-light opacity-10" />

        <!-- Bottom Row -->
        <div class="row align-items-center">
          <div class="col-md-6 mb-3 mb-md-0">
            <p class="mb-0">
              &copy; <span id="current-year"></span> School Name. All Rights
              Reserved.
            </p>
          </div>
          <div class="col-md-6">
            <div class="d-flex justify-content-md-end justify-content-center">
              <a
                href="#"
                class="social-icon bg-white rounded-circle d-flex align-items-center justify-content-center me-3"
              >
                <i class="fab fa-facebook-f text-dark"></i>
              </a>
              <a
                href="#"
                class="social-icon bg-white rounded-circle d-flex align-items-center justify-content-center me-3"
              >
                <i class="fab fa-twitter text-dark"></i>
              </a>
              <a
                href="#"
                class="social-icon bg-white rounded-circle d-flex align-items-center justify-content-center me-3"
              >
                <i class="fab fa-instagram text-dark"></i>
              </a>
              <a
                href="#"
                class="social-icon bg-white rounded-circle d-flex align-items-center justify-content-center me-3"
              >
                <i class="fab fa-linkedin-in text-dark"></i>
              </a>
              <a
                href="#"
                class="social-icon bg-white rounded-circle d-flex align-items-center justify-content-center"
              >
                <i class="fab fa-youtube text-dark"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- WhatsApp Button -->
      <a href="#" id="whatsappButton" class="floating-button whatsapp-btn" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    
    <!-- Back to Top Button -->
    <a href="#" id="backToTop" class="floating-button back-to-top-btn">
        <i class="fas fa-arrow-up"></i>
    </a>
  
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Animate.css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
  </body>
</html>
