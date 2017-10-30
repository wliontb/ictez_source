<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly') ?>">Quản lý</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly/theloai') ?>">Thể loại</a>
    <span class="breadcrumb-item active"><?php echo $datatype['Name'] ?></span>
</nav>
<div class="row">
	<div class="col-12">
		<div class="custom-panel rounded">
			<div class="custom-panel-heading">
					<ul class="nav nav-pills" id="pills-tab" role="tablist">
	  					<li class="nav-item">
	    					<a class="nav-link active text-white" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Chi tiết</a>
	  					</li>
	  					<li class="nav-item">
	    					<a class="nav-link text-white" id="pills-edit-tab" data-toggle="pill" href="#pills-edit" role="tab" aria-controls="pills-edit" aria-selected="false">Sửa thể loại</a>
						</li>
	  					<li class="nav-item">
	    					<a class="nav-link text-white" id="pills-setting-tab" data-toggle="pill" href="#pills-setting" role="tab" aria-controls="pills-setting" aria-selected="false">Cài đặt</a>
	  					</li>
					</ul>
			</div>
			<div>
				<div class="tab-content p-2" id="pills-tabContent">
					<?php 
					echo (is_null($this->session->flashdata('alert'))) ? '' : '<div class="alert alert-success">'.$this->session->flashdata('alert').'</div>';
					echo validation_errors('<div class="alert alert-danger">','</div>');
					 ?>
  					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
  						<p><b>Số bài viết </b>: <?php echo $countpost ?></p>
  						<p><b>Số người quản lý</b>: <?php echo $countmanager ?></p>
  						<p><b>Ngày tạo</b>: <?php echo date('d/m/Y',$datatype['Date_create']) ?></p>
  						<p><b>Chỉnh sửa lần cuối</b>: <?php echo date('d/m/Y',$datatype['Date_modify']) ?></p>
  					</div>
  					<div class="tab-pane fade" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab">
  						<form method="POST" class="p-1">
							<div class="form-group">
								<label>Tên thể loại</label>
								<input type="text" name="Name" placeholder="Tên của thể loại" value="<?php echo $datatype['Name'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Giới thiệu thể loại</label>
								<textarea name="Intro" placeholder="Miêu tả thể loại" class="form-control" row="2"><?php echo $datatype['Intro'] ?></textarea>
							</div>
							<div class="form-group">
								<label>Người quản lý (ID)</label>
								<input type="text" name="Manager" value="<?php echo $datatype['Manager'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Thuộc chuyên mục</label>
								<select class="form-control" name="ID_cate">
									<option>Chọn chuyên mục</option>
									<?php foreach($datacates as $cm) : ?>
									<option value="<?php echo $cm['ID'] ?>" <?php echo ($cm['ID'] == $datatype['ID_cate']) ? 'selected' : ''; ?>>
										<?php echo $cm['Name'] ?>
									</option>
									<?php endforeach; ?>
								</select>
							</div>
							<button type="submit" class="btn btn-warning">Lưu</button>
						</form>
  					</div>
  					<div class="tab-pane fade" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
  						<form class="p-1">
							<div class="form-group">
								<label>Người quản lý (ID)</label>
								<?php foreach($idmanager as $ql): ?>
								<p><a href="<?php echo base_url('thanhvien-'.$ql) ?>"><?php echo $this->UserModel->getUser($where = 'ID='.$ql)['Username'] ?></a></p>
								<?php endforeach; ?>
								<input type="text" name="Manager" value="<?php echo $datatype['Manager'] ?>" class="form-control" data-toggle="tooltip" data-placement="left" tibve="Mỗi ID cách nhau bởi dấu phẩy" id="fuck" placeholder="1,2,...">
							</div>
							<button type="submit" class="btn btn-warning">Lưu</button>
							<a href="<?php echo base_url('quanly/xoatheloai-'.$datatype['ID']) ?>" class="btn btn-danger">Xóa thể loại</a>
						</form>
						
  					</div>
				</div>
			</div>			
		</div>
	</div>
	<div class="col-12 mt-md-2">
		<table class="table table-sm table-info">
		  	<thead>
		    	<tr>
			    	<th scope="col">#</th>
					<th scope="col">Bài viết</th>
					<th scope="col">Mô tả</th>
					<th scope="col">Người đăng</th>
					<th scope="col">Ngày tạo</th>
					<th scope="col">Tác vụ</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php if(empty($dataposts)) : ?>
		  			<p class="text-center">
		  				<b>Chưa có bài viết <a href="<?php echo base_url('quanly/thembaiviet') ?>">Thêm bài viết!</a></b>
		  			</p>
		  		<?php endif; ?>
		  		<?php foreach($dataposts as $bv): ?>
		    	<tr>
			      	<th scope="row"><?php echo $bv['ID'] ?></th>
			      	<td><a href="<?php echo base_url('baiviet-'.$bv['ID']) ?>"><?php echo $bv['Title'] ?></a></td>
			      	<td><?php echo $bv['Des'] ?></td>
			      	<td><?php echo $bv['Username'] ?></td>
			      	<td><?php echo date('d/m/Y',$bv['Date_create']) ?></td>
			      	<td>
			      		<a href="<?php echo base_url('quanly/baiviet-'.$bv['ID']) ?>" class="btn btn-info">Quản lý</a>
			      		<a href="<?php echo base_url('quanly/suabaiviet-'.$bv['ID']) ?>" class="btn btn-warning">Sửa</a>
			      		<a href="#" class="btn btn-danger">Xóa</a>
			      	</td>
		    	</tr>
		    	<?php endforeach; ?>
		  	</tbody>
		</table>
	</div>

</div>