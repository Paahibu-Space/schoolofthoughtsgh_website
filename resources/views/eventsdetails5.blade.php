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
    <section class="events-details-hero">
      <div class="hero-overlay"></div>
      <div class="container h-100">
        <div class="row h-100 align-items-center">
          <div class="col-12 text-center">
            <!-- <h1 class="display-3 fw-bold text-white">About Our School</h1> -->
          </div>
        </div>
      </div>
    </section>

    <!-- Details Section---------- -->
    <section class="details-section py-5">
      <div class="container">
        <div class="row g-4 align-items-stretch">
          <!-- Left Column - Image -->
          <div class="col-lg-8">
            <div class="details-image h-100">
              <img
                src="/assets/images/event-top.png"
                alt="Details"
                class="img-fluid rounded-3 h-100 w-100 object-fit-cover"
              />
            </div>
          </div>

          <!-- Right Column - Search & Categories -->
          <div class="col-lg-4">
            <div class="h-100 d-flex flex-column">
              <!-- Search Box -->
              <div class="search-box text-white p-4 rounded-3 mb-4">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control py-3"
                    placeholder="Search..."
                  />
                  <button class="btn px-4" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>

              <!-- Categories Box -->
              <div class="categories-box text-white p-4 rounded-3 flex-grow-1">
                <h3 class="mb-4 text-dark">Categories</h3>
                <ul class="list-unstyled">
                  <li class="mb-3">
                    <a
                      href="#"
                      class="text-dark text-decoration-none d-flex align-items-center"
                    >
                      <i class="fas fa-book me-3"></i>
                      <span>Stories</span>
                    </a>
                  </li>
                  <li class="mb-3">
                    <a
                      href="#"
                      class="text-dark text-decoration-none d-flex align-items-center"
                    >
                      <i class="fas fa-calendar-alt me-3"></i>
                      <span>Events</span>
                    </a>
                  </li>
                  <li class="mb-3">
                    <a
                      href="#"
                      class="text-dark text-decoration-none d-flex align-items-center"
                    >
                      <i class="fas fa-users me-3"></i>
                      <span>Blogs</span>
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="text-dark text-decoration-none d-flex align-items-center"
                    >
                      <i class="fas fa-newspaper me-3"></i>
                      <span>News</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Details Down Section--------- -->
    <section class="summit-section py-5">
      <div class="container">
        <div class="row g-5">
          <!-- Left Column - Summit Content -->
          <div class="col-lg-8">
            <h3 class="fw-bold mb-4">
              Teens’ Talk 2021: Empowering Young Girls
            </h3>
            <div class="summit-content mb-4">
              <p>
                In response to rising teenage pregnancy cases in the North East
                Region, a workshop was organized in 2021 to educate young
                females on sexual and reproductive health. The session
                emphasized the importance of making informed choices and staying
                focused on their career goals. The event reached over 80 young
                girls, equipping them with valuable knowledge and resources. To
                support their well-being, participants were also gifted sanitary
                products. The initiative was widely praised for promoting
                awareness and empowering young females to make positive life
                decisions.
              </p>
            </div>
            <div class="summit-image">
              <img
                src="/assets/images/event-down.png"
                alt="Education Summit"
                class="img-fluid rounded-3 shadow"
              />
            </div>
          </div>

          <!-- Right Column - Recent Posts -->
          <div class="col-lg-4">
            <div class="recent-posts text-dark p-4 rounded-3 h-100">
              <h3 class="mb-4">
                <i class="fas fa-newspaper me-2"></i>Recent Posts
              </h3>

              <!-- Post 1 -->
              <div
                class="post-item d-flex mb-4 pb-3 border-bottom border-white border-opacity-25"
              >
                <img
                  src="/assets/images/recent1.png"
                  alt="Post 1"
                  class="flex-shrink-0 me-3 rounded-2"
                  width="80"
                  height="80"
                />
                <div class="post-content">
                  <p class="mb-2 strong">STARTRIGHT SUMMIT 2019</p>
                  <div class="post-meta d-flex align-items-center">
                    <i class="far fa-calendar-alt me-2"></i>
                    <small class="text-dark">June 15, 2023</small>
                  </div>
                </div>
              </div>

              <!-- Post 2 -->
              <div
                class="post-item d-flex mb-4 pb-3 border-bottom border-white border-opacity-25"
              >
                <img
                  src="/assets/images/recent2.png"
                  alt="Post 2"
                  class="flex-shrink-0 me-3 rounded-2"
                  width="80"
                  height="80"
                />
                <div class="post-content">
                  <p class="mb-2 strong">STARTRIGHT SUMMIT 2019</p>
                  <div class="post-meta d-flex align-items-center">
                    <i class="far fa-calendar-alt me-2"></i>
                    <small class="text-dark">June 8, 2023</small>
                  </div>
                </div>
              </div>

              <!-- Post 3 -->
              <div
                class="post-item d-flex mb-4 pb-3 border-bottom border-white border-opacity-25"
              >
                <img
                  src="/assets/images/recent3.png"
                  alt="Post 3"
                  class="flex-shrink-0 me-3 rounded-2"
                  width="80"
                  height="80"
                />
                <div class="post-content">
                  <p class="mb-2 strong">STARTRIGHT SUMMIT 2019</p>
                  <div class="post-meta d-flex align-items-center">
                    <i class="far fa-calendar-alt me-2"></i>
                    <small class="text-dark">May 30, 2023</small>
                  </div>
                </div>
              </div>

              <!-- Post 4 -->
              <div class="post-item d-flex">
                <img
                  src="/assets/images/recent4.png"
                  alt="Post 4"
                  class="flex-shrink-0 me-3 rounded-2"
                  width="80"
                  height="80"
                />
                <div class="post-content">
                  <p class="mb-2 strong">STARTRIGHT SUMMIT 2019</p>
                  <div class="post-meta d-flex align-items-center">
                    <i class="far fa-calendar-alt me-2"></i>
                    <small class="text-dark">May 22, 2023</small>
                  </div>
                </div>
              </div>
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
