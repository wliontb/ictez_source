<nav class="breadcrumb">
    <a class="breadcrumb-item" href="#"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="#">Quản lý</a>
    <span class="breadcrumb-item active">Trang cá nhân</span>
</nav>
<div class="row">
	<div class="col-md-4">
		<div class="custom-panel rounded-top">
			<div class="custom-panel-heading">
				<h2>Username</h2>
			</div>
			<div class="row no-gutters">
				<div class="col-md-6">
					<img src="#" alt="avatar"/>
				</div>
				<div class="col-md-6">
					<p><b>Họ tên</b> : <?php echo $this->session->userdata('Username'); ?></p>
					<p><b>Email</b> : <?php echo $this->session->userdata('Email'); ?></p>
					<p><b>Phone</b> : <?php echo $this->session->userdata('Phone') ?></p>
					<p><b>Ngày đăng ký</b> : <?php echo date('d/m/Y',$this->session->userdata('Date_create')); ?></p>
				</div>
				<div class="col-md-12 p-2">
				<p><b>Giới thiệu</b>: <?php echo $this->session->userdata('Intro'); ?></p>
				</div>
			</div>

		</div>
		<div class="custom-panel">
			<div class="custom-panel-heading">
				<h2>Tiến trình</h2>
			</div>
			<ul class="list-group p-1">
				<li class="list-group-item">
					<p>Hoạt động</p>
					<div class="progress">
					  	<div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</li>
				<li class="list-group-item">
					<p>Bài viết</p>
					<div class="progress">
					  	<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</li>
				<li class="list-group-item">
					<p>Vi phạm</p>
					<div class="progress">
					  	<div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="col-md-8 mt-3">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		  	<li class="nav-item">
		    	<a class="nav-link active font-weight-bold" data-toggle="tab" href="#profile" role="tab">Cá nhân</a>
		  	</li>
		  	<li class="nav-item">
		    	<a class="nav-link font-weight-bold" data-toggle="tab" href="#account" role="tab">Tài khoản</a>
		  	</li>
		  	<li class="nav-item">
		    	<a class="nav-link font-weight-bold" data-toggle="tab" href="#password" role="tab">Mật khẩu</a>
		  	</li>
		  	<li class="nav-item">
		    	<a class="nav-link font-weight-bold" data-toggle="tab" href="#settings" role="tab">Cài đặt</a>
		  	</li>
		</ul>
		<!-- Tab panes -->
		<div class="mt-2 alert alert-danger alert-dismissible fade show" role="alert">
		  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    	<span aria-hidden="true">&times;</span>
		  	</button>
		  	Sửa đổi lần cuối <b><?php echo date('d/m/Y',$this->session->userdata('Date_modify')); ?></b>
		</div>
		<div class="tab-content border border-secondary mt-2 p-2 rounded-bottom">
		  	<div class="tab-pane active" id="profile" role="tabpanel">
		  		<p>
		  			<h3 style="font-size: 18px" class="text-success font-italic">Cập nhật thông tin của bạn<hr/></h3>
		  		</p>
	  			<form action="" class="" method="post">
	  				<div class="form-group">
	  					<label for="Fullname">Họ tên :</label>
	  					<input type="text" class="form-control" name="username" value="<?php echo $this->session->userdata('Fullname') ?>" id="Fullname">
	  				</div>
	  				<div class="form-group">
	  					<label for="Address">Địa chỉ :</label>
	  					<input type="email" class="form-control" value="<?php echo $this->session->userdata('Address') ?>" id="Address">
	  				</div>
	  				<div class="form-group">
	  					<label for="intro">Giới thiệu :</label>
	  					<textarea class="form-control" name="intro" id="intro"><?php echo $this->session->userdata('Intro') ?></textarea>
	  				</div>
	  				<div class="form-group">
	  					<input type="submit" class="btn btn-success" value="Cập nhật">
	  				</div>
	  			</form>
		  	</div>
		  	<div class="tab-pane" id="account" role="tabpanel">
		  		<p>
		  			<h3 style="font-size: 18px" class="text-warning font-italic">Thông tin tài khoản:<hr/></h3>
		  		</p>
	  			<form action="" class="" method="post">
	  				<div class="form-group">
	  					<label for="Email">Email :</label>
	  					<input type="text" class="form-control" name="email" value="<?php echo $this->session->userdata('Email') ?>" id="Email" disabled>
	  				</div>
	  				<div class="form-group">
	  					<label for="Phone">Số điện thoại :</label>
	  					<input type="number" class="form-control" value="<?php echo $this->session->userdata('Phone') ?>" id="Phone">
	  				</div>
	  				<div class="form-group">
	  					<label for="facebook">Facebook :</label>
	  					<input type="text" class="form-control" name="fb" value="<?php echo $this->session->userdata('Fb') ?>" id="facebook">
	  				</div>
	  				<div class="form-group">
	  					<label for="bankname">Tên ngân hàng :</label>
	  					<input type="text" class="form-control" name="bankname" id="bankname"><?php echo $this->session->userdata('Bankname') ?>
	  				</div>
	  				<div class="form-group">
	  					<label for="bankid">Số tài khoản :</label>
	  					<input type="text" class="form-control" name="bankid" id="bankid"><?php echo $this->session->userdata('Bankid') ?>
	  				</div>
	  				<div class="form-group">
	  					<label for="bankadr">Chi nhánh :</label>
	  					<input type="text" class="form-control" name="bankadr" id="bankadr"><?php echo $this->session->userdata('Bankadr') ?>
	  				</div>
	  				<div class="form-group">
	  					<input type="submit" class="btn btn-success" value="Cập nhật">
	  				</div>
	  			</form>
		  	</div>
		  	<div class="tab-pane" id="password" role="tabpanel">
		  		<p>
		  			<h3 style="font-size: 18px" class="text-danger font-italic">Thay đổi mật khẩu:<hr/></h3>
		  		</p>
	  			<form action="" class="" method="post">
	  				<div class="form-group">
	  					<label for="currentpassword">Mật khẩu hiện tại :</label>
	  					<input type="password" class="form-control" name="currentpassword" id="currentpassword">
	  				</div>
	  				<div class="form-group">
	  					<label for="password">Mật khẩu mới :</label>
	  					<input type="password" class="form-control" name="password" id="password">
	  				</div>
	  				<div class="form-group">
	  					<label for="passwordconfirm">Nhập lại mật khẩu :</label>
	  					<input type="password" class="form-control" name="passwordconfirm" id="passwordconfirm">
	  				</div>
	  				<div class="form-group">
	  					<input type="submit" class="btn btn-primary" value="Cập nhật">
	  				</div>
	  			</form>
		  	</div>
	 	 	<div class="tab-pane" id="settings" role="tabpanel">
	 	 		<p>
		  			<h3 style="font-size: 18px" class="text-primary font-italic">Cài đặt:<hr/></h3>
		  		</p>
	  			<form action="" class="" method="post">
	  				<div class="form-group">
	  					<label class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
							<input type="checkbox" class="custom-control-input">
					    	<span class="custom-control-indicator"></span>
					    	<span class="custom-control-description">Hiển thị trực tuyến</span>
					  	</label>
	  				</div>
	  				<div class="form-group">
	  					<a href="<?php echo base_url('logout') ?>" class="btn btn-danger">Đăng xuất</a>
	  				</div>
	  			</form>
	 	 	</div>
		</div>
	</div>
</div>