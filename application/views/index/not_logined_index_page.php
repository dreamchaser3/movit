<!--index banner -->
<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container">
            <br><br>
            <h1 class="header center deep-purple-text text-lighten-5">Movit.</h1>
            <div class="row center">
                <h5 class="header col s12 deep-purple-text text-lighten-5">지도 기반 영화 SNS 서비스</h5>
            </div>
            <div class="row center">
                <a href="#modal2" class="modal-trigger btn-large waves-effect waves-light purple lighten-4" style="border-radius: 20px">Sign Up and
                    Get Started</a>
            </div>
            <br><br>

        </div>
    </div>
    <div class="parallax"><img src="/static/image/background4.png" style="width: 50%;" alt="Unsplashed background img 1"></div>
</div>
<!-- Modal Structure (Sign Up)-->

<div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
        <div class="row center" style="margin-top: 25px"><img src="/static/image/logo.png" style="width:100px"></div>
        <h4 class="center">Sign Up</h4>
        <h6 class="center">회원가입 창입니다. 아이디와 비밀번호를 만들어주세요.</h6>
        <div class="row" style="margin-top: 50px">
            <form class="col s12" id="register" action="/api/register" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="first_name" type="text" class="validate" name="username">
                        <label for="first_name">Username</label>
                    </div>
<!--                    <div class="input-field col s6">-->
<!--                        <input id="last_name" type="text" class="validate">-->
<!--                        <label for="last_name">Last Name</label>-->
<!--                    </div>-->
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" name="password">
                        <label for="password">Password</label>
                    </div>
                </div>

<!--                <div class="row">-->
<!--                    <div class="input-field col s12">-->
<!--                        <input id="email" type="email" class="validate">-->
<!--                        <label for="email">Email</label>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <div class="row">-->
<!--                    <div class="col s12">-->
<!--                        This is an inline input field:-->
<!--                        <div class="input-field inline">-->
<!--                            <input id="email" type="email" class="validate">-->
<!--                            <label for="email" data-error="wrong" data-success="right">Email</label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </form>
        </div>
    </div>

    <div class="modal-footer">
        <button class="modal-action modal-close waves-effect waves-green btn-flat " form="register">Sign up</button>
    </div>
</div>


<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center deep-purple-text text-darken-2"><i class="material-icons">place</i></h2>
                    <h5 class="center">지금 어디에 있나요?</h5>

                    <p class="light" style="line-height:2.3em"> <br> 무빗은 유저의 현재 위치를 알려줍니다. 당신이 좋아하는 영화를 촬영한 장소, 영화의 한 장면을 떠올리게 하는 장소에서 사진을 찍고 포스팅하세요. 가까이 있는 다른 사람들이 포스팅한 사진과 당신이 생각한 영화의 정보를 볼 수 있습니다.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center deep-purple-text text-darken-2"><i class="material-icons">movie</i></h2>
                    <h5 class="center"> 영화 SNS</h5>

                    <p class="light" style="line-height:2.3em"><br> 무빗은 당신이 있는 곳 가까이에서 작성된 다른 사람들이 좋아하는 영화들의 목록을 보여줍니다. 영화의 제목, 개봉연도, 감독 등 세부 정보를 확인할 수 있습니다. 그 사람들이 업로드한 포스팅도 보여집니다.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center deep-purple-text text-darken-2"><i class="material-icons">edit</i></h2>
                    <h5 class="center" >포스팅</h5>

                    <p class="light" style="line-height:2.3em"><br> 오른쪽 아래에 있는 플로팅 버튼을 언제나 사용할 수 있습니다. 플로팅 버튼에서 펼쳐지는 메뉴 중 글쓰기 버튼을 눌러 지금 있는 위치와 영화를 선택하고 이미지 파일을 업로드하세요. 글 제목과 내용을 붙인 뒤 포스팅하면 됩니다. </p>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <h5 class="header col s12 light">Movit: Social Media via Location and Films</h5>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="/static/image/background6.png" style="width: 60%" alt="Unsplashed background img 2"></div>
</div>


