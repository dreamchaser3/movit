<?php
if ($logined) {
    ?>
    <footer class="page-footer deep-purple lighten-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Project Info</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project. 2017 Spring, Yonsei University. CSI2109-01 Internet Programming Team Project. </p>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Developers</h5>
                    <ul>
                        <li><a class="white-text" href="#!">dreamchaser3</a></li>
                        <li><a class="white-text" href="#!">jisujen</a></li>
                        <li><a class="white-text" href="#!">Y.H Chung</a></li>
                        <li><a class="white-text" href="#!">M.S Park</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                인터넷 프로그래밍, 2017. 연세대학교.
            </div>
        </div>
    </footer>
    <!-- SCRIPTS -->
    <script type="text/javascript" src="/static/js/materialize.min.js"></script>
    <script src="/static/js/init.js"></script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvf_j44qOsUly_8Y_8QVAcumWdsbJPRI8&callback=initMap">
    </script>
    <script>
        $(document).ready(function () {
            //init
            $('.modal').modal();
            $('.carousel').carousel({
            dist:0,
            shift:0,
            padding:20,});
            $('.slider').slider({full_width: true, interval: 3000});
            $(".button-collapse").sideNav();
            $('.chips').material_chip();
            $('.parallax').parallax();

        });
    </script>
    </body>
    </html>

    <?php
} else {
    ?>
    <footer class="page-footer deep-purple lighten-3">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Project Info</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project. 2017 Spring, Yonsei University. CSI2109-01 Internet Programming Team Project. </p>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Developers</h5>
                    <ul>
                        <li><a class="white-text" href="#!">dreamchaser3</a></li>
                        <li><a class="white-text" href="#!">jisujen</a></li>
                        <li><a class="white-text" href="#!">Y.H Chung</a></li>
                        <li><a class="white-text" href="#!">M.S Park</a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                인터넷 프로그래밍, 2017. 연세대학교.
            </div>
        </div>
    </footer>
    <!-- SCRIPTS -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="/static/js/materialize.min.js"></script>
    <script src="/static/js/init.js"></script>
    <script>
        $(document).ready(function () {
            // Modal init
            $('.modal').modal();
        });
    </script>
    </body>
    </html>

    <?php
}
?>