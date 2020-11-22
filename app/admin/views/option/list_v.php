<div>
	<div class="panel-body-ad d-flex flex-column">
		<div id="table-<?= $com ?>-list" class="pb-1 ">
			<table class="table_custom_admin">
				<thead>
					<tr>
						<td>
							<b><input type="checkbox" name="check_all"> </b>
						</td>
						<td>
							<b>STT</b>
						</td>
						<td>
							<b>Tiêu đề</b>
						</td>
						<?php foreach ($attr['list']['thumbnail'] as $attr_name => $r_status) { ?>
							<td><?= $attr_name ?></td>
						<?php } ?>
						<td>
							<b>Loại danh mục</b>
						</td>
						<?php foreach ($attr['list']['status'] as $attr_name => $r_status) { ?>
							<td><?= $attr_name ?></td>
						<?php } ?>
						<td>
							<b>Cập nhật</b>
						</td>
						<td>
							<b> Xóa </b>
						</td>
					</tr>
				</thead>
				<tbody>
					<?php if ($items != false) { ?>
						<?php foreach ($items as $key => $value) { ?>
							<tr>
								<td>
									<input type="checkbox" name="check[]" value="<?= $value['id'] ?>">
								</td>
								<td>
									<?= ($key + 1) ?>
								</td>
								<td>
									<?= $value['title'] ?>
								</td>
								<?php foreach ($attr['list']['thumbnail'] as $attr_name => $r_status) { ?>
									<td>
										<?php include _view . 'input/thumbnail.php' ?>
									</td>
								<?php } ?>
								<td>
									<?= array_search($value['type'], $categories); ?>
								</td>
								<?php foreach ($attr['list']['status'] as $attr_name => $r_status) { ?>
									<td>
										<?php include _view . 'input/status.php' ?>
									</td>
								<?php } ?>
								<td>
									<?php include _view . 'input/edit_popup.php' ?>
								</td>
								<td>
									<?php include _view . 'input/remove.php' ?>
								</td>
							</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="d-flex  justify-content-center mt-3 mb-3">
			<?php echo $paging ?>
		</div>
	</div>
</div>

<?php include _view . 'input/setting.php' ?>