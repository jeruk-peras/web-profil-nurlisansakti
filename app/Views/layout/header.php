<header class="header-area header-three">

    <div id="header-sticky" class="menu-area">
        <div class="container">
            <div class="second-menu">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2">
                        <div class="logo">
                            <a href=""><img src="/img/logo/logo.png" alt="logo"></a>
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
                                    <a href="https://wa.me/<?= getKontak('whatsapp'); ?>" title="Call now">
                                        <div class="icon"><img src="/img/bg/top-m-icon.png" alt="top-m-icon.png"></div>
                                        <div class="text">
                                            <span>Call Now !</span>
                                            <strong>
                                                <?= getKontak('telepon') ? getKontak('telepon') : getKontak('whatsapp'); ?>
                                            </strong>
                                        </div>
                                    </a>
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