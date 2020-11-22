<?php
function alert($s)
{
  echo '<meta charset="utf-8"><script language="javascript"> alert("' . $s . '") </script>';
}
function checkCom($com, $list_com)
{
  $key = array_keys($list_com);
  if (in_array($com, $key)) {
    return true;
  }
  return false;
}
function getBaseURL($root = false, $lang = true)
{
  $server = $_SERVER['PHP_SELF'];
  if ($root)
    $server = str_replace("app/admin/", "", $server);
  if (isset($_REQUEST['lang']) && $_REQUEST['lang'] != "" && $lang === true)
    $server .= $_REQUEST['lang'] . "/";
  return str_replace("index.php", "", $server);
}
function changeTitle($str, $r = true)
{
  $str = stripUnicode($str);
  $str = mb_convert_case($str, MB_CASE_LOWER, 'utf-8');
  $str = preg_replace('/([^a-zA-Z0-9]+)/', ' ', $str);
  if ($r === true)
    $str = preg_replace('/\s/', '-', trim($str));
  return $str;
}
function stripUnicode($str)
{
  if (!$str) return false;
  $unicode = array(
    'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
    'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
    'd' => 'đ',
    'D' => 'Đ',
    'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
    'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
    'i' => 'í|ì|ỉ|ĩ|ị',
    'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
    'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
    'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
    'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
    'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
    'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
    'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
  );
  foreach ($unicode as $khongdau => $codau) {
    $arr = explode("|", $codau);
    foreach ($arr as $value) {
      $str = str_replace($value, $khongdau, $str);
    }
  }
  return $str;
}
function getCurrentUrl($url = "")
{
  global $config_url;
  if ($url == "")
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  else
    return $config_url;
}
function saveData($object, $table, $id = false)
{
  global $db, $config_url;
  $data = array();
  foreach ($_POST as $name => $attr) {
    if (in_array(strstr($name, '_default', true), $object)) {
      if (!empty($attr))
        $data[strstr($name, '_default', true)] = $attr;
      else
        $data[strstr($name, '_default', true)] = '';
    }
  }
  $db->setTable($table);
  if (!$id) {
    if ($db->insert($data)) {
      return $db->getMaxId($table);
    } else {
      return false;
    }
  } else {
    $db->condition("id = '{$id}'");
    if ($db->update($data)) {
      return true;
    } else {
      return false;
    }
  }
}
function removeData($id, $table, $table_translate)
{
  global $db;
  $db->query("delete from table_{$table_translate} where category_id = '{$id}'");
  $db->query("delete from table_{$table} where id = '{$id}' ");
}
function updateData($id, $table, $column)
{
  global $db;
  $db->query("select * from table_{$table} where  id = '{$id}'  ");
  $status = $db->fetch_array();
  if ($status[$column] == "" || $status[$column] == 0)
    $db->query("update table_{$table} set `{$column}` = 1 where id = '{$id}' ");
  else
    $db->query("update table_{$table} set `{$column}` = 0 where id = '{$id}' ");
}
function saveTranslate($id, $translate, $language, $table, $table_translate, $update = false)
{

  global $db, $config_url;
  foreach ($language as $index_lang => $r_lang) {
    $data = array();
    foreach ($_POST as $name => $attr) {
      if (in_array(strstr($name, '_translate_' . $r_lang['uri'], true), $translate)) {
        $data[strstr($name, '_translate_' . $r_lang['uri'], true)] = $attr;
      }
      if ($index_lang == 0 && strstr($name, '_translate_' . $r_lang['uri'], true) == "title") {
        $db->query("update table_{$table} set `title` = '{$attr}' where id like '{$id}' ");
      }

      $data[setForeignKey($table)] = $id;
      $data['lang'] = $r_lang['id'];

    }
    // get translate current start
    $db->query("select * from table_{$table_translate} where  `".setForeignKey($table)."` = '{$id}' and lang = '{$data['lang']}' ");
    $current_object_translate = $db->fetch_array();
    // get translate current end
    // ------
    // get origin current start
    $db->query("select * from table_{$table} where  id = '{$id}'");
    $current_object_origin = $db->fetch_array();
    // get origin current end
    if ($current_object_origin['uri'] == '') {
      $uri = changeTitle($current_object_origin['title']);
      $db->query("update table_{$table} set `uri` = '{$uri}' where id = '{$id}' ");
    } // check empty if uri is null
    $db->setTable($table_translate);
    if (!$update || !is_array($current_object_translate) || empty($current_object_translate)) {
      if ($db->insert($data)) {
        continue;
      } else {
        die(1);
      }
    } else {
      $db->condition("id = '{$current_object_translate['id']}'");
      if ($db->update($data)) {
        continue;
      } else {
        return false;
      }
    }
  }
}
function setForeignKey($table)
{
  $column = "";
  switch ($table) {
    case 'category':
      $column = 'category_id';
      break;
    case 'product':
      $column = 'product_id';
      break;
    case 'post':
      $column = 'post_id';
      break;
    case 'option':
        $column = 'option_id';
        break;
    default:
      # code...
      break;
  }
  return $column;
}
