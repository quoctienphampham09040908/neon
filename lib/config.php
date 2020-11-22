<?php 



// if(!defined('_lib')) die("Error");

 $http = "http://";

// if($_SERVER['HTTPS'] == "on")

// 	$http = "https://";

 $config_url = $http.$_SERVER["SERVER_NAME"];



// if(count(explode($http."www.", $config_url)) > 1) {

// 	header("HTTP/1.1 301 Moved Permanently"); 

// 	header("Location: ".$http.str_replace($http."www.", "", $config_url));

// 	exit(1);

// }



$config_url = "/neon";



$config['database']['servername'] = 'localhost';

$config['database']['username'] = 'root';

$config['database']['password'] = '';

$config['database']['database'] = 'neon_db';

$config['database']['refix'] = 'table_';



?>