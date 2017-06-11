<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movie extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('movie_model');
        $this->load->model('post_model');
    }

    public function index()
    {
        $this->load->template($this->session, 'movie/index');

    }
    public function find($movie_name){
        $search_result = $this->movie_model->getMovies(urldecode($movie_name));
        header('Content-Type: application/json');
        echo json_encode($search_result);
    }

    public function watch($movie_id){
        $data['movie'] = $this->movie_model->getMovieById($movie_id);
        $data['posts'] = $this->post_model->getPostsByMovie($movie_id);
        $this->load->template($this->session, 'movie/index', $data);
    }
}
