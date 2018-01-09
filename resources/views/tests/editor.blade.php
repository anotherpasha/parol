<!DOCTYPE html>
<html>
<head>
    <title>Editor (TEST)</title>
    <script src="{!! url('assets/js/lib/tinymce/tinymce.min.js') !!}"></script>
</head>
<body>
    <div id="app">
        <form method="post">
            <textarea id="mytextarea">Hello, World!</textarea>
        </form>
    </div>

    <script type="text/javascript">
        tinymce.init({
            selector: '#mytextarea',
            plugins : [ 'advlist lists link searchreplace wordcount code kleurimage paste' ],
            baseUrl: '{!! url("/") !!}',
            toolbar1 : 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent link | kleurimage pastetext | code ',
            // image_advtab: true,
            menubar : false,
            relative_urls: false,
            convert_urls: false,
            force_p_newlines : false,
            forced_root_block : '',
            height : "300",
            style_formats: [
              {title: 'Image Left', selector: 'img', styles: {
                'float' : 'left',
                'margin': '0 10px 0 10px'
              }},
              {title: 'Image Right', selector: 'img', styles: {
                'float' : 'right',
                'margin': '0 10px 0 10px'
              }}
            ],
            style_formats_merge: true

        });
    </script>
</body>
</html>
