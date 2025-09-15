<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-2">
        <div class="breadcrumb-title pe-3">FAQ</div>
        <div class="ps-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar FAQ</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
    </div>

    <div class="card radius-10">
        <div class="card-header border-0 bg-transparent">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Daftar FAQ</h6>
                </div>
                <div class="ms-auto">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#form-data-modal"><i class="bx bx-plus"></i> Tambah</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="render-data">
                <div class="text-center p-5">
                    <div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
                </div>
            </div>
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
            <form action="" method="post" id="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row g-3" id="form-menu">
                        <div class="col-md-12">
                            <label for="pertanyaan" class="form-label fw-medium required">Pertanyaan</label>
                            <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" placeholder="Pertanyaan">
                            <div class="invalid-feedback" id="invalid_pertanyaan"></div>
                        </div>
                        <div class="col-md-12">
                            <label for="jawaban" class="form-label fw-medium required">Jawaban</label>
                            <textarea type="text" name="jawaban" id="jawaban" class="form-control" rows="3" placeholder="Jawaban"></textarea>
                            <div class="invalid-feedback" id="invalid_jawaban"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

</script>
<?= $this->include('admin/pages/faq/script'); ?>
<?= $this->endSection(); ?>