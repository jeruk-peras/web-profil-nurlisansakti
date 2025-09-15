
<table class="table table-hover align-middle mb-0" id="data-render" style="width: 100%;">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>#</th>
            <th>Partner</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;  ?>
        <?php foreach ($partner as $row): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td>
                    <a href="/adm/partner/<?= $row['id'] ?>/edit" class="me-2 btn btn-sm btn-primary btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Data"><i class="bx bx-pencil me-0"></i></a>
                    <a href="/adm/partner/<?= $row['id'] ?>/delete" class="me-2 btn btn-sm btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus Data"><i class="bx bx-trash me-0"></i></a>
                </td>
                <td><?= $row['partner']; ?></td>
                <td><img src="/images/partner/<?= $row['gambar']; ?>" alt="Image" loading="lazy"></td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>