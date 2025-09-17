<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-2">
        <div class="breadcrumb-title pe-3">Artikel</div>
        <div class="ps-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Artikel</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="/adm/artikel/add" class="btn btn-sm btn-primary"><i class="bx bx-plus"></i> Tambah</a>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2" id="render-data">
        <div class="col-12 text-end mt-3">
            <div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
        </div>
    </div>
</div>
<?= $this->include('admin/pages/artikel/script'); ?>
<?= $this->endSection(); ?>