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

                </div>
            </div>
        </div>
    </div>

    <div id="load-menu-right-draggable" class="menu-right-draggable">
        <div>
            <?php foreach ($items as  $r_item) { ?>

                <div data-id="<?= $r_item['id'] ?>" class="draggable-category ui-state-highlight">
                    <span>
                        <?= $r_item['title'] ?>
                    </span>
                    <div class="draggable-category-tool-box">
                        <a href=""><i class="fas fa-edit color--default1 "></i></a>
                        <a href=""><i class="fas close ">&times;</i></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    function saveGraphic(target) {
        var position_graph = target.querySelectorAll(".position-graphic");
        var obj = [];
        position_graph.forEach(function(element) {
            var element_current = element.querySelectorAll('[data-group]')[0];
            obj.push({
                group: element_current.getAttribute('data-group'),
                name: element_current.getAttribute('data-name'),
                type: element_current.getAttribute('data-type'),
                value: Array.prototype.map.call  (element.querySelectorAll('[data-id]'), function(node) {
               map = node.getAttribute('data-id');
               return map;
              },[])
            });
        });

        var element = document.createElement('input');
        element.type = 'hidden';
        element.value = JSON.stringify(obj);
        element.name = 'position';
        element.id = 'position';
        target.appendChild(element);
        // target.preventDefault();
    }
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
        if (checkbox.length == 0) {
            reload_list('load-menu-right-draggable > div');
        }
    });
</script>