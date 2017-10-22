<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly/danhsachbaiviet') ?>">Bài viết</a>
    <span class="breadcrumb-item active">Sửa bài viết</span>
</nav>
<form method="POST" class="row">
    <div class="col-md-8">
        <div class="custom-panel p-2 rounded-bottom rounded-top">
            <div class="custom-panel-heading">
                <h2><?php echo $title; ?></h2>
            </div>
            <?php echo validation_errors('<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>','</div>')?>
            <div class="form-group">
                <label>Tiêu đề bài viết</label>
                <input type="text" class="form-control" name="Title" value="<?php echo $datapost['Title'] ?>">
            </div>
            <div class="form-group">
                <label>Mô tả bài viết</label>
                <textarea class="form-control" name="Des"><?php echo $datapost['Des'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Nội dung bài viết</label>
                <textarea class="form-control" name="Content" id="ckeditor"><?php echo $datapost['Content'] ?></textarea>
            </div>
            <div class="form-group">
                <label>Ảnh đại diện của bài</label>
                <input type="text" class="form-control" placeholder="http://" name="Thumbnail" id="thumbnail" value="<?php echo $datapost['Thumbnail'] ?>">
                <div id="loadfile"></div>
                <input type="file" id="file" name="imageupload" class="form-control-file">
            </div>
            <div class="form-group">
                <input type="submit" name="submitpost" class="btn btn-success" value="Sửa bài"/>
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
                <input type="text" name="Tags" value="<?php echo $datapost['Tags'] ?>" placeholder="Thêm từ khóa" class="tm-input form-control"/>
            </li>
            <li class="list-group-item">
                <p class="text-secondary font-italic">Đang phát triển</p>
            </li>
        </ul>
    </div>
</form>
<script type="text/javascript">
    CKEDITOR.replace('ckeditor');
</script>