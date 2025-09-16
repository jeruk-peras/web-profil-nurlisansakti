<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="min-height: 190px !important; background-image:url(/img/bg/bdrc-bg.jpg);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2>Galeri</h2>
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Galeri</li>
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

<!-- galeri-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::galeri') ?>
<!-- galeri-area-end -->

<!-- brand-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::partner') ?>
<!-- brand-area-end -->
<?= $this->endSection(); ?>