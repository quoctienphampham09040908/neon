<div class="mt-5">
	<div class="panel-body-ad">
		<div class="title">
			<span class="text-uppercase"> Thêm mới </span>
		</div>
		<div>
			<form action="<?= str_replace('act=edit', 'act=save', $_SERVER['REQUEST_URI']) ?>" method="post">
				<div class="col-md-6 form-box" ?>
					<select class="form-control form-control-custom-admin rounded-0" name="type_default">
						<?php foreach ($categories as $key => &$value) { ?>
							<option <?= isset($_REQUEST['type']) && $_REQUEST['type'] == $value? 'selected' : '' ?> value="<?= $value ?>"><?= $key ?></option>
						<?php 	} ?>
					</select>
				</div>
				<div class="claerfix"></div>
				<div class="col-md-6 form-box" ?>
					<?php foreach ($attr['default']['input'] as $key_attr => $r_attr) { ?>
						<label for="<?= $r_attr['name'] ?>_default"><?= $key_attr ?>: </label>
						<input class="form-control form-control-custom-admin rounded-0" id="<?= $r_attr['name'] ?>_default" name="<?= $r_attr['name'] ?>_default" type="<?= $r_attr['type'] ?>" placeholder="<?= $r_attr['placeholder'] ?>">
					<?php } ?>
				</div>
				<div class="col-md-6 form-box" ?>
					<?php foreach ($attr['default']['select'] as $key_attr => $r_attr) { ?>
						<div class="form-group">
							<label for="<?= $r_attr['name'] ?>_default"><?= $key_attr ?>: </label>
							<select class="form-control form-control-sm rounded-0" name="<?= $r_attr['name'] ?>_default" id="<?= $r_attr['name'] ?>_default">
								<?php foreach ($r_attr['value'] as $name => $r_attr_item) { ?>
									<option value="<?= $r_attr_item ?>"><?= $name ?></option>
								<?php } ?>
							</select>
						</div>
					<?php } ?>
				</div>

				<div class="clearfix none-clearfix"></div>
				<div class="col-md-6 form-box">
					<label for="">Hình ảnh: </label>
					<img class="img-thumbnail" id="thumbnail-preview" src="" alt="">
					<input type="hidden" id="thumbnail_default" name="thumbnail_default">
					<a class="btn btn-dark" href="javascript:void(0)" onclick="selectFileWithCKFinder('thumbnail-preview','thumbnail_default');">Chọn hình</a>
					<a class="btn btn-danger" onclick="removeCurrentImage('thumbnail-preview','thumbnail_default')" href="javascript:void(0)">Xóa hình</a>
				</div>
				<div class="clearfix none-clearfix"></div>
				<!-- translate start -->
				<div class="col-12">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<?php foreach ($language as $index =>  $r_lang) { ?>
							<li class="nav-item">
								<a class="nav-link <?= $index == 0 ? 'active' : '' ?>" id="lang-tab-<?= $r_lang['uri'] ?>" data-toggle="tab" href="#lang-<?= $r_lang['uri'] ?>" role="tab" aria-controls="lang-<?= $r_lang['uri'] ?>" aria-selected="<?= $index == 0 ? true : false ?>"><?= $r_lang['uri'] ?></a>
							</li>
						<?php } ?>

					</ul>
					<div class="tab-content" id="myTabContent">
						<?php foreach ($language as $index =>  $r_lang) { ?>
							<div class="tab-pane fade <?= $index == 0 ? 'show active' : '' ?> " id="lang-<?= $r_lang['uri'] ?>" role="tabpanel" aria-labelledby="lang-tab-<?= $r_lang['uri'] ?>">
								<?php foreach ($attr['translate']['content'] as $key_attr => $r_attr) { ?>
									<?php if ($r_attr['input-type'] == "input") { ?>
										<div class="col-md-10 form-box">
											<div class="form-group">
												<label for="<?= $r_attr['name'] ?>_translate_<?= $r_lang['uri'] ?>"><?= $key_attr ?>: </label>
												<input type="text" placeholder="<?= $r_attr['placeholder'] ?>" name="<?= $r_attr['name'] ?>_translate_<?= $r_lang['uri'] ?>" id="<?= $r_attr['name'] ?>_translate_<?= $r_lang['uri'] ?>" class="form-control rounded-0">
											</div>
										</div>
									<?php } ?>
									<?php if ($r_attr['input-type'] == "text") { ?>
										<div class="col-md-10 form-box">
											<div class="form-group">
												<label for="<?= $r_attr['name'] ?>_translate_<?= $r_lang['uri'] ?>"><?= $key_attr ?>: </label>
												<textarea class="form-control rounded-0" name="<?= $r_attr['name'] ?>_translate_<?= $r_lang['uri'] ?>" id="<?= $r_attr['name'] ?>_translate_<?= $r_lang['uri'] ?>" placeholder="<?= $r_attr['placeholder'] ?>"></textarea>
											</div>
										</div>
									<?php } ?>
									<?php if ($r_attr['input-type'] == "editor") { ?>
										<div class="col-md-10 form-box">
											<div class="form-group">
												<label for="<?= $r_attr['name'] ?>_translate_<?= $r_lang['uri'] ?>"><?= $key_attr ?>: </label>
												<textarea class="form-control rounded-0 editor" name="<?= $r_attr['name'] ?>_translate_<?= $r_lang['uri'] ?>" id="<?= $r_attr['name'] ?>_translate_<?= $r_lang['uri'] ?>" placeholder="<?= $r_attr['placeholder'] ?>"></textarea>
											</div>
										</div>
									<?php } ?>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				</div>
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