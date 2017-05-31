<?php
/**
 * Created by PhpStorm.
 * User: woohyunkim
 * Date: 31/05/2017
 * Time: 11:44 PM
 */
const INSERT_POST = "INSERT INTO post (user_id, lat, lng, location_name, movie_name, director_name ,title, content) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
const UPDATE_POST = "UPDATE post SET post_img_url = ? WHERE id = ?";

const INSERT_REPLY = "INSERT INTO reply (user_id, post_id, content) VALUES (?, ?, ?)";

const SELECT_POST = "SELECT * FROM post WHERE id = ?";

const SELECT_POST_BY_MOVIE_NAME_AND_DIRECTOR = "SELECT * FROM post WHERE movie_name = ? AND director_name = ?";

const SELECT_POST_BY_LOCATION_NAME = "SELECT * FROM post WHERE location_name = ?";

const SELECT_POST_BY_LOCATION_RADIUS = "SELECT *,	
        (6371*acos(cos(radians(37))*cos( radians(?)) * cos( radians(?) - radians(127) ) + sin( radians(37) ) * sin( radians(?)))) AS distance
                FROM post HAVING distance <= ? ORDER BY distance LIMIT 0, 5";

const SELECT_ALL_POST = "SELECT * FROM post";

const SELECT_REPLY = "SELECT * FROM reply WHERE post_id = ?";