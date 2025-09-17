<?php
 foreach ($artikel as $row): ?>
    <div class="col">
        <div class="card">
            <img src="/images/artikel/<?= $row['gambar']; ?>" class="card-img-top" alt="artikel Image" loading="lazy">
            <div class="card-body">
                <h2><?= $row['judul_artikel']; ?></h2>
                <p><?= substr(strip_tags($row['konten']), 0, 300); ?></p>
                <p class="card-text">
                    <span><?= $row['penulis']; ?></span> | <span><?= lastUpdatedPost($row['updated_at']); ?></span>
                </p>
            </div>
            <div class="card-body">
                <a href="/adm/artikel/<?= $row['id'] ?>/edit" class="me-2 btn btn-sm btn-primary btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Data"><i class="bx bx-pencil me-0"></i></a>
                <a href="/adm/artikel/<?= $row['id'] ?>/delete" class="me-2 btn btn-sm btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus Data"><i class="bx bx-trash me-0"></i></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>