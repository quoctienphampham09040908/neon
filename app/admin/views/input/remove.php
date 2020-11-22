<a href="<?= str_replace('act=list', 'act=remove', $_SERVER['REQUEST_URI']) . '&id=' . $value['id'] . '' ?>">
</a>
<button type="button" onclick="call_ajax_proccess({table: '<?= $table ?>',table_translate: '<?= $table_translate ?>',id: <?= $value['id'] ?> ,act: 'delete',reload: 'table-<?= $com ?>-list' });" class="btn btn-danger bg-transparent p-0 m-0 rounded-0 border-0 shadow-none" >
    <i class=" fas fa-trash text-danger"></i>
</button>
