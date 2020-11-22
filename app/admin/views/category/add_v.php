
<div class="mt-5">
	<div class="panel-body-ad">
		<div class="title">
			<span class="text-uppercase"> Thêm mới </span>
		</div>
		<div >
			<form  action="<?= str_replace('act=edit','act=save',$_SERVER['REQUEST_URI']) ?>" method="post"  >
				<div class="col-md-6 form-box" ?>
					<select class="form-control form-control-custom-admin" name="type">
						<?php foreach ($categories as $key => &$value) { ?>
							<option value="<?= $value ?>"><?=  $key ?></option>
						<?php 	} ?>
					</select>
				</div>
				<div class="claerfix"></div>
				<div class="col-md-6 form-box" ?>
					<?php foreach ($attr['input'] as $key => $value) { ?>
					<label for="<?= $value ?>"><?= $key ?>:  </label>
					<input class="form-control form-control-custom-admin " id="<?= $value ?>" name="<?= $value ?>" type="text">
					<?php } ?>
				</div>
				<div class="clearfix"></div>
				<div class="col-md-6 form-box">
					<label for="">Hình ảnh: </label>
					<img class="img-thumbnail" id="thumbnail-preview" src="" alt="">
					<input type="hidden" id="thumbnail" name="thumbnail">
					<a class="btn btn-dark" href="javascript:void(0)" onclick="selectFileWithCKFinder('thumbnail-preview','thumbnail');" >Chọn hình</a>
					<a class="btn btn-danger" onclick="removeCurrentImage('thumbnail-preview','thumbnail')" href="javascript:void(0)">Xóa hình</a>
				</div>
				<?php foreach ($attr['textarea'] as $key => $value) { ?>
				<div class="col-md-6 form-box">
					<label for="<?= $value?>"><?= $key ?></label>
					<textarea id="<? $value?>" name="<?= $value ?>" class="form-control form-control-custom-admin" ></textarea>
				</div>
				<?php } ?>
				<?php foreach ($attr['editor'] as $key => $value) { ?>
					<div class="col-md-10 form-box">
						 <?= $key ?>
						<textarea  id="<?= $value ?>" name="<?= $value ?>" class="form-control form-control-custom-admin editor" ></textarea>
					</div>
				<?php } ?>
				
				<div class="clearfix"></div>
				<div class="col-md-6 form-box ">
					<center>
					<button type="submit" class="btn btn-success">
					Tạo
					</button>
					</center>
				</div>
			</form>
			
			
		</div>
	</div>
</div>



