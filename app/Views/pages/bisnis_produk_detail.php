<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="min-height: 190px !important; background-image:url(/img/bg/bdrc-bg.jpg);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2><?= $bisnis_produk['bisnis_produk']; ?></h2>
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Bisnis Produk</li>
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
<!-- service-details-area -->
<div class="about-area5 about-p p-relative">
    <div class="container pt-120 pb-90">
        <div class="row">
            <!-- #right side -->
            <div class="col-sm-12 col-md-12 col-lg-4 order-1">
                <aside class="sidebar services-sidebar">

                    <!-- Category Widget -->
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_bisnis_produk') ?>
                    
                    <!--Service Contact-->
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_phone') ?>
                </aside>
            </div>
            <!-- #right side end -->


            <div class="col-lg-8 col-md-12 col-sm-12 order-2">
                <div class="service-detail">

                    <div class="content-box">
                        <?= $bisnis_produk['konten']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service-details-area-end -->
<?= $this->endSection(); ?>