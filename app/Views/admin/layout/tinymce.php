<style>
    div.tox-editor-header>div.tox-promotion {
        display: none;
    }
</style>

<script src="<?= base_url(); ?>assets/plugins/tinymce/tinymce.min.js"></script>
<script>
    $(document).ready(function() {
        // tyni mce
        tinymce.init({
            selector: 'textarea.tinymce',
            plugins: 'searchreplace autolink image directionality code visualchars fullscreen link media codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount charmap accordion ',
            menubar: 'file edit view  format tools table ',
            toolbar: "fontsize | align numlist bullist | bold italic underline lineheight | image link table forecolor backcolor removeformat | code fullscreen preview",
            line_height_formats: '0 1 1.2 1.4 1.6 2',
            height: 600,
            images_upload_url: '/api/upload-file',
            images_upload_base_path: '',
            automatic_uploads: true,
            file_picker_types: 'image',
            relative_urls: false,
            remove_script_host: false,
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
        });
    });
</script>