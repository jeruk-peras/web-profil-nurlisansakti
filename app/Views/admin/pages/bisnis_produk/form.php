<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-2">
        <div class="breadcrumb-title pe-3">Binis Produk</div>
        <div class="ps-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item">Daftar Binis Produk</li>
                    <li class="breadcrumb-item active" aria-current="page">Form Bisnis Produk</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="/adm/bisnis-produk/" class="btn btn-sm btn-primary"><i class="bx bx-arrow-back"></i> Kembali</a>
        </div>
    </div>

    <div class="card radius-10">
        <div class="card-body">
            <form action="" method="post" id="form-data" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="bisnis_produk" class="form-label fw-medium required">Binis Produk</label>
                        <input type="text" name="bisnis_produk" id="bisnis_produk" class="form-control" value="<?= $data['bisnis_produk'] ?? ''; ?>">
                        <div class="invalid-feedback" id="invalid_bisnis_produk"></div>
                    </div>
                    <div class="col-md-12">
                        <label for="gambar" class="form-label fw-medium">Gambar</label>
                        <input type="file" name="gambar" id="gambar" accept="image/*" class="form-control">
                        <div class="invalid-feedback" id="invalid_gambar"></div>
                    </div>
                    <div class="col-md-9 text-center">
                        <img id="image" src="<?= $data['gambar'] ?? ''; ?>" style="max-width: 100%;">
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
                        <button type="button" class="btn btn-primary" id="cropButton">Simpan Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->include('admin/layout/tinymce'); ?>
<script>
    $('#form-data').submit(function(e) {
        e.preventDefault();
    });

    let cropper;

    $('#form-data-modal').on('hidden.bs.modal', function() {
        if (cropper) {
            cropper.destroy();
        }

    });
    // set cropper saat input file berubah
    $('#gambar').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const url = URL.createObjectURL(file);
            $('#image').attr('src', url);

            if (cropper) {
                cropper.destroy();
            }

            cropper = new Cropper(document.getElementById('image'), {
                aspectRatio: 1.5 / 1,
                viewMode: 1,
                dragMode: 'none',
                zoomable: true,
                scalable: true,
                rotatable: false,
                cropBoxResizable: false,
                cropBoxMovable: true
            });
        }
    });

    // tombol crop dan upload
    $('#cropButton').on('click', function() {
        if (!cropper) {
            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }
            const form = $('#form-data');
            const data = form.serializeArray();
            const url = form.attr('action');
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success: async function(response) {
                    alertMesage(response.status, response.message);
                    window.location.href = "/adm/bisnis-produk";
                },
                error: function(xhr, status, error) {
                    var response = JSON.parse(xhr.responseText);
                    $.each(response.data, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#invalid_' + key).text(value).show();
                    });
                    alertMesage(response.status, response.message);
                }
            });

            return;
        };

        const imageData = cropper.getImageData();
        const cropBoxData = cropper.getCropBoxData();

        // Hitung skala asli terhadap canvas
        const scaleX = imageData.naturalWidth / imageData.width;
        const scaleY = imageData.naturalHeight / imageData.height;

        // Ukuran asli hasil crop
        const actualWidth = cropBoxData.width * scaleX;
        const actualHeight = cropBoxData.height * scaleY;

        const canvas = cropper.getCroppedCanvas({
            width: actualWidth,
            height: actualHeight
        });

        canvas.toBlob(function(blob) {
            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }

            const url = $('#form-data').attr('action');
            const formData = new FormData($('#form-data')[0]);
            formData.append('gambar', blob, 'cropped-image.png');

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: async function(response) {
                    alertMesage(response.status, response.message);
                    window.location.href = "/adm/bisnis-produk";
                },
                error: function(xhr, status, error) {
                    var response = JSON.parse(xhr.responseText);
                    $.each(response.data, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#invalid_' + key).text(value).show();
                    });
                    alertMesage(response.status, response.message);
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>