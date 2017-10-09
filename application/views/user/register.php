<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="custom-panel rounded-bottom">
            <div class="custom-panel-heading">
                <div class="row">
                    <div class="col-sm-5"><h2>Đăng ký thành viên</h2></div>
                    <div class="col-sm-7">
                        <div class="btn-group" role="group" aria-label="signup with">
                            <a href="#" class="btn btn-info btn-sm" onclick="log()">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                Facebook
                            </a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="log()">
                                Google+
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="btn btn-primary btn-sm" onclick="log()">
                                Twitter
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                

            </div>
            <form method="post" action="<?php echo base_url('dangky')?>" class="p-2">
                <?php echo validation_errors('<div class="alert alert-warning" role="alert">','</div>')?>
                <?php 
                    if(!is_null($this->session->flashdata('loi'))){
                        echo '<div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Lỗi! </strong>'.
                        $this->session->flashdata('loi').'</div>';
                    }
                ?>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Tên đăng nhập :</label>
                    <div class="col-sm-7">
                        <input type="text" name="usernamereg" value="<?php echo set_value('usernamereg')?>" class="form-control" placeholder="nhập tên đăng nhập">
                    </div>                          
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Họ tên:</label>
                    <div class="col-sm-7">
                        <input type="text" name="fullnamereg" value="<?php echo set_value('fullnamereg')?>" class="form-control" placeholder="nhập họ và tên">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Email :</label>
                    <div class="col-sm-7">
                        <input type="email" name="emailreg" value="<?php echo set_value('emailreg')?>" class="form-control" placeholder="nhập email">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Mật khẩu :</label>
                    <div class="col-sm-7">
                        <input type="password" name="passwordreg" class="form-control" placeholder="nhập mật khẩu">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-5 col-form-label">Xác nhận mật khẩu :</label>
                    <div class="col-sm-7">
                        <input type="password" name="passwordconfirmreg" class="form-control" placeholder="nhập lại mật khẩu">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-7 col-form-label">Tôi đồng ý với <a href="#">điều khoản</a> của blog <input type="checkbox" name="rulesconfirm"></label>
                    <div class="col-sm-5">
                        <input type="submit" name="submitreg" class="btn btn-success">
                    </div>
                </div>
            </form>
            <hr>
            <p class="text-center">Đã có tài khoản ? <a href="#" class="font-weight-bold">Đăng nhập</a> !</p>
        </div>
    </div>
</div>
<script type="text/javascript">
    function log()
    {
        alert("Tính năng đang phát triển");
    }
</script>