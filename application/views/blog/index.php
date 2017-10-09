
<div class="row">
    <div class="col-md-8">
        <div class="custom-panel-heading">
            <h2>Bài nổi bật</h2>
        </div>
        <div id="carouselExampleCaptions" class="carousel slide mb-1" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class=""></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2" class=""></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url('public/img/slide1.jpg') ?>" alt="<?php echo $overlay[0]['Title'] ?>" height="200px"/>
                    <div class="carousel-caption d-none d-md-block">
                        <h3>
                            <a href="<?php echo base_url('baiviet-'.$overlay[0]['ID']) ?>"><?php echo $overlay[0]['Title'] ?></a>
                        </h3>
                        <p><?php echo $overlay[0]['Content'] ?></p>
                    </div>
                </div>
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo base_url('public/img/slide2.jpg') ?>" alt="<?php echo $overlay[0]['Title'] ?>" height="200px"/>
                    <div class="carousel-caption d-none d-md-block">
                        <h3>
                            <a href="<?php echo base_url('baiviet-'.$overlay[1]['ID']) ?>"><?php echo $overlay[1]['Title'] ?></a>
                        </h3>
                        <p><?php echo $overlay[1]['Content'] ?></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo base_url('public/img/slide2.jpg') ?>" alt="<?php echo $overlay[0]['Title'] ?>" height="200px"/>
                    <div class="carousel-caption d-none d-md-block">
                        <h3>
                            <a href="<?php echo base_url('baiviet-'.$overlay[2]['ID']) ?>"><?php echo $overlay[2]['Title'] ?></a>
                        </h3>
                        <p><?php echo $overlay[2]['Content'] ?></p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="border border-dark p-2">
            <p>ads</p>
        </div>

        <div class="custom-panel rounded-bottom" id="newtopic">
            <div class="custom-panel-heading">
                <h2>Bài viết mới</h2>
            </div>
            <?php foreach($dataposts as $bv) : ?>
            <div class="post row no-gutters">
                <div class="col-sm-3 p-1">
                    <img class="w-100" height="160px" src="<?php echo $bv['Thumbnail'] ?>" alt="<?php echo $bv['Title']?>">
                </div>
                <div class="col-sm-9 p-1">
                    <h3><?php echo $bv['Title'] ?></h3>
                    <p><?php echo $bv['Des'] ?></p>
                    <div class="btn-toolbar float-right mr-1" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-1" role="group" aria-label="First group">
                            <a href="<?php echo base_url('baiviet-'.$bv['ID']) ?>" class="btn btn-secondary">Đọc tiếp</a>
                            <a href="#" class="btn btn-secondary">Chia sẻ</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- pagination -->
            <?php echo $this->pagination->create_links() ?>
            <!-- endpagination -->
        </div>
    </div>
    <div class="col-md-4">
        <aside>
            <div class="custom-panel mt-md-0 rounded-bottom">
                <div class="custom-panel-heading">
                    <h2>Chuyên mục</h2>
                </div>
                <ul class="list-group p-1">
                    <?php foreach ($datacates as $cm) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="<?php echo base_url('chuyenmuc-'.$cm['ID']) ?>"><?php echo $cm['Name'] ?></a>
                        <span class="badge badge-secondary">0</span>
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
                    <h2>Xem nhiều</h2>
                </div>
                <div class="post p-1">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, nesciunt iusto sunt quisquam!</p>
                </div>
                <div class="post p-1">
                    <p>Officiis a reprehenderit earum corporis eligendi nobis blanditiis dolor porro architecto illum, culpa.</p>
                </div>
                <div class="post p-1">
                    <p>Sint deleniti tenetur cupiditate voluptate voluptas amet, officiis, unde et consequuntur vero explicabo.</p>
                </div>
                <div class="post p-1">
                    <p>Nobis voluptatum animi voluptates sunt, debitis nam ut, dolor ab. Pariatur, reiciendis quidem.</p>
                </div>
                <div class="post p-1">
                    <p>Aspernatur at harum itaque labore, corrupti beatae fuga, ullam nihil reprehenderit officiis laudantium.</p>
                </div>
            </div>
        </aside>
    </div>
</div>
