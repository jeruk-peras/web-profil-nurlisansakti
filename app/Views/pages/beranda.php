<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- search-popup -->
<div class="modal fade bs-example-modal-lg search-bg popup1" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content search-popup">
            <div class="text-center">
                <a href="#" class="close2" data-dismiss="modal" aria-label="Close">× close</a>
            </div>
            <div class="row search-outer">
                <div class="col-md-11"><input type="text" placeholder="Search for products..." /></div>
                <div class="col-md-1 text-right"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
            </div>
        </div>
    </div>
</div>
<!-- /search-popup -->

<!-- slider-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::slider') ?>
<!-- slider-area-end -->

<!-- service-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::service') ?>
<!-- service-details2-area-end -->

<!-- services-five-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::bisnis_produk') ?>
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

<!-- faq-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::faq', ['limit' => 5]) ?>
<!-- faq-area-end -->

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
<?= $this->endSection(); ?>