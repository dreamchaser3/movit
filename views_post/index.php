<?php
include "../views_common/header_with_login.php"
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
			  <ul class="collection">
			    <li class="collection-item avatar">
			      <img src="/background1.jpg" alt="" class="circle">
			      <span class="title">Name</span>
			      <p>First Line <br>
			         Second Line
			      </p>
			      <a href="#!" class="secondary-content"><i class="material-icons">reply</i></a>
			    </li>

			    <li class="collection-item avatar">
			      <i class="material-icons circle">perm_identity</i>
			      <span class="title">Name</span>
			      <p>First Line <br>
			         Second Line
			      </p>
			      <a href="#!" class="secondary-content"><i class="material-icons">reply</i></a>
			    </li>

			    <li class="collection-item avatar">
			      <i class="material-icons circle green">perm_identity</i>
			      <span class="title">Name</span>
			      <p>First Line <br>
			         Second Line
			      </p>
			      <a href="#!" class="secondary-content"><i class="material-icons">reply</i></a>
			    </li>

			    <li class="collection-item avatar">
			      <i class="material-icons circle red">perm_identity</i>
			      <span class="title">Name</span>
			      <p>First Line <br>
			         Second Line
			      </p>
			      <a href="#!" class="secondary-content"><i class="material-icons">reply</i></a>
			    </li>

			    <!-- Comment Form-->

			    <li class="collection-item avatar">
			      <i class="material-icons circle red">perm_identity</i>
			      <div class="title" style="margin-top: 10px">Name</div>
				    <form class="col s12">
				      <div class="row">
				        <div class="input-field">
				          <i class="material-icons prefix">comment</i>
				          <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
				          <label for="icon_prefix2">First Name</label>
				        </div>
				      </div>
				    </form>
			      
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
    $('.parallx').parallx();


</script>