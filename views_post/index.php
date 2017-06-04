<?php
include "../views_common/header_without_login.php"
?>
<!--Get post-->
<? php
include "../api/get_posts.php";
?>
<!--Get reply-->
<?php
include "../api/get_replies.php";
?>
<!--글쓰기 FAB-->
<?php
include "../views_common/fixed_action_btn.php"
?>



<!--Post View-->

<div class="container">
	<div class="section">
		  <div class="row">
		    <div class="col s12">
		      <div class="card">
		        <div class="card-image">
		          <img src="/background1.jpg">
		          <span class="card-title">Card Title</span>

		          <!--FAB 본인의 포스팅을 볼때만 수정 버튼이 뜹니다. 클릭하면 전에 썼던 form 다시 뜸-->
		          <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">edit</i></a>


		        </div>
		        <div class="card-content">
		          <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
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
			      <div class="collapsible-body"><span>2016/00/00 user1 이 작성.</span></div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">place</i>Location</div>
			      <div class="collapsible-body"><span>대한민국, 서울, 연세대학교 연희관.</span></div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">movie</i>Movie</div>
			      <div class="collapsible-body"><span>클래식 2020</span></div>
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
			  <ul class="collection" id = "reply_<? php $result['id']?>">
			  	<? php foreach ($replies as $r) {
			  		$user_id = $r['user_id'];
					$user = get_user_by_id($user_id);
					echo json_encode($user, JSON_UNESCAPED_UNICODE);
			  	?>
				    <li class="collection-item avatar">
				      <img src="<? php $user['profile_img_url']?>" alt="profile" class="circle">
				      <span class="title"><? php $user['username']?></span>
				      <p><? php $r['content']?></p>
				    </li>
				<? php }?>
			    <!-- Comment Form-->

			    <li class="collection-item avatar">
			      <img src="<? php $_SESSION['profile_img_url']?>" alt="profile" class="circle">
			      <div class="title" style="margin-top: 10px"><? php $_SESSION['username']?></div>
			      <div class="row">
			        <div class="input-field">
			          <i class="material-icons prefix">comment</i>
			          <textarea id="icon_prefix2" class="materialize-textarea content_<? php $result['id']?>"></textarea>
			          <button class = "reply_submit" style = "float: right" value = "<? php $result['id']?>">Submit</button>
			        </div>
			      </div>
			    </li>
			  </ul>
		</div>
	
	</div>
	

</div>
	

</div>


<!--footer-->

<?php
include "../views_common/footer.php"
?>

<script type="text/javascript" src="../js/materialize.min.js"></script>
<script src="../js/init.js"></script>
<script>
    $(document).ready(function(){
    //init
    $('.modal').modal();
    $('.carousel').carousel();
    $('.slider').slider({full_width: true, interval: 3000});
    });
    $(".button-collapse").sideNav();
    $('.chips').material_chip();
    $('.parallax').parallax();
</script>
<!--write reply with ajax-->
<script>
$(function(){
	$(".reply_submit").click(function(){
	  post_id = this.value;
	  reply_content = $(".content_" + post_id).val();
	  user_id = "<? php $_SESSION['id']?>";
	  
	  $.ajax({
	    
	    method: "POST",
	    url: "../api/make_reply",
	    data: { content: reply_content, user_id: user_id, post_id: post_id},
	    
	    success: function(){
	      $("#reply_" + post_id).append("<li class=\"collection-item avatar\"><img src=\"<? php $_SESSION['profile_img_url']?>\" alt=\"profile\" class=\"circle\"><span class=\"title\"><? php $_SESSION['username']?></span><p>" +reply_content +"</p></li>");
	      $("#content_" + post_id).val('');
	    },
	    error: function(){
	      alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
	    }
	  })
	});
});
</script>