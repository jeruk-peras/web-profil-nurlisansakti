<?php foreach ($artikel as $row) : ?>
    <div class="col-lg-<?= $col ?> col-md-6">
        <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
            <div class="blog-thumb2">
                <a href="/artikel/<?= $row['slug']; ?>"><img src="/images/artikel/<?= $row['gambar']; ?>" alt="img" loading="lazy"></a>
            </div>
            <div class="blog-content2">
                <div class="b-meta">
                    <div class="meta-info">
                        <ul>
                            <li><i class="fal fa-user"></i> <?= $row['penulis']; ?></li>
                            <li><i class="fal fa-calendar-alt"></i> <?= lastUpdatedPost($row['updated_at']); ?></li>
                        </ul>
                    </div>
                </div>
                <h4><a href="/artikel/<?= $row['slug']; ?>"><?= substr($row['judul_artikel'], 0, 52); ?>..</a></h4>
                <p><?= substr(strip_tags($row['konten']), 0, 100); ?>..</p>
            </div>
        </div>
    </div>
<?php endforeach; ?>