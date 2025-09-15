<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="<?= base_url(); ?>assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">ADMIN WEB</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-menu'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="<?= base_url('dashboard'); ?>">
                <div class="parent-icon"><i class='bx bx-home-alt'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-customize"></i></div>
                <div class="menu-title">Manajemen Menu</div>
            </a>
            <ul class="mm-collapse">
                <li><a href="<?= base_url('adm/menu'); ?>"><i class='bx bx-radio-circle'></i>Data Menu</a></li>
                <li><a href="<?= base_url('material-mixing'); ?>"><i class='bx bx-radio-circle'></i>Data Halaman</a></li>
            </ul>
        </li>

        <li>
            <a href="<?= base_url('unit'); ?>">
                <div class="parent-icon"><i class='bx bx-news'></i></div>
                <div class="menu-title">Artikel</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-box"></i></div>
                <div class="menu-title">Web Konten</div>
            </a>
            <ul class="mm-collapse">
                <li><a href="<?= base_url('adm/slider'); ?>"><i class='bx bx-radio-circle'></i>Slider</a></li>
                <li><a href="<?= base_url('adm/service'); ?>"><i class='bx bx-radio-circle'></i>Service</a></li>
                <li><a href="<?= base_url('adm/bisnis-produk'); ?>"><i class='bx bx-radio-circle'></i>Bisnis Produk</a></li>
                <li><a href="<?= base_url('adm/partner'); ?>"><i class='bx bx-radio-circle'></i>Partner</a></li>
                <li><a href="<?= base_url('adm/faq'); ?>"><i class='bx bx-radio-circle'></i>FAQ</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-photo-album"></i></div>
                <div class="menu-title">Galeri</div>
            </a>
            <ul class="mm-collapse">
                <li><a href="<?= base_url('material'); ?>"><i class='bx bx-radio-circle'></i>Kategori</a></li>
                <li><a href="<?= base_url('material'); ?>"><i class='bx bx-radio-circle'></i>Foto</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Karir</div>
            </a>
            <ul class="mm-collapse">
                <li><a href="<?= base_url('material'); ?>"><i class='bx bx-radio-circle'></i>Data</a></li>
                <li><a href="<?= base_url('material'); ?>"><i class='bx bx-radio-circle'></i>Apply</a></li>
            </ul>
        </li>

        <li>
            <a href="<?= base_url('inventory/assets'); ?>">
                <div class="parent-icon"><i class='bx bx-phone-call'></i></div>
                <div class="menu-title">Kontak</div>
            </a>
        </li>

        <li>
            <a href="javascript:;">
                <div class="parent-icon"><i class="bx bx-user-circle"></i></div>
                <div class="menu-title">Manajemen User</div>
            </a>
        </li>
        <!--end navigation-->
</div>