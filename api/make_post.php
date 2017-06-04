<?php
require_once("../db/maria_db.php");

$user_id = $_POST['user_id'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$location_name = $_POST['location_name'];
$movie_name = $_POST['movie_name'];
$director_name = $_POST['director_name'];
$title = $_POST['title'];
$content = $_POST['content'];

$post_id = make_post($user_id, $lat, $lng, $location_name, $movie_name, $director_name, $title, $content);

if(!isset($_FILES['image'])){
    if(strcmp($post_id, "Fail") === 0){
        echo '{"result":"fail"}';
        return;
    }
    else{
        echo '{"result":"success", "post_id":'.$post_id.'}';
        return;
    }
}
$dir = "../post_images/$post_id"; // 파일 업로드 경로

$files = $_FILES['image'];
$oldmask = umask(0); // 잠깐 umask 변경
mkdir($dir, 0777);
umask($oldmask); // umask 원래로 복구
if(is_dir($dir)){
    if(strpos( $files['type'], 'image' ) !== false){
        //임시파일을 경로로 이동시키고 경로를 배열에 저장함
        //파일 이름은 uniqid함수를 통해 임의로 생성
        $uniqid = uniqid("image_");
        $ext = pathinfo($files['name'], PATHINFO_EXTENSION);
        move_uploaded_file($files['tmp_name'], "$dir/$uniqid.$ext");
        update_post_image($post_id, "$root_directory/post_images/$post_id/$uniqid.$ext");
        echo '{"result":"success", "post_id":'.$post_id.'}';
    }
    else{
        echo '{"result":"fail", "error":"file is not image"}';
    }   
}
else{
    echo '{"result":"fail", "error":"cannot make directory"}';
}

function reArrayFiles(&$file_post) {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
?>