<?php
require_once("../db/maria_db.php");

$post_id = $_POST['post_id'];

$replies = get_replies($post_id);

echo json_encode($replies, JSON_UNESCAPED_UNICODE);
?>