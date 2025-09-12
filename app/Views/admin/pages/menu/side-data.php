<table class="table table-hover align-middle mb-0" id="data-render" style="width: 100%;" data-postURL="<?= base_url('adm/menu/order-data'); ?>">
    <thead class="table-light">
        <tr>
            <th>No</th>
            <th>#</th>
            <th>Menu</th>
            <th>URL</th>
            <th>Pulish</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1;  ?>
        <?php foreach ($menu as $row): ?>
            <tr data-primary="<?= $row['id']; ?>" data-order="<?= $row['order']; ?>">
                <td><?= $i++; ?></td>
                <td>
                    <a href="/adm/menu/<?= $row['id']; ?>/edit" class="me-2 btn btn-sm btn-primary btn-edit" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Edit Data"><i class="bx bx-pencil me-0"></i></a>
                    <a href="/adm/menu/<?= $row['id']; ?>/delete" class="me-2 btn btn-sm btn-danger btn-delete" data-id-produk="' + data + '" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus Data"><i class="bx bx-trash me-0"></i></a>
                </td>
                <td><?= $row['nama_menu']; ?></td>
                <td><?= ($row['url'] == 'parent' ? '<a href="/adm/menu/'.$row['id'].'/submenu" class="badge bg-primary">--parent--</a>' : ($row['url'] == 'link' ? '<a href="' . $row['link'] . '" class="badge bg-primary">--link--</a>' : $row['url'])); ?></td>
                <td><?= $row['publish']; ?></td>
            </tr>
        <?php endforeach;  ?>
    </tbody>
</table>