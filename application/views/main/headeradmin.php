<!DOCTYPE html>
<html>
<head>
    <title><?php echo (isset($title) ? $title : 'AdminPanel - ICTEZ') ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/custom.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark justify-content-between">
            <a class="navbar-brand font-weight-bold" href="<?php echo base_url() ?>">ICTEZ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Hỗ trợ</a>
                    </li>
                </ul>
                <div class="btn-group ml-md-auto">
                    <button type="button" class="btn btn-secondary"><?php echo $this->session->userdata('Username') ?>
                    <span class="badge badge-pill badge-danger">1</span>
                    <span class="badge badge-pill badge-info">1</span>
                    </button>
                    <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu usermenu">
                        <a class="dropdown-item" href="<?php echo base_url('quanly') ?>">Quản lý</a>
                        <a class="dropdown-item" href="<?php echo base_url('quanly/hoatdong') ?>">Hoạt động</a>
                        <a class="dropdown-item" href="<?php echo base_url('quanly/tinnhan') ?>">Tin nhắn riêng</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('dangxuat') ?>">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    
    <section class="container-fluid mt-5 pt-3">
        <div class="row">
            <ul class="nav flex-column col-md-2 custom-menu-left">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo base_url('quanly') ?>"><i class="fa fa-tasks" aria-hidden="true"></i></i> Thống kê</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('quanly/canhan') ?>"><i class="fa fa-user-o" aria-hidden="true"></i> Cá nhân</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-users" aria-hidden="true"></i> Thành viên</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="button-post" href="#"><i class="fa fa-book" aria-hidden="true"></i> Bài viết <i class="fa fa-caret-down float-right" aria-hidden="true"></i></a>
                </li>
                <ul class="nav flex-column d-none pl-3" id="menu-post">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo base_url('quanly/thembaiviet') ?>">- Thêm bài mới</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">- Danh sách</a>
                    </li>
                </ul>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-bell" aria-hidden="true"></i> Thông báo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-cogs" aria-hidden="true"></i> Cài đặt</a>
                </li>
                <li class="nav-item">
                    <p class="font-italic nav-link text-secondary">Đang phát triển</p>
                </li>
            </ul>
            <div class="col-md-10">