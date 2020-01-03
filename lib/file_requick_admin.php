<?php  
global $view,$com,$db;
$com = $_REQUEST['com'];
$act = $_REQUEST['act'];
$db = new database($config['database']);
$current_user = NULL;
 if (!isset($_COOKIE['admin'])) {
 	login();
 }else{
    checkLogin();
 	if (empty($com)) {
 		$com = 'index';
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