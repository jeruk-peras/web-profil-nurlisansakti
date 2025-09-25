<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<!-- breadcrumb-area -->
<?= view_cell('\App\Libraries\ViewCellLibrary::breadcrumb', ['title' => 'Traking Pengerjaan Mobil', 'active_page' => 'Tracking', 'img' => '/img/bg/bdrc-bg1.jpg']) ?>
<!-- breadcrumb-area-end -->

<section id="contact" class="contact-area after-none contact-bg pt-120 pb-120 p-relative fix">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-10 order-2">
                <div class="contact-bg02">
                    <div class="section-title center-align">
                        <h2>Cek Pengerjaan Mobil</h2>
                        <p class="text-muted">
                            Masukkan <strong>Nomor SPP</strong> dan <strong>Nomor Polisi</strong> untuk melihat status pengerjaan mobil Anda.
                        </p>
                    </div>
                    <form action="" method="post" id="form-trakig" class="contact-form mt-30">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="no_spp" id="no_spp" placeholder="Nomor SPP" required>
                                    <label for="no_spp">Nomor SPP</label>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="no_polisi" id="no_pol" placeholder="Nomor SPP" required>
                                    <label for="no_pol">Nomor Polisi</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="slider-btn">
                                    <button type="submit" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s"><span>Kirim</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-area after-none contact-bg pb-120 p-relative fix">
    <div class="container">

        <div class="row justify-content-center align-items-center" id="tracking-result" style="display: none;"></div>

    </div>
</section>

<script src="/js/vendor/jquery-3.6.0.min.js"></script>
<script>
    $('#form-trakig').submit(function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var formdata = $(this).serializeArray();

        $.ajax({
            url: url,
            type: 'POST',
            data: formdata,
            success: async function(response) {
                $('#tracking-result').html('<div class="text-center p-5"><div class="spinner-grow text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>').show();
                $('html, body').animate({ scrollTop: $("#tracking-result").offset().top  }, 500);
                setTimeout(() => {
                    $('#tracking-result').html(response.data.html).show();
                }, 1000);
            },
            error: function(xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                alert(response.status, response.message);
            }
        });
    })
</script>
<?= $this->endSection(); ?>