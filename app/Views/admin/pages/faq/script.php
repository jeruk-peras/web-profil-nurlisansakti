<script>
    $(document).ready(async function() {
        await FetchData();
        refreshTooltips();
    });

    //load data
    async function FetchData(id = null) {
        const el = $('#render-data');

        try {
            const response = await fetch('/render/faq');
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
        $('#link').val('');
        $('#form-link').addClass('visually-hidden')
        $('#btn-simpan').attr('disabled', false).text('Simpan data');
    });

    // hendle save data
    $('#form-data').submit(async function(e) {
        e.preventDefault();
        var url, formData;
        url = $(this).attr('action');
        formData = $(this).serializeArray();
        $('#btn-simpan').attr('disabled', true).text('Menyimpan...');

        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: async function(response) {
                $('#form-data-modal').modal('hide');
                await FetchData();
                refreshTooltips();
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

    // hendle edit button
    $(document).on('click', '#data-render tbody tr td a.btn-edit', async function(e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            success: async function(response) {
                $('#form-data-modal').modal('show');
                $('#form-data').attr('action', url);
                await $.each(response.data, function(key, value) {
                    $('#' + key).val(value);
                });

            },
            error: function(xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                alertMesage(response.status, response.message);
            }
        });
    })

    // hendle delete button
    $(document).on('click', '#data-render tbody tr td a.btn-delete', async function(e) {
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
</script>