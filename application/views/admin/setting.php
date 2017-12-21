<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly') ?>">Quản lý</a>
    <span class="breadcrumb-item active">Cài đặt</span>
</nav>
<div class="row">
	<form method="POST" class="col-md-12">
		<div class="row">
			<div class="col-md-6">
				<?php echo validation_errors('<div class="alert alert-danger">','</div>') ?>
				<?php if(!empty($this->session->flashdata('alert'))){
					echo $this->session->flashdata('alert');
				} ?>
				<div class="custom-panel p-2">
					<div class="custom-panel-heading">
						<h2>Cài đặt chung</h2>
					</div>
					<div class="form-group">
						<label>Cho phép đăng ký thành viên</label>
						<select name="allow-register" class="form-control">
							<option value="1" <?php if($sv[0]['Value'] == '1') echo "selected"; ?>>Cho phép</option>
							<option value="0" <?php if($sv[0]['Value'] == '0') echo "selected"; ?>>Từ chối</option>
						</select>
					</div>
					<div class="form-group">
						<label>Số bài viết trên trang chủ</label>
						<input type="number" value="<?php echo $sv[1]['Value']; ?>" name="postsperindex" class="form-control">
					</div>
					<div class="form-group">
						<label>Số thể loại trong 1 chuyên mục</label>
						<input type="number" name="typespercate" value="<?php echo $sv[2]['Value']; ?>" class="form-control">
					</div>
					<div class="form-group">
						<label>Số bài viết trong 1 thể loại</label>
						<input type="number" name="postspertype" value="<?php echo $sv[3]['Value']; ?>" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Link quảng cáo</label>
					<input type="text" name="ads" class="form-control" placeholder="https://.." value="<?php echo $sv[4]['Value']; ?>">
				</div>
				<div class="form-group">
					<label>Từ khóa</label>
					<input type="text" name="keywords" class="form-control" placeholder="từ khóa seo.." value="<?php echo $sv[5]['Value']; ?>">
				</div>
				<div class="form-group">
					<label>Tiêu đề trang web</label>
					<input type="text" name="title" class="form-control" placeholder="tiêu đề của trang" value="<?php echo $sv[6]['Value']; ?>">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-warning" value="Cập nhật">
				</div>
			</div>
		</div>			
	</form>
</div>