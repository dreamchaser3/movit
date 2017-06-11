<!--index banner 1: Map/Search Bar -->

<div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
        <div class="container" style="margin-top: 80px">


            <div class="row center">
                <h5 class="header col s12 light" style="color: black">Now you are at</h5>
            </div>


        </div>
    </div>
    <div id="map" style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px;"></div>
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
        <li><a class="btn-floating green modal-trigger" href="#modal3"><i class="material-icons">library_add</i></a>
        </li>

    </ul>
</div>

<!-- Modal Structure (Posting)-->

<div id="modal3" class="modal modal-fixed-footer">
    <div class="modal-content">
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

<script type="text/javascript" src="/static/js/materialize.min.js"></script>
<script src="/static/js/init.js"></script>
<script>
    $(document).ready(function () {
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
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 15
        });
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                map.setCenter(pos);
                var marker = new google.maps.Marker({
                    position: pos,
                    map: map
                });
                var geocoder = new google.maps.Geocoder;
                geocodeLatLng(geocoder, map, pos);
            }, function () {
                handleLocationError(true, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, map.getCenter());
        }
    }
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        if (browserHasGeolocation) {
            window.alert('Error on geolocation');
        } else {
            window.alert('The browser doesn\'t support geolocaton service. Please use another browser.');
        }
    }
    // Find the address with coordinates.
    function geocodeLatLng(geocoder, map, pos) {
        geocoder.geocode({'location': pos}, function (results, status) {
            if (status === 'OK') {
                if (results[1]) {
                    $("#search2").attr("placeholder", results[1].formatted_address);
                } else {
                    window.alert('No results found');
                }
            } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvf_j44qOsUly_8Y_8QVAcumWdsbJPRI8&callback=initMap">
</script>