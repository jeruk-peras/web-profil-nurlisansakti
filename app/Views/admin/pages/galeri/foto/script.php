<script>
    let cropper;

    $('#form-data-modal').on('hidden.bs.modal', function() {
        if (cropper) {
            cropper.destroy();
        }

    });
    // set cropper saat input file berubah
    $('#gambar').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const url = URL.createObjectURL(file);
            $('#image').attr('src', url);

            if (cropper) {
                cropper.destroy();
            }

            cropper = new Cropper(document.getElementById('image'), {
                aspectRatio: 1.5 / 1,
                viewMode: 1,
                dragMode: 'none',
                zoomable: true,
                scalable: true,
                rotatable: false,
                cropBoxResizable: false,
                cropBoxMovable: true
            });
        }
    });

    // tombol crop dan upload
    $('#cropButton').on('click', function() {
        if (!cropper) {
            const form = $('#form-data');
            const data = form.serializeArray();
            const url = form.attr('action');
            $.ajax({
                url: url,
                method: 'POST',
                data: data,
                success: async function(response) {
                    alertMesage(response.status, response.message);
                    $('#form-data-modal').modal('hide');
                    await FetchData();
                    refreshTooltips();
                },
                error: function(xhr, status, error) {
                    var response = JSON.parse(xhr.responseText);
                    $.each(response.data, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#invalid_' + key).text(value).show();
                    });
                    alertMesage(response.status, response.message);
                }
            });

            return;
        };

        const imageData = cropper.getImageData();
        const cropBoxData = cropper.getCropBoxData();

        // Hitung skala asli terhadap canvas
        const scaleX = imageData.naturalWidth / imageData.width;
        const scaleY = imageData.naturalHeight / imageData.height;

        // Ukuran asli hasil crop
        const actualWidth = cropBoxData.width * scaleX;
        const actualHeight = cropBoxData.height * scaleY;

        const canvas = cropper.getCroppedCanvas({
            width: actualWidth,
            height: actualHeight
        });

        canvas.toBlob(function(blob) {
            const url = $('#form-data').attr('action');
            const formData = new FormData();
            formData.append('<?= csrf_token() ?>', '<?= csrf_hash() ?>');
            formData.append('gambar', blob, 'cropped-image.png');
            formData.append('kategori_id', $('#kategori_id').val());

            $.ajax({
                url: url,
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: async function(response) {
                    alertMesage(response.status, response.message);
                    $('#form-data-modal').modal('hide');
                    await FetchData();
                    refreshTooltips();
                },
                error: function(xhr, status, error) {
                    var response = JSON.parse(xhr.responseText);
                    $.each(response.data, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#invalid_' + key).text(value).show();
                    });
                    alertMesage(response.status, response.message);
                }
            });
        });
    });

    $(document).ready(async function() {
        await FetchData();
        refreshTooltips();
        FetchKategori();
    });

    //load data
    async function FetchData() {
        const el = $('#render-data');

        try {
            const response = await fetch('/render/foto');
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

                $('#kategori_id').val(response.data.kategori_id);
                $('#image').attr('src', response.data.gambar);
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
                        await FetchData();
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

    // load kategori   data
    async function FetchKategori() {
        const select = $('#kategori_id');
        select.empty();
        try {
            const response = await fetch('/api/kategori');
            const data = await response.json();

            if (!response.ok) throw new Error(data.message);
            if (data && data.data) {
                data.data.forEach(item => {
                    select.append(`<option value="${item.id}">${item.kategori}</option>`);
                });
            }

        } catch (error) {
            console.error('Fetch error:', error);
            alertMesage('error', error.message);
        }
    }
</script>