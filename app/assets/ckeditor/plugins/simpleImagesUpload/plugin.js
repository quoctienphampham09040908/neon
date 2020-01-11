CKEDITOR.plugins.add( 'simpleImagesUpload', {
    init: function( editor ) {
        editor.ui.addButton( 'QuickBrowser', {
            label: 'Chọn nhanh hình ảnh',
            command: 'openCKFinder',
            toolbar: 'insert',
            icon: this.path + 'mycustomicon.png'
        });
        editor.addCommand('openCKFinder', {
            exec: function(editor) {
                $("body").append(`<div id="modal-ckfinder-editor" class="modal fade" style="background: #fff;"><div class="modal-dialog"><div class="modal-content"><div id="modal-ckfinder-editor-body" class="modal-body" style="height:calc(100vh - 60px);"></div></div></div></div><style>#modal-ckfinder-editor .modal-dialog{width:934px;}#modal-ckfinder-editor iframe{height:100%!important;}</style>`);
                var selectedCKFinderImage = function(fileUrl, data, fileList) {
                    var ele;
                    var urlExists = [];
                    for(i in fileList) {
                        if(urlExists.indexOf(fileList[i].url) >= 0) continue;
                        urlExists.push(fileList[i].url);
                        ele = editor.document.createElement('p');
                        ele.$.innerHTML = `<img src="`+fileList[i].url+`">`;
                        editor.insertElement(ele);
                    }
                    $("#modal-ckfinder-editor").modal("hide");
                };
                window.ckPopupCloseEvent = true;
                var finder_editor = new CKFinder();
                finder_editor.disableHelpButton = true;
                finder_editor.selectMultiple = true;
                finder_editor.callback = function (api) {
                    var toolGroup = api.document.getElementsByClassName("cke_toolgroup");
                    var toolGroupItem = $(api.document.getElementsByClassName("cke_button_upload")).parent().clone();
                    toolGroupItem.find("[id]").removeAttr("id");
                    toolGroupItem.find(".cke_icon").css("background-image", "url('../assets/img/ckfinder_select_icon.png')");
                    toolGroupItem.find(".cke_icon").css("background-size", "calc(100% - 1px) calc(100% - 1px)");
                    toolGroupItem.find(".cke_icon").css("background-position", "top center");
                    toolGroupItem.find(".cke_label").html("Chọn hình");
                    toolGroupItem.find(".cke_button_upload").removeAttr("onclick");
                    toolGroupItem.find(".cke_button_upload").attr("href", "javascript:void('Chọn hình')");
                    toolGroupItem.find(".cke_button_upload").click(function () {
                        var fileList = api.getSelectedFiles();
                        for(i in fileList) {
                            fileList[i].url = fileList[i].getUrl();
                        }
                        finder_editor.selectActionFunction(null, null, fileList);
                    });
                    $(toolGroup).prepend(toolGroupItem);
                    api.addFolderContextMenuOption({ label: 'Chọn thư mục' }, function( api, folder ) {
                        folder.getFiles(function (fileList) {
                            for(i in fileList)
                                fileList[i].url = fileList[i].getUrl();
                            finder_editor.selectActionFunction(folder.getUrl(), null, fileList);
                        });
                    });
                    api.showTool(api.addTool(`<h2 style="color: red;">Lưu ý: Giữ Ctrl để chọn nhiều hình!</h2>`));
                };
                finder_editor.selectActionFunction = selectedCKFinderImage;
                $("#modal-ckfinder-editor-body").html("");
                $("#modal-ckfinder-editor").modal("show");
                finder_editor.replace("modal-ckfinder-editor-body");
            }
        });
    }
});