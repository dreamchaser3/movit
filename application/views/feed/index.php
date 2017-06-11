<!--profile-->
<div class="container">
    <div class="section">

        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-image">
                                <img src="http://www.img.lirent.net/2014/10/Android-Lollipop-wallpapers-Download.jpg"
                                     alt="" / style="height: 200px">
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s4 profile-pic">
                                        <img class="circle responsive-img"
                                             src="<?php echo $userData->profile_img_url ?>"
                                             alt=""/>
                                    </div>

                                </div>
                                <span class="card-title black-text"><?php echo $userData->username ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--gallery-->

<div class="container">
    <div class="section">

        <!--   Card Section   -->
        <div class="row">
            <?php foreach ($posts as $post) { ?>
            <!-- Card // 이 모양으로 하나씩 추가 -->
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="<?php echo $post['post_img_url'] ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?php echo $post['title'] ?><i
                                    class="material-icons right">more_vert</i></span>
                        <p><a href="/post/watch/<?php echo $post['id'] ?>">This is a link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?php echo $post['title'] ?><i
                                    class="material-icons right">close</i></span>
                        <p><?php echo $post['content'] ?></p>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </div>
</div>

    <script type="text/javascript" src="/static/js/materialize.min.js"></script>
    <script src="/static/js/init.js"></script>
    <script>
        $(document).ready(function () {
            //init
            $('.modal').modal();
            $('.carousel').carousel();
            $('.slider').slider({full_width: true, interval: 3000});
            $(".button-collapse").sideNav();
            $('.chips').material_chip();
            $('.parallax').parallax();
        });
    </script>