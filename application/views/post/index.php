<!--Post View-->
<div class="container">
    <div class="section">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo $post['post_img_url'] ?>">
                        <span class="card-title"><?php echo $post['title'] ?></span>
                        <!--FAB 본인의 포스팅을 볼때만 수정 버튼이 뜹니다. 클릭하면 전에 썼던 form 다시 뜸-->
                        <?php if ($userData->id == $post['user_id']) { ?>
                            <a class="btn-floating halfway-fab waves-effect waves-light red"><i
                                        class="material-icons">edit</i></a>
                        <?php } ?>
                    </div>
                    <div class="card-content">
                        <p><?php echo $post['content'] ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!--Movie / Location Info -->

<div class="container">
    <div class="section">
        <div class="row">
            <h4>Info</h4>
        </div>
        <div class="row">
            <div class="col s12">
                <ul class="collapsible popout" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">info</i>Post Info</div>
                        <div class="collapsible-body">
                            <span><?php echo $post['created_at'] ?> <?php echo $post['username'] ?> 이 작성.</span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">place</i>Location</div>
                        <div class="collapsible-body"><span><?php echo $post['location_name'] ?></span></div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons">movie</i>Movie</div>
                        <div class="collapsible-body">
                            <p>제목: <?php echo $post['title'] ?></p>
                            <p>개봉 년: <?php echo $post['pubDate'] ?></p>
                            <p>감독: <?php echo $post['director'] ?></p>
                            <p>배우: <?php echo $post['actor'] ?></p>
                            <p>평점: <?php echo $post['userRating'] ?></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

<!--Comments-->

<div class="container">

    <div class="section">
        <div class="row">
            <h4>Comments</h4>
        </div>
        <div class="row">
            <div class="col s12">
                <ul class="collection">
                    <?php
                    foreach ($reply as $item) { ?>
                        <li class="collection-item avatar">
                            <img src="<?php echo $item['profile_img_url'] ?>" alt="" class="circle">
                            <span class="title"><?php echo $item['username'] ?></span>
                            <p>
                                <?php echo $item['content'] ?>
                            </p>
                            <a href="#!" class="secondary-content"><i class="material-icons">reply</i></a>
                        </li>
                    <?php } ?>
                    <!-- Comment Form-->
                    <?php if ($logined) { ?>
                        <li class="collection-item avatar">
                            <i class="material-icons circle red">perm_identity</i>
                            <div class="title" style="margin-top: 10px"><?php echo $userData->username ?></div>
                            <form class="col s12" action="/post/reply/<?php echo $post['post_id'] ?>" method="post">
                                <div class="row">
                                    <div class="input-field">
                                        <i class="material-icons prefix">comment</i>
                                        <textarea id="icon_prefix2" class="materialize-textarea"
                                                  name="content"></textarea>
                                        <label for="icon_prefix2">comment</label>
                                    </div>
                                </div>
                                <button>제출</button>
                            </form>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
