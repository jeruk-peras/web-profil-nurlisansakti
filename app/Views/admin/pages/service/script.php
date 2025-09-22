<script>
    // preview image
    $('#gambar').change(function() {
        const file = this.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function(event) {
                $('#image').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
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

    // hendle save data
    $('#form-data').submit(async function(e) {
        e.preventDefault();
        var url, formData;
        url = $(this).attr('action');
        var form = $(this)[0];
        formData = new FormData(form);
        $('#btn-simpan').attr('disabled', true).text('Menyimpan...');

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: async function(response) {
                $('#form-data-modal').modal('hide');
                await FetchSlider();
                refreshTooltips();
                $('#btn-simpan').attr('disabled', false).text('Simpan data');
                alertMesage(response.status, response.message);
            },
            error: function(xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                $('#form-data .form-control').removeClass('is-invalid');
                $('.invalid-feedback').text('');
                $('#btn-simpan').attr('disabled', false).text('Simpan data');
                $.each(response.data, function(key, value) {
                    $('#' + key).addClass('is-invalid');
                    $('#invalid_' + key).text(value).show();
                });
                alertMesage(response.status, response.message);
            }
        })
    })

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
</script>