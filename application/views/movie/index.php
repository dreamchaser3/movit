<!--index banner : movie pic -->

<div class="slider">
    <ul class="slides">
        <li>
            <img src="<?php echo $movie['image'] ?>"> <!-- random image -->
            <div class="caption right-align">
                <h3><?php echo $movie['title'] ?></h3>
                <h5 class="light grey-text text-lighten-3">
                    <?php echo $movie['subtitle'] ?>
                </h5>
                <p>
                    <?php echo $movie['summary'] ?>
                </p>
            </div>
        </li>

        <li>
            <img src="<?php echo $movie['image'] ?>"/>
            <div class="caption right-align">
                <h3>Detailed Info</h3>
                <h5 class="grey-text text-lighten-5">
                    <p class="grey-text text-lighten-5">개봉연도: <?php echo $movie['pubDate'] ?></p>
                    <p class="grey-text text-lighten-5">감독: <?php echo $movie['director'] ?></p>
                    <p class="grey-text text-lighten-5">배우: <?php echo $movie['actor'] ?></p>
                    <p class="grey-text text-lighten-5">평점: <?php echo $movie['userRating'] ?></p>
                </h5>
            </div>
        </li>

    </ul>
</div>

<!-- Container : Related Posts -->



<div class="container">
    <div class="section">
        <div class="row center">
            <h5 class="header col s12 light" style="color: black">이 영화에 관해 쓴 포스팅</h5>
        </div>
        <!--   Related / Carousel -->
        <div class="row">
            <?php if(sizeof($posts) !== 0) { ?>
            <div class="carousel">
                <?php
                foreach ($posts as $post) {
                    ?>
                    <a class="carousel-item" href="/post"><img src="<?php echo $post['post_img_url'] ?>"></a>
                    <?php
                }
                ?>
            </div>
            <?php }else{ ?>
                <div class="parallax-container valign-wrapper">
                    <div class="section no-pad-bot">
                        <div class="container">
                            <div class="row center">
                                <h5 class="header col s12 light">아직 가까운 곳에서 포스팅이 올라오지 않아서 영화 목록이 없습니다. </h5>
                            </div>
                        </div>
                    </div>
                    <div class="parallax"><img src="/static/image/background4.png" style="width: 60%" alt="Unsplashed background img 2"></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>



<!--글쓰기 FAB-->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
        <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
        <li><a class="btn-floating red"><i class="material-icons">share</i></a></li>
        <li><a class="btn-floating yellow darken-1"><i class="material-icons">dashboard</i></a></li>
        <li><a class="btn-floating green modal-trigger" href="#modal3"><i class="material-icons">library_add</i></a>
        </li>

    </ul>
</div>

<!-- Modal Structure (Posting)-->

<div id="modal3" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Posting</h4>
        <div class="row">
            <form class="col s12">

                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <input type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="textarea" class="materialize-textarea"></textarea>
                        <label for="textarea">Write Text</label>
                    </div>
                </div>


                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">label</i>
                        <div id="tags" class="chips"></div>
                        <label for="tags">Write tags and hit enter</label>

                    </div>


                </div>


            </form>
        </div>
    </div>

    <div class="modal-footer">
        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
