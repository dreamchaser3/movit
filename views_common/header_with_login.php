<?php
require_once("../config/session.php");
require_once("../db/maria_db.php");
require_once("../api/api_function.php");
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0"/>
    <title>Movit</title>

    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/materialize.min.css" media="screen, projection"/>
    <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<nav class="white" role="navigation">
    <div class="nav-wrapper container">
        <a id="logo-container" href="#" class="brand-logo">Logo</a>

        
        <?php 
        if(!isset($_SESSION['id'])){ //로그인 안했을 때
        ?>
        <ul class="right hide-on-med-and-down">
            <li>
              <!-- Modal Trigger -->
                <a class="modal-trigger waves-effect waves-light btn" href="#log_in_modal">Login</a>
            </li>
        </ul>

        <!-- Mobile Side Nav-->

        <ul id="nav-mobile" class="side-nav">
            <li>
                <a class="modal-trigger waves-effect waves-light btn" href="#log_in_modal">Login</a>
            </li>
        </ul>
        <?php }
        else{ //로그인 했을 때
        ?>
        <ul class="right hide-on-med-and-down">
            <li>  
                <a class="chip" href="">
                <img src="<?php echo $_SESSION['profile_img_url'];?>" alt="profile"><?php echo $_SESSION['username'];?>
                </a>
            </li>
            <li>
                <a href="#" id="logout_btn">Logout</a>
            </li>
        </ul>

        <!-- Mobile Side Nav-->
        <ul id="nav-mobile" class="side-nav">
            <li><div class="userView">
                <div class="background">
                    <img src="/background2.jpg">
                </div>
      
                <a href="#!user"><img class="circle" src="<?php echo $_SESSION['profile_img_url'];?>"></a>
                <a href="#!name"><span class="white-text name"><?php echo $_SESSION['username'];?></span></a>
            </div></li>
    
            <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
            <li><a href="#!">Second Link</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Subheader</a></li>
            <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
            <li>
                <!-- LogOut Button -->
                <a class="waves-effect waves-light btn" href="#">LogOut</a>
            </li>
        </ul>
        <?php }?>



        <a href="#" data-activates = "nav-mobile" class="button-collapse"><i class = "material-icons">menu</i></a>
    </div>
</nav>

<!-- Modal Structure (Log In) -->
        <div id="log_in_modal" class="modal">
            <div class="modal-content">
                <h4>Modal Header</h4>
                <div class="row">
                    <form class = "col s12">
                        <div class="row modal-form-row">
                            <div class="input-field col s12">
                                <input id="username" type="text" class="validate">
                                <label for="username">Username</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate">
                                <label for="password">Password</label>

                            </div>

                        </div>
               
                        

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="login_btn">Log in</a>
            </div>
        </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
$(document).ready(function(){
    $("#log_in_modal").modal();
    $("#login_btn").on('click', function(){
        var username = $("#username").val();
        var password = $("#password").val();
        if(username === "" || password === ""){
            alert("빈칸을 다 채워주세요");
            return;
        }
        $.ajax({
            method: "POST",
            url: "../api/login.php", 
            data : {"username": username,
                    "password": password},
            dataType: 'json'
        })
        .done(function( json ) {
            if(json.result == "fail"){
                alert(json.error);
            }
            else{
                if(window.location.href.indexOf(window.location.protocol+"//"+window.location.host+"/views_beforelogin/index.php") != -1){
                    window.location = "../views_afterlogin/index.php";
                }
                else{
                    location.reload();
                }                
            }
        })
        .fail(function(request, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        });
    });
    $("#logout_btn").on('click', function(){
        $.ajax({
            method: "POST",
            url: "../api/logout.php", 
            dataType: 'json'
        })
        .done(function( json ) {
            if(json.result == "fail"){
                alert(json.error);
            }
            else{
                location.reload();
            }
        })
        .fail(function(request, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        });
    });
});
</script>


