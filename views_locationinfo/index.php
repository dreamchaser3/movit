
<?php
include "../views_common/header_without_login.php"
?>

<!--index banner 1: Map/Search Bar -->

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container" style="margin-top: 80px">
        
        
        <div class="row center">
          <h5 class="header col s12 light" style="color: black">Now you are at</h5>
        </div>


      </div>
    </div>
    <div id = "map" style = "height: 100%; width: 100%; position: absolute; top: 0px; left: 0px;"></div>
  </div>



<!-- Container : Related Posts -->


  <div class="container">
    <div class="section">
      <div class="row center" style="margin-top: 50px">
          <h5 class="header col s12 light" style="color: black">Related Posts</h5>
      </div>

      



      <!--   Related / Carousel -->  

      <div class="row">
        
          <div class="carousel">
            <a class="carousel-item" href="#one!"><img src="http://lorempixel.com/250/250/nature/1"></a>
            <a class="carousel-item" href="#two!"><img src="http://lorempixel.com/250/250/nature/2"></a>
            <a class="carousel-item" href="#three!"><img src="http://lorempixel.com/250/250/nature/3"></a>
            <a class="carousel-item" href="#four!"><img src="http://lorempixel.com/250/250/nature/4"></a>
            <a class="carousel-item" href="#five!"><img src="http://lorempixel.com/250/250/nature/5"></a>
          </div>
      </div>

    </div>
  </div>









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
                <form class="col s12">

                     <div class="file-field input-field">
                      <div class="btn">
                        <span>File</span>
                        <input type="file">
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div>                   
                                      


                 


                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">mode_edit</i>
                            <textarea id="textarea" class="materialize-textarea"></textarea>
                            <label for="textarea">Write Text</label>
                        </div>
                    </div>


                    <div class="row">
                        <div class="input-field col s12">
                          <i class="material-icons prefix">label</i>
                          <div id="tags" class="chips"></div>
                          <label for="tags">Write tags and hit enter</label>

                        </div>
                      

                    </div>
      

                </form>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                  <i class="material-icons right">send</i>
                </button>               
            </div>
        </div>



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

<!--google maps-->
<script>
  function initAutocomplete() {
    var lat = '<?php echo $_GET['lat']?>';
    var lng = '<?php echo $_GET['lng']?>';
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: parseFloat(lat), lng: parseFloat(lng)},
      zoom: 15,
      mapTypeId: 'roadmap'
    });
    var marker = new google.maps.Marker({
      position: {lat: parseFloat(lat), lng: parseFloat(lng)},
      map: map
    });
    // Create the search box and link it to the UI element.
    var input = document.getElementById('search');
    var searchBox = new google.maps.places.SearchBox(input);
    // Bias the SearchBox results towards current map's viewport.
    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();

      if (places.length == 0) {
        return;
      }

      // Clear out the old markers.
      markers.forEach(function(marker) {
        marker.setMap(null);
      });
      markers = [];

      // For each place, get the icon, name and location.
      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }
        var icon = {
          url: place.icon,
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(25, 25)
        };

        // Create a marker for each place.
        markers.push(new google.maps.Marker({
          map: map,
          icon: icon,
          title: place.name,
          position: place.geometry.location
        }));

        if (place.geometry.viewport) {
          // Only geocodes have viewport.
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }
      });
      map.fitBounds(bounds);
      // Add onClick event to pass parameters and link to another page.
      markers.forEach(function(marker){
        marker.addListener('click', function() {
          window.location = "/views_locationinfo?lat=" + marker.position.lat() +"&lng="+ marker.position.lng();
        });
      });
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvf_j44qOsUly_8Y_8QVAcumWdsbJPRI8&libraries=places&callback=initAutocomplete"
     async defer></script>
</script>