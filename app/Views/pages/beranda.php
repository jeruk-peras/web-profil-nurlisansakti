<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Autozox - Car Repair Services HTML Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/dripicons.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <!-- header -->
    <?= $this->include('layout/header'); ?>
    <!-- header-end -->
    <!-- offcanvas-area -->
    <div class="offcanvas-menu">
        <span class="menu-close"><i class="fas fa-times"></i></span>
        <form role="search" method="get" id="searchform" class="searchform" action="http://wordpress.zcube.in/xconsulta/">
            <input type="text" name="s" id="search" value="" placeholder="Search" />
            <button><i class="fa fa-search"></i></button>
        </form>


        <div id="cssmenu3" class="menu-one-page-menu-container">
            <ul class="menu">
                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="index.html">Home</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="about.html">About Us</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="services.html">Services</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="pricing.html">Pricing </a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="team.html">Team </a></li>

                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="projects.html">Cases Study</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="blog.html">Blog</a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="contact.html">Contact</a></li>
            </ul>
        </div>

        <div id="cssmenu2" class="menu-one-page-menu-container">
            <ul id="menu-one-page-menu-12" class="menu">
                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#home"><span>+8 12 3456897</span></a></li>
                <li class="menu-item menu-item-type-custom menu-item-object-custom"><a href="#howitwork"><span>info@example.com</span></a></li>
            </ul>
        </div>
    </div>
    <div class="offcanvas-overly"></div>
    <!-- offcanvas-end -->
    <!-- main-area -->
    <main>
        <!-- slider-area -->
        <?= view_cell('\App\Libraries\ViewCellLibrary::slider') ?>
        <!-- slider-area-end -->
        
        <!-- service-area -->
        <?= view_cell('\App\Libraries\ViewCellLibrary::service') ?>
        <!-- service-details2-area-end -->

        <!-- about-area -->
        <section class="about-area about-p pb-120 p-relative fix">
            <div class="animations-01"><img src="img/bg/an-img-01.png" alt="an-img-01"></div>
            <div class="animations-02"><img src="img/bg/an-img-02.png" alt="contact-bg-an-01"></div>
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                            <img src="img/features/about_img_02.png" alt="img">
                            <div class="about-text second-about">
                                <span>25</span>
                                <p>Years of Experience</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-content s-about-content  wow fadeInRight  animated" data-animation="fadeInRight" data-delay=".4s">
                            <div class="about-title second-title pb-25">
                                <h5>About Company</h5>
                                <h2>Make your car feel like a brand new one</h2>
                            </div>
                            <p>Aliquam ac sem et diam iaculis efficitur. Morbi in enim odio. Nullam quis volutpat est, sed dapibus sapien. Cras condimentum eu velit id tempor. Curabitur purus sapien, cursus sed nisl tristique, commodo vehicula arcu.</p>
                            <p>Aliquam erat volutpat. Aliquam enim massa, sagittis blandit ex mattis, ultricies posuere sapien. Morbi a dignissim enim. Fusce elementum, augue in elementum porta, sapien nunc volutpat ex, a accumsan nunc lectus eu lectus.</p>
                            <div class="about-content3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="green">
                                            <li> 24 Month / 24,000km Nationwide Warranty monotone</li>
                                            <li> Curabitur dapibus nisl a urna congue, in pharetra urna accumsan.</li>
                                            <li> Customer Rewards Program and excellent technology</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-btn mt-20">
                                <a href="about.html" class="btn ss-btn smoth-scroll">Read More <i class="fal fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- services-five-area -->
        <section id="services-05" class="services-05 services-09 pt-100 pb-100 p-relative" style="background-image: url(img/bg/approch-bg.png); background-repeat: no-repeat; background-color: #f7fafd; background-size: contain; border-bottom: 1px solid #efefef; ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="section-title center-align mb-50 text-left">
                            <h5>Our Approch</h5>
                            <h2>
                                AUTO SERVICING
                            </h2>

                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="section-title center-align mb-50 text-left">
                            <p>Improve efficiency, leverage tech, and provide better customer experiences with the modern technology services available allover the world. </p>

                        </div>

                    </div>

                    <div class="col-lg-4 col-md-4">
                        <div class="services-box-05">

                            <div class="services-icon-05">
                                <img src="img/bg/services-01.png" alt="icon01">

                            </div>
                            <div class="services-content-05">
                                <span>Services</span>
                                <h4><a href="single-service.html">Performance Upgrades</a></h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="services-box-05">

                            <div class="services-icon-05">
                                <img src="img/bg/services-02.png" alt="icon01">
                            </div>
                            <div class="services-content-05">
                                <span>Services </span>
                                <h4><a href="single-service.html">Auto Car Repair</a></h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="services-box-05">

                            <div class="services-icon-05">
                                <img src="img/bg/services-03.png" alt="icon01">
                            </div>
                            <div class="services-content-05">
                                <span>Services </span>
                                <h4><a href="single-service.html">Crash Car Repair</a></h4>

                            </div>
                        </div>
                    </div>




                </div>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="services-text05">
                            <p>Stop wasting time and money on technology.</p>
                            <a href="#">Explore our company</a>
                        </div>

                    </div>
                    <div class="col-md-6 text-right"> <a href="#" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">Request Demo</a> </div>
                </div>


            </div>
        </section>
        <!-- services-three-area -->

        <!-- cta-area -->
        <section class="cta-area cta-bg pt-120 pb-120" style="background-image:url(img/bg/cta_bg02.png)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title cta-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                            <h3>Get Our Service</h3>
                            <h2>Get Premium Auto Car Service Feel Free To Contact Us.</h2>

                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="cta-btn s-cta-btn wow fadeInRight animated mt-30" data-animation="fadeInDown animated" data-delay=".2s">
                            <a href="about.html" class="btn ss-btn smoth-scroll">Get Started <i class="fal fa-angle-right"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- cta-area-end -->

        <!-- faq-area -->
        <section class="faq-area fix" style="background-color: #0c2957;">
            <div class="container">

                <div class="row align-items-center">

                    <div class="col-lg-6">
                        <div class="section-title mb-50">
                            <h5>FAQ</h5>
                            <h2>Frequently Asked Question</h2>
                        </div>
                        <div class="faq-wrap">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="faq-btn" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseThree" aria-bs-expanded="true" aria-bs-controls="collapseThree">
                                                Vivamus rhoncus ante a ipsum imperdiet ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse show" aria-bs-labelledby="headingThree"
                                        data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-bs-expanded="false" aria-bs-controls="collapseOne">
                                                Integer id dolor at nisi laoreet iaculis vitae ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo" aria-bs-expanded="false" aria-bs-controls="collapseTwo">
                                                Donec venenatis elit dignissim, posuere ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#headingFour" aria-bs-expanded="false" aria-bs-controls="headingFour">
                                                Curabitur varius, massa sit amet egestas ?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="headingFour" class="collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="faq-img text-right">
                            <img src="img/bg/faq-img.jpg" alt="img" class="img">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-aread-end -->

        <!-- gallery-area -->
        <section id="work" class="pt-120 pb-105">
            <div class="container mb-50">
                <div class="row align-items-end">
                    <div class="col-xl-5 col-lg-5">
                        <div class="section-title center-align ">
                            <h5>Our Work</h5>
                            <h2>
                                Latest Portfolio
                            </h2>

                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="my-masonry text-right">
                            <div class="button-group filter-button-group ">
                                <button class="active" data-filter="*">All</button>
                                <button data-filter=".financial">Car Towing </button>
                                <button data-filter=".banking">Motorcycle Towing </button>
                                <button data-filter=".insurance">Hail Damage </button>
                                <button data-filter=".family">Fire Insurance </button>
                                <button data-filter=".business">Flood Insurance </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="masonry-gallery-huge">
                            <div class="grid col2">

                                <div class="grid-item financial">
                                    <a class="popup-image" href="img/gallery/protfolio-img01.png">
                                        <figure class="gallery-image">
                                            <img src="img/gallery/protfolio-img01.png" alt="img" class="img">
                                        </figure>
                                    </a>

                                </div>

                                <div class="grid-item insurance">
                                    <a class="popup-image" href="img/gallery/protfolio-img03.png">
                                        <figure class="gallery-image">
                                            <img src="img/gallery/protfolio-img03.png" alt="img" class="img">
                                        </figure>
                                    </a>

                                </div>
                                <div class="grid-item family">
                                    <a class="popup-image" href="img/gallery/protfolio-img04.png">
                                        <figure class="gallery-image">
                                            <img src="img/gallery/protfolio-img04.png" alt="img" class="img">
                                        </figure>
                                    </a>
                                </div>
                                <div class="grid-item business">
                                    <a class="popup-image" href="img/gallery/protfolio-img05.png">
                                        <figure class="gallery-image">
                                            <img src="img/gallery/protfolio-img05.png" alt="img" class="img">
                                        </figure>
                                    </a>

                                </div>
                                <div class="grid-item financial">
                                    <a class="popup-image" href="img/gallery/protfolio-img06.png">
                                        <figure class="gallery-image">
                                            <img src="img/gallery/protfolio-img06.png" alt="img" class="img">
                                        </figure>
                                    </a>
                                </div>
                                <div class="grid-item banking">
                                    <a class="popup-image" href="img/gallery/protfolio-img02.png">
                                        <figure class="gallery-image">
                                            <img src="img/gallery/protfolio-img02.png" alt="img" class="img">
                                        </figure>
                                    </a>


                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
        <!-- gallery-area-end -->

        <!-- blog-area -->
        <section id="blog" class="blog-area p-relative fix pt-120 pb-90" style="background: #f7fafd;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                            <h5>Our Blog</h5>
                            <h2>
                                Latest Blog & News
                            </h2>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="blog-details.html"><img src="img/blog/inner_b1.jpg" alt="img"></a>
                            </div>
                            <div class="blog-content2">
                                <div class="b-meta">
                                    <div class="meta-info">
                                        <ul>
                                            <li><i class="fal fa-user"></i> Admin</li>
                                            <li><i class="fal fa-calendar-alt"></i> 24th March 2021</li>

                                        </ul>
                                    </div>
                                </div>
                                <h4><a href="blog-details.html">Cras accumsan nulla nec lacus ultricies placerat.</a></h4>
                                <p>Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissim ligula, nec tristique orci.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="blog-details.html"><img src="img/blog/inner_b2.jpg" alt="img"></a>
                            </div>
                            <div class="blog-content2">
                                <div class="b-meta">
                                    <div class="meta-info">
                                        <ul>
                                            <li><i class="fal fa-user"></i> Admin</li>
                                            <li><i class="fal fa-calendar-alt"></i> 24th March 2021</li>

                                        </ul>
                                    </div>
                                </div>
                                <h4><a href="blog-details.html">Dras accumsan nulla nec lacus ultricies placerat.</a></h4>
                                <p>Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissim ligula, nec tristique orci.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-post2 mb-30 hover-zoomin wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                            <div class="blog-thumb2">
                                <a href="blog-details.html"><img src="img/blog/inner_b3.jpg" alt="img"></a>
                            </div>
                            <div class="blog-content2">
                                <div class="b-meta">
                                    <div class="meta-info">
                                        <ul>
                                            <li><i class="fal fa-user"></i> Admin</li>
                                            <li><i class="fal fa-calendar-alt"></i> 24th March 2021</li>

                                        </ul>
                                    </div>
                                </div>
                                <h4><a href="blog-details.html">Seas accumsan nulla nec lacus ultricies placerat.</a></h4>
                                <p>Curabitur sagittis libero tincidunt tempor finibus. Mauris at dignissim ligula, nec tristique orci.</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- blog-area-end -->

        <!-- brand-area -->
        <div class="brand-area pt-60 pb-60" style="background-color:#e81c2e">
            <div class="container">
                <div class="row brand-active">
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="img/brand/b-logo1.png" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="img/brand/b-logo2.png" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="img/brand/b-logo3.png" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="img/brand/b-logo4.png" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="img/brand/b-logo5.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand-area-end -->
    </main>
    <!-- main-area-end -->

    <!-- footer -->
    <?= $this->include('layout/footer'); ?>
    <!-- footer-end -->

    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/paroller.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/js_isotope.pkgd.min.js"></script>
    <script src="js/imagesloaded.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.meanmenu.min.js"></script>
    <script src="js/parallax-scroll.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/element-in-view.js"></script>
    <script src="js/main.js"></script>
</body>

<!-- Mirrored from htmldemo.zcubethemes.com/autozox/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Sep 2025 04:02:01 GMT -->

</html>