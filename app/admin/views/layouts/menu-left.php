<nav class="nav_left mt-5">
	<button  class="btn btn-dark btn-dark-custom"  data-toggle="collapse" data-target="#current_user"><i class="fas fa-user"></i></button>
	<div id="current_user" class="nav_left_childx2 collapse">
		<div class="admin_current_box">
			<div class="thumb d-flex justify-content-center align-items-center">
				<img class="img-thumbnail" src="<?= _storage."admin_avatar.jpg" ?>" alt="">
			</div>
			<div class="heading">
				<span class="user_name">Dép Lào<!-- <?= $current_user['user_name'] ?> --></span>
				<span class="description_of_user">
					
				</span>
			</div>
			<div class="d-flex justify-content-center align-items-center">
				<a class="btn btn-primary mr-1" href="<?=$config_url?>/admin/index.php?com=user&act=change">
					<i class="fas fa-exchange-alt"></i>
				</a>
				<a class="btn btn-danger ml-1" href=" <?=$config_url?>/admin/index.php?com=user&act=logout"><i class="fas fa-sign-out-alt"></i></a>
			</div>
		</div>
	</div>
	<br>
	<ul class="nav_left_child">
		<li class="mt-1">
			<button  class="btn btn-dark btn-dark-custom"  data-toggle="collapse" data-target="#category_">Quản lý danh mục</button>
			<ul id="category_" class="nav_left_childx2 collapse">
				<li>
					<a href="<?= $config_url?>/admin/index.php?com=category&act=edit">Thêm mới</a>
				</li>
				<li>
					<a href="<?= $config_url?>/admin/index.php?com=category&act=list">Tất cả danh mục</a>
				</li>
			</ul>
		</li>
		<li class="mt-1">
			<button class="btn btn-dark btn-dark-custom"  data-toggle="collapse" data-target="#product_">Product Manager</button>
			<ul id="product_" class="nav_left_childx2 collapse">
				<li>1</li>
				<li>2</li>
				<li>3</li>
			</ul>
		</li>
		<li class="mt-1">
			<button class="btn btn-dark btn-dark-custom"  data-toggle="collapse" data-target="#post_">Post Manager</button>
			<ul id="post_" class="nav_left_childx2 collapse">
				<li>1</li>
				<li>2</li>
				<li>3</li>
			</ul>
		</li>
	</ul>
</nav>