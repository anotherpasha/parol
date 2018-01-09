tinymce.PluginManager.add('kleurimage', function(editor, url) {
    // Add a button that opens a window
    editor.addButton('kleurimage', {
        icon: 'image',
        tooltip: 'Add Image',
        onclick: function() {
            // Open window
            var baseUrl = editor.getParam("baseUrl");
            // console.log(url);
            editor.windowManager.open({
                title: 'Media',
                url: baseUrl + '/tinymce-image',
                width : 1024,
                height : 600
            });
        }
    });
});
