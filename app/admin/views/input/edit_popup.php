<a class="edit-item-<?= $value['id'] ?>" href="javascript:void(0)"><i class="fas fa-exchange-alt"></i>
							</a>
 <script>
    $('.edit-item-<?= $value['id'] ?>').on('click', function() {
        var width = window.innerWidth * 0.66;
        // define the height in
        var height = width * window.innerHeight / window.innerWidth;
        // Ratio the hight to the width as the user screen ratio
        var window_edit =  window.open("<?= str_replace('act=list','act=edit&window=1&id='.$value['id'],$_SERVER['REQUEST_URI']) ?>", 'newwindow', 'width=' + width + ', height=' + height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2));
        window_edit.onload = function() {
            window_edit.onunload = function() {
                location.reload();
            };
        }
    });
</script>