<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="min-height: 190px !important; background-image:url(/img/bg/bdrc-bg.jpg);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2>Karir</h2>
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Karir</li>
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
            <!-- #right side -->
            <div class="col-sm-12 col-md-12 col-lg-4">
                <aside class="sidebar-widget">
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_media') ?>
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_artikel', ['limit' => 4]) ?>
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_phone') ?>
                </aside>
            </div>
            <!-- #right side end -->
            <div class="col-lg-8">
                <div class="blog-details-wrap">
                    <div class="details__content pb-30">
                        <h2><?= $karir['karir']; ?></h2>
                        <div class="meta-info">
                            <ul>
                                <li><i class="fal fa-calendar-alt"></i> <?= lastUpdatedPost($karir['updated_at']); ?></li>
                            </ul>
                        </div>
                        <?= $karir['konten']; ?>
                        <!-- <div class="blog__btn"><a href="/karir/<?= $karir['slug']; ?>" class="btn">Apply Now!</a></div> -->
                    </div>
                    <div class="contact-bg02">
                        <div class="section-title center-align">
                            <h2>
                                Kirim Lamaran Kamu Sekarang
                            </h2>
                        </div>
                        <form action="" method="post" class="contact-form mt-30">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-name mb-20">
                                        <input type="text" id="firstn" name="firstn" placeholder="Nama Lengkap" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="text" id="email" name="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="text" id="phone" name="phone" placeholder="Nomor Telepon" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                        <input type="file" class="form-control" id="firstn" name="file" required>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-message mb-30">
                                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Pesan"></textarea>
                                    </div>
                                    <div class="slider-btn">
                                        <button class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s"><span>Kirim Sekarang</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        </div>
    </div>
</section>
<!-- inner-blog-end -->

<!-- brand-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::partner') ?>
<!-- brand-area-end -->
<?= $this->endSection(); ?>