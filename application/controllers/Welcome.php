<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('post_model');
    }
    public function index()
    {
        $lat = $this->input->get('lat');
        $lng = $this->input->get('lng');
        if($lat && $lng){
            $data['posts']= $this->post_model->getPostsByLoc($lat, $lng);
        }else{
            $data['posts']= array();
        }
        $this->load->template($this->session, $this->session->logined ? 'index/logined_index_page' : 'index/not_logined_index_page',$data);
    }
}
