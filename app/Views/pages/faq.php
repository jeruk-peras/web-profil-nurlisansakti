<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- breadcrumb-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::breadcrumb', ['title' => 'Frequently Asked Question', 'active_page' => 'FAQ']) ?>
<!-- breadcrumb-area-end -->
<!-- faq-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::faq') ?>
<!-- faq-area-end -->
<?= $this->endSection(); ?>