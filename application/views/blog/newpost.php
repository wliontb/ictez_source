<div class="grid-container">        
    <div class="grid-x grid-padding-x">
    <nav aria-label="You are here:" role="navigation" class="cell title large-12">
      <ul class="breadcrumbs">
        <li><a href="<?php echo base_url() ?>">Home</a></li>
        <li><a href="<?php echo base_url('chuyenmuc-'.$datacate['ID']) ?>"><?php echo $datacate['Name'] ?></a></li>
        <li class="disabled"><?php echo $datatype['Name'] ?></li>
        <li>
          <span class="show-for-sr">Current: </span> tạo bài viết mới
        </li>
      </ul>
    </nav>
        <div class="cell large-8 medium-12">
            <form method="POST" enctype="multipart/form-data">
                <label>Tiêu đề bài viết</label>
                <input type="text" name="Title">
                <label>Miêu tả</label>
                <input type="text" name="Des">
                <label>Nội dung</label>
                <textarea name="Content"></textarea>
                <label>Ảnh đại diện</label>
                <input type="text" placeholder="http://" name="Thumbnail">
                <?php if ($this->load->permissionManager($datacate['Manager'], $datatype['Manager'])) : ?>
                <!-- Public ? -->
                <label>Hiển thị ngoài bảng tin ?</label>
                <input type="radio" name="Public" value="0" checked><label>Không</label>
                <input type="radio" name="Public" value="1"><label>Có</label>
                <!-- end Select -->
                <br>
                <?php endif; ?>
                <input type="submit" class="button success" name="">
            </form>
        </div>
        <div class="cell large-4 medium-12">
            <div class="title">Tùy chọn</div>
        </div>

    </div>
</div>