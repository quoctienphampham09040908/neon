<?php
$table = $com;
$table_translate = $table . '_translate';
$attr = array();
$db->query("select * from table_category where type like 'post'");
$attr = array();
$attr['list']['status'] = array(
  'Hiển thị' => array('name' => 'enable'),
  'Nổi bật' => array('name' => 'popular'),
);
$attr['list']['thumbnail'] = array(
  'Hình ảnh' => array('name' => 'thumbnail'),
);
$attr['default']['category'] = array(
    "category_id_default" => array("title" => "Danh mục bài viết", "list" => $db->result_array() )
);
// $attr['default']['input'] = array(
//   'Đường dẫn' => array('name' => "uri", 'type' => "input", "placeholder" => "Nhập đường dẫn..."),
//   'Độ ưu tiên' => array('name' => "level", 'type' => "number", "placeholder" => "Nhập độ ưu tiên...")
// );
// $attr['default']['select'] = array(
//   'Hiển thị' => array('name' => 'enable', 'type' => "radio", "value" => array("không" => 0, "Có" => 1)),
// );
// $attr['default']['radio'] = array('Đường dẫn' => array('uri' => "input"), 'Độ ưu tiên' => array('uri' => "input"));
$attr['translate']['content'] = array(
  'Tiêu đề' => array('name' => "title", 'type' => "input", 'input-type' => "input", "placeholder" => "Nhập tiêu đề..."),
  'Mô tả' => array('name' => "description", 'type' => "input", 'input-type' => "text", "placeholder" => "Nhập mô tả ngắn.."),
  'Nội dung' => array('name' => "content", 'type' => "input", 'input-type' => "editor", "placeholder" => "Nhập nội dung..."),
  'H1' => array('name' => "h1", 'type' => "input", 'input-type' => "input", "placeholder" => "Nhập H1 SEO..."),
  'H2' => array('name' => "h2", 'type' => "input", 'input-type' => "input", "placeholder" => "Nhập H2 SEO..."),
  'H3' => array('name' => "h3", 'type' => "input", 'input-type' => "input", "placeholder" => "Nhập H3 SEO..."),
  'Title' => array('name' => "title_seo", 'type' => "input", 'input-type' => "input", "placeholder" => "Nhập title SEO..."),
  'keyword' => array('name' => "keyword", 'type' => "input", 'input-type' => "text", "placeholder" => "Nhập keyword SEO..."),
  'description' => array('name' => "desc", 'type' => "input", 'input-type' => "text", "placeholder" => "Nhập description SEO..."),
);
switch ($act) {
  case 'list':
    $limit = 10;
    $db->query("select p.*,(select title from table_category c where c.id = p.category_id ) as `title_category` from table_post p ");
    $items = $db->result_array();
    $paging = new Paging(array("items" => $items, "limit" => $limit, "p" => isset($_REQUEST['p']) ? $_REQUEST['p'] : "", "url" => getCurrentUrl()));
    $items = $paging->paging(true);
    $paging =  $paging->paging(false);
    $view = "post/list";

    break;
  case 'edit':
    if (!empty($id)) {
      $db->query("select * from table_post where id like '{$id}' ");
      $item = $db->fetch_array(); // get table default
      $db->query("select * from table_post_translate  where post_id = '{$id}'");
      $translate = $db->result_array(); // get table language
      $item_lang = array();

      foreach ($translate as $r_arr) {
        $item_lang[$r_arr['lang']] = $r_arr;
      }
      if ($item) {
        $view = "post/edit";
      } else {
        echo "<script>window.location.href='" . $config_url . "/admin/index.php?com=index'</script>";
      }
    } else {
      $view = "post/create";
    }
    break;
  case 'save':
    if (!empty($id)) {
      edit();
    } else {
      create();
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
function create()
{
  global $db, $com, $config_url, $table, $table_translate, $language, $type;
  $category_data = array('category_id','type', 'uri', 'level', 'enabel', 'thumbnail');
  $category_data_translate = array('title', 'description', 'content', 'h1', 'h2', 'h3', 'title_seo', 'keyword', 'desc');

  $max_id = saveData($category_data, $table);

  if ($max_id) {
 
    saveTranslate($max_id, $category_data_translate, $language, $table, $table_translate);

 
  } else {
    alert("Lỗi lưu dữ liệu");
  }
  echo "<script>alert('Thêm mới thành công');window.close();</script>";
  // echo  '<script type="text/javascript">alert("Thêm mới thành công");close();window.location.href="'. $config_url . '/admin/index.php?com='.$com.'&act=list'.(isset($type) && !empty($type) )? '&type="'.$type.'"' : "" .'"</script>';
}
function edit()
{
  global $db, $com, $config_url, $table, $table_translate, $language;

  // $_POST['uri'] = changeTitle($_POST['title'] . '');
  $category_data = array('category_id','title', 'type', 'uri', 'level', 'enabel', 'thumbnail');
  $category_data_translate = array('title', 'description', 'content', 'h1', 'h2', 'h3', 'title_seo', 'keyword', 'desc');
  if (saveData($category_data, $table, $_REQUEST['id'])) {
    saveTranslate($_REQUEST['id'], $category_data_translate, $language, $table, $table_translate, true);
    echo "<script>alert('Cập nhật thành công!');window.close();</script>";
  } else {
    alert("Lỗi lưu dữ liệu");
  }
  // echo "<script>alert('Cập nhật thành công');window.location.href='" . $config_url . "/admin/index.php?com=$com&act=list'</script>";
}
function remove()
{
  global $db, $id, $com, $type, $config_url, $table, $table_translate;
  removeData($id, $table, $table_translate);
  echo "<script>alert('Xóa dữ liệu thành công!');</script>";
}
?>