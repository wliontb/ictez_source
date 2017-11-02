<!DOCTYPE html>
<html>
<head>
    <title><?php echo (isset($title) ? $title : 'Cộng đồng CNTT ICTEZ') ?></title>
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
                    <li class="nav-item dropdown">
                        <?php echo displayUser(
                            '
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Thành viên</a>
                            <div class="dropdown-menu mt-2 rounded-0" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="'.base_url('dangnhap').'">Đăng nhập</a>
                                <a class="dropdown-item" href="'.base_url('dangky').'">Đăng ký</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Quên mật khẩu</a>
                            </div>
                            ','
                            <a class="nav-link dropdown-toggle text-light font-weight-bold" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$this->session->userdata('Username').' <span class="badge badge-pill badge-danger">1<i class="fa fa-globe" aria-hidden="true"></i></span>
                            <span class="badge badge-pill badge-info">1<i class="fa fa-commenting-o" aria-hidden="true"></i></span></a>
                            <div class="dropdown-menu mt-2 rounded-0" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="'.base_url('quanly').'">Quản lý</a>
                                <a class="dropdown-item" href="'.base_url('hoatdong').'">Hoạt động</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="'.base_url('dangxuat').'">Đăng xuất</a>
                            </div>
                            '); ?>
                    </li>
                </ul>
                <form method="GET" action="timkiem" class="form-inline ml-md-auto">
                    <input class="form-control mr-sm-2" type="text" name="keywords" placeholder="từ khóa" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </nav>
    </header>
    
    <section class="container-fluid mt-5 pt-3">