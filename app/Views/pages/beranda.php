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
<?= view_cell('\App\Libraries\ViewCellLibrary::galeri') ?>
<!-- gallery-area-end -->

<!-- blog-area -->
<section id="blog" class="blog-area p-relative fix pt-120 pb-90" style="background: #f7fafd;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="section-title center-align mb-50 text-start wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                    <h2>Artikel Terbaru</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?= view_cell('\App\Libraries\ViewCellLibrary::artikel', ['limit' => 6, 'col' => 4]) ?>
        </div>
    </div>
</section>
<!-- blog-area-end -->

<!-- faq-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::faq', ['limit' => 5]) ?>
<!-- faq-area-end -->

<!-- brand-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::partner') ?>
<!-- brand-area-end -->
<?= $this->endSection(); ?>