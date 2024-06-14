@props([
    'name' => '',
    'label' => '',
    'value' => '',
    'placeholder' => '',
    'link_upload' => '/upload',
])
<div>
    <div class="mb-4">
        <label for="input-{{ $name }}"
            class="block font-medium text-gray-700 dark:text-gray-100 mb-2">{{ $label }}</label>
        <textarea name="{{ $name }}" id="input-{{ $name }}">{!! $value == '' ? $placeholder : $value !!}</textarea>
    </div>
</div>

@push('additional-header')
    <script src="https://cdn.tiny.cloud/1/nowi8bd9wt41eu743pd257t2negt5d1evpjiln4f3zc10lkq/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#input-{{ $name }}',

            image_class_list: [{
                title: 'img-responsive',
                value: 'img-responsive'
            }, ],
            height: 500,
            setup: function(editor) {
                editor.on('init change', function() {
                    editor.save();
                });
            },
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'editimage', 'wordcount'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
            relative_urls: false,
            convert_urls: false,
            remove_script_host: false,
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '{{ $link_upload }}',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function() {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };
                input.click();
            }
        });
    </script>
@endpush
