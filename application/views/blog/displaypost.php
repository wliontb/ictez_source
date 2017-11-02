<div class="row">
    <div class="col-md-8">
        <!-- BreadCrumb -->
        <nav class="breadcrumb">
            <a class="breadcrumb-item" href="<?php echo base_url('') ?>"><i class="fa fa-home" aria-hidden="true"></i></a>
            <a class="breadcrumb-item" href="<?php echo base_url('chuyenmuc-'.$datacate['ID']) ?>"><?php echo $datacate['Name'] ?></a>
            <a class="breadcrumb-item" href="<?php echo base_url('theloai-'.$datatype['ID']) ?>"><?php echo $datatype['Name'] ?></a>
            <span class="breadcrumb-item active"><?php echo $datapost['Title'] ?></span>
        </nav>
        <!-- endBreadCrumb -->
        <p>
            <h1 style="font-size: 25px"><?php echo $datapost['Title'] ?></h1>
        </p>
        <div class="custom-panel">
            <div class="custom-panel-heading">
                <h2 style="font-size: 16px!important">
                    <?php echo $datapost['Username'] ?> <i class="fa fa-eye" aria-hidden="true"></i>
                    <?php echo $datapost['View'] ?>
                    <span class="float-right" onclick="log()">
                        <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date('d/m/Y',$datapost['Date_create']) ?>
                        <i class="fa fa-flag-o" aria-hidden="true"></i>
                    </span>
                </h2>
            </div>
            <div class="p-2">
                <?php echo $datapost['Content'] ?>
            </div>
            <div class="px-2 py-1 border border-bottom-0">
                <div class="btn-group ml-2" role="group" aria-label="share with">
                    <a href="#" class="btn btn-info btn-sm" onclick="log()">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        Facebook
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="log()">
                        Google+
                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="btn btn-outline-primary btn-sm" onclick="log()">
                        Twitter
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </div>
                <span class="float-right mr-2">
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <?php 
                        $tags = $datapost['Tags'];
                        $arraytag = explode(',',$tags);
                        foreach ($arraytag as $tag) :
                    ?>
                    <?php echo $tag.',' ?>
                    <?php endforeach; ?>
                </span>
            </div>
        </div>
        <!-- Comment -->
        <div class="custom-panel rounded-bottom">
            <div class="custom-panel-heading" id="comment">
                <h3 style="font-size: 16px">Bình luận</h2>
            </div>
            <?php if(!is_null($this->session->userdata('Username'))) : ?>
                <form method="POST" class="p-2">
                <?php 
                echo (is_null($this->session->flashdata('alert'))) ? '' : '<div class="alert alert-success">'.$this->session->flashdata('alert').'</div>';
                echo validation_errors('<div class="alert alert-danger">','</div>')?>
                    <div class="form-group">
                        <label for="commentform" class="form-text text-muted">Nhập bình luận</label>
                        <textarea class="form-control" id="commentform" rows="3" name="Content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                    <hr>
                </form>
            <?php endif; ?>
            <?php echo (empty($datacomment)) ? '<p class="p-1">Chưa có bình luận</p>' : ''; ?>
            <?php foreach($datacomment as $bl) : ?>
            <div class="media p-2" style="border-bottom:1px solid #ccc">
                <img class="d-flex mr-3" src="http://via.placeholder.com/64x64" alt="avt of <?php echo $bl['Username'] ?>">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $bl['Username'] ?></h5>
                    <?php echo $bl['Content'] ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
    </div>
    <aside class="col-md-4">
        <div class="custom-panel mt-md-0 rounded-bottom">
            <div class="custom-panel-heading">
                <h2>Chuyên mục</h2>
            </div>
            <ul class="list-group p-1">
                <?php foreach($datacates as $cm) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="<?php echo base_url('chuyenmuc-'.$cm['ID']) ?>"><?php echo $cm['Name'] ?></a>
                        <span class="badge badge-secondary"><?php echo $this->PostModel->countTypes($where = 'ID_cate='.$cm['ID']) ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="custom-panel rounded-bottom">
            <div class="custom-panel-heading">
                <h2>Follow</h2>
            </div>
            <form class="form-inline p-2">
                <div class="input-group w-100">
                  <span class="input-group-addon" id="basic-addon1">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  </span>
                  <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
                  <span class="btn-group">
                    <button type="button" class="btn btn-secondary rounded-0 rounded-right">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </button>
                  </span>
                </div>
              </form>
        </div>
        <div class="custom-panel rounded-bottom">
            <div class="custom-panel-heading">
                <h2>Cùng thể loại</h2>
            </div>
            <?php foreach($this->PostModel->getPosts(5,0,$where = 'ID_type='.$datapost['ID_type']) as $bv) : ?>
            <div class="post p-2">
                <p><a href="<?php echo base_url('baiviet-'.$bv['ID']) ?>"><?php echo $bv['Title'] ?></a></p>
            </div>
            <?php endforeach; ?>
        </div>
    </aside>
</div>
<script type="text/javascript">
    function log()
    {
        alert('Tính năng đang phát triển!');
    }
</script>