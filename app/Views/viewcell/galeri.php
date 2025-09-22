<section id="work" class="pt-120 pb-105">
    <div class="container mb-50">
        <div class="row align-items-end">
            <div class="col-xl-5 col-lg-5">
                <div class="section-title center-align ">
                    <h2>Galeri</h2>
                    <a href="/galeri" class="text-decoration-underline">Lihat Semua Galeri &raquo;</a>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="my-masonry text-right">
                    <div class="button-group filter-button-group ">
                        <button class="active" data-filter="*">All</button>
                        <?php foreach ($kategori as $row): ?>
                            <button data-filter=".galeri-<?= $row['id'] ?>"><?= $row['kategori']; ?></button>
                        <?php endforeach;  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="masonry-gallery-huge">
                    <div class="grid col2">
                        <?php foreach ($galeri as $row): ?>
                            <div class="grid-item galeri-<?= $row['kategori_id'] ?>">
                                <a class="popup-image" href="/images/galeri/<?= $row['gambar']; ?>">
                                    <figure class="gallery-image">
                                        <img src="/images/galeri/<?= $row['gambar']; ?>" alt="Galeri" class="img">
                                    </figure>
                                </a>
                            </div>
                        <?php endforeach;  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>