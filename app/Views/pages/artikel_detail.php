<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="min-height: 190px !important; background-image:url(/img/bg/bdrc-bg.jpg);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2>Artikel</h2>
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
<!-- inner-blog -->
<section class="inner-blog b-details-p pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-wrap">
                    <div class="details__content pb-30">
                        <h2><?= $artikel['judul_artikel']; ?></h2>
                        <div class="meta-info">
                            <ul>
                                <li><i class="fal fa-user"></i> <?= $artikel['penulis']; ?></li>
                                <li><i class="fal fa-calendar-alt"></i> <?= lastUpdatedPost($artikel['updated_at']); ?></li>
                            </ul>
                        </div>
                        <?= $artikel['konten']; ?>
                    </div>
                    <div class="related__post mt-45 mb-85">
                        <div class="post-title">
                            <h4>Recent Posts</h4>
                        </div>
                        <div class="row">
                            <?= view_cell('\App\Libraries\ViewCellLibrary::artikel', ['limit' => 2, 'col' => 6]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #right side -->
            <div class="col-sm-12 col-md-12 col-lg-4">
                <aside class="sidebar-widget">
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_media') ?>
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_artikel', ['limit' => 4]) ?>
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_phone') ?>
                </aside>
            </div>
            <!-- #right side end -->
        </div>
    </div>
</section>
<!-- inner-blog-end -->

<!-- brand-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::partner') ?>
<!-- brand-area-end -->
<?= $this->endSection(); ?>