<?php

  session_start();
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  @define('_app', '../../app/admin/');
  @define('_asset', './../app/assets/');
  @define('_view', '../../app/admin/views/');
  @define('_controller', '../../app/admin/controllers/');
  @define('_lib', '../../lib/');
  @define('_storage', '../../storage/');
  include_once _lib . "config.php";
  include_once _lib . "function.php";
  include_once _lib . "class.database.php";
  include_once _lib . "file_requick_admin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neon</title>
    <script src="../app/assets/js/jquery-3.4.1.min.js"></script>
    <script src="../app/assets/js/bootstrap.min.js"></script>
    <script src="../app/assets/js/fontawesome.min.js"></script>
    <script src="../app/assets/js/swiper/swiper.min.js"></script>
    <link rel="stylesheet" href="../app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../app/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="../app/assets/css/swiper/swiper.min.css">
    <link rel="stylesheet" href="../app/assets/css/style_admin.css">
    <script src="../app/assets/ckeditor/ckeditor.js"></script>
    <script src="../app/assets/ckfinder/ckfinder.js"></script>
</head>
<body>
 <!--  <div class="container">
  <?php //include _view.'layouts/header.php'  ?>
  </div> -->
  <div class="container-fluid">
    <div class="row">
    <?php if (!isset($_COOKIE['admin'])): ?>
       <div class="col-md-12">
            <?php include _view . $view . '_v.php'?>
        </div>
    <?php else: ?>
      <div class="col-md-3">
           <?php include _view . 'layouts/menu-left.php'?>
      </div>
      <div class="col-md-9">
            <?php include _view . $view . '_v.php'?>
      </div>
    <?php endif?>

    </div>
  </div>
  <div class="container">
      <?php include _view . 'layouts/footer.php'?>
  </div>
</body>
<script>
function selectFileWithCKFinder(thumbnail_preview, elementId) {
    CKFinder.popup({
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function(finder) {
            finder.on('files:choose', function(evt) {
                var file = evt.data.files.first();
                var output = document.getElementById(elementId);
                var view = document.getElementById(thumbnail_preview);
                view.src = '../' + file.getUrl();
                output.value = file.getUrl();
            });

            finder.on('file:choose:resizedImage', function(evt) {
                var output = document.getElementById(elementId);
                output.value = evt.data.resizedUrl;
            });
        }
    });
}
function removeCurrentImage(thumbnail_preview, elementId) {
    document.getElementById(elementId).value = "";
    document.getElementById(thumbnail_preview).src = "";
}

$('.editor').each(function(index, el) {
  CKEDITOR.replace(this.id, {
      baseHref: "<?= getBaseURL(true) ?>",

      filebrowserImageBrowseUrl: '<?=getBaseURL(true)?>app/assets/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '<?=getBaseURL(true)?>app/assets/ckfinder/ckfinder.html?type=Images',

      // filebrowserFlashBrowseUrl: '<?=getBaseURL(true)?>app/assets/ckfinder/ckfinder.html',
      // filebrowserLinkBrowseUrl: '<?=getBaseURL(true)?>app/assets/ckfinder/ckfinder.html',
      filebrowserWindowWidth: '1000',
      filebrowserWindowHeight: '700'
  });
});




</script>

</html>
 