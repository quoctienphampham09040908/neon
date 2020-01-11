<div class="mt-5">
	<div class="panel-body-ad">
		<div class="title">
			<span class="text-uppercase">  </span>
		</div>
		<div >
		  <table class="table_custom_admin">
			  	<thead>
			  		<tr>
			  				<td>
			  				  <b>STT</b>
			  				</td>
			  				<td>
			  					<b>Tiêu đề</b>
			  				</td>
			  				<td>
			  					<b>Loại danh mục</b>
			  				</td>
			  				<td>
			  					<b>Cập nhật</b>
			  				</td>
			  				<td>
			  					 <b> Xóa </b>
			  				</td>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<? foreach ($category_list as $key => $value) { ?>
			  		 <tr>
			  		 	<td>
			  		 		<?= ($key + 1) ?>
			  		 	</td>
			  		 	<td>
			  		 		<?= $value['title'] ?>
			  		 	</td>
			  		 	<td>
			  		 		 <?= array_search($value['type'], $categories); ?>
			  		 	</td>
			  		 	<td>
			  		 		<a href="<?= str_replace('act=list','act=edit',$_SERVER['REQUEST_URI']).'&id='.$value['id'].'' ?>"><i class="fas fa-exchange-alt"></i>
			  		 		</a>
			  		 	</td>
			  		 	<td>
			  		 		<a href="<?= str_replace('act=list','act=remove',$_SERVER['REQUEST_URI']).'&id='.$value['id'].'' ?>"><i class="fas fa-trash"></i>
			  		 		</a>
			  		 	</td>
			  		 </tr>
			  	 	<? } ?>
			  	</tbody>
		  </table>
		  <br>
		  <div>
		  	<a  href="<?= str_replace('act=list','act=edit',$_SERVER['REQUEST_URI']) ?>" class="btn btn-success ml-1">Thêm mới</a>
		  </div>
		  <div class="col-xs-12">
		  	
		  </div>
			
			
		</div>
	</div>
</div>
