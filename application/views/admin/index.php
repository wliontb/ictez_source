<nav class="breadcrumb">
    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
    <a class="breadcrumb-item" href="<?php echo base_url('quanly') ?>">Quản lý</a>
    <span class="breadcrumb-item active">Dashboard</span>
</nav>
<div class="row mb-3">
    <div class="col-md-6">
        <div class="widget">
            <h2 class="widget-title float-left">
                <p><i class="fa fa-link" aria-hidden="true"></i> Bài viết : </p>
                <small class="text-muted">Bài viết mới nhất : <a href="<?php echo (empty($last_post)) ? '#' : base_url('baiviet-'.$last_post[0]['ID']); ?>"><?php echo (empty($last_post)) ? 'Chưa có' : $last_post[0]['Title']; ?></a></small>
            </h2>
            <div class="float-right">
                <h3 class="text-warning font-weight-bold"><?php echo $count_posts; ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="widget">
            <h2 class="widget-title float-left">
                <p><i class="fa fa-link" aria-hidden="true"></i> Thành viên :</p>
                <small class="text-muted">Thành viên mới nhất : <a href="<?php echo (empty($last_user)) ? '#' :  base_url('thanhvien-'.$last_user[0]['ID']) ?>"><?php echo (empty($last_user)) ? '#' :  $last_user[0]['Username'] ?></a></small>
            </h2>
            <div class="float-right">
                <h3 class="text-warning font-weight-bold"><?php echo $count_users; ?></h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="rounded-0 widget2">
            <div class="widget-title">
                <h3 class="text-danger"><?php echo $count_comments; ?></h3>
                <small class="text-muted"><i class="fa fa-link" aria-hidden="true"></i> Bình luận</small>
            </div>
            <div class="widget-footer rouded-bottom">
                <i class="fa fa-line-chart" aria-hidden="true"></i> <a href="<?php echo base_url('quanly/binhluan') ?>" class="text-dark">Quản lý</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="rounded-0 widget2">
            <div class="widget-title">
                <h3 class="text-info"><?php echo $count_types; ?></h3>
                <small class="text-muted"><i class="fa fa-link" aria-hidden="true"></i> Thể loại</small>
            </div>
            <div class="widget-footer rouded-bottom">
                <i class="fa fa-line-chart" aria-hidden="true"></i> <a href="<?php echo base_url('quanly/theloai') ?>" class="text-dark">Quản lý</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="rounded-0 widget2">
            <div class="widget-title">
                <h3 class="text-success"><?php echo $count_cates; ?></h3>
                <small class="text-muted"><i class="fa fa-link" aria-hidden="true"></i> Chuyên mục</small>
            </div>
            <div class="widget-footer rouded-bottom">
                <i class="fa fa-line-chart" aria-hidden="true"></i> <a href="<?php echo base_url('quanly/chuyenmuc') ?>" class="text-dark">Quản lý</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="custom-panel rounded-top rounded-bottom">
            <div class="custom-panel-heading">
                <h2>Hoạt động gần nhất</h2>
            </div>
            <ul class="list-group p-2">
                <li class="list-group-item list-group-item-dark">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Morbi leo risus</li>
                <li class="list-group-item">Porta ac consectetur ac</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="custom-panel rounded-top rounded-bottom">
            <div class="custom-panel-heading">
                <h2>Bình luận gần nhất</h2>
            </div>
            <ul class="list-group p-2">
                <?php foreach($list_last_comments as $dscm) : ?>
                <li class="list-group-item list-group-item-action">
                    <a href="<?php echo base_url('baiviet-'.$dscm['ID_post']) ?>" class="text-dark">
                        <?php echo $dscm['Content'] ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>