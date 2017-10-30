			</div>
		</div>
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
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.2.1.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script type="text/javascript">
            setTimeout(function(){
                $(".alert").alert('close');
            },10000);
            $("#selectcategories").change(function(){
                var idchuyenmuc = $(this).val();
                $.get("../ajax/theloai/"+idchuyenmuc).done(function(data){
                    $("#selecttypes").html(data);
                });
            });
            $("#button-post").click(function(){
                $("#menu-post").toggleClass("d-none");
            });

            $('#file').change(function(){
                $('#thumbnail').attr({'value': 'đang upload','readonly': 'true'});
                var $files = $(this)[0].files;
                var formData = new FormData();
                formData.append("image", $files[0]);

                var settings =
                {
                    "async": true,
                    "crossDomain": true,
                    "url": "https://api.imgur.com/3/image",
                    "method": "POST",
                    "headers": {
                        "authorization": "Client-ID 75ea7cc4abd608b"
                    },
                    "processData": false,
                    "contentType": false,
                    "mimeType": "multipart/form-data",
                    "data" : formData,
                };

                $.ajax(settings).done(function(response) {
                    var kq= JSON.parse(response).data.link;
                    $('#thumbnail').val(kq).prop('readonly',false).addClass('is-valid');
                });
                
            })
    </script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/plugin/tagmanager.js') ?>"></script>

    <script type="text/javascript">
        $('#fuck').tooltip();
        $('.tm-input').tagsManager();
    </script>
</body>
</html>