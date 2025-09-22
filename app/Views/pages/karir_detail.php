<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- breadcrumb-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::breadcrumb', ['title' => $karir['karir'], 'active_page' => 'Karir', 'img' => '/img/bg/bdrc-bg1.jpg']) ?>
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
                    </div>
                    <div class="contact-bg02">
                        <div class="section-title center-align">
                            <h2>
                                Kirim Lamaran Kamu Sekarang
                            </h2>
                        </div>
                        <?= validation_list_errors(); ?>
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <form action="" method="post" class="contact-form mt-30" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-name mb-20">
                                        <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= old('nama_lengkap'); ?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="email" id="alamat_email" name="alamat_email" placeholder="Email" value="<?= old('alamat_email'); ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="text" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon" value="<?= old('nomor_telepon'); ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <input type="file" class="form-control" id="upload_file" name="upload_file" required>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-message mb-30">
                                        <textarea name="pesan" id="pesan" cols="30" rows="10" placeholder="Pesan"><?= old('pesan'); ?></textarea>
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