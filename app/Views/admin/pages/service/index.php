<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-2">
        <div class="breadcrumb-title pe-3">Slider</div>
        <div class="ps-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Slider</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#form-data-modal"><i class="bx bx-plus"></i> Tambah</button>
        </div>
    </div>


    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3" id="render-data">
        <div class="col-12 text-end mt-3">
            <div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="form-data-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post" id="form-data" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="service" class="form-label fw-medium required">Service</label>
                            <input type="text" name="service" id="service" class="form-control">
                            <div class="invalid-feedback" id="invalid_service"></div>
                        </div>
                        <div class="col-md-12">
                            <label for="gambar" class="form-label fw-medium required">Gambar Service</label>
                            <input type="file" name="gambar" id="gambar" accept="image/*" class="form-control">
                            <div class="invalid-feedback" id="invalid_gambar"></div>
                        </div>
                        <div class="col-md-12">
                            <img id="image" style="max-width: 100%;">
                        </div>
                        <div class="col-md-12">
                            <label for="konten" class="form-label fw-medium required">Konten</label>
                            <textarea name="konten" class="form-control" rows="6" id="konten"></textarea>
                            <div class="invalid-feedback" id="invalid_konten"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" >Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->include('admin/pages/service/script'); ?>
<?= $this->endSection(); ?>