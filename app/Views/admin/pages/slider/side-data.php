<?php foreach ($slider as $row): ?>
    <div class="col">
        <div class="card">
            <img src="/images/slider/<?= $row['gambar']; ?>" class="card-img-top" alt="Slider Image" loading="lazy">
            <div class="card-body">
                <?= $row['konten']; ?>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href="/adm/slider/<?= $row['id'] ?>/edit" class="me-2 btn btn-sm btn-primary btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Data"><i class="bx bx-pencil me-0"></i></a>
                        <a href="/adm/slider/<?= $row['id'] ?>/delete" class="me-2 btn btn-sm btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus Data"><i class="bx bx-trash me-0"></i></a>
                    </div>
                    <div>
                        <a href="/adm/slider/<?= $row['id']; ?>/publish" class="me-2 badge <?= $row['publish'] ? 'bg-primary' : 'bg-warning'; ?> btn-publish" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="<?= $row['publish'] ? 'hide' : 'Publish'; ?>"><?= $row['publish'] ? 'publish' : 'hide'; ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>