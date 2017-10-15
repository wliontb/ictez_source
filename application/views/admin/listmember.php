<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly') ?>">Quản lý</a>
    <span class="breadcrumb-item active">Danh sách thành viên</span>
</nav>
<div class="row mb-3">
	<div class="col-md-12">
		<table class="table">
			<thead class="thead-inverse">
			<tr>
			<th>#</th>
			<th>Username</th>
			<th>Email</th>
			<th>Bài viết</th>
			<th>Ngày gia nhập</th>
			<th>Chức vụ</th>
			<th>Tác vụ</th>
			</tr>
			</thead>
			<tbody>
			<?php if(empty($memactive)) : ?>
				<tr>
				<th scope="row">Chưa có thành viên nào !</th>
				</tr>
			<?php endif; ?>
			<?php foreach($memactive as $ma): ?>
			<tr>
			<th scope="row"><?php echo $ma['ID'] ?></th>
			<td>
				<a href="<?php echo base_url('thanhvien-'.$ma['ID']) ?>"><?php echo $ma['Username'] ?></a>
			</td>
			<td><?php echo $ma['Email'] ?></td>
			<td><?php echo $ma['Countpost'] ?></td>
			<td><?php echo date('d/m/Y',$ma['Date_create']); ?></td>
			<td><?php echo ($ma['Permission']==1) ? 'Admin' : 'Member'; ?></td>
			<td>
				<a href="<?php echo base_url('quanly/suathanhvien-'.$ma['ID']) ?>" class="btn btn-info">Sửa</a>
				<a href="<?php echo base_url('quanly/khoathanhvien-'.$ma['ID']) ?>" class="btn btn-dark">Khóa</a>
				<a href="<?php echo base_url('quanly/xoathanhvien-'.$ma['ID']) ?>" class="btn btn-danger">Xóa</a></td>
			</tr>
			<?php endforeach; ?>
			</tbody>
			</table>

			<table class="table">
			<thead class="thead-default">
			<tr>
			<th>#</th>
			<th>Username</th>
			<th>Email</th>
			<th>Họ tên</th>
			<th>Ngày đăng ký</th>
			<th>Tác vụ</th>
			</tr>
			</thead>
			<tbody>
			<?php if(empty($memnoactive)) : ?>
				<tr>
				<th scope="row">Không có thành viên chưa kích hoạt !</th>
				</tr>
			<?php endif; ?>
			<?php foreach($memnoactive as $ma): ?>
			<tr>
			<th scope="row"><?php echo $ma['ID'] ?></th>
			<td>
				<a href="<?php echo base_url('thanhvien-'.$ma['ID']) ?>"><?php echo $ma['Username'] ?></a>
			</td>
			<td><?php echo $ma['Email'] ?></td>
			<td><?php echo $ma['Fullname'] ?></td>
			<td><?php echo date('d/m/Y',$ma['Date_create']); ?></td>
			<td>
				<a href="<?php echo base_url('quanly/suathanhvien-'.$ma['ID']) ?>" class="btn btn-info">Sửa</a>
				<a href="<?php echo base_url('quanly/kichhoatthanhvien-'.$ma['ID']) ?>" class="btn btn-success">Kích hoạt</a>
				<a href="<?php echo base_url('quanly/xoathanhvien-'.$ma['ID']) ?>" class="btn btn-danger">Xóa</a></td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>