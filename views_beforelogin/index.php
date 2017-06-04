
<?php
include "../views_common/header_with_login.php"
?>
<!--index banner -->

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2">Movit</h1>
        <div class="row center">
          <h5 class="header col s12 light">지도 영화 소셜 네트워크 어쩌구</h5>
        </div>
        <div class="row center">
          <a href="#sign_up_modal" class="modal-trigger btn-large waves-effect waves-light teal lighten-1">Sign Up and Get Started</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>
<!-- Modal Structure (Sign Up)-->
        <div id="sign_up_modal" class="modal modal-fixed-footer">
            <div class = "modal-content">
                <h4>Sign Up</h4>
                <div class="row">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="sign_username" type="text" class="validate">
                            <label for="first_name">Username</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="sign_password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                </form>
                </div>
            </div>

            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" id="signup_btn">Sign up</a>
            </div>
        </div>

    


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">영화에 대한 설명</h5>

            <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">지도에 대한 설명</h5>

            <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">포스팅, SNS에 관한 설명</h5>

            <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="/background2.jpg" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Contact Us</h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="/background3.jpg" alt="Unsplashed background img 3"></div>
  </div>



<?php
include "../views_common/footer.php"
?>

<!-- SCRIPTS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/materialize.min.js"></script>
<script src="/js/init.js"></script>
<script>
$(document).ready(function(){
    $("#sign_up_modal").modal();
    $("#signup_btn").on('click', function(){
        var username = $("#sign_username").val();
        var password = $("#sign_password").val();
        if(username === "" || password === ""){
            alert("빈칸을 다 채워주세요");
            return;
        }       
        $.ajax({
            method: "POST",
            url: "../api/sign_up.php", 
            data : {"username": username,
                    "password": password},
            dataType: 'json'
        })
        .done(function( json ) {
            if(json.result == "fail"){
                alert(json.error);
            }
            else{
              window.location = "../views_afterlogin/index.php";
            }
        })
        .fail(function(request, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        });
    });
});
</script>