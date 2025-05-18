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
                      src="{{ asset('assets/images/logo.png') }}"
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
                      <a href="{{ route('frontend.about') }}" class="text-white text-decoration-none"
                        >About Us</a
                      >
                    </li>
                    <li class="mb-2">
                      <a href="{{ route('frontend.events') }}" class="text-white text-decoration-none"
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
                  <h5 class="text-white mb-3">Events</h5>
                  <ul class="list-unstyled">
                    <li class="mb-2">
                      <a href="{{ route('frontend.startright') }}" class="text-white text-decoration-none"
                        >Startright</a
                      >
                    </li>
                    <li class="mb-2">
                      <a href="{{ route('frontend.edutor') }}" class="text-white text-decoration-none"
                        >Edutor</a
                      >
                    </li>
                    <li class="mb-2">
                      <a href="{{ route('frontend.afrijam') }}" class="text-white text-decoration-none"
                        >AfriJam</a
                      >
                    </li>
                    <li class="mb-2">
                      <a href="{{ route('frontend.industry-seminar') }}" class="text-white text-decoration-none"
                        >Industry Seminar</a
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
                        >info@sotgh.org</a
                      >
                    </li>
                    <li class="d-flex align-items-center">
                      <i class="fas fa-phone text-white me-2"></i>
                      <a
                        href="tel:+233246417853"
                        class="text-white text-decoration-none"
                        >+233 24 641 7853</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>
  
            <!-- Right Column (Newsletter) -->
            <div class="col-lg-4" id="frontend-newsletter">
              <div class="bg-white text-dark p-4 rounded">
                  <h5 class="mb-3">Newsletter</h5>
                  <p class="text-muted">
                      Join us, not as a client, but as a valued member of our
                      close-knit community. Let keep you updated.
                  </p>
                  
                  @if(session('newsletter_success'))
                      <div class="alert alert-success">
                          {{ session('newsletter_success') }}
                      </div>
                  @elseif(session('newsletter_info'))
                      <div class="alert alert-info">
                          {{ session('newsletter_info') }}
                      </div>
                  @else
                  <form id="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST" class="mt-4">
                    @csrf
                    <div class="mb-3 position-relative">
                        <input
                            type="email"
                            name="email"
                            id="email-input"
                            class="form-control"
                            placeholder="Enter your email"
                            required
                        />
                        <div class="invalid-feedback d-none" id="email-error"></div>
                    </div>
                    <button type="submit" class="btn learn-btn mt-2" id="submit-btn">
                        <span id="btn-text">Subscribe</span>
                        <span id="btn-spinner" class="spinner-border spinner-border-sm d-none ms-2" role="status" aria-hidden="true"></span>
                    </button>
                
                    <div class="alert mt-3 d-none" id="newsletter-response"></div>
                </form>
                
                  @endif
              </div>
          </div>
          </div>
  
          <!-- Divider -->
          <hr class="my-4 bg-light opacity-10" />
  
          <!-- Bottom Row -->
          <div class="row align-items-center">
            <div class="col-md-6 mb-3 mb-md-0">
              <p class="mb-0">
                &copy; <span id="current-year"></span> School of Thoughts Ghana All Rights
                Reserved.
              </p>
            </div>
            <div class="col-md-6">
              <div class="d-flex justify-content-md-end justify-content-center">
                  @if(setting('facebook_url'))
                  <a
                      href="{{ setting('facebook_url') }}"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="social-icon bg-white rounded-circle d-flex align-items-center justify-content-center me-3"
                  >
                      <i class="fab fa-facebook-f text-dark"></i>
                  </a>
                  @endif
                  
                  @if(setting('twitter_url'))
                  <a
                      href="{{ setting('twitter_url') }}"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="social-icon bg-white rounded-circle d-flex align-items-center justify-content-center me-3"
                  >
                      <i class="fab fa-x text-dark"></i>
                  </a>
                  @endif
                  
                  @if(setting('instagram_url'))
                  <a
                      href="{{ setting('instagram_url') }}"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="social-icon bg-white rounded-circle d-flex align-items-center justify-content-center me-3"
                  >
                      <i class="fab fa-instagram text-dark"></i>
                  </a>
                  @endif
                  
                  @if(setting('linkedin_url'))
                  <a
                      href="{{ setting('linkedin_url') }}"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="social-icon bg-white rounded-circle d-flex align-items-center justify-content-center me-3"
                  >
                      <i class="fab fa-linkedin-in text-dark"></i>
                  </a>
                  @endif
                  
                  @if(setting('youtube_url'))
                  <a
                      href="{{ setting('youtube_url') }}"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="social-icon bg-white rounded-circle d-flex align-items-center justify-content-center"
                  >
                      <i class="fab fa-youtube text-dark"></i>
                  </a>
                  @endif
              </div>
          </div>
          </div>
        </div>
  

    
    <!-- Back to Top Button -->
    <a href="#" id="backToTop" class="floating-button back-to-top">
        <i class="fas fa-arrow-up"></i>
    </a>

           <!-- WhatsApp Button -->
           <a id="whatsappButton" 
           href="#"
           class="whatsapp-btn floating-button"
           target="_blank"
           data-number="{{ setting('whatsapp_number', '233246417853') }}"
           data-default-message="Hello! I'm interested in your services">
           <i class="fab fa-whatsapp"></i>
        </a>
  
      <!-- JavaScript -->
      <script>
        document.getElementById('newsletter-form').addEventListener('submit', async function (e) {
            e.preventDefault();
        
            const form = e.target;
            const formData = new FormData(form);
            const emailInput = document.getElementById('email-input');
            const errorDiv = document.getElementById('email-error');
            const responseDiv = document.getElementById('newsletter-response');
            const submitBtn = document.getElementById('submit-btn');
            const btnText = document.getElementById('btn-text');
            const btnSpinner = document.getElementById('btn-spinner');
        
            // Reset feedback
            errorDiv.classList.add('d-none');
            emailInput.classList.remove('is-invalid');
            responseDiv.classList.add('d-none');
            responseDiv.classList.remove('alert-success', 'alert-danger');
            responseDiv.textContent = '';
        
            // Disable button and show spinner
            submitBtn.disabled = true;
            btnText.textContent = 'Subscribing...';
            btnSpinner.classList.remove('d-none');
        
            try {
                const res = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: formData
                });
        
                const data = await res.json();
        
                if (res.ok) {
                    responseDiv.classList.remove('d-none');
                    responseDiv.classList.add('alert', 'alert-success');
                    responseDiv.textContent = data.message;
                    form.reset();
                } else if (res.status === 422) {
                    const errors = data.errors;
                    if (errors.email) {
                        errorDiv.textContent = errors.email[0];
                        errorDiv.classList.remove('d-none');
                        emailInput.classList.add('is-invalid');
                    }
                } else {
                    throw new Error('Unexpected error');
                }
        
            } catch (err) {
                responseDiv.classList.remove('d-none');
                responseDiv.classList.add('alert', 'alert-danger');
                responseDiv.textContent = 'Something went wrong. Please try again.';
            } finally {
                submitBtn.disabled = false;
                btnText.textContent = 'Subscribe';
                btnSpinner.classList.add('d-none');
            }
        });
        </script>
        
      <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
      <script src="{{ asset('assets/js/script.js') }}"></script>
      <!-- Bootstrap JS Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
