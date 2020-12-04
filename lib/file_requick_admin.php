<?php
// config list category start
$list_com = array(
  "category" => array(
    "title" => "Danh Mục",
    "type" => array(
      "product" => array("title" => "Sản phẩm", "act" => "list", "icon" => '<i class="fas fa-box-alt"></i>'),
      "post" => array("title" => "Bài viết", "act" => "list", "icon" => '<i class="fas fa-newspaper"></i>'),
      "page" => array("title" => "Trang", "act" => "list", "icon" => '<i class="fas fa-file-alt"></i>'),
    ),
    "icon" => '<i class="fas fa-book-open"></i>',
    "list-type" => true
  ),
  "product" => array(
    "title" => "Sản phẩm",
    "act" => "list",
    "icon" => '<i class="fas fa-box-alt"></i>',
    "list-type" => false
  ),
  "post" => array(
    "title" => "Bài viết",
    "act" => "list",
    "icon" => '<i class="fas fa-newspaper"></i>',
    "list-type" => false
  ),
  "option" => array(
    "title" => "Mở rộng",
    "type" => array(
      "slide" => array("title" => "Slide trang chủ", "act" => "list", "icon" => '<i class="fas fa-box-alt"></i>'),

    ),
    "icon" => '<i class="fas fa-rocket"></i>',
    "list-type" => true
  ),
  "graphic" => array(
    "title" => "Giao diện",
    "type" => array(
      "head" => array("title" => "Header", "act" => "edit", "icon" => '<i class="fas fa-star-of-life"></i>'),
      "index" => array("title" => "Trang chủ", "act" => "edit", "icon" => '<i class="fas fa-pager"></i>'),
      "footer" => array("title" => "Footer", "act" => "edit", "icon" => '<i class="fas fa-star-of-life"></i>'),
    ),
    "icon" => '<i class="fas fa-cube"></i>',
    "list-type" => true
  ),
  "website" => array(
    "title" => "Thông tin website",
    "act" => "edit",
    "icon" => '<i class="fas fa-info"></i>',
    "list-type" => false
  ),

  "user" => array(
  )
);
// config list category end
$com = isset($_REQUEST['com']) ? $_REQUEST['com'] : NULL;
$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : NULL;
$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : NULL;
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;
$db = new database($config['database']);
$db->connect();
$db->query("select * from table_language");
$language =  $db->result_array();  //  language start
$current_user = NULL;
if (!isset($_COOKIE['admin']) && $com != "user") {
  login();
} else {
  checkLogin();
  if (empty($act)) {
    $com = 'index';
  } else {
    if (!checkCom($com, $list_com) && isset($_COOKIE['admin'])) {
      $com =  'index';
    }
  }
  include _controller . $com . ".php";
}
function login()
{
  global $config_url;
  echo "<script>window.location.href='" . $config_url . "/admin/index.php?com=user&act=login'</script>";
}
function checkLogin()
{
  global $config_url, $com, $act, $db, $view, $current_user;
  if (!isset($_COOKIE['admin'])) {
    include_once _controller . $com . ".php";
  } else {
    $db->query("select * from table_user where MD5(user_name) = '{$_COOKIE['admin']}'");
    $current_user = $db->fetch_array();
    if (!is_array($current_user) || empty($current_user)) {
      echo "<script>window.location.href='" . $config_url . "/admin/index.php?com=user&act=login'</script>";
    }
  }
}
