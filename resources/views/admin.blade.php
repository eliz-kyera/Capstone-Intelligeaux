<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{config('app.name')}}</title>
    <link rel="shortcut icon" href="{{ asset('ashesi-logo.png') }}" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" class="js-color-style" href="css/colors/color-2.css">
    <link rel="stylesheet" class="js-glass-style" href="css/glass.css">

    <style>
        .sub-menu .sub-menu-item :hover {
            color: #e55252;
            transition: ease-in-out .5s;
        }

        .btn-theme:hover {
            background-color: #e55252 !important;
        }

    </style>

</head>
<body>

    <!-- main-wrapper-->
    <div class="main-wrapper">

        <!-- header start-->
        <header class="header">
            <div class="contaniner">
                <div class="header-main d-flex justify-content-between align-items-center">
                    <div class="header-logo ">
                        <a href="/admins"><span>Ashesi</span>University - <span> (Admin)</span> </a>
                    </div>
                    <button type="button" class="header-hamburger-btn js-header-menu-toggler">
                        <span></span>
                    </button>
                    <div class="header-backdrop js-header-backdrop"></div>
                    <nav class="header-menu js-header-menu">
                        <button type="button" class="header-close-btn js-hader-menu-toggler">
                            <i class="fas fa-times"></i>
                        </button>
                        <ul class="menu">
                            <li class="menu-item"><a href="/">home</a></li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">Admin Login</i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="{{ route('sle.login') }}">Sle </a></li>
                                    <li class="sub-menu-item"><a href="{{ route('fire.login') }}">Fire department </a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="#" class="js-toggle-sub-menu">Admin Register</i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="{{ route('sle.register') }}">Sle </a></li>
                                    <li class="sub-menu-item"><a href="{{ route('fire.register') }}">Fire department </a></li>
                                </ul>
                            </li>

                    </nav>

                </div>
            </div>
        </header>
        <!--header end -->


        <!--banner section start -->
        <section class="banner-section d-fle align-items-center">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="banner-text">
                            <h2 class="mb-3">WELCOME TO INTELLIGEAUX.</h2>
                            <h1 class="mb-3 text-capitalize">The First Fire Reporting System
                                for Ashesi University</h1>
                            <a href="{{ route('std.register') }}" class="btn btn-theme">Make a report</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="banner-img">
                            <div class="circular-img">
                                <div class="circular-img-inner">
                                    <div class="circular-img-circle"></div>
                                    <img src="img/0ef43b22239532dbb3a27dfa063869c3.jpeg" alt="banner img">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <!--banner section end -->


        <!-- fun facts section start -->
        <section class="fun-facts-section">
            <div class="container">
                <div class="box py-2">
                    <div class="row text-center">
                        <div class="col-md-6 col-lg-3">
                            <div class="fun-facts-item">
                                <h2 class="'style1">800k</h2>
                                <p>Students</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="fun-facts-item">
                                <h2 class="style2">10+</h2>
                                <p>countries</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="fun-facts-item">
                                <h2 class=" style3">99%</h2>
                                <p>reliable</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="fun-facts-item">
                                <h2 class="style4">90%</h2>
                                <p>accuracy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <br>
        <br>
        <!--fun facts section end -->


        <!-- testimonial start-->

        <section class="testimonials-section section-padding position-relative">
            <div class="decoration-circles">
                <div class="decoration-circles-item"></div>
                <div class="decoration-circles-item"></div>
                <div class="decoration-circles-item"></div>
                <div class="decoration-circles-item"></div>
            </div>
            <div class="decoration-imgs">
                <img src="img/2d95875c472a625b89e7795709b71bbc.jpeg" alt="decoration img" class="decoration-imgs-item">
                <img src="img/24c576936dacce8552ea3991b748debc.jpeg" class="decoration-imgs-item">
                <img src="img/7be45712e7239f1ef0b95d6d7cb7230d.jpeg" alt="decoration img" class="decoration-imgs-item">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="section-title text-center">
                                <h2 class="title">students feedback</h2>
                                <p class="sub-title">What the students say </p>

                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 ">
                            <div class="img-box rounded-circle position-relative">
                                <img src="img/2d95875c472a625b89e7795709b71bbc.jpeg" class="w-100 js-testimonial-img rounded-circle" alt="testimonial img">
                            </div>
                            <div id="carouselOne" class="carousel slide text-center" data-bs-ride="carousel">
                                <div class="carousel-inner mb-4">
                                    <div class="carousel-item active" data-js-testimonial-img="img/2d95875c472a625b89e7795709b71bbc.jpeg">
                                        <div class="testimonials-item">
                                            <p class="text-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis totam eveniet quibusdam dolorum sunt laborum esse illum ipsa est
                                                magnam.</p>
                                            <h3>john doe</h3>
                                            <p class="text-2">computerscience student</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item" data-js-testimonial-img="img/24c576936dacce8552ea3991b748debc.jpeg">
                                        <div class="testimonials-item">
                                            <p class="text-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis totam eveniet quibusdam dolorum sunt laborum esse illum ipsa est
                                                magnam.</p>
                                            <h3>john doe</h3>
                                            <p class="text-2">computerscience student</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item" data-js-testimonial-img="img/7be45712e7239f1ef0b95d6d7cb7230d.jpeg">
                                        <div class="testimonials-item">
                                            <p class="text-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis totam eveniet quibusdam dolorum sunt laborum esse illum ipsa est
                                                magnam.</p>
                                            <h3>john doe</h3>
                                            <p class="text-2">computerscience student</p>

                                        </div>

                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselOne" data-bs-slide="prev">
                                    <i class="fas fa-arrow-left"></i>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselOne" data-bs-slide="next">
                                    <i class="fas fa-arrow-right"></i>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
        </section>
        <br>
        <br>

        <!-- testimonial end  -->

        <!-- Signup and get started  -->
        <!-- <section class="bai-section section-padding">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-x-10">
                        <div class="box">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <div class="circular-img">
                                        <div class="circular-img-inner">
                                            <div class="circular-img-circle"></div>
                                            <img src="img/banner-img.png " alt="bai img">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="section-title m-0">
                                        <h2 class="title"> Sign Up Now </h2>
                                        <p class="sub-title">Experience the best</p>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </section> -->



    </div>
    <br>
    <br>

    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-1g-3">
                        <div class="footer-item">
                            <h3 class="footer-logo"><span>Ashesi</span>University</h3>
                            <!-- <ul>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
            </ul> -->
                        </div>
                    </div>
                    <div class="col-sm-6 col-1g-3">
                        <div class="footer-item">
                            <img class="cimg" src="img/image 1.png" style="max-width:10% 5px" alt="">


                        </div>
                    </div>







                </div>
            </div>
        </div>
        </div>
        </div>
        <div class="footer-bottom"></div>
    </footer>

    <!-- footer end -->

    <!-- style switcher start -->
    <div class="style-switcher js-style-switcher">
        <div class="style-switcher-toggler js-style-switcher-toggler">
            <i class="fa fa-cog"></i>
        </div>
        <h3>Style Switcher</h3>
        <div class="style-switcher-item">
            <p class="mb-2">Theme colors</p>
            <!-- theme colors -->
            <div class="theme-colors js-theme-colors">
                <button type="button" data-js-theme-color="color-1" class="js-theme-color-item color-1"></button>
                <button type="button" data-js-theme-color="color-2" class="js-theme-color-item color-2"></button>
                <button type="button" data-js-theme-color="color-3" class="js-theme-color-item color-3"></button>
                <button type="button" data-js-theme-color="color-4" class="js-theme-color-item color-4"></button>
                <button type="button" data-js-theme-color="color-5" class="js-theme-color-item color-5"></button>
            </div>
        </div>

        <div class="style-switcher-item">
            <div class="form-check form-switch">
                <input class="form-check-input js-dark-mode" type="checkbox" role="switch" id="dark-mode">
                <label class="form-check-label" for="dark-mode">Dark Mode</label>
            </div>
        </div>
        <div class="style-switcher-item">
            <div class="form-check form-switch">
                <input class="form-check-input js-glass-effect" type="checkbox" role="switch" id="glass-effect">
                <label class="form-check-label" for="glass-effect">Glass Effect</label>
            </div>
        </div>
    </div>








    <!-- style switcher end-->




    <!--wrapper end-->



    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
