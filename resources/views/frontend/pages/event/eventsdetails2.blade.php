@extends('frontend.layout')
@section('content')
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
                src="{{ asset('assets/images/event-page2-top.png') }}"
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
            <h3 class="fw-bold mb-4">Reading Training for Students</h3>
            <div class="summit-content mb-4">
              <p>
                Training on how to Read for 20 students selected from 10
                schools. Students were taught for an hour each week day after
                normal school hours In 2019, 20 students from 10 schools
                participated in a special reading training program aimed at
                improving literacy skills. The students received one hour of
                reading instruction each weekday after school, focusing on
                phonetics, vocabulary, and comprehension. Teachers reported
                noticeable improvements in students' reading abilities, with
                many gaining confidence and a greater interest in books.
                Education stakeholders praised the initiative, highlighting its
                role in enhancing academic performance. Following its success,
                discussions have emerged about expanding the program to benefit
                more students in the future.
              </p>
            </div>
            <div class="summit-image">
              <img
                src="{{ asset('assets/images/event-page2-down.png') }}"
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
                  src="{{ asset('assets/images/recent1.png') }}"
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
                  src="{{ asset('assets/images/recent2.png') }}"
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
                  src="{{ asset('assets/images/recent3.png') }}"
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
                  src="{{ asset('assets/images/recent4.png') }}"
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
          <p class="summit-content col-md-8">
            Training on how to Read for 20 students selected from 10 schools.
            Students were taught for an hour each week day after normal school
            hours In 2019, 20 students from 10 schools participated in a
            special reading training program aimed at improving literacy
            skills. The students received one hour of reading instruction each
            weekday after school, focusing on phonetics, vocabulary, and
            comprehension. Teachers reported noticeable improvements in
            students' reading abilities, with many gaining confidence and a
            greater interest in books. Education stakeholders praised the
            initiative, highlighting its role in enhancing academic
            performance. Following its success, discussions have emerged about
            expanding the program to benefit more students in the future.
          </p>
        </div>
      </div>
    </section>

@endsection