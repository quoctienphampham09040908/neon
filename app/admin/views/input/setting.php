<div class="fixed-fuction-expand">
    <div class="function-toggle">
        <div class="d-flex flex-row">
            <?php include _view . 'input/create_popup.php' ?>
            <?php include _view . 'input/remove_checkbox.php' ?>
        </div>
    </div>
    <a class="btn rounded-0 btn-dark text-white border-0 shadow-none w-100 w-auto" onclick="toggleFunction();">
        <i class="fas fa-sliders-h"></i>
    </a>
</div>
<script>
    function toggleFunction() {
        $('.function-toggle').toggleClass('active');
    }
    $('input[name="check_all"]').on('click', function() {
        if ($(this).is(":checked")) {
            $("input[name='check[]']:checkbox:not(:checked)").trigger('click');
        } else {
            $("input[name='check[]']:checked").trigger('click');
        }
    });
    $('input[name="check[]"]').on('click', function() {
        const chbx = document.getElementsByName("check");
        if ($("input[name='check[]']:checked").length > 0) {
            if ($('.remove-item').hasClass('d-none'))
                $('.remove-item').removeClass('d-none').addClass('d-block');
            if ($('.function-toggle').hasClass('active') == false)
                $('.function-toggle').addClass('active');
        }
        if ($("input[name='check[]']:checked").length == 0) {
            if ($('.remove-item').hasClass('d-block'))
                $('.remove-item').removeClass('d-block').addClass('d-none');
            if ($('.function-toggle').hasClass('active') == true)
                $('.function-toggle').removeClass('active');
        }
        if ($("input[name='check[]']:checked").length == 0) {
            $('input[name="check_all"]')[0].checked = false;
        }
        if ($("input[name='check[]']:checked").length == $("input[name='check[]']").length)
            $('input[name="check_all"]')[0].checked = true;
    });
</script>