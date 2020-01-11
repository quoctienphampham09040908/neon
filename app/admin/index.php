<?php 
  session_start();
  date_default_timezone_set("Asia/Ho_Chi_Minh");
  @define('_app', '../../app/admin/');
  @define('_asset', './../app/assets/');
  @define('_view', '../../app/admin/views/');
  @define('_controller', '../../app/admin/controllers/');
  @define('_lib', '../../lib/');
  @define('_storage', './../storage/');
  include_once _lib."config.php";
  include_once _lib."functions.php";
  include_once _lib."class.database.php";
  //include_once _lib."pagination.php";
  include_once _lib."file_requick_admin.php";
  include_once _lib."function.php";
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
            <?php include _view.$view.'_v.php' ?>
        </div>
    <?php else: ?>
      <div class="col-md-3">
           <?php include _view.'layouts/menu-left.php' ?>
      </div>
      <div class="col-md-9">
            <?php include _view.$view.'_v.php' ?>
      </div>
    <?php endif ?>

    </div>
  </div>
  <div class="container">
      <?php include _view.'layouts/footer.php'  ?>
  </div>
</body>
</html>
<!--   <script>
function call_image() {
var finder = new CKFinder();
finder.basePath = '../';
finder.selectActionFunction = SetFileField;
finder.popup();
}
function SetFileField(fileUrl) {
  $('input[name="thumbnail"]').val(fileUrl);
$('#thumbnail').attr("src",fileUrl);
}
CKEDITOR.replace( 'editor' );

</script> -->
<script>
    $(document).ready(function() {
    $(".editor").each(function() {
      CKEDITOR.replace( this.id, {
        baseHref: "<?= getBaseURL(true) ?>",
        contentsCss: ['<?=getBaseURL(true)?>app/assets/css/bootstrap.min.css'],
        // enterMode: CKEDITOR.ENTER_BR,
        autoParagraph: false,
        qtBorder: '1',
        qtStyle: { 'border-collapse' : 'collapse' },
        qtClass: 'table_ckeditor',
        qtCellPadding: '5',
        qtCellSpacing: '5',
        width: '100%',
        height: 350,
        removePlugins : 'elementspath',
        filebrowserImageBrowseUrl: '<?=getBaseURL(true)?>app/assets/ckfinder/ckfinder.html',
        filebrowserFlashBrowseUrl: '<?=getBaseURL(true)?>app/assets/ckfinder/ckfinder.html',
        filebrowserLinkBrowseUrl: '<?=getBaseURL(true)?>app/assets/ckfinder/ckfinder.html'
      });
    });
    $('*[disabled]').each(function() {
      $('form').append('<input name="'+$(this).attr('name')+'" type="hidden" value="'+$(this).val()+'">');
    });
  });
  function openBrowser(imgid, inputid, rf=undefined, cb=undefined) {
    var selectedImage = function(fileUrl) {
      if(rf == undefined || rf == false) {
        $(imgid).attr("src", "../" + fileUrl);
        $(inputid).val(fileUrl);
        if(cb != undefined || cb == false) {
          setTimeout(function() { cb(fileUrl); }, 100);
        }
      }
      else {
        rf(fileUrl);
      }
    };
    var finder = new CKFinder();
    finder.selectActionFunction = selectedImage;
    finder.popup();
  }
</script>