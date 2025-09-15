<div class="brand-area pt-60 pb-60" style="background-color: #0c2957;">
    <div class="container">
        <div class="row brand-active">
            <?php foreach($partner as $row): ?>
            <div class="col-xl-2">
                <div class="single-brand">
                    <img src="/images/partner/<?= $row['gambar']; ?>" style="width:120px; height:120px; padding: 10px; object-fit:contain; background:#fff; border-radius:8px;" alt="<?= $row['partner']; ?>">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>