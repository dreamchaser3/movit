<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feed extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('post_model');
    }

    public function index()
    {
        $data['posts'] = $this->post_model->getPostsByUser($this->session->id);

        $this->load->template($this->session, 'feed/index', $data);

    }

}
