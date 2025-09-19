<?php foreach ($karir as $row): ?>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5><?= $row['karir']; ?></h5>
                <p><?= substr(strip_tags($row['konten']), 0, 230); ?></p>
                <p class="card-text">
                    <span><?= lastUpdatedPost($row['updated_at']); ?></span> | <span><a href="<?= base_url('karir/').  $row['slug']; ?>" target="_blank"><?= base_url('karir/').  $row['slug']; ?></a></span></p>
            </div>
            <div class="card-body">
                <a href="/adm/karir/<?= $row['id'] ?>/edit" class="me-2 btn btn-sm btn-primary btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Data"><i class="bx bx-pencil me-0"></i></a>
                <a href="/adm/karir/<?= $row['id'] ?>/delete" class="me-2 btn btn-sm btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus Data"><i class="bx bx-trash me-0"></i></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>