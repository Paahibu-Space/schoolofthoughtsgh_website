<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="School of Thought is an educational platform that empowers learners with critical thinking, creativity, and leadership skills.">
    <!-- Google Fonts: DM Sans -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <title>School Of Thoughts Ghana</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    {{-- Navbar Section----- --}}
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="/"></a>
            <img src="/assets/images/logo.png" alt="Logo">
        </div>

        <ul class="nav-links">
            <li><a href="#" class="active">Home</a></li>

            <li>
                <a href="#">About Us <span class="dropdown-icon">▼</span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Who We Are <img src="/assets/images/dropdown1.png" alt="Mission"></a></li>
                    <li><a href="#">Mission <img src="/assets/images/dropdown3.png" alt="Mission"></a></li>
                    <li><a href="#">Vision <img src="/assets/images/dropdown2.png" alt="Team"></a></li>
                    <li><a href="#">Our Team <img src="/assets/images/dropdown5.png" alt="History"></a></li>
                </ul>
            </li>

            <li>
                <a href="#">Events <span class="dropdown-icon">▼</span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Past Events <img src="/assets/images/dropdown4.png" alt="Upcoming"></a></li>
                    <li><a href="#">Upcoming Events <img src="/assets/images/dropdown2.png" alt="Past"></a></li>
                    <li><a href="#">Blogs <img src="/assets/images/dropdown3.png" alt="Gallery"></a></li>
                    <li><a href="#">Stories <img src="/assets/images/dropdown1.png" alt="Gallery"></a></li>
                </ul>
            </li>

            <li>
                <a href="#">Get Involved <span class="dropdown-icon">▼</span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Volunteer <img src="/assets/images/dropdown3.png" alt="Volunteer"></a></li>
                    <li><a href="#">Partnership <img src="/assets/images/dropdown2.png" alt="Partner"></a></li>

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

    {{-- Hero Section------ --}}

    <section class="hero-slider">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <!-- Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>

            <!-- Slides -->
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <img src="/assets/images/hero1.png" class="d-block w-100" alt="Nature">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 text-start">
                                    <h1 class="animate__animated animate__fadeInDown">School of Thoughts</h1>
                                    <p class="animate__animated animate__fadeInUp animate__delay-1s">Transforming taught
                                        into ideas for Changes</p>
                                    <div class="btn-group animate__animated animate__fadeInUp animate__delay-2s">
                                        <a href="#" class="btn btn-primary me-3">
                                            Get Involved <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-light">
                                            Donate Now <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <img src="/assets/images/hero2.jpg" class="d-block w-100" alt="Community">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 text-start">
                                    <h1 class="animate__animated animate__fadeInDown">Build a Better Future</h1>
                                    <p class="animate__animated animate__fadeInUp animate__delay-1s">Our programs
                                        empower individuals and create lasting impact in underserved communities.</p>
                                    <div class="btn-group animate__animated animate__fadeInUp animate__delay-2s">
                                        <a href="#" class="btn btn-primary me-3">
                                            Get Involved <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-light">
                                            Donate Now <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <img src="/assets/images/hero3.jpg" class="d-block w-100" alt="Hope">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 text-start">
                                    <h1 class="animate__animated animate__fadeInDown">Be Part of the Change</h1>
                                    <p class="animate__animated animate__fadeInUp animate__delay-1s">Together we can
                                        make a difference. Your support helps us reach more people in need.</p>
                                    <div class="btn-group animate__animated animate__fadeInUp animate__delay-2s">
                                        <a href="#" class="btn btn-primary me-3">
                                            Get Involved <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-light">
                                            Donate Now <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    {{-- About Section----------- --}}
    <section class="about-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- Text Content -->
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h2 class="display-5 fw-bold mb-4">About Us </h2>
                    <p class="lead mb-3">School of Thoughts Ghana is an award-winning registered Non-profit organization
                        that is designed to
                        bridge the educational gap between the Northern and Southern parts of Ghana through Human
                        Capacity Development, Advocacy and Opportunity Creation. It focuses on the tuition of activities
                        such as Reading and Writing, Debate and Public Speaking, Talent and Leadership Development, and
                        Information Technology.</p>
                    <p class="mb-4"> Under its Advocacy strand, it pushes for the implementation of policies that would
                        improve the education conditions and opportunities in</p>
                    <a href="#" class="btn learn-btn">
                        Learn More <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>

                <!-- Image Stack -->
                <div class="col-lg-6">
                    <div class="image-stack">
                        <img src="assets/images/about-down.png" alt="Team working" class="img-stack-bottom">
                        <img src="assets/images/about-top.png" alt="Community event" class="img-stack-top">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Our Team Section---- --}}
    <section class="team-section">
        <!-- Centered Title -->
        <div class="container text-center mb-5">
            <h2 class="display-4 fw-bold">Our Team</h2>

        </div>

        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Left Column - Content -->
                <div class="col-lg-6 content-col py-5">
                    <div class="px-4 px-lg-5">
                        <h3 class="mb-4">Abraham Agoni</h3>
                        <p class="mb-4">“Education is the foundation of greatness. At school of taught Ghana we empower
                            minds to shape the feature”</p>
                        <p class="mb-4"><strong>Founder</strong></p>
                        <a href="#" class="btn second-btn">
                            Meet Our Team <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Right Column - Parallax Image -->
                <div class="col-lg-6 parallax-col p-0">
                    <div class="parallax-image"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Explore Events Section----- --}}
    <section class="events-section py-5">
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
                                <img src="assets/images/event1.png" alt="Workshop" class="img-fluid">
                            </div>
                            <div class="event-content">
                                <h3>2019 – STARTRIGHT SUMMIT </h3>
                                <p>The maiden educational summit that witnessed over 200 students, teachers and parents
                                    to discuss the roles of stakeholders in achieving quality education in Ghana.</p>
                                <a href="#" class="btn learn-btn">
                                    Learn More <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 2 -->
                    <div class="swiper-slide">
                        <div class="event-card card-2">
                            <div class="event-img">
                                <img src="assets/images/about-top.png" alt="Conference" class="img-fluid">
                            </div>
                            <div class="event-content">
                                <h3>2020 – EDUTOUR:</h3>
                                <p> To compliment the effort of the Ghana Educational Service in reviving the need
                                    for education after Covid, the team toured up to 16 schools, engaging over 800
                                    students</p>
                                <a href="#" class="btn learn-btn">
                                    Learn More <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Event Card 3 -->
                    <div class="swiper-slide">
                        <div class="event-card card-3">
                            <div class="event-img">
                                <img src="assets/images/about-down.png" alt="Networking" class="img-fluid">
                            </div>
                            <div class="event-content">
                                <h3>2021 – AFRIJAM</h3>
                                <p>8 young females were sponsored to attend the Centenary Anniversary camp of the
                                    Ghana Girl Guides Association. This was an opportunity for the girls to be exposed
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
                                <img src="assets/images/dropdown5.png" alt="Seminar" class="img-fluid">
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

    {{-- Partnership Section- --}}



    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="/assets/js/script.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</body>

</html>