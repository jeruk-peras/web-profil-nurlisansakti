<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
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
                        <div class="d-none" id="image_demo" style="width: 350px; margin-top: 30px;"></div>
                        <img class="<?= $data['gambar'] ?? 'd-none'; ?>" id="preview" src="<?= $data['gambar'] ?? ''; ?>" style="max-width: 100%;">
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
    // inisialisasi croppie
    $image_crop = $("#image_demo").croppie({
        enableExif: true,
        viewport: {
            width: 600, // contoh: 1.5 x 400
            height: 400, // jadinya 1.5 : 1
            type: "square", // atau "circle"
        },
        boundary: {
            width: 700,
            height: 500,
        },
    });

    $("#gambar").on("change", function() {
        var reader = new FileReader();
        reader.onload = function(event) {
            $image_crop
                .croppie("bind", {
                    url: event.target.result,
                })
                .then(function() {
                    console.log("jQuery bind complete");
                });
        };
        reader.readAsDataURL(this.files[0]);
        $("#image_demo").removeClass("d-none");
        $('#preview').addClass('d-none')
    });

    $("#cropButton").click(async function(event) {

        if (typeof tinymce !== 'undefined') {
            tinymce.triggerSave();
        }

        var url = $('#form-data').attr('action');
        var formData = $('#form-data').serializeArray();

        // kalau tidak ada file baru di #gambar
        if ($("#gambar")[0].files.length === 0) {
            // langsung submit form tanpa crop
            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                success: async function(response) {
                    alertMesage(response.status, response.message);
                    window.location.href = "/adm/bisnis-produk";
                },
            });
            return; // stop biar tidak lanjut ke croppie
        }

        $image_crop
            .croppie("result", {
                type: "canvas",
                size: {
                    width: 1500,
                    height: 1000
                }, // tetap rasio 1.5:1 tapi lebih tajam
                format: "png", // bisa "jpeg" atau "webp"
                quality: 1 // max quality
            })
            .then(async function(response) {

                formData.push({
                    name: 'gambar',
                    value: response
                });

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    success: async function(response) {
                        alertMesage(response.status, response.message);
                        window.location.href = "/adm/bisnis-produk";
                    },
                });
            });
    });
</script>
<?= $this->endSection(); ?>