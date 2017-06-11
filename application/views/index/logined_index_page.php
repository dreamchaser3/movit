<div id="mask"
     style="z-index:9999; display: block; background: white; position: fixed; left:0; top:100px; height: 100vh; width: 100vw;">
    <h2 class="deep-purple-text text-darken-4" style="text-align: center; margin-top: 30vh">현재 위치를 찾고 있어요.</h2>
    <div class="progress deep-purple lighten-3" style="width: 80%; margin: auto; margin-top: 50px;">
        <div class="indeterminate deep-purple" style="width: 60%"></div>
    </div>


</div>

<!--index banner 1: Map/Search Bar -->
<div id="index-banner" class="parallax-container" style="overflow: initial">
    <div class="section no-pad-bot" style="z-index:1000; position: absolute">
        <div class="container" style="margin-top: 50px">
            <div class="row center">
                <h4 class="header col s12 light deep-purple-text" style="color: black"><?php echo $userData->username ?>
                    님의 현재 위치는,</h4>
            </div>
            <div class="row center" style="width: 70%; margin: auto">
                <nav>
                    <form>
                        <div class="nav-wrapper white">
                            <div class="input-field">
                                <input type="search" id="search2" class="white" placeholder="">
                                <label class="label-icon" for="search"><i
                                            class="material-icons deep-purple-text">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </div>
                    </form>
                </nav>
            </div>
            <div class="card row center" id="search-area"
                 style=" width: 70%;margin: auto; height: 600px; display: none; background: white;">

                <div style="display: flex; flex-direction: column; width: 100%; height: 100%;">

                    <div style="flex-basis:300px; height: 300px; line-height: initial;"
                         id="map-view">
                        <div id="map2" style="height: 300px; width: 100%; "></div>
                    </div>

                    <form class="input-field col s6 " style="margin: auto;">
                        <div class="row" style="flex-basis:300px; color: black; line-height: initial;"
                             id="search-view">


                            <input type="text" id="address-input"/>
                            <label for="address-input" class="deep-purple-text text-lighten-2">장소 다시 검색</label>
                            <button class="btn waves-effect waves-light deep-purple lighten-2" type="button"
                                    onclick="makeLatLng($('#address-input').val())" style="margin-top: 10px">검색
                            </button>
                            <button class="btn waves-effect waves-light deep-purple lighten-2" type="button"
                                    onclick="goToLocation()" style="margin-top: 10px">이 장소로 가기
                            </button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="map" style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px;"></div>
</div>
<script>
    function makeLatLng(address) {
        codeAddress(address, function (candidates, coord) {
            selectedPoint = coord;
            map2.setCenter(selectedPoint);
            var marker = new google.maps.Marker({
                map: map2,
                position: selectedPoint
            });
        })
    }
</script>

<!-- Container 1: Near Posts -->

<div class="container">
    <div class="section">
        <div class="row center" style="margin-top: 40px">
            <i class="material-icons medium deep-purple-text">place</i> 
            <h4 class="header col s12 light" style="color: black"><br>가까운 사람들의 포스팅</h4>
        </div>
        <!--   Near Posts / Carousel   -->
        <div class="row">
            <?php if (sizeof($posts) !== 0) { ?>
                <div class="carousel">
                    <?php foreach ($posts as $post) { ?>
                        <a class="carousel-item postergrad" href="/post/watch/<?php echo $post['post_id'] ?>"><img
                                    class="poster"
                                    src="<?php echo $post['post_img_url'] ?>"></a>
                    <?php } ?>
                </div>


            <?php } else { ?>

                <div>
                    <h3 class="center"> NO POSTS YET.</h3>
                </div>


            <?php } ?>
        </div>

    </div>
</div>


<!-- Near Related Movies : Silder -->

