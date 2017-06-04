<?php
require_once("../db/maria_db.php");

$post_id = $_GET['post_id'];
$replies = get_replies($post_id);

json_encode($replies, JSON_UNESCAPED_UNICODE);
?>