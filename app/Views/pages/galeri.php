<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- breadcrumb-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::breadcrumb', ['title' => 'Galeri', 'active_page' => 'Galeri']) ?>
<!-- breadcrumb-area-end -->

<!-- galeri-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::galeri') ?>
<!-- galeri-area-end -->

<!-- brand-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::partner') ?>
<!-- brand-area-end -->
<?= $this->endSection(); ?>