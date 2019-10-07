<?php 
  session_start();
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  @define('_view', './app/views/');
  @define('_controller', './app/controllers/');
  @define('_lib', './lib/');
  include_once _lib."config.php";
  include_once _lib."functions.php";
  include_once _lib."class.database.php";
  include_once _lib."pagination.php";
  include_once _lib."file_requick.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
  <?= $_REQUEST['param-1'] ?>
  <?= $_REQUEST['p'] ?>
</body>
</html>