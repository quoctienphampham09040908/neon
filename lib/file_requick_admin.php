<?php 

global $view,$com,$db,$act,$type,$id;

$com = isset($_REQUEST['com'])? $_REQUEST['com'] : NULL;
$act = isset($_REQUEST['act'])? $_REQUEST['act'] : NULL;
$type = isset($_REQUEST['type'])? $_REQUEST['type'] : NULL;
$id = isset($_REQUEST['id'])? $_REQUEST['id'] : NULL;


$db = new database($config['database']);
$db->connect();
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
              $com = "index";
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
	$db->query("select * from table_user where MD5(user_name) = '{$_COOKIE['admin']}'");
  $current_user = $db->fetch_array();
}

?>