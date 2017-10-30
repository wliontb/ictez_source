<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly') ?>">Quản lý</a>
    <span class="breadcrumb-item active">Thể loại</span>
</nav>
<div class="row">
	<div class="col-4">
		<div class="custom-panel rounded">
			<div class="custom-panel-heading">
				<h2>Thêm thể loại mới</h2>
			</div>
			<form method="POST" class="p-1">
				<?php 
				echo (is_null($this->session->flashdata('alert'))) ? '' : '<div class="alert alert-success">'.$this->session->flashdata('alert').'</div>';
				echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
				<div class="form-group">
					<label>Tên thể loại</label>
					<input type="text" name="Name" placeholder="Tên của thể loại" class="form-control">
				</div>
				<div class="form-group">
					<label>Giới thiệu thể loại</label>
					<textarea name="Intro" placeholder="Miêu tả thể loại" class="form-control" row="2"></textarea>
				</div>
				<div class="form-group">
					<label>Thuộc chuyên mục</label>
					<select class="form-control" name="ID_cate">
						<option>Chọn chuyên mục</option>
						<?php foreach($datacates as $cm) : ?>
						<option value="<?php echo $cm['ID'] ?>"><?php echo $cm['Name'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label>Người quản lý (ID)</label>
					<input type="text" name="Manager" class="form-control" data-toggle="tooltip" data-placement="left" title="Mỗi ID cách nhau bởi dấu phẩy" id="fuck" placeholder="1,2,...">
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
					<th scope="col">Ngày tạo</th>
					<th scope="col">Chuyên mục</th>
					<th scope="col">Tác vụ</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php foreach($datatypes as $tl): ?>
		    	<tr>
			      	<th scope="row">1</th>
			      	<td><a href="<?php echo base_url('theloai-'.$tl['ID']) ?>"><?php echo $tl['Name'] ?></a></td>
			      	<td><?php echo $tl['Intro'] ?></td>
			      	<td><?php echo date('d/m/Y',$tl['Date_create']) ?></td>
			      	<td><a href="<?php echo base_url('quanly/chuyenmuc-'.$tl['ID_cate']); ?>">
			      			<?php echo $this->PostModel->getCate($tl['ID_cate'])['Name'] ?>
			      		</a>
			      	</td>
			      	<td>
			      		<a href="<?php echo base_url('quanly/theloai-'.$tl['ID']) ?>" class="btn btn-info">Quản lý</a>
			      		<a href="#" class="btn btn-danger">Xóa</a>
			      	</td>
		    	</tr>
		    	<?php endforeach; ?>
		  	</tbody>
		</table>
	</div>

</div>