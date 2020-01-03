<nav class="menu-mobile d-lg-none d-md-block">
	<div class="nav-bar-mobile">
		<a class="btn-mmenu">
			<i class="fas fa-bars"></i>
		</a>
	<!-- 	<a href="">
			<img src="" alt="" class="logo">
		</a> -->
		<ul id="mmenumobile">
			<li><a href="#"><i class="fas fa-home"></i></a></li>
			<li>
				<a href="#">Sản Phẩm <span><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="284.929px" height="284.929px" viewBox="0 0 284.929 284.929" style="enable-background:new 0 0 284.929 284.929;"
	 xml:space="preserve">
<g>
	<path d="M282.082,76.511l-14.274-14.273c-1.902-1.906-4.093-2.856-6.57-2.856c-2.471,0-4.661,0.95-6.563,2.856L142.466,174.441
		L30.262,62.241c-1.903-1.906-4.093-2.856-6.567-2.856c-2.475,0-4.665,0.95-6.567,2.856L2.856,76.515C0.95,78.417,0,80.607,0,83.082
		c0,2.473,0.953,4.663,2.856,6.565l133.043,133.046c1.902,1.903,4.093,2.854,6.567,2.854s4.661-0.951,6.562-2.854L282.082,89.647
		c1.902-1.903,2.847-4.093,2.847-6.565C284.929,80.607,283.984,78.417,282.082,76.511z"/>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg></span></a>
				<!-- <i class="fas fa-chevron-down" data-toggle="collapse" data-target="#sub-m-collapse" onclick="$(this).hide(0); $(this).next().show(0);"></i>
				<i class="fas fa-minus " data-toggle="collapse" data-target="#sub-m-collapse" style="display: none;" onclick="$(this).hide(0); $(this).prev().show(0);"></i> -->
				<ul>
					<li>
						<div class="item-nav">
						   <div class="thumb">
						   	<!-- <img src="<?= _storage.'vio.jpg' ?>" alt=""> -->
						   </div>
						   <div class="heading">
						   	 <span>Vio 1</span>
						   </div>
					    </div>
				     </li>
					<li>
						<div class="item-nav">
						   <div class="thumb">
						   	<!-- <img src="<?= _storage.'vio.jpg' ?>" alt=""> -->
						   </div>
						   <div class="heading">
						   	 <span>Vio 2</span>
						   </div>
					    </div>
					</li>
					<li>
						<div class="item-nav">
						   <div class="thumb">
						   	<!-- <img src="<?= _storage.'vio.jpg' ?>" alt=""> -->
						   </div>
						   <div class="heading">
						   	 <span>Vio 3</span>
						   </div>
					    </div>
					</li>
				</ul>  
			</li>
			<li>
				<a href="#">Về Chúng Tôi</a>
			</li>
					
			<li><a href="">Liên Hệ</a></li>

		</ul>
	</div>
</nav>

<script>
	$('#mmenumobile > li > a').click(function(event) {
		$(this).next('ul').toggle(500);
	});
	// $('.nav-bar-mobile').css('height',$(window).height()+"px");
	// $('.btn-mmenu').click(function(event) {
	// 	 $('#mmenumobile').toggleClass('active');

	// });
	// $('#mmenumobile > li > a').click(function(event) {
	// 	$(this).next().toggle();
	// });
</script>

<style>
ul#mmenumobile a{
	text-decoration: none;
}
ul#mmenumobile svg{
	    width: 12px;
    height: 12px;
    margin-top: -5px;

}
	ul#mmenumobile {
       align-items: center;
    justify-content: center;
    flex-direction: column;
    display: flex;
}
ul#mmenumobile > li > ul{
	display: none;
}
</style>

<!-- <style>
	.nav-bar-mobile > ul{
    opacity: 0;
    width: 100%;
    height: 0;
    z-index: -1;
}
.nav-bar-mobile > ul.active {
    display: flex;
    /*width: 100%;*/
    height: auto;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    overflow: hidden;
    opacity: 1;
      transition: 1s;
      z-index: 1;

}
.nav-bar-mobile > a:hover{
    text-decoration: none;
}
.nav-bar-mobile{
    overflow: auto;
}
#mmenumobile ul{
    display: none;
}
</style> -->