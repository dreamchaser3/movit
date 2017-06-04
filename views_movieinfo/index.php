<?php
include "../views_common/header_without_login.php";

$movie_name = $_GET['moviename'];
$director_name = isset($_GET['directorname']) ? $_GET['directorname'] : null;
$results = json_decode(search_movie($_GET['moviename']), true);
if($results['total'] === 1){
  $result_item = $results['items'][0];
}
else{
  if(!isset($_GET['directorname'])){
    ?><script>history.go(-1);</script><?php
  }
  foreach($results['items'] as $item){
    if(strcmp($item['director'], $_GET['directorname']) === 0){
      $result_item = $item;
      break;
    }
  }
}
if(!isset($result_item)){
  exit();
}
else{
  //이미지와 줄거리 파싱해오는 부분
  $html = file_get_html($result_item['link']);
  foreach($html->find(".con_tx") as $text){
    $result_item['story'] = $text->plaintext;
    break;   
  }
  foreach($html->find('img[alt="STILLCUT"]') as $img){
    $result_item['img'] = $img->src;
    break;   
  }
}
?>
<!--index banner : movie pic -->

  <div class="slider">
    <ul class="slides">
      <li>
        <img src=<?php echo $result_item['img']; ?>> <!-- random image -->
        <div class="caption right-align">
          <h3><?php echo $result_item['title']; ?></h3>
          <h5 class="light grey-text text-lighten-3"><?php echo $result_item['subtitle']; ?></h5>
        </div>
      </li>

      <li>
        <img src=<?php if(isset($result_item['img'])){echo $result_item['img'];} ?>> <!-- random image -->
        <div class="caption right-align">
          <h3>Detailed Info</h3>
          <h5 class="light grey-text text-lighten-3"> <?php if(isset($result_item['story'])){echo $result_item['story'];} ?></h5>
        </div>
      </li>

    </ul>
  </div>



<!-- Container : Related Posts -->


  <div class="container">
    <div class="section">
      <div class="row center">
          <h5 class="header col s12 light" style="color: black">Related Posts</h5>
      </div>

      



      <!--   Related / Carousel -->  

      <div class="row">
          <?php
          if(isset($director_name)){
              $related_results = get_posts_by_movie_name($movie_name, $director_name);
          }
          else{
              $related_results = get_posts_by_movie_name($movie_name, "");
          }
          if(count($related_results) > 0){
              ?>
              <div class="carousel">
              <?php
              foreach($related_results as $result){
                  echo '<a class="carousel-item" href="../views_post/index.php?post_id='.$result['id'].'"><img src="'.$result['post_img_url'].'"></a>'; 
              }
              ?>
              </div>
              <?php
          }
          ?>
          </div>
      </div>

    </div>
  </div>









<?php
include_once ("../views_common/fixed_action_btn.php");
include "../views_common/footer.php";
?>

<script type="text/javascript" src="../js/materialize.min.js"></script>
<script src="../js/init.js"></script>
<script>
    $(document).ready(function(){
    //init
    $('.modal').modal();
    $('.carousel').carousel();
    $('.slider').slider({full_width: false, interval: 10000});
    });
    $(".button-collapse").sideNav();
    $('.chips').material_chip();
    $('.parallax').parallax();
</script>