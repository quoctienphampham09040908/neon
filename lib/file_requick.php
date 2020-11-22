<?php
global $config, $com;
$db = new Database($config['database']);
$db->connect();
$db->query("select * from table_category");
global $view, $controller;

if (isset($_REQUEST['param-1'])) {
	switch ($_REQUEST['param-1']) {
		case 'index':$controller ="index";
		break;
		default: $controller ="index";
		break;
	}

}
else {
	$controller ="index";
	$view == "index";
}
?>