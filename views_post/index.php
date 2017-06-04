<!--Get reply-->
<?php
include "../api/get_replies.php";
?>
<?php
include "../views_common/header_with_login.php";

//글쓰기 FAB
include "../views_common/fixed_action_btn.php";
if(!isset($_GET['post_id'])){
	?><script>history.go(-1);</script><?php
	exit;
}
$results = get_post($_GET['post_id']);
if(!$results){
	?><script>history.go(-1);</script><?php
	exit;
}
?>

<!--Post View-->
<div class="container">
	<div class="section">
		  <div class="row">
		    <div class="col s12">
		      <div class="card">
		        <div class="card-image">
		          <img src="<?php echo $results['post_img_url']; ?>">
		          <span class="card-title"><?php echo $results['title']; ?></span>

							<?php
							if(isset($_SESSION['id']) && $results['user_id'] === $_SESSION['id']){
							?>
							<!--FAB 본인의 포스팅을 볼때만 수정 버튼이 뜹니다. 클릭하면 전에 썼던 form 다시 뜸-->
		          <a class="btn-floating halfway-fab waves-effect waves-light red" href="#update_modal"><i class="material-icons">edit</i></a>
							<?php
							}
							?>         

		        </div>
		        <div class="card-content">
		          <p><?php echo $results['content']; ?></p>
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
			      <div class="collapsible-body"><span><?php echo $results['created_at']." ".$results['username']."이 작성"; ?></span></div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">place</i>Location</div>
			      <div class="collapsible-body"><span><?php echo $results['location_name']; ?></span></div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">movie</i>Movie</div>
			      <div class="collapsible-body"><span><?php echo $results['movie_name']; ?></span></div>
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
			  <ul class="collection" id = "reply_<?php echo $results['id']; ?>">
			  	<?php foreach ($replies as $r) {
			  		$user_id = $r['user_id'];
					$user = get_user_by_id($user_id);
					json_encode($user, JSON_UNESCAPED_UNICODE);
			  	?>
				    <li class="collection-item avatar">
				      <img src="<?php echo $user['profile_img_url']; ?>" alt="profile" class="circle">
				      <span class="title"><?php echo $user['username']; ?></span>
				      <span class="title" style = "float:right"><?php echo $r['created_at']; ?></span>
				      <p><?php echo $r['content'];?></p>
				    </li>
				<?php }?>
			  </ul>
			  <ul class="collection">
			  	<!-- Comment Form-->
			    <li class="collection-item avatar">
			      <img src="<?php echo $_SESSION['profile_img_url'];?>" alt="profile" class="circle">
			      <div class="title" style="margin-top: 10px"><?php echo $_SESSION['username'];?></div>
			      <div class="row">
			        <div class="input-field">
			          <i class="material-icons prefix">comment</i>
			          <textarea id="icon_prefix2" class="materialize-textarea content_<?php echo $results['id'];?>"></textarea>
			          <button class = "reply_submit" style = "float: right" value = "<?php echo $results['id'];?>">Submit</button>
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
	  user_id = "<?php echo $_SESSION['id'];?>";
	  
	  $.ajax({
	    
	    method: "POST",
	    url: "../api/make_reply.php",
	    data: { content: reply_content, user_id: user_id, post_id: post_id}
	  })
	  .done(function() {
	      $("#reply_" + post_id).append("<li class=\"collection-item avatar\"><img src=\"<?php echo $_SESSION['profile_img_url'];?>\" alt=\"profile\" class=\"circle\"><span class=\"title\"><?php echo $_SESSION['username'];?></span><span class=\"title\" style = \"float:right\">방금 전</span><p>" +reply_content +"</p></li>");
	      $(".content_" + post_id).val('');
	  })
	  .fail(function(request, error){
	      alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
	  });
	});
});

</script>

<!--수정용 모달-->
<div id="update_modal" class="modal modal-fixed-footer">
    <div class = "modal-content">
        <h4>Posting</h4>
        <div class="row">
            <form id="post_form" method="post" class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">view_agenda</i>
                        <input id="update_title" type="text" data-length="100" value="<?php echo $results['title']; ?>">
                        <label for="update_title">Title</label>
                    </div>
                </div>                   
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="update_content" class="materialize-textarea" data-length="1000"><?php echo $results['content'];?></textarea>
                        <label for="update_content">Write Content</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light" id="update_btn" type="submit" name="action">Update
            <i class="material-icons right">send</i>
        </button>               
    </div>
</div>

<script>
$(document).ready(function(){
		$("#update_btn").on('click', function(){
			var title = $("#update_title").val();
			var content = $("#update_content").val();
        $.ajax({
            method: "POST",
            url: "../api/update_post.php", 
            data : {"post_id": <?php echo $_GET['post_id'];?>, "title" : title, "content" : content},
            dataType: 'json'
        })
        .done(function( json ) {
            location.reload();
        })
        .fail(function(request, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        });
    });
});
</script>