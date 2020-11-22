<div id="sidebar-admin" role="tablist" aria-multiselectable="true">
	<div class="w-100">
		<div class="dropdown open">
			<button class="not-focusable btn current-user-button-toggle  dropdown-toggle d-flex" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<div>
					<img src="../" alt="">
				</div>
				<span class="current-user-name text-uppercase">
					<?php echo $current_user['user_name'] ?>
				</span>
			</button>
			<div class="dropdown-menu w-100 rounded-0 justify-content-center flex-column mt-0" aria-labelledby="triggerId">
				<a class="dropdown-item d-flex justify-content-center" href="#">Setting</a>
				<a class="dropdown-item d-flex justify-content-center " href="./index.php?com=user&act=login">Logout</a>
			</div>
		</div>
	</div>
	<?php foreach ($list_com as $com_name =>  $r_com) { ?>
		<?php if ($r_com['list-type']) { ?>
			<div class="card sidebar-card-category rounded-0">
				<div class="card-header" role="tab" id="<?= $com_name ?>">
					<h5 class="mb-0 ">
						<a class=" d-flex w-100 <?= $com == $com_name ? 'active' : 'collapsed '  ?> " data-toggle="collapse" data-parent="#sidebar-admin" href="#<?= $com_name ?>_content" aria-expanded="<?= $com == $com_name ? 'true' : 'false'  ?>" aria-controls="<?= $com_name ?>_content">
							<span class="w-100 d-d-flex">
								<?php echo $r_com['icon'] ?>
								<?php echo $r_com['title'] ?>
							</span>
							<span>
								<i class="far fa-caret-square-down"></i>
							</span>
						</a>
					</h5>
				</div>
				<div id="<?= $com_name ?>_content" class="collapse in <?= $com == $com_name ? 'show' : ''  ?>" role="tabpanel" aria-labelledby="<?= $com_name ?>">
					<?php if (is_array($r_com['type']) && !empty($r_com['type'])) { ?>
						<?php foreach ($r_com['type'] as $type_item =>  $r_type) { ?>
							<div class="card-body <?= $com == $com_name &&  $type_item == $type ? 'active' : '' ?>">
								<a href="./index.php?com=<?= $com_name ?>&type=<?= $type_item ?>&act=<?= $r_type['act'] ?>"><?= $r_type['icon'] ?> <?= $r_type['title'] ?></a>
							</div>
						<?php } ?>
					<?php	} ?>
				</div>
			</div>
		<?php } else { ?>
			<div class="card sidebar-card-category rounded-0">
				<div class="card-header" role="tab" id="<?= $com_name ?>">
					<h5 class="mb-0 ">
						<a class=" d-flex w-100 <?= $com == $com_name ? 'active' : ' '  ?>" href="./index.php?com=<?= $com_name ?>&act=<?= $r_com['act'] ?>">
							<span class="w-100 d-d-flex">
								<?php echo $r_com['icon'] ?>
								<?php echo $r_com['title'] ?>
							</span>

						</a>
					</h5>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
</div>