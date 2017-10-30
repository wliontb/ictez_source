<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly/danhsachbaiviet') ?>">Bài viết</a>
    <span class="breadcrumb-item active">Xóa bài viết</span>
</nav>
<div class="row">
	<div class="col-md-12">
		<form method="POST">
			<label>Bạn có chắc chắn muốn xóa bài viết ?</label>
			<input type="hidden" name="confirm" value="yes"/>
			<button type="submit" class="btn btn-danger">Đồng ý</button>
		</form>
	</div>
</div>