<div class="mt-5">
	<div class="panel-body-ad">
		<div class="title">
			<span class="text-uppercase"> Cập nhật </span>
		</div>
		<div >
			<form  action="<?= str_replace('act=edit','act=save',$_SERVER['REQUEST_URI']) ?>" method="post"  >
				<div class="col-md-6 form-box" ?>
					<select class="form-control form-control-custom-admin" name="type">
						<? foreach ($categories as $key => $value) { ?>
						<option <?= $category['type'] == $value ? 'selected' : '' ?> value="<?= $value ?>"><?=  $key ?></option>
						<? 	} ?>
					</select>
				</div>
				<div class="claerfix"></div>
				<div class="col-md-6 form-box" ?>
					<? foreach ($attr['input'] as $key => $value) { ?>
					<label for="<?= $value ?>"><?= $key ?>:  </label>
					<input value="<?= $category[$value] ?>" class="form-control form-control-custom-admin " id="<?= $value ?>" name="<?= $value ?>">
					<? } ?>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-6 form-box">
					<label for="">Hình ảnh: </label>
					<img class="img-thumbnail" id="thumbnail" src="<?= $category['thumbnail'] ?>" alt="">
					<input type="hidden" value="<?= $category['thumbnail'] ?>" name="thumbnail">
					<a class="btn btn-dark" href="javascript:void(0)" onclick="call_image();" >Chọn hình</a>
				</div>
				<? foreach ($attr['textarea'] as $key => $value) { ?>
				<div class="col-md-6 form-box">
					<label for="<?= $value?>"><?= $key ?></label>
					<textarea id="<? $value?>" name="<?= $value ?>" class="form-control form-control-custom-admin" >
						<?= $category[$value] ?>
					</textarea>
				</div>
				<? 	} ?>
				<? foreach ($attr['editor'] as $key => $value) { ?>
					<div class="col-md-10 form-box">
						<?= $key ?>
						<textarea  id="<?= $value ?>" name="<?= $value ?>" class="form-control editor form-control-custom-admin" ><?= $category[$value] ?></textarea>
					</div>
				<? 	} ?>
				
				<div class="clearfix"></div>
				<div class="col-md-6 form-box ">
					<center>
					<button type="submit" class="btn btn-success">
					     Cập nhật
					</button>
					</center>
				</div>
			</form>
			
			
		</div>
	</div>
</div>
