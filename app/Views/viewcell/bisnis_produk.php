<section id="services-05" class=" pb-100 p-relative">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="section-title center-align mb-50 text-left">
                    <h2>Bisnis Produk</h2>
                </div>
            </div>
            <?php foreach ($bisnis_produk as $row): ?>
                <div class="col-lg-4 col-md-4">
                    <div class="services-box-05">
                        <div class="services-icon-05">
                            <img src="images/bisnis_produk/<?= $row['gambar']; ?>" alt="<?= $row['bisnis_produk']; ?>">
                        </div>
                        <div class="services-content-05">
                            <h3><a href="/bisnis-produk/<?= $row['slug']; ?>"><?= $row['bisnis_produk']; ?></a></h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>