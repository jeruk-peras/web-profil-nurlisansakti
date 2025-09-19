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
                    <li class="breadcrumb-item active" aria-current="page">Form Karir</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="/adm/karir/" class="btn btn-sm btn-primary"><i class="bx bx-arrow-back"></i> Kembali</a>
        </div>
    </div>

    <div class="card radius-10">
        <div class="card-body">
            <form action="" method="post" id="form-data" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="karir" class="form-label fw-medium required">Karir</label>
                        <input type="text" name="karir" id="karir" class="form-control" value="<?= $data['karir'] ?? ''; ?>">
                        <div class="invalid-feedback" id="invalid_karir"></div>
                    </div>
                    <div class="col-md-12">
                        <textarea name="konten" class="form-control tinymce" rows="6" id="konten"><?= $data['konten'] ?? ''; ?></textarea>
                        <div class="invalid-feedback" id="invalid_konten"></div>
                    </div>
                    <div class="col-md-12">
                        <label for="deskripsi" class="form-label fw-medium ">Deskripsi (opsional)</label>
                        <textarea name="deskripsi" class="form-control" rows="2" id="deskripsi"><?= $data['deskripsi'] ?? ''; ?></textarea>
                        <div class="invalid-feedback" id="invalid_deskripsi"></div>
                    </div>
                    <div class="col-md-12">
                        <label for="kata_kunci" class="form-label fw-medium">Kata Kunci (opsional)</label>
                        <textarea name="kata_kunci" class="form-control" rows="2" id="kata_kunci"><?= $data['kata_kunci'] ?? ''; ?></textarea>
                        <div class="invalid-feedback" id="invalid_kata_kunci"></div>
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->include('admin/layout/tinymce'); ?>
<script>
    // hendle save data
    $('#form-data').submit(async function(e) {
        e.preventDefault();

        if (typeof tinymce !== 'undefined') {
            tinymce.triggerSave();
        }

        var url, formData;
        url = $(this).attr('action');
        var form = $(this)[0];
        formData = new FormData(form);
        $('#btn-simpan').attr('disabled', true).text('Menyimpan...');

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: async function(response) {
                alertMesage(response.status, response.message);
                window.location.href = '/adm/karir';
            },
            error: function(xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                $('#form-data .form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');
                $('#btn-simpan').attr('disabled', false).text('Simpan data');
                $.each(response.data, function(key, value) {
                    $('#' + key).addClass('is-invalid');
                    $('#invalid_' + key).text(value).show();
                });
                alertMesage(response.status, response.message);
            }
        })
    })
</script>
<?= $this->endSection(); ?>