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
            <form method="POST" enctype="multipart/form-data" class="cell grid-x grid-padding-x">
                <div class="cell medium-8">
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
                <div class="cell medium-4">
                    <div class="title">Tùy chọn</div>
                    <?php 
                    $this->load->permissionUser();
                    if ($this->load->permissionManager($datacate['Manager'], $datatype['Manager'])) : ?>
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
                <br>                                
            </form>
        </div>
        
    </div>
</div>