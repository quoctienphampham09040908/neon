<?php 

global $view,$controller;
if (isset($_REQUEST['param-1'])) {
	switch ($_REQUEST['param-1']) {
		case 'index':
			$controller = "index";
			break;
		default:
			$controller = "index";
			break;
	}
}else{
	$controller = "index";
	$view == "index";
}



?>