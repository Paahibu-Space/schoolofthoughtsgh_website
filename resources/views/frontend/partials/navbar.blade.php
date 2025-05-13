    <!-- {{-- Navbar Section----- --}} -->
    <nav class="navbar">
        <div class="navbar-logo">
          <a href="{{ route('frontend.home') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" />
          </a>
          
        </div>
  
        <ul class="nav-links">
          <li><a href="{{ route('frontend.home') }}" class="active">Home</a></li>
  
          <li>
            <a href="{{ route('frontend.about') }}"
              >About Us <span class="dropdown-icon">▼</span></a
            >
            <ul class="dropdown-menu">
              <div class="dropdown-content">
                <div class="dropdown-links">
                  <li><a href="{{ route('frontend.about') }}">Who We Are</a></li>
                  {{-- <li><a href="{{ route('frontend.about') }}">Mission</a></li>
                  <li><a href="{{ route('frontend.about') }}">Vision</a></li> --}}
                  <li><a href="{{ route('frontend.team') }}">Our Team</a></li>
                  <li><a href="{{ route('gallery.index') }}">Our Gallery</a></li>
                </div>
                <div class="dropdown-image">
                  <img src="{{ asset('assets/images/dropdown1.png') }}" alt="About Us">
                </div>
              </div>
            </ul>
          </li>

          <li>
            <a href="#">Get Involved <span class="dropdown-icon">▼</span></a>
           
            <ul class="dropdown-menu">
              <div class="dropdown-content">
                <div class="dropdown-links">
                  <li><a href="#">Volunteer</a></li>
                  <li><a href="#">Partnership</a></li>
                  
                </div>
                <div class="dropdown-image">
                  <img src="{{ asset('assets/images/dropdown3.png') }}" alt="About Us">
                </div>
              </div>
            </ul>
          </li>
  
          <li>
            <a href="{{ route('frontend.events') }}">Events <span class="dropdown-icon">▼</span></a>
            
            <ul class="dropdown-menu">
              <div class="dropdown-content">
                <div class="dropdown-links">
                  <li><a href="{{ route('frontend.events') }}">Upcoming Events</a></li>
                  <li><a href="{{ route('frontend.events') }}">Past Events</a></li>
                  <li><a href="{{ route('frontend.stories') }}">Stories</a></li>
                </div>
                <div class="dropdown-image">
                  <img src="{{ asset('assets/images/dropdown2.png') }}" alt="About Us">
                </div>
              </div>
            </ul>
          </li>
          <li><a href="{{ route('frontend.blogs') }}">Blogs</a></li>

  

  
          {{-- <li><a href="#" class="donate-btn">Donate</a></li> --}}
        </ul>
  
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>