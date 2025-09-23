
<table class="table table-hover align-middle mb-0" id="data-render" style="width: 100%;">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>#</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;  ?>
        <?php foreach ($user as $row): ?>
            <tr>
                <td><?= $i++; ?></td>
                <td>
                    <a href="/adm/user/<?= $row['id'] ?>/edit" class="me-2 btn btn-sm btn-primary btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Data"><i class="bx bx-pencil me-0"></i></a>
                    <a href="/adm/user/<?= $row['id'] ?>/edit-password" class="me-2 btn btn-sm btn-primary btn-pass" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Ubah Password"><i class="bx bx-lock me-0"></i></a>
                    <a href="/adm/user/<?= $row['id'] ?>/delete" class="me-2 btn btn-sm btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus Data"><i class="bx bx-trash me-0"></i></a>
                </td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['role']; ?></td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>