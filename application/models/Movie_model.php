<?php
include_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/application/libraries/simple_html_dom.php');

class Movie_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getMovies($movie_name)
    {
        $client_id = "vfB2ILfkGdh1vk2DgPG5";
        $client_secret = "OTfkB6_Z2n";
        $encText = urlencode($movie_name);
        $url = "https://openapi.naver.com/v1/search/movie.json?query=" . $encText; // json 결과
        $is_post = false;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $is_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "X-Naver-Client-Id: " . $client_id;
        $headers[] = "X-Naver-Client-Secret: " . $client_secret;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if ($status_code == 200) {
            $list = json_decode($response)->items;
            foreach ($list as $movie) {
                $movie->id = explode("=", $movie->link)[1];
                $this->insertMovie($movie);
            }
            return $list;
        } else {
            return "Error 내용:" . $response;
        }
    }

    public function getMovieById($id)
    {
        $query = $this->db->get_where('movie', ['id' => $id]);
        $movie = $query->result_array()[0];
        $html = file_get_html($movie['link']);
        foreach ($html->find(".con_tx") as $text) {
            $movie['summary'] = $text->plaintext;
            break;
        }
        foreach ($html->find('img[alt="STILLCUT"]') as $img) {
            $movie['image'] = $img->src;
            break;
        }
        return $movie;
    }

    public function insertMovie($movie)
    {
        $this->db->where('id', $movie->id);
        $this->db->from('movie');
        if ($this->db->count_all_results() != 1) {
            $this->db->insert('movie', $movie);
        }
    }

}

