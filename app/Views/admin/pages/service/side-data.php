<?php foreach ($service as $row): ?>
    <div class="col">
        <div class="card p-3">
            <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img src="/images/service/<?= $row['gambar']; ?>" class="card-img" alt="Slider Image" loading="lazy">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['service']; ?></h5>
                        <p class="card-text"><?= $row['konten']; ?></p>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <a href="/adm/service/<?= $row['id'] ?>/edit" class="me-2 btn btn-sm btn-primary btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Data"><i class="bx bx-pencil me-0"></i></a>
                    <a href="/adm/service/<?= $row['id'] ?>/delete" class="me-2 btn btn-sm btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus Data"><i class="bx bx-trash me-0"></i></a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>