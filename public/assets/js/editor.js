tinymce.init({
    selector :'.textarea',
    plugins : [ 'advlist lists link searchreplace wordcount code kleurimage' ],
    baseUrl : $baseUrl,
    toolbar1 : 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent link | kleurimage code',
    image_advtab : true,
    menubar : false,
    relative_urls: false,
    convert_urls: false,
    force_p_newlines : false,
    forced_root_block : '',
    height : "300"
});