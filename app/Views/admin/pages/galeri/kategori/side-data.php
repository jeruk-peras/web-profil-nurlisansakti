<table class="table align-middle mb-0" id="data-render" style="width: 100%;">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>#</th>
            <th>Kategori</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;  ?>
        <?php foreach ($kategori as $row): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td>
                    <a href="/adm/galeri/<?= $row['id']; ?>/edit-kategori" class="me-2 btn btn-sm btn-primary btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Data"><i class="bx bx-pencil me-0"></i></a>
                    <a href="/adm/galeri/<?= $row['id']; ?>/delete-kategori" class="me-2 btn btn-sm btn-danger btn-delete" data-id-produk="' + data + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus Data"><i class="bx bx-trash me-0"></i></a>
                </td>
                <td><?= $row['kategori']; ?></td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>