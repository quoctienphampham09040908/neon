function call_ajax_proccess(obj) {
  var item = $(event.target);
  $.ajax({
    type: "post",
    url: "../app/ajax/ajax_admin.php",
    data: obj,
    dataType: "json",
    success: function (json) {
      if (
        (obj["act"] == "delete" ||
          obj["act"] == "delete_checkbox" ||
          obj["act"] == "filter") &&
        json["result"] == 1
      )
        reload_list(
          obj["act"] == "filter" ? obj["reload"] + " > div" : obj["reload"]
        );
      else if (obj["act"] == "status" && json["result"] == 1) {
        if (item.hasClass("fa-toggle-off text-dark")) {
          item
            .removeClass("fa-toggle-off text-dark")
            .addClass("fa-toggle-on text-success");
          return;
        }
        if (item.hasClass("fa-toggle-on text-success")) {
          item
            .removeClass("fa-toggle-on text-success")
            .addClass("fa-toggle-off text-dark");
          return;
        }
      }
      //  else {
      //   alert("Có lỗi xảy ra!");
      // }
    },
  });
}


function call_ajax_proccess_graphic(obj) {
  $.ajax({
    type: "post",
    url: "../app/ajax/ajax_admin.php",
    data: obj,
    dataType: "json",
    success: function (json) {
      if (obj["act"] == "filter" && json["result"] == 1) {
        reload_list(obj["reload"]);
        setTimeout(() => {
          $(".draggable-category").draggable({
            connectToSortable: ".sortable",
            helper: "clone",
            revert: "invalid",
          });
          $("div").disableSelection();
          $('#load-menu-right-draggable').removeClass('filter-loading');
          findCategory();
        }, 1500);
      }
    },
  });

}

function findCategory() {
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  console.log(filter);
  ul = $("#load-menu-right-draggable");
  li = ul.find('.draggable-category');
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("span")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
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

$(function () {
  $(".sortable").sortable({
    revert: true,
  });
  $(".draggable-category").draggable({
    connectToSortable: ".sortable",
    helper: "clone",
    revert: "invalid",
  });
  $("div").disableSelection();
});
