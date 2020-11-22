<a class="remove-item btn btn-danger border-0 shadow-none  rounded-0 d-none" href="javascript:void(0)" onclick="deteleCheckbox()">
    <i class="fas fa-tasks"></i> Xóa các mục đã chọn
</a>
<script>
    function deteleCheckbox() {
        var checkbox = $("input[name='check[]']:checked").map(function() {
            return $(this).val();
        }).toArray();
        call_ajax_proccess({
            table: '<?= $table ?>',
            table_translate: '<?= $table_translate ?>',
            id: checkbox,
            act: 'delete_checkbox',
            reload: 'table-<?= $com ?>-list'
        });
    }
</script>