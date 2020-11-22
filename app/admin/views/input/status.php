<button type="button" onclick="call_ajax_proccess({table: '<?= $table ?>',column: '<?= $r_status['name'] ?>',id: <?= $value['id'] ?> ,act: 'status',reload: 'table-<?= $com ?>-list' });" class="btn btn-danger bg-transparent p-0 m-0 rounded-0 border-0 shadow-none">
    <?php if ($value[$r_status['name']] == 1) { ?>
        <i class="fas fa-toggle-on text-success"></i>
    <?php } else { ?>
        <i class="fas fa-toggle-off text-dark"></i>
    <?php } ?>
</button>