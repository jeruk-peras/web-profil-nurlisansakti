<header class="header-area header-three">
    <div class="header-top second-header d-none d-md-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 d-none d-lg-block">
                    <div class="header-cta">
                        <ul>
                            <li>
                                <i class="icon fal fa-envelope"></i>
                                <span>info@example.com</span>
                            </li>
                            <li>
                                <i class="icon fal fa-phone"></i>
                                <span>+91-7052-101-786</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 d-none d-lg-block text-right">
                    <div class="header-social">
                        <span>
                            <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" title="LinkedIn"><i class="fab fa-instagram"></i></a>
                            <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" title="Twitter"><i class="fab fa-youtube"></i></a>
                        </span>
                        <!--  /social media icon redux -->
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 d-none d-lg-block">
                    <a href="contact.html" class="top-btn">Appointment <i class="fal fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div id="header-sticky" class="menu-area">
        <div class="container">
            <div class="second-menu">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href="index.html"><img src="img/logo/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7">
                        <div class="main-menu text-center text-xl-right">
                            <?= view_cell('\App\Libraries\ViewCellLibrary::menu') ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                        <div class="right-menu">
                            <ul>
                                <li>
                                    <div class="menu-search text-right">
                                        <a href="#" class="menu-tigger"><i class="fas fa-search"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><img src="img/bg/top-m-icon.png" alt="top-m-icon.png"></div>
                                    <div class="text">
                                        <span>Call Now !</span>
                                        <strong>+91 705 210-1786</strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>