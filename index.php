<?php 
  session_start();
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  @define('_view', './app/views/');
  @define('_controller', './app/controllers/');
  @define('_lib', './lib/');
  @define('_storage', './storage/');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./app/assets/fontawesome.min.css">
    <script src="./app/assets/js/fontawesome.min.js"></script>
    <link rel="stylesheet" href="./app/assets/js/jquery-3.4.1.min">
    <link rel="stylesheet" href="./app/assets/js/bootstrap.min.js">
    <link rel="stylesheet" href="./app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./app/assets/css/style.css">
</head>
<body>
  <?php include _view.'layouts/header.php'  ?>
<!--   <?= $_REQUEST['param-1'] ?>
  <?= $_REQUEST['p'] ?>1 -->
  <?php include _view.'layouts/footer.php'  ?>
</body>
</html>