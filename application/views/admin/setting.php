<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly') ?>">Quản lý</a>
    <span class="breadcrumb-item active">Cài đặt</span>
</nav>
<?php 
//test openfile

$file = @fopen(base_url('application/config/constants.php'),'r');
// Kiểm tra file mở thành công không
if (!$file) {
    echo 'Mở file không thành công';
}
else
{
    // Lặp qua từng dòng để đọc
    while(!feof($fp))
    {
        echo fgets($fp);
    }
}
 ?>
<div class="row">
	<form method="POST" class="col-md-12">
		<div class="row">
			<?php echo validation_errors('<div class="alert alert-danger">','</div>') ?>
			<?php if(!empty($this->session->flashdata('alert'))){
				echo $this->session->flashdata('alert');
			} ?>
			<div class="col-md-6">
				<div class="custom-panel p-2">
					<div class="custom-panel-heading">
						<h2>Cài đặt chung</h2>
					</div>
					<div class="form-group">
						<label>Cho phép đăng ký thành viên</label>
						<select name="allow-register" class="form-control">
							<option value="1" selected>Cho phép</option>
							<option value="0">Từ chối</option>
						</select>
					</div>
					<div class="form-group">
						<label>Số bài viết trên trang chủ</label>
						<input type="number" value="6" name="postsperindex" class="form-control">
					</div>
					<div class="form-group">
						<label>Số thể loại trong 1 chuyên mục</label>
						<input type="number" name="typespercate" value="6" class="form-control">
					</div>
					<div class="form-group">
						<label>Số bài viết trong 1 thể loại</label>
						<input type="number" name="postspertype" value="6" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Link quảng cáo</label>
					<input type="text" name="ads" class="form-control" placeholder="https://..">
				</div>
				<div class="form-group">
					<label>Từ khóa</label>
					<input type="text" name="keywords" class="form-control" placeholder="từ khóa seo..">
				</div>
				<div class="form-group">
					<label>Tiêu đề trang web</label>
					<input type="text" name="title" class="form-control" placeholder="tiêu đề của trang">
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-warning" value="Cập nhật">
				</div>
			</div>
		</div>			
	</form>
</div>