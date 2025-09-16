<?php foreach ($galeri as $row): ?>
    <div class="col">
        <div class="card">
            <img src="/images/galeri/<?= $row['gambar']; ?>" class="card-img" alt="Image" loading="lazy">
            <div class="card-body">
                <h5 class="card-title"><?= $row['kategori']; ?></h5>
                <hr>
                <div class="d-flex align-items-center gap-2">
                    <a href="/adm/galeri/<?= $row['id'] ?>/edit" class="me-2 btn btn-sm btn-primary btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Data"><i class="bx bx-pencil me-0"></i></a>
                    <a href="/adm/galeri/<?= $row['id'] ?>/delete" class="me-2 btn btn-sm btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus Data"><i class="bx bx-trash me-0"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>