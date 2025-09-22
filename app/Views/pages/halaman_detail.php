<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- breadcrumb-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::breadcrumb', ['title' => $halaman['judul_halaman'], 'active_page' => $halaman['judul_halaman']]) ?>
<!-- breadcrumb-area-end -->
<!-- inner-blog -->
<section class="inner-blog b-details-p pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-details-wrap">
                    <div class="details__content pb-30">
                        <h2><?= $halaman['judul_halaman']; ?></h2>
                        <div class="meta-info">
                            <ul>
                                <li><i class="fal fa-calendar-alt"></i> <?= lastUpdatedPost($halaman['updated_at']); ?></li>
                            </ul>
                        </div>
                        <?= $halaman['konten']; ?>
                    </div>
                    <div class="related__post mt-45 mb-85">
                        <div class="post-title">
                            <h4>Artikel Terbaru</h4>
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
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_phone') ?>
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_artikel', ['limit' => 4]) ?>
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