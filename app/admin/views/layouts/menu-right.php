<div class="menu-right">
    <div class="menu-right-head">
        <div>
            Danh mục
        </div>

        <div class="filter-menu-right">
            <div class="form-group m-0 ">
                <input type="text" class="form-control rounded-0 shadow-none border-dark" name="" id="myInput" onkeyup="findCategory()" aria-describedby="menu-right-category-search" placeholder="Nhập từ khóa...">
                <small id="menu-right-category-search" class="form-text text-muted">Tìm nhanh danh mục</small>
            </div>
            <div class="form-group m-0">

                <div class="btn-group d-flex justify-content-around">
                    <?php foreach ($type_filter  as $key_name => $r_type) { ?>
                        <label class="btn rounded-0 shadow-none p-0  d-flex flex-column">
                            <input class="d-block m-auto shadow-none" type="checkbox" name="type[]" value="<?= $r_type['type'] ?>" <?= $r_type['checked'] ?> autocomplete="off">
                            <?= $key_name ?>
                        </label>


                    <?php } ?>

                    <!-- <label class="btn rounded-0 shadow-none p-0 d-flex flex-column">
                        <input  class="d-block m-auto shadow-none" type="checkbox" name="type"  autocomplete="off" checked>
                        Sản phẩm
                    </label>
                    <label class="btn rounded-0 shadow-none p-0 d-flex flex-column">
                        <input  class="d-block m-auto shadow-none" type="checkbox" name="type"  autocomplete="off" checked> 
                        Bài viết
                    </label> -->
                </div>
            </div>
        </div>
    </div>

    <div id="load-menu-right-draggable" class="menu-right-draggable">
        <div>
            <?php foreach ($items as  $r_item) { ?>

                <div class="draggable-category ui-state-highlight">
                    <span>
                        <?= $r_item['title'] ?>
                    </span>
                    <div class="draggable-category-tool-box">
                        <a href=""><i class="fas fa-edit text-warning"></i></a>
                        <a href=""><i class="fas close text-danger">&times;</i></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    $('input[name="type[]"]').on("click", function() {
        var checkbox = $("input[name='type[]']:checked")
            .map(function() {
                return $(this).val();
            }).toArray();
        $('#load-menu-right-draggable').addClass('filter-loading');
        call_ajax_proccess_graphic({
            com: "graphic",
            act: "filter",
            filter: "type",
            type: checkbox,
            reload: "load-menu-right-draggable > div",
        });
        if ( checkbox.length == 0) {
            reload_list('load-menu-right-draggable > div');
        }
    });
</script>