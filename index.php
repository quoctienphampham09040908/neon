<?php

session_start();
date_default_timezone_set("Asia/Ho_Chi_Minh");
@define('_app', './app/');
@define('_view', './app/views/');
@define('_controller', './app/controllers/');
@define('_lib', './lib/');
@define('_storage', './storage/');
include_once _lib . "config.php";
include_once _lib . "class.database.php";

include_once _lib . "file_requick.php";

// include_once _lib."functions.php";

//include_once _lib."pagination.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./app/assets/js/jquery-3.4.1.min.js"></script>
    <script src="./app/assets/js/bootstrap.min.js"></script>
    <script src="./app/assets/js/fontawesome.min.js"></script>
    <script src="./app/assets/js/swiper/swiper.min.js"></script>
    <link rel="stylesheet" href="./app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./app/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="./app/assets/css/swiper/swiper.min.css">
    <link rel="stylesheet" href="./app/assets/css/style.css">
</head>
<body>

  <?php include _view . 'layouts/header.php'?>
<!--   <?php //include _view.$view.'_tpl.php' ?>
  <?php //include _view.'layouts/footer.php'  ?> -->
</body>
</html>
<style>
  @media (min-width: 1200px){
.container {
    max-width: calc(100% - 98px);
    /* display: block; */
}
}
.swiper-slide-slider{
  width: 100% !important;
}
</style>