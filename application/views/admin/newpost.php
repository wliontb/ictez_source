<nav class="breadcrumb">
    <a class="breadcrumb-item" href="#"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="#">Quản lý</a>
    <span class="breadcrumb-item active">Thêm bài viết</span>
</nav>
<div class="row">
    <div class="custom-panel">
        <div class="custom-panel-heading">
            <h1>
                Thêm bài viết mới
            </h1>
        </div>
    </div>
</div>
<div class="row mainadmin">
    <div class="medium-12">
        <div class="row">
            <nav aria-label="You are here:" role="navigation" class="medium-12 columns">
              <ul class="breadcrumbs">
                <li><a href="<?php echo base_url() ?>">Home</a></li>
                <li><a href="<?php echo base_url('chuyenmuc-'.$datacate['ID']) ?>"><?php echo $datacate['Name'] ?></a></li>
                <li class="disabled"><?php echo $datatype['Name'] ?></li>
                <li>
                  <span class="show-for-sr">Current: </span> tạo bài viết mới
                </li>
              </ul>
            </nav>
            <form method="POST" enctype="multipart/form-data" class="medium-12 columns">
                <div class="row">
                    <div class="medium-8 columns">
                        <label>Tiêu đề bài viết</label>
                        <input type="text" name="Title">
                        <label>Miêu tả</label>
                        <input type="text" name="Des">
                        <label>Nội dung</label>
                        <textarea name="Content"></textarea>
                        <label>Ảnh đại diện</label>
                        <input type="text" placeholder="http://" name="Thumbnail">
                        <input type="submit" class="button success" name="">
                    </div>                
                    <div class="medium-4 columns">
                        <div class="custom-panel">

                            <div class="custom-panel-heading">Tùy chọn</div>
                            <div class="panel">
                                <?php 
                                permissionUser();
                                if (permissionManager($datacate['Manager'], $datatype['Manager'])) : ?>
                                <!-- start Option -->
                                <label>Hiển thị ngoài trang chủ ?</label>
                                <input type="radio" name="Public" value="0" checked><label>Không</label>
                                <input type="radio" name="Public" value="1"><label>Có</label>
                                <label>Hiển thị trên bảng tin ?</label>
                                <input type="radio" name="Special" value="0" checked><label>Không</label>
                                <input type="radio" name="Special" value="1"><label>Có</label>
                                <!-- end Select -->
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>