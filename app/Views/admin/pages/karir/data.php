<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-2">
        <div class="breadcrumb-title pe-3">Karir</div>
        <div class="ps-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item">Daftar Karir</li>
                    <li class="breadcrumb-item active" aria-current="page">Data Pelamar</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="/adm/karir/" class="btn btn-sm btn-primary"><i class="bx bx-arrow-back"></i> Kembali</a>
        </div>
    </div>

    <div class="card radius-10">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle mb-0" style="width: 100%;">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat Email</th>
                            <th>Nomor Telepon</th>
                            <th>File Upload</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody class="ui-sortable">
                        <?php $i = 1;
                        foreach ($data as $row): ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $row['nama_lengkap']; ?></td>
                                <td><?= $row['alamat_email']; ?></td>
                                <td><?= $row['nomor_telepon']; ?></td>
                                <td><a href="/uploads/karir/<?= $row['upload_file']; ?>" target="_blank" class="badge bg-primary">FILE</a></td>
                                <td>
                                    <a href="/adm/karir/<?= $row['id'] ?>/detail-data" class="me-2 btn btn-sm btn-primary btn-detail" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Detail"><i class="bx bx-info-circle me-0"></i></a>
                                    <a href="/adm/karir/<?= $row['id'] ?>/delete-data" class="me-2 btn btn-sm btn-danger btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Hapus Data"><i class="bx bx-trash me-0"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="pesan" class="form-label fw-medium required">Pesan</label>
                        <textarea name="pesan" class="form-control" rows="15" id="pesan" readonly disabled></textarea>
                        <div class="invalid-feedback" id="invalid_pesan"></div>
                    </div>
                    <div class="col-md-12">
                        <object data="" type="application/pdf" width="100%" height="800px">
                            <p>Unable to display PDF file. <a href="" download="" id="btn-download">Download</a> instead.</p>
                        </object>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.btn-detail').on('click', function() {
            var id = $(this).attr('href').split('/')[3];
            $.ajax({
                url: '/adm/karir/' + id + '/detail-data',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    response = response.data;
                    $('#pesan').val(response.pesan);
                    $('object').attr('data', '/uploads/karir/' + response.upload_file + '#toolbar=0');
                    $('#btn-download').attr('href', '/uploads/karir/' + response.upload_file);
                    $('#modal-detail').modal('show');
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            });
            return false;
        });

        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: "Apakah Anda yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                        },
                        success: async function(response) {
                            alertMesage(response.status, response.message);
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            var response = JSON.parse(xhr.responseText);
                            alertMesage(response.status, response.message);
                        }
                    });
                }
            });
        });

    });
</script>
<?= $this->endSection(); ?>