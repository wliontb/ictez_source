    </section>
    <footer>
        <div class="footer">
            <ul class="footerlinks">
                <li><a href="<?php echo base_url() ?>"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Trợ giúp</a></li>
                <li><a href="#">Tác giả</a></li>
            </ul>
            <p class="lead">
                Copyright © <?php echo date('Y') ?> ICTez Blog.
            </p>
        </div>
    </footer>


    <!-- JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"> -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.js') ?>"></script>
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script type="text/javascript">
        if($("html").height()<$(document).height()){
                $(".footer").addClass("fixed-bottom");
            };
    </script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
</body>
</html>