<div class="d-flex flex-row">
    <div class="graphic-left">
    <form action="<?= str_replace('act=edit', 'act=save', $_SERVER['REQUEST_URI']) ?>" method="POST" onsubmit="saveGraphic(this);">
    
            <div class="d-flex flex-column">
                <?= $layout['layout-menu-header'] ?>
                <?= $layout['layout-menu-header2'] ?>
            </div>
            <div class="mt-1">
            </div>
            <button  type="submit" class="btn btn-dark rounded-0 shadow-none  d-block m-auto">
             <i class="fas fa-save    "></i><span>Lưu</span>
            </button>
    </form>
    </div>
    
    <div class="graphic-right">
        <div>
            <?php include _view . 'layouts/menu-right.php' ?>
        </div>
    </div>

</div>