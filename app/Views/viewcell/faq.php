<section id="faq" class="faq-area pt-120 pb-120">
    <div class="container">
        <div class="row justify-content-center align-content-center">
            <div class="col-lg-8 col-md-8">
                <div class="section-title mb-50">
                    <h5>FAQ</h5>
                    <h2 style="color: #00173c !important;">Frequently Asked Question</h2>
                </div>
                <div class="faq-wrap">
                    <div class="accordion" id="accordionExample">
                        <?php foreach ($faq as $row): ?>
                            <div class="card">
                                <div class="card-header" id="heading<?= $row['id']; ?>">
                                    <h2 class="mb-0">
                                        <button class="faq-btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $row['id']; ?>" aria-bs-expanded="true" aria-bs-controls="collapse<?= $row['id']; ?>">
                                            <?= $row['pertanyaan']; ?>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse<?= $row['id']; ?>" class="collapse" aria-labelledby="heading<?= $row['id']; ?>" data-bs-parent="#accordionExample">
                                    <div class="card-body">
                                        <?= $row['jawaban']; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>