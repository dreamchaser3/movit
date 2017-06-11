<?php
if ($logined) {
    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0"/>
        <title>Movit</title>

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/static/css/materialize.min.css" media="screen, projection"/>
        <link href="/static/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://unpkg.com/vue"></script>
    </head>
    <body>
    <nav class="white" role="navigation" style="height: 90px">
        <div class="nav-wrapper container">
            <a id="logo-container" href="/" class="brand-logo"><img src="/static/image/logo.png" style="margin-top: 20px; height: 50px"></a>
            <ul class="right hide-on-med-and-down" style="margin-top: 15px">
                <li>

                    <a class="chip" href="">
                        <img src="<?php echo $userData->profile_img_url?>" alt="profile"><?php echo $userData->username?>
                    </a>
                </li>
                <li>
                    <a href="/api/logout">Logout</a>
                </li>
            </ul>
            <!-- Mobile Side Nav-->
            <ul id="nav-mobile" class="side-nav" style="z-index: 1001">
                <li>
                    <div class="userView">
                        <div class="background">
                            <img src="/static/image/mask.png" style="width: 100%">
                        </div>
                        <a href="#!user"><img class="circle" src="<?php echo $userData->profile_img_url?>"></a>
                        <a href="#!name"><span class="white-text name"><?php echo $userData->username?></span></a>
                        <a href="#!email"><span class="white-text email">Welcome to Movit!</span></a>
                    </div>
                </li>
                <li><a href="/feed"><i class="material-icons">dashboard</i>Your Feed</a></li>
                <li>
                    <div class="divider"></div>
                </li>
                <li><a class="subheader">Search</a></li>
                <li><a class="waves-effect" href="/"><i class="material-icons">place</i>Search by Location</a></li>
                <li><a class="waves-effect" href="/"><i class="material-icons">movie</i>Search by Movie</a></li>
                <li>
                    <!-- LogOut Button -->
                    <a class="waves-effect waves-light btn deep-purple lighten-2" href="/api/logout">LogOut</a>
                </li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse" style="margin-top: 13px;"><i class="material-icons" style="font-size: 40px; color: #5e35b1;">menu</i></a>
        </div>
    </nav>

    <?php
} else {
    ?>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0"/>
        <title>Movit</title>

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/static/css/materialize.min.css" media="screen, projection"/>
        <link href="/static/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
    <nav class="white" role="navigation" style="height: 90px">
        <div class="nav-wrapper container">
            <a id="logo-container" href="/" class="brand-logo"><img src="/static/image/logo.png" style="margin-top: 20px; height: 50px"></a>
            <ul class="right hide-on-med-and-down">

                <li>
                    <!-- Modal Trigger -->
                    <a class="modal-trigger waves-effect waves-light btn deep-purple lighten-2" style="margin-top: 25px" href="#modal1">Login</a>
                </li>
            </ul>
            <!-- Mobile Side Nav-->
            <ul id="nav-mobile" class="side-nav">
                <li>
                    <div class="background">
                        <img src="/static/image/logo.png" style=" margin-top: 30px; margin-bottom: 30px; margin-left: 25%; height: 80px">
                    </div>
                </li>
                
                <li>
                    <!-- Modal Trigger -->
                    <a class="modal-trigger waves-effect waves-light btn deep-purple lighten-2" href="#modal1">Login</a>
                </li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse" style="margin-top: 13px;"><i class="material-icons" style="font-size: 40px; color: #5e35b1;">menu</i></a>
        </div>
    </nav>
    <!-- Modal Structure (Log In) -->
    <div id="modal1" class="modal">
        <div class="modal-content">
        <div class="row center" style="margin-top: 25px"><img src="/static/image/logo.png" style="width:100px"></div>
        <h4 class="center">Log In</h4>
        <h6 class="center">로그인 창입니다. 아이디와 비밀번호를 입력해주세요.</h6>
        <div class="row" style="margin-top: 50px">
                <form class="col s12" id="loginForm" action="/api/login" method="post">
                    <div class="row modal-form-row">
                        <div class="input-field col s12">
                            <input id="username" type="text" class="validate" name="username">
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit"  form="loginForm" class="modal-action modal-close waves-effect waves-green btn-flat ">Log in</button>
        </div>
    </div>

    <?php
}
?>