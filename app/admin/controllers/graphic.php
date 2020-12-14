<?php
$type_filter = array("Trang" => array("type" => "page", "checked" => "checked"), "Sản phẩm" => array("type" => "product", "checked" => "checked"), "bài viết" => array("type" => "post", "checked" => "checked"));

$table = 'category';
$table_translate = $table . '_translate';

$attr['config'] = array(
  "layout-menu-header" => array("type" => "position", "limit" => 6, "name" => "layout-header", "group" => "menu-center", "title" => "Menu chính"),
  "layout-menu-header2" => array("type" => "position", "limit" => 6, "name" => "layout-header", "group" => "menu-center2", "title" => "Menu chính")
);

$layout = array();
foreach ($attr['config'] as $layout_name => $attr) {
  $layout[$layout_name] =
    "<div class=\"position-graphic graphic-card\" >
                <div class=\"graphic-card-head\">
                    {$attr['title']}
                </div>
                <div data-group=\"{$attr["group"]}\"  data-name=\"{$attr["name"]}\"data-type=\"{$attr["type"]}\" 
                  class=
                \"sortable col-12 border-1\">
                
                </div>
    </div>";
}

// category filter start
$where = array();
$where_type = array();
if (isset($_SESSION['filter_' . $com]['type'])) {
  if (is_array($_SESSION['filter_' . $com]['type']) && !empty($_SESSION['filter_' . $com]['type']))
    foreach ($_SESSION['filter_' . $com]['type'] as $r_type) {
      $where_type[] = "type like '{$r_type}' ";
    }
  else
    foreach ($type_filter as $index => $r_type) {
      $type_filter[$index]['checked'] = '';
    }
} else {
  foreach ($type_filter as $r_type) {
    if ($r_type['checked'] != '')
      $where_type[] = "type like '{$r_type['type']}' ";
  }
}
$where = is_array($where_type) && !empty($where_type) ? 'where (' . implode(' or ', $where_type) . ')' : '';
if ($where != '') {
  $db->query("select * from table_category {$where} ");
  $items = $db->result_array();
} else {
  $items = array();
}
if (isset($_REQUEST['act']) && $_REQUEST['act'] == "save") {
  $obj = json_decode($_POST['position'], true);
  $group = array_column($obj, 'name');
  $group_name = array();
  foreach ($obj as $r_obj) {
    if (in_array($r_obj['name'], $group)) {
      $group_name[$r_obj['name']][$r_obj['group']][] =  $r_obj;
    }
  }

  foreach ($group_name as $name => $r_group) {
    $table = str_replace('-', '_', $name);
    $db->query("select * from table_{$table} ");
    $layout_name = $db->fetch_array();
    $value = json_encode($group_name[$name]);
    if (is_array($layout_name) && !empty($layout_name)){

      $db->query("update table_{$table} set value = '{$value}' where id = '{$layout_name['id']}' ");
    }else {

      $data['value'] = $value;
      $db->setTable($table);
      $db->insert($data);
    }

  }
}
// category filter ebd

// switch ($type) {
//     case 'list':
//     break;
//     case 'remove':
//       if (!empty($id)) {
//         remove();
//       }
//       break;
//   }

$view = "graphic/index_edit";
