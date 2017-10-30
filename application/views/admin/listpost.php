<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly') ?>">Quản lý</a>
    <span class="breadcrumb-item active">Danh sách bài viết</span>
</nav>
<?php echo (is_null($this->session->flashdata('alert'))) ? '' : '<div class="alert alert-warning">'.$this->session->flashdata('alert').'</div>'; ?>
<div class="row mb-3">
	<div class="col-md-12">
		<table class="table">
			<thead class="thead-inverse">
			<tr>
			<th>#</th>
			<th>Tiêu đề</th>
			<th>Người đăng</th>
			<th>Ngày đăng</th>
			<th>Tóm tắt</th>
			<th>Tác vụ</th>
			</tr>
			</thead>
			<tbody>
			<?php if(empty($postsactive)) : ?>
				<tr>
				<th scope="row">Chưa có bài viết ! <a href="<?php echo base_url('quanly/thembaiviet') ?>">Tạo bài mới</a></th>
				</tr>
			<?php endif; ?>
			<?php foreach($postsactive as $pa): ?>
			<tr>
			<th scope="row"><?php echo $pa['ID'] ?></th>
			<td>
				<a href="<?php echo base_url('baiviet-'.$pa['ID']) ?>" style="text-transform:uppercase"><?php echo $pa['Title'] ?></a>
			</td>
			<td>
				<a href="<?php echo base_url('thanhvien-'.$pa['ID_user']) ?>"><?php echo $pa['Username'] ?></a>
			</td>
			<td><?php echo date('d/m/Y',$pa['Date_create']); ?></td>
			<td><?php echo $pa['Des'] ?></td>
			<td>
				<a href="<?php echo base_url('quanly/suabaiviet-'.$pa['ID']) ?>" class="btn btn-info">Sửa</a>
				<a href="<?php echo base_url('quanly/xoabaiviet-'.$pa['ID']) ?>" class="btn btn-danger">Xóa</a></td>
			</tr>
			<?php endforeach; ?>
			</tbody>
			</table>
			<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

			<table class="table">
			<thead class="thead-default">
			<tr>
			<th>#</th>
			<th>Tiêu đề</th>
			<th>Người đăng</th>
			<th>Ngày đăng</th>
			<th>Tóm tắt</th>
			<th>Tác vụ</th>
			</tr>
			</thead>
			<tbody>
			<?php if(empty($postsnoactive)) : ?>
				<tr>
				<th scope="row">Không có bài nào cần kích hoạt</th>
				</tr>
			<?php endif; ?>
			<?php foreach($postsnoactive as $pa): ?>
			<tr>
			<th scope="row"><?php echo $pa['ID'] ?></th>
			<td>
				<a href="<?php echo base_url('baiviet-'.$pa['ID']) ?>" style="text-transform:uppercase"><?php echo $pa['Title'] ?></a>
			</td>
			<td>
				<a href="<?php echo base_url('thanhvien-'.$pa['ID_user']) ?>"><?php echo $pa['Username'] ?></a>
			</td>
			<td><?php echo date('d/m/Y',$pa['Date_create']); ?></td>
			<td><?php echo $pa['Des'] ?></td>
			<td>
				<a href="<?php echo base_url('quanly/kichhoatbaiviet-'.$pa['ID']) ?>" class="btn btn-success">Kích hoạt</a>
				<a href="<?php echo base_url('quanly/xoabaiviet-'.$pa['ID']) ?>" class="btn btn-danger">Xóa</a></td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>