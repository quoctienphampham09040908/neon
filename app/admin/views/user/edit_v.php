<div class="mt-5 ">
	<div class="panel-body-ad center-block">
		<div class="title">
			<span> </span>
		</div>
		<br>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="save">
			<div class="col-md-6 d-block mx-auto">
				<label class="thumb_avatar d-flex justify-content-center" for="avatar">
					<img height="40" width="40" src="<?= !empty($user['thumbnail'])? _storage.$user['thumbnail']  : _asset.'image/avatar_default.png'; ?>" alt="">
				</label>
				<input id="avatar" name="avatar" type="file" class="d-none">
			</div>
			<div class="col-md-6 d-block mx-auto">
				<label for="user_name">User name</label>
				<input readonly id="user_name" class="form-control" type="text" name="user_name" value="<?= $user['user_name'] ?>">
			</div>
			<div class="col-md-6 d-block mx-auto">
				<label for="password">Password</label>
				<input id="password" class="form-control" type="password" name="password" value="<?= $user['password'] ?>">
			</div>
			<div class="d-block mx-auto col-md-6 d-flex justify-content-center align-items-center mt-1">
				<button class="col-md-4 btn btn-success" type="submit">
				<i class="fas fa-edit"></i>
				</button>
			</div>
		</form>
	</div>
</div>
<script>
	var file = null;
$('#avatar').change(function(e) {
	if ($(this).val().length > 0) {
		file = $(this)[0].files[0].mozFullPath;
		console.log(file);
	     var reader = new FileReader();
	    reader.onload = function(){
	      var dataURL = reader.result;
	       $('.thumb_avatar > img').attr('src',dataURL);
	    };
	    reader.readAsDataURL($(this)[0].files[0]);
    }else{
    	$(this).val() = file;
    }
});

</script>