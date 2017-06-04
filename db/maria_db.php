<?php
require_once "query.php";

// 이페이지에서는 데이터베이스에 관한 모든 연산을 수행한다
ini_set('display_errors', 1);
error_reporting(E_ALL);

$root_directory = "http://45.32.109.86";

function pdo_sql_connect(){
    $movit_host = 'movit.crwpu2cl615x.ap-northeast-2.rds.amazonaws.com';
    $movit_dbname = 'movit';
    $movit_dbuser = 'movit';
    $movit_dbpass = '123123123';
	$conn = new PDO('mysql:host='.$movit_host.';dbname='.$movit_dbname.';charset=utf8', $movit_dbuser, $movit_dbpass);
	return $conn;
}

//회원가입하는 함수

function sign_up($username, $password){
    try{
        $conn = pdo_sql_connect();
        $query = "INSERT INTO user (username, password) VALUES(?, password(?))";
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($username, $password));
        if($result){
            $id = $conn->lastInsertId();
            $stmt = $conn->prepare("SELECT id, username, profile_img_url FROM user WHERE id = ?");
            $result = $stmt->execute(array($id));
            if($result){
                return json_encode($stmt->fetch(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
            }
            else{
                return json_encode(array("Fail", "회원가입 오류"), JSON_UNESCAPED_UNICODE);
            }
        }
        else{
            return json_encode(array("Fail", "Username 중복"), JSON_UNESCAPED_UNICODE);
        }
    }
    catch(PDOException $e){
        return json_encode(array("Fail", $e), JSON_UNESCAPED_UNICODE);
    }
}

//로그인하는 함수
function log_in($username, $password){
    try{
        $conn = pdo_sql_connect();
        $query = "SELECT id, username, profile_img_url FROM user WHERE username = ? and password = password(?)";
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($username, $password));
        if($result){
            return json_encode($stmt->fetch(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
        }
        else{
            return json_encode(array("Fail", "Username이나 Password가 잘못되었습니다"), JSON_UNESCAPED_UNICODE);
        }
    }
    catch(PDOException $e){
        return json_encode(array("Fail", $e), JSON_UNESCAPED_UNICODE);
    }
}

//포스트 만드는 함수
function make_post($user_id, $lat, $lng, $location_name, $movie_name, $director_name, $title, $content){
    try{
        $conn = pdo_sql_connect();
        $query = INSERT_POST;
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($user_id, $lat, $lng, $location_name, $movie_name, $director_name, $title, $content));
        if($result){
            return $conn->lastInsertId();
        }
        else{
            return "Fail";
        }
    }
    catch(PDOException $e){
        return "Fail : ".$e;
    }
}

function update_post_image($post_id, $post_img_url){
    try{
        $conn = pdo_sql_connect();
        $query = UPDATE_POST;
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($post_img_url, $post_id));
        if($result){
            return "Success";
        }
        else{
            return "Fail";
        }
    }
    catch(PDOException $e){
        return "Fail : ".$e;
    }
}

//댓글 입력하는 함수
function make_reply($user_id, $post_id, $content){
    try{
        $conn = pdo_sql_connect();
        $query = INSERT_REPLY;
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($user_id, $post_id, $content));
        if($result){
            return "Success";
        }
        else{
            return "Fail";
        }
    }
    catch(PDOException $e){
        return "Fail : ".$e;
    }
}

//포스트 아이디로 포스트 가져오는 함수
function update_post($post_id, $title, $content){
    try{
        $conn = pdo_sql_connect();
        $query = "UPDATE post SET title = ?, content = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($title, $content, $post_id));
        if($result){
            return "Success";
        }
        else{
            return "Fail";
        }
    }
    catch(PDOException $e){
        return "Fail : ".$e;
    }
}

//포스트 아이디로 포스트 가져오는 함수
function get_post($post_id){
    try{
        $conn = pdo_sql_connect();
        $query = SELECT_POST;
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($post_id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        return "Fail : ".$e;
    }
}

//영화 이름으로 포스트 가져오는 함수
function get_posts_by_moive_name($movie_name, $director){
    try{
        $conn = pdo_sql_connect();
        $query = SELECT_POST_BY_MOVIE_NAME_AND_DIRECTOR;
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($movie_name, $director));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        return "Fail : ".$e;
    }
}

//장소 이름으로 포스트들 가져오는 함수
function get_posts_by_location_name($location_name){
    try{
        $conn = pdo_sql_connect();
        $query = SELECT_POST_BY_LOCATION_NAME;
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($location_name));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        return "Fail : ".$e;
    }
}

//반경 distance 안에 있는 포스트들 가져오는 함수
function get_posts_by_boundary($lat, $lng, $distance){
    try{
        $conn = pdo_sql_connect();
        $query = SELECT_POST_BY_LOCATION_RADIUS;
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($lat, $lng, $lat, $distance));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        return "Fail : ".$e;
    }
}

//모든 포스트들을 가져오는 함수
function get_all_posts(){
    try{
        $conn = pdo_sql_connect();
        $query = SELECT_ALL_POST;
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array());
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        return "Fail : ".$e;
    }
}

//댓글들 가져오는 함수
function get_replies($post_id){
    try{
        $conn = pdo_sql_connect();
        $query = SELECT_REPLY;
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($post_id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        return "Fail : ".$e;
    }
}

// Find the user by user_id
function get_user_by_id($id){
    try{
        $conn = pdo_sql_connect();
        $query = SELECT_USER_BY_USER_ID;
        $stmt = $conn->prepare($query);
        $result = $stmt->execute(array($id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e){
        return "Fail : ".$e;
    }
}

?>
