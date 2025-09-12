<?= $this->extend('admin/layout/index'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-2">
        <div class="breadcrumb-title pe-3"><?= $page; ?></div>
        <div class="ps-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Daftar Menu</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
    </div>

    <div class="card radius-10">
        <div class="card-header border-0 bg-transparent">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Daftar Menu</h6>
                </div>
                <div class="ms-auto">
                    <?= $page == 'Submenu' ? '<a href="/adm/menu" class="btn btn-sm btn-primary"><i class="bx bx-left-arrow-alt"></i> Kembali</a>' : ''; ?>
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
            <form action="" method="post" id="form-data" data-parent="<?= $menu_id ?? 0; ?>">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="row g-3" id="form-menu">
                        <div class="col-md-12">
                            <label for="nama_menu" class="form-label fw-medium required">Nama Menu</label>
                            <input type="text" name="nama_menu" id="nama_menu" class="form-control" placeholder="Nama Menu">
                            <div class="invalid-feedback" id="invalid_nama_menu"></div>
                        </div>
                        <div class="col-md-12">
                            <label for="url" class="form-label fw-medium required">URL</label>
                            <select name="url" id="url" class="form-select"></select>
                            <div class="invalid-feedback" id="invalid_url"></div>
                        </div>
                    </div>
                    <div class="row g-3 mt-2 visually-hidden" id="form-link">
                        <div class="col-md-9">
                            <label for="link" class="form-label fw-medium required">Link</label>
                            <input type="text" name="link" id="link" class="form-control" placeholder="https://excample.com">
                            <div class="invalid-feedback" id="invalid_link"></div>
                        </div>
                        <div class="col-md-3">
                            <label for="url" class="form-label fw-medium">&nbsp;</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" name="new_tab" type="checkbox" id="new_tab">
                                <label class="form-check-label" for="new_tab">New Tab</label>
                            </div>
                            <div class="invalid-feedback" id="invalid_url"></div>
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
<?= $this->include('admin/pages/menu/script'); ?>
<?= $this->endSection(); ?>