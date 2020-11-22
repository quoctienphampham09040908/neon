function call_ajax_proccess(obj) {
  var item = $(event.target);
  $.ajax({
    type: "post",
    url: "../app/ajax/ajax_admin.php",
    data: obj,
    dataType: "json",
    success: function (json) {
      if ((obj["act"] == "delete" || obj["act"] == "delete_checkbox")  && json["result"] == 1 )
        reload_list(obj["reload"]);
      else if (obj["act"] == "status" && json["result"] == 1) {
        if (item.hasClass("fa-toggle-off text-dark")) {
          item.removeClass("fa-toggle-off text-dark").addClass('fa-toggle-on text-success');
          return;
        }
        if (item.hasClass('fa-toggle-on text-success')) {
          item.removeClass('fa-toggle-on text-success').addClass('fa-toggle-off text-dark');
          return;
        }
      }
      //  else {
      //   alert("Có lỗi xảy ra!");
      // }
    },
  });
}

function reload_list(id) {
  if ($("#" + id).length > 0) $("#" + id).load(" #" + id + " ");
  // $.ajax({
  //   url: "./templates/layout/index-1.php",
  //   type: "post",
  //   dataType: "text",
  //   data: {
  //     id_cat: $(this).data('params')
  //   },
  //   success: function(result) {
  //     $('#home_product').html(result);
  //   }
  // });
}