<?php if (sizeof($posts) !== 0) { ?>
<h4 class="center">가까운 사람들이 언급한 영화들</h4>
<div class="slider">

    <div class="slider">
        <ul class="slides">
            <?php foreach ($posts as $post) { ?>
                <li>
                    <a href="/movie/watch/<?php echo $post['movie_id'] ?>">
                        <img src="<?php echo $post['image'] ?>">
                        <div class="caption center-align">
                            <h3><?php echo $post['title'] ?></h3>
                            <h5 class="light grey-text text-lighten-3"><?php echo $post['subtitle'] ?></h5>
                        </div>
                    </a>
                </li>

            <?php } ?>

        </ul>
    </div>

<?php } else { ?>
    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light">아직 가까운 곳에서 포스팅이 올라오지 않아서 영화 목록이 없습니다. </h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="/static/image/background4.png" style="width: 60%"
                                   alt="Unsplashed background img 2"></div>
    </div>
<?php } ?>


<!-- movie search -->


<div class="container" style="padding-top: 100px; padding-bottom: 150px" id="search-movie">
    <div class="section">

        <div class="row">
            <div class="col s12 center">
                <h4 class="header col s12 light" style="color: black">아직 원하는 영화를 찾지 못했나요?</h4>
                <h6 style="margin-bottom: 50px;">아래 검색창에서 영화 제목을 검색하세요.</h6>
            </div>
        </div>
        <div class="row" style="width: 70%; margin: auto">
            <nav>
                <div class="nav-wrapper deep-purple lighten-1">
                    <div class="input-field">
                        <input type="search" id="search" placeholder="Search by Movie Name"
                               onkeydown="searchMovie('search', app4);">
                        <label class="label-icon" for="search"><i class="material-icons">movie</i></label>
                        <i class="material-icons">close</i>
                    </div>
                </div>
            </nav>
            <ul>
                <li v-for="item in list">
                    <button v-on:click="goToMovieDetail(item.id)" v-html="item.title"></button>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    var app4 = new Vue({
        el: '#search-movie',
        data: {
            list: []
        },
        methods: {
            goToMovieDetail: function (movieId) {
                location.href = '/movie/watch/' + movieId;
            }
        }
    })
</script>


<!--Banner 3-->


<div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
        <div class="container">
            <div class="row center">
                <h5 class="header col s12 light">Movit: Social Media via Location and Films</h5>
            </div>
        </div>
    </div>
    <div class="parallax"><img src="/static/image/background6.png" style="width: 60%" alt="Unsplashed background img 2">
    </div>
</div>


<!--google maps-->
<script>
    var map;
    var map2;
    var selectedPoint;
    $.urlParam = function (name) {
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results == null) {
            return null;
        }
        else {
            return decodeURI(results[1]) || 0;
        }
    }
    if (!($.urlParam('lat') && $.urlParam('lng'))) {
        $("#mask").show();
    } else {
        $("#mask").hide();
    }
    function initMap2() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                if ($.urlParam('lat') && $.urlParam('lng')) {
                    pos = {
                        lat: parseFloat($.urlParam('lat')),
                        lng: parseFloat($.urlParam('lng'))
                    }
                }
                map2 = new google.maps.Map(document.getElementById('map2'), {
                    center: pos,
                    zoom: 15
                });
            });
        }
    }
    function initMap() {
        if (!($.urlParam('lat') && $.urlParam('lng'))) {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    location.href = "/?lat=" + position.coords.latitude + "&lng=" + position.coords.longitude;
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, map.getCenter());
            }
        } else {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    if ($.urlParam('lat') && $.urlParam('lng')) {
                        pos = {
                            lat: parseFloat($.urlParam('lat')),
                            lng: parseFloat($.urlParam('lng'))
                        }
                    }
                    map = new google.maps.Map(document.getElementById('map'), {
                        center: pos,
                        zoom: 15
                    });
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
        // Try HTML5 geolocation.
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
//                    window.alert('No results found');
                }
            } else {
//                window.alert('Geocoder failed due to: ' + status);
            }
        });
    }

    function goToLocation() {
        if (selectedPoint) {
            location.href = "/?lat=" + selectedPoint.lat() + "&lng=" + selectedPoint.lng();
        }
    }
    $(function () {
        $('#search2').focus(function () {
            initMap2();
            $('#search-area').show();
            $('#search2').blur();
        })
    })

</script>