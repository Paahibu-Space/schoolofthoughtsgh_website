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
                                    <p class="animate__animated animate__fadeInUp animate__delay-1s">Transforming taught into ideas for Changes</p>
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
                                    <p class="animate__animated animate__fadeInUp animate__delay-1s">Our programs empower individuals and create lasting impact in underserved communities.</p>
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
                                    <p class="animate__animated animate__fadeInUp animate__delay-1s">Together we can make a difference. Your support helps us reach more people in need.</p>
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




    <!-- JavaScript -->
    <script src="/assets/js/script.js"></script>
     <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</body>

</html>