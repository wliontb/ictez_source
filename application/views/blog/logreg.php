<div class="title">
    <nav aria-label="You are here:" role="navigation">
      <ul class="breadcrumbs">
        <li><a href="#">Home</a></li>
        <li><a href="#">Features</a></li>
        <li class="disabled">Gene Splicing</li>
        <li>
          <span class="show-for-sr">Current: </span> Cloning
        </li>
      </ul>
    </nav>
</div>
<div class="grid-x grid-padding-x">
    <div class="cell large-offset-2 large-8 medium-12">
        <ul class="tabs" data-deep-link="true" data-responsive-accordion-tabs="tabs medium-accordion large-tabs" id="example-tabs">
          <li class="tabs-title <?=(($active=='login') ? 'is-active' : '') ?>"><a href="#log" aria-selected="true">Đăng nhập thành viên</a></li>
          <li class="tabs-title <?=(($active=='register') ? 'is-active' : '') ?>"><a href="#reg">Đăng ký thành viên</a></li>
        </ul>

    <div class="tabs-content" data-tabs-content="example-tabs">
        <?=validation_errors()?>
        <div class="tabs-panel <?=(($active=='login') ? 'is-active' : '') ?>" id="log">
            <fieldset class="fieldset">
                <legend><b>Đăng nhập</b></legend>
                <form method="post" action="<?=base_url('dangnhap')?>">
                    <label>Email</label>
                    <input type="text" name="emaillog" value="<?=set_value('emaillog')?>">
                    <label>Mật khẩu</label>
                    <input type="password" name="passwordlog" value="<?=set_value('passwordlog')?>">
                    <input type="submit" name="submitlog" class="success button" value="Đăng nhập">
                </form>
            </fieldset>
        </div>
        <div class="tabs-panel <?=(($active=='register') ? 'is-active' : '') ?>" id="reg">
            <fieldset class="fieldset">
                <legend><b>Đăng ký</b></legend>
                <form method="post" action="<?=base_url('dangky')?>">
                    <label>Tên đăng nhập</label>
                    <input type="text" name="usernamereg" value="<?=set_value('usernamereg')?>">
                    <label>Mật khẩu</label>
                    <input type="password" name="passwordreg">
                    <label>Nhập lại mật khẩu</label>
                    <input type="password" name="passwordconfirmreg">
                    <label>Email</label>
                    <input type="email" name="emailreg" value="<?=set_value('emailreg')?>">
                    <label>Họ và tên</label>
                    <input type="text" name="fullnamereg" value="<?=set_value('fullnamereg')?>">
                    <input type="submit" name="submitreg" class="success button" value="Đăng ký">
                </form>
            </fieldset>
        </div>
    </div>
</div>