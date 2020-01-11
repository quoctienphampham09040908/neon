CKEDITOR.plugins.add( 'simpleImageUpload', {
    init: function( editor ) {
        var fileDialog = $('<input type="file" multiple>');

        fileDialog.on('change', function (e) {
            var uploadUrl = editor.config.uploadUrl;
            var files = fileDialog[0].files;
            var imageData = new FormData();
            for(i in files)
                imageData.append('file[]', files[i]);

            $.ajax({
                url: uploadUrl,
                type: 'POST',
                contentType: false,
                processData: false,
                data: imageData
            }).done(function(done) {
                var result = done.split(";");
                var ele;
                for(i in result) {
                    ele = editor.document.createElement('p');
                    ele.$.innerHTML = `<img class="img-responsive" src="`+result[i]+`">`;
                    // ele.setAttribute('src', result[i]);
                    editor.insertElement(ele);
                }
            });

        });
        editor.ui.addButton( 'QuickUpload', {
            label: 'Upload nhanh hình ảnh',
            command: 'openDialog',
            toolbar: 'insert',
            icon: this.path + 'mycustomicon.png'
        });
        editor.addCommand('openDialog', {
            exec: function(editor) {
                fileDialog.click();
            }
        });
    }
});