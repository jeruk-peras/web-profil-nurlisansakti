<script src="<?= base_url(); ?>assets/plugins/jquery-ui-1.14.1/jquery-ui.js"></script>
<script>
    $(document).ready(async function() {
        await FetchMenu();
        initSortable();
        FetchURL();
    });

    // sortable
    function initSortable() {
        $('#data-render tbody').sortable({
            update: function(event, ui) {
                $(this).children().each(function(index) {
                    if ($(this).attr('data-order') !== (index + 1)) {
                        $(this).attr('data-order', (index + 1)).addClass('new-posision')
                    }
                })
                savePosisiHendler();
            }
        });
    }

    function savePosisiHendler() {
        var baseURL = $('#data-render').attr('data-postURL')
        var posisi = []
        $('.new-posision').each(function() {
            posisi.push({
                id: $(this).attr('data-primary'),
                order: $(this).attr('data-order')
            })
            $(this).removeClass('new-posision')
        })

        $.ajax({
            url: baseURL,
            method: 'POST',
            data: {
                <?= csrf_token() ?>: '<?= csrf_hash() ?>',
                posisi
            },
            success: async function(respons) {
                await FetchMenu();
                initSortable();
            },
            error: function(xhr, status, error) {
                var response = JSON.parse(xhr.responseText);
                alertMesage(response.status, response.message);
                setTimeout(function() {
                    window.location.reload();
                }, 800)
            }
        })
    }

    //load data
    async function FetchMenu(id = null) {
        const el = $('#render-data');

        var url = $('#form-data').attr('data-parent');
        url = url ? '/' + url : '';

        try {
            const response = await fetch('/render/menu' + url);
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

    // hendle url link
    $('#url').change(function() {
        if ($(this).val() == 'link') {
            $('#form-link').removeClass('visually-hidden');
            return;
        }
        $('#link').val('');
        $('#form-link').addClass('visually-hidden')
    })

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
                await FetchMenu();
                initSortable();
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

                $('#new_tab').prop('checked', response.data.new_tab);
                if (response.data.url == 'link') $('#form-link').removeClass('visually-hidden');
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
                        await FetchMenu();
                        initSortable();
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

    // load url data
    async function FetchURL() {
        var url = $('#form-data').attr('data-parent');
        url = url > 0 ? '?lv=2' : '';

        const select = $('#url');
        select.empty();
        try {
            const response = await fetch('/api/url' + url);
            const data = await response.json();

            if (!response.ok) throw new Error(data.message);
            if (data && data.data) {
                data.data.forEach(item => {
                    select.append(`<option value="${item.url}">${item.name}</option>`);
                });
            }

        } catch (error) {
            console.error('Fetch error:', error);
            alertMesage('error', error.message);
        }
    }
</script>