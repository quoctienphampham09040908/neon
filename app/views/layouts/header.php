<header>
  <div class="container">
  <?php include _view.'layouts/banner.php' ?>
  </div>
  <div class="container">
	<?php include _view.'layouts/menu-center.php' ?>
  </div>
  <div class="container">
	<?php include _view.'layouts/menu-mobile.php' ?>
  </div>
</header>
<!-- <script>
	   var target = $('div.item-nav > div.thumb img');
      $("div.item-nav > div.thumb").css("height", "calc("+$("div.item-nav > div.thumb").css("width")+" * 150/250)");
      target.css("width", "100%");
      setTimeout(function () {
        if(target.outerHeight() < target.outerHeight()) {
          target.css("width", "auto");
          target.css("max-width", "auto");
          target.css("height", "100%");
        }
      }, 1000);
</script> -->