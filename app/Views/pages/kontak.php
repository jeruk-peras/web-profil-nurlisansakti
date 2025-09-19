<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="min-height: 190px !important; background-image:url(/img/bg/bdrc-bg.jpg);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2>Kontak</h2>
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- contact-area -->
<section id="contact" class="contact-area after-none contact-bg pt-120 pb-120 p-relative fix">
    <div class="container">

        <div class="row justify-content-center align-items-center">

            <div class="col-lg-5 order-1">

                <div class="contact-info">
                    <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                        <a href="<?= getKontak('google_maps'); ?>">
                            <div class="f-cta-icon">
                                <i class="far fa-map"></i>
                            </div>
                            <div>
                                <h5>Alamat</h5>
                                <p><?= getKontak('alamat'); ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                        <div class="f-cta-icon">
                            <i class="far fa-phone"></i>
                        </div>
                        <h5>Telepon</h5>
                        <a href=""><p><?= getKontak('telepon') ?? ''; ?></p></a>
                        <a href="https://wa.me/<?= getKontak('whatsapp'); ?>"><p><?= getKontak('whatsapp'); ?></p></a>
                    </div>
                    <div class="single-cta wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                        <div class="f-cta-icon">
                            <i class="far fa-envelope-open"></i>
                        </div>
                        <h5>Email</h5>
                        <p> <a href="mailto:<?= getKontak('email'); ?>"><?= getKontak('email'); ?></a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 order-2">
                <?= getKontak('embed_google_maps'); ?>
            </div>
        </div>

    </div>

</section>
<!-- contact-area-end -->

<!-- brand-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::partner') ?>
<!-- brand-area-end -->
<?= $this->endSection(); ?>