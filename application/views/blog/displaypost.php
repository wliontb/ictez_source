<div class="grid-container">
    <div class="top-bar grid-x grid-padding-x shadow">
        <!-- Breadcrumbs -->
        <nav aria-label="You are here:" role="navigation">
          <ul class="medium-12 large-10 breadcrumbs padding-1 cell">
            <li><a href="<?php base_url() ?>">Home</a></li>
            <li><a href="<?php base_url('chuyenmuc-'.$datacate['ID']) ?>"><?php echo $datacate['Name'] ?></a></li>
            <li><a href="<?php base_url('theloai-'.$datatype['ID']) ?>"><?php echo $datatype['Name'] ?></a></li>
            <li class="disabled">
              <span class="show-for-sr">Current: </span> <?php echo $title ?>
            </li>
          </ul>
        </nav>
        <!-- End Breadcrumbs -->
        <div class="medium-12 large-2 cell">
            <span class="label secondary padding-1">Edit</span>
            <span class="label padding-1"><i class="fa fa-eye" aria-hidden="true"></i></span>
            <span class="label padding-1"><i class="fa fa-cog" aria-hidden="true"></i></span>
        </div>
    </div>
    <br>
    <!-- Main -->
    <div class="grid-x grid-padding-x">
        <div class="large-8 cell shadow">
        <h1 class="separator-left"><?php echo $title ?></h1>
        <p>
            <?php echo date('d/m/Y - H:i:s',$datapost['Date_create']) ?>
            <br>
            <blockquote>
                <cite><?php echo $datapost['ID_user'] ?></cite>
                <?php echo $datapost['Des'] ?>
            </blockquote>
            <?php echo $datapost['Content'] ?>
        </p>
        <div class="title">Bình luận</div>
        <form>
            <textarea></textarea>
            <p class="help-text align-right" id="passwordHelpText">
            <input type="submit" class="button" value="Submit">
            Your comment must have at least 10 characters, a number, and an Emoji.</p>
        </form>
        <div class="media-object">
          <div class="media-object-section">
            <div class="thumbnail">
              <img src="https://placehold.it/100x100&text=Avatar">
            </div>
          </div>
          <div class="media-object-section">
            <h4>I'm First!</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro at, tenetur cum beatae excepturi id ipsa? Esse dolor laboriosam itaque ea nesciunt, earum, ipsum commodi beatae velit id enim repellat.</p>
            <!-- Nested media object starts here -->
            <div class="media-object">
              <div class="media-object-section">
                <div class="thumbnail">
                  <img src="https://placehold.it/100x100&text=Avatar">
                </div>
              </div>
              <div class="media-object-section">
                <h4>I'm Second!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas magni, quam mollitia voluptatum in, animi suscipit tempora ea consequuntur non nulla vitae doloremque. Eius rerum, cum earum quae eveniet odio.</p>
              </div>
            </div>
            <!-- And ends here -->
          </div>
        </div>
        </div>
        <div class="cell large-4 medium-12">
            
            <div class="grid-x">
                <div class="cell">
                    <div class="title">ADS</div>
                    <p> 
                    </p>
                </div>
                <div class="cell">
                    <div class="title">Bình luận mới</div>
                    <p>
                        <div class="media-object">
                            <div class="media-object-section"> <img class="thumbnail" src="https://placehold.it/100"> </div>
                            <div class="media-object-section">
                                <h5>All I need is a space suit and I'm ready to go.</h5> </div>
                        </div>
                        <div class="media-object">
                            <div class="media-object-section"> <img class="thumbnail" src="https://placehold.it/100"> </div>
                            <div class="media-object-section">
                                <h5>All I need is a space suit and I'm ready to go.</h5> </div>
                        </div>
                        <div class="media-object">
                            <div class="media-object-section"> <img class="thumbnail" src="https://placehold.it/100"> </div>
                            <div class="media-object-section">
                                <h5>All I need is a space suit and I'm ready to go.</h5> </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>