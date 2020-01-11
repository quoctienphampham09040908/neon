<?php

   $categories = array("Danh mục trang" => "page","Danh mục sản phẩm" => "product","Danh mục bài viết" =>"post");
   $attr = array();
   $attr['input'] = array("Tiêu đề" => "title",
                          "Đường dẫn" => "uri"
                       );
   $attr['textarea'] = array("Mô tả ngắn" => "description");
   $attr['editor'] = array("Nội dung" => "content");

              switch ($act) {
              	case 'list':
              		  $db->query("select * from tbl_category");
                    $category_list = $db->result_array();
                    $view = "category/list";
              		break;
              	case 'edit':
                   if (!empty($id)) {
                        $db->query("select * from tbl_category where  id like '{$id}' ");
                        $category = $db->fetch_array();
                        if ($category) {
                          $view = "category/edit";
                        }else{
                            echo "<script>window.location.href='".$config_url."/admin/index.php?com=index'</script>";
                        }
                      
                   }else{
                       $view = "category/add";
                   }
              		break;
                case 'save':
                   if (!empty($id)) {
                      edit();
                   }else{
                     add();
                   }
                  break;
                case 'remove':
                    if (!empty($id)) {
                     remove();
                   }
                break;
              	
              	// default:
               //   	echo "<script>window.location.href='".$config_url."/admin/index.php?com=index'</script>";
              	// break;
              }



function edit(){
  global $db,$id,$com,$config_url;
  $_POST['uri'] = changeTitle($_POST['title']);
  $db->setTable("category");
  $db->setCondition("where id = '{$id}' ");
  $db->update($_POST);
  echo "<script>alert('Cập nhật thành công');window.location.href='".$config_url."/admin/index.php?com=$com&act=list'</script>";
}
function add(){
   global $db,$com,$config_url;
   $_POST['uri'] = changeTitle($_POST['title']);
   $db->setTable("category");
   $db->insert($_POST);
   echo "<script>alert('Thêm mới thành công');window.location.href='".$config_url."/admin/index.php?com=$com&act=list'</script>";
}
function remove(){
       global $db,$id,$com,$config_url;
       $db->query("delete from tbl_category where id = '{$id}' ");
       echo "<script>alert('Xóa thành công');window.location.href='".$config_url."/admin/index.php?com=$com&act=list'</script>";
}

 ?>