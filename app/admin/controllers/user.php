<?php
session_start();
if (isset($_POST['user_name']) && isset($_POST['password']) && !isset($_COOKIE['admin'])) {
	$pass = (md5($_POST['password']));
    $db->query("select * from tbl_user where user_name = '{$_POST['user_name']}' and password like '{$pass}'");
    $user = $db->fetch_array();
    
     if (count($user) > 0) {
     	setcookie('admin', md5($user['user_name']), time() + (86400 * 30));
     	echo "<script>window.location.href='".$config_url."/admin/index.php?com=index'</script>";
     }
}else{
	switch ($act) {
		case 'login':
		     if (!isset($_COOKIE['admin'])) {
		     	$view = "user/login";
		     }else{
		     	echo "<script>window.location.href='".$config_url."/admin/index.php'</script>";
		     }
			break;
		case 'logout':
		      setcookie('admin', '', time() - 3600);
		      unset($_COOKIE['admin']);
		      echo "<script>window.location.href='".$config_url."/admin/index.php'</script>";
			break;
		case 'change':
		       if (!isset($_POST['save'])) {
			       $view = "user/edit";
	               if (isset($_REQUEST['id'])) {
	                   
	               }else{
	               	$user = $current_user;
	               }
	           }else{
		           $info = pathinfo($_FILES['avatar']['name']);
				   $ext = $info['extension']; 
				   $newname = "newname.".$ext; 
				    $newname = $_FILES['avatar']['name']; 
					$target = '../'._storage.$newname;
					move_uploaded_file( $_FILES['avatar']['tmp_name'], $target);
	           		
	           }

			break;
		default:
			# code...
			break;
	}
}
?>