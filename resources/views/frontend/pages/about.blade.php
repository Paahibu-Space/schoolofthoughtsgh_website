@extends('frontend.layout')


@section('content')

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="hero-overlay"></div>
        <div class="container h-100 z-1">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="display-3 fw-bold text-white">About Us</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="about-intro mx-4 py-3 mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center">
                    {{-- <h2 class="mb-2">About Us</h2> --}}

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
                    <img src="{{ asset('assets/images/mission.png') }}" alt="Students learning"
                        class="img-fluid rounded-circle" />
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
                    <img src="{{ asset('assets/images/vision.png') }}" alt="Graduation ceremony"
                        class="img-fluid rounded-circle" />
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

        <!-- Impact Section -->
        <section class="impact-section py-5 text-white">
          <div class="container">
              <div class="row justify-content-center mb-5">
                  <div class="col-lg-8 text-center">
                      <h2 class="mb-4">Our Impact</h2>
                      <p class="lead">The difference we're making together</p>
                  </div>
              </div>
      
              <div class="row g-4">
                  <!-- Students Impact -->
                  <div class="col-md-6 col-lg-3">
                      <div class="impact-card text-center p-4 h-100">
                          <i class="fas fa-graduation-cap fa-3x mb-4"></i>
                          <p class="fw-bold fs-5 mb-1">
                              <span class="counter" data-target="{{ $impactData['students'] }}">0</span>+
                          </p>
                          <p class="fw-bold fs-5">Students</p>
                      </div>
                  </div>
                  
                  <!-- Schools Impact -->
                  <div class="col-md-6 col-lg-3">
                      <div class="impact-card text-center p-4 h-100">
                          <i class="fas fa-school fa-3x mb-4"></i>
                          <p class="fw-bold fs-5 mb-1">
                              <span class="counter" data-target="{{ $impactData['schools'] }}">0</span>+
                          </p>
                          <p class="fw-bold fs-5">Schools</p>
                      </div>
                  </div>
                  
                  <!-- Regions Impact -->
                  <div class="col-md-6 col-lg-3">
                      <div class="impact-card text-center p-4 h-100">
                          <i class="fas fa-globe fa-3x mb-4"></i>
                          <p class="fw-bold fs-5 mb-1">
                              <span class="counter" data-target="{{ $impactData['regions'] }}">0</span>+
                          </p>
                          <p class="fw-bold fs-5">Regions</p>
                      </div>
                  </div>
                  
                  <!-- Volunteers Impact -->
                  <div class="col-md-6 col-lg-3">
                      <div class="impact-card text-center p-4 h-100">
                          <i class="fas fa-user-friends fa-3x mb-4"></i>
                          <p class="fw-bold fs-5 mb-1">
                              <span class="counter" data-target="{{ $impactData['volunteers'] }}">0</span>+
                          </p>
                          <p class="fw-bold fs-5">Volunteers</p>
                      </div>
                  </div>
              </div>
          </div>
      </section>

    <!-- Team Section -->
    <section class="team-section py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Meet Our Team</h2>
                    <p class="lead text-muted">The talented individuals who make it all happen</p>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach ($teamMembers as $member)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="team-card">
                            <div class="team-card-inner">
                                <!-- Front Side -->
                                <div class="team-card-front">
                                    <div class="team-img-wrapper">
                                        <img src="{{ $member->photo ? Storage::url($member->photo) : asset('assets/images/team-default.jpg') }}"
                                            alt="{{ $member->name }}" class="img-fluid">
                                        @if (count($member->getActiveSocialLinks()) > 0)
                                            <div class="social-links">
                                                @foreach ($member->getActiveSocialLinks() as $platform => $url)
                                                    <a href="{{ $url }}" target="_blank" class="social-link">
                                                        <i class="fab fa-{{ $platform }}"></i>
                                                    </a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="team-card-body">
                                        <h5 class="mb-1">{{ $member->name }}</h5>
                                        <p class="text-muted mb-2">{{ $member->role }}</p>
                                        <button class="btn btn-sm learn-btn view-details"
                                            data-member-id="{{ $member->id }}">
                                            View Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Team Member Modal -->
    <div class="modal fade" id="teamMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <div class="row g-0">
                        <!-- Left Column - Image -->
                        <div class="col-md-5">
                            <div class="modal-img-wrapper h-100">
                                <img id="modalMemberImage" src="" alt=""
                                    class="img-fluid h-100 w-100 object-fit-cover">
                            </div>
                        </div>

                        <!-- Right Column - Content -->
                        <div class="col-md-7">
                            <div class="p-4 p-lg-5">
                                <h3 id="modalMemberName" class="mb-2"></h3>
                                <p id="modalMemberRole" class="text-primary mb-4"></p>

                                <div id="modalMemberDescription" class="mb-4"></div>

                                <div class="member-social-links mb-4">
                                    <!-- Social links will be inserted here by JavaScript -->
                                </div>

                                <div class="member-meta d-flex flex-wrap gap-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-sort-numeric-down me-2 text-muted"></i>
                                        <small class="text-muted">Display order: <span id="modalMemberOrder"></span></small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-circle me-2 text-success"></i>
                                        <small class="text-muted">Status: Active</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        {{-- Blogs section --}}
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
                        <a href="{{ route('frontend.blogs') }}" class="btn learn-btn">
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
<section class="partners-section py-5">
  <div class="container">
      <div class="row justify-content-center mb-5">
          <div class="col-lg-8 text-center">
              <h2 class="display-4 fw-bold text-dark mb-3">Our Partners</h2>
              <p class="lead">
                  Collaborating with leading organizations to enhance education
              </p>
          </div>
      </div>

      @if($partners->count() > 0)
          <div class="row g-4 justify-content-center align-items-center">
              @foreach($partners as $partner)
              <div class="col-6 col-md-4 col-lg-3">
                  <div class="partner-logo">
                      <img 
                          src="{{ $partner->image_url }}" 
                          alt="{{ $partner->name }}" 
                          class="img-fluid"
                          title="{{ $partner->name }}"
                          loading="lazy"
                      />
                      @if($partner->website_url)
                      <a href="{{ $partner->website_url }}" target="_blank" rel="noopener noreferrer" class="partner-link"></a>
                      @endif
                  </div>
              </div>
              @endforeach
          </div>
      @else
          <div class="text-center py-4">
              <div class="alert alert-info">
                  <i class="fas fa-handshake me-2"></i> Our partner network is growing. Check back soon!
              </div>
          </div>
      @endif
  </div>
