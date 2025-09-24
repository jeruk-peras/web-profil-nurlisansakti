<script>
    // inisialisasi croppie
    $image_crop = $("#image_demo").croppie({
        enableExif: true,
        viewport: {
            width: 140, // contoh: 1.5 x 400
            height: 140, // jadinya 1.5 : 1
            type: "circle", // atau "circle"
        },
        boundary: {
            width: 150,
            height: 150,
        },
    });

    $("#gambar").on("change", function() {
        var reader = new FileReader();
        reader.onload = function(event) {
            $image_crop
                .croppie("bind", {
                    url: event.target.result,
                })
                .then(function() {
                    console.log("jQuery bind complete");
                });
        };
        reader.readAsDataURL(this.files[0]);
        $("#image_demo").removeClass("d-none");
        $('#preview').addClass('d-none')
    });

    $("#cropButton").click(async function(event) {
        var url = $('#form-data').attr('action');

        // kalau tidak ada file baru di #gambar
        if ($("#gambar")[0].files.length === 0) {
            // langsung submit form tanpa crop
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                    konten: $('#konten').val(),
                    service: $('#service').val(),
                    // gambar tidak dikirim → backend pakai gambar lama
                },
                success: async function(response) {
                    alertMesage(response.status, response.message);
                    await FetchSlider();
                    refreshTooltips();
                    $("#image_demo").addClass("d-none");
                    $('#form-data-modal').modal('hide');
                    $('#form-data').attr('action', '');
                },
            });
            return; // stop biar tidak lanjut ke croppie
        }

        $image_crop
            .croppie("result", {
                type: "canvas",
                size: {
                    width: 100,
                    height: 100
                }, // tetap rasio 1.5:1 tapi lebih tajam
                format: "png", // bisa "jpeg" atau "webp"
                quality: 1 // max quality
            })
            .then(async function(response) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                        konten: $('#konten').val(),
                        service: $('#service').val(),
                        gambar: response
                    },
                    success: async function(response) {
                        alertMesage(response.status, response.message);
                        await FetchSlider();
                        refreshTooltips();
                        $("#image_demo").addClass("d-none");
                        $('#form-data-modal').modal('hide');
                        $('#form-data').attr('action', '');
                    },
                });
            });
    });

    $(document).ready(async function() {
        await FetchSlider();
    });

    //load data
    async function FetchSlider() {
        const el = $('#render-data');

        try {
            const response = await fetch('/render/service');
            const data = await response.json();

            if (!response.ok) throw new Error(data.message);
            if (data && data.data) {

                el.html(data.data);
            }

        } catch (error) {
            console.error('Fetch error:', error);
            alertMesage('error', error.message);
        }
    }

    // katika modal di tutup
    $('#form-data-modal').on('hidden.bs.modal', function() {
        $('#form-data').attr('action', '');
        $('#form-data')[0].reset();
        $('#form-data .form-control').removeClass('is-invalid');
        $('.invalid-feedback').text('');
        $('#btn-simpan').attr('disabled', false).text('Simpan data');
    });

    // hendle edit button
    $(document).on('click', '#render-data .col a.btn-edit', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            success: function(response) {
                $('#form-data-modal').modal('show');
                $('#form-data').attr('action', url);

                $('#service').val(response.data.service);
                $('#konten').val(response.data.konten);
                $('#preview').removeClass('d-none');
                $('#preview').attr('src', response.data.gambar);
            },
            error: function(xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                alertMesage(response.status, response.message);
            }
        });
    })

    // hendle delete button
    $(document).on('click', '#render-data .col a.btn-delete', async function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        Swal.fire({
            title: 'Konfirmasi Hapus',
            text: "Apakah Anda yakin ingin menghapus data ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                    },
                    success: async function(response) {
                        await FetchSlider();
                        refreshTooltips();
                        alertMesage(response.status, response.message);
                    },
                    error: function(xhr, status, error) {
                        var response = JSON.parse(xhr.responseText);
                        alertMesage(response.status, response.message);
                    }
                });
            }
        });
    })

    // hendle publish button
    $(document).on('click', '#render-data .col a.btn-publish', async function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            success: async function(response) {
                await FetchSlider();
                refreshTooltips();
                alertMesage(response.status, response.message);
            },
            error: function(xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                alertMesage(response.status, response.message);
            }
        });
    })
</script>