<!--글쓰기 FAB-->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">share</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">dashboard</i></a></li>
      <li><a class="btn-floating green modal-trigger" href="#modal3"><i class="material-icons">library_add</i></a></li>  
    </ul>
</div>
<!-- Modal Structure (Posting)-->
<div id="modal3" class="modal modal-fixed-footer">
    <div class = "modal-content">
        <h4>Posting</h4>
        <div class="row">
            <form id="post_form" method="post" class="col s12" enctype="multipart/form-data">
                <div class="file-field input-field">
                    <div class="btn">
                        <span>Image</span>
                        <input id="upload_image" type="file">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" placeholder="Upload image" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">view_agenda</i>
                        <input id="title" type="text" data-length="100">
                        <label for="title">Title</label>
                    </div>
                </div>                   
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">mode_edit</i>
                        <textarea id="content" class="materialize-textarea" data-length="1000"></textarea>
                        <label for="content">Write Content</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">movie</i>
                        <input id="post_movie" type="text" placeholder="Movie name" list="movie_list" class="validate">
                        <datalist id="movie_list"></datalist>
                        <label for="post_movie">Write Movie name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">place</i>
                        <input id="post_place"type="text" class="validate" placeholder="Location name">
                        <label for="post_place">Write Location name</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn waves-effect waves-light" id="post_btn" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
        </button>               
    </div>
</div>
<style>
.pac-container {
    background-color: #FFF;
    z-index: 10000;
    position: fixed;
    display: inline-block;
    float: left;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvf_j44qOsUly_8Y_8QVAcumWdsbJPRI8&libraries=places"
     async defer></script>
<script>
$(document).ready(function(){
    <?php 
    if(isset($_SESSION['id'])){
        echo "var id=".$_SESSION['id'].";";
    } ?>
    var is_set_location = false;
    var form = $("#post_form")[0];
    var formData = new FormData(form);
    var lat, lng, location_name;
    function initialize() {
        var input = document.getElementById('post_place');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', function(){
            try {
                var location = autocomplete.getPlace().geometry.location;
                location_name = input.value;
                lat = location.lat();
                lng = location.lng();
                is_set_location = true;
            }
            catch(err) {
                is_set_location = false;
            }
            console.log(is_set_location);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);


    $("#post_movie").keyup(function(e) {
	    if (e.which == 13) {
		    search_movie($(this).val());
	    }
    });

    var movie_list = document.getElementById('movie_list');
    var movie_input = $("#post_movie");
    var movie_map = new Object();

    function search_movie(movie_name){
        $.ajax({
            method: "POST",
            url: "../api/search_movie.php", 
            data : {"movie_name" : movie_name},
            dataType: 'json'
        })
        .done(function( json ) {
            movie_json = json;
            while (movie_list.hasChildNodes()) {
                movie_list.removeChild(movie_list.lastChild);
            }
            for(i in json.items){
                var option = document.createElement('option');
                // Set the value using the item in the JSON array.
                var temp = (json.items[i].title + " " + json.items[i].subtitle).replace(/<[^>]*>/g, "");
                movie_map[temp] = json.items[i].director;
                option.value = temp;
                // Add the <option> element to the <datalist>.
                movie_list.appendChild(option);
            }
        })
        .fail(function(request, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        });
    }

    $("#post_btn").on('click', function(){
        var entries = formData.entries();
        for(var pair of entries ) {
            formData.delete( pair[0] );
        }
        formData.append("image", $("#upload_image")[0].files[0]);
        formData.append("user_id", id);
        formData.append("title", $("#title").val());
        formData.append("content", $("#content").val());
        if(typeof movie_map[movie_input.val()] == "undefined"){
            alert("영화를 선택해주세요");
            return;
        }
        else{
            formData.append("movie_name", movie_input.val());
            formData.append("director_name", movie_map[movie_input.val()]);
        }        
        if(!is_set_location){
            alert("위치를 선택해주세요");
            return;
        }
        formData.append('lat', lat);
        formData.append('lng', lng);
        formData.append('location_name', location_name);
        for (var pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
        }

        $.ajax({
            enctype: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false, 
            method: "POST",
            url: "../api/make_post.php", 
            data : formData,
            dataType: 'json'
        })
        .done(function( json ) {
            window.location = "../views_post/index.php?post_id="+json.post_id;
        })
        .fail(function(request, error){
            alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
        });
    });

});
</script>