</section>
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Team member modal functionality
            const viewButtons = document.querySelectorAll('.view-details');
            const modal = new bootstrap.Modal(document.getElementById('teamMemberModal'));

            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const memberId = this.getAttribute('data-member-id');
                    fetchMemberDetails(memberId);
                });
            });

            function fetchMemberDetails(memberId) {
                // In a real application, you would fetch this data via AJAX
                // For this example, we'll use data attributes from the card

                const card = document.querySelector(`[data-member-id="${memberId}"]`).closest('.team-card');
                const name = card.querySelector('h5').textContent;
                const role = card.querySelector('.text-muted').textContent;
                const imgSrc = card.querySelector('img').src;

                // Set modal content
                document.getElementById('modalMemberName').textContent = name;
                document.getElementById('modalMemberRole').textContent = role;
                document.getElementById('modalMemberImage').src = imgSrc;
                document.getElementById('modalMemberImage').alt = name;

                // For demo purposes - in real app you'd get description from AJAX
                document.getElementById('modalMemberDescription').innerHTML =
                    `<p>This would be the detailed description of ${name}, showing their background, experience, and role in the organization. In a real application, this would be pulled from the database.</p>`;

                // Add social links
                const socialLinksContainer = document.querySelector('.member-social-links');
                socialLinksContainer.innerHTML = '';

                // Get social links from the card (in real app, get from AJAX)
                const socialLinks = card.querySelectorAll('.social-link');
                if (socialLinks.length > 0) {
                    socialLinksContainer.innerHTML = '<h6 class="mb-3">Connect:</h6>';
                    socialLinks.forEach(link => {
                        const clone = link.cloneNode(true);
                        clone.classList.remove('social-link');
                        clone.classList.add('btn', 'btn-outline-secondary', 'me-2');
                        socialLinksContainer.appendChild(clone);
                    });
                }

                // Show the modal
                modal.show();
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // Animation speed (lower = faster)
    const animateWhenVisible = true; // Only animate when scrolled to
    
    function animateCounters() {
        counters.forEach(counter => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const increment = target / speed;
            
            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(animateCounters, 1);
            } else {
                counter.innerText = target.toLocaleString(); // Format with commas
            }
        });
    }
    
    // Option 1: Animate immediately
    // animateCounters();
    
    // Option 2: Animate when section is visible
    if (animateWhenVisible) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        document.querySelectorAll('.impact-section').forEach(section => {
            observer.observe(section);
        });
    }
});
    </script>


@endsection
@endsection
