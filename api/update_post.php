<?php
require_once("../db/maria_db.php");

$post_id = $_POST['post_id'];
$title = $_POST['title'];
$content = $_POST['content'];

$result = update_post($post_id, $title, $content);

if(strcmp("Success", $result) === 0){
    echo '{"result":"success", "post_id":'.$post_id.'}';
}
else{
    echo '{"result":"fail", "error":"update fail"}';
}
?>