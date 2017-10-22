<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly') ?>">Quản lý</a>
    <span class="breadcrumb-item active">Chuyên mục</span>
</nav>
<div class="row">
	<div class="col-4">
		<div class="custom-panel rounded">
			<div class="custom-panel-heading">
				<h2>Thêm chuyên mục mới</h2>
			</div>
			<form method="POST" class="p-1">
				<div class="form-group">
					<label>Tên chuyên mục</label>
					<input type="text" name="" class="form-control">
				</div>
				<div class="form-group">
					<label>Giới thiệu chuyên mục</label>
					<textarea name="" class="form-control" row="2"></textarea>
				</div>
				<div class="form-group">
					<label>Người quản lý (ID)</label>
					<input type="text" name="" class="form-control" data-toggle="tooltip" data-placement="left" title="Mỗi ID cách nhau bởi dấu phẩy" id="fuck" placeholder="1,2,...">
				</div>
				<button type="submit" class="btn btn-success">Thêm</button>
			</form>
		</div>
	</div>
	<div class="col-8 mt-md-3">
		<table class="table table-sm table-success">
		  	<thead>
		    	<tr>
			    	<th scope="col">#</th>
					<th scope="col">Tên</th>
					<th scope="col">Giới thiệu</th>
					<th scope="col">Người tạo</th>
					<th scope="col">Ngày tạo</th>
					<th scope="col">Tác vụ</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach($datacates as $cm): ?>
		    	<tr>
			      	<th scope="row">1</th>
			      	<td><a href="<?php echo base_url('quanly/chuyenmuc-'.$cm['ID']) ?>"><?php echo $cm['Name'] ?></a></td>
			      	<td><?php echo $cm['Intro'] ?></td>
			      	<td><?php echo $cm['Manager'] ?></td>
			      	<td><?php echo date('d/m/Y',$cm['Date_create']) ?></td>
			      	<td>
			      		<a href="<?php echo base_url('quanly/chuyenmuc-'.$cm['ID']) ?>" class="btn btn-warning">Sửa</a>
			      		<a href="#" class="btn btn-danger">Xóa</a>
			      	</td>
		    	</tr>
		    	<?php endforeach; ?>
		  	</tbody>
		</table>
	</div>

</div>