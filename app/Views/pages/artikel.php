<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- breadcrumb-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::breadcrumb', ['title' => 'Artikel', 'active_page' => 'Artikel']) ?>
<!-- breadcrumb-area-end -->
<!-- inner-blog -->
<section class="inner-blog pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <?php foreach ($artikel as $row) : ?>
                    <div class="bsingle__post mb-50">
                        <div class="bsingle__post-thumb">
                            <a href="/artikel/<?= $row['slug']; ?>"><img src="/images/artikel/<?= $row['gambar']; ?>" alt="img" loading="lazy"></a>
                        </div>
                        <div class="bsingle__content">
                            <div class="meta-info">
                                <ul>
                                    <li><i class="fal fa-user"></i> <?= $row['penulis']; ?></li>
                                    <li><i class="fal fa-calendar-alt"></i> <?= lastUpdatedPost($row['updated_at']); ?></li>
                                </ul>
                            </div>
                            <h2><a href="/artikel/<?= $row['slug']; ?>"><?= $row['judul_artikel'] ?></a></h2>
                            <p><?= substr(strip_tags($row['konten']), 0, 300); ?>..</p>
                            <div class="blog__btn"><a href="/artikel/<?= $row['slug']; ?>" class="btn">Read More</a></div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if ($page > 0):  ?>
                    <div class="pagination-wrap mb-50">
                        <nav>
                            <ul class="pagination">
                                <?php for ($i = 0; $i <= $page; $i++):  ?>
                                    <li class="page-item <?= (request()->getGet('page') == $i + 1 ? 'active' : ((request()->getGet('page') == null && $i == 0) ? 'active' : '')); ?>"><a href="?page=<?= $i + 1; ?>"><?= $i + 1; ?></a></li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                <?php endif;  ?>
            </div>
            <!-- #right side -->
            <div class="col-sm-12 col-md-12 col-lg-4">
                <aside class="sidebar-widget">
                    <section id="search-3" class="widget widget_search">
                        <h2 class="widget-title">Search</h2>
                        <form role="search" method="get" class="search-form" action="http://wordpress.zcube.in/finco/">
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="search-field" placeholder="Search &hellip;" value="" name="s" />
                            </label>
                            <input type="submit" class="search-submit" value="Search" />
                        </form>
                    </section>
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_media') ?>
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_artikel', ['limit' => 4]) ?>
                    <?= view_cell('\App\Libraries\ViewCellLibrary::aside_phone') ?>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- inner-blog-end -->

<!-- brand-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::partner') ?>
<!-- brand-area-end -->
<?= $this->endSection(); ?>