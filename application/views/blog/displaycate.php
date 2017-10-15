<div class="row">
	<div class="col-md-8">
		<nav class="breadcrumb">
		    <a class="breadcrumb-item" href="<?php echo base_url() ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Home</a>
		    <span class="breadcrumb-item">Chuyên mục</span>
		    <span class="breadcrumb-item active"><?php echo $datacate['Name'] ?></span>
		</nav>

		<div class="custom-panel rounded-bottom">
			<div class="custom-panel-heading">
				<h2>Danh sách thể loại</h2>
			</div>
			<?php echo (empty($datatypes)) ? '<p class="text-center font-weight-bold p-1">Chưa có thể loại !</p>' : '' ?>
			<?php foreach($datatypes as $tl) : ?>
            <div class="post row no-gutters">
                <div class="col-sm-12 p-1">
                    <h3><?php echo $tl['Name'] ?></h3>
                    <p><?php echo $tl['Intro'] ?></p>
                    <div class="btn-toolbar float-right mr-1" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-1" role="group" aria-label="First group">
                            <a href="<?php echo base_url('theloai-'.$tl['ID']) ?>" class="btn btn-info">Xem thể loại</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

		</div>
		<nav aria-label="Page navigation" class="mt-2">
		  	<ul class="pagination">
		    	<li class="page-item">
		      	<a class="page-link" href="#" aria-label="Previous">
		        	<span aria-hidden="true">&laquo;</span>
		        	<span class="sr-only">Previous</span>
		      	</a>
		    	</li>
		    	<li class="page-item"><a class="page-link" href="#">1</a></li>
		    	<li class="page-item"><a class="page-link" href="#">2</a></li>
		    	<li class="page-item"><a class="page-link" href="#">3</a></li>
		    	<li class="page-item">
		      		<a class="page-link" href="#" aria-label="Next">
		        		<span aria-hidden="true">&raquo;</span>
		        		<span class="sr-only">Next</span>
		      		</a>
		    	</li>
		  	</ul>
		</nav>
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