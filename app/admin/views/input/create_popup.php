<a class="create-item btn btn-primary border-0 shadow-none  rounded-0" href="javascript:void(0)">
<i class="fas fa-folder-plus"></i> Thêm mới
</a>
<script>
    $('.create-item').on('click', function() {
        var width = window.innerWidth * 0.66;
        // define the height in
        var height = width * window.innerHeight / window.innerWidth;
        // Ratio the hight to the width as the user screen ratio
        var window_create = window.open("<?= str_replace('act=list', 'act=edit&window=1', $_SERVER['REQUEST_URI']) ?>", 'newwindow', 'width=' + width + ', height=' + height + ', top=' + ((window.innerHeight - height) / 2) + ', left=' + ((window.innerWidth - width) / 2));
        window_create.onload = function() {
            window_create.onunload = function() {
                location.reload();
            };
        }

    });

</script>