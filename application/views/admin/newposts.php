<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly') ?>">Quản lý</a>
    <span class="breadcrumb-item active">Thêm bài viết</span>
</nav>
<form method="POST" class="row">
    <div class="col-md-8">
        <div class="custom-panel p-2 rounded-bottom">
            <div class="custom-panel-heading">
                <h2>Thêm bài viết mới</h2>
            </div>
            <div class="form-group">
                <label for="selectcategories">Chọn chuyên mục</label>
                <select class="form-control" id="selectcategories">
                    <option>Tên chuyên mục</option>
                </select>
            </div>
            <div class="form-group">
                <label for="selecttypes">Chọn thể loại</label>
                <select class="form-control" id="selecttypes">
                    <option>Tên thể loại</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tiêu đề bài viết</label>
                <input type="text" class="form-control" name="Title" value="">
            </div>
            <div class="form-group">
                <label>Miêu tả bài viết</label>
                <textarea class="form-control" name="Des"></textarea>
            </div>
            <div class="form-group">
                <label>Nội dung bài viết</label>
                <textarea class="form-control" name="Content"></textarea>
            </div>
            <div class="form-group">
                <label>Ảnh đại diện của bài</label>
                <input type="text" class="form-control" placeholder="http://" name="Thumbnail">
            </div>
            <div class="form-group">
                <input type="submit" name="submitpost" class="btn btn-success" value="Đăng bài"/>
            </div>      
        </div>
    </div>
    <div class="col-md-4 mt-3">
        <ul class="list-group">
            <li class="list-group-item">
                <p class="font-weight-bold">Hiển thị ngoài trang chủ</p>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="Public" checked value="1"> Có
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="Public" value="0"> Không
                    </label>
                </div>
            </li>
            <li class="list-group-item">
                <p class="font-weight-bold">Hiển thị trên bảng tin</p>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="Special" value="1"> Có
                    </label>
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="Special" value="0" checked> Không
                    </label>
                </div>
            </li>
            <li class="list-group-item">
                <p class="font-weight-bold">Thêm tags</p>
                <input type="text" data-tags-input-name="tag" id="tagBox" value="fuck u">
            </li>
            <li class="list-group-item">
                <p class="text-secondary font-italic">Đang phát triển</p>
            </li>
        </ul>
    </div>
</form>