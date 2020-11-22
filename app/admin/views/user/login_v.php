	<div class="row login-admin-view d-flex justify-content-center align-items-center	">
		<div class="col-md-6 col-12">
			<form style="width: 100%;" action="" method="post">
				<span class="d-flex justify-content-center title-login">Đăng Nhập</span>
				<div class="user_login col-md-9 col-12">
					<input class="form-control rounded-0 position-relative" autocomplete="off" placeholder="Tên Đăng Nhập"  type="text" name="user_name">
				</div>
				<div class="clearfix mt-3"></div>
				<div class="user_login col-md-9 col-12">
					<input class="form-control rounded-0" placeholder="Mật Khẩu" autocomplete="off" type="password" name="password">
				</div>
				<div class="user_login col-md-9 mt-1">
					<button type="submit" class="btn btn-gradient user_login col-md-2 rounded-0 not-focusable">
						<i class="fas fa-sign-in-alt text-white"></i>
					</button>
				</div>
			</form>
		</div>
		<div class="col-md-6 col-12 d-flex">
			<div class="info-support d-flex flex-column text-center align-item-center w-100">
				<span class="telephone-support">
					CSKH: 0939432055
				</span>
				<span class="info-version-page">
					Số phiên bản: v1.0
				</span>
			</div>
		</div>
	</div>
	<script>
		$('.login-admin-view').css('min-height', $(window).outerHeight(true));
	</script>