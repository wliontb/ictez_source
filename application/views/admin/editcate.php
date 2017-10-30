<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly') ?>">Quản lý</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly/chuyenmuc') ?>">Chuyên mục</a>
    <span class="breadcrumb-item active"><?php echo $datacate['Name'] ?></span>
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
	    					<a class="nav-link text-white" id="pills-edit-tab" data-toggle="pill" href="#pills-edit" role="tab" aria-controls="pills-edit" aria-selected="false">Sửa chuyên mục</a>
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
  						<p><b>Số thể loại </b>: <?php echo $counttype ?></p>
  						<p><b>Số người quản lý</b>: <?php echo $countmanager ?></p>
  						<p><b>Ngày tạo</b>: <?php echo date('d/m/Y',$datacate['Date_create']) ?></p>
  						<p><b>Chỉnh sửa lần cuối</b>: <?php echo date('d/m/Y',$datacate['Date_modify']) ?></p>
  					</div>
  					<div class="tab-pane fade" id="pills-edit" role="tabpanel" aria-labelledby="pills-edit-tab">
  						<form method="POST" class="p-1">
							<div class="form-group">
								<label>Tên chuyên mục</label>
								<input type="text" name="Name" value="<?php echo $datacate['Name'] ?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Giới thiệu chuyên mục</label>
								<textarea name="Intro" class="form-control" row="2"><?php echo $datacate['Intro'] ?></textarea>
							</div>
							<div class="form-group">
								<label>Người quản lý (ID)</label>
								<input type="text" name="Manager" value="<?php echo $datacate['Manager'] ?>" class="form-control" data-toggle="tooltip" data-placement="left" title="Mỗi ID cách nhau bởi dấu phẩy" id="fuck" placeholder="1,2,...">
							</div>
							<button type="submit" class="btn btn-warning">Sửa</button>
						</form>
  					</div>
  					<div class="tab-pane fade" id="pills-setting" role="tabpanel" aria-labelledby="pills-setting-tab">
  						<form method="POST" class="p-1">
							<div class="form-group">
								<label>Người quản lý (ID)</label>
								<?php foreach($idmanager as $ql): ?>
								<p><a href="<?php echo base_url('thanhvien-'.$ql) ?>"><?php echo $this->UserModel->getUser($where = 'ID='.$ql)['Username'] ?></a></p>
								<?php endforeach; ?>
								<input type="text" name="Manager" value="<?php echo $datacate['Manager'] ?>" class="form-control" data-toggle="tooltip" data-placement="left" tibve="Mỗi ID cách nhau bởi dấu phẩy" id="fuck" placeholder="1,2,...">
							</div>
							<button type="submit" class="btn btn-warning">Lưu</button>
							<a href="<?php echo base_url('quanly/xoachuyenmuc-'.$datacate['ID']) ?>" class="btn btn-danger">Xóa chuyên mục</a>
						</form>
  					</div>
				</div>
			</div>			
		</div>
	</div>
	<div class="col-12 mt-md-2">
		<table class="table table-sm table-success">
		  	<thead>
		    	<tr>
			    	<th scope="col">#</th>
					<th scope="col">Thể loại</th>
					<th scope="col">Giới thiệu</th>
					<th scope="col">Người quản lý</th>
					<th scope="col">Ngày tạo</th>
					<th scope="col">Tác vụ</th>
		    	</tr>
		  	</thead>
		  	<tbody>
		  		<?php if(empty($datatypes)) : ?>
		  			<p class="text-center">
		  				<b>Chưa có thể loại <a href="<?php echo base_url('quanly/theloai') ?>">Thêm thể loại!</a></b>
		  			</p>
		  		<?php endif; ?>
		  		<?php foreach($datatypes as $tl): ?>
		    	<tr>
			      	<th scope="row"><?php echo $tl['ID'] ?></th>
			      	<td><a href="<?php echo base_url('theloai-'.$tl['ID']) ?>"><?php echo $tl['Name'] ?></a></td>
			      	<td><?php echo $tl['Intro'] ?></td>
			      	<td><?php echo $this->UserModel->getUser(array('ID' => $tl['Manager']))['Username'] ?></td>
			      	<td><?php echo date('d/m/Y',$tl['Date_create']) ?></td>
			      	<td>
			      		<a href="<?php echo base_url('quanly/theloai-'.$tl['ID']) ?>" class="btn btn-info">Quản lý</a>
			      		<a href="<?php echo base_url('quanly/xoatheloai-'.$tl['ID']) ?>" class="btn btn-danger">Xóa</a>
			      	</td>
		    	</tr>
		    	<?php endforeach; ?>
		  	</tbody>
		</table>
	</div>

</div>