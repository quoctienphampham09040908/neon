<?php
$type_filter = array("Trang" => array("type" => "page", "checked" => "checked"), "Sản phẩm" => array("type" => "product", "checked" => "checked"), "bài viết" => array("type" => "post", "checked" => "checked"));

$table = 'category';
$table_translate = $table . '_translate';

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
