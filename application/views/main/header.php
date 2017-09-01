<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=(isset($title) ? $title : 'ICTEZ-BLOG CNTT')?></title>
    <link rel="stylesheet" href="<?=base_url('public/css/foundation.css')?>" />
    <!-- Customies CSS -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/app.css')?>" />
    <!-- Icon Font Style -->
    <link rel="stylesheet" type="text/css" href="<?=base_url('public/css/font-awesome.min.css')?>" />
</head>

<body>
    <!-- Header -->
    <div class="top-bar shadow" data-sticky data-margin-top="0" style="border-bottom:1px solid #24292e">
        <!-- Menu -->
        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="padding-right-1"><a href="<?=base_url('index.php')?>" class="menu-text primary">ICTez</a></li>
                <?php 
                if (!is_null($this->session->userdata('Username'))) {
                    echo '
                    <li class="padding-right-1"> <a href="'.base_url('profile').'">'.$this->session->userdata('Username').'</a>
                        <ul class="menu vertical">
                            <li><a href="'.base_url('1-baivietmoi').'">Bài viết mới</a> </li>
                            <li><a href="'.base_url('admin').'">Quản lý</a> </li>
                            <li><a href="'.base_url('dangxuat').'" style="border-top:1px solid #e6e6e6">Đăng xuất</a> </li>
                        </ul>
                    </li>
                    ';
                } else {
                    echo '
                    <li class="padding-right-1"> <a href="#">Thành viên</a>
                        <ul class="menu vertical">
                            <li><a href="'.base_url('dangnhap').'">Đăng nhập</a> </li>
                            <li><a href="'.base_url('dangky').'">Đăng ký</a> </li>
                        </ul>
                    </li>
                    ';
                }
                ?>
                <li class="padding-right-1"><a href="#">Chuyên mục</a> </li>
                <li class="padding-right-1"><a href="#">Giới thiệu</a> </li>
                <li class="padding-right-1"><a href="#">Liên hệ</a> </li>
            </ul>
        </div>
        <!-- End Menu -->
        <div class="top-bar-right">
            <ul class="menu">
                <li>
                    <input type="search" placeholder="Search"> </li>
                <li>
                    <button type="button" class="button">Search</button>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Header -->
    <!-- Container -->
    <div class="grid-container">
        <!-- Logo -->
        <div class="grid-x grid-padding-x" style="background: #074E68;padding-bottom: 1rem">
            <div class="cell large-4 medium-12"><img class="width-100" src="https://placehold.it/450x183&amp;text=LOGO" alt="company logo"> </div>
            <div class="cell auto"><img src="https://placehold.it/900x175&amp;text=Responsive Ads" alt=""> </div>
        </div>
        <!-- Endlogo -->