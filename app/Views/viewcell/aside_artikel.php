<section id="recent-posts-4" class="widget widget_recent_entries">
    <h2 class="widget-title">Recent Posts</h2>
    <ul>
        <?php foreach ($artikel as $row) : ?>
            <li>
                <a href="/artikel/<?= $row['slug']; ?>"><?= $row['judul_artikel']; ?> | </a>
                <span class="post-date"> <?= lastUpdatedPost($row['updated_at']); ?></span>
            </li>
        <?php endforeach; ?>
    </ul>
</section>