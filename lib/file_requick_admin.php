<?php  
global $view,$com,$db,$act,$type,$id;
$com = $_REQUEST['com'];
$act = $_REQUEST['act'];
$type = $_REQUEST['type'];
$id = $_REQUEST['id'];
$db = new database($config['database']);
$current_user = NULL;
 if (!isset($_COOKIE['admin'])) {
 	login();
 }else{
    checkLogin();
        switch ($com) {
              case 'category':
                   if (empty($act)) {
                       echo "<script>window.location.href='".$config_url."/admin/index.php?com=index'</script>";
                    }
               break;
            default:
              //$com = "index";
                break;
        }

 	include_once _controller.$com.".php";
 }



function login(){
    global $config_url,$com,$act,$view,$db;
    if ($com == 'user' && $act == 'login' && !isset($_COOKIE['admin'])) {
          include_once _controller.$com.".php";
    }else{
    	echo "<script>window.location.href='".$config_url."/admin/index.php?com=user&act=login'</script>";
    }
}
function checkLogin(){
	global $config_url,$com,$act,$view,$db,$current_user;
	$db->query("select * from tbl_user where MD5(user_name) = '{$_COOKIE['admin']}'");
  $current_user = $db->fetch_array();
}

?>