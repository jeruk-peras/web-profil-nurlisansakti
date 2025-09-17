<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-2">
        <div class="breadcrumb-title pe-3">Kontak</div>
        <div class="ps-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Kontak</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
    </div>

    <div class="card radius-10">
        <div class="card-header border-0 bg-transparent">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Daftar Kontak</h6>
                </div>
                <div class="ms-auto"></div>
            </div>
        </div>
        <div class="card-body p-4">
            <form action="" method="post" id="form-data" autocomplete="off">
                <?= csrf_field(); ?>
                <!-- Alamat -->
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label>Alamat</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <textarea type="text" name="alamat" id="field-alamat" class="form-control mb-1" rows="3"><?= $alamat; ?></textarea>
                    </div>
                </div>
                <!-- Google Maps -->
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label>Google Maps</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <input value="<?= $google_maps; ?>" type="text" name="google_maps" id="field-google_maps" class="form-control mb-1" placeholder="Google Maps URL">
                        <small class="text-muted">Add your Google Maps URL. (https://goo.gl/maps/xyz123)</small>
                    </div>
                </div>
                <!-- Embed Google Maps -->
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label>Embed Google Maps</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <textarea type="text" name="embed_google_maps" id="field-embed_google_maps" class="form-control mb-1" rows="5" placeholder="Embed Google Maps URL"><?= $embed_google_maps; ?></textarea>
                        <small class="text-muted">Add your Google Maps embed URL. (https://www.google.com/maps/embed?pb=...)</small>
                    </div>
                </div>
                <!-- Email -->
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label>Email</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <input value="<?= $email; ?>" type="text" name="email" id="field-email" class="form-control mb-1">
                        <small class="text-muted">Add your email address. (e.g. example@abc.com)</small>
                    </div>
                </div>
                <!-- Telepon -->
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label>Telepon</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <input value="<?= $telepon; ?>" type="text" name="telepon" id="field-telepon" class="form-control mb-1">
                        <small class="text-muted">Add your phone number. (e.g. 021-12345678)</small>
                    </div>
                </div>
                <!-- WhatsApp -->
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label>WhatsApp</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <input value="<?= $whatsApp; ?>" type="text" name="whatsApp" id="field-whatsApp" class="form-control mb-1">
                        <small class="text-muted">Add your WhatsApp number. (e.g. 628123456789)</small>
                    </div>
                </div>
                <!-- youtube -->
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label>Youtube</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <input value="<?= $youtube; ?>" type="text" name="youtube" id="field-youtube" class="form-control mb-1">
                    </div>
                </div>
                <!-- instagram -->
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label>Instagram</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <input value="<?= $instagram; ?>" type="text" name="instagram" id="field-instagram" class="form-control mb-1">
                    </div>
                </div>
                <!-- Tiktok -->
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label>Tiktok</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <input value="<?= $tiktok; ?>" type="text" name="tiktok" id="field-tiktok" class="form-control mb-1">
                    </div>
                </div>
                <!-- Facebook -->
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label>Facebook</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <input value="<?= $facebook; ?>" type="text" name="facebook" id="field-facebook" class="form-control mb-1">
                    </div>
                </div>

                <!-- X -->
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 col-12">
                        <label>X</label>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">
                        <input value="<?= $x; ?>" type="text" name="x" id="field-x" class="form-control mb-1">
                    </div>
                </div>
                <!-- Button -->
                <div class="row">
                    <div class="offset-lg-3 col-lg-6 col-12">
                        <button type="submit" class="btn btn-primary">Simpan Kontak</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#form-data').submit(async function(e) {
        e.preventDefault();
        var url, formData;
        url = $(this).attr('action');
        formData = $(this).serializeArray();

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: async function(response) {
                alertMesage(response.status, response.message);
            },
            error: function(xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                alertMesage(response.status, response.message);
            }
        })
    })
</script>
<?= $this->endSection(); ?>