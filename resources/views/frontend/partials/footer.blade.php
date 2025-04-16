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
                      src="assets/images/logo.png"
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
                      <a href="{{ route('frontend.home') }}" class="text-white text-decoration-none">Home</a>
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