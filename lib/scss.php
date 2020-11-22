<?php
@define('_lib', './');
include _lib."config.php";
$serverName = explode($_SERVER['SERVER_NAME'], $config_url);
if (trim(end($serverName)) != "") {
	$path = explode(trim(end($serverName)), $_SERVER['REQUEST_URI']);
	$path = array_slice($path, 1, count($path) - 1);
	$path = implode(trim(end($serverName)), $path);
}
else
	$path = $_SERVER['REQUEST_URI'];
$path = explode("/", $path);
$path = implode("/", array_slice($path, 1, count($path)-2));
require "scss.inc.php";
scss_server::serveFrom("../".$path);
?>